@extends('layouts.app')

@section('title', 'Chỉnh sửa tài liệu - Admin')

@section('content')
<div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 py-10 space-y-6">
    
    <a href="{{ route('admin.documents.index') }}" class="inline-flex items-center gap-2 text-sm font-bold text-slate-500 hover:text-indigo-600">
        <i data-lucide="arrow-left" class="w-4 h-4"></i> Quay lại quản lý tài liệu
    </a>

    <div class="bg-white rounded-3xl border border-slate-100 shadow-xl p-8 sm:p-10 space-y-6">
        <div>
            <h1 class="text-2xl font-black text-slate-900">Chỉnh Sửa Tài Liệu</h1>
            <p class="text-sm text-slate-500">Cập nhật thông tin hoặc thay thế tệp tài liệu hiện tại</p>
        </div>

        <form action="{{ route('admin.documents.update', $document) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <div>
                <label for="title" class="block text-sm font-bold text-slate-700 mb-1">Tên tiêu đề tài liệu <span class="text-rose-500">*</span></label>
                <input type="text" id="title" name="title" required value="{{ old('title', $document->title) }}"
                       class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:ring-2 focus:ring-indigo-500 text-sm">
            </div>

            <div>
                <label for="category_id" class="block text-sm font-bold text-slate-700 mb-1">Danh mục kỹ năng <span class="text-rose-500">*</span></label>
                <select id="category_id" name="category_id" required
                        class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:ring-2 focus:ring-indigo-500 text-sm font-medium">
                    @foreach($categories as $cat)
                    <option value="{{ $cat->id }}" {{ old('category_id', $document->category_id) == $cat->id ? 'selected' : '' }}>
                        {{ $cat->name }}
                    </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="description" class="block text-sm font-bold text-slate-700 mb-1">Mô tả bổ sung</label>
                <textarea id="description" name="description" rows="4"
                          class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:ring-2 focus:ring-indigo-500 text-sm">{{ old('description', $document->description) }}</textarea>
            </div>

            <div>
                <label for="file" class="block text-sm font-bold text-slate-700 mb-1">Thay thế tệp tin (Không bắt buộc)</label>
                <p class="text-xs text-slate-500 mb-2">Tệp hiện tại: <strong>{{ $document->file_name }}</strong> ({{ $document->formatted_size }})</p>
                <input type="file" id="file" name="file" class="block w-full text-sm text-slate-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-slate-200 file:text-slate-800 hover:file:bg-slate-300 cursor-pointer">
            </div>

            <div class="pt-4 border-t border-slate-100 flex items-center justify-end gap-3">
                <a href="{{ route('admin.documents.index') }}" class="px-5 py-3 rounded-xl bg-slate-100 font-bold text-sm text-slate-600 hover:bg-slate-200">
                    Hủy bỏ
                </a>
                <button type="submit" class="px-6 py-3 rounded-xl bg-amber-600 hover:bg-amber-700 text-white font-bold text-sm shadow-lg shadow-amber-500/20">
                    Lưu Thay Đổi
                </button>
            </div>

        </form>
    </div>

</div>
@endsection
