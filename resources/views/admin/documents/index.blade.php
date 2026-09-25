@extends('layouts.app')

@section('title', 'Quản lý tài liệu - Admin')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 space-y-8">
    
    <!-- Top Header -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 bg-white p-6 sm:p-8 rounded-3xl border border-slate-100 shadow-sm">
        <div>
            <span class="px-3 py-1 bg-indigo-50 text-indigo-700 rounded-full text-xs font-bold border border-indigo-100">ADMINISTRATION PORTAL</span>
            <h1 class="text-2xl sm:text-3xl font-black text-slate-900 mt-1">Quản Lý Thư Viện Tài Liệu</h1>
            <p class="text-sm text-slate-500">Tải lên 1 lần nhiều tệp tài liệu (PDF, MP3, ZIP...), quản lý danh sách tài liệu dùng chung</p>
        </div>

        <a href="#quickUploadSection" class="px-6 py-3.5 bg-indigo-600 hover:bg-indigo-700 text-white font-bold text-sm rounded-2xl shadow-lg shadow-indigo-500/20 transition-all flex items-center justify-center gap-2">
            <i data-lucide="upload-cloud" class="w-4 h-4"></i> Upload Nhanh Tệp Mới
        </a>
    </div>

    <!-- Quick Batch Upload Card (Khu vực Upload Nhanh Nhiều File) -->
    <div id="quickUploadSection" class="bg-gradient-to-br from-indigo-900 via-slate-900 to-purple-950 rounded-3xl p-6 sm:p-8 text-white shadow-xl space-y-6">
        <div class="flex items-center justify-between">
            <div class="space-y-1">
                <div class="inline-flex items-center gap-1.5 px-3 py-0.5 rounded-full bg-indigo-500/20 text-indigo-300 text-xs font-bold border border-indigo-500/30">
                    <i data-lucide="zap" class="w-3.5 h-3.5 text-amber-400"></i> UPLOAD HÀNG LOẠT DỄ DÀNG
                </div>
                <h2 class="text-xl font-black text-white">Tải Lên Nhiều Tệp Cùng Lúc</h2>
                <p class="text-xs text-indigo-200">Chọn 1 hoặc nhiều tệp (PDF, MP3, DOCX, ZIP, Ảnh...). Tên tài liệu sẽ tự động lấy theo tên file!</p>
            </div>
        </div>

        <form action="{{ route('admin.documents.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf

            <div class="border-2 border-dashed border-indigo-400/40 rounded-2xl p-6 sm:p-8 text-center hover:border-indigo-400 transition-colors bg-white/5 backdrop-blur-sm cursor-pointer relative" onclick="document.getElementById('quickFilesInput').click()">
                <div class="w-14 h-14 rounded-2xl bg-indigo-600/30 text-indigo-300 flex items-center justify-center mx-auto mb-3 border border-indigo-500/30">
                    <i data-lucide="upload-cloud" class="w-7 h-7"></i>
                </div>
                
                <p class="text-sm font-bold text-white mb-1">Click vào đây hoặc kéo thả nhiều tệp vào khu vực này</p>
                <p class="text-xs text-indigo-200">Hỗ trợ chọn nhiều file cùng lúc (Giữ Ctrl hoặc Shift khi chọn file). Dung lượng mỗi tệp tối đa 50MB</p>
                
                <input type="file" id="quickFilesInput" name="files[]" multiple required 
                       onchange="updateSelectedFilesCount(this)"
                       class="hidden">
            </div>

            <!-- Selected Files Info & Submit -->
            <div class="flex flex-col sm:flex-row items-center justify-between gap-4 pt-2">
                <div id="fileSelectionStatus" class="text-xs font-medium text-indigo-200">
                    Chưa chọn tệp nào.
                </div>
                <button type="submit" class="w-full sm:w-auto px-8 py-3.5 bg-gradient-to-r from-indigo-500 to-purple-600 hover:from-indigo-600 hover:to-purple-700 text-white font-extrabold text-sm rounded-xl shadow-lg shadow-indigo-500/30 transition-all flex items-center justify-center gap-2">
                    <i data-lucide="arrow-up-circle" class="w-4 h-4"></i> Tải Lên Tất Cả Tệp Đã Chọn
                </button>
            </div>
        </form>
    </div>

    <!-- Filter & Search Bar -->
    <div class="bg-white p-4 sm:p-6 rounded-3xl border border-slate-100 shadow-sm">
        <form action="{{ route('admin.documents.index') }}" method="GET" class="flex flex-col sm:flex-row items-center justify-between gap-4">
            <div class="relative w-full sm:w-96">
                <input type="text" name="search" value="{{ $search ?? '' }}" 
                       placeholder="Tìm kiếm tài liệu theo tên..."
                       class="w-full pl-9 pr-4 py-2.5 rounded-xl border border-slate-200 text-xs focus:ring-2 focus:ring-indigo-500">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-slate-400">
                    <i data-lucide="search" class="w-4 h-4"></i>
                </div>
            </div>

            <div class="flex items-center gap-2 w-full sm:w-auto">
                <button type="submit" class="px-5 py-2.5 bg-slate-900 hover:bg-slate-800 text-white font-bold text-xs rounded-xl transition-all flex items-center gap-1.5">
                    <i data-lucide="filter" class="w-3.5 h-3.5"></i> Tìm kiếm
                </button>
                @if($search ?? '')
                <a href="{{ route('admin.documents.index') }}" class="px-4 py-2.5 bg-slate-100 hover:bg-slate-200 text-slate-600 font-bold text-xs rounded-xl transition-all">
                    Xóa tìm kiếm
                </a>
                @endif
            </div>
        </form>
    </div>

    <!-- Documents Table Card -->
    <div class="bg-white rounded-3xl border border-slate-100 shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50/80 border-b border-slate-100 text-xs font-bold text-slate-500 uppercase tracking-wider">
                        <th class="px-6 py-4">Tên tài liệu / File gốc</th>
                        <th class="px-6 py-4">Định dạng</th>
                        <th class="px-6 py-4">Dung lượng</th>
                        <th class="px-6 py-4">Lượt tải</th>
                        <th class="px-6 py-4">Ngày đăng</th>
                        <th class="px-6 py-4 text-right">Thao tác</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 text-sm">
                    @forelse($documents as $doc)
                    <tr class="hover:bg-slate-50/50 transition-colors">
                        <td class="px-6 py-4 font-bold text-slate-900 max-w-sm">
                            <a href="{{ route('documents.show', $doc) }}" target="_blank" class="hover:text-indigo-600 line-clamp-1 flex items-center gap-1.5">
                                {{ $doc->title }}
                                <i data-lucide="external-link" class="w-3 h-3 text-slate-400"></i>
                            </a>
                            <span class="text-[11px] font-normal text-slate-400 font-mono block">Tệp: {{ $doc->file_name }}</span>
                        </td>
                        <td class="px-6 py-4">
                            <span class="px-2.5 py-0.5 rounded-lg text-xs font-extrabold uppercase bg-indigo-50 text-indigo-700 border border-indigo-100">
                                {{ $doc->file_type ?? 'FILE' }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-xs text-slate-500">
                            {{ $doc->formatted_size }}
                        </td>
                        <td class="px-6 py-4 font-bold text-slate-700">
                            {{ $doc->download_count }}
                        </td>
                        <td class="px-6 py-4 text-xs text-slate-400">
                            {{ $doc->created_at->format('d/m/Y H:i') }}
                        </td>
                        <td class="px-6 py-4 text-right space-x-1.5 whitespace-nowrap">
                            <a href="{{ route('documents.download', $doc) }}" title="Tải thử file" class="inline-flex items-center gap-1 px-2.5 py-1.5 rounded-lg bg-indigo-50 text-indigo-700 hover:bg-indigo-100 font-bold text-xs">
                                <i data-lucide="download" class="w-3.5 h-3.5"></i> Tải
                            </a>
                            <a href="{{ route('admin.documents.edit', $doc) }}" class="inline-flex items-center gap-1 px-3 py-1.5 rounded-lg bg-amber-50 text-amber-700 hover:bg-amber-100 font-bold text-xs">
                                <i data-lucide="edit-3" class="w-3.5 h-3.5"></i> Sửa
                            </a>
                            <form action="{{ route('admin.documents.destroy', $doc) }}" method="POST" class="inline" onsubmit="return confirm('Bạn có chắc chắn muốn xóa tài liệu này?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="inline-flex items-center gap-1 px-3 py-1.5 rounded-lg bg-rose-50 text-rose-700 hover:bg-rose-100 font-bold text-xs">
                                    <i data-lucide="trash-2" class="w-3.5 h-3.5"></i> Xóa
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="px-6 py-12 text-center text-slate-400">
                            <div class="w-12 h-12 rounded-full bg-slate-100 flex items-center justify-center mx-auto mb-2 text-slate-400">
                                <i data-lucide="folder-x" class="w-6 h-6"></i>
                            </div>
                            <p class="font-bold text-slate-700 text-sm">Chưa có tài liệu nào trong danh sách</p>
                            <p class="text-xs text-slate-400 mt-1">Dùng ô Upload phía trên để tải 1 hoặc nhiều file lên hệ thống.</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="px-6 py-4 border-t border-slate-100">
            {{ $documents->links() }}
        </div>
    </div>

</div>

<script>
function updateSelectedFilesCount(input) {
    const status = document.getElementById('fileSelectionStatus');
    if (input.files && input.files.length > 0) {
        status.innerHTML = `<span class="text-amber-300 font-bold">✓ Đã chọn ${input.files.length} tệp:</span> ` + 
                           Array.from(input.files).map(f => f.name).slice(0, 3).join(', ') + 
                           (input.files.length > 3 ? ` và ${input.files.length - 3} tệp khác...` : '');
    } else {
        status.innerHTML = 'Chưa chọn tệp nào.';
    }
}
</script>
@endsection
