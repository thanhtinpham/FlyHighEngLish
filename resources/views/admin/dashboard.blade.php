@extends('layouts.app')

@section('title', 'Admin Dashboard - Fly High English')

@section('content')
<section class="bg-slate-900 text-white py-10 border-b border-slate-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex items-center justify-between">
        <div>
            <span class="px-3 py-1 bg-amber-500/20 text-amber-400 rounded-full text-xs font-bold">ADMINISTRATION PORTAL</span>
            <h1 class="text-3xl font-black mt-2">Bảng Quản Trị Hệ Thống</h1>
        </div>
        <div class="flex gap-2">
            <a href="{{ route('admin.courses.create') }}" class="px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white text-xs font-bold rounded-xl transition-all">
                + Thêm Khóa Học
            </a>
            <a href="{{ route('admin.lessons.create') }}" class="px-4 py-2 bg-emerald-600 hover:bg-emerald-700 text-white text-xs font-bold rounded-xl transition-all">
                + Upload Bài Học HTML
            </a>
        </div>
    </div>
</section>

<section class="py-12 bg-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-10">
        
        <!-- Stats Cards -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-6">
            <div class="bg-white p-6 rounded-3xl border border-slate-200 shadow-sm">
                <span class="text-xs text-slate-400 font-bold block uppercase mb-1">Tổng Khóa Học</span>
                <span class="text-3xl font-black text-indigo-600">{{ $totalCourses }}</span>
            </div>

            <div class="bg-white p-6 rounded-3xl border border-slate-200 shadow-sm">
                <span class="text-xs text-slate-400 font-bold block uppercase mb-1">Bài Học HTML</span>
                <span class="text-3xl font-black text-emerald-600">{{ $totalLessons }}</span>
            </div>

            <div class="bg-white p-6 rounded-3xl border border-slate-200 shadow-sm">
                <span class="text-xs text-slate-400 font-bold block uppercase mb-1">Lượt Ghi Danh</span>
                <span class="text-3xl font-black text-amber-500">{{ $totalEnrollments }}</span>
            </div>

            <div class="bg-white p-6 rounded-3xl border border-slate-200 shadow-sm">
                <span class="text-xs text-slate-400 font-bold block uppercase mb-1">Học Viên</span>
                <span class="text-3xl font-black text-violet-600">{{ $totalStudents }}</span>
            </div>

            <div class="bg-white p-6 rounded-3xl border border-slate-200 shadow-sm">
                <span class="text-xs text-slate-400 font-bold block uppercase mb-1">Đăng Ký Mới</span>
                <span class="text-3xl font-black text-rose-500">{{ $pendingRegistrations }}</span>
            </div>
        </div>

        <!-- Admin Quick Navigation Tabs -->
        <div class="flex gap-3 border-b border-slate-200 pb-4">
            <a href="{{ route('admin.courses.index') }}" class="px-4 py-2.5 bg-white border border-slate-200 hover:bg-indigo-50 hover:text-indigo-600 text-xs font-extrabold rounded-xl transition-all shadow-sm">
                📚 Quản Lý Khóa Học
            </a>
            <a href="{{ route('admin.lessons.index') }}" class="px-4 py-2.5 bg-white border border-slate-200 hover:bg-emerald-50 hover:text-emerald-600 text-xs font-extrabold rounded-xl transition-all shadow-sm">
                🖥️ Quản Lý Bài Học HTML
            </a>
            <a href="{{ route('admin.enrollments.index') }}" class="px-4 py-2.5 bg-white border border-slate-200 hover:bg-amber-50 hover:text-amber-600 text-xs font-extrabold rounded-xl transition-all shadow-sm">
                🎓 Ghi Danh Học Viên
            </a>
            <a href="{{ route('admin.registrations.index') }}" class="px-4 py-2.5 bg-white border border-slate-200 hover:bg-rose-50 hover:text-rose-600 text-xs font-extrabold rounded-xl transition-all shadow-sm">
                💬 Đăng Ký Học Thử & Thi VSTEP
            </a>
        </div>

        <!-- Recent Leads & Registrations Table -->
        <div class="bg-white rounded-3xl p-6 border border-slate-200 shadow-sm space-y-4">
            <div class="flex items-center justify-between border-b pb-4">
                <h3 class="font-black text-slate-900 text-lg">Yêu Cầu Tư Vấn & Đăng Ký Mới Nhất</h3>
                <a href="{{ route('admin.registrations.index') }}" class="text-xs font-bold text-indigo-600 hover:underline">Xem tất cả</a>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left text-xs">
                    <thead>
                        <tr class="bg-slate-50 text-slate-500 font-bold">
                            <th class="p-3 rounded-l-xl">Họ tên</th>
                            <th class="p-3">SĐT</th>
                            <th class="p-3">Loại đăng ký</th>
                            <th class="p-3">Ghi chú / Kết quả</th>
                            <th class="p-3">Trạng thái</th>
                            <th class="p-3 rounded-r-xl">Ngày gửi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @forelse($recentRegistrations as $reg)
                        <tr>
                            <td class="p-3 font-extrabold text-slate-900">{{ $reg->name }}</td>
                            <td class="p-3 text-slate-600">{{ $reg->phone }}</td>
                            <td class="p-3 font-semibold text-indigo-600">{{ $reg->type_label }}</td>
                            <td class="p-3 text-slate-500 max-w-xs truncate">{{ $reg->notes }}</td>
                            <td class="p-3">
                                <span class="px-2.5 py-0.5 rounded-full text-[10px] font-extrabold {{ $reg->status === 'pending' ? 'bg-amber-100 text-amber-800' : 'bg-emerald-100 text-emerald-800' }}">
                                    {{ $reg->status }}
                                </span>
                            </td>
                            <td class="p-3 text-slate-400">{{ $reg->created_at->format('d/m/Y H:i') }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="p-4 text-center text-slate-400">Chưa có yêu cầu nào.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</section>
@endsection
