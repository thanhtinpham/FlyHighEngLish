@extends('layouts.app')

@section('title', 'Đăng nhập hệ thống - FlyHigh English')

@section('content')
<div class="min-h-[85vh] flex items-center justify-center py-10 px-4 sm:px-6 lg:px-8 relative overflow-hidden bg-slate-50">
    
    <!-- Ambient Light Orbs -->
    <div class="absolute top-1/4 -left-20 w-96 h-96 bg-emerald-300/30 rounded-full blur-[120px] pointer-events-none animate-pulse"></div>
    <div class="absolute bottom-1/4 -right-20 w-96 h-96 bg-sky-300/30 rounded-full blur-[120px] pointer-events-none animate-pulse" style="animation-delay: 2s;"></div>

    <!-- Main Container Card -->
    <div class="max-w-5xl w-full grid grid-cols-1 lg:grid-cols-12 rounded-[2.5rem] overflow-hidden shadow-2xl border border-emerald-100 bg-white relative z-10 my-6">
        
        <!-- Left Side: Hero Brand Spotlight (Desktop) -->
        <div class="lg:col-span-5 p-8 sm:p-12 bg-gradient-to-br from-emerald-50 via-teal-50/50 to-sky-50 border-b lg:border-b-0 lg:border-r border-emerald-100 flex flex-col justify-between relative overflow-hidden">
            <div class="space-y-6 relative z-10">
                <!-- Brand Badge -->
                <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-emerald-100 text-emerald-800 text-xs font-bold tracking-wide border border-emerald-200">
                    <span class="w-2 h-2 rounded-full bg-emerald-500 animate-ping"></span>
                    Hệ Thống Học Tập Thông Minh 4.0
                </div>

                <div class="space-y-3">
                    <h2 class="text-3xl sm:text-4xl font-black text-slate-900 font-heading tracking-tight leading-tight">
                        Nâng Tầm Tiếng Anh Cùng <span class="text-gradient-emerald">FlyHigh</span>
                    </h2>
                    <p class="text-sm text-slate-600 leading-relaxed font-medium">
                        Truy cập kho bài học HTML tương tác độc quyền, tự động lưu tiến độ giúp bạn bứt phá band điểm.
                    </p>
                </div>

                <!-- 4 Skill Badges Showcase -->
                <div class="grid grid-cols-2 gap-3 pt-2">
                    <div class="p-3.5 rounded-2xl bg-white border border-emerald-100 flex items-center gap-3 shadow-soft-sm">
                        <div class="w-9 h-9 rounded-xl bg-emerald-100 text-emerald-700 flex items-center justify-center shrink-0 font-bold">
                            <i data-lucide="headphones" class="w-5 h-5"></i>
                        </div>
                        <div>
                            <span class="text-xs font-extrabold text-slate-900 block font-heading">Nghe</span>
                            <span class="text-[10px] text-slate-500">Listening Audio</span>
                        </div>
                    </div>

                    <div class="p-3.5 rounded-2xl bg-white border border-emerald-100 flex items-center gap-3 shadow-soft-sm">
                        <div class="w-9 h-9 rounded-xl bg-sky-100 text-sky-700 flex items-center justify-center shrink-0 font-bold">
                            <i data-lucide="mic" class="w-5 h-5"></i>
                        </div>
                        <div>
                            <span class="text-xs font-extrabold text-slate-900 block font-heading">Nói</span>
                            <span class="text-[10px] text-slate-500">Speaking Cards</span>
                        </div>
                    </div>

                    <div class="p-3.5 rounded-2xl bg-white border border-emerald-100 flex items-center gap-3 shadow-soft-sm">
                        <div class="w-9 h-9 rounded-xl bg-amber-100 text-amber-700 flex items-center justify-center shrink-0 font-bold">
                            <i data-lucide="book-open" class="w-5 h-5"></i>
                        </div>
                        <div>
                            <span class="text-xs font-extrabold text-slate-900 block font-heading">Đọc</span>
                            <span class="text-[10px] text-slate-500">Reading Passages</span>
                        </div>
                    </div>

                    <div class="p-3.5 rounded-2xl bg-white border border-emerald-100 flex items-center gap-3 shadow-soft-sm">
                        <div class="w-9 h-9 rounded-xl bg-teal-100 text-teal-700 flex items-center justify-center shrink-0 font-bold">
                            <i data-lucide="pen-tool" class="w-5 h-5"></i>
                        </div>
                        <div>
                            <span class="text-xs font-extrabold text-slate-900 block font-heading">Viết</span>
                            <span class="text-[10px] text-slate-500">Writing Essays</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bottom Stat Pill -->
            <div class="pt-8 mt-8 border-t border-emerald-100 flex items-center justify-between text-slate-500 text-xs">
                <span class="flex items-center gap-1.5 font-semibold">
                    <i data-lucide="shield-check" class="w-4 h-4 text-emerald-600"></i> Đăng nhập bảo mật 100%
                </span>
                <span class="text-emerald-700 font-bold">Laravel MVC</span>
            </div>
        </div>

        <!-- Right Side: Interactive Login Form -->
        <div class="lg:col-span-7 p-8 sm:p-12 flex flex-col justify-between bg-white">
            
            <div class="space-y-6">
                <!-- Form Header -->
                <div>
                    <h3 class="text-2xl sm:text-3xl font-black text-slate-900 font-heading tracking-tight">Chào Mừng Trở Lại!</h3>
                    <p class="mt-1.5 text-sm text-slate-500">Nhập thông tin tài khoản của bạn để truy cập phòng học tương tác</p>
                </div>

                <!-- One-Click Account Quick Switcher Buttons -->
                <div class="p-4 rounded-2xl bg-slate-50 border border-slate-200 space-y-3">
                    <div class="flex items-center justify-between">
                        <span class="text-xs font-extrabold text-slate-700 uppercase tracking-wider flex items-center gap-1.5 font-heading">
                            <i data-lucide="zap" class="w-3.5 h-3.5 text-amber-500"></i> Đăng nhập nhanh 1-Click:
                        </span>
                    </div>

                    <div class="grid grid-cols-2 gap-2.5">
                        <button type="button" onclick="fillCredentials('user@flyhighenglish.com', 'password')" 
                                class="py-2.5 px-3 rounded-xl bg-white hover:bg-emerald-50 border border-slate-200 hover:border-emerald-300 text-left transition-all group shadow-soft-sm">
                            <span class="text-xs font-extrabold text-emerald-700 block font-heading">👤 Học Viên (User)</span>
                            <span class="text-[10px] text-slate-400 block mt-0.5">Click điền tự động</span>
                        </button>

                        <button type="button" onclick="fillCredentials('admin@flyhighenglish.com', 'password')" 
                                class="py-2.5 px-3 rounded-xl bg-white hover:bg-amber-50 border border-slate-200 hover:border-amber-300 text-left transition-all group shadow-soft-sm">
                            <span class="text-xs font-extrabold text-amber-700 block font-heading">🛡️ Quản Trị (Admin)</span>
                            <span class="text-[10px] text-slate-400 block mt-0.5">Click điền tự động</span>
                        </button>
                    </div>
                </div>

                <!-- Main Login Form -->
                <form class="space-y-5" action="{{ route('login') }}" method="POST">
                    @csrf

                    <div>
                        <label for="email" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Địa Chỉ Email</label>
                        <div class="relative group">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400 group-focus-within:text-emerald-600 transition-colors">
                                <i data-lucide="mail" class="w-5 h-5"></i>
                            </div>
                            <input id="email" name="email" type="email" autocomplete="email" required value="{{ old('email') }}"
                                   class="w-full pl-11 pr-4 py-3.5 bg-slate-50 rounded-2xl border border-slate-200 text-slate-900 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent text-sm transition-all @error('email') border-rose-500 ring-2 ring-rose-500/20 @enderror"
                                   placeholder="nhapemail@domain.com">
                        </div>
                        @error('email')
                        <p class="mt-1.5 text-xs text-rose-500 font-semibold flex items-center gap-1">
                            <i data-lucide="alert-circle" class="w-3.5 h-3.5"></i> {{ $message }}
                        </p>
                        @enderror
                    </div>

                    <div>
                        <div class="flex items-center justify-between mb-2">
                            <label for="password" class="block text-xs font-bold text-slate-700 uppercase tracking-wider">Mật Khẩu</label>
                        </div>
                        <div class="relative group">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400 group-focus-within:text-emerald-600 transition-colors">
                                <i data-lucide="lock" class="w-5 h-5"></i>
                            </div>
                            <input id="password" name="password" type="password" required 
                                   class="w-full pl-11 pr-12 py-3.5 bg-slate-50 rounded-2xl border border-slate-200 text-slate-900 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent text-sm transition-all"
                                   placeholder="••••••••">
                        </div>
                    </div>

                    <div class="flex items-center justify-between">
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="checkbox" name="remember" class="w-4 h-4 rounded border-slate-300 text-emerald-600 focus:ring-emerald-500">
                            <span class="text-xs text-slate-600 font-semibold">Ghi nhớ đăng nhập</span>
                        </label>
                    </div>

                    <button type="submit" class="w-full py-4 bg-gradient-to-r from-emerald-600 to-teal-600 hover:from-emerald-700 hover:to-teal-700 text-white font-extrabold text-sm rounded-2xl shadow-emerald-glow transition-all hover:scale-[1.01]">
                        Đăng Nhập Ngay
                    </button>
                </form>

                <div class="text-center pt-2">
                    <p class="text-xs text-slate-500">
                        Chưa có tài khoản? 
                        <a href="{{ route('register') }}" class="font-extrabold text-emerald-600 hover:underline">Đăng ký tài khoản mới</a>
                    </p>
                </div>
            </div>

        </div>

    </div>
</div>
@endsection

@section('scripts')
<script>
    function fillCredentials(email, password) {
        document.getElementById('email').value = email;
        document.getElementById('password').value = password;
        showToast('🔑 Đã tự động điền tài khoản', `Email: ${email}`, 'emerald');
    }
</script>
@endsection
