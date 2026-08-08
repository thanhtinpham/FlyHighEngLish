@extends('layouts.app')

@section('title', 'Fly High English - Hệ Thống Đào Tạo Tiếng Anh Tương Tác 4.0 & Luyện Thi VSTEP / IELTS')

@section('content')
<!-- Top Hero Section with Fresh Bright Educational Dashboard Aesthetic -->
<section class="relative bg-gradient-to-br from-emerald-50 via-teal-50/50 to-sky-50 text-slate-900 pt-14 pb-20 overflow-hidden border-b border-emerald-100/80">
    <!-- Bright decorative glow spots -->
    <div class="absolute top-0 right-1/4 w-96 h-96 bg-emerald-300/30 rounded-full blur-3xl pointer-events-none pulse-glow"></div>
    <div class="absolute bottom-0 left-10 w-96 h-96 bg-sky-300/30 rounded-full blur-3xl pointer-events-none"></div>
    <div class="absolute top-1/3 left-1/2 w-80 h-80 bg-gold-300/20 rounded-full blur-3xl pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-center">
            
            <!-- Left Hero Main Info -->
            <div class="lg:col-span-7 space-y-6 text-center lg:text-left">
                
                <div class="inline-flex items-center gap-2.5 px-4 py-2 rounded-full bg-emerald-100/80 border border-emerald-300 backdrop-blur-md text-emerald-800 text-xs font-bold uppercase tracking-wider">
                    <span class="w-2 h-2 rounded-full bg-emerald-500 animate-ping"></span>
                    <i data-lucide="sparkles" class="w-4 h-4 text-gold-600"></i> HỆ THỐNG ĐÀO TẠO TIẾNG ANH TƯƠNG TÁC 4.0
                </div>

                <h1 class="text-4xl sm:text-5xl lg:text-6xl font-black tracking-tight leading-[1.15] font-heading text-slate-900">
                    Chắp Cánh Tương Lai,<br>
                    <span class="text-gradient-emerald">Vươn Tầm Tri Thức</span>
                </h1>

                <p class="text-slate-600 text-base sm:text-lg max-w-2xl leading-relaxed font-medium mx-auto lg:mx-0">
                    Fly High English mang đến trải nghiệm học tiếng Anh chuẩn quốc tế. Tích hợp bài học HTML tương tác độc quyền, tự động ghi nhận tiến độ và tối ưu lộ trình bứt phá band điểm.
                </p>

                <!-- 4 Interactive Primary CTAs -->
                <div class="pt-2 grid grid-cols-1 sm:grid-cols-2 gap-3.5 max-w-xl mx-auto lg:mx-0">
                    <!-- CTA 1: Đăng ký học thử qua Zalo -->
                    <button onclick="openModal('zaloModal')" class="group px-5 py-3.5 rounded-2xl bg-gradient-to-r from-emerald-600 to-teal-600 hover:from-emerald-700 hover:to-teal-700 text-white font-extrabold text-xs sm:text-sm flex items-center justify-center gap-2.5 shadow-emerald-glow transition-all hover:scale-[1.02]">
                        <i data-lucide="message-circle" class="w-5 h-5 text-emerald-100 group-hover:scale-110 transition-transform"></i>
                        Đăng Ký Học Thử Zalo
                    </button>

                    <!-- CTA 2: Làm bài test đầu vào -->
                    <a href="{{ route('placement_test.index') }}" class="group px-5 py-3.5 rounded-2xl bg-gradient-to-r from-sky-600 to-blue-600 hover:from-sky-700 hover:to-blue-700 text-white font-extrabold text-xs sm:text-sm flex items-center justify-center gap-2.5 shadow-sky-glow transition-all hover:scale-[1.02]">
                        <i data-lucide="clipboard-check" class="w-5 h-5 text-sky-100 group-hover:scale-110 transition-transform"></i>
                        Làm Bài Test Đầu Vào
                    </a>

                    <!-- CTA 3: Vào phòng học tương tác -->
                    <a href="{{ route('learning_hub.index') }}" class="group px-5 py-3.5 rounded-2xl bg-white hover:bg-emerald-50/80 text-emerald-800 border border-emerald-300 font-extrabold text-xs sm:text-sm flex items-center justify-center gap-2.5 shadow-soft transition-all hover:scale-[1.02]">
                        <i data-lucide="monitor-play" class="w-5 h-5 text-emerald-600 group-hover:scale-110 transition-transform"></i>
                        Vào Phòng Học Tương Tác
                    </a>

                    <!-- CTA 4: Đăng ký thi thử B1 VSTEP -->
                    <button onclick="openModal('vstepModal')" class="group px-5 py-3.5 rounded-2xl bg-gradient-to-r from-gold-500 to-amber-500 hover:from-gold-600 hover:to-amber-600 text-slate-950 font-extrabold text-xs sm:text-sm flex items-center justify-center gap-2.5 shadow-gold-glow transition-all hover:scale-[1.02]">
                        <i data-lucide="award" class="w-5 h-5 text-slate-950 group-hover:scale-110 transition-transform"></i>
                        Đăng Ký Thi Thử B1 VSTEP
                    </button>
                </div>

                <!-- Highlight Stats Bar inside Hero -->
                <div class="pt-4 flex flex-wrap items-center justify-center lg:justify-start gap-6 text-xs text-slate-700">
                    <div class="flex items-center gap-2.5">
                        <div class="w-9 h-9 rounded-xl bg-emerald-100 text-emerald-700 flex items-center justify-center font-bold shadow-soft-sm">
                            <i data-lucide="users" class="w-4 h-4"></i>
                        </div>
                        <div>
                            <span class="font-extrabold text-slate-900 block text-sm font-heading">5,000+</span>
                            <span class="text-[11px] text-slate-500">Học viên tin dùng</span>
                        </div>
                    </div>

                    <div class="flex items-center gap-2.5">
                        <div class="w-9 h-9 rounded-xl bg-amber-100 text-amber-700 flex items-center justify-center font-bold shadow-soft-sm">
                            <i data-lucide="star" class="w-4 h-4"></i>
                        </div>
                        <div>
                            <span class="font-extrabold text-slate-900 block text-sm font-heading">98% Bứt Phá</span>
                            <span class="text-[11px] text-slate-500">Đạt mục tiêu VSTEP/IELTS</span>
                        </div>
                    </div>

                    <div class="flex items-center gap-2.5">
                        <div class="w-9 h-9 rounded-xl bg-sky-100 text-sky-700 flex items-center justify-center font-bold shadow-soft-sm">
                            <i data-lucide="zap" class="w-4 h-4"></i>
                        </div>
                        <div>
                            <span class="font-extrabold text-slate-900 block text-sm font-heading">HTML 4.0</span>
                            <span class="text-[11px] text-slate-500">Tương tác trực tiếp</span>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Right Column: Bright Interactive Educational Dashboard Card Preview -->
            <div class="lg:col-span-5">
                <div class="bg-white/95 backdrop-blur-xl rounded-3xl p-6 sm:p-7 text-slate-900 border border-emerald-200/80 shadow-2xl shadow-emerald-900/5 space-y-5">
                    
                    <!-- Dashboard Header -->
                    <div class="flex items-center justify-between border-b border-slate-100 pb-4">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-2xl bg-gradient-to-tr from-emerald-500 to-teal-500 text-white flex items-center justify-center font-extrabold shadow-emerald-glow">
                                <i data-lucide="layout-dashboard" class="w-5 h-5"></i>
                            </div>
                            <div>
                                <h3 class="font-extrabold text-sm text-slate-900 font-heading">Bảng Điều Khiển Học Viên</h3>
                                <p class="text-[11px] text-emerald-600 font-semibold flex items-center gap-1">
                                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-ping"></span> Live Interactive LMS Demo
                                </p>
                            </div>
                        </div>
                        <span class="px-2.5 py-1 bg-gold-100 text-gold-700 border border-gold-300 rounded-full text-[10px] font-extrabold uppercase tracking-wider flex items-center gap-1">
                            🔥 14 ngày streak
                        </span>
                    </div>

                    <!-- Live Progress Metric Card -->
                    <div class="p-4 rounded-2xl bg-emerald-50/60 border border-emerald-100 space-y-3">
                        <div class="flex items-center justify-between text-xs">
                            <span class="text-slate-800 font-semibold flex items-center gap-1.5">
                                <i data-lucide="book-open-check" class="w-4 h-4 text-emerald-600"></i> Lộ trình IELTS 7.0+ Target
                            </span>
                            <span class="text-emerald-700 font-extrabold font-heading">84% Hoàn thành</span>
                        </div>
                        
                        <!-- Animated Progress Bar -->
                        <div class="w-full h-3 bg-slate-200/80 rounded-full overflow-hidden p-0.5 border border-slate-300/60">
                            <div class="h-full bg-gradient-to-r from-emerald-500 to-sky-500 rounded-full transition-all duration-1000 relative" style="width: 84%;">
                                <div class="absolute right-0 top-0 bottom-0 w-2 bg-white/70 rounded-full animate-pulse"></div>
                            </div>
                        </div>

                        <div class="flex items-center justify-between text-[11px] text-slate-600">
                            <span>Bài tập: 21/25 Module</span>
                            <span>Điểm trung bình: <strong class="text-amber-700 font-bold">8.8/10</strong></span>
                        </div>
                    </div>

                    <!-- Interactive Audio & IPA Test Widget -->
                    <div class="p-4 rounded-2xl bg-sky-50/60 border border-sky-100 space-y-3">
                        <div class="flex items-center justify-between">
                            <span class="text-xs font-bold text-sky-900 flex items-center gap-1.5 font-heading">
                                🎧 Thẻ Học Âm Tương Tác IPA
                            </span>
                            <span class="text-[10px] bg-sky-100 text-sky-800 px-2 py-0.5 rounded-full font-bold border border-sky-200">Chạm để phát sound</span>
                        </div>

                        <div class="grid grid-cols-2 gap-2">
                            <button onclick="playDemoSound('/æ/', 'Apple')" class="p-3 bg-white hover:bg-emerald-50 rounded-xl border border-slate-200/80 hover:border-emerald-400 transition-all text-left flex items-center justify-between group shadow-soft-sm">
                                <div>
                                    <span class="text-xs font-extrabold text-slate-900 font-heading block">/æ/ - Apple</span>
                                    <span class="text-[10px] text-slate-500">Vowel Sound</span>
                                </div>
                                <div class="w-7 h-7 rounded-lg bg-emerald-100 text-emerald-700 group-hover:bg-emerald-600 group-hover:text-white flex items-center justify-center transition-colors">
                                    <i data-lucide="volume-2" class="w-3.5 h-3.5"></i>
                                </div>
                            </button>

                            <button onclick="playDemoSound('/i:/', 'Teacher')" class="p-3 bg-white hover:bg-emerald-50 rounded-xl border border-slate-200/80 hover:border-emerald-400 transition-all text-left flex items-center justify-between group shadow-soft-sm">
                                <div>
                                    <span class="text-xs font-extrabold text-slate-900 font-heading block">/i:/ - Teacher</span>
                                    <span class="text-[10px] text-slate-500">Long Vowel</span>
                                </div>
                                <div class="w-7 h-7 rounded-lg bg-sky-100 text-sky-700 group-hover:bg-sky-600 group-hover:text-white flex items-center justify-center transition-colors">
                                    <i data-lucide="volume-2" class="w-3.5 h-3.5"></i>
                                </div>
                            </button>
                        </div>
                    </div>

                    <!-- Quick Badge Banner -->
                    <div class="pt-1 border-t border-slate-100 flex items-center justify-between text-xs text-slate-500">
                        <span class="flex items-center gap-1.5"><i data-lucide="shield-check" class="w-4 h-4 text-emerald-600"></i> Lưu tự động 100%</span>
                        <button onclick="showToast('🎉 Bảng Điều Khiển VIP', 'Tất cả bài học HTML tự động lưu điểm số và thời gian học!', 'amber')" class="text-gold-600 hover:underline font-bold text-[11px] flex items-center gap-1">
                            Xem chi tiết <i data-lucide="arrow-right" class="w-3 h-3"></i>
                        </button>
                    </div>

                </div>
            </div>

        </div>
    </div>
</section>

<!-- Interactive Quick Quiz Mini-Widget Section -->
<section class="py-10 bg-slate-100/70 border-b border-slate-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="dashboard-card p-6 sm:p-8 bg-gradient-to-r from-white via-emerald-50/40 to-sky-50/50 border border-slate-200">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
                
                <div class="lg:col-span-4 space-y-2">
                    <span class="px-3 py-1 bg-emerald-100 text-emerald-800 rounded-full text-xs font-bold uppercase tracking-wider inline-flex items-center gap-1 border border-emerald-200">
                        <i data-lucide="zap" class="w-3.5 h-3.5 text-emerald-600"></i> Mini Reflex Quiz
                    </span>
                    <h3 class="text-2xl font-black text-slate-900 font-heading">Thử Phản Xạ Ngay 30 Giây</h3>
                    <p class="text-xs text-slate-500 leading-relaxed">Trải nghiệm dạng câu hỏi trắc nghiệm phát âm & từ vựng trực quan của phòng học Fly High English.</p>
                </div>

                <div class="lg:col-span-8 bg-white p-5 rounded-2xl border border-slate-200/80 shadow-soft-sm space-y-4">
                    <div class="flex items-center justify-between border-b border-slate-100 pb-3">
                        <span class="text-xs font-extrabold text-slate-800 font-heading flex items-center gap-2">
                            <span class="w-6 h-6 rounded-full bg-emerald-600 text-white text-[11px] flex items-center justify-center font-bold">1</span>
                            Chọn câu đúng nhất để chào hỏi lịch sự trong giao tiếp công sở:
                        </span>
                        <span id="quizScoreBadge" class="text-xs font-bold text-emerald-700 bg-emerald-50 px-2.5 py-1 rounded-full border border-emerald-200">
                            Điểm: 0 XP
                        </span>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-3" id="quizOptions">
                        <button onclick="checkQuickQuiz(this, false)" class="p-3.5 rounded-xl border border-slate-200 hover:border-emerald-400 hover:bg-emerald-50/50 text-slate-700 text-xs font-semibold text-left transition-all flex items-center justify-between group">
                            <span>A. Hey man, what's up?</span>
                            <i data-lucide="circle" class="w-4 h-4 text-slate-300 group-hover:text-emerald-500"></i>
                        </button>

                        <button onclick="checkQuickQuiz(this, true)" class="p-3.5 rounded-xl border border-slate-200 hover:border-emerald-400 hover:bg-emerald-50/50 text-slate-700 text-xs font-semibold text-left transition-all flex items-center justify-between group">
                            <span>B. Good morning, how are you?</span>
                            <i data-lucide="circle" class="w-4 h-4 text-slate-300 group-hover:text-emerald-500"></i>
                        </button>

                        <button onclick="checkQuickQuiz(this, false)" class="p-3.5 rounded-xl border border-slate-200 hover:border-emerald-400 hover:bg-emerald-50/50 text-slate-700 text-xs font-semibold text-left transition-all flex items-center justify-between group">
                            <span>C. Yo bro, long time no see!</span>
                            <i data-lucide="circle" class="w-4 h-4 text-slate-300 group-hover:text-emerald-500"></i>
                        </button>
                    </div>

                    <div id="quizFeedback" class="hidden p-3 rounded-xl text-xs font-semibold flex items-center justify-between"></div>
                </div>

            </div>
        </div>
    </div>
</section>

<!-- USP Section (Minimalist Elegant Cards) -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="text-center max-w-3xl mx-auto mb-16 space-y-3">
            <span class="px-3.5 py-1 bg-emerald-50 text-emerald-700 rounded-full text-xs font-extrabold uppercase tracking-widest border border-emerald-200/80">
                ĐIỂM NỔI BẬT KHÁC BIỆT
            </span>
            <h2 class="text-3xl sm:text-4xl font-black text-slate-900 font-heading">Tại Sao Chọn Fly High English?</h2>
            <p class="text-slate-500 text-sm max-w-xl mx-auto leading-relaxed">
                Phương pháp học tương tác chủ động kết hợp nền tảng bài học HTML 4.0 trực quan sinh động
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            
            <!-- Card 1 -->
            <div class="dashboard-card p-6 flex flex-col justify-between group">
                <div>
                    <div class="w-14 h-14 rounded-2xl bg-emerald-50 text-emerald-600 flex items-center justify-center mb-6 group-hover:bg-emerald-600 group-hover:text-white transition-all shadow-soft-sm">
                        <i data-lucide="code-2" class="w-7 h-7"></i>
                    </div>
                    <h3 class="font-extrabold text-slate-900 text-lg mb-2.5 font-heading">Bài Học HTML Tương Tác</h3>
                    <p class="text-xs text-slate-500 leading-relaxed">
                        Bài học thiết kế dạng web HTML tương tác giữ nguyên âm thanh IPA chuẩn bản ngữ, thao tác kéo thả và trắc nghiệm phản xạ giúp việc học hấp dẫn.
                    </p>
                </div>
                <div class="mt-6 pt-4 border-t border-slate-100 flex items-center text-xs font-bold text-emerald-600 group-hover:translate-x-1 transition-transform">
                    Khám phá HTML LMS <i data-lucide="arrow-right" class="w-4 h-4 ml-1"></i>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="dashboard-card p-6 flex flex-col justify-between group">
                <div>
                    <div class="w-14 h-14 rounded-2xl bg-sky-50 text-sky-600 flex items-center justify-center mb-6 group-hover:bg-sky-600 group-hover:text-white transition-all shadow-soft-sm">
                        <i data-lucide="award" class="w-7 h-7"></i>
                    </div>
                    <h3 class="font-extrabold text-slate-900 text-lg mb-2.5 font-heading">Giảng Viên Đạt B2/C1 & IELTS 8.0+</h3>
                    <p class="text-xs text-slate-500 leading-relaxed">
                        Đội ngũ giảng viên giàu kinh nghiệm, đạt chứng chỉ quốc tế uy tín, trực tiếp sửa bài Nói - Viết và hỗ trợ 1-1 qua Zalo.
                    </p>
                </div>
                <div class="mt-6 pt-4 border-t border-slate-100 flex items-center text-xs font-bold text-sky-600 group-hover:translate-x-1 transition-transform">
                    Xem đội ngũ thầy cô <i data-lucide="arrow-right" class="w-4 h-4 ml-1"></i>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="dashboard-card p-6 flex flex-col justify-between group">
                <div>
                    <div class="w-14 h-14 rounded-2xl bg-gold-400/20 text-gold-600 flex items-center justify-center mb-6 group-hover:bg-gold-500 group-hover:text-slate-950 transition-all shadow-soft-sm">
                        <i data-lucide="map" class="w-7 h-7"></i>
                    </div>
                    <h3 class="font-extrabold text-slate-900 text-lg mb-2.5 font-heading">Lộ Trình Cá Nhân Hóa</h3>
                    <p class="text-xs text-slate-500 leading-relaxed">
                        Bài test đầu vào chuẩn hóa giúp xếp đúng lớp, tối ưu thời gian học theo mục tiêu VSTEP B1, IELTS hoặc Giao Tiếp đi làm.
                    </p>
                </div>
                <div class="mt-6 pt-4 border-t border-slate-100 flex items-center text-xs font-bold text-gold-600 group-hover:translate-x-1 transition-transform">
                    Test trình độ ngay <i data-lucide="arrow-right" class="w-4 h-4 ml-1"></i>
                </div>
            </div>

            <!-- Card 4 -->
            <div class="dashboard-card p-6 flex flex-col justify-between group">
                <div>
                    <div class="w-14 h-14 rounded-2xl bg-emerald-50 text-teal-600 flex items-center justify-center mb-6 group-hover:bg-teal-600 group-hover:text-white transition-all shadow-soft-sm">
                        <i data-lucide="bar-chart-3" class="w-7 h-7"></i>
                    </div>
                    <h3 class="font-extrabold text-slate-900 text-lg mb-2.5 font-heading">Quản Lý Tiến Độ LMS</h3>
                    <p class="text-xs text-slate-500 leading-relaxed">
                        Hệ thống tự động lưu vết phần trăm hoàn thành, điểm số các bài kiểm tra và thời gian học tập giúp bạn chủ động theo dõi.
                    </p>
                </div>
                <div class="mt-6 pt-4 border-t border-slate-100 flex items-center text-xs font-bold text-teal-600 group-hover:translate-x-1 transition-transform">
                    Vào phòng học LMS <i data-lucide="arrow-right" class="w-4 h-4 ml-1"></i>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- Featured Courses Section with Modern Horizontal Category Tabs -->
<section class="py-20 bg-slate-50 border-t border-slate-200/80">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Header & Modern Tab Nav -->
        <div class="flex flex-col lg:flex-row items-start lg:items-center justify-between mb-10 gap-6">
            <div>
                <span class="px-3.5 py-1 bg-emerald-100 text-emerald-800 rounded-full text-xs font-extrabold uppercase tracking-widest">
                    DANH SÁCH KHÓA HỌC CHÍNH
                </span>
                <h2 class="text-3xl font-black text-slate-900 mt-2 font-heading">Lộ Trình Đào Tạo Chuẩn Hóa</h2>
            </div>

            <!-- Horizontal Category Filter Tabs with Smooth Active State -->
            <div class="flex flex-wrap items-center gap-2 bg-white p-1.5 rounded-2xl border border-slate-200 shadow-soft-sm">
                <button onclick="filterCourses('all', this)" class="course-tab-btn px-4 py-2 rounded-xl text-xs font-bold transition-all bg-emerald-500 text-white shadow-emerald-glow">
                    ✨ Tất Cả Khóa Học
                </button>
                <button onclick="filterCourses('giao-tiep', this)" class="course-tab-btn px-4 py-2 rounded-xl text-xs font-bold text-slate-600 hover:bg-slate-100 transition-all">
                    🗣️ Giao Tiếp
                </button>
                <button onclick="filterCourses('ielts', this)" class="course-tab-btn px-4 py-2 rounded-xl text-xs font-bold text-slate-600 hover:bg-slate-100 transition-all">
                    🎯 IELTS 7.0+
                </button>
                <button onclick="filterCourses('toeic', this)" class="course-tab-btn px-4 py-2 rounded-xl text-xs font-bold text-slate-600 hover:bg-slate-100 transition-all">
                    ⚡ TOEIC 800+
                </button>
                <button onclick="filterCourses('tre-em', this)" class="course-tab-btn px-4 py-2 rounded-xl text-xs font-bold text-slate-600 hover:bg-slate-100 transition-all">
                    🎈 Trẻ Em
                </button>
            </div>
        </div>

        <!-- Course Cards Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6" id="courseGrid">
            @foreach($courses as $course)
            <div class="course-card dashboard-card bg-white overflow-hidden flex flex-col justify-between" data-category="{{ $course->category }}">
                
                <div class="p-6 space-y-4">
                    <div class="flex items-center justify-between">
                        <span class="px-3 py-1 bg-emerald-50 text-emerald-700 rounded-full text-[11px] font-extrabold border border-emerald-200/60">
                            {{ $course->category_label }}
                        </span>
                        <span class="text-xs text-slate-400 font-semibold flex items-center gap-1">
                            <i data-lucide="layers" class="w-3.5 h-3.5 text-sky-500"></i> {{ $course->level }}
                        </span>
                    </div>

                    <div>
                        <h3 class="font-extrabold text-slate-900 text-lg mb-2 font-heading line-clamp-2 hover:text-emerald-600 transition-colors">
                            <a href="{{ route('courses.show', $course->slug) }}">
                                {{ $course->title }}
                            </a>
                        </h3>

                        <p class="text-xs text-slate-500 line-clamp-3 leading-relaxed">
                            {{ $course->description }}
                        </p>
                    </div>

                    <!-- Mini Features Checklist -->
                    <div class="pt-2 border-t border-slate-100 space-y-1.5 text-xs text-slate-600">
                        <div class="flex items-center gap-2">
                            <i data-lucide="check-circle-2" class="w-3.5 h-3.5 text-emerald-500 shrink-0"></i>
                            <span>Bài học HTML tương tác 4D</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <i data-lucide="check-circle-2" class="w-3.5 h-3.5 text-emerald-500 shrink-0"></i>
                            <span>Sửa bài trực tiếp với thầy cô</span>
                        </div>
                    </div>
                </div>

                <div class="px-6 py-4 bg-slate-50 border-t border-slate-100 flex items-center justify-between">
                    <div>
                        <span class="text-[10px] text-slate-400 block uppercase font-bold">Học phí ưu đãi</span>
                        <span class="text-base font-black text-emerald-600 font-heading">{{ number_format($course->price) }} đ</span>
                    </div>
                    <a href="{{ route('courses.show', $course->slug) }}" class="px-4 py-2.5 bg-emerald-600 hover:bg-emerald-700 text-white rounded-xl text-xs font-bold transition-all shadow-emerald-glow flex items-center gap-1.5">
                        Lộ Trình <i data-lucide="chevron-right" class="w-3.5 h-3.5"></i>
                    </a>
                </div>

            </div>
            @endforeach
        </div>

        <div class="mt-12 text-center">
            <a href="{{ route('courses.index') }}" class="inline-flex items-center gap-2 px-6 py-3.5 rounded-2xl bg-white border border-slate-200 hover:bg-slate-100 text-slate-800 text-xs font-extrabold shadow-soft-sm transition-all">
                Xem Tất Cả Lộ Trình Chi Tiết <i data-lucide="arrow-right" class="w-4 h-4 text-emerald-600"></i>
            </a>
        </div>

    </div>
</section>

<!-- Interactive HTML Lesson Preview Section -->
@if($previewLessons->count() > 0)
<section class="py-20 bg-white border-t border-slate-200/80">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="text-center max-w-3xl mx-auto mb-14 space-y-2">
            <span class="px-3.5 py-1 bg-sky-100 text-sky-800 rounded-full text-xs font-extrabold uppercase tracking-widest border border-sky-200">
                INTERACTIVE HTML LESSON PREVIEW
            </span>
            <h2 class="text-3xl font-black text-slate-900 font-heading">Học Thử Bài Học HTML Tương Tác Free</h2>
            <p class="text-xs text-slate-500 max-w-lg mx-auto">
                Trải nghiệm trực tiếp giao diện phòng học HTML hiện đại mà không cần đăng nhập!
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @foreach($previewLessons as $pLesson)
            <div class="dashboard-card p-7 bg-gradient-to-br from-white via-slate-50/50 to-emerald-50/30 flex flex-col justify-between space-y-6">
                <div class="space-y-3">
                    <div class="flex items-center justify-between">
                        <span class="text-xs font-extrabold text-emerald-700 bg-emerald-100/80 px-3 py-1 rounded-full border border-emerald-200/80">
                            {{ $pLesson->level_or_week }}
                        </span>
                        <span class="px-2.5 py-0.5 bg-gold-400/20 text-gold-600 text-[10px] font-extrabold rounded-full border border-gold-400/40 flex items-center gap-1">
                            <i data-lucide="sparkles" class="w-3 h-3"></i> FREE PREVIEW
                        </span>
                    </div>

                    <h3 class="font-extrabold text-slate-900 text-xl font-heading leading-snug">{{ $pLesson->title }}</h3>
                    <p class="text-xs text-slate-500 leading-relaxed">{{ $pLesson->description }}</p>
                </div>

                <div class="pt-4 border-t border-slate-200/60 flex items-center justify-between">
                    <span class="text-xs text-slate-500 flex items-center gap-1.5 font-semibold">
                        <i data-lucide="clock" class="w-4 h-4 text-emerald-500"></i> Thời lượng: 15 Phút
                    </span>
                    <a href="{{ route('lessons.show', $pLesson->id) }}" class="px-5 py-3 bg-gradient-to-r from-emerald-600 to-teal-600 hover:from-emerald-700 hover:to-teal-700 text-white text-xs font-extrabold rounded-xl flex items-center justify-center gap-2 shadow-emerald-glow transition-all hover:scale-[1.02]">
                        <i data-lucide="play-circle" class="w-4 h-4"></i> Trải Nghiệm Bài Học HTML
                    </a>
                </div>
            </div>
            @endforeach
        </div>

    </div>
</section>
@endif

<!-- Student Success & Testimonials Section -->
<section class="py-20 bg-slate-50 border-t border-slate-200/80">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="text-center max-w-3xl mx-auto mb-14 space-y-2">
            <span class="px-3.5 py-1 bg-gold-400/20 text-gold-600 rounded-full text-xs font-extrabold uppercase tracking-widest border border-gold-400/40">
                CẢM NHẬN THỰC TẾ
            </span>
            <h2 class="text-3xl font-black text-slate-900 font-heading">Học Viên Nói Gì Về Fly High English?</h2>
            <p class="text-xs text-slate-500 max-w-lg mx-auto">
                Hơn 5,000+ học viên đã bứt phá thành công band điểm VSTEP B1, IELTS và Tiếng Anh Giao Tiếp.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            
            <div class="dashboard-card p-6 bg-white space-y-4">
                <div class="flex items-center justify-between">
                    <div class="flex text-gold-400 gap-1">
                        <i data-lucide="star" class="w-4 h-4 fill-gold-400"></i>
                        <i data-lucide="star" class="w-4 h-4 fill-gold-400"></i>
                        <i data-lucide="star" class="w-4 h-4 fill-gold-400"></i>
                        <i data-lucide="star" class="w-4 h-4 fill-gold-400"></i>
                        <i data-lucide="star" class="w-4 h-4 fill-gold-400"></i>
                    </div>
                    <span class="px-2.5 py-1 bg-emerald-50 text-emerald-700 text-[10px] font-extrabold rounded-full border border-emerald-200">Bằng VSTEP B1</span>
                </div>
                <p class="text-xs text-slate-600 leading-relaxed italic">
                    "Mình cần gấp bằng VSTEP B1 để bảo vệ thạc sĩ. Nhờ bài học HTML ngắn gọn và thầy cô hỗ trợ chấm bài Nói Viết liên tục qua Zalo, mình đã đỗ ngay lần thi đầu tiên!"
                </p>
                <div class="flex items-center gap-3 pt-2 border-t border-slate-100">
                    <div class="w-10 h-10 rounded-full bg-emerald-100 text-emerald-700 font-extrabold flex items-center justify-center text-sm font-heading">
                        TH
                    </div>
                    <div>
                        <h4 class="text-xs font-bold text-slate-900 font-heading">Trần Hoàng Nam</h4>
                        <span class="text-[10px] text-slate-400 block">Học viên đợt thi tháng 5/2026</span>
                    </div>
                </div>
            </div>

            <div class="dashboard-card p-6 bg-white space-y-4">
                <div class="flex items-center justify-between">
                    <div class="flex text-gold-400 gap-1">
                        <i data-lucide="star" class="w-4 h-4 fill-gold-400"></i>
                        <i data-lucide="star" class="w-4 h-4 fill-gold-400"></i>
                        <i data-lucide="star" class="w-4 h-4 fill-gold-400"></i>
                        <i data-lucide="star" class="w-4 h-4 fill-gold-400"></i>
                        <i data-lucide="star" class="w-4 h-4 fill-gold-400"></i>
                    </div>
                    <span class="px-2.5 py-1 bg-sky-50 text-sky-700 text-[10px] font-extrabold rounded-full border border-sky-200">IELTS Overall 7.5</span>
                </div>
                <p class="text-xs text-slate-600 leading-relaxed italic">
                    "Phòng học HTML rất hiện đại, phần nghe có tích hợp sẵn IPA audio bấm phát tức thì. Không gian học nhẹ nhàng giúp mình tăng từ 6.0 lên 7.5 chỉ sau 3 tháng."
                </p>
                <div class="flex items-center gap-3 pt-2 border-t border-slate-100">
                    <div class="w-10 h-10 rounded-full bg-sky-100 text-sky-700 font-extrabold flex items-center justify-center text-sm font-heading">
                        MY
                    </div>
                    <div>
                        <h4 class="text-xs font-bold text-slate-900 font-heading">Nguyễn Minh Yến</h4>
                        <span class="text-[10px] text-slate-400 block">Sinh viên ĐHQG Hà Nội</span>
                    </div>
                </div>
            </div>

            <div class="dashboard-card p-6 bg-white space-y-4">
                <div class="flex items-center justify-between">
                    <div class="flex text-gold-400 gap-1">
                        <i data-lucide="star" class="w-4 h-4 fill-gold-400"></i>
                        <i data-lucide="star" class="w-4 h-4 fill-gold-400"></i>
                        <i data-lucide="star" class="w-4 h-4 fill-gold-400"></i>
                        <i data-lucide="star" class="w-4 h-4 fill-gold-400"></i>
                        <i data-lucide="star" class="w-4 h-4 fill-gold-400"></i>
                    </div>
                    <span class="px-2.5 py-1 bg-gold-400/20 text-gold-600 text-[10px] font-extrabold rounded-full border border-gold-400/40">Giao Tiếp Đi Làm</span>
                </div>
                <p class="text-xs text-slate-600 leading-relaxed italic">
                    "Đi làm bận rộn nhưng website Fly High lưu tiến độ tự động nên mình học 15 phút mỗi tối. Giờ mình tự tin họp và thuyết trình Tiếng Anh với sếp nước ngoài."
                </p>
                <div class="flex items-center gap-3 pt-2 border-t border-slate-100">
                    <div class="w-10 h-10 rounded-full bg-gold-100 text-gold-700 font-extrabold flex items-center justify-center text-sm font-heading">
                        LQ
                    </div>
                    <div>
                        <h4 class="text-xs font-bold text-slate-900 font-heading">Lê Quốc Khánh</h4>
                        <span class="text-[10px] text-slate-400 block">Kỹ sư phần mềm</span>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- Floating Feedback / AI Assistant Widget (Bottom Left) -->
<div class="fixed bottom-6 left-6 z-40">
    <div class="relative group">
        <button onclick="toggleFloatingPanel()" class="w-13 h-13 sm:w-14 sm:h-14 rounded-2xl bg-gradient-to-tr from-emerald-500 to-teal-600 text-white flex items-center justify-center shadow-emerald-glow hover:scale-105 transition-all">
            <i data-lucide="bot" class="w-7 h-7"></i>
            <span class="absolute -top-1 -right-1 w-3.5 h-3.5 bg-gold-400 border-2 border-white rounded-full"></span>
        </button>

        <!-- Expandable Assistant Menu Panel -->
        <div id="floatingPanel" class="hidden absolute bottom-16 left-0 w-72 bg-white rounded-3xl p-5 shadow-2xl border border-slate-200 space-y-3 animate-in fade-in slide-in-from-bottom-2 duration-200">
            <div class="flex items-center justify-between border-b border-slate-100 pb-2.5">
                <div class="flex items-center gap-2">
                    <div class="w-7 h-7 rounded-lg bg-emerald-100 text-emerald-600 flex items-center justify-center font-bold">
                        <i data-lucide="sparkles" class="w-4 h-4"></i>
                    </div>
                    <span class="text-xs font-extrabold text-slate-900 font-heading">Hỗ Trợ Học Viên FlyHigh</span>
                </div>
                <button onclick="toggleFloatingPanel()" class="text-slate-400 hover:text-slate-600 p-1">
                    <i data-lucide="x" class="w-3.5 h-3.5"></i>
                </button>
            </div>

            <p class="text-[11px] text-slate-500">Bạn cần tư vấn khóa học nào hôm nay?</p>

            <div class="space-y-2">
                <button onclick="openModal('zaloModal'); toggleFloatingPanel();" class="w-full p-2.5 bg-emerald-50 hover:bg-emerald-100 text-emerald-800 text-xs font-bold rounded-xl text-left flex items-center gap-2 transition-colors">
                    <i data-lucide="message-circle" class="w-4 h-4 text-emerald-600"></i> Tư vấn học thử qua Zalo
                </button>
                <a href="{{ route('placement_test.index') }}" class="w-full p-2.5 bg-sky-50 hover:bg-sky-100 text-sky-800 text-xs font-bold rounded-xl text-left flex items-center gap-2 transition-colors">
                    <i data-lucide="target" class="w-4 h-4 text-sky-600"></i> Test trình độ online (Free)
                </a>
                <button onclick="openModal('vstepModal'); toggleFloatingPanel();" class="w-full p-2.5 bg-amber-50 hover:bg-amber-100 text-amber-900 text-xs font-bold rounded-xl text-left flex items-center gap-2 transition-colors">
                    <i data-lucide="award" class="w-4 h-4 text-amber-600"></i> Đăng ký thi B1 VSTEP
                </button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    // Category Course Tab Filtering
    function filterCourses(category, btn) {
        // Update active tab buttons visual state
        const tabs = document.querySelectorAll('.course-tab-btn');
        tabs.forEach(t => {
            t.className = 'course-tab-btn px-4 py-2 rounded-xl text-xs font-bold text-slate-600 hover:bg-slate-100 transition-all';
        });
        btn.className = 'course-tab-btn px-4 py-2 rounded-xl text-xs font-bold transition-all bg-emerald-500 text-white shadow-emerald-glow';

        // Filter Grid Items
        const cards = document.querySelectorAll('.course-card');
        cards.forEach(card => {
            if (category === 'all' || card.dataset.category === category) {
                card.style.display = 'flex';
            } else {
                card.style.display = 'none';
            }
        });
    }

    // Audio IPA Sound Simulation for Interactive Dashboard
    function playDemoSound(symbol, word) {
        if ('speechSynthesis' in window) {
            const utterance = new SpeechSynthesisUtterance(word);
            utterance.lang = 'en-US';
            utterance.rate = 0.9;
            window.speechSynthesis.speak(utterance);
        }
        showToast(`🔊 Phát âm IPA: ${symbol}`, `Đang phát âm từ mẫu: "${word}"`, 'emerald');
    }

    // Quick Quiz Mini-Widget Interaction
    let quizAnswered = false;
    function checkQuickQuiz(btn, isCorrect) {
        if (quizAnswered) return;
        quizAnswered = true;

        const options = document.querySelectorAll('#quizOptions button');
        const feedback = document.getElementById('quizFeedback');
        const scoreBadge = document.getElementById('quizScoreBadge');

        options.forEach(opt => opt.classList.add('opacity-50', 'pointer-events-none'));
        btn.classList.remove('opacity-50');

        feedback.classList.remove('hidden');

        if (isCorrect) {
            btn.classList.add('bg-emerald-100', 'border-emerald-500', 'text-emerald-900');
            feedback.className = 'p-3 rounded-xl text-xs font-bold bg-emerald-100 text-emerald-900 flex items-center justify-between border border-emerald-300';
            feedback.innerHTML = `
                <span>🎉 Chính xác 100%! "Good morning, how are you?" là lời chào công sở thanh lịch nhất!</span>
                <span class="px-2 py-0.5 bg-emerald-600 text-white rounded-full text-[10px]">100 XP</span>
            `;
            scoreBadge.innerText = 'Điểm: 100 XP';
            showToast('🎯 Tuyệt vời!', 'Bạn nhận được 100 XP phản xạ Tiếng Anh!', 'emerald');
        } else {
            btn.classList.add('bg-rose-100', 'border-rose-400', 'text-rose-900');
            feedback.className = 'p-3 rounded-xl text-xs font-bold bg-amber-50 text-amber-900 flex items-center justify-between border border-amber-300';
            feedback.innerHTML = `
                <span>💡 Gợi ý: Đáp án đúng là B (Good morning, how are you?). Câu A & C mang tính chất suồng sã bạn bè.</span>
            `;
            showToast('💡 Thử lại sau nhé!', 'Lựa chọn B là phương án giao tiếp công sở tốt nhất!', 'amber');
        }
    }

    // Floating assistant toggle
    function toggleFloatingPanel() {
        const panel = document.getElementById('floatingPanel');
        panel.classList.toggle('hidden');
    }
</script>
@endsection
