@extends('layouts.app')

@section('title', $course->title . ' - Fly High English')

@section('content')
<!-- Banner in Modern Light Style -->
<section class="bg-gradient-to-br from-emerald-50 via-teal-50/50 to-sky-50 py-14 border-b border-emerald-100/80 text-slate-900">
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
                <h1 class="text-3xl sm:text-4xl font-black text-slate-900 font-heading leading-tight">{{ $course->title }}</h1>
                <p class="text-slate-600 text-sm leading-relaxed">{{ $course->description }}</p>
            </div>

            <div class="bg-white rounded-2xl p-6 text-slate-900 shrink-0 w-full lg:w-80 border border-emerald-200 shadow-xl shadow-emerald-900/5">
                <div class="mb-4">
                    <span class="text-xs text-slate-500 block uppercase font-bold">Học phí niêm yết</span>
                    <span class="text-2xl font-black text-emerald-600 font-heading">{{ number_format($course->price) }} VNĐ</span>
                </div>

                @if($userEnrolled)
                    <a href="{{ route('learning_hub.index') }}" class="w-full py-3.5 bg-emerald-600 hover:bg-emerald-700 text-white text-xs font-extrabold rounded-xl flex items-center justify-center gap-2 shadow-emerald-glow transition-all">
                        <i data-lucide="check-circle" class="w-4 h-4"></i> Bạn Đã Đăng Ký - Vào Học Ngay
                    </a>
                @else
                    <button onclick="openModal('zaloModal')" class="w-full py-3.5 bg-emerald-600 hover:bg-emerald-700 text-white text-xs font-extrabold rounded-xl flex items-center justify-center gap-2 shadow-emerald-glow transition-all">
                        <i data-lucide="user-plus" class="w-4 h-4"></i> Đăng Ký Khóa Học Này
                    </button>
                @endif
            </div>
        </div>
    </div>
</section>

<!-- Course Details Section -->
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 lg:grid-cols-12 gap-12">
        
        <!-- Main Content Column -->
        <div class="lg:col-span-8 space-y-12">
            
            <!-- 1. Mục Tiêu Khóa Học (Objectives) -->
            <div class="p-8 rounded-3xl bg-emerald-50/60 border border-emerald-100 space-y-4">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-xl bg-emerald-600 text-white flex items-center justify-center font-bold shadow-emerald-glow">
                        <i data-lucide="target" class="w-5 h-5"></i>
                    </div>
                    <h2 class="text-2xl font-extrabold text-slate-900 font-heading">1. Mục Tiêu Khóa Học</h2>
                </div>

                <ul class="space-y-3 text-sm text-slate-700">
                    @if(is_array($course->objectives))
                        @foreach($course->objectives as $obj)
                        <li class="flex items-start gap-3">
                            <i data-lucide="check-circle-2" class="w-5 h-5 text-emerald-600 shrink-0 mt-0.5"></i>
                            <span>{{ $obj }}</span>
                        </li>
                        @endforeach
                    @else
                        <li class="flex items-start gap-3">
                            <i data-lucide="check-circle-2" class="w-5 h-5 text-emerald-600 shrink-0 mt-0.5"></i>
                            <span>Thành thạo kiến thức và kỹ năng chuẩn đầu ra của khóa học {{ $course->title }}.</span>
                        </li>
                    @endif
                </ul>
            </div>

            <!-- 2. Lộ Trình Học Tập (Roadmap) -->
            <div class="p-8 rounded-3xl bg-slate-50 border border-slate-200 space-y-6">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-xl bg-sky-600 text-white flex items-center justify-center font-bold shadow-sky-glow">
                        <i data-lucide="map" class="w-5 h-5"></i>
                    </div>
                    <h2 class="text-2xl font-extrabold text-slate-900 font-heading">2. Lộ Trình Chi Tiết</h2>
                </div>

                <div class="space-y-4">
                    @if(is_array($course->roadmap))
                        @foreach($course->roadmap as $index => $step)
                        <div class="p-4 bg-white rounded-2xl border border-slate-200 flex items-start gap-4 shadow-soft-sm">
                            <span class="w-8 h-8 rounded-xl bg-emerald-100 text-emerald-800 font-extrabold text-xs flex items-center justify-center shrink-0 font-heading">
                                {{ $index + 1 }}
                            </span>
                            <div class="text-sm font-semibold text-slate-800 pt-1">
                                {{ $step }}
                            </div>
                        </div>
                        @endforeach
                    @endif
                </div>
            </div>

            <!-- 3. Cấu Trúc Bài Học (Structure) -->
            <div class="p-8 rounded-3xl bg-white border border-slate-200 shadow-soft-sm space-y-6">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-xl bg-amber-500 text-slate-950 flex items-center justify-center font-bold shadow-gold-glow">
                        <i data-lucide="layers" class="w-5 h-5"></i>
                    </div>
                    <h2 class="text-2xl font-extrabold text-slate-900 font-heading">3. Cấu Trúc Bài Học</h2>
                </div>

                <ul class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    @if(is_array($course->structure))
                        @foreach($course->structure as $st)
                        <li class="p-4 bg-amber-50/60 rounded-2xl border border-amber-100 text-xs font-semibold text-slate-800 flex items-center gap-2">
                            <i data-lucide="check" class="w-4 h-4 text-amber-600"></i>
                            {{ $st }}
                        </li>
                        @endforeach
                    @endif
                </ul>
            </div>

            <!-- 4. Bản Xem Trước Bài Học HTML (HTML Lesson Preview) -->
            <div class="p-8 rounded-3xl bg-slate-50 border border-slate-200 text-slate-900 space-y-6">
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-xl bg-emerald-600 text-white flex items-center justify-center font-bold shadow-emerald-glow">
                            <i data-lucide="monitor-play" class="w-5 h-5"></i>
                        </div>
                        <div>
                            <h2 class="text-2xl font-extrabold text-slate-900 font-heading">4. Bản Xem Trước Bài Học HTML</h2>
                            <p class="text-xs text-slate-500">Trải nghiệm tính năng học bài HTML tương tác trực tiếp</p>
                        </div>
                    </div>
                    <span class="px-3 py-1 bg-emerald-100 text-emerald-800 rounded-full text-xs font-extrabold border border-emerald-300">HTML PREVIEW</span>
                </div>

                <div class="space-y-3">
                    @forelse($course->lessons as $lesson)
                    <div class="p-4 rounded-2xl bg-white border border-slate-200 flex items-center justify-between shadow-soft-sm">
                        <div>
                            <div class="flex items-center gap-2 mb-1">
                                <span class="text-xs font-bold text-emerald-700">{{ $lesson->level_or_week }}</span>
                                @if($lesson->is_preview)
                                    <span class="px-2 py-0.5 bg-emerald-100 text-emerald-800 text-[10px] font-bold rounded">Cho phép học thử</span>
                                @else
                                    <span class="px-2 py-0.5 bg-slate-100 text-slate-500 text-[10px] font-bold rounded">Yêu cầu đăng ký</span>
                                @endif
                            </div>
                            <h4 class="font-extrabold text-slate-900 text-sm font-heading">{{ $lesson->title }}</h4>
                        </div>

                        <div>
                            @if($lesson->is_preview || $userEnrolled)
                            <a href="{{ route('lessons.show', $lesson->id) }}" class="px-4 py-2 bg-emerald-600 hover:bg-emerald-700 text-white text-xs font-bold rounded-xl flex items-center gap-1.5 transition-all shadow-emerald-glow">
                                <i data-lucide="play" class="w-3.5 h-3.5"></i> Học Bài Này
                            </a>
                            @else
                            <button onclick="openModal('zaloModal')" class="px-4 py-2 bg-slate-100 hover:bg-slate-200 text-slate-700 text-xs font-bold rounded-xl flex items-center gap-1.5 transition-all">
                                <i data-lucide="lock" class="w-3.5 h-3.5"></i> Đăng Ký Học
                            </button>
                            @endif
                        </div>
                    </div>
                    @empty
                    <p class="text-xs text-slate-500">Đang cập nhật bài học HTML cho khóa học này...</p>
                    @endforelse
                </div>
            </div>

        </div>

        <!-- Sidebar Column -->
        <div class="lg:col-span-4 space-y-6">
            <div class="bg-slate-50 rounded-3xl p-6 border border-slate-200 space-y-4">
                <h3 class="font-extrabold text-slate-900 text-lg font-heading">Thông Tin Tổng Quan</h3>
                <div class="space-y-3 text-xs text-slate-600">
                    <div class="flex justify-between py-2 border-b border-slate-200">
                        <span>Danh mục:</span>
                        <strong class="text-slate-900">{{ $course->category_label }}</strong>
                    </div>
                    <div class="flex justify-between py-2 border-b border-slate-200">
                        <span>Trình độ:</span>
                        <strong class="text-slate-900">{{ $course->level }}</strong>
                    </div>
                    <div class="flex justify-between py-2 border-b border-slate-200">
                        <span>Tổng số bài HTML:</span>
                        <strong class="text-slate-900">{{ $course->lessons->count() }} bài học</strong>
                    </div>
                </div>

                <button onclick="openModal('zaloModal')" class="w-full py-3.5 bg-emerald-600 hover:bg-emerald-700 text-white font-extrabold text-xs rounded-xl transition-all shadow-emerald-glow">
                     Tư Vấn Miễn Phí Qua Zalo
                </button>
            </div>
        </div>

    </div>
</section>
@endsection
