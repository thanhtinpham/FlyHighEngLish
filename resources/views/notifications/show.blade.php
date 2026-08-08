@extends('layouts.app')

@section('title', $notification->title)

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-10 space-y-8">
    
    <!-- Back Link -->
    <a href="{{ route('notifications.index') }}" class="inline-flex items-center gap-2 text-sm font-bold text-slate-500 hover:text-indigo-600 transition-colors">
        <i data-lucide="arrow-left" class="w-4 h-4"></i> Quay lại danh sách thông báo
    </a>

    <!-- Notification Article Card -->
    <article class="bg-white rounded-3xl border border-slate-100 shadow-xl p-8 sm:p-10 space-y-6">
        
        <div class="space-y-3 pb-6 border-b border-slate-100">
            @if($notification->is_pinned)
            <span class="inline-flex items-center gap-1 px-3 py-1 rounded-full text-xs font-extrabold bg-amber-500 text-white shadow-sm">
                <i data-lucide="pin" class="w-3.5 h-3.5"></i> Thông báo ghim quan trọng
            </span>
            @endif

            <h1 class="text-2xl sm:text-3xl font-black text-slate-900 leading-snug">
                {{ $notification->title }}
            </h1>

            <div class="flex items-center gap-4 text-xs text-slate-500">
                <span><i data-lucide="user" class="w-4 h-4 inline mr-1"></i> {{ $notification->author->name ?? 'Admin' }}</span>
                <span><i data-lucide="calendar" class="w-4 h-4 inline mr-1"></i> {{ $notification->created_at->format('d/m/Y H:i') }}</span>
            </div>
        </div>

        <div class="prose prose-slate max-w-none text-slate-700 text-base leading-relaxed whitespace-pre-line font-medium">
            {{ $notification->content }}
        </div>

    </article>

    <!-- Other Notifications Sidebar/Bottom List -->
    @if($otherNotifications->count() > 0)
    <div class="space-y-4">
        <h3 class="text-lg font-bold text-slate-900">Thông báo khác</h3>
        <div class="bg-white rounded-3xl border border-slate-100 divide-y divide-slate-100">
            @foreach($otherNotifications as $item)
            <a href="{{ route('notifications.show', $item) }}" class="p-4 sm:p-5 flex items-center justify-between hover:bg-slate-50 transition-colors rounded-3xl block">
                <div>
                    <h4 class="font-bold text-sm text-slate-900">{{ $item->title }}</h4>
                    <span class="text-xs text-slate-400">{{ $item->created_at->format('d/m/Y H:i') }}</span>
                </div>
                <i data-lucide="chevron-right" class="w-5 h-5 text-slate-400"></i>
            </a>
            @endforeach
        </div>
    </div>
    @endif

</div>
@endsection
