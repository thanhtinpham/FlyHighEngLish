<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Enrollment;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index(Request $request)
    {
        $category = $request->query('category');
        
        $query = Course::where('is_published', true);
        if ($category) {
            $query->where('category', $category);
        }
        
        $courses = $query->withCount('lessons')->get();

        return view('courses.index', compact('courses', 'category'));
    }

    public function show($slug)
    {
        $course = Course::where('slug', $slug)
            ->where('is_published', true)
            ->with(['lessons' => function ($q) {
                $q->select('id', 'course_id', 'title', 'slug', 'level_or_week', 'description', 'is_preview', 'order')
                  ->orderBy('order', 'asc');
            }])
            ->firstOrFail();

        $userEnrolled = auth()->check() ? auth()->user()->isEnrolledIn($course->id) : false;
        $userPending = auth()->check() ? auth()->user()->hasPendingEnrollmentIn($course->id) : false;

        return view('courses.show', compact('course', 'userEnrolled', 'userPending'));
    }

    public function requestEnrollment(Course $course)
    {
        $user = auth()->user();

        if ($user->isEnrolledIn($course->id)) {
            return redirect()->route('courses.show', $course->slug)
                ->with('info', 'Bạn đã được duyệt tham gia khóa học này rồi!');
        }

        if ($user->hasPendingEnrollmentIn($course->id)) {
            return redirect()->route('courses.show', $course->slug)
                ->with('info', 'Yêu cầu đăng ký khóa học của bạn đang chờ Admin phê duyệt.');
        }

        Enrollment::updateOrCreate(
            [
                'user_id' => $user->id,
                'course_id' => $course->id,
            ],
            [
                'status' => 'pending',
                'enrolled_at' => null,
            ]
        );

        return redirect()->route('courses.show', $course->slug)
            ->with('success', 'Đã gửi yêu cầu đăng ký khóa học! Vui lòng chờ Admin phê duyệt để vào lớp.');
    }
}
