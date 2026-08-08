@extends('layouts.app')

@section('title', 'Quản Lý Bài Học HTML - Admin Fly High English')

@section('content')
<section class="bg-slate-900 text-white py-10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex items-center justify-between">
        <div>
            <a href="{{ route('admin.dashboard') }}" class="text-xs text-indigo-400 font-bold hover:underline mb-1 block">&larr; Quay lại Dashboard</a>
            <h1 class="text-2xl font-black">Quản Lý Bài Học HTML Tương Tác</h1>
        </div>
        <a href="{{ route('admin.lessons.create') }}" class="px-4 py-2 bg-emerald-600 hover:bg-emerald-700 text-white text-xs font-bold rounded-xl transition-all">
            + Upload / Thêm Bài Học HTML Mới
        </a>
    </div>
</section>

<section class="py-12 bg-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">

        <!-- Filter by course -->
        <div class="bg-white rounded-2xl p-4 border border-slate-200 shadow-sm flex items-center gap-3">
            <span class="text-xs font-bold text-slate-700">Lọc theo khóa học:</span>
            <form action="{{ route('admin.lessons.index') }}" method="GET" class="flex gap-2">
                <select name="course_id" onchange="this.form.submit()" class="px-3 py-2 rounded-xl border border-slate-200 text-xs font-semibold">
                    <option value="">Tất cả các khóa học</option>
                    @foreach($courses as $c)
                    <option value="{{ $c->id }}" {{ $courseId == $c->id ? 'selected' : '' }}>{{ $c->title }}</option>
                    @endforeach
                </select>
            </form>
        </div>

        <div class="bg-white rounded-3xl p-6 border border-slate-200 shadow-sm overflow-x-auto">
            <table class="w-full text-left text-xs">
                <thead>
                    <tr class="bg-slate-50 text-slate-500 font-bold border-b">
                        <th class="p-3">Thứ tự</th>
                        <th class="p-3">Tên bài học</th>
                        <th class="p-3">Khóa học</th>
                        <th class="p-3">Tuần / Level</th>
                        <th class="p-3">Loại bài học</th>
                        <th class="p-3 text-right">Thao tác</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($lessons as $les)
                    <tr>
                        <td class="p-3 font-bold text-slate-400">#{{ $les->order }}</td>
                        <td class="p-3 font-extrabold text-slate-900 max-w-xs">{{ $les->title }}</td>
                        <td class="p-3 text-slate-600">{{ $les->course->title ?? '-' }}</td>
                        <td class="p-3 font-semibold text-indigo-600">{{ $les->level_or_week }}</td>
                        <td class="p-3">
                            @if($les->is_preview)
                                <span class="px-2 py-0.5 bg-emerald-100 text-emerald-800 text-[10px] font-extrabold rounded-full">Học thử (Preview)</span>
                            @else
                                <span class="px-2 py-0.5 bg-slate-100 text-slate-600 text-[10px] font-bold rounded-full">Bắt buộc đăng ký</span>
                            @endif
                        </td>
                        <td class="p-3 text-right space-x-2">
                            <a href="{{ route('lessons.show', $les->id) }}" target="_blank" class="px-2.5 py-1 bg-slate-100 hover:bg-slate-200 text-slate-700 rounded-lg text-[11px] font-bold">Mở xem</a>
                            <a href="{{ route('admin.lessons.edit', $les->id) }}" class="px-2.5 py-1 bg-indigo-50 hover:bg-indigo-100 text-indigo-700 rounded-lg text-[11px] font-bold">Sửa</a>
                            <form action="{{ route('admin.lessons.destroy', $les->id) }}" method="POST" class="inline" onsubmit="return confirm('Bạn có chắc chắn muốn xóa bài học này?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="px-2.5 py-1 bg-rose-50 hover:bg-rose-100 text-rose-700 rounded-lg text-[11px] font-bold">Xóa</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="p-4 text-center text-slate-400">Chưa có bài học nào.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>
</section>
@endsection
