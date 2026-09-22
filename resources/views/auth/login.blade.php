@extends('layouts.app')

@section('title', 'Đăng nhập Google - FlyHigh English')

@section('content')
<div class="min-h-[80vh] flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8 bg-slate-50">
    
    <!-- Main Card Container -->
    <div class="max-w-md w-full bg-white rounded-3xl shadow-xl border border-slate-200/90 p-6 sm:p-10 space-y-8">
        
        <!-- Header & Icon -->
        <div class="text-center space-y-3">
            <div class="w-16 h-16 rounded-3xl bg-blue-50 text-blue-600 border border-blue-100 flex items-center justify-center mx-auto shadow-sm">
                <svg class="w-8 h-8" viewBox="0 0 24 24">
                    <path fill="#4285F4" d="M23.745 12.27c0-.7-.06-1.4-.19-2.07H12v4.51h6.6c-.29 1.52-1.14 2.82-2.4 3.68v3.05h3.88c2.27-2.09 3.665-5.17 3.665-9.17z"/>
                    <path fill="#34A853" d="M12 24c3.24 0 5.95-1.08 7.93-2.91l-3.88-3.05c-1.08.72-2.45 1.16-4.05 1.16-3.12 0-5.77-2.1-6.72-4.93H1.28v3.15C3.25 21.3 7.31 24 12 24z"/>
                    <path fill="#FBBC05" d="M5.28 14.27c-.25-.72-.38-1.49-.38-2.27s.13-1.55.38-2.27V6.58H1.28C.46 8.2.0 10.04.0 12s.46 3.8 1.28 5.42l4-3.15z"/>
                    <path fill="#EA4335" d="M12 4.75c1.77 0 3.35.61 4.6 1.8l3.42-3.42C17.95 1.19 15.24.0 12 .0 7.31.0 3.25 2.7 1.28 6.58l4 3.15c.95-2.83 3.6-4.98 6.72-4.98z"/>
                </svg>
            </div>
            <h1 class="text-2xl sm:text-3xl font-black text-slate-900 font-heading">Đăng Nhập Học Viên</h1>
            <p class="text-xs text-slate-500 leading-relaxed">
                Hệ thống chỉ hỗ trợ đăng nhập 1-Click an toàn bằng <strong class="text-slate-800 font-bold">tài khoản Google cá nhân</strong>. Bạn không cần tự gõ email hay tạo mật khẩu.
            </p>
        </div>

        <!-- Single Google OAuth Login Button -->
        <div class="space-y-4">
            <a href="{{ route('auth.google') }}" 
               class="w-full py-4 px-6 bg-white hover:bg-slate-50 text-slate-800 font-extrabold text-sm rounded-2xl border border-slate-300 shadow-md transition-all flex items-center justify-center gap-3 hover:shadow-lg hover:border-slate-400 hover:scale-[1.01] active:scale-[0.99] group">
                <svg class="w-6 h-6 shrink-0" viewBox="0 0 24 24">
                    <path fill="#4285F4" d="M23.745 12.27c0-.7-.06-1.4-.19-2.07H12v4.51h6.6c-.29 1.52-1.14 2.82-2.4 3.68v3.05h3.88c2.27-2.09 3.665-5.17 3.665-9.17z"/>
                    <path fill="#34A853" d="M12 24c3.24 0 5.95-1.08 7.93-2.91l-3.88-3.05c-1.08.72-2.45 1.16-4.05 1.16-3.12 0-5.77-2.1-6.72-4.93H1.28v3.15C3.25 21.3 7.31 24 12 24z"/>
                    <path fill="#FBBC05" d="M5.28 14.27c-.25-.72-.38-1.49-.38-2.27s.13-1.55.38-2.27V6.58H1.28C.46 8.2.0 10.04.0 12s.46 3.8 1.28 5.42l4-3.15z"/>
                    <path fill="#EA4335" d="M12 4.75c1.77 0 3.35.61 4.6 1.8l3.42-3.42C17.95 1.19 15.24.0 12 .0 7.31.0 3.25 2.7 1.28 6.58l4 3.15c.95-2.83 3.6-4.98 6.72-4.98z"/>
                </svg>
                <span class="font-heading">Đăng Nhập Bằng Tài Khoản Google</span>
            </a>

            <div class="bg-blue-50/70 border border-blue-100 rounded-2xl p-4 text-xs text-blue-900 space-y-1.5">
                <div class="flex items-center gap-2 font-bold text-blue-700">
                    <i data-lucide="shield-check" class="w-4 h-4 text-blue-600"></i> Xác thực chính chủ 100%
                </div>
                <p class="text-[11px] text-slate-600 leading-normal">
                    Tài khoản học tập và tiến độ bài học của bạn sẽ được đồng bộ trực tiếp theo Google ID cá nhân.
                </p>
            </div>
        </div>

        <!-- Footer Info & Admin Link Toggle -->
        <div class="pt-4 border-t border-slate-100 text-center space-y-3">
            <p class="text-xs text-slate-500">
                Chưa có tài khoản học viên? 
                <a href="{{ route('register') }}" class="font-extrabold text-blue-600 hover:underline">Đăng ký mới bằng Google</a>
            </p>

            <div>
                <button type="button" onclick="toggleAdminLogin()" class="text-[11px] text-slate-400 hover:text-slate-600 transition-colors font-medium">
                    🛡️ Dành cho Quản trị viên (Admin Login)
                </button>
            </div>

            <!-- Admin Hidden Login Form -->
            <div id="adminLoginForm" class="hidden pt-3 border-t border-dashed border-slate-200 text-left space-y-3">
                <div class="p-3 bg-amber-50 border border-amber-200 rounded-xl">
                    <p class="text-[11px] font-bold text-amber-800">Cổng đăng nhập hệ thống Admin</p>
                </div>
                <form action="{{ route('login') }}" method="POST" class="space-y-3">
                    @csrf
                    <div>
                        <label class="block text-[10px] uppercase font-bold text-slate-600 mb-1">Email Admin</label>
                        <input type="email" name="email" id="adminEmail" required class="w-full px-3 py-2 bg-slate-50 border border-slate-300 rounded-xl text-xs focus:ring-2 focus:ring-amber-500">
                    </div>
                    <div>
                        <label class="block text-[10px] uppercase font-bold text-slate-600 mb-1">Mật khẩu Admin</label>
                        <input type="password" name="password" id="adminPassword" required class="w-full px-3 py-2 bg-slate-50 border border-slate-300 rounded-xl text-xs focus:ring-2 focus:ring-amber-500">
                    </div>
                    <button type="submit" class="w-full py-2.5 bg-amber-500 hover:bg-amber-600 text-slate-950 font-bold text-xs rounded-xl shadow-sm">
                        Đăng Nhập Quyền Admin
                    </button>
                </form>
            </div>
        </div>

    </div>
</div>
@endsection

@section('scripts')
<script>
    function toggleAdminLogin() {
        const form = document.getElementById('adminLoginForm');
        form.classList.toggle('hidden');
    }
</script>
@endsection

