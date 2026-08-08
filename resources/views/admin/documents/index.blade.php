@extends('layouts.app')

@section('title', 'Quản lý tài liệu - Admin')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 space-y-8">
    
    <!-- Top Action Header -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 bg-white p-6 rounded-3xl border border-slate-100 shadow-sm">
        <div>
            <h1 class="text-2xl font-black text-slate-900">Quản Lý Danh Sách Tài Liệu</h1>
            <p class="text-sm text-slate-500">Tải lên tệp mới, sửa hoặc xóa các tài liệu trên hệ thống</p>
        </div>

        <a href="{{ route('admin.documents.create') }}" class="px-5 py-3 bg-indigo-600 hover:bg-indigo-700 text-white font-bold text-sm rounded-2xl shadow-md shadow-indigo-500/20 transition-all flex items-center justify-center gap-2">
            <i data-lucide="plus-circle" class="w-4 h-4"></i> Upload Tài Liệu Mới
        </a>
    </div>

    <!-- Table Card -->
    <div class="bg-white rounded-3xl border border-slate-100 shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50/80 border-b border-slate-100 text-xs font-bold text-slate-500 uppercase tracking-wider">
                        <th class="px-6 py-4">Tên tài liệu</th>
                        <th class="px-6 py-4">Phân loại kỹ năng</th>
                        <th class="px-6 py-4">Tệp đính kèm</th>
                        <th class="px-6 py-4">Dung lượng</th>
                        <th class="px-6 py-4">Lượt tải</th>
                        <th class="px-6 py-4 text-right">Thao tác</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 text-sm">
                    @forelse($documents as $doc)
                    <tr class="hover:bg-slate-50/50 transition-colors">
                        <td class="px-6 py-4 font-bold text-slate-900 max-w-xs truncate">
                            <a href="{{ route('documents.show', $doc) }}" class="hover:text-indigo-600">
                                {{ $doc->title }}
                            </a>
                        </td>
                        <td class="px-6 py-4">
                            <span class="px-3 py-1 rounded-xl text-xs font-bold bg-indigo-50 text-indigo-700 border border-indigo-100">
                                {{ $doc->category->name }}
                            </span>
                        </td>
                        <td class="px-6 py-4 font-mono text-xs text-slate-600 max-w-xs truncate">
                            {{ $doc->file_name }}
                        </td>
                        <td class="px-6 py-4 text-xs text-slate-500">
                            {{ $doc->formatted_size }}
                        </td>
                        <td class="px-6 py-4 font-bold text-slate-700">
                            {{ $doc->download_count }}
                        </td>
                        <td class="px-6 py-4 text-right space-x-2">
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
                        <td colspan="6" class="px-6 py-10 text-center text-slate-400">
                            Chưa có tài liệu nào trong danh sách.
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
