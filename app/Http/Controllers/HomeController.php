<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Lesson;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Featured courses for 4 main categories
        $courses = Course::where('is_published', true)->get();
        
        // Preview lessons available for guests
        $previewLessons = Lesson::where('is_preview', true)->with('course')->take(4)->get();

        return view('home', compact('courses', 'previewLessons'));
    }
}
