@extends('layouts.app')

@section('title', 'Kho tài liệu học tập')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 space-y-8">
    
    <!-- Title & Search Bar Header -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 bg-white p-6 sm:p-8 rounded-3xl border border-slate-100 shadow-sm">
        <div>
            <div class="inline-flex items-center gap-2 px-3 py-1 bg-indigo-50 text-indigo-700 rounded-full text-xs font-bold mb-2 border border-indigo-100">
                <i data-lucide="folder-open" class="w-3.5 h-3.5"></i> Thư Viện Tài Liệu Dùng Chung
            </div>
            <h1 class="text-2xl sm:text-3xl font-black text-slate-900 tracking-tight">Kho Tài Liệu Tiếng Anh</h1>
            <p class="mt-1 text-sm text-slate-500">Tải về các tài liệu PDF, tệp âm thanh MP3, bài tập và tài liệu học tập miễn phí</p>
        </div>

        <form action="{{ route('documents.index') }}" method="GET" class="w-full md:w-96">
            <div class="relative">
                <input type="text" name="search" value="{{ $search ?? '' }}"
                       class="w-full pl-10 pr-12 py-3 rounded-2xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-indigo-500 text-sm shadow-xs"
                       placeholder="Tìm kiếm theo tên tài liệu / tên file...">
                <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                    <i data-lucide="search" class="w-4 h-4"></i>
                </div>
                @if($search ?? '')
                <a href="{{ route('documents.index') }}" class="absolute inset-y-0 right-0 pr-3.5 flex items-center text-slate-400 hover:text-slate-600">
                    <i data-lucide="x" class="w-4 h-4"></i>
                </a>
                @endif
            </div>
        </form>
    </div>

    <!-- Document Cards List -->
    @if($documents->count() > 0)
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($documents as $doc)
        @php
            $ext = strtolower($doc->file_type ?? pathinfo($doc->file_name, PATHINFO_EXTENSION));
            $typeColor = match($ext) {
                'pdf' => 'bg-rose-50 text-rose-700 border-rose-100',
                'mp3', 'wav', 'ogg' => 'bg-emerald-50 text-emerald-700 border-emerald-100',
                'docx', 'doc' => 'bg-blue-50 text-blue-700 border-blue-100',
                'zip', 'rar' => 'bg-amber-50 text-amber-700 border-amber-100',
                default => 'bg-slate-50 text-slate-700 border-slate-100'
            };
        @endphp
        <div class="bg-white rounded-3xl border border-slate-100 p-6 shadow-sm hover:shadow-xl hover:-translate-y-0.5 transition-all duration-200 flex flex-col justify-between group">
            <div>
                <div class="flex items-center justify-between gap-2 mb-3">
                    <span class="text-[11px] font-extrabold uppercase px-2.5 py-0.5 rounded-lg border {{ $typeColor }}">
                        Tệp {{ $doc->file_type ?? 'FILE' }}
                    </span>
                    <span class="text-xs text-slate-400">
                        <i data-lucide="clock" class="w-3 h-3 inline"></i> {{ $doc->created_at->format('d/m/Y') }}
                    </span>
                </div>
                <h3 class="text-base font-bold text-slate-900 group-hover:text-indigo-600 transition-colors line-clamp-2">
                    <a href="{{ route('documents.show', $doc) }}">{{ $doc->title }}</a>
                </h3>
            </div>

            <div class="mt-6 pt-4 border-t border-slate-100 space-y-3">
                <div class="flex items-center justify-between text-xs text-slate-500">
                    <span class="flex items-center gap-1"><i data-lucide="hard-drive" class="w-3.5 h-3.5 text-indigo-500"></i> {{ $doc->formatted_size }}</span>
                    <span class="flex items-center gap-1"><i data-lucide="download-cloud" class="w-3.5 h-3.5 text-indigo-500"></i> {{ $doc->download_count }} lượt tải</span>
                </div>

                <div class="flex items-center gap-2 pt-1">
                    <a href="{{ route('documents.show', $doc) }}" 
                       class="flex-1 text-center py-2.5 bg-slate-100 hover:bg-slate-200 text-slate-700 rounded-xl font-bold text-xs transition-colors flex items-center justify-center gap-1">
                        <i data-lucide="eye" class="w-3.5 h-3.5"></i> Chi tiết
                    </a>
                    <a href="{{ route('documents.download', $doc) }}" 
                       class="flex-1 text-center py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white rounded-xl font-bold text-xs shadow-md shadow-indigo-500/20 transition-all flex items-center justify-center gap-1.5">
                        <i data-lucide="download" class="w-3.5 h-3.5"></i> Tải về máy
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Pagination -->
    <div class="pt-6">
        {{ $documents->links() }}
    </div>

    @else
    <div class="bg-white rounded-3xl p-12 text-center border border-slate-100 space-y-4">
        <div class="w-16 h-16 bg-slate-100 text-slate-400 rounded-full mx-auto flex items-center justify-center">
            <i data-lucide="folder-x" class="w-8 h-8"></i>
        </div>
        <h3 class="text-lg font-bold text-slate-800">Không tìm thấy tài liệu nào</h3>
        <p class="text-sm text-slate-500">Chưa có tài liệu phù hợp với từ khóa tìm kiếm của bạn.</p>
        <a href="{{ route('documents.index') }}" class="inline-flex items-center gap-2 text-sm font-bold text-indigo-600 hover:underline">
            Xem tất cả tài liệu
        </a>
    </div>
    @endif

</div>
@endsection
