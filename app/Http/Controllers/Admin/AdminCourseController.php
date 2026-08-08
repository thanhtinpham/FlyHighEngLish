<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminCourseController extends Controller
{
    public function index()
    {
        $courses = Course::withCount(['lessons', 'students'])->latest()->get();
        return view('admin.courses.index', compact('courses'));
    }

    public function create()
    {
        return view('admin.courses.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|in:giao-tiep,ielts,toeic,tre-em',
            'level' => 'required|string|max:255',
            'description' => 'nullable|string',
            'objectives' => 'nullable|string', // newline separated
            'roadmap' => 'nullable|string', // newline separated
            'structure' => 'nullable|string', // newline separated
            'price' => 'nullable|numeric|min:0',
            'is_published' => 'boolean',
        ]);

        $objectivesArr = array_filter(array_map('trim', explode("\n", $request->objectives ?? '')));
        $roadmapArr = array_filter(array_map('trim', explode("\n", $request->roadmap ?? '')));
        $structureArr = array_filter(array_map('trim', explode("\n", $request->structure ?? '')));

        Course::create([
            'title' => $validated['title'],
            'slug' => Str::slug($validated['title']) . '-' . rand(100, 999),
            'category' => $validated['category'],
            'level' => $validated['level'],
            'description' => $validated['description'],
            'objectives' => $objectivesArr,
            'roadmap' => $roadmapArr,
            'structure' => $structureArr,
            'price' => $validated['price'] ?? 0,
            'is_published' => $request->has('is_published'),
        ]);

        return redirect()->route('admin.courses.index')->with('success', 'Đã thêm khóa học mới thành công!');
    }

    public function edit(Course $course)
    {
        return view('admin.courses.edit', compact('course'));
    }

    public function update(Request $request, Course $course)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|in:giao-tiep,ielts,toeic,tre-em',
            'level' => 'required|string|max:255',
            'description' => 'nullable|string',
            'objectives' => 'nullable|string',
            'roadmap' => 'nullable|string',
            'structure' => 'nullable|string',
            'price' => 'nullable|numeric|min:0',
        ]);

        $objectivesArr = array_filter(array_map('trim', explode("\n", $request->objectives ?? '')));
        $roadmapArr = array_filter(array_map('trim', explode("\n", $request->roadmap ?? '')));
        $structureArr = array_filter(array_map('trim', explode("\n", $request->structure ?? '')));

        $course->update([
            'title' => $validated['title'],
            'slug' => Str::slug($validated['title']) . '-' . $course->id,
            'category' => $validated['category'],
            'level' => $validated['level'],
            'description' => $validated['description'],
            'objectives' => $objectivesArr,
            'roadmap' => $roadmapArr,
            'structure' => $structureArr,
            'price' => $validated['price'] ?? 0,
            'is_published' => $request->has('is_published'),
        ]);

        return redirect()->route('admin.courses.index')->with('success', 'Cập nhật khóa học thành công!');
    }

    public function destroy(Course $course)
    {
        $course->delete();
        return redirect()->route('admin.courses.index')->with('success', 'Đã xóa khóa học thành công!');
    }
}
