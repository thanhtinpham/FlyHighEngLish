@extends('layouts.app')

@section('title', $document->title)

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-10 space-y-8">
    
    <!-- Back Button -->
    <a href="{{ route('documents.index') }}" class="inline-flex items-center gap-2 text-sm font-bold text-slate-500 hover:text-indigo-600 transition-colors">
        <i data-lucide="arrow-left" class="w-4 h-4"></i> Quay lại kho tài liệu
    </a>

    <!-- Main Detail Card -->
    <div class="bg-white rounded-3xl border border-slate-100 shadow-xl p-8 sm:p-10 space-y-8">
        
        <!-- Header Info -->
        <div class="space-y-4">
            <div class="flex items-center gap-3">
                <span class="px-3 py-1 rounded-xl text-xs font-bold bg-indigo-50 text-indigo-700 border border-indigo-100">
                    {{ $document->category->name }}
                </span>
                <span class="px-2.5 py-0.5 rounded text-xs font-semibold uppercase bg-slate-100 border text-slate-600">
                    Định dạng {{ $document->file_type }}
                </span>
            </div>

            <h1 class="text-2xl sm:text-3xl font-black text-slate-900 leading-snug">
                {{ $document->title }}
            </h1>

            <div class="flex flex-wrap items-center gap-4 text-xs text-slate-500 pt-2 border-t border-slate-100">
                <span><i data-lucide="user" class="w-4 h-4 inline mr-1"></i> Người đăng: {{ $document->uploader->name ?? 'Admin' }}</span>
                <span><i data-lucide="calendar" class="w-4 h-4 inline mr-1"></i> Ngày đăng: {{ $document->created_at->format('d/m/Y H:i') }}</span>
                <span><i data-lucide="hard-drive" class="w-4 h-4 inline mr-1"></i> Dung lượng: {{ $document->formatted_size }}</span>
                <span><i data-lucide="download-cloud" class="w-4 h-4 inline mr-1"></i> Lượt tải: {{ $document->download_count }} lần</span>
            </div>
        </div>

        <!-- Description -->
        <div class="bg-slate-50 rounded-2xl p-6 border border-slate-200/60 space-y-2">
            <h3 class="text-xs uppercase font-extrabold tracking-wider text-slate-400">Mô Tả Chi Tiết</h3>
            <p class="text-slate-700 text-sm leading-relaxed whitespace-pre-line">
                {{ $document->description ?? 'Không có mô tả bổ sung cho tài liệu này.' }}
            </p>
        </div>

        <!-- Download CTA Box -->
        <div class="bg-gradient-to-r from-indigo-600 to-purple-600 rounded-3xl p-6 sm:p-8 text-white flex flex-col sm:flex-row items-center justify-between gap-6 shadow-xl shadow-indigo-500/25">
            <div class="space-y-1 text-center sm:text-left">
                <span class="text-xs uppercase font-bold tracking-wider text-indigo-200">Tệp tin đính kèm</span>
                <h4 class="font-bold text-lg text-white truncate max-w-xs sm:max-w-md">{{ $document->file_name }}</h4>
                <p class="text-xs text-indigo-100">Dung lượng: {{ $document->formatted_size }} • Bạn đã đăng nhập để tải về miễn phí</p>
            </div>

            <a href="{{ route('documents.download', $document) }}" 
               class="px-6 py-3.5 bg-white text-indigo-600 hover:bg-indigo-50 font-black text-sm rounded-2xl shadow-lg transition-all flex items-center gap-2 shrink-0">
                <i data-lucide="download" class="w-5 h-5"></i> Tải Về Ngay
            </a>
        </div>

    </div>

    <!-- Related Documents -->
    @if($relatedDocuments->count() > 0)
    <div class="space-y-4">
        <h3 class="text-lg font-bold text-slate-900">Tài liệu cùng danh mục {{ $document->category->name }}</h3>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            @foreach($relatedDocuments as $rel)
            <a href="{{ route('documents.show', $rel) }}" class="bg-white p-5 rounded-2xl border border-slate-100 hover:shadow-md transition-shadow block">
                <h4 class="font-bold text-sm text-slate-900 line-clamp-2">{{ $rel->title }}</h4>
                <div class="mt-3 flex items-center justify-between text-xs text-slate-400">
                    <span>{{ $rel->formatted_size }}</span>
                    <span>{{ $rel->download_count }} lượt tải</span>
                </div>
            </a>
            @endforeach
        </div>
    </div>
    @endif

</div>
@endsection
