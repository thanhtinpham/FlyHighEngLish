@extends('layouts.app')

@section('title', 'Chỉnh sửa Nút Tài liệu - Admin')

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-10 space-y-6">
    
    <div class="flex items-center justify-between">
        <a href="{{ route('admin.document-buttons.index') }}" class="inline-flex items-center gap-2 text-sm font-bold text-slate-500 hover:text-indigo-600 transition-colors">
            <i data-lucide="arrow-left" class="w-4 h-4"></i> Quay lại danh sách nút tài liệu
        </a>
    </div>

    <div class="bg-white rounded-3xl border border-slate-100 shadow-sm p-6 sm:p-8 space-y-6">
        <div>
            <span class="px-3 py-1 bg-amber-50 text-amber-700 rounded-full text-xs font-bold border border-amber-100">CHỈNH SỬA NÚT TÀI LIỆU KHÁC</span>
            <h1 class="text-2xl font-black text-slate-900 mt-2">Cập Nhật Nút: {{ $button->name }}</h1>
            <p class="text-sm text-slate-500">Sửa tên nút hoặc đường dẫn liên kết hiển thị trên trang tài liệu người dùng.</p>
        </div>

        <form action="{{ route('admin.document-buttons.update', $button) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <div class="space-y-4">
                <!-- Tên nút -->
                <div>
                    <label for="name" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Tên Nút <span class="text-rose-500">*</span></label>
                    <input type="text" id="name" name="name" value="{{ old('name', $button->name) }}" required
                           class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    @error('name')
                    <p class="text-xs text-rose-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Đường dẫn -->
                <div>
                    <label for="url" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Đường Dẫn (URL) <span class="text-rose-500">*</span></label>
                    <input type="text" id="url" name="url" value="{{ old('url', $button->url) }}" required
                           class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    @error('url')
                    <p class="text-xs text-rose-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Trạng thái -->
                <div class="pt-2 flex items-center gap-2">
                    <input type="checkbox" id="is_active" name="is_active" value="1" {{ $button->is_active ? 'checked' : '' }} class="w-4 h-4 rounded text-indigo-600 focus:ring-indigo-500 border-slate-300">
                    <label for="is_active" class="text-xs font-bold text-slate-700 cursor-pointer">Hiển thị nút này công khai trên trang tài liệu</label>
                </div>
            </div>

            <div class="flex items-center justify-end gap-3 pt-4 border-t border-slate-100">
                <a href="{{ route('admin.document-buttons.index') }}" class="px-5 py-3 rounded-xl bg-slate-100 font-bold text-sm text-slate-600 hover:bg-slate-200 transition-colors">
                    Hủy bỏ
                </a>
                <button type="submit" class="px-7 py-3 bg-indigo-600 hover:bg-indigo-700 text-white font-extrabold text-sm rounded-xl shadow-lg shadow-indigo-500/20 transition-all flex items-center gap-2">
                    <i data-lucide="check" class="w-4 h-4"></i> Lưu Cập Nhật
                </button>
            </div>
        </form>
    </div>

</div>
@endsection
