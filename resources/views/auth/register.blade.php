@extends('layouts.app')

@section('title', 'Đăng ký tài khoản - FlyHigh English')

@section('content')
<div class="min-h-[85vh] flex items-center justify-center py-10 px-4 sm:px-6 lg:px-8 relative overflow-hidden bg-slate-50">
    
    <!-- Ambient Light Orbs -->
    <div class="absolute top-1/4 -right-20 w-96 h-96 bg-emerald-300/30 rounded-full blur-[120px] pointer-events-none animate-pulse"></div>
    <div class="absolute bottom-1/4 -left-20 w-96 h-96 bg-teal-300/30 rounded-full blur-[120px] pointer-events-none animate-pulse" style="animation-delay: 2s;"></div>

    <!-- Main Container Card -->
    <div class="max-w-5xl w-full grid grid-cols-1 lg:grid-cols-12 rounded-[2.5rem] overflow-hidden shadow-2xl border border-emerald-100 bg-white relative z-10 my-6">
        
        <!-- Left Side: Hero Spotlight (Desktop) -->
        <div class="lg:col-span-5 p-8 sm:p-12 bg-gradient-to-br from-emerald-50 via-teal-50/50 to-sky-50 border-b lg:border-b-0 lg:border-r border-emerald-100 flex flex-col justify-between relative overflow-hidden">
            <div class="space-y-6 relative z-10">
                <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-emerald-100 text-emerald-800 text-xs font-bold tracking-wide border border-emerald-200">
                    <span class="w-2 h-2 rounded-full bg-emerald-500 animate-ping"></span>
                    Đăng Ký Miễn Phí 100%
                </div>

                <div class="space-y-3">
                    <h2 class="text-3xl sm:text-4xl font-black text-slate-900 font-heading tracking-tight leading-tight">
                        Trở Thành Học Viên Của <span class="text-gradient-emerald">FlyHigh</span>
                    </h2>
                    <p class="text-sm text-slate-600 leading-relaxed font-medium">
                        Tạo tài khoản ngay để trải nghiệm kho bài học HTML tương tác 4D chuẩn quốc tế và theo dõi lộ trình bứt phá.
                    </p>
                </div>

                <!-- Feature Benefits Checklist -->
                <div class="space-y-3 pt-2">
                    <div class="flex items-center gap-3 p-3.5 rounded-2xl bg-white border border-emerald-100 shadow-soft-sm">
                        <div class="w-8 h-8 rounded-xl bg-emerald-100 text-emerald-700 flex items-center justify-center shrink-0 font-bold">
                            <i data-lucide="check" class="w-4 h-4"></i>
                        </div>
                        <span class="text-xs font-bold text-slate-800">Học thử bài học HTML không giới hạn</span>
                    </div>

                    <div class="flex items-center gap-3 p-3.5 rounded-2xl bg-white border border-emerald-100 shadow-soft-sm">
                        <div class="w-8 h-8 rounded-xl bg-emerald-100 text-emerald-700 flex items-center justify-center shrink-0 font-bold">
                            <i data-lucide="check" class="w-4 h-4"></i>
                        </div>
                        <span class="text-xs font-bold text-slate-800">Tự động lưu điểm & thời gian học tập</span>
                    </div>

                    <div class="flex items-center gap-3 p-3.5 rounded-2xl bg-white border border-emerald-100 shadow-soft-sm">
                        <div class="w-8 h-8 rounded-xl bg-emerald-100 text-emerald-700 flex items-center justify-center shrink-0 font-bold">
                            <i data-lucide="check" class="w-4 h-4"></i>
                        </div>
                        <span class="text-xs font-bold text-slate-800">Nhận hỗ trợ 1-1 từ giảng viên chuyên môn</span>
                    </div>
                </div>
            </div>

            <!-- Bottom Stat Pill -->
            <div class="pt-8 mt-8 border-t border-emerald-100 flex items-center justify-between text-slate-500 text-xs">
                <span class="flex items-center gap-1.5 font-semibold">
                    <i data-lucide="shield-check" class="w-4 h-4 text-emerald-600"></i> Tạo tài khoản miễn phí
                </span>
                <span class="text-emerald-700 font-bold">FlyHigh LMS</span>
            </div>
        </div>

        <!-- Right Side: Register Form -->
        <div class="lg:col-span-7 p-8 sm:p-12 flex flex-col justify-between bg-white">
            
            <div class="space-y-6">
                <div>
                    <h3 class="text-2xl sm:text-3xl font-black text-slate-900 font-heading tracking-tight">Tạo Tài Khoản Mới</h3>
                    <p class="mt-1.5 text-sm text-slate-500">Điền thông tin dưới đây để đăng ký tài khoản học viên</p>
                </div>

                <form class="space-y-4" action="{{ route('register') }}" method="POST">
                    @csrf

                    <div>
                        <label for="name" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">Họ Và Tên *</label>
                        <input id="name" name="name" type="text" required value="{{ old('name') }}"
                               class="w-full px-4 py-3.5 bg-slate-50 rounded-2xl border border-slate-200 text-slate-900 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent text-sm transition-all @error('name') border-rose-500 @enderror"
                               placeholder="Ví dụ: Nguyễn Văn A">
                        @error('name')
                        <p class="mt-1 text-xs text-rose-500 font-semibold">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="email" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">Địa Chỉ Email *</label>
                        <input id="email" name="email" type="email" autocomplete="email" required value="{{ old('email') }}"
                               class="w-full px-4 py-3.5 bg-slate-50 rounded-2xl border border-slate-200 text-slate-900 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent text-sm transition-all @error('email') border-rose-500 @enderror"
                               placeholder="example@domain.com">
                        @error('email')
                        <p class="mt-1 text-xs text-rose-500 font-semibold">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="password" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">Mật Khẩu *</label>
                        <input id="password" name="password" type="password" required 
                               class="w-full px-4 py-3.5 bg-slate-50 rounded-2xl border border-slate-200 text-slate-900 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent text-sm transition-all @error('password') border-rose-500 @enderror"
                               placeholder="Tối thiểu 6 ký tự">
                        @error('password')
                        <p class="mt-1 text-xs text-rose-500 font-semibold">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="password_confirmation" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">Xác Nhận Mật Khẩu *</label>
                        <input id="password_confirmation" name="password_confirmation" type="password" required 
                               class="w-full px-4 py-3.5 bg-slate-50 rounded-2xl border border-slate-200 text-slate-900 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent text-sm transition-all"
                               placeholder="Nhập lại mật khẩu">
                    </div>

                    <button type="submit" class="w-full py-4 bg-gradient-to-r from-emerald-600 to-teal-600 hover:from-emerald-700 hover:to-teal-700 text-white font-extrabold text-sm rounded-2xl shadow-emerald-glow transition-all hover:scale-[1.01] mt-2">
                        Đăng Ký Tài Khoản Học Viên
                    </button>
                </form>

                <div class="text-center pt-2">
                    <p class="text-xs text-slate-500">
                        Đã có tài khoản? 
                        <a href="{{ route('login') }}" class="font-extrabold text-emerald-600 hover:underline">Đăng nhập tại đây</a>
                    </p>
                </div>
            </div>

        </div>

    </div>
</div>
@endsection
