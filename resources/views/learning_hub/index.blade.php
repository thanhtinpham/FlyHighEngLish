@extends('layouts.app')

@section('title', 'Góc Học Tập Tương Tác LMS - Fly High English')

@section('content')
<section class="bg-slate-900 text-white py-12 border-b border-slate-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col md:flex-row items-start md:items-center justify-between gap-4">
        <div>
            <div class="flex items-center gap-2 mb-1">
                <span class="px-3 py-0.5 bg-indigo-500/20 text-indigo-400 rounded-full text-xs font-bold">LMS INTERACTIVE HUB</span>
                <span class="text-xs text-slate-400 font-medium">Học viên: {{ auth()->user()->name }}</span>
            </div>
            <h1 class="text-3xl font-black text-white">Phòng Học Tương Tác Trực Tuyến</h1>
        </div>
        <a href="{{ route('courses.index') }}" class="px-4 py-2.5 bg-slate-800 hover:bg-slate-700 text-slate-200 border border-slate-700 text-xs font-bold rounded-xl transition-all">
            + Khám Phá Thêm Khóa Học
        </a>
    </div>
</section>

<section class="py-12 bg-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12">

        @forelse($enrolledCourses as $course)
        <div class="bg-white rounded-3xl p-6 sm:p-8 border border-slate-200 shadow-sm space-y-6">
            
            <!-- Course Header -->
            <div class="flex flex-col sm:flex-row sm:items-center justify-between border-b pb-4 gap-3">
                <div>
                    <span class="px-3 py-1 bg-indigo-50 text-indigo-700 rounded-full text-xs font-bold">
                        {{ $course->category_label }}
                    </span>
                    <h2 class="text-xl font-extrabold text-slate-900 mt-1">{{ $course->title }}</h2>
                </div>
                <div class="text-xs text-slate-500">
                    Sĩ số: <strong>{{ $course->lessons->count() }} bài học HTML</strong>
                </div>
            </div>

            <!-- Lessons Grid Organized by Level/Week -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                @forelse($course->lessons as $lesson)
                    @php
                        $userProg = $userProgresses[$lesson->id] ?? null;
                        $isDone = $userProg && $userProg->status === 'completed';
                    @endphp

                    <div class="p-5 rounded-2xl border transition-all flex flex-col justify-between {{ $isDone ? 'bg-emerald-50/40 border-emerald-200' : 'bg-slate-50 border-slate-200 hover:border-indigo-300' }}">
                        <div>
                            <div class="flex items-center justify-between mb-2">
                                <span class="text-[11px] font-bold text-indigo-600">{{ $lesson->level_or_week }}</span>
                                @if($isDone)
                                    <span class="px-2.5 py-0.5 bg-emerald-600 text-white rounded-full text-[10px] font-extrabold flex items-center gap-1">
                                        <i data-lucide="check" class="w-3 h-3"></i> Đã hoàn thành ({{ $userProg->score ?? 100 }} đ)
                                    </span>
                                @else
                                    <span class="px-2.5 py-0.5 bg-slate-200 text-slate-700 rounded-full text-[10px] font-bold">
                                        Chưa xong
                                    </span>
                                @endif
                            </div>

                            <h4 class="font-extrabold text-slate-900 text-sm mb-1 line-clamp-2">
                                {{ $lesson->title }}
                            </h4>
                            <p class="text-xs text-slate-500 line-clamp-2 mb-4">
                                {{ $lesson->description }}
                            </p>
                        </div>

                        <a href="{{ route('lessons.show', $lesson->id) }}" class="w-full py-2.5 rounded-xl font-bold text-xs flex items-center justify-center gap-2 transition-all {{ $isDone ? 'bg-emerald-600 hover:bg-emerald-700 text-white' : 'bg-indigo-600 hover:bg-indigo-700 text-white shadow-md' }}">
                            <i data-lucide="play-circle" class="w-4 h-4"></i> {{ $isDone ? 'Học Lại Bài HTML' : 'Vào Học Bài HTML' }}
                        </a>
                    </div>
                @empty
                    <div class="col-span-3 text-xs text-slate-400 py-4">Đang cập nhật bài học...</div>
                @endforelse
            </div>

        </div>
        @empty
        <div class="bg-white rounded-3xl p-12 text-center border border-slate-200 max-w-2xl mx-auto space-y-4">
            <div class="w-16 h-16 rounded-full bg-indigo-50 text-indigo-600 flex items-center justify-center mx-auto text-2xl font-bold">
                <i data-lucide="book-open-check" class="w-8 h-8"></i>
            </div>
            <h3 class="text-xl font-extrabold text-slate-900">Bạn Chưa Đăng Ký Khóa Học Nào</h3>
            <p class="text-xs text-slate-500">Hãy liên hệ Zalo hoặc đăng ký khóa học để bắt đầu truy cập bài học HTML tương tác trực tuyến.</p>
            <a href="{{ route('courses.index') }}" class="inline-block px-6 py-3 bg-indigo-600 hover:bg-indigo-700 text-white text-xs font-extrabold rounded-xl shadow-md transition-all">
                Xem Danh Sách Khóa Học Ngay
            </a>
        </div>
        @endforelse

    </div>
</section>
@endsection
