@extends('layouts.app')

@section('title', 'Admin Dashboard - Fly High English')

@section('content')
<section class="bg-slate-900 text-white py-10 border-b border-slate-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex items-center justify-between">
        <div>
            <span class="px-3 py-1 bg-amber-500/20 text-amber-400 rounded-full text-xs font-bold">ADMINISTRATION PORTAL</span>
            <h1 class="text-3xl font-black mt-2">Bảng Quản Trị Hệ Thống</h1>
        </div>
        <div class="flex flex-wrap gap-2">
            <a href="{{ route('admin.courses.create') }}" class="px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white text-xs font-bold rounded-xl transition-all">
                + Thêm Khóa Học
            </a>
            <a href="{{ route('admin.lessons.create') }}" class="px-4 py-2 bg-emerald-600 hover:bg-emerald-700 text-white text-xs font-bold rounded-xl transition-all">
                + Upload Bài Học HTML
            </a>
            <a href="{{ route('admin.documents.create') }}" class="px-4 py-2 bg-purple-600 hover:bg-purple-700 text-white text-xs font-bold rounded-xl transition-all">
                + Upload Tài Liệu
            </a>
        </div>
    </div>
</section>

<section class="py-12 bg-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-10">
        
        <!-- Compact Stats Cards -->
        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-3 sm:gap-4">
            <div class="bg-white p-3.5 sm:p-4 rounded-2xl border border-slate-200/90 shadow-xs flex items-center justify-between">
                <div>
                    <span class="text-[10px] sm:text-xs text-slate-400 font-bold block uppercase tracking-wider mb-0.5">Khóa Học</span>
                    <span class="text-xl sm:text-2xl font-black text-indigo-600">{{ $totalCourses }}</span>
                </div>
                <div class="w-9 h-9 rounded-xl bg-indigo-50 text-indigo-600 flex items-center justify-center shrink-0">
                    <i data-lucide="book-open" class="w-4 h-4"></i>
                </div>
            </div>

            <div class="bg-white p-3.5 sm:p-4 rounded-2xl border border-slate-200/90 shadow-xs flex items-center justify-between">
                <div>
                    <span class="text-[10px] sm:text-xs text-slate-400 font-bold block uppercase tracking-wider mb-0.5">Bài Học</span>
                    <span class="text-xl sm:text-2xl font-black text-emerald-600">{{ $totalLessons }}</span>
                </div>
                <div class="w-9 h-9 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center shrink-0">
                    <i data-lucide="file-code-2" class="w-4 h-4"></i>
                </div>
            </div>

            <div class="bg-white p-3.5 sm:p-4 rounded-2xl border border-slate-200/90 shadow-xs flex items-center justify-between">
                <div>
                    <span class="text-[10px] sm:text-xs text-slate-400 font-bold block uppercase tracking-wider mb-0.5">Tài Liệu</span>
                    <span class="text-xl sm:text-2xl font-black text-purple-600">{{ $totalDocuments }}</span>
                </div>
                <div class="w-9 h-9 rounded-xl bg-purple-50 text-purple-600 flex items-center justify-center shrink-0">
                    <i data-lucide="file-text" class="w-4 h-4"></i>
                </div>
            </div>

            <div class="bg-white p-3.5 sm:p-4 rounded-2xl border border-slate-200/90 shadow-xs flex items-center justify-between">
                <div>
                    <span class="text-[10px] sm:text-xs text-slate-400 font-bold block uppercase tracking-wider mb-0.5">Lượt Ghi Danh</span>
                    <span class="text-xl sm:text-2xl font-black text-amber-500">{{ $totalEnrollments }}</span>
                </div>
                <div class="w-9 h-9 rounded-xl bg-amber-50 text-amber-600 flex items-center justify-center shrink-0">
                    <i data-lucide="graduation-cap" class="w-4 h-4"></i>
                </div>
            </div>

            <div class="bg-white p-3.5 sm:p-4 rounded-2xl border border-slate-200/90 shadow-xs flex items-center justify-between">
                <div>
                    <span class="text-[10px] sm:text-xs text-slate-400 font-bold block uppercase tracking-wider mb-0.5">Học Viên</span>
                    <span class="text-xl sm:text-2xl font-black text-violet-600">{{ $totalStudents }}</span>
                </div>
                <div class="w-9 h-9 rounded-xl bg-violet-50 text-violet-600 flex items-center justify-center shrink-0">
                    <i data-lucide="users" class="w-4 h-4"></i>
                </div>
            </div>

            <div class="bg-white p-3.5 sm:p-4 rounded-2xl border border-slate-200/90 shadow-xs flex items-center justify-between">
                <div>
                    <span class="text-[10px] sm:text-xs text-slate-400 font-bold block uppercase tracking-wider mb-0.5">Đăng Ký Mới</span>
                    <span class="text-xl sm:text-2xl font-black text-rose-500">{{ $pendingRegistrations }}</span>
                </div>
                <div class="w-9 h-9 rounded-xl bg-rose-50 text-rose-600 flex items-center justify-center shrink-0">
                    <i data-lucide="bell" class="w-4 h-4"></i>
                </div>
            </div>
        </div>

        <!-- Prominent Admin Quick Navigation Cards -->
        <div>
            <div class="flex items-center justify-between mb-3">
                <h2 class="text-xs font-black uppercase tracking-wider text-slate-400 flex items-center gap-1.5">
                    <i data-lucide="layout-grid" class="w-4 h-4 text-indigo-600"></i> Quản Lý Chức Năng Hệ Thống
                </h2>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-4">
                <a href="{{ route('admin.courses.index') }}" class="group flex items-center gap-3.5 p-4 bg-gradient-to-r from-indigo-600 to-indigo-700 text-white rounded-2xl shadow-md shadow-indigo-200 hover:shadow-xl hover:shadow-indigo-300/40 hover:-translate-y-0.5 transition-all duration-200">
                    <div class="w-10 h-10 rounded-xl bg-white/20 flex items-center justify-center shrink-0 backdrop-blur-sm group-hover:scale-110 transition-transform">
                        <i data-lucide="book-open" class="w-5 h-5 text-white"></i>
                    </div>
                    <div>
                        <span class="block text-[10px] text-indigo-100 font-semibold uppercase tracking-wider">Danh mục</span>
                        <span class="text-xs font-black tracking-wide">Quản Lý Khóa Học</span>
                    </div>
                </a>

                <a href="{{ route('admin.lessons.index') }}" class="group flex items-center gap-3.5 p-4 bg-gradient-to-r from-emerald-600 to-teal-600 text-white rounded-2xl shadow-md shadow-emerald-200 hover:shadow-xl hover:shadow-emerald-300/40 hover:-translate-y-0.5 transition-all duration-200">
                    <div class="w-10 h-10 rounded-xl bg-white/20 flex items-center justify-center shrink-0 backdrop-blur-sm group-hover:scale-110 transition-transform">
                        <i data-lucide="file-code-2" class="w-5 h-5 text-white"></i>
                    </div>
                    <div>
                        <span class="block text-[10px] text-emerald-100 font-semibold uppercase tracking-wider">Nội dung HTML</span>
                        <span class="text-xs font-black tracking-wide">Quản Lý Bài Học</span>
                    </div>
                </a>

                <a href="{{ route('admin.documents.index') }}" class="group flex items-center gap-3.5 p-4 bg-gradient-to-r from-purple-600 to-indigo-600 text-white rounded-2xl shadow-md shadow-purple-200 hover:shadow-xl hover:shadow-purple-300/40 hover:-translate-y-0.5 transition-all duration-200">
                    <div class="w-10 h-10 rounded-xl bg-white/20 flex items-center justify-center shrink-0 backdrop-blur-sm group-hover:scale-110 transition-transform">
                        <i data-lucide="file-text" class="w-5 h-5 text-white"></i>
                    </div>
                    <div>
                        <span class="block text-[10px] text-purple-100 font-semibold uppercase tracking-wider">File & Thư viện</span>
                        <span class="text-xs font-black tracking-wide">Quản Lý Tài Liệu</span>
                    </div>
                </a>

                <a href="{{ route('admin.enrollments.index') }}" class="group flex items-center gap-3.5 p-4 bg-gradient-to-r from-amber-500 to-amber-600 text-slate-950 rounded-2xl shadow-md shadow-amber-200 hover:shadow-xl hover:shadow-amber-300/40 hover:-translate-y-0.5 transition-all duration-200">
                    <div class="w-10 h-10 rounded-xl bg-slate-950/15 flex items-center justify-center shrink-0 backdrop-blur-sm group-hover:scale-110 transition-transform">
                        <i data-lucide="graduation-cap" class="w-5 h-5 text-slate-950"></i>
                    </div>
                    <div>
                        <span class="block text-[10px] text-slate-900/70 font-bold uppercase tracking-wider">Duyệt học viên</span>
                        <span class="text-xs font-black tracking-wide">Ghi Danh Học Viên</span>
                    </div>
                </a>

                <a href="{{ route('admin.registrations.index') }}" class="group flex items-center gap-3.5 p-4 bg-gradient-to-r from-rose-600 to-pink-600 text-white rounded-2xl shadow-md shadow-rose-200 hover:shadow-xl hover:shadow-rose-300/40 hover:-translate-y-0.5 transition-all duration-200">
                    <div class="w-10 h-10 rounded-xl bg-white/20 flex items-center justify-center shrink-0 backdrop-blur-sm group-hover:scale-110 transition-transform">
                        <i data-lucide="message-square" class="w-5 h-5 text-white"></i>
                    </div>
                    <div>
                        <span class="block text-[10px] text-rose-100 font-semibold uppercase tracking-wider">Tư vấn & VSTEP</span>
                        <span class="text-xs font-black tracking-wide">Đăng Ký & VSTEP</span>
                    </div>
                </a>
            </div>
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
