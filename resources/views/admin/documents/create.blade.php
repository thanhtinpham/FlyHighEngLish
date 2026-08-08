@extends('layouts.app')

@section('title', 'Tải lên tài liệu mới - Admin')

@section('content')
<div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 py-10 space-y-6">
    
    <a href="{{ route('admin.documents.index') }}" class="inline-flex items-center gap-2 text-sm font-bold text-slate-500 hover:text-indigo-600">
        <i data-lucide="arrow-left" class="w-4 h-4"></i> Quay lại quản lý tài liệu
    </a>

    <div class="bg-white rounded-3xl border border-slate-100 shadow-xl p-8 sm:p-10 space-y-6">
        <div>
            <h1 class="text-2xl font-black text-slate-900">Upload Tài Liệu Mới</h1>
            <p class="text-sm text-slate-500">Tải tệp PDF, DOCX, MP3, ZIP... lên hệ thống và chọn danh mục kỹ năng</p>
        </div>

        <form action="{{ route('admin.documents.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <div>
                <label for="title" class="block text-sm font-bold text-slate-700 mb-1">Tên tiêu đề tài liệu <span class="text-rose-500">*</span></label>
                <input type="text" id="title" name="title" required value="{{ old('title') }}"
                       class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:ring-2 focus:ring-indigo-500 text-sm"
                       placeholder="Ví dụ: Bộ đề thi thử Listening IELTS Cambridge 18 Full Audio">
                @error('title')
                <p class="mt-1 text-xs text-rose-600 font-medium">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="category_id" class="block text-sm font-bold text-slate-700 mb-1">Danh mục kỹ năng <span class="text-rose-500">*</span></label>
                <select id="category_id" name="category_id" required
                        class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:ring-2 focus:ring-indigo-500 text-sm font-medium">
                    <option value="">-- Chọn kỹ năng (Nghe, Nói, Đọc, Viết) --</option>
                    @foreach($categories as $cat)
                    <option value="{{ $cat->id }}" {{ old('category_id') == $cat->id ? 'selected' : '' }}>
                        {{ $cat->name }}
                    </option>
                    @endforeach
                </select>
                @error('category_id')
                <p class="mt-1 text-xs text-rose-600 font-medium">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="description" class="block text-sm font-bold text-slate-700 mb-1">Mô tả bổ sung</label>
                <textarea id="description" name="description" rows="4"
                          class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:ring-2 focus:ring-indigo-500 text-sm"
                          placeholder="Mô tả nội dung tài liệu, cách học hoặc hướng dẫn làm bài...">{{ old('description') }}</textarea>
            </div>

            <div>
                <label for="file" class="block text-sm font-bold text-slate-700 mb-1">Chọn tệp tài liệu <span class="text-rose-500">*</span></label>
                <div class="border-2 border-dashed border-slate-200 rounded-2xl p-6 text-center hover:border-indigo-500 transition-colors bg-slate-50">
                    <i data-lucide="upload-cloud" class="w-10 h-10 text-indigo-500 mx-auto mb-2"></i>
                    <input type="file" id="file" name="file" required class="block w-full text-sm text-slate-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-indigo-600 file:text-white hover:file:bg-indigo-700 cursor-pointer">
                    <p class="mt-2 text-xs text-slate-400">Hỗ trợ các định dạng PDF, DOCX, MP3, ZIP... Dung lượng tối đa: 20MB</p>
                </div>
                @error('file')
                <p class="mt-1 text-xs text-rose-600 font-medium">{{ $message }}</p>
                @enderror
            </div>

            <div class="pt-4 border-t border-slate-100 flex items-center justify-end gap-3">
                <a href="{{ route('admin.documents.index') }}" class="px-5 py-3 rounded-xl bg-slate-100 font-bold text-sm text-slate-600 hover:bg-slate-200">
                    Hủy bỏ
                </a>
                <button type="submit" class="px-6 py-3 rounded-xl bg-indigo-600 hover:bg-indigo-700 text-white font-bold text-sm shadow-lg shadow-indigo-500/20">
                    Tải Lên Tài Liệu
                </button>
            </div>

        </form>
    </div>

</div>
@endsection
