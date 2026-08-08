@extends('layouts.app')

@section('title', 'Kho tài liệu học tập')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 space-y-8">
    
    <!-- Title & Search Bar Header -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 bg-white p-6 sm:p-8 rounded-3xl border border-slate-100 shadow-sm">
        <div>
            <h1 class="text-2xl sm:text-3xl font-black text-slate-900 tracking-tight">Kho Tài Liệu Tiếng Anh</h1>
            <p class="mt-1 text-sm text-slate-500">Xem và tải tài liệu đã được kiểm duyệt bởi Admin FlyHigh English</p>
        </div>

        <form action="{{ route('documents.index') }}" method="GET" class="w-full md:w-80">
            @if($selectedCategorySlug)
                <input type="hidden" name="category" value="{{ $selectedCategorySlug }}">
            @endif
            <div class="relative">
                <input type="text" name="search" value="{{ $search }}"
                       class="w-full pl-10 pr-4 py-3 rounded-2xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-indigo-500 text-sm"
                       placeholder="Tìm kiếm tài liệu...">
                <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                    <i data-lucide="search" class="w-4 h-4"></i>
                </div>
            </div>
        </form>
    </div>

    <!-- Category Tabs (Nghe, Nói, Đọc, Viết) -->
    <div class="flex items-center gap-2 overflow-x-auto pb-2 scrollbar-none">
        <a href="{{ route('documents.index', array_filter(['search' => $search])) }}" 
           class="px-5 py-2.5 rounded-2xl font-bold text-sm whitespace-nowrap transition-all {{ !$selectedCategorySlug ? 'bg-indigo-600 text-white shadow-lg shadow-indigo-500/25' : 'bg-white text-slate-600 border border-slate-200 hover:bg-slate-100' }}">
            Tất cả tài liệu
        </a>

        @foreach($categories as $category)
        <a href="{{ route('documents.index', array_filter(['category' => $category->slug, 'search' => $search])) }}" 
           class="px-5 py-2.5 rounded-2xl font-bold text-sm whitespace-nowrap transition-all flex items-center gap-2 {{ $selectedCategorySlug === $category->slug ? 'bg-indigo-600 text-white shadow-lg shadow-indigo-500/25' : 'bg-white text-slate-600 border border-slate-200 hover:bg-slate-100' }}">
            <i data-lucide="{{ $category->icon ?? 'file-text' }}" class="w-4 h-4"></i>
            {{ $category->name }}
        </a>
        @endforeach
    </div>

    <!-- Document Cards List -->
    @if($documents->count() > 0)
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($documents as $doc)
        <div class="bg-white rounded-3xl border border-slate-100 p-6 shadow-sm hover:shadow-xl transition-all duration-200 flex flex-col justify-between group">
            <div>
                <div class="flex items-center justify-between gap-2 mb-3">
                    <span class="px-3 py-1 rounded-xl text-xs font-bold bg-indigo-50 text-indigo-700 border border-indigo-100">
                        {{ $doc->category->name }}
                    </span>
                    <span class="text-xs font-semibold text-slate-500 uppercase px-2 py-0.5 rounded bg-slate-50 border">
                        {{ $doc->file_type ?? 'FILE' }}
                    </span>
                </div>
                <h3 class="text-base font-bold text-slate-900 group-hover:text-indigo-600 transition-colors line-clamp-2">
                    <a href="{{ route('documents.show', $doc) }}">{{ $doc->title }}</a>
                </h3>
                <p class="mt-2 text-xs text-slate-500 line-clamp-3 leading-relaxed">
                    {{ $doc->description ?? 'Không có mô tả thêm cho tài liệu này.' }}
                </p>
            </div>

            <div class="mt-6 pt-4 border-t border-slate-100 space-y-3">
                <div class="flex items-center justify-between text-xs text-slate-500">
                    <span><i data-lucide="hard-drive" class="w-3.5 h-3.5 inline"></i> {{ $doc->formatted_size }}</span>
                    <span><i data-lucide="download-cloud" class="w-3.5 h-3.5 inline"></i> {{ $doc->download_count }} lượt tải</span>
                </div>

                <div class="flex items-center gap-2">
                    <a href="{{ route('documents.show', $doc) }}" 
                       class="flex-1 text-center py-2.5 bg-slate-100 hover:bg-slate-200 text-slate-700 rounded-xl font-bold text-xs transition-colors">
                        Chi tiết
                    </a>
                    <a href="{{ route('documents.download', $doc) }}" 
                       class="flex-1 text-center py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white rounded-xl font-bold text-xs shadow-md shadow-indigo-500/20 transition-all flex items-center justify-center gap-1.5">
                        <i data-lucide="download" class="w-3.5 h-3.5"></i> Tải về
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
        <h3 class="text-lg font-bold text-slate-800">Không tìm thấy tài liệu phù hợp</h3>
        <p class="text-sm text-slate-500">Thử tìm kiếm với từ khóa khác hoặc chọn danh mục kỹ năng khác.</p>
        <a href="{{ route('documents.index') }}" class="inline-flex items-center gap-2 text-sm font-bold text-indigo-600 hover:underline">
            Xóa bộ lọc tìm kiếm
        </a>
    </div>
    @endif

</div>
@endsection
