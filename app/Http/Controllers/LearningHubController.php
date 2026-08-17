<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\LessonProgress;
use Illuminate\Http\Request;

class LearningHubController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        if ($user->isAdmin()) {
            $enrolledCourses = Course::where('is_published', true)->with('lessons')->get();
        } else {
            $enrolledCourses = $user->courses()->with(['lessons' => function ($q) {
                $q->orderBy('order', 'asc');
            }])->get();
        }

        // Get user progress map
        $userProgresses = LessonProgress::where('user_id', $user->id)
            ->get()
            ->keyBy('lesson_id');

        // Detailed history of completed lessons
        $recentHistory = LessonProgress::where('user_id', $user->id)
            ->with(['lesson.course'])
            ->orderBy('updated_at', 'desc')
            ->get();

        return view('learning_hub.index', compact('enrolledCourses', 'userProgresses', 'recentHistory'));
    }
}
