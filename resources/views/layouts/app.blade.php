<!DOCTYPE html>
<html lang="vi" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Fly High English - Trung Tâm Tiếng Anh Tương Tác hàng đầu')</title>
    
    <!-- Google Fonts: Plus Jakarta Sans & Be Vietnam Pro (Chuẩn tiếng Việt 100%) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,400&family=Plus+Jakarta+Sans:ital,wght@0,400;0,500;0,600;0,700;0,800;1,400&display=swap" rel="stylesheet">
    
    <!-- Lucide Icons -->
    <script src="https://unpkg.com/lucide@latest"></script>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Plus Jakarta Sans', 'Be Vietnam Pro', 'sans-serif'],
                        heading: ['Plus Jakarta Sans', 'Be Vietnam Pro', 'sans-serif'],
                    },
                    colors: {
                        emerald: {
                            50: '#ecfdf5',
                            100: '#d1fae5',
                            500: '#10b981',
                            600: '#059669',
                            700: '#047857',
                        },
                        sky: {
                            50: '#f0f9ff',
                            100: '#e0f2fe',
                            500: '#0ea5e9',
                            600: '#0284c7',
                            700: '#0369a1',
                        },
                        gold: {
                            400: '#fbbf24',
                            500: '#f59e0b',
                            600: '#d97706',
                        }
                    },
                    borderRadius: {
                        '2xl': '1rem',
                        '3xl': '1.25rem',
                        '4xl': '1.5rem',
                    },
                    boxShadow: {
                        'soft-sm': '0 2px 8px -2px rgba(15, 23, 42, 0.05)',
                        'soft': '0 10px 30px -5px rgba(15, 23, 42, 0.05)',
                        'soft-lg': '0 20px 40px -10px rgba(15, 23, 42, 0.08)',
                        'emerald-glow': '0 8px 25px -4px rgba(16, 185, 129, 0.3)',
                        'sky-glow': '0 8px 25px -4px rgba(14, 165, 233, 0.3)',
                        'gold-glow': '0 8px 25px -4px rgba(245, 158, 11, 0.3)',
                    }
                }
            }
        }
    </script>
    <style>
        body {
            font-family: 'Plus Jakarta Sans', 'Be Vietnam Pro', sans-serif;
            background-color: #F8FAFC;
            color: #1E293B;
        }
        h1, h2, h3, h4, h5, h6, .font-heading {
            font-family: 'Plus Jakarta Sans', 'Be Vietnam Pro', sans-serif;
        }
        .dashboard-card {
            background: #ffffff;
            border-radius: 1.25rem;
            border: 1px solid #E2E8F0;
            box-shadow: 0 4px 20px -2px rgba(15, 23, 42, 0.04);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .dashboard-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 16px 32px -6px rgba(15, 23, 42, 0.08);
            border-color: #CBD5E1;
        }
        .text-gradient-emerald {
            background: linear-gradient(135deg, #059669 0%, #0284c7 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        .text-gradient-gold {
            background: linear-gradient(135deg, #D97706 0%, #B45309 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        .nav-tab-active {
            background: #ECFDF5;
            color: #059669;
            font-weight: 700;
            position: relative;
        }
        .nav-tab-active::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 20%;
            right: 20%;
            height: 3px;
            background: #10B981;
            border-radius: 999px;
        }
        @keyframes pulseGlow {
            0%, 100% { opacity: 0.7; transform: scale(1); }
            50% { opacity: 1; transform: scale(1.03); }
        }
        .pulse-glow {
            animation: pulseGlow 3s infinite ease-in-out;
        }
    </style>
</head>
<body class="bg-slate-50 text-slate-800 antialiased min-h-screen flex flex-col font-sans">

    <!-- Header Navigation -->
    <header class="bg-white/95 backdrop-blur-md border-b border-slate-200/80 sticky top-0 z-50 transition-all">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">
                
                <!-- Logo -->
                <a href="{{ route('home') }}" class="flex items-center gap-3 group">
                    <div class="w-11 h-11 rounded-2xl bg-gradient-to-br from-emerald-500 via-teal-600 to-sky-600 flex items-center justify-center text-white shadow-emerald-glow group-hover:scale-105 transition-transform duration-300">
                        <i data-lucide="plane-takeoff" class="w-6 h-6"></i>
                    </div>
                    <div>
                        <div class="flex items-center gap-1.5">
                            <span class="text-2xl font-black tracking-tight text-slate-900 font-heading">FlyHigh</span>
                            <span class="text-2xl font-black tracking-tight text-emerald-600 font-heading">English</span>
                            <span class="px-2 py-0.5 bg-gold-400/20 text-gold-600 border border-gold-400/30 rounded-full text-[10px] font-extrabold uppercase">PRO</span>
                        </div>
                        <span class="text-[10px] uppercase font-bold tracking-wider text-slate-400 block -mt-0.5">Interactive Educational Portal</span>
                    </div>
                </a>

                <!-- Desktop Nav Tabs -->
                <nav class="hidden lg:flex items-center gap-1.5 bg-slate-100/80 p-1.5 rounded-2xl border border-slate-200/60 font-semibold text-xs text-slate-600">
                    <a href="{{ route('home') }}" class="px-4 py-2 rounded-xl transition-all duration-200 {{ request()->routeIs('home') ? 'nav-tab-active shadow-sm' : 'hover:bg-white/80 hover:text-slate-900' }}">
                        <i data-lucide="home" class="w-4 h-4 inline mr-1.5 -mt-0.5 text-emerald-600"></i>Trang Chủ
                    </a>

                    <a href="{{ route('about') }}" class="px-4 py-2 rounded-xl transition-all duration-200 {{ request()->routeIs('about') ? 'nav-tab-active shadow-sm' : 'hover:bg-white/80 hover:text-slate-900' }}">
                        <i data-lucide="info" class="w-4 h-4 inline mr-1.5 -mt-0.5 text-sky-600"></i>Giới Thiệu
                    </a>

                    <a href="{{ route('courses.index') }}" class="px-4 py-2 rounded-xl transition-all duration-200 {{ request()->routeIs('courses.*') ? 'nav-tab-active shadow-sm' : 'hover:bg-white/80 hover:text-slate-900' }}">
                        <i data-lucide="book-open" class="w-4 h-4 inline mr-1.5 -mt-0.5 text-teal-600"></i>Khóa Học
                    </a>

                    <a href="{{ route('placement_test.index') }}" class="px-4 py-2 rounded-xl transition-all duration-200 {{ request()->routeIs('placement_test.*') ? 'nav-tab-active shadow-sm' : 'hover:bg-white/80 hover:text-slate-900' }}">
                        <i data-lucide="target" class="w-4 h-4 inline mr-1.5 -mt-0.5 text-gold-500"></i>Test Đầu Vào
                    </a>

                    @auth
                    <a href="{{ route('learning_hub.index') }}" class="px-4 py-2 rounded-xl transition-all duration-200 {{ request()->routeIs('learning_hub.*') ? 'nav-tab-active shadow-sm' : 'hover:bg-white/80 hover:text-slate-900' }}">
                        <i data-lucide="layout-dashboard" class="w-4 h-4 inline mr-1.5 -mt-0.5 text-emerald-600"></i>Góc Học Tập
                    </a>

                    @if(auth()->user()->isAdmin())
                    <a href="{{ route('admin.dashboard') }}" class="px-3.5 py-2 rounded-xl bg-amber-500 text-slate-950 hover:bg-amber-400 font-bold transition-all shadow-sm">
                        <i data-lucide="shield-check" class="w-4 h-4 inline mr-1 -mt-0.5"></i>Quản Trị Admin
                    </a>
                    @endif
                    @endauth
                </nav>

                <!-- Auth & Action Buttons -->
                <div class="flex items-center gap-3">
                    <button onclick="openModal('zaloModal')" class="hidden sm:inline-flex items-center gap-2 px-4 py-2.5 rounded-xl bg-emerald-50 text-emerald-700 hover:bg-emerald-100 text-xs font-bold transition-all border border-emerald-200/80 shadow-soft-sm">
                        <span class="relative flex h-2.5 w-2.5">
                          <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
                          <span class="relative inline-flex rounded-full h-2.5 w-2.5 bg-emerald-500"></span>
                        </span>
                        <i data-lucide="message-circle" class="w-4 h-4 text-emerald-600"></i>Học Thử Zalo
                    </button>

                    @auth
                    <div class="flex items-center gap-3 pl-3 border-l border-slate-200">
                        <div class="hidden sm:flex flex-col items-end">
                            <span class="text-xs font-extrabold text-slate-900 leading-tight font-heading">{{ auth()->user()->name }}</span>
                            <span class="text-[10px] text-emerald-600 font-semibold bg-emerald-50 px-2 py-0.5 rounded-full border border-emerald-200/60">{{ auth()->user()->isAdmin() ? 'Quản trị viên' : 'Học viên PRO' }}</span>
                        </div>
                        <div class="w-10 h-10 rounded-2xl bg-gradient-to-tr from-emerald-500 to-sky-500 text-white font-extrabold flex items-center justify-center text-sm shadow-soft">
                            {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                        </div>
                        <form method="POST" action="{{ route('logout') }}" class="inline">
                            @csrf
                            <button type="submit" title="Đăng xuất" class="p-2 rounded-xl text-slate-400 hover:text-rose-600 hover:bg-rose-50 transition-colors">
                                <i data-lucide="log-out" class="w-5 h-5"></i>
                            </button>
                        </form>
                    </div>
                    @else
                    <div class="flex items-center gap-2">
                        <a href="{{ route('login') }}" class="px-4 py-2.5 text-xs font-bold text-slate-700 hover:text-emerald-600 transition-colors rounded-xl hover:bg-slate-100">
                            Đăng nhập
                        </a>
                        <a href="{{ route('register') }}" class="px-4 py-2.5 text-xs font-extrabold text-white bg-emerald-600 hover:bg-emerald-700 rounded-xl shadow-emerald-glow transition-all hover:scale-[1.02]">
                            Đăng ký ngay
                        </a>
                    </div>
                    @endauth
                </div>

            </div>
        </div>
    </header>

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
    <div id="zaloModal" class="fixed inset-0 bg-slate-900/40 backdrop-blur-sm z-50 hidden flex items-center justify-center p-4 transition-opacity">
        <div class="bg-white rounded-3xl max-w-md w-full p-6 sm:p-8 shadow-2xl relative border border-slate-100 animate-in fade-in zoom-in duration-200">
            <button onclick="closeModal('zaloModal')" class="absolute top-5 right-5 text-slate-400 hover:text-slate-600 p-1.5 rounded-xl hover:bg-slate-100 transition-colors">
                <i data-lucide="x" class="w-5 h-5"></i>
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

                <button type="submit" class="w-full py-3.5 bg-gradient-to-r from-emerald-600 to-teal-600 hover:from-emerald-700 hover:to-teal-700 text-white font-extrabold text-sm rounded-xl shadow-emerald-glow transition-all hover:scale-[1.01]">
                    Gửi Đăng Ký Học Thử Zalo
                </button>
            </form>
        </div>
    </div>

    <!-- Modal 2: Đăng ký Thi thử B1 VSTEP -->
    <div id="vstepModal" class="fixed inset-0 bg-slate-900/40 backdrop-blur-sm z-50 hidden flex items-center justify-center p-4 transition-opacity">
        <div class="bg-white rounded-3xl max-w-md w-full p-6 sm:p-8 shadow-2xl relative border border-slate-100 animate-in fade-in zoom-in duration-200">
            <button onclick="closeModal('vstepModal')" class="absolute top-5 right-5 text-slate-400 hover:text-slate-600 p-1.5 rounded-xl hover:bg-slate-100 transition-colors">
                <i data-lucide="x" class="w-5 h-5"></i>
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

                <button type="submit" class="w-full py-3.5 bg-gradient-to-r from-gold-500 to-amber-600 hover:from-gold-600 hover:to-amber-700 text-slate-950 font-extrabold text-sm rounded-xl shadow-gold-glow transition-all hover:scale-[1.01]">
                    Xác Nhận Đăng Ký Thi Thử B1 VSTEP
                </button>
            </form>
        </div>
    </div>

    <!-- Light & Fresh Modern Footer -->
    <footer class="bg-gradient-to-b from-slate-100 to-slate-200/90 text-slate-700 py-16 mt-20 border-t border-slate-300/80 relative overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 md:grid-cols-4 gap-10 mb-12">
            <div class="md:col-span-2 space-y-4">
                <div class="flex items-center gap-3">
                    <div class="w-11 h-11 rounded-2xl bg-gradient-to-br from-emerald-500 to-teal-600 text-white flex items-center justify-center font-black shadow-emerald-glow">
                        <i data-lucide="plane-takeoff" class="w-6 h-6"></i>
                    </div>
                    <span class="text-2xl font-black text-slate-900 font-heading">FlyHigh English System</span>
                </div>
                <p class="text-xs leading-relaxed text-slate-600 max-w-md">
                    Fly High English là hệ thống đào tạo tiếng Anh tương tác hàng đầu. Website vừa cung cấp thông tin trung tâm, lộ trình khóa học vừa hỗ trợ học viên truy cập các bài học HTML tương tác 4.0 trực tuyến sinh động.
                </p>
                <div class="flex items-center gap-3 pt-2">
                    <span class="px-3 py-1 bg-emerald-100 text-emerald-800 border border-emerald-300 rounded-full text-[11px] font-bold">✨ LMS HTML 4.0 Standard</span>
                    <span class="px-3 py-1 bg-sky-100 text-sky-800 border border-sky-300 rounded-full text-[11px] font-bold">🛡️ VSTEP B1 & IELTS Certified</span>
                </div>
            </div>

            <div>
                <h4 class="text-xs font-extrabold uppercase tracking-wider text-slate-900 mb-4 font-heading border-l-2 border-emerald-500 pl-2">Khóa Học Nổi Bật</h4>
                <ul class="space-y-2.5 text-xs font-semibold">
                    <li><a href="{{ route('courses.index', ['category' => 'giao-tiep']) }}" class="text-slate-600 hover:text-emerald-600 transition-colors flex items-center gap-1.5"><i data-lucide="chevron-right" class="w-3.5 h-3.5 text-emerald-500"></i>Tiếng Anh Giao Tiếp</a></li>
                    <li><a href="{{ route('courses.index', ['category' => 'ielts']) }}" class="text-slate-600 hover:text-emerald-600 transition-colors flex items-center gap-1.5"><i data-lucide="chevron-right" class="w-3.5 h-3.5 text-emerald-500"></i>Luyện Thi IELTS Target 7.0+</a></li>
                    <li><a href="{{ route('courses.index', ['category' => 'toeic']) }}" class="text-slate-600 hover:text-emerald-600 transition-colors flex items-center gap-1.5"><i data-lucide="chevron-right" class="w-3.5 h-3.5 text-emerald-500"></i>Luyện Thi TOEIC 800+</a></li>
                    <li><a href="{{ route('courses.index', ['category' => 'tre-em']) }}" class="text-slate-600 hover:text-emerald-600 transition-colors flex items-center gap-1.5"><i data-lucide="chevron-right" class="w-3.5 h-3.5 text-emerald-500"></i>Tiếng Anh Trẻ Em Fly High Kids</a></li>
                </ul>
            </div>

            <div>
                <h4 class="text-xs font-extrabold uppercase tracking-wider text-slate-900 mb-4 font-heading border-l-2 border-sky-500 pl-2">Chức Năng Nổi Bật</h4>
                <ul class="space-y-2.5 text-xs font-semibold">
                    <li><button onclick="openModal('zaloModal')" class="text-slate-600 hover:text-emerald-600 transition-colors flex items-center gap-1.5 text-left"><i data-lucide="chevron-right" class="w-3.5 h-3.5 text-sky-500"></i>Đăng ký học thử qua Zalo</button></li>
                    <li><a href="{{ route('placement_test.index') }}" class="text-slate-600 hover:text-emerald-600 transition-colors flex items-center gap-1.5"><i data-lucide="chevron-right" class="w-3.5 h-3.5 text-sky-500"></i>Làm bài test đầu vào online</a></li>
                    <li><a href="{{ route('learning_hub.index') }}" class="text-slate-600 hover:text-emerald-600 transition-colors flex items-center gap-1.5"><i data-lucide="chevron-right" class="w-3.5 h-3.5 text-sky-500"></i>Vào phòng học tương tác HTML</a></li>
                    <li><button onclick="openModal('vstepModal')" class="text-slate-600 hover:text-gold-600 transition-colors flex items-center gap-1.5 text-left"><i data-lucide="chevron-right" class="w-3.5 h-3.5 text-sky-500"></i>Đăng ký thi thử B1 VSTEP</button></li>
                </ul>
            </div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-8 border-t border-slate-300/80 flex flex-col sm:flex-row items-center justify-between text-xs text-slate-500 gap-4">
            <p>&copy; {{ date('Y') }} Fly High English Center. All rights reserved.</p>
            <p class="flex items-center gap-2 font-medium">
                <span>Hệ thống LMS bài học HTML tương tác chuẩn MVC</span>
                <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                <span class="text-emerald-700 font-bold">Light Dashboard Edition V2.0</span>
            </p>
        </div>
    </footer>

    <script>
        lucide.createIcons();

        function openModal(id) {
            document.getElementById(id).classList.remove('hidden');
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
