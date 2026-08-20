<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Models\LessonProgress;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    public function show(Lesson $lesson)
    {
        $lesson->load(['course.lessons' => function ($q) {
            $q->select('id', 'course_id', 'title', 'slug', 'level_or_week', 'is_preview', 'order')
              ->orderBy('order', 'asc');
        }]);
        $user = auth()->user();

        // Access check: allow if lesson is preview or if user is enrolled (or admin)
        if (!$lesson->is_preview) {
            if (!auth()->check()) {
                return redirect()->route('login')->with('error', 'Bạn cần đăng nhập và tham gia khóa học để học bài học này.');
            }
            if (!$user->isEnrolledIn($lesson->course_id)) {
                return redirect()->route('courses.show', $lesson->course->slug)
                    ->with('error', 'Bạn chưa đăng ký khóa học này. Vui lòng đăng ký để học bài học.');
            }
        }

        $progress = null;
        if ($user) {
            $progress = LessonProgress::firstOrCreate(
                ['user_id' => $user->id, 'lesson_id' => $lesson->id],
                ['status' => 'in_progress']
            );
        }

        return view('lessons.show', compact('lesson', 'progress'));
    }

    public function saveProgress(Request $request, Lesson $lesson)
    {
        if (!auth()->check()) {
            return response()->json(['success' => false, 'message' => 'Unauthorized'], 401);
        }

        $request->validate([
            'status' => 'nullable|string|in:in_progress,completed',
            'score' => 'nullable|integer|min:0|max:100',
        ]);

        $user = auth()->user();

        $progress = LessonProgress::updateOrCreate(
            ['user_id' => $user->id, 'lesson_id' => $lesson->id],
            [
                'status' => $request->status ?? 'completed',
                'score' => $request->score ?? null,
                'completed_at' => ($request->status === 'completed') ? now() : null,
            ]
        );

        return response()->json([
            'success' => true,
            'message' => 'Đã lưu tiến độ học tập!',
            'progress' => $progress,
        ]);
    }
}
