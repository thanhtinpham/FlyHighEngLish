@extends('layouts.app')

@section('title', 'Đăng ký Google - FlyHigh English')

@section('content')
<div class="min-h-[80vh] flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8 bg-slate-50">
    
    <!-- Main Card Container -->
    <div class="max-w-md w-full bg-white rounded-3xl shadow-xl border border-slate-200/90 p-6 sm:p-10 space-y-8">
        
        <!-- Header & Icon -->
        <div class="text-center space-y-3">
            <div class="w-16 h-16 rounded-3xl bg-emerald-50 text-emerald-600 border border-emerald-100 flex items-center justify-center mx-auto shadow-sm">
                <svg class="w-8 h-8" viewBox="0 0 24 24">
                    <path fill="#4285F4" d="M23.745 12.27c0-.7-.06-1.4-.19-2.07H12v4.51h6.6c-.29 1.52-1.14 2.82-2.4 3.68v3.05h3.88c2.27-2.09 3.665-5.17 3.665-9.17z"/>
                    <path fill="#34A853" d="M12 24c3.24 0 5.95-1.08 7.93-2.91l-3.88-3.05c-1.08.72-2.45 1.16-4.05 1.16-3.12 0-5.77-2.1-6.72-4.93H1.28v3.15C3.25 21.3 7.31 24 12 24z"/>
                    <path fill="#FBBC05" d="M5.28 14.27c-.25-.72-.38-1.49-.38-2.27s.13-1.55.38-2.27V6.58H1.28C.46 8.2.0 10.04.0 12s.46 3.8 1.28 5.42l4-3.15z"/>
                    <path fill="#EA4335" d="M12 4.75c1.77 0 3.35.61 4.6 1.8l3.42-3.42C17.95 1.19 15.24.0 12 .0 7.31.0 3.25 2.7 1.28 6.58l4 3.15c.95-2.83 3.6-4.98 6.72-4.98z"/>
                </svg>
            </div>
            <h1 class="text-2xl sm:text-3xl font-black text-slate-900 font-heading">Đăng Ký Học Viên Mới</h1>
            <p class="text-xs text-slate-500 leading-relaxed">
                Đăng ký tài khoản học tập tức thì bằng <strong class="text-slate-800 font-bold">tài khoản Google cá nhân</strong>. Không mất thời gian gõ email hay tạo mật khẩu phức tạp.
            </p>
        </div>

        <!-- Single Google OAuth Register Button -->
        <div class="space-y-4">
            <a href="{{ route('auth.google') }}" 
               class="w-full py-4 px-6 bg-emerald-600 hover:bg-emerald-700 text-white font-extrabold text-sm rounded-2xl shadow-lg shadow-emerald-600/20 transition-all flex items-center justify-center gap-3 hover:scale-[1.01] active:scale-[0.99] group">
                <svg class="w-6 h-6 shrink-0 fill-current text-white" viewBox="0 0 24 24">
                    <path d="M23.745 12.27c0-.7-.06-1.4-.19-2.07H12v4.51h6.6c-.29 1.52-1.14 2.82-2.4 3.68v3.05h3.88c2.27-2.09 3.665-5.17 3.665-9.17z"/>
                    <path d="M12 24c3.24 0 5.95-1.08 7.93-2.91l-3.88-3.05c-1.08.72-2.45 1.16-4.05 1.16-3.12 0-5.77-2.1-6.72-4.93H1.28v3.15C3.25 21.3 7.31 24 12 24z"/>
                    <path d="M5.28 14.27c-.25-.72-.38-1.49-.38-2.27s.13-1.55.38-2.27V6.58H1.28C.46 8.2.0 10.04.0 12s.46 3.8 1.28 5.42l4-3.15z"/>
                    <path d="M12 4.75c1.77 0 3.35.61 4.6 1.8l3.42-3.42C17.95 1.19 15.24.0 12 .0 7.31.0 3.25 2.7 1.28 6.58l4 3.15c.95-2.83 3.6-4.98 6.72-4.98z"/>
                </svg>
                <span class="font-heading">Đăng Ký Nhanh Với Google</span>
            </a>

            <div class="bg-emerald-50/70 border border-emerald-100 rounded-2xl p-4 text-xs text-emerald-900 space-y-1.5">
                <div class="flex items-center gap-2 font-bold text-emerald-800">
                    <i data-lucide="zap" class="w-4 h-4 text-emerald-600"></i> Kích hoạt ngay lập tức
                </div>
                <p class="text-[11px] text-slate-600 leading-normal">
                    Sau khi chọn tài khoản Google cá nhân, bạn sẽ được chuyển thẳng đến Góc Học Tập với đầy đủ quyền hạn truy cập bài học.
                </p>
            </div>
        </div>

        <div class="pt-4 border-t border-slate-100 text-center">
            <p class="text-xs text-slate-500">
                Đã từng đăng ký trước đây? 
                <a href="{{ route('login') }}" class="font-extrabold text-emerald-700 hover:underline">Đăng nhập Google tại đây</a>
            </p>
        </div>

    </div>
</div>
@endsection

