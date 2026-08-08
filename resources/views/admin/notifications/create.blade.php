@extends('layouts.app')

@section('title', 'Tạo thông báo mới - Admin')

@section('content')
<div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 py-10 space-y-6">
    
    <a href="{{ route('admin.notifications.index') }}" class="inline-flex items-center gap-2 text-sm font-bold text-slate-500 hover:text-emerald-600">
        <i data-lucide="arrow-left" class="w-4 h-4"></i> Quay lại danh sách thông báo
    </a>

    <div class="bg-white rounded-3xl border border-slate-100 shadow-xl p-8 sm:p-10 space-y-6">
        <div>
            <h1 class="text-2xl font-black text-slate-900">Đăng Thông Báo Mới</h1>
            <p class="text-sm text-slate-500">Soạn thông báo hiển thị tới toàn bộ học viên hệ thống</p>
        </div>

        <form action="{{ route('admin.notifications.store') }}" method="POST" class="space-y-6">
            @csrf

            <div>
                <label for="title" class="block text-sm font-bold text-slate-700 mb-1">Tiêu đề thông báo <span class="text-rose-500">*</span></label>
                <input type="text" id="title" name="title" required value="{{ old('title') }}"
                       class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:ring-2 focus:ring-emerald-500 text-sm"
                       placeholder="Ví dụ: Cập nhật lịch đăng tài liệu luyện thi IELTS đợt mới">
                @error('title')
                <p class="mt-1 text-xs text-rose-600 font-medium">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="content" class="block text-sm font-bold text-slate-700 mb-1">Nội dung chi tiết thông báo <span class="text-rose-500">*</span></label>
                <textarea id="content" name="content" rows="6" required
                          class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:ring-2 focus:ring-emerald-500 text-sm"
                          placeholder="Nhập nội dung thông báo đầy đủ tại đây...">{{ old('content') }}</textarea>
                @error('content')
                <p class="mt-1 text-xs text-rose-600 font-medium">{{ $message }}</p>
                @enderror
            </div>

            <div class="bg-amber-50 p-4 rounded-2xl border border-amber-200/80">
                <label class="flex items-center gap-3 cursor-pointer">
                    <input type="checkbox" name="is_pinned" value="1" {{ old('is_pinned') ? 'checked' : '' }} class="w-5 h-5 rounded border-amber-300 text-amber-600 focus:ring-amber-500">
                    <div>
                        <span class="font-bold text-sm text-amber-900 block flex items-center gap-1.5">
                            <i data-lucide="pin" class="w-4 h-4 text-amber-600"></i> Ghim thông báo này ở vị trí ưu tiên
                        </span>
                        <span class="text-xs text-amber-700">Thông báo ghim sẽ nổi bật ở trang chủ học viên và đầu danh sách.</span>
                    </div>
                </label>
            </div>

            <div class="pt-4 border-t border-slate-100 flex items-center justify-end gap-3">
                <a href="{{ route('admin.notifications.index') }}" class="px-5 py-3 rounded-xl bg-slate-100 font-bold text-sm text-slate-600 hover:bg-slate-200">
                    Hủy bỏ
                </a>
                <button type="submit" class="px-6 py-3 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white font-bold text-sm shadow-lg shadow-emerald-500/20">
                    Đăng Thông Báo
                </button>
            </div>

        </form>
    </div>

</div>
@endsection
