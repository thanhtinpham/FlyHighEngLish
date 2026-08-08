@extends('layouts.app')

@section('title', 'Thêm Khóa Học Mới - Admin Fly High English')

@section('content')
<section class="bg-slate-900 text-white py-10">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <a href="{{ route('admin.courses.index') }}" class="text-xs text-indigo-400 font-bold hover:underline mb-1 block">&larr; Trở lại danh sách khóa học</a>
        <h1 class="text-2xl font-black">Thêm Khóa Học Mới</h1>
    </div>
</section>

<section class="py-12 bg-slate-50">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <form action="{{ route('admin.courses.store') }}" method="POST" class="bg-white rounded-3xl p-6 sm:p-8 border border-slate-200 shadow-sm space-y-6">
            @csrf

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div class="sm:col-span-2">
                    <label class="block text-xs font-bold text-slate-700 mb-1">Tên khóa học *</label>
                    <input type="text" name="title" required placeholder="Nhập tên khóa học" class="w-full px-4 py-3 rounded-xl border border-slate-200 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">Phân loại khóa học *</label>
                    <select name="category" required class="w-full px-4 py-3 rounded-xl border border-slate-200 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
                        <option value="giao-tiep">Tiếng Anh Giao Tiếp</option>
                        <option value="ielts">Luyện Thi IELTS</option>
                        <option value="toeic">Luyện Thi TOEIC</option>
                        <option value="tre-em">Tiếng Anh Cho Trẻ Em</option>
                    </select>
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">Trình độ *</label>
                    <input type="text" name="level" required placeholder="Ví dụ: A1-B1, Intermediate" class="w-full px-4 py-3 rounded-xl border border-slate-200 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">Học phí (VNĐ)</label>
                    <input type="number" name="price" value="2500000" class="w-full px-4 py-3 rounded-xl border border-slate-200 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
                </div>

                <div class="flex items-center pt-6">
                    <label class="flex items-center gap-2 cursor-pointer text-sm font-bold text-slate-700">
                        <input type="checkbox" name="is_published" value="1" checked class="w-4 h-4 text-indigo-600 rounded">
                        Xuất bản hiển thị trên website
                    </label>
                </div>
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-700 mb-1">Mô tả tổng quan</label>
                <textarea name="description" rows="3" placeholder="Mô tả về khóa học..." class="w-full px-4 py-3 rounded-xl border border-slate-200 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500"></textarea>
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-700 mb-1">1. Mục tiêu khóa học (Nhập mỗi mục tiêu trên 1 dòng)</label>
                <textarea name="objectives" rows="3" placeholder="Thành thạo 500+ từ vựng&#10;Tự tin giao tiếp với người nước ngoài" class="w-full px-4 py-3 rounded-xl border border-slate-200 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500"></textarea>
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-700 mb-1">2. Lộ trình khóa học (Nhập mỗi bước lộ trình trên 1 dòng)</label>
                <textarea name="roadmap" rows="3" placeholder="Tuần 1-4: Phát âm IPA&#10;Tuần 5-8: Giao tiếp thực tế" class="w-full px-4 py-3 rounded-xl border border-slate-200 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500"></textarea>
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-700 mb-1">3. Cấu trúc bài học (Nhập mỗi mục trên 1 dòng)</label>
                <textarea name="structure" rows="3" placeholder="24 bài học HTML tương tác&#10;12 buổi học Zoom trực tuyến" class="w-full px-4 py-3 rounded-xl border border-slate-200 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500"></textarea>
            </div>

            <button type="submit" class="w-full py-3.5 bg-indigo-600 hover:bg-indigo-700 text-white font-extrabold text-sm rounded-xl shadow-md transition-all">
                Thêm Khóa Học Mới
            </button>
        </form>
    </div>
</section>
@endsection
