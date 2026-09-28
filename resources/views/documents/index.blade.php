@extends('layouts.app')

@section('title', 'Kho tài liệu học tập')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 space-y-10">
    
    <!-- Title & Search Bar Header -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 bg-white p-6 sm:p-8 rounded-3xl border border-slate-100 shadow-sm">
        <div>
            <div class="inline-flex items-center gap-2 px-3 py-1 bg-indigo-50 text-indigo-700 rounded-full text-xs font-bold mb-2 border border-indigo-100">
                <i data-lucide="folder-open" class="w-3.5 h-3.5"></i> Thư Viện Tài Liệu Fly High
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

    <!-- Section Header for Document Categories & Buttons -->
    <div class="space-y-4">
        <div class="flex items-center justify-between">
            <h2 class="text-lg font-black text-slate-900 flex items-center gap-2">
                <i data-lucide="layers" class="w-5 h-5 text-indigo-600"></i> Danh Mục & Thư Viện Tài Liệu
            </h2>
            <span class="text-xs font-semibold text-slate-400">Chọn mục tài liệu để xem hoặc mở liên kết</span>
        </div>

        <!-- Large Document Category Cards Grid (Nút Tài liệu chung & Các Nút Tài liệu khác có kích thước bằng Card Tài liệu) -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            
            <!-- CARD 1: NÚT TÀI LIỆU CHUNG (Tệp Đăng Tải Trực Tiếp Trên Hệ Thống) -->
            <a href="#taiLieuChungSection" 
               class="relative group bg-gradient-to-br from-indigo-900 via-slate-900 to-purple-950 rounded-3xl p-6 text-white shadow-xl hover:shadow-2xl hover:-translate-y-1 transition-all duration-300 flex flex-col justify-between overflow-hidden border border-indigo-500/30">
                <div class="absolute -right-6 -bottom-6 w-32 h-32 bg-indigo-500/10 rounded-full blur-2xl group-hover:bg-indigo-500/20 transition-all"></div>
                
                <div>
                    <div class="flex items-center justify-between gap-2 mb-4">
                        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-indigo-500/20 text-indigo-300 text-xs font-extrabold border border-indigo-500/40">
                            <i data-lucide="folder-check" class="w-3.5 h-3.5 text-indigo-400"></i> TÀI LIỆU CHUNG
                        </span>
                        <span class="px-2.5 py-0.5 rounded-lg bg-white/10 text-white font-mono text-xs font-bold">
                            {{ $documents->total() }} tệp
                        </span>
                    </div>

                    <div class="flex items-start gap-3.5 mb-2">
                        <div class="w-12 h-12 rounded-2xl bg-indigo-600/40 text-indigo-200 flex items-center justify-center shrink-0 border border-indigo-400/30 group-hover:scale-110 transition-transform">
                            <i data-lucide="folder-open" class="w-6 h-6 text-white"></i>
                        </div>
                        <div>
                            <h3 class="text-lg font-black text-white group-hover:text-indigo-200 transition-colors">Tài Liệu Chung</h3>
                            <p class="text-xs text-indigo-200/80 mt-1 line-clamp-2">Kho tài liệu PDF, MP3 bài luyện và file học tập do Admin đăng tải trực tiếp</p>
                        </div>
                    </div>
                </div>

                <div class="mt-6 pt-4 border-t border-indigo-500/20 flex items-center justify-between text-xs font-bold text-indigo-300 group-hover:text-white transition-colors">
                    <span>Xem các tệp bên dưới</span>
                    <i data-lucide="arrow-down" class="w-4 h-4 group-hover:translate-y-1 transition-transform"></i>
                </div>
            </a>

            <!-- CARDS: NÚT TÀI LIỆU KHÁC (Các Nút Do Admin Tạo) -->
            @if(isset($customButtons) && $customButtons->count() > 0)
                @php
                    $styles = [
                        ['bg' => 'from-emerald-900 via-teal-950 to-slate-900 border-emerald-500/30', 'badge' => 'bg-emerald-500/20 text-emerald-300 border-emerald-500/40', 'iconBg' => 'bg-emerald-600/40 text-emerald-200 border-emerald-400/30', 'textAccent' => 'group-hover:text-emerald-200', 'borderTop' => 'border-emerald-500/20'],
                        ['bg' => 'from-amber-900 via-orange-950 to-slate-900 border-amber-500/30', 'badge' => 'bg-amber-500/20 text-amber-300 border-amber-500/40', 'iconBg' => 'bg-amber-600/40 text-amber-200 border-amber-400/30', 'textAccent' => 'group-hover:text-amber-200', 'borderTop' => 'border-amber-500/20'],
                        ['bg' => 'from-rose-900 via-pink-950 to-slate-900 border-rose-500/30', 'badge' => 'bg-rose-500/20 text-rose-300 border-rose-500/40', 'iconBg' => 'bg-rose-600/40 text-rose-200 border-rose-400/30', 'textAccent' => 'group-hover:text-rose-200', 'borderTop' => 'border-rose-500/20'],
                        ['bg' => 'from-blue-900 via-sky-950 to-slate-900 border-blue-500/30', 'badge' => 'bg-blue-500/20 text-blue-300 border-blue-500/40', 'iconBg' => 'bg-blue-600/40 text-blue-200 border-blue-400/30', 'textAccent' => 'group-hover:text-blue-200', 'borderTop' => 'border-blue-500/20'],
                        ['bg' => 'from-purple-900 via-indigo-950 to-slate-900 border-purple-500/30', 'badge' => 'bg-purple-500/20 text-purple-300 border-purple-500/40', 'iconBg' => 'bg-purple-600/40 text-purple-200 border-purple-400/30', 'textAccent' => 'group-hover:text-purple-200', 'borderTop' => 'border-purple-500/20'],
                    ];
                @endphp
                @foreach($customButtons as $index => $cBtn)
                @php
                    $st = $styles[$index % count($styles)];
                @endphp
                <a href="{{ $cBtn->url }}" target="_blank" 
                   class="relative group bg-gradient-to-br {{ $st['bg'] }} rounded-3xl p-6 text-white shadow-xl hover:shadow-2xl hover:-translate-y-1 transition-all duration-300 flex flex-col justify-between overflow-hidden border">
                    
                    <div>
                        <div class="flex items-center justify-between gap-2 mb-4">
                            <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-extrabold border {{ $st['badge'] }}">
                                <i data-lucide="link" class="w-3.5 h-3.5"></i> TÀI LIỆU KHÁC
                            </span>
                            <span class="px-2.5 py-0.5 rounded-lg bg-white/10 text-white text-[11px] font-bold uppercase tracking-wider">
                                External Link
                            </span>
                        </div>

                        <div class="flex items-start gap-3.5 mb-2">
                            <div class="w-12 h-12 rounded-2xl {{ $st['iconBg'] }} flex items-center justify-center shrink-0 border group-hover:scale-110 transition-transform">
                                <i data-lucide="{{ $cBtn->icon ?? 'external-link' }}" class="w-6 h-6 text-white"></i>
                            </div>
                            <div>
                                <h3 class="text-lg font-black text-white {{ $st['textAccent'] }} transition-colors line-clamp-1">{{ $cBtn->name }}</h3>
                                <p class="text-xs text-slate-300/80 mt-1 line-clamp-2 font-mono truncate max-w-xs">{{ $cBtn->url }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="mt-6 pt-4 border-t {{ $st['borderTop'] }} flex items-center justify-between text-xs font-bold text-white/90 group-hover:text-white transition-colors">
                        <span>Truy cập tài liệu</span>
                        <i data-lucide="external-link" class="w-4 h-4 group-hover:translate-x-0.5 group-hover:-translate-y-0.5 transition-transform"></i>
                    </div>
                </a>
                @endforeach
            @endif

        </div>
    </div>

    <!-- Container section for Uploaded Files under "Tài Liệu Chung" -->
    <div id="taiLieuChungSection" class="space-y-6 pt-4">
        <div class="flex items-center justify-between border-b border-slate-200/80 pb-4">
            <div class="flex items-center gap-3">
                <span class="w-10 h-10 rounded-2xl bg-indigo-600 text-white flex items-center justify-center font-black shadow-md shadow-indigo-500/20">
                    <i data-lucide="folder-check" class="w-5 h-5"></i>
                </span>
                <div>
                    <h2 class="text-xl font-black text-slate-900 tracking-tight">Tài Liệu Chung (Tệp Đăng Tải Trực Tiếp)</h2>
                    <p class="text-xs text-slate-500">Danh sách tất cả các bài học, tệp âm thanh và tài liệu do Admin đăng tải trên hệ thống</p>
                </div>
            </div>
            <span class="px-3 py-1 bg-indigo-50 text-indigo-700 text-xs font-extrabold rounded-full border border-indigo-100">
                Hiển thị {{ $documents->count() }} / {{ $documents->total() }} tài liệu
            </span>
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

</div>
@endsection
