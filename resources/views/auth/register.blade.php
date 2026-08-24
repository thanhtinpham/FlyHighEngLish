@extends('layouts.app')

@section('title', 'Đăng ký Gmail - FlyHigh English')

@section('content')
<div class="min-h-[80vh] flex items-center justify-center py-10 px-4 sm:px-6 lg:px-8 bg-slate-50">
    
    <!-- Main Card Container -->
    <div class="max-w-md w-full bg-white rounded-3xl shadow-xl border border-slate-200 p-6 sm:p-8 space-y-6">
        
        <!-- Header & Logo -->
        <div class="text-center space-y-2">
            <div class="w-12 h-12 rounded-2xl bg-rose-600 text-white flex items-center justify-center mx-auto shadow-sm">
                <i data-lucide="user-plus" class="w-6 h-6"></i>
            </div>
            <h2 class="text-2xl font-black text-slate-900 font-heading">Đăng Ký Học Viên Mới</h2>
            <p class="text-xs text-slate-500">Nhập địa chỉ <strong class="text-slate-800">Gmail (@gmail.com)</strong> để đăng ký tài khoản học tập tức thì</p>
        </div>

        <!-- Google OAuth 1-Click Register Button -->
        <div class="space-y-3">
            <a href="{{ route('auth.google') }}" class="w-full py-3.5 px-4 bg-white hover:bg-slate-50 text-slate-700 font-bold text-xs rounded-2xl border border-slate-300 shadow-sm transition-all flex items-center justify-center gap-3 hover:shadow-md hover:border-slate-400 group">
                <svg class="w-5 h-5 shrink-0" viewBox="0 0 24 24">
                    <path fill="#4285F4" d="M23.745 12.27c0-.7-.06-1.4-.19-2.07H12v4.51h6.6c-.29 1.52-1.14 2.82-2.4 3.68v3.05h3.88c2.27-2.09 3.665-5.17 3.665-9.17z"/>
                    <path fill="#34A853" d="M12 24c3.24 0 5.95-1.08 7.93-2.91l-3.88-3.05c-1.08.72-2.45 1.16-4.05 1.16-3.12 0-5.77-2.1-6.72-4.93H1.28v3.15C3.25 21.3 7.31 24 12 24z"/>
                    <path fill="#FBBC05" d="M5.28 14.27c-.25-.72-.38-1.49-.38-2.27s.13-1.55.38-2.27V6.58H1.28C.46 8.2.0 10.04.0 12s.46 3.8 1.28 5.42l4-3.15z"/>
                    <path fill="#EA4335" d="M12 4.75c1.77 0 3.35.61 4.6 1.8l3.42-3.42C17.95 1.19 15.24.0 12 .0 7.31.0 3.25 2.7 1.28 6.58l4 3.15c.95-2.83 3.6-4.98 6.72-4.98z"/>
                </svg>
                <span class="font-heading">Đăng Ký Nhanh Bằng Google OAuth</span>
            </a>

            <div class="relative flex items-center justify-center py-1">
                <div class="border-t border-slate-200 w-full"></div>
                <span class="bg-white px-3 text-[10px] uppercase font-bold text-slate-400 shrink-0">Hoặc nhập thủ công bên dưới</span>
            </div>
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
                           class="w-full pl-10 pr-3.5 py-3 bg-slate-50 rounded-xl border border-slate-300 text-slate-900 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-rose-600 focus:border-transparent text-xs transition-all"
                           placeholder="Ví dụ: Nguyễn Văn A">
                </div>
            </div>

            <div>
                <label for="email" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">Địa Chỉ Gmail Học Viên (*@gmail.com) *</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                        <i data-lucide="mail" class="w-4.5 h-4.5"></i>
                    </div>
                    <input id="email" name="email" type="email" autocomplete="email" required value="{{ old('email') }}"
                           class="w-full pl-10 pr-3.5 py-3 bg-slate-50 rounded-xl border border-slate-300 text-slate-900 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-rose-600 focus:border-transparent text-xs transition-all @error('email') border-rose-500 @enderror"
                           placeholder="tenhocvien@gmail.com">
                </div>
                @error('email')
                <p class="mt-1.5 text-[11px] text-rose-500 font-semibold flex items-center gap-1">
                    <i data-lucide="alert-circle" class="w-3 h-3"></i> {{ $message }}
                </p>
                @enderror
            </div>

            <button type="submit" class="w-full py-3.5 bg-rose-600 hover:bg-rose-700 text-white font-extrabold text-xs rounded-xl shadow-sm transition-all flex items-center justify-center gap-2 mt-2">
                <i data-lucide="check-circle" class="w-4 h-4"></i> Đăng Ký & Học Ngay Bằng Gmail
            </button>
        </form>

        <div class="text-center border-t border-slate-100 pt-4">
            <p class="text-xs text-slate-500">
                Đã có Gmail trên hệ thống? 
                <a href="{{ route('login') }}" class="font-extrabold text-rose-600 hover:underline">Đăng nhập bằng Gmail tại đây</a>
            </p>
        </div>

    </div>
</div>
@endsection
