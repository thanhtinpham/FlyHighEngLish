<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Lesson;
use App\Models\Document;
use App\Models\Notification;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
    public function index()
    {
        // Cache featured courses for 10 minutes
        $courses = Cache::remember('home_courses', 600, function () {
            return Course::where('is_published', true)
                ->select('id', 'title', 'slug', 'category', 'description', 'level', 'thumbnail', 'price')
                ->get();
        });
        
        // Cache preview lessons available for guests
        $previewLessons = Cache::remember('home_preview_lessons', 600, function () {
            return Lesson::where('is_preview', true)
                ->select('id', 'course_id', 'title', 'slug', 'level_or_week', 'is_preview', 'order')
                ->with(['course' => function ($q) {
                    $q->select('id', 'title', 'slug');
                }])
                ->take(4)
                ->get();
        });

        // Cache latest public documents
        $latestDocuments = Cache::remember('home_latest_documents', 600, function () {
            return Document::latest()->take(4)->get();
        });

        // Cache latest system announcements
        $notifications = Cache::remember('home_notifications', 600, function () {
            return Notification::latest()->take(3)->get();
        });

        return view('home', compact('courses', 'previewLessons', 'latestDocuments', 'notifications'));
    }
}

