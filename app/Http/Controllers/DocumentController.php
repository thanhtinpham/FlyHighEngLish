<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{
    public function index(Request $request)
    {
        $selectedCategorySlug = $request->query('category');
        $search = $request->query('search');

        $categories = Category::all();

        $query = Document::with(['category', 'uploader']);

        if ($selectedCategorySlug) {
            $category = Category::where('slug', $selectedCategorySlug)->first();
            if ($category) {
                $query->where('category_id', $category->id);
            }
        }

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%")
                  ->orWhere('file_name', 'like', "%{$search}%");
            });
        }

        $documents = $query->latest()->paginate(9)->withQueryString();

        return view('documents.index', compact('documents', 'categories', 'selectedCategorySlug', 'search'));
    }

    public function show(Document $document)
    {
        $document->load(['category', 'uploader']);
        $relatedDocuments = Document::where('category_id', $document->category_id)
            ->where('id', '!=', $document->id)
            ->take(3)
            ->get();

        return view('documents.show', compact('document', 'relatedDocuments'));
    }

    public function download(Document $document)
    {
        // Check if file exists on disk
        if (!Storage::disk('public')->exists($document->file_path)) {
            return back()->with('error', 'Tệp tài liệu không tồn tại trên hệ thống!');
        }

        // Increment download counter
        $document->increment('download_count');

        // Trigger secure file download
        return Storage::disk('public')->download($document->file_path, $document->file_name);
    }
}
