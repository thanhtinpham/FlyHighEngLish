<!DOCTYPE html>
<html lang="vi" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Fly High English - Trung Tâm Tiếng Anh Tương Tác Hàng Đầu')</title>
    
    <!-- DNS Prefetch & Preconnect for Fast Asset Loading -->
    <link rel="dns-prefetch" href="//fonts.googleapis.com">
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="dns-prefetch" href="//unpkg.com">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,400&family=Plus+Jakarta+Sans:ital,wght@0,400;0,500;0,600;0,700;0,800;1,400&display=swap" rel="stylesheet">
    
    <!-- Lucide Icons (Async Deferred loading) -->
    <script defer src="https://unpkg.com/lucide@latest"></script>

    <!-- Compiled Static Assets (Vite & Hosting Fallback) -->
    @if (file_exists(public_path('build/manifest.json')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @endif
</head>
<body class="bg-slate-50 text-slate-900 antialiased min-h-screen flex flex-col font-sans">

    <!-- Top Info Notification Bar -->
    <div class="bg-slate-900 text-slate-200 text-xs py-2 px-4 border-b border-slate-800">
        <div class="max-w-7xl mx-auto flex flex-col sm:flex-row items-center justify-between gap-2">
            <div class="flex items-center gap-2 text-slate-300">
                <span class="inline-block w-2 h-2 rounded-full bg-blue-500"></span>
                <span>Tổ chức <strong>Thi thử B1 VSTEP Online Miễn Phí</strong> định kỳ 8h00 sáng Chủ Nhật hàng tuần</span>
            </div>
            <div class="flex items-center gap-4 text-[11px] font-semibold text-slate-300">
                <a href="tel:0907294800" class="hover:text-white flex items-center gap-1">
                    <i data-lucide="phone" class="w-3.5 h-3.5 text-blue-400"></i> Zalo / Hotline: 0907.294.800
                </a>
                <span class="hidden md:inline text-slate-700">|</span>
                <span class="hidden md:inline flex items-center gap-1 text-slate-400">
                    <i data-lucide="clock" class="w-3.5 h-3.5 text-slate-400"></i> Hỗ trợ: 08:00 - 21:00 (T2 - CN)
                </span>
            </div>
        </div>
    </div>

    <!-- Header Navigation -->
    <header class="bg-white border-b border-slate-200 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                
                <!-- Logo -->
                <a href="{{ route('home') }}" class="flex items-center gap-2.5">
                    <div class="w-9 h-9 rounded-lg bg-blue-600 flex items-center justify-center text-white font-bold shadow-sm">
                        <i data-lucide="graduation-cap" class="w-5 h-5"></i>
                    </div>
                    <div>
                        <div class="flex items-center gap-1 leading-none">
                            <span class="text-xl font-extrabold tracking-tight text-slate-900 font-heading">FlyHigh</span>
                            <span class="text-xl font-extrabold tracking-tight text-blue-600 font-heading">English</span>
                        </div>
                        <span class="text-[10px] uppercase font-bold tracking-wider text-slate-500 block">Hệ Thống Đào Tạo Tiếng Anh 4.0</span>
                    </div>
                </a>

                <!-- Desktop Nav Tabs -->
                <nav class="hidden lg:flex items-center gap-1 bg-slate-100 p-1 rounded-xl border border-slate-200 font-medium text-xs text-slate-600">
                    <a href="{{ route('home') }}" class="px-3.5 py-1.5 rounded-lg transition-all {{ request()->routeIs('home') ? 'nav-tab-active' : 'hover:text-slate-900' }}">
                        <i data-lucide="home" class="w-3.5 h-3.5 inline mr-1 text-blue-600"></i>Trang Chủ
                    </a>

                    <a href="{{ route('about') }}" class="px-3.5 py-1.5 rounded-lg transition-all {{ request()->routeIs('about') ? 'nav-tab-active' : 'hover:text-slate-900' }}">
                        <i data-lucide="info" class="w-3.5 h-3.5 inline mr-1 text-slate-500"></i>Giới Thiệu
                    </a>

                    <a href="{{ route('courses.index') }}" class="px-3.5 py-1.5 rounded-lg transition-all {{ request()->routeIs('courses.*') ? 'nav-tab-active' : 'hover:text-slate-900' }}">
                        <i data-lucide="book-open" class="w-3.5 h-3.5 inline mr-1 text-slate-500"></i>Khóa Học
                    </a>

                    <a href="{{ route('documents.index') }}" class="px-3.5 py-1.5 rounded-lg transition-all {{ request()->routeIs('documents.*') ? 'nav-tab-active' : 'hover:text-slate-900' }}">
                        <i data-lucide="file-text" class="w-3.5 h-3.5 inline mr-1 text-slate-500"></i>Tài Liệu
                    </a>

                    <a href="{{ route('placement_test.index') }}" class="px-3.5 py-1.5 rounded-lg transition-all {{ request()->routeIs('placement_test.*') ? 'nav-tab-active' : 'hover:text-slate-900' }}">
                        <i data-lucide="target" class="w-3.5 h-3.5 inline mr-1 text-slate-500"></i>Test Đầu Vào
                    </a>

                    @auth
                    <a href="{{ route('learning_hub.index') }}" class="px-3.5 py-1.5 rounded-lg transition-all {{ request()->routeIs('learning_hub.*') ? 'nav-tab-active' : 'hover:text-slate-900' }}">
                        <i data-lucide="layout-dashboard" class="w-3.5 h-3.5 inline mr-1 text-blue-600"></i>Góc Học Tập
                    </a>

                    @if(auth()->user()->isAdmin())
                    <a href="{{ route('admin.dashboard') }}" class="px-3 py-1 rounded-lg bg-amber-500 text-slate-950 font-bold transition-all hover:bg-amber-400">
                        <i data-lucide="shield-check" class="w-3.5 h-3.5 inline mr-1"></i>Admin
                    </a>
                    @endif
                    @endauth
                </nav>

                <!-- Auth & Action Buttons -->
                <div class="flex items-center gap-2">
                    <button onclick="openModal('zaloModal')" class="hidden sm:inline-flex items-center gap-1.5 px-3.5 py-2 rounded-lg bg-blue-50 text-blue-700 hover:bg-blue-100 text-xs font-bold transition-all border border-blue-200">
                        <i data-lucide="message-circle" class="w-4 h-4 text-blue-600"></i>Tư Vấn Zalo
                    </button>

                    @auth
                    <div class="flex items-center gap-2 pl-2 border-l border-slate-200">
                        <div class="hidden sm:flex flex-col items-end">
                            <span class="text-xs font-bold text-slate-900 leading-tight font-heading">{{ auth()->user()->name }}</span>
                            <span class="text-[10px] text-blue-700 font-semibold bg-blue-50 px-1.5 py-0.5 rounded border border-blue-200">{{ auth()->user()->isAdmin() ? 'Quản trị viên' : 'Học viên' }}</span>
                        </div>
                        <div class="w-8 h-8 rounded-lg bg-blue-600 text-white font-bold flex items-center justify-center text-xs">
                            {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                        </div>
                        <form method="POST" action="{{ route('logout') }}" class="inline">
                            @csrf
                            <button type="submit" title="Đăng xuất" class="p-1.5 rounded-lg text-slate-400 hover:text-rose-600 hover:bg-rose-50 transition-colors">
                                <i data-lucide="log-out" class="w-4 h-4"></i>
                            </button>
                        </form>
                    </div>
                    @else
                    <div class="flex items-center gap-1.5">
                        <a href="{{ route('login') }}" class="px-2.5 py-2 text-xs font-bold text-slate-700 hover:text-blue-600 transition-colors rounded-lg hover:bg-slate-100">
                            Đăng nhập
                        </a>
                        <a href="{{ route('register') }}" class="hidden sm:inline-block px-3.5 py-2 text-xs font-bold text-white bg-blue-600 hover:bg-blue-700 rounded-lg shadow-sm transition-all">
                            Đăng ký ngay
                        </a>
                    </div>
                    @endauth

                    <!-- Mobile Hamburger Menu Button -->
                    <button onclick="toggleMobileMenu()" class="lg:hidden p-2 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-700 transition-colors ml-1" aria-label="Toggle Navigation Menu">
                        <i data-lucide="menu" id="menuIconOpen" class="w-6 h-6"></i>
                        <i data-lucide="x" id="menuIconClose" class="w-6 h-6 hidden"></i>
                    </button>
                </div>

            </div>
        </div>

        <!-- Mobile Slide-Down Navigation Menu -->
        <div id="mobileMenu" class="hidden lg:hidden border-t border-slate-200 bg-white px-4 pt-3 pb-6 space-y-3 shadow-xl">
            <div class="flex flex-col space-y-1">
                <a href="{{ route('home') }}" class="flex items-center gap-2.5 px-4 py-2.5 rounded-xl font-bold text-xs {{ request()->routeIs('home') ? 'bg-blue-50 text-blue-600' : 'text-slate-700 hover:bg-slate-50' }}">
                    <i data-lucide="home" class="w-4 h-4 text-blue-600"></i>Trang Chủ
                </a>

                <a href="{{ route('about') }}" class="flex items-center gap-2.5 px-4 py-2.5 rounded-xl font-bold text-xs {{ request()->routeIs('about') ? 'bg-blue-50 text-blue-600' : 'text-slate-700 hover:bg-slate-50' }}">
                    <i data-lucide="info" class="w-4 h-4 text-slate-500"></i>Giới Thiệu
                </a>

                <a href="{{ route('courses.index') }}" class="flex items-center gap-2.5 px-4 py-2.5 rounded-xl font-bold text-xs {{ request()->routeIs('courses.*') ? 'bg-blue-50 text-blue-600' : 'text-slate-700 hover:bg-slate-50' }}">
                    <i data-lucide="book-open" class="w-4 h-4 text-slate-500"></i>Khóa Học
                </a>

                <a href="{{ route('documents.index') }}" class="flex items-center gap-2.5 px-4 py-2.5 rounded-xl font-bold text-xs {{ request()->routeIs('documents.*') ? 'bg-blue-50 text-blue-600' : 'text-slate-700 hover:bg-slate-50' }}">
                    <i data-lucide="file-text" class="w-4 h-4 text-slate-500"></i>Kho Tài Liệu
                </a>

                <a href="{{ route('placement_test.index') }}" class="flex items-center gap-2.5 px-4 py-2.5 rounded-xl font-bold text-xs {{ request()->routeIs('placement_test.*') ? 'bg-blue-50 text-blue-600' : 'text-slate-700 hover:bg-slate-50' }}">
                    <i data-lucide="target" class="w-4 h-4 text-slate-500"></i>Test Đầu Vào
                </a>

                @auth
                <a href="{{ route('learning_hub.index') }}" class="flex items-center gap-2.5 px-4 py-2.5 rounded-xl font-bold text-xs {{ request()->routeIs('learning_hub.*') ? 'bg-blue-50 text-blue-600' : 'text-slate-700 hover:bg-slate-50' }}">
                    <i data-lucide="layout-dashboard" class="w-4 h-4 text-blue-600"></i>Góc Học Tập
                </a>

                @if(auth()->user()->isAdmin())
                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-2.5 px-4 py-2.5 rounded-xl font-bold text-xs bg-amber-500 text-slate-950">
                    <i data-lucide="shield-check" class="w-4 h-4"></i>Bảng Quản Trị Admin
                </a>
                @endif
                @endauth
            </div>

            <div class="pt-3 border-t border-slate-100 flex flex-col gap-2">
                <button onclick="openModal('zaloModal')" class="w-full flex items-center justify-center gap-2 px-4 py-2.5 rounded-xl bg-blue-50 text-blue-700 text-xs font-bold border border-blue-200">
                    <i data-lucide="message-circle" class="w-4 h-4 text-blue-600"></i>Tư Vấn Zalo
                </button>

                @auth
                <div class="flex items-center justify-between px-4 py-2 bg-slate-50 rounded-xl">
                    <div class="flex items-center gap-2">
                        <div class="w-7 h-7 rounded-lg bg-blue-600 text-white font-bold flex items-center justify-center text-xs">
                            {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                        </div>
                        <span class="text-xs font-bold text-slate-900">{{ auth()->user()->name }}</span>
                    </div>
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="text-xs font-bold text-rose-600 hover:underline">
                            Đăng xuất
                        </button>
                    </form>
                </div>
                @else
                <div class="grid grid-cols-2 gap-2 pt-1">
                    <a href="{{ route('login') }}" class="text-center px-4 py-2.5 text-xs font-bold text-slate-700 bg-slate-100 rounded-xl">
                        Đăng nhập
                    </a>
                    <a href="{{ route('register') }}" class="text-center px-4 py-2.5 text-xs font-bold text-white bg-blue-600 rounded-xl shadow-sm">
                        Đăng ký
                    </a>
                </div>
                @endauth
            </div>
        </div>
    </header>

    <!-- Mobile Bottom Quick Navigation Bar (Sticky at bottom) -->
    <div class="lg:hidden fixed bottom-0 left-0 right-0 z-40 bg-white/95 backdrop-blur-md border-t border-slate-200 px-2 py-1.5 shadow-lg">
        <div class="grid grid-cols-5 text-center">
            <a href="{{ route('home') }}" class="flex flex-col items-center py-1 text-[10px] font-bold {{ request()->routeIs('home') ? 'text-blue-600' : 'text-slate-500' }}">
                <i data-lucide="home" class="w-5 h-5 mb-0.5"></i>
                <span>Trang chủ</span>
            </a>
            <a href="{{ route('courses.index') }}" class="flex flex-col items-center py-1 text-[10px] font-bold {{ request()->routeIs('courses.*') ? 'text-blue-600' : 'text-slate-500' }}">
                <i data-lucide="book-open" class="w-5 h-5 mb-0.5"></i>
                <span>Khóa học</span>
            </a>
            <a href="{{ route('documents.index') }}" class="flex flex-col items-center py-1 text-[10px] font-bold {{ request()->routeIs('documents.*') ? 'text-blue-600' : 'text-slate-500' }}">
                <i data-lucide="file-text" class="w-5 h-5 mb-0.5"></i>
                <span>Tài liệu</span>
            </a>
            <a href="{{ route('placement_test.index') }}" class="flex flex-col items-center py-1 text-[10px] font-bold {{ request()->routeIs('placement_test.*') ? 'text-blue-600' : 'text-slate-500' }}">
                <i data-lucide="target" class="w-5 h-5 mb-0.5"></i>
                <span>Test</span>
            </a>
            @auth
            <a href="{{ route('learning_hub.index') }}" class="flex flex-col items-center py-1 text-[10px] font-bold {{ request()->routeIs('learning_hub.*') ? 'text-blue-600' : 'text-slate-500' }}">
                <i data-lucide="layout-dashboard" class="w-5 h-5 mb-0.5"></i>
                <span>Góc học</span>
            </a>
            @else
            <a href="{{ route('login') }}" class="flex flex-col items-center py-1 text-[10px] font-bold text-slate-500">
                <i data-lucide="user" class="w-5 h-5 mb-0.5"></i>
                <span>Đăng nhập</span>
            </a>
            @endauth
        </div>
    </div>


    <!-- Main Content Area -->
    <main class="flex-grow">
        @if(session('success'))
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-4">
            <div class="bg-emerald-50 border border-emerald-200 text-emerald-900 px-5 py-4 rounded-2xl flex items-center justify-between shadow-soft">
                <div class="flex items-center gap-3">
                    <div class="w-9 h-9 rounded-xl bg-emerald-600 text-white flex items-center justify-center shrink-0 shadow-sm">
                        <i data-lucide="check" class="w-5 h-5"></i>
                    </div>
                    <div>
                        <p class="text-xs font-bold text-emerald-950 font-heading">Thao tác thành công!</p>
                        <p class="text-xs font-medium text-emerald-800">{{ session('success') }}</p>
                    </div>
                </div>
                <button onclick="this.parentElement.remove()" class="text-emerald-500 hover:text-emerald-700 p-1">
                    <i data-lucide="x" class="w-4 h-4"></i>
                </button>
            </div>
        </div>
        @endif

        @if(session('error'))
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-4">
            <div class="bg-rose-50 border border-rose-200 text-rose-900 px-5 py-4 rounded-2xl flex items-center justify-between shadow-soft">
                <div class="flex items-center gap-3">
                    <div class="w-9 h-9 rounded-xl bg-rose-600 text-white flex items-center justify-center shrink-0 shadow-sm">
                        <i data-lucide="alert-circle" class="w-5 h-5"></i>
                    </div>
                    <div>
                        <p class="text-xs font-bold text-rose-950 font-heading">Thông báo lỗi</p>
                        <p class="text-xs font-medium text-rose-800">{{ session('error') }}</p>
                    </div>
                </div>
                <button onclick="this.parentElement.remove()" class="text-rose-500 hover:text-rose-700 p-1">
                    <i data-lucide="x" class="w-4 h-4"></i>
                </button>
            </div>
        </div>
        @endif

        @yield('content')
    </main>

    <!-- Toast Notification Container -->
    <div id="toastContainer" class="fixed bottom-6 right-6 z-50 flex flex-col gap-3 pointer-events-none"></div>

    <!-- Modal 1: Đăng ký học thử Zalo -->
    <div id="zaloModal" onclick="if(event.target === this) closeModal('zaloModal')" class="fixed inset-0 bg-slate-900/50 backdrop-blur-sm z-50 hidden flex items-center justify-center p-4 transition-opacity cursor-pointer">
        <div class="bg-white rounded-3xl max-w-md w-full p-6 sm:p-8 shadow-2xl relative border border-slate-100 animate-in fade-in zoom-in duration-200 cursor-default">
            <button type="button" onclick="closeModal('zaloModal')" class="absolute top-4 right-4 text-slate-500 hover:text-slate-900 bg-slate-100 hover:bg-slate-200 p-2.5 rounded-full transition-all flex items-center justify-center border border-slate-200 shadow-sm" title="Thoát / Đóng cửa sổ">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>
            
            <div class="w-14 h-14 rounded-2xl bg-emerald-50 text-emerald-600 flex items-center justify-center mb-4 border border-emerald-100 shadow-soft-sm">
                <i data-lucide="message-circle" class="w-7 h-7"></i>
            </div>

            <h3 class="text-xl font-extrabold text-slate-900 mb-1 font-heading">Đăng Ký Học Thử Qua Zalo</h3>
            <p class="text-xs text-slate-500 mb-6 leading-relaxed">Để lại thông tin, giảng viên Fly High English sẽ chủ động tư vấn lộ trình và xếp lớp học thử miễn phí qua Zalo cho bạn trong 15 phút!</p>

            <form action="{{ route('registrations.store') }}" method="POST" class="space-y-4">
                @csrf
                <input type="hidden" name="type" value="zalo_trial">

                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1.5">Họ và tên *</label>
                    <input type="text" name="name" required placeholder="Ví dụ: Nguyễn Văn A" class="w-full px-4 py-3 rounded-xl border border-slate-200 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition-all">
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1.5">Số điện thoại / Zalo *</label>
                    <input type="tel" name="phone" required placeholder="09xxxxxxx" class="w-full px-4 py-3 rounded-xl border border-slate-200 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition-all">
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1.5">Khóa học quan tâm</label>
                    <select name="notes" class="w-full px-4 py-3 rounded-xl border border-slate-200 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition-all">
                        <option value="Tiếng Anh Giao Tiếp">Tiếng Anh Giao Tiếp</option>
                        <option value="Luyện Thi IELTS">Luyện Thi IELTS Target 7.0+</option>
                        <option value="Luyện Thi TOEIC">Luyện Thi TOEIC 800+</option>
                        <option value="Tiếng Anh Cho Trẻ Em">Tiếng Anh Cho Trẻ Em Fly High Kids</option>
                    </select>
                </div>

                <div class="flex items-center gap-3">
                    <button type="submit" class="flex-1 py-3.5 bg-gradient-to-r from-emerald-600 to-teal-600 hover:from-emerald-700 hover:to-teal-700 text-white font-extrabold text-sm rounded-xl shadow-emerald-glow transition-all hover:scale-[1.01]">
                        Gửi Đăng Ký Học Thử Zalo
                    </button>
                    <button type="button" onclick="closeModal('zaloModal')" class="py-3.5 px-4 bg-slate-100 hover:bg-slate-200 text-slate-700 font-bold text-xs rounded-xl transition-all">
                        Thoát
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal 2: Đăng ký Thi thử B1 VSTEP -->
    <div id="vstepModal" onclick="if(event.target === this) closeModal('vstepModal')" class="fixed inset-0 bg-slate-900/50 backdrop-blur-sm z-50 hidden flex items-center justify-center p-4 transition-opacity cursor-pointer">
        <div class="bg-white rounded-3xl max-w-md w-full p-6 sm:p-8 shadow-2xl relative border border-slate-100 animate-in fade-in zoom-in duration-200 cursor-default">
            <button type="button" onclick="closeModal('vstepModal')" class="absolute top-4 right-4 text-slate-500 hover:text-slate-900 bg-slate-100 hover:bg-slate-200 p-2.5 rounded-full transition-all flex items-center justify-center border border-slate-200 shadow-sm" title="Thoát / Đóng cửa sổ">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>
            
            <div class="w-14 h-14 rounded-2xl bg-amber-50 text-gold-500 flex items-center justify-center mb-4 border border-amber-100 shadow-soft-sm">
                <i data-lucide="award" class="w-7 h-7"></i>
            </div>

            <h3 class="text-xl font-extrabold text-slate-900 mb-1 font-heading">Đăng Ký Thi Thử B1 VSTEP</h3>
            <p class="text-xs text-slate-500 mb-6 leading-relaxed">Trải nghiệm bài thi chuẩn hóa B1 VSTEP trên máy tính với kết quả & nhận xét chi tiết 4 kỹ năng từ giảng viên chuyên môn.</p>

            <form action="{{ route('registrations.store') }}" method="POST" class="space-y-4">
                @csrf
                <input type="hidden" name="type" value="vstep_exam">

                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1.5">Họ và tên *</label>
                    <input type="text" name="name" required placeholder="Nhập họ và tên" class="w-full px-4 py-3 rounded-xl border border-slate-200 text-sm focus:outline-none focus:ring-2 focus:ring-gold-500 focus:border-transparent transition-all">
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1.5">Số điện thoại *</label>
                    <input type="tel" name="phone" required placeholder="Nhập số điện thoại" class="w-full px-4 py-3 rounded-xl border border-slate-200 text-sm focus:outline-none focus:ring-2 focus:ring-gold-500 focus:border-transparent transition-all">
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1.5">Email liên hệ</label>
                    <input type="email" name="email" placeholder="example@gmail.com" class="w-full px-4 py-3 rounded-xl border border-slate-200 text-sm focus:outline-none focus:ring-2 focus:ring-gold-500 focus:border-transparent transition-all">
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1.5">Mục tiêu đợt thi</label>
                    <textarea name="notes" rows="2" placeholder="Ví dụ: Cần bằng B1 để bảo vệ thạc sĩ / tốt nghiệp đại học..." class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:outline-none focus:ring-2 focus:ring-gold-500 focus:border-transparent transition-all"></textarea>
                </div>

                <div class="flex items-center gap-3">
                    <button type="submit" class="flex-1 py-3.5 bg-gradient-to-r from-gold-500 to-amber-600 hover:from-gold-600 hover:to-amber-700 text-slate-950 font-extrabold text-sm rounded-xl shadow-gold-glow transition-all hover:scale-[1.01]">
                        Xác Nhận Đăng Ký Thi Thử B1 VSTEP
                    </button>
                    <button type="button" onclick="closeModal('vstepModal')" class="py-3.5 px-4 bg-slate-100 hover:bg-slate-200 text-slate-700 font-bold text-xs rounded-xl transition-all">
                        Thoát
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Light & Fresh Modern Footer -->
    <footer class="bg-slate-900 text-slate-300 py-12 mt-16 border-t border-slate-800 relative overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 md:grid-cols-4 gap-8 mb-10">
            <div class="md:col-span-2 space-y-3">
                <div class="flex items-center gap-2.5">
                    <div class="w-9 h-9 rounded-lg bg-blue-600 text-white flex items-center justify-center font-bold shadow-sm">
                        <i data-lucide="graduation-cap" class="w-5 h-5"></i>
                    </div>
                    <span class="text-xl font-bold text-white font-heading">FlyHigh English System</span>
                </div>
                <p class="text-xs leading-relaxed text-slate-400 max-w-md">
                    Fly High English là hệ thống đào tạo tiếng Anh tương tác hàng đầu. Website vừa cung cấp thông tin trung tâm, lộ trình khóa học vừa hỗ trợ học viên truy cập các bài học HTML tương tác 4.0 trực tuyến sinh động.
                </p>
                <div class="flex items-center gap-2 pt-1 text-xs">
                    <span class="px-2.5 py-0.5 bg-slate-800 text-slate-300 border border-slate-700 rounded text-[11px] font-medium">LMS HTML 4.0 Standard</span>
                    <span class="px-2.5 py-0.5 bg-slate-800 text-slate-300 border border-slate-700 rounded text-[11px] font-medium">VSTEP B1 & IELTS Certified</span>
                </div>
            </div>

            <div>
                <h4 class="text-xs font-bold uppercase tracking-wider text-white mb-3 font-heading border-l-2 border-blue-500 pl-2">Khóa Học Nổi Bật</h4>
                <ul class="space-y-2 text-xs font-medium">
                    <li><a href="{{ route('courses.index', ['category' => 'giao-tiep']) }}" class="text-slate-400 hover:text-white transition-colors flex items-center gap-1"><i data-lucide="chevron-right" class="w-3.5 h-3.5 text-blue-400"></i>Tiếng Anh Giao Tiếp</a></li>
                    <li><a href="{{ route('courses.index', ['category' => 'ielts']) }}" class="text-slate-400 hover:text-white transition-colors flex items-center gap-1"><i data-lucide="chevron-right" class="w-3.5 h-3.5 text-blue-400"></i>Luyện Thi IELTS Target 7.0+</a></li>
                    <li><a href="{{ route('courses.index', ['category' => 'toeic']) }}" class="text-slate-400 hover:text-white transition-colors flex items-center gap-1"><i data-lucide="chevron-right" class="w-3.5 h-3.5 text-blue-400"></i>Luyện Thi TOEIC 800+</a></li>
                    <li><a href="{{ route('courses.index', ['category' => 'tre-em']) }}" class="text-slate-400 hover:text-white transition-colors flex items-center gap-1"><i data-lucide="chevron-right" class="w-3.5 h-3.5 text-blue-400"></i>Tiếng Anh Trẻ Em Fly High Kids</a></li>
                </ul>
            </div>

            <div>
                <h4 class="text-xs font-bold uppercase tracking-wider text-white mb-3 font-heading border-l-2 border-blue-500 pl-2">Chức Năng Nổi Bật</h4>
                <ul class="space-y-2 text-xs font-medium">
                    <li><button onclick="openModal('zaloModal')" class="text-slate-400 hover:text-white transition-colors flex items-center gap-1 text-left"><i data-lucide="chevron-right" class="w-3.5 h-3.5 text-blue-400"></i>Đăng ký học thử qua Zalo</button></li>
                    <li><a href="{{ route('placement_test.index') }}" class="text-slate-400 hover:text-white transition-colors flex items-center gap-1"><i data-lucide="chevron-right" class="w-3.5 h-3.5 text-blue-400"></i>Làm bài test đầu vào online</a></li>
                    <li><a href="{{ route('learning_hub.index') }}" class="text-slate-400 hover:text-white transition-colors flex items-center gap-1"><i data-lucide="chevron-right" class="w-3.5 h-3.5 text-blue-400"></i>Vào phòng học tương tác HTML</a></li>
                    <li><button onclick="openModal('vstepModal')" class="text-slate-400 hover:text-white transition-colors flex items-center gap-1 text-left"><i data-lucide="chevron-right" class="w-3.5 h-3.5 text-blue-400"></i>Đăng ký thi thử B1 VSTEP</button></li>
                </ul>
            </div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-6 border-t border-slate-800 flex flex-col sm:flex-row items-center justify-between text-xs text-slate-500 gap-3">
            <p>&copy; {{ date('Y') }} Fly High English Center. All rights reserved.</p>
            <p class="flex items-center gap-2 font-medium">
                <span>Hệ thống LMS bài học HTML tương tác</span>
                <span class="w-1.5 h-1.5 rounded-full bg-blue-500"></span>
                <span class="text-slate-400">Edition V2.0</span>
            </p>
        </div>
    </footer>


    <script>
        lucide.createIcons();

        function toggleMobileMenu() {
            const menu = document.getElementById('mobileMenu');
            const iconOpen = document.getElementById('menuIconOpen');
            const iconClose = document.getElementById('menuIconClose');
            if (menu.classList.contains('hidden')) {
                menu.classList.remove('hidden');
                iconOpen.classList.add('hidden');
                iconClose.classList.remove('hidden');
            } else {
                menu.classList.add('hidden');
                iconOpen.classList.remove('hidden');
                iconClose.classList.add('hidden');
            }
            if (window.lucide) { lucide.createIcons(); }
        }

        function openModal(id) {
            const modal = document.getElementById(id);
            if (modal) {
                modal.classList.remove('hidden');
                if (window.lucide) { window.lucide.createIcons(); }
            }
        }

        function closeModal(id) {
            document.getElementById(id).classList.add('hidden');
        }

        function showToast(title, message, type = 'success') {
            const container = document.getElementById('toastContainer');
            const toast = document.createElement('div');
            toast.className = `pointer-events-auto flex items-center gap-3 p-4 rounded-2xl shadow-xl border bg-white text-slate-900 transition-all duration-300 transform translate-y-4 opacity-0 max-w-sm`;
            
            let iconColor = 'bg-emerald-500 text-white';
            let iconName = 'check';
            if (type === 'amber') {
                iconColor = 'bg-amber-500 text-slate-950';
                iconName = 'star';
            } else if (type === 'sky') {
                iconColor = 'bg-sky-500 text-white';
                iconName = 'info';
            }

            toast.innerHTML = `
                <div class="w-8 h-8 rounded-xl ${iconColor} flex items-center justify-center shrink-0 font-bold">
                    <i data-lucide="${iconName}" class="w-4 h-4"></i>
                </div>
                <div class="flex-grow">
                    <h5 class="text-xs font-bold font-heading text-slate-900">${title}</h5>
                    <p class="text-[11px] text-slate-500">${message}</p>
                </div>
                <button onclick="this.parentElement.remove()" class="text-slate-400 hover:text-slate-600 p-1">
                    <i data-lucide="x" class="w-3.5 h-3.5"></i>
                </button>
            `;

            container.appendChild(toast);
            lucide.createIcons({ props: {}, nameAttr: 'data-lucide', root: toast });

            setTimeout(() => {
                toast.classList.remove('translate-y-4', 'opacity-0');
            }, 10);

            setTimeout(() => {
                toast.classList.add('opacity-0', 'translate-y-4');
                setTimeout(() => toast.remove(), 300);
            }, 4000);
        }
    </script>
    @yield('scripts')
</body>
</html>
