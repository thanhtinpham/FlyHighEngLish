@extends('layouts.app')

@section('title', 'Quản Lý Yêu Cầu Tư Vấn & Thi VSTEP - Admin Fly High English')

@section('content')
<section class="bg-slate-900 text-white py-10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex items-center justify-between">
        <div>
            <a href="{{ route('admin.dashboard') }}" class="text-xs text-indigo-400 font-bold hover:underline mb-1 block">&larr; Quay lại Dashboard</a>
            <h1 class="text-2xl font-black">Danh Sách Đăng Ký Học Thử Zalo & Thi VSTEP</h1>
        </div>
    </div>
</section>

<section class="py-12 bg-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">

        <!-- Filter tabs -->
        <div class="flex gap-2">
            <a href="{{ route('admin.registrations.index') }}" class="px-4 py-2 rounded-xl text-xs font-bold transition-all {{ !$type ? 'bg-indigo-600 text-white shadow' : 'bg-white text-slate-700 hover:bg-slate-100 border' }}">
                Tất Cả Yêu Cầu
            </a>
            <a href="{{ route('admin.registrations.index', ['type' => 'zalo_trial']) }}" class="px-4 py-2 rounded-xl text-xs font-bold transition-all {{ $type === 'zalo_trial' ? 'bg-emerald-600 text-white shadow' : 'bg-white text-slate-700 hover:bg-slate-100 border' }}">
                💬 Đăng Ký Học Thử Zalo
            </a>
            <a href="{{ route('admin.registrations.index', ['type' => 'placement_test']) }}" class="px-4 py-2 rounded-xl text-xs font-bold transition-all {{ $type === 'placement_test' ? 'bg-indigo-600 text-white shadow' : 'bg-white text-slate-700 hover:bg-slate-100 border' }}">
                📝 Test Đầu Vào
            </a>
            <a href="{{ route('admin.registrations.index', ['type' => 'vstep_exam']) }}" class="px-4 py-2 rounded-xl text-xs font-bold transition-all {{ $type === 'vstep_exam' ? 'bg-amber-500 text-slate-950 shadow' : 'bg-white text-slate-700 hover:bg-slate-100 border' }}">
                🎓 Đăng Ký Thi Thử B1 VSTEP
            </a>
        </div>

        <div class="bg-white rounded-3xl p-6 border border-slate-200 shadow-sm overflow-x-auto">
            <table class="w-full text-left text-xs">
                <thead>
                    <tr class="bg-slate-50 text-slate-500 font-bold border-b">
                        <th class="p-3">Họ và tên</th>
                        <th class="p-3">Số điện thoại / Email</th>
                        <th class="p-3">Loại đăng ký</th>
                        <th class="p-3">Nội dung ghi chú / Kết quả</th>
                        <th class="p-3">Trạng thái xử lý</th>
                        <th class="p-3">Ngày gửi</th>
                        <th class="p-3 text-right">Thao tác</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($registrations as $r)
                    <tr>
                        <td class="p-3 font-extrabold text-slate-900">{{ $r->name }}</td>
                        <td class="p-3 text-slate-600">
                            <strong>{{ $r->phone }}</strong>
                            <span class="block text-[10px] text-slate-400">{{ $r->email ?? 'Chưa nhập Email' }}</span>
                        </td>
                        <td class="p-3 font-bold text-indigo-600">{{ $r->type_label }}</td>
                        <td class="p-3 text-slate-700 max-w-xs">{{ $r->notes }}</td>
                        <td class="p-3">
                            <form action="{{ route('admin.registrations.updateStatus', $r->id) }}" method="POST" class="inline">
                                @csrf
                                @method('PATCH')
                                <select name="status" onchange="this.form.submit()" class="px-2.5 py-1 rounded-lg border text-[11px] font-bold {{ $r->status === 'pending' ? 'bg-amber-50 text-amber-800 border-amber-200' : 'bg-emerald-50 text-emerald-800 border-emerald-200' }}">
                                    <option value="pending" {{ $r->status === 'pending' ? 'selected' : '' }}>⏳ Chờ xử lý</option>
                                    <option value="contacted" {{ $r->status === 'contacted' ? 'selected' : '' }}>📞 Đã tư vấn Zalo</option>
                                    <option value="enrolled" {{ $r->status === 'enrolled' ? 'selected' : '' }}>✅ Đã nhập học</option>
                                    <option value="cancelled" {{ $r->status === 'cancelled' ? 'selected' : '' }}>❌ Đã hủy</option>
                                </select>
                            </form>
                        </td>
                        <td class="p-3 text-slate-400">{{ $r->created_at->format('d/m/Y H:i') }}</td>
                        <td class="p-3 text-right">
                            <form action="{{ route('admin.registrations.destroy', $r->id) }}" method="POST" class="inline" onsubmit="return confirm('Bạn có chắc muốn xóa bản ghi này?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="px-2.5 py-1 bg-rose-50 hover:bg-rose-100 text-rose-700 rounded-lg text-[11px] font-bold">Xóa</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="p-4 text-center text-slate-400">Không có dữ liệu đăng ký.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>
</section>
@endsection
