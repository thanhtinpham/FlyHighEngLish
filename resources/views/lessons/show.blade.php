@extends('layouts.app')

@section('title', 'Bài Học: ' . $lesson->title . ' - Fly High English')

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-10 space-y-8">
    
    <!-- Navigation Back Link -->
    <div class="flex items-center justify-between">
        <a href="{{ route('courses.show', $lesson->course->slug ?? '') }}" class="inline-flex items-center gap-2 text-sm font-bold text-slate-500 hover:text-emerald-600 transition-colors">
            <i data-lucide="arrow-left" class="w-4 h-4"></i> Quay lại danh sách bài học
        </a>

        @auth
        <span id="statusBadge" class="px-3.5 py-1 rounded-full text-xs font-extrabold {{ ($progress && $progress->status === 'completed') ? 'bg-emerald-100 text-emerald-800 border border-emerald-300' : 'bg-amber-100 text-amber-800 border border-amber-300' }}">
            {{ ($progress && $progress->status === 'completed') ? '✓ Đã hoàn thành (' . ($progress->score ?? 100) . 'đ)' : '⏳ Đang học' }}
        </span>
        @endauth
    </div>

    <!-- Main Detail Card -->
    <div class="bg-white rounded-3xl border border-slate-200/80 shadow-xl p-6 sm:p-10 space-y-8">
        
        <!-- Header Info -->
        <div class="space-y-3">
            <div class="flex flex-wrap items-center gap-2">
                <span class="px-3 py-1 bg-emerald-50 text-emerald-700 rounded-full text-xs font-extrabold border border-emerald-200">
                    {{ $lesson->course->title ?? 'Khóa Học' }}
                </span>
                <span class="px-3 py-1 bg-sky-50 text-sky-700 rounded-full text-xs font-extrabold border border-sky-200">
                    {{ $lesson->level_or_week }}
                </span>
            </div>

            <h1 class="text-2xl sm:text-3xl font-black text-slate-900 leading-snug font-heading">
                {{ $lesson->title }}
            </h1>
        </div>

        <!-- Description -->
        @if(!empty($lesson->description))
        <div class="bg-slate-50 rounded-2xl p-6 border border-slate-200/60 space-y-2">
            <h3 class="text-xs uppercase font-extrabold tracking-wider text-slate-400 font-heading">Nội Dung / Mô Tả Bài Học</h3>
            <p class="text-slate-700 text-sm leading-relaxed whitespace-pre-line">
                {{ $lesson->description }}
            </p>
        </div>
        @endif

        <!-- File Download CTA Box -->
        <div class="bg-gradient-to-br from-emerald-600 via-teal-600 to-emerald-700 rounded-3xl p-6 sm:p-8 text-white flex flex-col sm:flex-row items-center justify-between gap-6 shadow-xl shadow-emerald-600/20">
            <div class="space-y-1.5 text-center sm:text-left">
                <span class="text-xs uppercase font-extrabold tracking-wider text-emerald-200 font-heading">Tệp Tin Bài Học Đính Kèm</span>
                <h4 class="font-bold text-lg text-white truncate max-w-xs sm:max-w-md">
                    {{ $lesson->html_file_path ? basename($lesson->html_file_path) : ($lesson->title . '.html') }}
                </h4>
                <p class="text-xs text-emerald-100">
                    Bấm nút bên dưới để tải tệp bài học về máy tính / điện thoại cá nhân.
                </p>
            </div>

            <a href="{{ route('lessons.download', $lesson->id) }}" 
               class="px-6 py-3.5 bg-white text-emerald-700 hover:bg-emerald-50 font-black text-sm rounded-2xl shadow-lg transition-all flex items-center gap-2 shrink-0 hover:scale-[1.02]">
                <i data-lucide="download" class="w-5 h-5"></i> Tải Về Tệp Bài Học
            </a>
        </div>

        <!-- Progress Action -->
        @auth
        <div class="pt-4 border-t border-slate-100 flex items-center justify-between flex-wrap gap-4">
            <div class="text-xs text-slate-500 font-medium">
                Ghi nhận tiến độ học tập trên hệ thống LMS
            </div>
            <button onclick="markAsCompleted(100)" class="px-5 py-2.5 bg-emerald-600 hover:bg-emerald-700 text-white rounded-xl text-xs font-extrabold shadow-emerald-glow transition-all flex items-center gap-2">
                <i data-lucide="check-circle" class="w-4 h-4"></i> Đánh Dấu Đã Hoàn Thành
            </button>
        </div>
        @endauth

    </div>

</div>

@section('scripts')
<script>
    function markAsCompleted(score = 100) {
        @auth
        fetch("{{ route('lessons.progress', $lesson->id) }}", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": "{{ csrf_token() }}"
            },
            body: JSON.stringify({
                status: 'completed',
                score: score
            })
        })
        .then(res => res.json())
        .then(data => {
            if (data.success) {
                const badge = document.getElementById('statusBadge');
                if (badge) {
                    badge.className = 'px-3.5 py-1 rounded-full text-xs font-extrabold bg-emerald-100 text-emerald-800 border border-emerald-300';
                    badge.innerText = '✓ Đã hoàn thành (' + score + 'đ)';
                }
                if (typeof showToast === 'function') {
                    showToast('Thao tác thành công', 'Đã ghi nhận hoàn thành bài học!', 'success');
                }
            }
        });
        @else
        alert('Vui lòng đăng nhập để lưu tiến độ học tập!');
        @endauth
    }
</script>
@endsection
@endsection
