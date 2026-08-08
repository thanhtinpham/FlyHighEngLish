@extends('layouts.app')

@section('title', 'Quản Lý Khóa Học - Admin Fly High English')

@section('content')
<section class="bg-slate-900 text-white py-10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex items-center justify-between">
        <div>
            <a href="{{ route('admin.dashboard') }}" class="text-xs text-indigo-400 font-bold hover:underline mb-1 block">&larr; Quay lại Dashboard</a>
            <h1 class="text-2xl font-black">Quản Lý Danh Sách Khóa Học</h1>
        </div>
        <a href="{{ route('admin.courses.create') }}" class="px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white text-xs font-bold rounded-xl transition-all">
            + Thêm Khóa Học Mới
        </a>
    </div>
</section>

<section class="py-12 bg-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white rounded-3xl p-6 border border-slate-200 shadow-sm overflow-x-auto">
            <table class="w-full text-left text-xs">
                <thead>
                    <tr class="bg-slate-50 text-slate-500 font-bold border-b">
                        <th class="p-3">Tên khóa học</th>
                        <th class="p-3">Phân loại</th>
                        <th class="p-3">Trình độ</th>
                        <th class="p-3">Bài HTML</th>
                        <th class="p-3">Học phí</th>
                        <th class="p-3">Trạng thái</th>
                        <th class="p-3 text-right">Thao tác</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($courses as $c)
                    <tr>
                        <td class="p-3 font-extrabold text-slate-900 max-w-xs">{{ $c->title }}</td>
                        <td class="p-3 font-semibold text-indigo-600">{{ $c->category_label }}</td>
                        <td class="p-3 text-slate-600">{{ $c->level }}</td>
                        <td class="p-3 font-bold text-slate-800">{{ $c->lessons_count }} bài</td>
                        <td class="p-3 font-bold text-emerald-600">{{ number_format($c->price) }} đ</td>
                        <td class="p-3">
                            <span class="px-2.5 py-0.5 rounded-full text-[10px] font-extrabold {{ $c->is_published ? 'bg-emerald-100 text-emerald-800' : 'bg-slate-100 text-slate-600' }}">
                                {{ $c->is_published ? 'Đã xuất bản' : 'Nháp' }}
                            </span>
                        </td>
                        <td class="p-3 text-right space-x-2">
                            <a href="{{ route('courses.show', $c->slug) }}" target="_blank" class="px-2.5 py-1 bg-slate-100 hover:bg-slate-200 text-slate-700 rounded-lg text-[11px] font-bold">Xem</a>
                            <a href="{{ route('admin.courses.edit', $c->id) }}" class="px-2.5 py-1 bg-indigo-50 hover:bg-indigo-100 text-indigo-700 rounded-lg text-[11px] font-bold">Sửa</a>
                            <form action="{{ route('admin.courses.destroy', $c->id) }}" method="POST" class="inline" onsubmit="return confirm('Bạn có chắc chắn muốn xóa khóa học này?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="px-2.5 py-1 bg-rose-50 hover:bg-rose-100 text-rose-700 rounded-lg text-[11px] font-bold">Xóa</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="p-4 text-center text-slate-400">Chưa có khóa học nào.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</section>
@endsection
