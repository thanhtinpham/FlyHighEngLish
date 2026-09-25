@extends('layouts.app')

@section('title', 'Tải lên nhiều tài liệu mới - Admin')

@section('content')
<div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 py-10 space-y-6">
    
    <a href="{{ route('admin.documents.index') }}" class="inline-flex items-center gap-2 text-sm font-bold text-slate-500 hover:text-indigo-600">
        <i data-lucide="arrow-left" class="w-4 h-4"></i> Quay lại quản lý tài liệu
    </a>

    <div class="bg-white rounded-3xl border border-slate-100 shadow-xl p-8 sm:p-10 space-y-6">
        <div>
            <h1 class="text-2xl font-black text-slate-900">Upload Hàng Loạt Tài Liệu Mới</h1>
            <p class="text-sm text-slate-500">Tải lên cùng lúc nhiều tệp PDF, DOCX, MP3, ZIP... Tên tài liệu mặc định lấy theo tên file.</p>
        </div>

        <form action="{{ route('admin.documents.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <div>
                <label for="files" class="block text-sm font-bold text-slate-700 mb-1">Chọn tệp tài liệu <span class="text-rose-500">*</span></label>
                <div class="border-2 border-dashed border-slate-200 rounded-2xl p-8 text-center hover:border-indigo-500 transition-colors bg-slate-50 cursor-pointer" onclick="document.getElementById('files').click()">
                    <i data-lucide="upload-cloud" class="w-12 h-12 text-indigo-500 mx-auto mb-3"></i>
                    <p class="text-sm font-bold text-slate-800">Nhấn vào đây để chọn 1 hoặc nhiều file cùng lúc</p>
                    <p class="text-xs text-slate-400 mt-1 mb-4">Giữ phím Ctrl hoặc Shift để chọn hàng loạt file. Dung lượng tối đa: 50MB/file</p>
                    <input type="file" id="files" name="files[]" multiple required onchange="updateCreateFilesList(this)" class="hidden">
                    <button type="button" class="px-4 py-2 bg-indigo-50 text-indigo-700 font-bold text-xs rounded-xl border border-indigo-200">
                        Duyệt file từ máy tính
                    </button>
                </div>
                <div id="createFilesListStatus" class="mt-3 text-xs font-semibold text-indigo-600"></div>
                @error('files')
                <p class="mt-1 text-xs text-rose-600 font-medium">{{ $message }}</p>
                @enderror
            </div>

            <div class="pt-4 border-t border-slate-100 flex items-center justify-end gap-3">
                <a href="{{ route('admin.documents.index') }}" class="px-5 py-3 rounded-xl bg-slate-100 font-bold text-sm text-slate-600 hover:bg-slate-200">
                    Hủy bỏ
                </a>
                <button type="submit" class="px-6 py-3 rounded-xl bg-indigo-600 hover:bg-indigo-700 text-white font-bold text-sm shadow-lg shadow-indigo-500/20">
                    Tải Lên Tất Cả Tệp
                </button>
            </div>

        </form>
    </div>

</div>

<script>
function updateCreateFilesList(input) {
    const status = document.getElementById('createFilesListStatus');
    if (input.files && input.files.length > 0) {
        status.innerHTML = `✓ Đã chọn ${input.files.length} tệp: ` + Array.from(input.files).map(f => f.name).join(', ');
    } else {
        status.innerHTML = '';
    }
}
</script>
@endsection
