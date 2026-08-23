@extends('layouts.app')

@section('title', 'Đăng nhập Email - FlyHigh English')

@section('content')
<div class="min-h-[80vh] flex items-center justify-center py-10 px-4 sm:px-6 lg:px-8 bg-slate-50">
    
    <!-- Main Card Container -->
    <div class="max-w-md w-full bg-white rounded-3xl shadow-xl border border-slate-200 p-6 sm:p-8 space-y-6">
        
        <!-- Header & Logo -->
        <div class="text-center space-y-2">
            <div class="w-12 h-12 rounded-2xl bg-emerald-600 text-white flex items-center justify-center mx-auto shadow-emerald-glow">
                <i data-lucide="mail-check" class="w-6 h-6"></i>
            </div>
            <h2 class="text-2xl font-black text-slate-900 font-heading">Đăng Nhập Học Viên</h2>
            <p class="text-xs text-slate-500">Chỉ cần nhập địa chỉ Email để truy cập phòng học ngay tức thì</p>
        </div>

        <!-- 1-Click Quick Login Buttons -->
        <div class="p-3.5 rounded-2xl bg-emerald-50/60 border border-emerald-100 space-y-2">
            <span class="text-[11px] font-extrabold text-emerald-800 uppercase tracking-wider flex items-center gap-1">
                <i data-lucide="zap" class="w-3.5 h-3.5 text-amber-500"></i> Đăng nhập nhanh 1-Click:
            </span>

            <div class="grid grid-cols-2 gap-2">
                <button type="button" onclick="fillEmail('user@flyhighenglish.com')" 
                        class="py-2 px-3 rounded-xl bg-white hover:bg-emerald-100/50 border border-emerald-200 text-left transition-all shadow-soft-sm">
                    <span class="text-xs font-bold text-emerald-700 block font-heading">👤 Học Viên</span>
                    <span class="text-[10px] text-slate-400 block">Click chọn Email học viên</span>
                </button>

                <button type="button" onclick="fillAdmin('admin@flyhighenglish.com', 'password')" 
                        class="py-2 px-3 rounded-xl bg-white hover:bg-amber-50 border border-amber-200 text-left transition-all shadow-soft-sm">
                    <span class="text-xs font-bold text-amber-700 block font-heading">🛡️ Admin</span>
                    <span class="text-[10px] text-slate-400 block">Click chọn Quản trị viên</span>
                </button>
            </div>
        </div>

        <!-- Main Login Form -->
        <form class="space-y-4" action="{{ route('login') }}" method="POST">
            @csrf

            <div>
                <label for="email" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">Địa Chỉ Email Học Viên *</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                        <i data-lucide="mail" class="w-4.5 h-4.5"></i>
                    </div>
                    <input id="email" name="email" type="email" autocomplete="email" required value="{{ old('email') }}"
                           class="w-full pl-10 pr-3.5 py-3 bg-slate-50 rounded-xl border border-slate-300 text-slate-900 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-emerald-600 focus:border-transparent text-xs transition-all @error('email') border-rose-500 @enderror"
                           placeholder="nhapemail@domain.com">
                </div>
                @error('email')
                <p class="mt-1.5 text-[11px] text-rose-500 font-semibold flex items-center gap-1">
                    <i data-lucide="alert-circle" class="w-3 h-3"></i> {{ $message }}
                </p>
                @enderror
            </div>

            <!-- Optional Collapsible Admin Password -->
            <div id="adminPasswordWrapper" class="hidden space-y-1">
                <label for="password" class="block text-xs font-bold text-amber-700 uppercase tracking-wider mb-1">Mật Khẩu Admin</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                        <i data-lucide="lock" class="w-4 h-4"></i>
                    </div>
                    <input id="password" name="password" type="password"
                           class="w-full pl-10 pr-3.5 py-2.5 bg-amber-50/50 rounded-xl border border-amber-300 text-slate-900 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-amber-500 text-xs transition-all"
                           placeholder="••••••••">
                </div>
            </div>

            <button type="submit" class="w-full py-3.5 bg-emerald-600 hover:bg-emerald-700 text-white font-extrabold text-xs rounded-xl shadow-emerald-glow transition-all flex items-center justify-center gap-2">
                <i data-lucide="log-in" class="w-4 h-4"></i> Đăng Nhập Bằng Email
            </button>
        </form>

        <div class="text-center border-t border-slate-100 pt-4">
            <p class="text-xs text-slate-500">
                Chưa từng đăng ký? 
                <a href="{{ route('register') }}" class="font-extrabold text-emerald-600 hover:underline">Đăng ký Email mới tại đây</a>
            </p>
        </div>

    </div>
</div>
@endsection

@section('scripts')
<script>
    function fillEmail(email) {
        document.getElementById('email').value = email;
        document.getElementById('adminPasswordWrapper').classList.add('hidden');
        if (typeof showToast === 'function') {
            showToast('📧 Đã điền Email học viên', `Email: ${email}`, 'emerald');
        }
    }

    function fillAdmin(email, password) {
        document.getElementById('email').value = email;
        document.getElementById('adminPasswordWrapper').classList.remove('hidden');
        document.getElementById('password').value = password;
        if (typeof showToast === 'function') {
            showToast('🛡️ Đã điền Email & Mật khẩu Admin', `Email: ${email}`, 'sky');
        }
    }
</script>
@endsection
