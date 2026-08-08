@extends('layouts.app')

@section('title', 'Trang chủ - Cổng học tập FlyHigh English')

@section('content')
<div class="space-y-10 pb-12">
    
    <!-- Hero Banner with Gradient -->
    <section class="gradient-bg text-white py-14 sm:py-16 px-4 sm:px-6 lg:px-8 shadow-2xl relative overflow-hidden">
        <div class="absolute -right-20 -bottom-20 w-96 h-96 bg-indigo-500/20 rounded-full blur-3xl pointer-events-none"></div>
        <div class="max-w-7xl mx-auto relative z-10">
            <div class="max-w-3xl">
                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold bg-indigo-500/30 text-indigo-200 border border-indigo-400/30 mb-4">
                    <i data-lucide="sparkles" class="w-3.5 h-3.5"></i> Cổng Học Tập Trực Tuyên
                </span>
                <h1 class="text-3xl sm:text-5xl font-black tracking-tight leading-tight">
                    Kho Tài Liệu & Thông Báo <span class="text-indigo-400">FlyHigh English</span>
                </h1>
                <p class="mt-4 text-base sm:text-lg text-slate-300 leading-relaxed">
                    Chào mừng <strong>{{ auth()->user()->name }}</strong>! Tra cứu thông báo mới nhất từ ban quản trị và tải về các bộ đề, bài tập kỹ năng Nghe, Nói, Đọc, Viết chất lượng cao.
                </p>
                <div class="mt-8 flex flex-wrap gap-4">
                    <a href="{{ route('documents.index') }}" class="px-6 py-3.5 rounded-2xl bg-indigo-600 hover:bg-indigo-500 text-white font-bold text-sm shadow-xl shadow-indigo-600/30 transition-all flex items-center gap-2">
                        <i data-lucide="folder-search" class="w-5 h-5"></i> Khám Phá Kho Tài Liệu
                    </a>
                    <a href="{{ route('notifications.index') }}" class="px-6 py-3.5 rounded-2xl bg-white/10 hover:bg-white/20 text-white font-bold text-sm backdrop-blur border border-white/20 transition-all flex items-center gap-2">
                        <i data-lucide="bell" class="w-5 h-5"></i> Xem Tất Cả Thông Báo
                    </a>
                </div>
            </div>
        </div>
    </section>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12">

        <!-- Pinned Announcement Banner -->
        @if($pinnedNotifications->count() > 0)
        <section class="space-y-4">
            <div class="flex items-center gap-2 text-indigo-900 font-extrabold text-lg">
                <i data-lucide="pin" class="w-5 h-5 text-indigo-600"></i>
                <h2>Thông Báo Ghim Quan Trọng</h2>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                @foreach($pinnedNotifications as $pinned)
                <div class="bg-gradient-to-br from-amber-50 to-orange-50/50 border border-amber-200/90 rounded-3xl p-6 shadow-sm hover:shadow-md transition-shadow relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-24 h-24 bg-amber-400/10 rounded-bl-full pointer-events-none"></div>
                    <div class="flex items-start justify-between gap-4 mb-3">
                        <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-lg text-xs font-extrabold bg-amber-500 text-white shadow-sm">
                            <i data-lucide="pin" class="w-3 h-3"></i> Đã Ghim
                        </span>
                        <span class="text-xs font-medium text-slate-500 flex items-center gap-1">
                            <i data-lucide="calendar" class="w-3.5 h-3.5"></i> {{ $pinned->created_at->format('d/m/Y H:i') }}
                        </span>
                    </div>
                    <h3 class="text-lg font-bold text-slate-900 mb-2">
                        <a href="{{ route('notifications.show', $pinned) }}" class="hover:text-amber-700 transition-colors">
                            {{ $pinned->title }}
                        </a>
                    </h3>
                    <p class="text-sm text-slate-600 line-clamp-2 leading-relaxed">
                        {{ Str::limit(strip_tags($pinned->content), 120) }}
                    </p>
                    <div class="mt-4 pt-3 border-t border-amber-200/50 flex items-center justify-between">
                        <span class="text-xs font-semibold text-slate-500">Đăng bởi: {{ $pinned->author->name ?? 'Admin' }}</span>
                        <a href="{{ route('notifications.show', $pinned) }}" class="text-xs font-bold text-amber-700 hover:text-amber-900 inline-flex items-center gap-1">
                            Đọc chi tiết <i data-lucide="arrow-right" class="w-3.5 h-3.5"></i>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </section>
        @endif

        <!-- Skill Categories Grid (Nghe, Nói, Đọc, Viết) -->
        <section class="space-y-6">
            <div class="flex items-center justify-between">
                <div>
                    <h2 class="text-2xl font-black text-slate-900 tracking-tight">Danh Mục Kỹ Năng</h2>
                    <p class="text-sm text-slate-500">Tài liệu được phân loại theo chuẩn 4 kỹ năng tiếng Anh</p>
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
                @foreach($categories as $category)
                @php
                    $colors = [
                        'nghe' => ['bg' => 'bg-indigo-50', 'text' => 'text-indigo-600', 'border' => 'border-indigo-100', 'badge' => 'bg-indigo-500'],
                        'noi'  => ['bg' => 'bg-emerald-50', 'text' => 'text-emerald-600', 'border' => 'border-emerald-100', 'badge' => 'bg-emerald-500'],
                        'doc'  => ['bg' => 'bg-amber-50', 'text' => 'text-amber-600', 'border' => 'border-amber-100', 'badge' => 'bg-amber-500'],
                        'viet' => ['bg' => 'bg-rose-50', 'text' => 'text-rose-600', 'border' => 'border-rose-100', 'badge' => 'bg-rose-500'],
                    ];
                    $theme = $colors[$category->slug] ?? ['bg' => 'bg-slate-50', 'text' => 'text-slate-600', 'border' => 'border-slate-100', 'badge' => 'bg-slate-500'];
                @endphp
                <a href="{{ route('documents.index', ['category' => $category->slug]) }}" 
                   class="bg-white rounded-3xl p-6 border {{ $theme['border'] }} shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-200 group relative">
                    <div class="w-12 h-12 rounded-2xl {{ $theme['bg'] }} {{ $theme['text'] }} flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                        <i data-lucide="{{ $category->icon ?? 'file-text' }}" class="w-6 h-6"></i>
                    </div>
                    <span class="inline-block px-2.5 py-0.5 rounded-full text-[11px] font-bold text-white mb-2 {{ $theme['badge'] }}">
                        {{ $category->documents_count }} tài liệu
                    </span>
                    <h3 class="text-lg font-bold text-slate-900 group-hover:{{ $theme['text'] }} transition-colors">
                        {{ $category->name }}
                    </h3>
                    <p class="mt-1 text-xs text-slate-500 leading-relaxed line-clamp-2">
                        {{ $category->description }}
                    </p>
                </a>
                @endforeach
            </div>
        </section>

        <!-- Latest Uploaded Documents Section -->
        <section class="space-y-6">
            <div class="flex items-center justify-between">
                <div>
                    <h2 class="text-2xl font-black text-slate-900 tracking-tight">Tài Liệu Mới Cập Nhật</h2>
                    <p class="text-sm text-slate-500">Tải về trực tiếp tệp bài tập và đề thi mới nhất</p>
                </div>
                <a href="{{ route('documents.index') }}" class="text-sm font-bold text-indigo-600 hover:text-indigo-700 flex items-center gap-1">
                    Xem tất cả <i data-lucide="chevron-right" class="w-4 h-4"></i>
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($recentDocuments as $doc)
                <div class="bg-white rounded-3xl border border-slate-100 p-6 shadow-sm hover:shadow-xl transition-all duration-200 flex flex-col justify-between group">
                    <div>
                        <div class="flex items-center justify-between gap-2 mb-3">
                            <span class="px-3 py-1 rounded-xl text-xs font-bold bg-slate-100 text-slate-700 border border-slate-200">
                                {{ $doc->category->name }}
                            </span>
                            <span class="text-xs font-semibold text-slate-500 uppercase px-2 py-0.5 rounded bg-slate-50 border">
                                {{ $doc->file_type ?? 'FILE' }}
                            </span>
                        </div>
                        <h3 class="text-base font-bold text-slate-900 group-hover:text-indigo-600 transition-colors line-clamp-2">
                            <a href="{{ route('documents.show', $doc) }}">{{ $doc->title }}</a>
                        </h3>
                        <p class="mt-2 text-xs text-slate-500 line-clamp-2 leading-relaxed">
                            {{ $doc->description ?? 'Không có mô tả thêm.' }}
                        </p>
                    </div>

                    <div class="mt-6 pt-4 border-t border-slate-100 flex items-center justify-between">
                        <div class="text-xs text-slate-500 flex items-center gap-3">
                            <span title="Dung lượng"><i data-lucide="hard-drive" class="w-3.5 h-3.5 inline"></i> {{ $doc->formatted_size }}</span>
                            <span title="Lượt tải"><i data-lucide="download-cloud" class="w-3.5 h-3.5 inline"></i> {{ $doc->download_count }}</span>
                        </div>

                        <a href="{{ route('documents.download', $doc) }}" 
                           class="px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white rounded-xl font-bold text-xs shadow-md shadow-indigo-500/20 transition-all flex items-center gap-1.5">
                            <i data-lucide="download" class="w-3.5 h-3.5"></i> Tải về
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </section>

    </div>
</div>
@endsection
