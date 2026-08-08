@extends('layouts.app')

@section('title', 'Quản Lý Ghi Danh Học Viên - Admin Fly High English')

@section('content')
<section class="bg-slate-900 text-white py-10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex items-center justify-between">
        <div>
            <a href="{{ route('admin.dashboard') }}" class="text-xs text-indigo-400 font-bold hover:underline mb-1 block">&larr; Quay lại Dashboard</a>
            <h1 class="text-2xl font-black">Ghi Danh Học Viên Vào Khóa Học</h1>
        </div>
    </div>
</section>

<section class="py-12 bg-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 lg:grid-cols-12 gap-8">
        
        <!-- Form Ghi Danh Mới -->
        <div class="lg:col-span-4">
            <form action="{{ route('admin.enrollments.store') }}" method="POST" class="bg-white rounded-3xl p-6 border border-slate-200 shadow-sm space-y-4">
                @csrf
                <h3 class="font-black text-slate-900 text-lg">Cấp Quyền Học Viên</h3>
                <p class="text-xs text-slate-500">Chọn học viên và khóa học tương ứng để học viên có thể học các bài HTML trực tuyến.</p>

                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">Chọn Học Viên *</label>
                    <select name="user_id" required class="w-full px-4 py-3 rounded-xl border border-slate-200 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
                        @foreach($users as $u)
                        <option value="{{ $u->id }}">{{ $u->name }} ({{ $u->email }})</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">Chọn Khóa Học *</label>
                    <select name="course_id" required class="w-full px-4 py-3 rounded-xl border border-slate-200 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
                        @foreach($courses as $c)
                        <option value="{{ $c->id }}">{{ $c->title }}</option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="w-full py-3 bg-amber-500 hover:bg-amber-600 text-slate-950 font-extrabold text-xs rounded-xl shadow transition-all">
                    Xác Nhận Ghi Danh Học Viên
                </button>
            </form>
        </div>

        <!-- Danh sách Ghi danh hiện tại -->
        <div class="lg:col-span-8">
            <div class="bg-white rounded-3xl p-6 border border-slate-200 shadow-sm overflow-x-auto">
                <h3 class="font-black text-slate-900 text-lg mb-4">Danh Sách Học Viên Đang Học</h3>
                
                <table class="w-full text-left text-xs">
                    <thead>
                        <tr class="bg-slate-50 text-slate-500 font-bold border-b">
                            <th class="p-3">Học viên</th>
                            <th class="p-3">Khóa học ghi danh</th>
                            <th class="p-3">Trạng thái</th>
                            <th class="p-3">Ngày đăng ký</th>
                            <th class="p-3 text-right">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @forelse($enrollments as $e)
                        <tr>
                            <td class="p-3 font-extrabold text-slate-900">
                                {{ $e->user->name ?? 'Học viên' }}
                                <span class="block text-[10px] text-slate-400 font-normal">{{ $e->user->email ?? '' }}</span>
                            </td>
                            <td class="p-3 font-semibold text-indigo-600">{{ $e->course->title ?? 'Khóa học' }}</td>
                            <td class="p-3">
                                <span class="px-2.5 py-0.5 rounded-full text-[10px] font-extrabold bg-emerald-100 text-emerald-800">
                                    Đang học (Active)
                                </span>
                            </td>
                            <td class="p-3 text-slate-500">{{ $e->created_at->format('d/m/Y') }}</td>
                            <td class="p-3 text-right">
                                <form action="{{ route('admin.enrollments.destroy', $e->id) }}" method="POST" class="inline" onsubmit="return confirm('Bạn muốn hủy ghi danh học viên này?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="px-2.5 py-1 bg-rose-50 hover:bg-rose-100 text-rose-700 rounded-lg text-[11px] font-bold">Hủy ghi danh</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="p-4 text-center text-slate-400">Chưa có dữ liệu ghi danh.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</section>
@endsection
