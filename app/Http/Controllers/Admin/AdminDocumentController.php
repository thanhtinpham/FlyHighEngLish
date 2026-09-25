<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminDocumentController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->query('search');

        $query = Document::with('uploader');

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('file_name', 'like', "%{$search}%");
            });
        }

        $documents = $query->latest()->paginate(15)->withQueryString();

        return view('admin.documents.index', compact('documents', 'search'));
    }

    public function create()
    {
        return view('admin.documents.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'files' => 'nullable',
            'files.*' => 'file|max:51200', // 50MB max per file
            'file' => 'nullable|file|max:51200',
        ]);

        $rawFiles = $request->file('files') ?? $request->file('file');

        if (!$rawFiles) {
            return back()->with('error', 'Vui lòng chọn ít nhất một tệp tài liệu để tải lên.');
        }

        $files = is_array($rawFiles) ? $rawFiles : [$rawFiles];
        $disk = config('filesystems.default', 'public');
        
        // Find or create default category to ensure valid non-null category_id on production database
        $defaultCategory = Category::first();
        if (!$defaultCategory) {
            $defaultCategory = Category::create([
                'name' => 'Tài liệu chung',
                'slug' => 'tai-lieu-chung-' . time(),
            ]);
        }
        $categoryId = $defaultCategory->id;
        $userId = auth()->id() ?? 1;

        $uploadedCount = 0;

        foreach ($files as $file) {
            if (!$file || !$file->isValid()) continue;

            $originalName = $file->getClientOriginalName();
            $extension = strtoupper($file->getClientOriginalExtension());
            $size = $file->getSize();
            $filePath = $file->store('documents', $disk);

            Document::create([
                'title' => $originalName,
                'description' => null,
                'category_id' => $categoryId,
                'file_path' => $filePath,
                'file_name' => $originalName,
                'file_size' => $size,
                'file_type' => $extension,
                'uploaded_by' => $userId,
            ]);

            $uploadedCount++;
        }

        return redirect()->route('admin.documents.index')->with('success', "Đã tải lên thành công {$uploadedCount} tệp tài liệu!");
    }

    public function edit(Document $document)
    {
        return view('admin.documents.edit', compact('document'));
    }

    public function update(Request $request, Document $document)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'file' => 'nullable|file|max:51200',
        ]);

        $document->title = $request->title;

        if ($request->hasFile('file')) {
            $disk = config('filesystems.default', 'public');
            if ($document->file_path) {
                if (Storage::disk($disk)->exists($document->file_path)) {
                    Storage::disk($disk)->delete($document->file_path);
                } elseif (Storage::disk('public')->exists($document->file_path)) {
                    Storage::disk('public')->delete($document->file_path);
                }
            }

            $file = $request->file('file');
            $document->file_name = $file->getClientOriginalName();
            $document->file_type = strtoupper($file->getClientOriginalExtension());
            $document->file_size = $file->getSize();
            $document->file_path = $file->store('documents', $disk);
        }

        $document->save();

        return redirect()->route('admin.documents.index')->with('success', 'Cập nhật tài liệu thành công!');
    }

    public function destroy(Document $document)
    {
        $disk = config('filesystems.default', 'public');
        if ($document->file_path) {
            if (Storage::disk($disk)->exists($document->file_path)) {
                Storage::disk($disk)->delete($document->file_path);
            } elseif (Storage::disk('public')->exists($document->file_path)) {
                Storage::disk('public')->delete($document->file_path);
            }
        }

        $document->delete();

        return redirect()->route('admin.documents.index')->with('success', 'Đã xóa tài liệu khỏi hệ thống!');
    }
}
