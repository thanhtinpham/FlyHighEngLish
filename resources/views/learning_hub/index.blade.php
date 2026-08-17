@extends('layouts.app')

@section('title', 'Góc Học Tập & Lịch Sử Làm Bài LMS - Fly High English')

@section('content')
<!-- Header Banner -->
<section class="bg-slate-900 text-white py-10 border-b border-slate-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col md:flex-row items-start md:items-center justify-between gap-4">
        <div>
            <div class="flex items-center gap-2 mb-1">
                <span class="px-2.5 py-0.5 bg-blue-500/20 text-blue-400 rounded text-xs font-bold border border-blue-500/30">LMS INTERACTIVE HUB</span>
                <span class="text-xs text-slate-400 font-medium">Học viên: <strong>{{ auth()->user()->name }}</strong></span>
            </div>
            <h1 class="text-2xl sm:text-3xl font-extrabold text-white font-heading">Phòng Học & Lịch Sử Tương Tác</h1>
        </div>
        <a href="{{ route('courses.index') }}" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-xs font-bold rounded-lg transition-all flex items-center gap-1.5 shadow-sm">
            <i data-lucide="plus" class="w-4 h-4"></i> Khám Phá Thêm Khóa Học
        </a>
    </div>
</section>

<section class="py-10 bg-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-10">

        <!-- STATS & RECENT HISTORY SECTION -->
        <div class="bg-white rounded-2xl p-6 border border-slate-200 shadow-sm space-y-6">
            
            <div class="flex flex-col sm:flex-row sm:items-center justify-between border-b border-slate-200 pb-4 gap-2">
                <div class="flex items-center gap-2.5">
                    <div class="w-9 h-9 rounded-lg bg-blue-50 text-blue-600 flex items-center justify-center font-bold">
                        <i data-lucide="history" class="w-5 h-5"></i>
                    </div>
                    <div>
                        <h2 class="text-lg font-bold text-slate-900 font-heading">Lịch Sử Làm Bài & Tiến Độ Học Tập</h2>
                        <p class="text-xs text-slate-500">Xem tổng quan điểm số và thời gian hoàn thành các bài học HTML</p>
                    </div>
                </div>

                @php
                    $completedCount = $recentHistory->where('status', 'completed')->count();
                    $avgScore = $recentHistory->where('status', 'completed')->avg('score') ?? 0;
                @endphp

                <div class="flex items-center gap-3 text-xs">
                    <span class="px-3 py-1 bg-emerald-50 text-emerald-800 border border-emerald-200 rounded-lg font-bold">
                        ✓ Đã xong: {{ $completedCount }} bài
                    </span>
                    @if($completedCount > 0)
                    <span class="px-3 py-1 bg-blue-50 text-blue-800 border border-blue-200 rounded-lg font-bold">
                        ⭐ Điểm TB: {{ round($avgScore, 1) }}/100
                    </span>
                    @endif
                </div>
            </div>

            <!-- HISTORY TABLE -->
            @if(isset($recentHistory) && $recentHistory->count() > 0)
            <div class="overflow-x-auto">
                <table class="w-full text-left text-xs text-slate-700">
                    <thead class="bg-slate-50 text-slate-500 uppercase tracking-wider font-bold border-b border-slate-200">
                        <tr>
                            <th class="py-3 px-4">Bài Học HTML</th>
                            <th class="py-3 px-4">Khóa Học</th>
                            <th class="py-3 px-4">Trình Độ</th>
                            <th class="py-3 px-4 text-center">Kết Quả / Điểm Số</th>
                            <th class="py-3 px-4 text-center">Thời Gian Hoàn Thành</th>
                            <th class="py-3 px-4 text-right">Thao Tác</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @foreach($recentHistory as $hist)
                        <tr class="hover:bg-slate-50/80 transition-colors">
                            <td class="py-3 px-4 font-bold text-slate-900">
                                <a href="{{ route('lessons.show', $hist->lesson->id) }}" class="hover:text-blue-600 transition-colors flex items-center gap-1.5">
                                    <i data-lucide="file-code-2" class="w-4 h-4 text-blue-600 shrink-0"></i>
                                    {{ $hist->lesson->title }}
                                </a>
                            </td>
                            <td class="py-3 px-4 text-slate-600 font-medium">
                                {{ $hist->lesson->course->title ?? 'Khóa học' }}
                            </td>
                            <td class="py-3 px-4">
                                <span class="px-2 py-0.5 bg-slate-100 text-slate-700 rounded font-bold text-[11px]">
                                    {{ $hist->lesson->level_or_week }}
                                </span>
                            </td>
                            <td class="py-3 px-4 text-center">
                                @if($hist->status === 'completed')
                                    <span class="px-2.5 py-1 bg-emerald-100 text-emerald-800 rounded-full font-extrabold text-[11px] inline-flex items-center gap-1">
                                        <i data-lucide="check-circle-2" class="w-3.5 h-3.5 text-emerald-600"></i> {{ $hist->score ?? 100 }} Điểm
                                    </span>
                                @else
                                    <span class="px-2.5 py-1 bg-amber-100 text-amber-800 rounded-full font-bold text-[11px] inline-flex items-center gap-1">
                                        <i data-lucide="clock" class="w-3.5 h-3.5 text-amber-600"></i> Đang học
                                    </span>
                                @endif
                            </td>
                            <td class="py-3 px-4 text-center text-slate-500 font-mono text-[11px]">
                                {{ $hist->completed_at ? $hist->completed_at->format('H:i - d/m/Y') : ($hist->updated_at ? $hist->updated_at->format('H:i - d/m/Y') : 'Chưa ghi nhận') }}
                            </td>
                            <td class="py-3 px-4 text-right">
                                <a href="{{ route('lessons.show', $hist->lesson->id) }}" class="px-3 py-1 bg-blue-50 hover:bg-blue-100 text-blue-700 font-bold rounded text-xs inline-flex items-center gap-1 transition-all">
                                    Học Lại <i data-lucide="arrow-right" class="w-3 h-3"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @else
            <div class="p-6 text-center text-slate-400 bg-slate-50 rounded-xl border border-dashed border-slate-200">
                <i data-lucide="history" class="w-8 h-8 mx-auto mb-2 text-slate-400"></i>
                <p class="text-xs font-semibold">Chưa có lịch sử làm bài. Hãy chọn một bài học dưới đây để bắt đầu học ngay!</p>
            </div>
            @endif

        </div>

        <!-- ENROLLED COURSES & LESSON LIST -->
        <div class="space-y-6">
            <div class="border-b border-slate-200 pb-3">
                <h2 class="text-xl font-bold text-slate-900 font-heading">Danh Sách Khóa Học Của Bạn</h2>
                <p class="text-xs text-slate-500">Truy cập các bài học HTML tương tác trong lộ trình đào tạo</p>
            </div>

            @forelse($enrolledCourses as $course)
            <div class="bg-white rounded-2xl p-6 border border-slate-200 shadow-sm space-y-5">
                
                <!-- Course Header -->
                <div class="flex flex-col sm:flex-row sm:items-center justify-between border-b border-slate-200 pb-3 gap-2">
                    <div>
                        <span class="px-2.5 py-0.5 bg-blue-50 text-blue-700 rounded text-xs font-bold border border-blue-200">
                            {{ $course->category_label }}
                        </span>
                        <h3 class="text-lg font-bold text-slate-900 mt-1 font-heading">{{ $course->title }}</h3>
                    </div>
                    <div class="text-xs text-slate-500 font-medium">
                        Tổng số: <strong>{{ $course->lessons->count() }} bài học HTML</strong>
                    </div>
                </div>

                <!-- Lessons Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    @forelse($course->lessons as $lesson)
                        @php
                            $userProg = $userProgresses[$lesson->id] ?? null;
                            $isDone = $userProg && $userProg->status === 'completed';
                        @endphp

                        <div class="p-4 rounded-xl border transition-all flex flex-col justify-between space-y-3 {{ $isDone ? 'bg-emerald-50/30 border-emerald-200' : 'bg-slate-50 border-slate-200 hover:border-blue-400' }}">
                            <div class="space-y-2">
                                <div class="flex items-center justify-between">
                                    <span class="text-[11px] font-bold text-blue-700 bg-blue-50 px-2 py-0.5 rounded border border-blue-200">{{ $lesson->level_or_week }}</span>
                                    @if($isDone)
                                        <span class="px-2 py-0.5 bg-emerald-600 text-white rounded text-[10px] font-bold flex items-center gap-1">
                                            <i data-lucide="check" class="w-3 h-3"></i> {{ $userProg->score ?? 100 }} đ
                                        </span>
                                    @else
                                        <span class="px-2 py-0.5 bg-slate-200 text-slate-600 rounded text-[10px] font-medium">
                                            Chưa học
                                        </span>
                                    @endif
                                </div>

                                <h4 class="font-bold text-slate-900 text-sm font-heading line-clamp-1">
                                    {{ $lesson->title }}
                                </h4>
                                <p class="text-xs text-slate-500 line-clamp-2 leading-relaxed">
                                    {{ $lesson->description }}
                                </p>
                            </div>

                            <a href="{{ route('lessons.show', $lesson->id) }}" class="w-full py-2 rounded-lg font-bold text-xs flex items-center justify-center gap-1.5 transition-all {{ $isDone ? 'bg-emerald-600 hover:bg-emerald-700 text-white' : 'bg-blue-600 hover:bg-blue-700 text-white shadow-sm' }}">
                                <i data-lucide="play-circle" class="w-4 h-4"></i> {{ $isDone ? 'Học Lại Bài HTML' : 'Vào Học Bài HTML' }}
                            </a>
                        </div>
                    @empty
                        <div class="col-span-3 text-xs text-slate-400 py-4">Đang cập nhật bài học...</div>
                    @endforelse
                </div>

            </div>
            @empty
            <div class="bg-white rounded-2xl p-10 text-center border border-slate-200 max-w-xl mx-auto space-y-3">
                <div class="w-14 h-14 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center mx-auto text-xl font-bold">
                    <i data-lucide="book-open-check" class="w-7 h-7"></i>
                </div>
                <h3 class="text-lg font-bold text-slate-900 font-heading">Bạn Chưa Đăng Ký Khóa Học Nào</h3>
                <p class="text-xs text-slate-500 leading-relaxed">Hãy liên hệ Zalo hoặc đăng ký khóa học để bắt đầu truy cập bài học HTML tương tác trực tuyến.</p>
                <a href="{{ route('courses.index') }}" class="inline-block px-5 py-2.5 bg-blue-600 hover:bg-blue-700 text-white text-xs font-bold rounded-lg shadow-sm transition-all">
                    Xem Danh Sách Khóa Học Ngay
                </a>
            </div>
            @endforelse
        </div>

    </div>
</section>
@endsection
