<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Lesson;
use App\Models\Document;
use App\Models\Notification;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Featured courses for main categories
        $courses = Course::where('is_published', true)->get();
        
        // Preview lessons available for guests
        $previewLessons = Lesson::where('is_preview', true)->with('course')->take(4)->get();

        // Latest public documents
        $latestDocuments = Document::latest()->take(4)->get();

        // Latest system announcements
        $notifications = Notification::latest()->take(3)->get();

        return view('home', compact('courses', 'previewLessons', 'latestDocuments', 'notifications'));
    }
}

