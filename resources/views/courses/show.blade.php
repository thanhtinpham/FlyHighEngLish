@extends('layouts.app')

@section('title', $course->title . ' - Danh Sách Bài Học')

@section('content')
<!-- Top Header Banner -->
<section class="bg-gradient-to-br from-emerald-50 via-teal-50/50 to-sky-50 py-12 border-b border-emerald-100/80 text-slate-900">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col lg:flex-row items-start lg:items-center justify-between gap-6">
            <div class="space-y-3 max-w-3xl">
                <div class="flex items-center gap-2">
                    <span class="px-3.5 py-1 bg-emerald-100 text-emerald-800 rounded-full text-xs font-extrabold uppercase tracking-wider border border-emerald-300">
                        {{ $course->category_label }}
                    </span>
                    <span class="text-xs text-slate-500 font-semibold flex items-center gap-1">
                        <i data-lucide="layers" class="w-3.5 h-3.5 text-sky-500"></i> {{ $course->level }}
                    </span>
                </div>
                <h1 class="text-2xl sm:text-3xl font-black text-slate-900 font-heading leading-tight">{{ $course->title }}</h1>
                <p class="text-slate-600 text-xs sm:text-sm leading-relaxed">{{ $course->description }}</p>
            </div>

            <div class="bg-white rounded-2xl p-5 text-slate-900 shrink-0 w-full lg:w-80 border border-emerald-200 shadow-xl shadow-emerald-900/5 flex flex-col justify-between gap-3">
                <div>
                    <span class="text-[11px] text-slate-400 block uppercase font-bold">Học phí niêm yết</span>
                    <span class="text-2xl font-black text-emerald-600 font-heading">{{ number_format($course->price) }} VNĐ</span>
                </div>

                @if($userEnrolled)
                    <a href="{{ route('learning_hub.index') }}" class="w-full py-3 bg-emerald-600 hover:bg-emerald-700 text-white text-xs font-extrabold rounded-xl flex items-center justify-center gap-2 shadow-emerald-glow transition-all">
                        <i data-lucide="check-circle" class="w-4 h-4"></i> Bạn Đã Đăng Ký Khóa Học
                    </a>
                @else
                    <button onclick="openModal('zaloModal')" class="w-full py-3 bg-emerald-600 hover:bg-emerald-700 text-white text-xs font-extrabold rounded-xl flex items-center justify-center gap-2 shadow-emerald-glow transition-all">
                        <i data-lucide="user-plus" class="w-4 h-4"></i> Đăng Ký Khóa Học Này
                    </button>
                @endif
            </div>
        </div>
    </div>
</section>

<!-- Direct Lesson Files List Section -->
<section class="py-12 bg-slate-50 min-h-[60vh]">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">
        
        <!-- Header bar -->
        <div class="bg-white rounded-2xl p-6 border border-slate-200 shadow-soft-sm flex flex-col sm:flex-row sm:items-center justify-between gap-4">
            <div class="flex items-center gap-3">
                <div class="w-11 h-11 rounded-2xl bg-emerald-600 text-white flex items-center justify-center font-bold shadow-emerald-glow shrink-0">
                    <i data-lucide="folder-open" class="w-5 h-5"></i>
                </div>
                <div>
                    <h2 class="text-xl font-black text-slate-900 font-heading">Danh Sách Bài Học & Tài Liệu</h2>
                    <p class="text-xs text-slate-500">Các tệp bài học HTML tương tác được cập nhật bởi Admin</p>
                </div>
            </div>
            <div class="flex items-center gap-2">
                <span class="px-3.5 py-1.5 bg-emerald-50 text-emerald-700 rounded-xl text-xs font-bold border border-emerald-200">
                    Tổng số: {{ $course->lessons->count() }} bài học
                </span>
            </div>
        </div>

        <!-- Lessons List -->
        <div class="space-y-4">
            @forelse($course->lessons as $index => $lesson)
            <div class="bg-white rounded-2xl p-5 border border-slate-200 shadow-soft-sm hover:border-emerald-300 hover:shadow-md transition-all flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                <div class="flex items-start gap-4">
                    <div class="w-10 h-10 rounded-xl bg-slate-100 text-slate-700 flex items-center justify-center font-black text-xs shrink-0 font-heading">
                        #{{ $index + 1 }}
                    </div>
                    <div class="space-y-1">
                        <div class="flex flex-wrap items-center gap-2">
                            <span class="px-2.5 py-0.5 bg-indigo-50 text-indigo-700 rounded text-[11px] font-bold border border-indigo-100">
                                {{ $lesson->level_or_week }}
                            </span>
                            @if($lesson->is_preview)
                                <span class="px-2 py-0.5 bg-emerald-100 text-emerald-800 text-[10px] font-extrabold rounded">
                                    ✓ Cho phép học thử
                                </span>
                            @else
                                <span class="px-2 py-0.5 bg-slate-100 text-slate-500 text-[10px] font-bold rounded">
                                    🔒 Yêu cầu đăng ký
                                </span>
                            @endif
                        </div>
                        <h3 class="font-extrabold text-slate-900 text-base font-heading hover:text-emerald-600 transition-colors">
                            <a href="{{ route('lessons.show', $lesson->id) }}">
                                {{ $lesson->title }}
                            </a>
                        </h3>
                        @if($lesson->description)
                            <p class="text-xs text-slate-500 line-clamp-2 leading-relaxed">{{ $lesson->description }}</p>
                        @endif
                    </div>
                </div>

                <div class="shrink-0 pt-2 sm:pt-0">
                    @if($lesson->is_preview || $userEnrolled)
                        <a href="{{ route('lessons.show', $lesson->id) }}" class="px-5 py-2.5 bg-emerald-600 hover:bg-emerald-700 text-white text-xs font-bold rounded-xl flex items-center justify-center gap-2 transition-all shadow-emerald-glow">
                            <i data-lucide="play" class="w-3.5 h-3.5"></i> Vào Học Bài Này
                        </a>
                    @else
                        <button onclick="openModal('zaloModal')" class="px-5 py-2.5 bg-slate-100 hover:bg-slate-200 text-slate-700 text-xs font-bold rounded-xl flex items-center justify-center gap-2 transition-all">
                            <i data-lucide="lock" class="w-3.5 h-3.5"></i> Đăng Ký Để Học
                        </button>
                    @endif
                </div>
            </div>
            @empty
            <div class="bg-white rounded-2xl p-12 text-center border border-slate-200 space-y-3">
                <i data-lucide="file-code-2" class="w-12 h-12 text-slate-300 mx-auto"></i>
                <h4 class="font-bold text-slate-700 text-base">Chưa có bài học nào</h4>
                <p class="text-xs text-slate-400">Hiện chưa có tệp bài học HTML nào được Admin tải lên cho khóa học này.</p>
            </div>
            @endforelse
        </div>

    </div>
</section>
@endsection
