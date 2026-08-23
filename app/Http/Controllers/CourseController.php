<?php

namespace App\Http\Controllers;

use App\Models\Course;
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

        return view('courses.show', compact('course', 'userEnrolled'));
    }
}
