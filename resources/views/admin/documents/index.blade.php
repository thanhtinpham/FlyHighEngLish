@extends('layouts.app')

@section('title', 'Quản lý tài liệu - Admin')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 space-y-8">
    
    <!-- Top Header -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 bg-white p-6 sm:p-8 rounded-3xl border border-slate-100 shadow-sm">
        <div>
            <span class="px-3 py-1 bg-indigo-50 text-indigo-700 rounded-full text-xs font-bold border border-indigo-100">ADMIN CONTROL PANEL</span>
            <h1 class="text-2xl sm:text-3xl font-black text-slate-900 mt-1">Quản Lý Thư Viện Tài Liệu</h1>
            <p class="text-sm text-slate-500">Tải lên tệp mới, chỉnh sửa thông tin hoặc xóa tài liệu hệ thống</p>
        </div>

        <a href="{{ route('admin.documents.create') }}" class="px-6 py-3.5 bg-indigo-600 hover:bg-indigo-700 text-white font-bold text-sm rounded-2xl shadow-lg shadow-indigo-500/20 transition-all flex items-center justify-center gap-2">
            <i data-lucide="upload-cloud" class="w-4 h-4"></i> Upload Tài Liệu Mới
        </a>
    </div>

    <!-- Filter & Search Form -->
    <div class="bg-white p-4 sm:p-6 rounded-3xl border border-slate-100 shadow-sm">
        <form action="{{ route('admin.documents.index') }}" method="GET" class="grid grid-cols-1 sm:grid-cols-3 gap-4">
            <div>
                <label class="block text-xs font-bold text-slate-600 mb-1">Tìm kiếm tiêu đề / file</label>
                <div class="relative">
                    <input type="text" name="search" value="{{ $search ?? '' }}" 
                           placeholder="Nhập tên tài liệu..."
                           class="w-full pl-9 pr-4 py-2.5 rounded-xl border border-slate-200 text-xs focus:ring-2 focus:ring-indigo-500">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-slate-400">
                        <i data-lucide="search" class="w-4 h-4"></i>
                    </div>
                </div>
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-600 mb-1">Danh mục kỹ năng</label>
                <select name="category_id" class="w-full px-3 py-2.5 rounded-xl border border-slate-200 text-xs font-medium focus:ring-2 focus:ring-indigo-500">
                    <option value="">-- Tất cả danh mục --</option>
                    @foreach($categories as $cat)
                    <option value="{{ $cat->id }}" {{ ($categoryId ?? '') == $cat->id ? 'selected' : '' }}>
                        {{ $cat->name }}
                    </option>
                    @endforeach
                </select>
            </div>

            <div class="flex items-end gap-2">
                <button type="submit" class="flex-1 py-2.5 bg-slate-900 hover:bg-slate-800 text-white font-bold text-xs rounded-xl transition-all flex items-center justify-center gap-1.5">
                    <i data-lucide="filter" class="w-3.5 h-3.5"></i> Lọc Tài Liệu
                </button>
                @if(($search ?? '') || ($categoryId ?? ''))
                <a href="{{ route('admin.documents.index') }}" class="px-4 py-2.5 bg-slate-100 hover:bg-slate-200 text-slate-600 font-bold text-xs rounded-xl transition-all">
                    Đặt lại
                </a>
                @endif
            </div>
        </form>
    </div>

    <!-- Table Card -->
    <div class="bg-white rounded-3xl border border-slate-100 shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50/80 border-b border-slate-100 text-xs font-bold text-slate-500 uppercase tracking-wider">
                        <th class="px-6 py-4">Tên tài liệu</th>
                        <th class="px-6 py-4">Danh mục</th>
                        <th class="px-6 py-4">Tệp đính kèm</th>
                        <th class="px-6 py-4">Dung lượng</th>
                        <th class="px-6 py-4">Lượt tải</th>
                        <th class="px-6 py-4 text-right">Thao tác</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 text-sm">
                    @forelse($documents as $doc)
                    <tr class="hover:bg-slate-50/50 transition-colors">
                        <td class="px-6 py-4 font-bold text-slate-900 max-w-xs">
                            <a href="{{ route('documents.show', $doc) }}" target="_blank" class="hover:text-indigo-600 line-clamp-1 flex items-center gap-1">
                                {{ $doc->title }}
                                <i data-lucide="external-link" class="w-3 h-3 text-slate-400"></i>
                            </a>
                        </td>
                        <td class="px-6 py-4">
                            <span class="px-3 py-1 rounded-xl text-xs font-bold bg-indigo-50 text-indigo-700 border border-indigo-100">
                                {{ $doc->category->name }}
                            </span>
                        </td>
                        <td class="px-6 py-4 font-mono text-xs text-slate-600 max-w-xs truncate">
                            <span class="font-extrabold uppercase px-1.5 py-0.5 rounded bg-slate-100 text-slate-700 text-[10px] mr-1">
                                {{ $doc->file_type ?? 'FILE' }}
                            </span>
                            {{ $doc->file_name }}
                        </td>
                        <td class="px-6 py-4 text-xs text-slate-500">
                            {{ $doc->formatted_size }}
                        </td>
                        <td class="px-6 py-4 font-bold text-slate-700">
                            {{ $doc->download_count }}
                        </td>
                        <td class="px-6 py-4 text-right space-x-1.5 whitespace-nowrap">
                            <a href="{{ route('documents.download', $doc) }}" title="Tải thử file" class="inline-flex items-center gap-1 px-2.5 py-1.5 rounded-lg bg-indigo-50 text-indigo-700 hover:bg-indigo-100 font-bold text-xs">
                                <i data-lucide="download" class="w-3.5 h-3.5"></i> Tải
                            </a>
                            <a href="{{ route('admin.documents.edit', $doc) }}" class="inline-flex items-center gap-1 px-3 py-1.5 rounded-lg bg-amber-50 text-amber-700 hover:bg-amber-100 font-bold text-xs">
                                <i data-lucide="edit-3" class="w-3.5 h-3.5"></i> Sửa
                            </a>
                            <form action="{{ route('admin.documents.destroy', $doc) }}" method="POST" class="inline" onsubmit="return confirm('Bạn có chắc chắn muốn xóa tài liệu này?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="inline-flex items-center gap-1 px-3 py-1.5 rounded-lg bg-rose-50 text-rose-700 hover:bg-rose-100 font-bold text-xs">
                                    <i data-lucide="trash-2" class="w-3.5 h-3.5"></i> Xóa
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="px-6 py-12 text-center text-slate-400">
                            <div class="w-12 h-12 rounded-full bg-slate-100 flex items-center justify-center mx-auto mb-2 text-slate-400">
                                <i data-lucide="folder-x" class="w-6 h-6"></i>
                            </div>
                            <p class="font-bold text-slate-700 text-sm">Chưa có tài liệu nào trong danh sách</p>
                            <p class="text-xs text-slate-400 mt-1">Bấm "Upload Tài Liệu Mới" ở trên để đăng bài tập/file học tập lên hệ thống.</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="px-6 py-4 border-t border-slate-100">
            {{ $documents->links() }}
        </div>
    </div>

</div>
@endsection
