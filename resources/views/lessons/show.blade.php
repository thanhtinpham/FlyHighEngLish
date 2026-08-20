@extends('layouts.app')

@section('title', 'Bài Học HTML: ' . $lesson->title . ' - Fly High English')

@section('content')
<!-- Top Bar inside LMS Player -->
<div class="bg-slate-900 text-white border-b border-slate-800 py-4">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col sm:flex-row sm:items-center justify-between gap-3">
        <div class="flex items-center gap-3">
            <a href="{{ route('learning_hub.index') }}" class="p-2 rounded-xl bg-slate-800 hover:bg-slate-700 text-slate-300 transition-colors">
                <i data-lucide="arrow-left" class="w-5 h-5"></i>
            </a>
            <div>
                <div class="flex items-center gap-2">
                    <span class="px-2.5 py-0.5 bg-indigo-500/20 text-indigo-400 rounded text-[11px] font-bold">{{ $lesson->level_or_week }}</span>
                    <span class="text-xs text-slate-400 font-medium">{{ $lesson->course->title }}</span>
                </div>
                <h1 class="text-lg font-black text-white leading-tight mt-0.5">{{ $lesson->title }}</h1>
            </div>
        </div>

        <div class="flex items-center gap-3">
            <span id="statusBadge" class="px-3 py-1 rounded-full text-xs font-extrabold {{ ($progress && $progress->status === 'completed') ? 'bg-emerald-500/20 text-emerald-400' : 'bg-amber-500/20 text-amber-400' }}">
                {{ ($progress && $progress->status === 'completed') ? '✓ Đã hoàn thành (' . ($progress->score ?? 100) . 'đ)' : '⏳ Đang học' }}
            </span>

            @auth
            <button onclick="markAsCompleted(100)" class="px-4 py-2 bg-emerald-600 hover:bg-emerald-700 text-white rounded-xl text-xs font-bold shadow transition-all">
                Đánh Dấu Hoàn Thành
            </button>
            @endauth
        </div>
    </div>
</div>

<!-- HTML Lesson Frame Area -->
<div class="bg-slate-100 min-h-[calc(100vh-140px)] py-6">
    <div class="max-w-6xl mx-auto px-4">
        
            @php
                $disk = config('filesystems.default', 'public');
                $hasFile = false;
                $fileUrl = null;

                if (!empty($lesson->html_file_path)) {
                    if (\Illuminate\Support\Str::startsWith($lesson->html_file_path, ['http://', 'https://'])) {
                        $hasFile = true;
                        $fileUrl = $lesson->html_file_path;
                    } elseif (\Illuminate\Support\Facades\Storage::disk($disk)->exists($lesson->html_file_path)) {
                        $hasFile = true;
                        $fileUrl = \Illuminate\Support\Facades\Storage::disk($disk)->url($lesson->html_file_path);
                    } elseif (\Illuminate\Support\Facades\Storage::disk('public')->exists($lesson->html_file_path)) {
                        $hasFile = true;
                        $fileUrl = asset('storage/' . $lesson->html_file_path);
                    } elseif (file_exists(public_path('storage/' . $lesson->html_file_path)) || file_exists(storage_path('app/public/' . $lesson->html_file_path))) {
                        $hasFile = true;
                        $fileUrl = asset('storage/' . $lesson->html_file_path);
                    } else {
                        // Fallback URL if path is specified
                        $hasFile = true;
                        $fileUrl = \Illuminate\Support\Str::startsWith($lesson->html_file_path, 'storage/')
                            ? asset($lesson->html_file_path)
                            : asset('storage/' . $lesson->html_file_path);
                    }
                }
            @endphp

        <div class="bg-white rounded-3xl overflow-hidden shadow-2xl border border-slate-200">
            @if($hasFile && $fileUrl)
                <iframe id="htmlPlayer" src="{{ $fileUrl }}" class="w-full h-[750px] border-0" allow="autoplay; microphone; camera"></iframe>
            @elseif(!empty($lesson->html_content))
                <div class="p-8 prose max-w-none">
                    {!! $lesson->html_content !!}
                </div>
            @else
                <div class="p-16 text-center text-slate-400">
                    <i data-lucide="file-code-2" class="w-12 h-12 mx-auto mb-3"></i>
                    <p class="text-sm font-semibold">Nội dung bài học HTML đang được chuẩn bị...</p>
                </div>
            @endif
        </div>

    </div>
</div>

@section('scripts')
<script>
    // Listen for postMessage from iframe HTML interactive lesson
    window.addEventListener('message', function(event) {
        if (event.data && event.data.type === 'LESSON_COMPLETED') {
            const score = event.data.score || 100;
            markAsCompleted(score);
        }
    });

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
                badge.className = 'px-3 py-1 rounded-full text-xs font-extrabold bg-emerald-500/20 text-emerald-400';
                badge.innerText = '✓ Đã hoàn thành (' + score + 'đ)';
            }
        });
        @else
        alert('Bạn đang học thử với tư cách khách. Vui lòng đăng nhập để lưu tiến độ LMS!');
        @endauth
    }
</script>
@endsection
@endsection
