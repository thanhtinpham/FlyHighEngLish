@extends('layouts.app')

@section('title', 'Quản lý thông báo - Admin')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 space-y-8">
    
    <!-- Header -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 bg-white p-6 rounded-3xl border border-slate-100 shadow-sm">
        <div>
            <h1 class="text-2xl font-black text-slate-900">Quản Lý Danh Sách Thông Báo</h1>
            <p class="text-sm text-slate-500">Tạo thông báo mới, đính ghim hoặc xóa bài thông báo</p>
        </div>

        <a href="{{ route('admin.notifications.create') }}" class="px-5 py-3 bg-emerald-600 hover:bg-emerald-700 text-white font-bold text-sm rounded-2xl shadow-md shadow-emerald-500/20 transition-all flex items-center justify-center gap-2">
            <i data-lucide="plus-circle" class="w-4 h-4"></i> Tạo Thông Báo Mới
        </a>
    </div>

    <!-- Table -->
    <div class="bg-white rounded-3xl border border-slate-100 shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50/80 border-b border-slate-100 text-xs font-bold text-slate-500 uppercase tracking-wider">
                        <th class="px-6 py-4">Tiêu đề thông báo</th>
                        <th class="px-6 py-4">Trạng thái Ghim</th>
                        <th class="px-6 py-4">Người đăng</th>
                        <th class="px-6 py-4">Thời gian tạo</th>
                        <th class="px-6 py-4 text-right">Thao tác</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 text-sm">
                    @forelse($notifications as $noti)
                    <tr class="hover:bg-slate-50/50 transition-colors">
                        <td class="px-6 py-4 font-bold text-slate-900 max-w-xs truncate">
                            <a href="{{ route('notifications.show', $noti) }}" class="hover:text-emerald-600">
                                {{ $noti->title }}
                            </a>
                        </td>
                        <td class="px-6 py-4">
                            @if($noti->is_pinned)
                            <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-lg text-xs font-extrabold bg-amber-500 text-white">
                                <i data-lucide="pin" class="w-3 h-3"></i> Đã ghim
                            </span>
                            @else
                            <span class="text-xs font-medium text-slate-400">Bình thường</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-xs font-semibold text-slate-600">
                            {{ $noti->author->name ?? 'Admin' }}
                        </td>
                        <td class="px-6 py-4 text-xs text-slate-500">
                            {{ $noti->created_at->format('d/m/Y H:i') }}
                        </td>
                        <td class="px-6 py-4 text-right space-x-2">
                            <a href="{{ route('admin.notifications.edit', $noti) }}" class="inline-flex items-center gap-1 px-3 py-1.5 rounded-lg bg-amber-50 text-amber-700 hover:bg-amber-100 font-bold text-xs">
                                <i data-lucide="edit-3" class="w-3.5 h-3.5"></i> Sửa
                            </a>
                            <form action="{{ route('admin.notifications.destroy', $noti) }}" method="POST" class="inline" onsubmit="return confirm('Bạn có chắc chắn muốn xóa thông báo này?')">
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
                        <td colspan="5" class="px-6 py-10 text-center text-slate-400">
                            Chưa có thông báo nào.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="px-6 py-4 border-t border-slate-100">
            {{ $notifications->links() }}
        </div>
    </div>

</div>
@endsection
