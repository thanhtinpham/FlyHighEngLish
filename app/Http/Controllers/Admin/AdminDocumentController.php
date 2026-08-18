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
        $categoryId = $request->query('category_id');

        $categories = Category::all();
        $query = Document::with(['category', 'uploader']);

        if ($search) {
            $query->where('title', 'like', "%{$search}%");
        }

        if ($categoryId) {
            $query->where('category_id', $categoryId);
        }

        $documents = $query->latest()->paginate(10)->withQueryString();

        return view('admin.documents.index', compact('documents', 'categories', 'search', 'categoryId'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.documents.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'description' => 'nullable|string',
            'file' => 'required|file|max:20480', // 20MB max
        ], [
            'title.required' => 'Vui lòng nhập tên tài liệu.',
            'category_id.required' => 'Vui lòng chọn danh mục kỹ năng (Nghe, Nói, Đọc, Viết).',
            'file.required' => 'Vui lòng chọn tệp tài liệu để tải lên.',
            'file.max' => 'Dung lượng tệp tối đa là 20MB.',
        ]);

        $file = $request->file('file');
        $originalName = $file->getClientOriginalName();
        $extension = strtoupper($file->getClientOriginalExtension());
        $size = $file->getSize();

        $disk = config('filesystems.default', 'public');
        $filePath = $file->store('documents', $disk);

        Document::create([
            'title' => $request->title,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'file_path' => $filePath,
            'file_name' => $originalName,
            'file_size' => $size,
            'file_type' => $extension,
            'uploaded_by' => auth()->id(),
        ]);

        return redirect()->route('admin.documents.index')->with('success', 'Đã tải lên tài liệu mới thành công!');
    }

    public function edit(Document $document)
    {
        $categories = Category::all();
        return view('admin.documents.edit', compact('document', 'categories'));
    }

    public function update(Request $request, Document $document)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'description' => 'nullable|string',
            'file' => 'nullable|file|max:20480',
        ]);

        $document->title = $request->title;
        $document->category_id = $request->category_id;
        $document->description = $request->description;

        if ($request->hasFile('file')) {
            $disk = config('filesystems.default', 'public');
            // Delete old file
            if (Storage::disk($disk)->exists($document->file_path)) {
                Storage::disk($disk)->delete($document->file_path);
            } elseif (Storage::disk('public')->exists($document->file_path)) {
                Storage::disk('public')->delete($document->file_path);
            }

            $file = $request->file('file');
            $document->file_name = $file->getClientOriginalName();
            $document->file_type = strtoupper($file->getClientOriginalExtension());
            $document->file_size = $file->getSize();
            $document->file_path = $file->store('documents', $disk);
        }

        $document->save();

        return redirect()->route('admin.documents.index')->with('success', 'Cập nhật thông tin tài liệu thành công!');
    }

    public function destroy(Document $document)
    {
        $disk = config('filesystems.default', 'public');
        if (Storage::disk($disk)->exists($document->file_path)) {
            Storage::disk($disk)->delete($document->file_path);
        } elseif (Storage::disk('public')->exists($document->file_path)) {
            Storage::disk('public')->delete($document->file_path);
        }

        $document->delete();

        return redirect()->route('admin.documents.index')->with('success', 'Đã xóa tài liệu khỏi hệ thống!');
    }
}
