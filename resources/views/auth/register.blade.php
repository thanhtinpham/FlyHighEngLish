@extends('layouts.app')

@section('title', 'Đăng ký tài khoản - FlyHigh English')

@section('content')
<div class="min-h-[80vh] flex items-center justify-center py-10 px-4 sm:px-6 lg:px-8 bg-slate-50">
    
    <!-- Main Card Container (Single Centered Box) -->
    <div class="max-w-md w-full bg-white rounded-2xl shadow-xl border border-slate-200 p-6 sm:p-8 space-y-6">
        
        <!-- Header & Logo -->
        <div class="text-center space-y-2">
            <div class="w-12 h-12 rounded-xl bg-blue-600 text-white flex items-center justify-center mx-auto shadow-sm">
                <i data-lucide="user-plus" class="w-6 h-6"></i>
            </div>
            <h2 class="text-2xl font-extrabold text-slate-900 font-heading">Tạo Tài Khoản Mới</h2>
            <p class="text-xs text-slate-500">Điền thông tin để đăng ký tài khoản học viên Fly High English</p>
        </div>

        <form class="space-y-4" action="{{ route('register') }}" method="POST">
            @csrf

            <div>
                <label for="name" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1">Họ Và Tên *</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                        <i data-lucide="user" class="w-4 h-4"></i>
                    </div>
                    <input id="name" name="name" type="text" required value="{{ old('name') }}"
                           class="w-full pl-10 pr-3.5 py-2.5 bg-slate-50 rounded-lg border border-slate-300 text-slate-900 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent text-xs transition-all @error('name') border-rose-500 @enderror"
                           placeholder="Ví dụ: Nguyễn Văn A">
                </div>
                @error('name')
                <p class="mt-1 text-[11px] text-rose-500 font-semibold">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="email" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1">Địa Chỉ Email *</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                        <i data-lucide="mail" class="w-4 h-4"></i>
                    </div>
                    <input id="email" name="email" type="email" autocomplete="email" required value="{{ old('email') }}"
                           class="w-full pl-10 pr-3.5 py-2.5 bg-slate-50 rounded-lg border border-slate-300 text-slate-900 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent text-xs transition-all @error('email') border-rose-500 @enderror"
                           placeholder="example@domain.com">
                </div>
                @error('email')
                <p class="mt-1 text-[11px] text-rose-500 font-semibold">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="password" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1">Mật Khẩu *</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                        <i data-lucide="lock" class="w-4 h-4"></i>
                    </div>
                    <input id="password" name="password" type="password" required 
                           class="w-full pl-10 pr-3.5 py-2.5 bg-slate-50 rounded-lg border border-slate-300 text-slate-900 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent text-xs transition-all @error('password') border-rose-500 @enderror"
                           placeholder="Tối thiểu 6 ký tự">
                </div>
                @error('password')
                <p class="mt-1 text-[11px] text-rose-500 font-semibold">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="password_confirmation" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1">Xác Nhận Mật Khẩu *</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                        <i data-lucide="shield-check" class="w-4 h-4"></i>
                    </div>
                    <input id="password_confirmation" name="password_confirmation" type="password" required 
                           class="w-full pl-10 pr-3.5 py-2.5 bg-slate-50 rounded-lg border border-slate-300 text-slate-900 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent text-xs transition-all"
                           placeholder="Nhập lại mật khẩu">
                </div>
            </div>

            <button type="submit" class="w-full py-3 bg-blue-600 hover:bg-blue-700 text-white font-bold text-xs rounded-lg shadow-sm transition-all mt-2">
                Đăng Ký Tài Khoản Học Viên
            </button>
        </form>

        <div class="text-center border-t border-slate-100 pt-4">
            <p class="text-xs text-slate-500">
                Đã có tài khoản? 
                <a href="{{ route('login') }}" class="font-bold text-blue-600 hover:underline">Đăng nhập tại đây</a>
            </p>
        </div>

    </div>
</div>
@endsection
