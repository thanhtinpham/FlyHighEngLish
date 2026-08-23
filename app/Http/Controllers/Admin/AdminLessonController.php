<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Lesson;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class AdminLessonController extends Controller
{
    public function index(Request $request)
    {
        $courseId = $request->query('course_id');
        $courses = Course::all();

        $query = Lesson::with('course')->orderBy('course_id')->orderBy('order', 'asc');
        if ($courseId) {
            $query->where('course_id', $courseId);
        }

        $lessons = $query->get();

        return view('admin.lessons.index', compact('lessons', 'courses', 'courseId'));
    }

    public function create()
    {
        $courses = Course::all();
        return view('admin.lessons.create', compact('courses'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'course_id' => 'required|exists:courses,id',
            'title' => 'required|string|max:255',
            'level_or_week' => 'required|string|max:255',
            'description' => 'nullable|string',
            'html_content' => 'nullable|string',
            'html_file' => 'nullable|file|max:10240',
            'order' => 'nullable|integer',
        ]);

        $disk = config('filesystems.default', 'public');
        $htmlFilePath = null;
        $htmlContent = $validated['html_content'] ?? null;

        if ($request->hasFile('html_file')) {
            $file = $request->file('html_file');
            $path = $file->store('lessons', $disk);
            $htmlFilePath = $path;

            // Automatically extract text content from uploaded HTML file into DB as permanent fallback!
            $fileText = @file_get_contents($file->getRealPath());
            if ($fileText && empty($htmlContent)) {
                $htmlContent = $fileText;
            }
        }

        Lesson::create([
            'course_id' => $validated['course_id'],
            'title' => $validated['title'],
            'slug' => Str::slug($validated['title']) . '-' . rand(100, 999),
            'level_or_week' => $validated['level_or_week'],
            'description' => $validated['description'],
            'html_content' => $htmlContent,
            'html_file_path' => $htmlFilePath,
            'is_preview' => $request->has('is_preview'),
            'order' => $validated['order'] ?? 1,
        ]);

        return redirect()->route('admin.lessons.index')->with('success', 'Đã lưu & tải lên bài học HTML thành công (Đã sao lưu CSDL)!');
    }

    public function edit(Lesson $lesson)
    {
        $courses = Course::all();
        return view('admin.lessons.edit', compact('lesson', 'courses'));
    }

    public function update(Request $request, Lesson $lesson)
    {
        $validated = $request->validate([
            'course_id' => 'required|exists:courses,id',
            'title' => 'required|string|max:255',
            'level_or_week' => 'required|string|max:255',
            'description' => 'nullable|string',
            'html_content' => 'nullable|string',
            'html_file' => 'nullable|file|max:10240',
            'order' => 'nullable|integer',
        ]);

        $disk = config('filesystems.default', 'public');
        $htmlFilePath = $lesson->html_file_path;
        $htmlContent = $validated['html_content'] ?? $lesson->html_content;

        if ($request->hasFile('html_file')) {
            $file = $request->file('html_file');
            if ($htmlFilePath) {
                if (Storage::disk($disk)->exists($htmlFilePath)) {
                    Storage::disk($disk)->delete($htmlFilePath);
                } elseif (Storage::disk('public')->exists($htmlFilePath)) {
                    Storage::disk('public')->delete($htmlFilePath);
                }
            }
            $htmlFilePath = $file->store('lessons', $disk);

            // Automatically extract text content from uploaded HTML file into DB as permanent fallback!
            $fileText = @file_get_contents($file->getRealPath());
            if ($fileText && (empty($validated['html_content']) || empty($htmlContent))) {
                $htmlContent = $fileText;
            }
        }

        $lesson->update([
            'course_id' => $validated['course_id'],
            'title' => $validated['title'],
            'slug' => Str::slug($validated['title']) . '-' . $lesson->id,
            'level_or_week' => $validated['level_or_week'],
            'description' => $validated['description'],
            'html_content' => $htmlContent,
            'html_file_path' => $htmlFilePath,
            'is_preview' => $request->has('is_preview'),
            'order' => $validated['order'] ?? 1,
        ]);

        return redirect()->route('admin.lessons.index')->with('success', 'Cập nhật bài học HTML thành công (Đã lưu CSDL)!');
    }

    public function destroy(Lesson $lesson)
    {
        $disk = config('filesystems.default', 'public');
        if ($lesson->html_file_path) {
            if (Storage::disk($disk)->exists($lesson->html_file_path)) {
                Storage::disk($disk)->delete($lesson->html_file_path);
            } elseif (Storage::disk('public')->exists($lesson->html_file_path)) {
                Storage::disk('public')->delete($lesson->html_file_path);
            }
        }
        $lesson->delete();

        return redirect()->route('admin.lessons.index')->with('success', 'Đã xóa bài học thành công!');
    }
}
