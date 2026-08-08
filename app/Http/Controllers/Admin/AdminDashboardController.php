<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Enrollment;
use App\Models\Lesson;
use App\Models\Registration;
use App\Models\User;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $totalStudents = User::where('role', 'student')->orWhere('role', 'user')->count();
        $totalCourses = Course::count();
        $totalLessons = Lesson::count();
        $totalEnrollments = Enrollment::count();
        $pendingRegistrations = Registration::where('status', 'pending')->count();
        
        $recentRegistrations = Registration::latest()->take(5)->get();
        $recentEnrollments = Enrollment::with(['user', 'course'])->latest()->take(5)->get();

        return view('admin.dashboard', compact(
            'totalStudents',
            'totalCourses',
            'totalLessons',
            'totalEnrollments',
            'pendingRegistrations',
            'recentRegistrations',
            'recentEnrollments'
        ));
    }
}
