@extends('layouts.app')

@section('title', 'Đăng ký Email - FlyHigh English')

@section('content')
<div class="min-h-[80vh] flex items-center justify-center py-10 px-4 sm:px-6 lg:px-8 bg-slate-50">
    
    <!-- Main Card Container -->
    <div class="max-w-md w-full bg-white rounded-3xl shadow-xl border border-slate-200 p-6 sm:p-8 space-y-6">
        
        <!-- Header & Logo -->
        <div class="text-center space-y-2">
            <div class="w-12 h-12 rounded-2xl bg-emerald-600 text-white flex items-center justify-center mx-auto shadow-emerald-glow">
                <i data-lucide="user-plus" class="w-6 h-6"></i>
            </div>
            <h2 class="text-2xl font-black text-slate-900 font-heading">Đăng Ký Học Viên Mới</h2>
            <p class="text-xs text-slate-500">Chỉ cần nhập địa chỉ Email để tham gia học ngay mà không cần mật khẩu rườm rà</p>
        </div>

        <form class="space-y-4" action="{{ route('register') }}" method="POST">
            @csrf

            <div>
                <label for="name" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">Họ Và Tên (Không bắt buộc)</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                        <i data-lucide="user" class="w-4.5 h-4.5"></i>
                    </div>
                    <input id="name" name="name" type="text" value="{{ old('name') }}"
                           class="w-full pl-10 pr-3.5 py-3 bg-slate-50 rounded-xl border border-slate-300 text-slate-900 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-emerald-600 focus:border-transparent text-xs transition-all"
                           placeholder="Ví dụ: Nguyễn Văn A">
                </div>
            </div>

            <div>
                <label for="email" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">Địa Chỉ Email Học Viên *</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                        <i data-lucide="mail" class="w-4.5 h-4.5"></i>
                    </div>
                    <input id="email" name="email" type="email" autocomplete="email" required value="{{ old('email') }}"
                           class="w-full pl-10 pr-3.5 py-3 bg-slate-50 rounded-xl border border-slate-300 text-slate-900 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-emerald-600 focus:border-transparent text-xs transition-all @error('email') border-rose-500 @enderror"
                           placeholder="example@domain.com">
                </div>
                @error('email')
                <p class="mt-1.5 text-[11px] text-rose-500 font-semibold flex items-center gap-1">
                    <i data-lucide="alert-circle" class="w-3 h-3"></i> {{ $message }}
                </p>
                @enderror
            </div>

            <button type="submit" class="w-full py-3.5 bg-emerald-600 hover:bg-emerald-700 text-white font-extrabold text-xs rounded-xl shadow-emerald-glow transition-all flex items-center justify-center gap-2 mt-2">
                <i data-lucide="check-circle" class="w-4 h-4"></i> Đăng Ký & Học Ngay Bằng Email
            </button>
        </form>

        <div class="text-center border-t border-slate-100 pt-4">
            <p class="text-xs text-slate-500">
                Đã có Email trên hệ thống? 
                <a href="{{ route('login') }}" class="font-extrabold text-emerald-600 hover:underline">Đăng nhập tại đây</a>
            </p>
        </div>

    </div>
</div>
@endsection
