@extends('layouts.app')

@section('title', 'Bài Học HTML: ' . $lesson->title . ' - Fly High English')

@section('content')
<!-- Top Bar inside LMS Player -->
<div class="bg-slate-900 text-white border-b border-slate-800 py-3.5 px-4 sm:px-6">
    <div class="w-full mx-auto flex flex-col sm:flex-row sm:items-center justify-between gap-3">
        <div class="flex items-center gap-3">
            <a href="{{ route('learning_hub.index') }}" class="p-2 rounded-xl bg-slate-800 hover:bg-slate-700 text-slate-300 transition-colors shrink-0">
                <i data-lucide="arrow-left" class="w-5 h-5"></i>
            </a>
            <div>
                <div class="flex items-center gap-2">
                    <span class="px-2.5 py-0.5 bg-indigo-500/20 text-indigo-400 rounded text-[11px] font-bold">{{ $lesson->level_or_week }}</span>
                    <span class="text-xs text-slate-400 font-medium hidden sm:inline">{{ $lesson->course->title }}</span>
                </div>
                <h1 class="text-base sm:text-lg font-black text-white leading-tight mt-0.5">{{ $lesson->title }}</h1>
            </div>
        </div>

        <div class="flex items-center gap-2 sm:gap-3 shrink-0">
            <span id="statusBadge" class="px-3 py-1 rounded-full text-xs font-extrabold {{ ($progress && $progress->status === 'completed') ? 'bg-emerald-500/20 text-emerald-400' : 'bg-amber-500/20 text-amber-400' }}">
                {{ ($progress && $progress->status === 'completed') ? '✓ Đã hoàn thành (' . ($progress->score ?? 100) . 'đ)' : '⏳ Đang học' }}
            </span>

            <button type="button" onclick="toggleFullscreen()" class="px-3 py-2 bg-slate-800 hover:bg-slate-700 text-slate-200 border border-slate-700 rounded-xl text-xs font-bold transition-all flex items-center gap-1.5 shadow-sm" title="Bật/Tắt Toàn Màn Hình">
                <i data-lucide="maximize-2" class="w-4 h-4 text-blue-400"></i>
                <span class="hidden sm:inline">Toàn Màn Hình</span>
            </button>

            @auth
            <button onclick="markAsCompleted(100)" class="px-4 py-2 bg-emerald-600 hover:bg-emerald-700 text-white rounded-xl text-xs font-bold shadow transition-all">
                Đánh Dấu Hoàn Thành
            </button>
            @endauth
        </div>
    </div>
</div>

<!-- HTML Lesson Frame Area (Dedicated Full Screen LMS Player View) -->
<div class="flex-grow flex flex-col bg-slate-900 p-0 overflow-hidden">
    <div id="playerContainer" class="flex-grow w-full flex flex-col bg-white overflow-hidden relative border-0">
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
                    $hasFile = true;
                    $fileUrl = \Illuminate\Support\Str::startsWith($lesson->html_file_path, 'storage/')
                        ? asset($lesson->html_file_path)
                        : asset('storage/' . $lesson->html_file_path);
                }
            }
        @endphp

        @if($hasFile && $fileUrl)
            <iframe id="htmlPlayer" src="{{ $fileUrl }}" class="w-full flex-grow border-0 block" style="min-height: calc(100vh - 120px);" allow="autoplay; microphone; camera; fullscreen"></iframe>
        @elseif(!empty($lesson->html_content))
            <iframe id="htmlPlayer" srcdoc="{{ $lesson->html_content }}" class="w-full flex-grow border-0 block" style="min-height: calc(100vh - 120px);" allow="autoplay; microphone; camera; fullscreen"></iframe>
        @else
            <div class="p-16 text-center text-slate-400">
                <i data-lucide="file-code-2" class="w-12 h-12 mx-auto mb-3"></i>
                <p class="text-sm font-semibold">Nội dung bài học HTML đang được chuẩn bị...</p>
                <p class="text-xs text-slate-400 mt-1">Admin chưa tải lên tệp bài học HTML hoặc chưa cập nhật nội dung cho bài này.</p>
            </div>
        @endif
    </div>
</div>

@section('scripts')
<script>
    // Automatically force iframe internal contents to expand to 100% full width
    function expandIframeToFullWidth() {
        const iframe = document.getElementById('htmlPlayer');
        if (!iframe) return;
        try {
            const doc = iframe.contentDocument || iframe.contentWindow.document;
            if (doc && doc.head && !doc.getElementById('fullWidthOverride')) {
                const style = doc.createElement('style');
                style.id = 'fullWidthOverride';
                style.innerHTML = `
                    .max-w-3xl, .max-w-2xl, .max-w-4xl, .max-w-5xl, .max-w-xl, .max-w-lg, .wrap {
                        max-width: 100% !important;
                        width: 100% !important;
                    }
                    div[class*="max-w-"] {
                        max-width: 100% !important;
                        width: 100% !important;
                    }
                    body {
                        padding: 12px !important;
                    }
                `;
                doc.head.appendChild(style);
            }
        } catch(e) {
            console.log('Iframe fullwidth note:', e);
        }
    }

    const htmlIframe = document.getElementById('htmlPlayer');
    if (htmlIframe) {
        htmlIframe.addEventListener('load', expandIframeToFullWidth);
        setTimeout(expandIframeToFullWidth, 300);
    }

    // Listen for postMessage from iframe HTML interactive lesson
    window.addEventListener('message', function(event) {
        if (event.data && event.data.type === 'LESSON_COMPLETED') {
            const score = event.data.score || 100;
            markAsCompleted(score);
        }
    });

    function toggleFullscreen() {
        const player = document.getElementById('playerContainer') || document.getElementById('htmlPlayer');
        if (!document.fullscreenElement) {
            if (player.requestFullscreen) {
                player.requestFullscreen();
            } else if (player.webkitRequestFullscreen) {
                player.webkitRequestFullscreen();
            } else if (player.msRequestFullscreen) {
                player.msRequestFullscreen();
            }
        } else {
            if (document.exitFullscreen) {
                document.exitFullscreen();
            }
        }
    }

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
