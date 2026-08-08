@extends('layouts.app')

@section('title', 'Thêm Bài Học HTML - Admin Fly High English')

@section('content')
<section class="bg-slate-900 text-white py-10">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <a href="{{ route('admin.lessons.index') }}" class="text-xs text-indigo-400 font-bold hover:underline mb-1 block">&larr; Trở lại danh sách bài học</a>
        <h1 class="text-2xl font-black">Thêm / Upload Bài Học HTML Mới</h1>
    </div>
</section>

<section class="py-12 bg-slate-50">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <form action="{{ route('admin.lessons.store') }}" method="POST" enctype="multipart/form-data" class="bg-white rounded-3xl p-6 sm:p-8 border border-slate-200 shadow-sm space-y-6">
            @csrf

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">Thuộc Khóa Học *</label>
                    <select name="course_id" required class="w-full px-4 py-3 rounded-xl border border-slate-200 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
                        @foreach($courses as $c)
                        <option value="{{ $c->id }}">{{ $c->title }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">Cấp độ / Tuần học *</label>
                    <input type="text" name="level_or_week" value="Tuần 1" required placeholder="Ví dụ: Tuần 1 - Buổi 1" class="w-full px-4 py-3 rounded-xl border border-slate-200 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
                </div>

                <div class="sm:col-span-2">
                    <label class="block text-xs font-bold text-slate-700 mb-1">Tên bài học HTML *</label>
                    <input type="text" name="title" required placeholder="Nhập tên bài học" class="w-full px-4 py-3 rounded-xl border border-slate-200 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">Thứ tự bài học</label>
                    <input type="number" name="order" value="1" class="w-full px-4 py-3 rounded-xl border border-slate-200 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
                </div>

                <div class="flex items-center pt-6">
                    <label class="flex items-center gap-2 cursor-pointer text-sm font-bold text-slate-700">
                        <input type="checkbox" name="is_preview" value="1" class="w-4 h-4 text-emerald-600 rounded">
                        Cho phép Khách học thử (HTML Preview)
                    </label>
                </div>
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-700 mb-1">Mô tả bài học</label>
                <textarea name="description" rows="2" placeholder="Tóm tắt ngắn gọn bài học..." class="w-full px-4 py-3 rounded-xl border border-slate-200 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500"></textarea>
            </div>

            <!-- Upload HTML file or Paste raw HTML -->
            <div class="p-5 rounded-2xl bg-slate-50 border border-slate-200 space-y-4">
                <h3 class="font-extrabold text-slate-900 text-sm">Nội Dung Bài Học HTML Tương Tác</h3>
                
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">Cách 1: Tải lên file `.html` bài học tương tác</label>
                    <input type="file" name="html_file" accept=".html,.htm,.txt" class="w-full text-xs text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-extrabold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100">
                </div>

                <div class="relative flex py-1 items-center">
                    <div class="flex-grow border-t border-slate-200"></div>
                    <span class="flex-shrink mx-4 text-slate-400 text-[10px] uppercase font-bold">Hoặc</span>
                    <div class="flex-grow border-t border-slate-200"></div>
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">Cách 2: Soạn thảo mã HTML / CSS / JS trực tiếp</label>
                    <textarea name="html_content" rows="6" placeholder="<div class='lesson'>...</div>" class="w-full px-4 py-3 rounded-xl border border-slate-200 font-mono text-xs focus:outline-none focus:ring-2 focus:ring-indigo-500"></textarea>
                </div>
            </div>

            <button type="submit" class="w-full py-3.5 bg-emerald-600 hover:bg-emerald-700 text-white font-extrabold text-sm rounded-xl shadow-md transition-all">
                Lưu Bài Học HTML
            </button>
        </form>
    </div>
</section>
@endsection
