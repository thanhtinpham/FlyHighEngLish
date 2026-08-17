@extends('layouts.app')

@section('title', 'Đăng nhập hệ thống - FlyHigh English')

@section('content')
<div class="min-h-[80vh] flex items-center justify-center py-10 px-4 sm:px-6 lg:px-8 bg-slate-50">
    
    <!-- Main Card Container (Single Centered Box) -->
    <div class="max-w-md w-full bg-white rounded-2xl shadow-xl border border-slate-200 p-6 sm:p-8 space-y-6">
        
        <!-- Header & Logo -->
        <div class="text-center space-y-2">
            <div class="w-12 h-12 rounded-xl bg-blue-600 text-white flex items-center justify-center mx-auto shadow-sm">
                <i data-lucide="graduation-cap" class="w-6 h-6"></i>
            </div>
            <h2 class="text-2xl font-extrabold text-slate-900 font-heading">Chào Mừng Trở Lại!</h2>
            <p class="text-xs text-slate-500">Đăng nhập tài khoản để truy cập phòng học tương tác</p>
        </div>

        <!-- 1-Click Quick Login Buttons -->
        <div class="p-3.5 rounded-xl bg-slate-50 border border-slate-200 space-y-2">
            <span class="text-[11px] font-bold text-slate-600 uppercase tracking-wider flex items-center gap-1">
                <i data-lucide="zap" class="w-3.5 h-3.5 text-amber-500"></i> Đăng nhập nhanh 1-Click:
            </span>

            <div class="grid grid-cols-2 gap-2">
                <button type="button" onclick="fillCredentials('user@flyhighenglish.com', 'password')" 
                        class="py-2 px-3 rounded-lg bg-white hover:bg-blue-50 border border-slate-200 text-left transition-all shadow-sm">
                    <span class="text-xs font-bold text-blue-700 block font-heading">👤 Học Viên</span>
                    <span class="text-[10px] text-slate-400 block">Click điền tự động</span>
                </button>

                <button type="button" onclick="fillCredentials('admin@flyhighenglish.com', 'password')" 
                        class="py-2 px-3 rounded-lg bg-white hover:bg-amber-50 border border-slate-200 text-left transition-all shadow-sm">
                    <span class="text-xs font-bold text-amber-700 block font-heading">🛡️ Quản Trị</span>
                    <span class="text-[10px] text-slate-400 block">Click điền tự động</span>
                </button>
            </div>
        </div>

        <!-- Main Login Form -->
        <form class="space-y-4" action="{{ route('login') }}" method="POST">
            @csrf

            <div>
                <label for="email" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1">Địa Chỉ Email *</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                        <i data-lucide="mail" class="w-4 h-4"></i>
                    </div>
                    <input id="email" name="email" type="email" autocomplete="email" required value="{{ old('email') }}"
                           class="w-full pl-10 pr-3.5 py-2.5 bg-slate-50 rounded-lg border border-slate-300 text-slate-900 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent text-xs transition-all @error('email') border-rose-500 @enderror"
                           placeholder="nhapemail@domain.com">
                </div>
                @error('email')
                <p class="mt-1 text-[11px] text-rose-500 font-semibold flex items-center gap-1">
                    <i data-lucide="alert-circle" class="w-3 h-3"></i> {{ $message }}
                </p>
                @enderror
            </div>

            <div>
                <div class="flex items-center justify-between mb-1">
                    <label for="password" class="block text-xs font-bold text-slate-700 uppercase tracking-wider">Mật Khẩu *</label>
                </div>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                        <i data-lucide="lock" class="w-4 h-4"></i>
                    </div>
                    <input id="password" name="password" type="password" required 
                           class="w-full pl-10 pr-3.5 py-2.5 bg-slate-50 rounded-lg border border-slate-300 text-slate-900 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent text-xs transition-all"
                           placeholder="••••••••">
                </div>
            </div>

            <div class="flex items-center justify-between">
                <label class="flex items-center gap-2 cursor-pointer">
                    <input type="checkbox" name="remember" class="w-4 h-4 rounded border-slate-300 text-blue-600 focus:ring-blue-500">
                    <span class="text-xs text-slate-600 font-semibold">Ghi nhớ đăng nhập</span>
                </label>
            </div>

            <button type="submit" class="w-full py-3 bg-blue-600 hover:bg-blue-700 text-white font-bold text-xs rounded-lg shadow-sm transition-all">
                Đăng Nhập Ngay
            </button>
        </form>

        <div class="text-center border-t border-slate-100 pt-4">
            <p class="text-xs text-slate-500">
                Chưa có tài khoản? 
                <a href="{{ route('register') }}" class="font-bold text-blue-600 hover:underline">Đăng ký tài khoản mới</a>
            </p>
        </div>

    </div>
</div>
@endsection

@section('scripts')
<script>
    function fillCredentials(email, password) {
        document.getElementById('email').value = email;
        document.getElementById('password').value = password;
        if (typeof showToast === 'function') {
            showToast('🔑 Đã tự động điền tài khoản', `Email: ${email}`, 'sky');
        }
    }
</script>
@endsection
