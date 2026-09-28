@extends('layouts.app')

@section('title', 'Quản lý Tài liệu Khác (Nút liên kết) - Admin')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 space-y-8">
    
    <!-- Top Header -->
    <div class="bg-white p-6 sm:p-8 rounded-3xl border border-slate-100 shadow-sm space-y-6">
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
            <div>
                <span class="px-3 py-1 bg-indigo-50 text-indigo-700 rounded-full text-xs font-bold border border-indigo-100">ADMINISTRATION PORTAL</span>
                <h1 class="text-2xl sm:text-3xl font-black text-slate-900 mt-1">Quản Lý Thư Viện Tài Liệu</h1>
                <p class="text-sm text-slate-500">Quản lý các tài liệu trực tiếp trên hệ thống hoặc các nút liên kết đến tài liệu bên ngoài</p>
            </div>
        </div>

        <!-- Document Management Option Switcher (Tài liệu chung / Tài liệu khác) -->
        <div class="flex items-center gap-2 p-1.5 bg-slate-100/80 rounded-2xl border border-slate-200/80 w-fit">
            <a href="{{ route('admin.documents.index') }}" 
               class="px-5 py-2.5 rounded-xl font-bold text-xs transition-all flex items-center gap-2 text-slate-600 hover:text-slate-900">
                <i data-lucide="file-text" class="w-4 h-4 text-indigo-500"></i>
                Tài Liệu Chung
            </a>
            
            <a href="{{ route('admin.document-buttons.index') }}" 
               class="px-5 py-2.5 rounded-xl font-bold text-xs transition-all flex items-center gap-2 bg-white text-indigo-600 shadow-sm border border-slate-200/50">
                <i data-lucide="link-2" class="w-4 h-4 text-indigo-600"></i>
                Tài Liệu Khác (Nút Tùy Chỉnh)
            </a>
        </div>
    </div>

    <!-- Create New Custom Document Button Form Card -->
    <div class="bg-gradient-to-br from-slate-900 via-indigo-950 to-purple-950 rounded-3xl p-6 sm:p-8 text-white shadow-xl space-y-6">
        <div class="space-y-1">
            <div class="inline-flex items-center gap-1.5 px-3 py-0.5 rounded-full bg-indigo-500/20 text-indigo-300 text-xs font-bold border border-indigo-500/30">
                <i data-lucide="plus-circle" class="w-3.5 h-3.5 text-indigo-400"></i> TẠO NÚT TÀI LIỆU KHÁC
            </div>
            <h2 class="text-xl font-black text-white">Thêm Nút Liên Kết Trên Trang Tài Liệu</h2>
            <p class="text-xs text-indigo-200">Tạo nút tùy chỉnh (ví dụ: Link Google Drive, Trang đề thi...) sẽ hiển thị song song với nút "Tài liệu chung" cho người học</p>
        </div>

        <form action="{{ route('admin.document-buttons.store') }}" method="POST" class="space-y-4">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <!-- Tên nút -->
                <div>
                    <label for="name" class="block text-xs font-bold text-indigo-200 uppercase tracking-wider mb-2">Tên Nút <span class="text-rose-400">*</span></label>
                    <input type="text" id="name" name="name" required placeholder="VD: Thư Viện Google Drive B1"
                           class="w-full px-4 py-3 bg-white/10 border border-indigo-400/30 rounded-xl text-white text-sm placeholder-indigo-300/50 focus:outline-none focus:ring-2 focus:ring-indigo-400">
                </div>

                <!-- Đường dẫn -->
                <div>
                    <label for="url" class="block text-xs font-bold text-indigo-200 uppercase tracking-wider mb-2">Đường Dẫn (URL) <span class="text-rose-400">*</span></label>
                    <input type="text" id="url" name="url" required placeholder="VD: https://drive.google.com/... hoặc /courses"
                           class="w-full px-4 py-3 bg-white/10 border border-indigo-400/30 rounded-xl text-white text-sm placeholder-indigo-300/50 focus:outline-none focus:ring-2 focus:ring-indigo-400">
                </div>
            </div>

            <div class="flex flex-col sm:flex-row items-center justify-between gap-4 pt-2">
                <div class="flex items-center gap-2 text-xs text-indigo-200">
                    <input type="checkbox" id="is_active" name="is_active" value="1" checked class="w-4 h-4 rounded text-indigo-600 focus:ring-indigo-500 bg-white/10 border-indigo-400/30">
                    <label for="is_active" class="font-medium cursor-pointer">Hiển thị nút này công khai trên trang tài liệu</label>
                </div>

                <button type="submit" class="w-full sm:w-auto px-8 py-3.5 bg-gradient-to-r from-indigo-500 to-purple-600 hover:from-indigo-600 hover:to-purple-700 text-white font-extrabold text-sm rounded-xl shadow-lg shadow-indigo-500/30 transition-all flex items-center justify-center gap-2">
                    <i data-lucide="plus" class="w-4 h-4"></i> Thêm Nút Mới
                </button>
            </div>
        </form>
    </div>

    <!-- Search & Filter Bar -->
    <div class="bg-white p-4 sm:p-6 rounded-3xl border border-slate-100 shadow-sm">
        <form action="{{ route('admin.document-buttons.index') }}" method="GET" class="flex flex-col sm:flex-row items-center justify-between gap-4">
            <div class="relative w-full sm:w-96">
                <input type="text" name="search" value="{{ $search ?? '' }}" 
                       placeholder="Tìm kiếm nút theo tên / đường dẫn..."
                       class="w-full pl-9 pr-4 py-2.5 rounded-xl border border-slate-200 text-xs focus:ring-2 focus:ring-indigo-500">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-slate-400">
                    <i data-lucide="search" class="w-4 h-4"></i>
                </div>
            </div>

            <div class="flex items-center gap-2 w-full sm:w-auto">
                <button type="submit" class="px-5 py-2.5 bg-slate-900 hover:bg-slate-800 text-white font-bold text-xs rounded-xl transition-all flex items-center gap-1.5">
                    <i data-lucide="filter" class="w-3.5 h-3.5"></i> Tìm kiếm
                </button>
                @if($search ?? '')
                <a href="{{ route('admin.document-buttons.index') }}" class="px-4 py-2.5 bg-slate-100 hover:bg-slate-200 text-slate-600 font-bold text-xs rounded-xl transition-all">
                    Xóa tìm kiếm
                </a>
                @endif
            </div>
        </form>
    </div>

    <!-- Document Buttons List Table -->
    <div class="bg-white rounded-3xl border border-slate-100 shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50/80 border-b border-slate-100 text-xs font-bold text-slate-500 uppercase tracking-wider">
                        <th class="px-6 py-4">Tên Nút</th>
                        <th class="px-6 py-4">Đường Dẫn (URL)</th>
                        <th class="px-6 py-4">Trạng Thái</th>
                        <th class="px-6 py-4">Ngày Tạo</th>
                        <th class="px-6 py-4 text-right">Thao Tác</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 text-sm">
                    @forelse($buttons as $btn)
                    <tr class="hover:bg-slate-50/50 transition-colors">
                        <td class="px-6 py-4 font-bold text-slate-900 max-w-xs">
                            <div class="flex items-center gap-2">
                                <span class="w-7 h-7 rounded-lg bg-indigo-50 text-indigo-600 flex items-center justify-center shrink-0">
                                    <i data-lucide="link" class="w-3.5 h-3.5"></i>
                                </span>
                                <span>{{ $btn->name }}</span>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-xs font-mono text-indigo-600 max-w-sm truncate">
                            <a href="{{ $btn->url }}" target="_blank" class="hover:underline flex items-center gap-1">
                                <span class="truncate">{{ $btn->url }}</span>
                                <i data-lucide="external-link" class="w-3 h-3 text-slate-400 shrink-0"></i>
                            </a>
                        </td>
                        <td class="px-6 py-4">
                            @if($btn->is_active)
                            <span class="px-2.5 py-0.5 rounded-full text-xs font-bold bg-emerald-50 text-emerald-700 border border-emerald-100">
                                Hiển thị
                            </span>
                            @else
                            <span class="px-2.5 py-0.5 rounded-full text-xs font-bold bg-slate-100 text-slate-500 border border-slate-200">
                                Ẩn
                            </span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-xs text-slate-400">
                            {{ $btn->created_at ? $btn->created_at->format('d/m/Y H:i') : 'N/A' }}
                        </td>
                        <td class="px-6 py-4 text-right space-x-1.5 whitespace-nowrap">
                            <a href="{{ route('admin.document-buttons.edit', $btn) }}" class="inline-flex items-center gap-1 px-3 py-1.5 rounded-lg bg-amber-50 text-amber-700 hover:bg-amber-100 font-bold text-xs">
                                <i data-lucide="edit-3" class="w-3.5 h-3.5"></i> Sửa
                            </a>
                            <form action="{{ route('admin.document-buttons.destroy', $btn) }}" method="POST" class="inline" onsubmit="return confirm('Bạn có chắc chắn muốn xóa nút tài liệu này?')">
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
                        <td colspan="5" class="px-6 py-12 text-center text-slate-400">
                            <div class="w-12 h-12 rounded-full bg-slate-100 flex items-center justify-center mx-auto mb-2 text-slate-400">
                                <i data-lucide="link-2-off" class="w-6 h-6"></i>
                            </div>
                            <p class="font-bold text-slate-700 text-sm">Chưa có nút tài liệu khác nào</p>
                            <p class="text-xs text-slate-400 mt-1">Dùng form phía trên để tạo nút mới hiển thị song song với nút Tài Liệu Chung.</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($buttons->hasPages())
        <div class="px-6 py-4 border-t border-slate-100">
            {{ $buttons->links() }}
        </div>
        @endif
    </div>

</div>
@endsection
