<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DocumentButton;
use Illuminate\Http\Request;

class AdminDocumentButtonController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->query('search');

        $query = DocumentButton::query();

        if ($search) {
            $query->where('name', 'like', "%{$search}%")
                  ->orWhere('url', 'like', "%{$search}%");
        }

        $buttons = $query->orderBy('sort_order', 'asc')->latest()->paginate(15)->withQueryString();

        return view('admin.document_buttons.index', compact('buttons', 'search'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'url' => 'required|string|max:2048',
            'icon' => 'nullable|string|max:50',
            'sort_order' => 'nullable|integer',
            'is_active' => 'nullable|boolean',
        ]);

        $validated['icon'] = $validated['icon'] ?? 'external-link';
        $validated['sort_order'] = $validated['sort_order'] ?? 0;
        $validated['is_active'] = $request->has('is_active') ? (bool) $request->is_active : true;

        DocumentButton::create($validated);

        return redirect()->route('admin.document-buttons.index')->with('success', 'Đã thêm nút tài liệu mới thành công!');
    }

    public function edit(DocumentButton $documentButton)
    {
        return view('admin.document_buttons.edit', [
            'button' => $documentButton
        ]);
    }

    public function update(Request $request, DocumentButton $documentButton)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'url' => 'required|string|max:2048',
            'icon' => 'nullable|string|max:50',
            'sort_order' => 'nullable|integer',
            'is_active' => 'nullable|boolean',
        ]);

        $validated['icon'] = $validated['icon'] ?? 'external-link';
        $validated['sort_order'] = $validated['sort_order'] ?? 0;
        $validated['is_active'] = $request->has('is_active') ? (bool) $request->is_active : false;

        $documentButton->update($validated);

        return redirect()->route('admin.document-buttons.index')->with('success', 'Cập nhật nút tài liệu thành công!');
    }

    public function destroy(DocumentButton $documentButton)
    {
        $documentButton->delete();

        return redirect()->route('admin.document-buttons.index')->with('success', 'Đã xóa nút tài liệu!');
    }
}
