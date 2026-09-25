@extends('layouts.app')

@section('title', $document->title)

@section('content')
<div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-10 space-y-8">
    
    <!-- Back Navigation & Actions -->
    <div class="flex items-center justify-between">
        <a href="{{ route('documents.index') }}" class="inline-flex items-center gap-2 text-sm font-bold text-slate-600 hover:text-indigo-600 transition-colors bg-white px-4 py-2 rounded-xl border border-slate-200 shadow-sm">
            <i data-lucide="arrow-left" class="w-4 h-4"></i> Quay lại kho tài liệu
        </a>

        <a href="{{ route('documents.download', $document) }}" 
           class="px-5 py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white font-bold text-xs rounded-xl shadow-md shadow-indigo-500/20 transition-all inline-flex items-center gap-2">
            <i data-lucide="download" class="w-4 h-4"></i> Tải Về Máy
        </a>
    </div>

    <!-- Main Content Card -->
    <div class="bg-white rounded-3xl border border-slate-100 shadow-xl p-6 sm:p-10 space-y-8">
        
        <!-- Header Information -->
        <div class="space-y-4">
            <div class="flex items-center gap-3">
                <span class="px-3 py-1 rounded-xl text-xs font-bold uppercase bg-slate-100 border text-slate-700">
                    Định dạng: {{ $document->file_type ?? 'FILE' }}
                </span>
                <span class="text-xs text-slate-400">
                    <i data-lucide="calendar" class="w-3.5 h-3.5 inline"></i> {{ $document->created_at->format('d/m/Y H:i') }}
                </span>
            </div>

            <h1 class="text-2xl sm:text-3xl font-black text-slate-900 leading-snug">
                {{ $document->title }}
            </h1>

            <div class="flex flex-wrap items-center gap-4 sm:gap-6 text-xs text-slate-500 pt-3 border-t border-slate-100">
                <span class="flex items-center gap-1.5"><i data-lucide="user" class="w-4 h-4 text-indigo-500"></i> Người đăng: <strong>{{ $document->uploader->name ?? 'Admin' }}</strong></span>
                <span class="flex items-center gap-1.5"><i data-lucide="hard-drive" class="w-4 h-4 text-indigo-500"></i> Dung lượng: <strong>{{ $document->formatted_size }}</strong></span>
                <span class="flex items-center gap-1.5"><i data-lucide="download-cloud" class="w-4 h-4 text-indigo-500"></i> Lượt tải: <strong>{{ $document->download_count }} lượt</strong></span>
            </div>
        </div>

        <!-- Inline File Viewer / Player Section -->
        @php
            $ext = strtolower($document->file_type ?? pathinfo($document->file_name, PATHINFO_EXTENSION));
        @endphp

        <div class="space-y-3">
            <div class="flex items-center justify-between">
                <h3 class="text-xs uppercase font-extrabold tracking-wider text-slate-400 flex items-center gap-1.5">
                    <i data-lucide="eye" class="w-4 h-4 text-indigo-600"></i> Xem Trực Tuyến & Xem Trước File
                </h3>
                <a href="{{ route('documents.preview', $document) }}" target="_blank" class="text-xs font-bold text-indigo-600 hover:underline flex items-center gap-1">
                    Mở tab mới <i data-lucide="external-link" class="w-3.5 h-3.5"></i>
                </a>
            </div>

            @if(in_array($ext, ['pdf']))
                <!-- PDF Viewer -->
                <div class="rounded-2xl overflow-hidden border border-slate-200 bg-slate-50 shadow-inner">
                    <iframe src="{{ route('documents.preview', $document) }}" class="w-full h-[650px]" title="{{ $document->title }}">
                        <p class="p-6 text-center text-sm text-slate-500">
                            Trình duyệt của bạn không hỗ trợ xem trực tiếp PDF. 
                            <a href="{{ route('documents.download', $document) }}" class="text-indigo-600 font-bold underline">Bấm vào đây để tải file về máy</a>.
                        </p>
                    </iframe>
                </div>
            @elseif(in_array($ext, ['mp3', 'wav', 'ogg', 'm4a']))
                <!-- Audio Player -->
                <div class="bg-gradient-to-r from-slate-900 to-indigo-950 p-6 rounded-2xl border border-slate-800 text-white space-y-4">
                    <div class="flex items-center gap-3">
                        <div class="w-12 h-12 rounded-xl bg-indigo-600 text-white flex items-center justify-center font-bold">
                            <i data-lucide="music" class="w-6 h-6"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-sm text-white">{{ $document->file_name }}</h4>
                            <p class="text-xs text-slate-400">File âm thanh MP3 / Audio</p>
                        </div>
                    </div>
                    <audio controls class="w-full rounded-lg outline-none">
                        <source src="{{ route('documents.preview', $document) }}">
                        Trình duyệt không hỗ trợ phát âm thanh.
                    </audio>
                </div>
            @elseif(in_array($ext, ['jpg', 'jpeg', 'png', 'gif', 'webp', 'svg']))
                <!-- Image Viewer -->
                <div class="rounded-2xl overflow-hidden border border-slate-200 bg-slate-100 flex items-center justify-center p-4">
                    <img src="{{ route('documents.preview', $document) }}" alt="{{ $document->title }}" class="max-h-[500px] w-auto rounded-xl object-contain shadow-md">
                </div>
            @else
                <!-- Other Files (DOCX, ZIP, PPTX, XLSX) Info Card -->
                <div class="bg-slate-50 rounded-2xl p-6 border border-slate-200 flex flex-col sm:flex-row items-center justify-between gap-4">
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 rounded-2xl bg-indigo-100 text-indigo-700 flex items-center justify-center shrink-0 font-extrabold text-xs uppercase border border-indigo-200">
                            {{ $ext ?: 'FILE' }}
                        </div>
                        <div>
                            <h4 class="font-bold text-slate-900 text-sm">{{ $document->file_name }}</h4>
                            <p class="text-xs text-slate-500">Tệp định dạng {{ strtoupper($ext) }} • Dung lượng {{ $document->formatted_size }}</p>
                        </div>
                    </div>
                    <a href="{{ route('documents.download', $document) }}" class="px-5 py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white font-bold text-xs rounded-xl shadow-md transition-all shrink-0 flex items-center gap-1.5">
                        <i data-lucide="download" class="w-4 h-4"></i> Tải Về Máy
                    </a>
                </div>
            @endif
        </div>

        <!-- Big Download CTA Banner -->
        <div class="bg-gradient-to-r from-indigo-600 via-indigo-700 to-purple-700 rounded-3xl p-6 sm:p-8 text-white flex flex-col sm:flex-row items-center justify-between gap-6 shadow-xl shadow-indigo-500/20">
            <div class="space-y-1 text-center sm:text-left">
                <span class="text-xs uppercase font-bold tracking-wider text-indigo-200">Tệp tin chính thức</span>
                <h4 class="font-black text-lg text-white truncate max-w-xs sm:max-w-md">{{ $document->file_name }}</h4>
                <p class="text-xs text-indigo-100">Dung lượng {{ $document->formatted_size }} • Đã sẵn sàng để tải xuống miễn phí</p>
            </div>

            <a href="{{ route('documents.download', $document) }}" 
               class="px-6 py-3.5 bg-white text-indigo-700 hover:bg-indigo-50 font-black text-sm rounded-2xl shadow-lg transition-all flex items-center gap-2 shrink-0">
                <i data-lucide="download" class="w-5 h-5"></i> Tải Về Máy Ngay
            </a>
        </div>

    </div>

    <!-- Related Shared Documents -->
    @if(isset($relatedDocuments) && $relatedDocuments->count() > 0)
    <div class="space-y-4 pt-4">
        <h3 class="text-lg font-black text-slate-900">Các tài liệu khác trong thư viện</h3>
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
            @foreach($relatedDocuments as $rel)
            <div class="bg-white p-5 rounded-2xl border border-slate-100 hover:shadow-lg transition-all flex flex-col justify-between group">
                <div>
                    <span class="text-[10px] font-bold uppercase px-2 py-0.5 rounded bg-indigo-50 text-indigo-700 border border-indigo-100 mb-2 inline-block">
                        {{ $rel->file_type ?? 'FILE' }}
                    </span>
                    <h4 class="font-bold text-sm text-slate-900 group-hover:text-indigo-600 transition-colors line-clamp-2">
                        <a href="{{ route('documents.show', $rel) }}">{{ $rel->title }}</a>
                    </h4>
                </div>
                <div class="mt-4 pt-3 border-t border-slate-100 flex items-center justify-between text-xs text-slate-500">
                    <span>{{ $rel->formatted_size }}</span>
                    <a href="{{ route('documents.download', $rel) }}" class="text-indigo-600 font-bold hover:underline flex items-center gap-1">
                        <i data-lucide="download" class="w-3.5 h-3.5"></i> Tải
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @endif

</div>
@endsection
