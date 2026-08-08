@extends('layouts.app')

@section('title', 'Thông báo từ Admin')

@section('content')
<div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-10 space-y-8">
    
    <!-- Title & Search Header -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 bg-white p-6 sm:p-8 rounded-3xl border border-slate-100 shadow-sm">
        <div>
            <h1 class="text-2xl sm:text-3xl font-black text-slate-900 tracking-tight">Thông Báo Hệ Thống</h1>
            <p class="mt-1 text-sm text-slate-500">Cập nhật tin tức, lịch phát hành tài liệu và thông báo từ Admin</p>
        </div>

        <form action="{{ route('notifications.index') }}" method="GET" class="w-full md:w-80">
            <div class="relative">
                <input type="text" name="search" value="{{ $search }}"
                       class="w-full pl-10 pr-4 py-3 rounded-2xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-indigo-500 text-sm"
                       placeholder="Tìm kiếm thông báo...">
                <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                    <i data-lucide="search" class="w-4 h-4"></i>
                </div>
            </div>
        </form>
    </div>

    <!-- Notifications Timeline List -->
    @if($notifications->count() > 0)
    <div class="space-y-4">
        @foreach($notifications as $noti)
        <div class="bg-white rounded-3xl border border-slate-100 p-6 shadow-sm hover:shadow-md transition-shadow relative overflow-hidden">
            @if($noti->is_pinned)
            <div class="absolute top-0 right-0 w-16 h-16 bg-amber-400/20 rounded-bl-full pointer-events-none"></div>
            @endif

            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2 mb-3">
                <div class="flex items-center gap-2">
                    @if($noti->is_pinned)
                    <span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-md text-xs font-extrabold bg-amber-500 text-white">
                        <i data-lucide="pin" class="w-3 h-3"></i> GHIM
                    </span>
                    @endif
                    <span class="text-xs font-semibold text-slate-500">Đăng bởi: {{ $noti->author->name ?? 'Admin' }}</span>
                </div>
                <span class="text-xs text-slate-400 flex items-center gap-1">
                    <i data-lucide="clock" class="w-3.5 h-3.5"></i> {{ $noti->created_at->format('d/m/Y H:i') }} ({{ $noti->created_at->diffForHumans() }})
                </span>
            </div>

            <h2 class="text-lg font-bold text-slate-900 hover:text-indigo-600 transition-colors">
                <a href="{{ route('notifications.show', $noti) }}">{{ $noti->title }}</a>
            </h2>

            <p class="mt-2 text-sm text-slate-600 line-clamp-3 leading-relaxed">
                {{ Str::limit(strip_tags($noti->content), 200) }}
            </p>

            <div class="mt-4 pt-3 border-t border-slate-100 flex justify-end">
                <a href="{{ route('notifications.show', $noti) }}" class="text-xs font-bold text-indigo-600 hover:text-indigo-800 flex items-center gap-1">
                    Xem chi tiết thông báo <i data-lucide="arrow-right" class="w-3.5 h-3.5"></i>
                </a>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Pagination -->
    <div class="pt-4">
        {{ $notifications->links() }}
    </div>

    @else
    <div class="bg-white rounded-3xl p-12 text-center border border-slate-100 space-y-3">
        <div class="w-16 h-16 bg-slate-100 text-slate-400 rounded-full mx-auto flex items-center justify-center">
            <i data-lucide="bell-off" class="w-8 h-8"></i>
        </div>
        <h3 class="text-lg font-bold text-slate-800">Chưa có thông báo nào</h3>
        <p class="text-sm text-slate-500">Các thông báo mới từ ban quản trị sẽ xuất hiện tại đây.</p>
    </div>
    @endif

</div>
@endsection
