<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Enrollment;
use App\Models\User;
use Illuminate\Http\Request;

class AdminEnrollmentController extends Controller
{
    public function index()
    {
        $pendingEnrollments = Enrollment::with(['user', 'course'])
            ->where('status', 'pending')
            ->latest()
            ->get();

        $activeEnrollments = Enrollment::with(['user', 'course'])
            ->where('status', 'active')
            ->latest()
            ->get();

        $users = User::where('role', 'student')->orWhere('role', 'user')->get();
        $courses = Course::all();

        return view('admin.enrollments.index', compact('pendingEnrollments', 'activeEnrollments', 'users', 'courses'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'course_id' => 'required|exists:courses,id',
        ]);

        Enrollment::updateOrCreate(
            [
                'user_id' => $validated['user_id'],
                'course_id' => $validated['course_id'],
            ],
            [
                'status' => 'active',
                'enrolled_at' => now(),
            ]
        );

        return redirect()->route('admin.enrollments.index')->with('success', 'Ghi danh học viên vào khóa học thành công!');
    }

    public function approve(Enrollment $enrollment)
    {
        $enrollment->update([
            'status' => 'active',
            'enrolled_at' => now(),
        ]);

        $userName = $enrollment->user->name ?? 'Học viên';
        $courseTitle = $enrollment->course->title ?? 'Khóa học';

        return redirect()->route('admin.enrollments.index')->with('success', "Đã phê duyệt học viên {$userName} vào khóa học \"{$courseTitle}\"!");
    }

    public function reject(Enrollment $enrollment)
    {
        $enrollment->delete();

        return redirect()->route('admin.enrollments.index')->with('success', 'Đã từ chối yêu cầu đăng ký khóa học.');
    }

    public function destroy(Enrollment $enrollment)
    {
        $enrollment->delete();
        return redirect()->route('admin.enrollments.index')->with('success', 'Đã hủy ghi danh học viên!');
    }
}
