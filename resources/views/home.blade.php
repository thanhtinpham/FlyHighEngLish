@extends('layouts.app')

@section('title', 'Fly High English - Bứt Phá Tiếng Anh Cùng Các Công Cụ AI, Học Tập Suốt Đời')

@section('content')
<!-- Top Hero Section - Ocean Blue Mint & White Theme with Pedagogy & History Column -->
<section class="relative bg-gradient-to-br from-white via-sky-50/40 via-teal-50/30 to-emerald-50/40 text-slate-900 pt-8 pb-10 overflow-hidden border-b border-cyan-100/80">
    <!-- Ocean Ambient Glow Orbs -->
    <div class="absolute top-0 right-1/4 w-80 h-80 bg-sky-300/20 rounded-full blur-3xl pointer-events-none pulse-glow"></div>
    <div class="absolute bottom-0 left-10 w-72 h-72 bg-teal-300/25 rounded-full blur-3xl pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-center">
            
            <!-- Left Hero Main Info (Slogan, Intro & CTAs) -->
            <div class="lg:col-span-6 space-y-4 text-center lg:text-left">
                
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-gradient-to-r from-sky-100 via-teal-100 to-emerald-100 border border-teal-300/80 backdrop-blur-md text-teal-950 text-[11px] font-bold uppercase tracking-wider shadow-sm">
                    <span class="w-2 h-2 rounded-full bg-cyan-500 animate-ping"></span>
                    <i data-lucide="sparkles" class="w-3.5 h-3.5 text-teal-600"></i> HỆ THỐNG ĐÀO TẠO TIẾNG ANH TƯƠNG TÁC 4.0
                </div>

                <h1 class="text-2xl sm:text-3xl font-extrabold tracking-tight leading-tight font-heading text-slate-900">
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-sky-600 via-teal-600 to-emerald-500">Bứt Phá Tiếng Anh Cùng Công Cụ AI, <br>Học Tập Suốt Đời</span>
                </h1>

                <p class="text-slate-600 text-xs sm:text-sm max-w-xl leading-relaxed font-medium mx-auto lg:mx-0">
                    Fly High English mang đến phương pháp học phản xạ tự nhiên thông qua hệ thống bài học HTML tương tác hiện đại, giúp học viên dễ dàng ghi nhớ, theo dõi tiến độ và tối ưu lộ trình thi VSTEP / IELTS.
                </p>

                <!-- 4 Interactive Primary CTAs (Compact Grid) -->
                <div class="pt-1 grid grid-cols-2 gap-2.5 max-w-lg mx-auto lg:mx-0">
                    <!-- CTA 1: Đăng ký học thử qua Zalo Fly High 0907294800 -->
                    <button onclick="openModal('zaloModal')" class="group px-3.5 py-2.5 rounded-xl bg-gradient-to-r from-sky-600 via-teal-600 to-emerald-500 hover:from-sky-700 hover:to-emerald-600 text-white font-extrabold text-xs flex items-center justify-center gap-2 shadow-md shadow-teal-500/20 transition-all hover:scale-[1.01] border border-teal-400/30">
                        <i data-lucide="message-circle" class="w-4 h-4 text-teal-100 group-hover:scale-110 transition-transform"></i>
                        Học Thử Zalo: 0907294800
                    </button>

                    <!-- CTA 2: Làm bài test đầu vào -->
                    <a href="{{ route('placement_test.index') }}" class="group px-3.5 py-2.5 rounded-xl bg-gradient-to-r from-blue-600 to-cyan-600 hover:from-blue-700 hover:to-cyan-700 text-white font-extrabold text-xs flex items-center justify-center gap-2 shadow-md shadow-blue-500/20 transition-all hover:scale-[1.01] border border-cyan-400/30">
                        <i data-lucide="clipboard-check" class="w-4 h-4 text-cyan-100 group-hover:scale-110 transition-transform"></i>
                        Làm Bài Test Đầu Vào
                    </a>

                    <!-- CTA 3: Vào phòng học tương tác -->
                    <a href="{{ route('learning_hub.index') }}" class="group px-3.5 py-2.5 rounded-xl bg-white hover:bg-cyan-50 text-teal-950 border border-teal-300 font-extrabold text-xs flex items-center justify-center gap-2 shadow-sm transition-all hover:scale-[1.01]">
                        <i data-lucide="monitor-play" class="w-4 h-4 text-teal-600 group-hover:scale-110 transition-transform"></i>
                        Vào Phòng Học Tương Tác
                    </a>

                    <!-- CTA 4: Đăng ký thi thử B1 VSTEP online Sáng CN -->
                    <button onclick="openModal('vstepModal')" class="group px-3.5 py-2.5 rounded-xl bg-gradient-to-r from-amber-400 via-teal-400 to-emerald-400 hover:from-amber-500 hover:to-emerald-500 text-slate-950 font-extrabold text-xs flex items-center justify-center gap-2 shadow-md shadow-teal-500/15 transition-all hover:scale-[1.01] border border-teal-300/40">
                        <i data-lucide="award" class="w-4 h-4 text-slate-950 group-hover:scale-110 transition-transform"></i>
                        Thi B1 VSTEP (Sáng CN)
                    </button>
                </div>

                <p class="text-[11px] text-teal-700 font-semibold flex items-center gap-1.5 justify-center lg:justify-start pt-0.5">
                    <i data-lucide="calendar-check" class="w-3.5 h-3.5 text-teal-600"></i>
                    <span>Tổ chức thi thử B1 VSTEP Online <strong>mỗi sáng Chủ Nhật hàng tuần</strong>.</span>
                </p>

                <!-- Highlight Stats Chips -->
                <div class="pt-1 flex flex-wrap items-center justify-center lg:justify-start gap-2.5 text-[11px] text-slate-700">
                    <div class="flex items-center gap-2 bg-white/90 backdrop-blur-md px-3 py-1.5 rounded-xl border border-sky-200 shadow-sm">
                        <i data-lucide="clock-10" class="w-3.5 h-3.5 text-sky-600"></i>
                        <span class="font-extrabold text-slate-900 font-heading">15+ Năm</span> Kinh nghiệm
                    </div>

                    <div class="flex items-center gap-2 bg-white/90 backdrop-blur-md px-3 py-1.5 rounded-xl border border-teal-200 shadow-sm">
                        <i data-lucide="award" class="w-3.5 h-3.5 text-teal-600"></i>
                        <span class="font-extrabold text-slate-900 font-heading">B1 VSTEP / IELTS</span> Chuẩn hóa
                    </div>

                    <div class="flex items-center gap-2 bg-white/90 backdrop-blur-md px-3 py-1.5 rounded-xl border border-emerald-200 shadow-sm">
                        <i data-lucide="cpu" class="w-3.5 h-3.5 text-emerald-600"></i>
                        <span class="font-extrabold text-slate-900 font-heading">Công Cụ AI</span> Tương tác HTML
                    </div>
                </div>

            </div>

            <!-- Right Column: Replacement with About / Pedagogy & History Card -->
            <div class="lg:col-span-6">
                <div class="bg-gradient-to-br from-white via-white to-cyan-50/40 backdrop-blur-xl rounded-2xl p-5 text-slate-900 border-2 border-cyan-200/90 shadow-xl space-y-4 relative">
                    
                    <!-- Header Badge -->
                    <div class="flex items-center justify-between border-b border-cyan-100 pb-3">
                        <div class="flex items-center gap-2">
                            <div class="w-8 h-8 rounded-xl bg-gradient-to-tr from-blue-600 via-cyan-500 to-emerald-500 text-white flex items-center justify-center font-extrabold shadow-sm">
                                <i data-lucide="graduation-cap" class="w-4 h-4"></i>
                            </div>
                            <div>
                                <h3 class="font-extrabold text-sm text-slate-900 font-heading">Lịch Sử & Uy Tín Giảng Dạy</h3>
                                <p class="text-[10px] text-teal-700 font-semibold">Hơn 15 năm đào tạo thế hệ trẻ thành tài</p>
                            </div>
                        </div>
                        <span class="px-2.5 py-1 bg-teal-100 text-teal-900 border border-teal-300 rounded-full text-[10px] font-mono font-bold">
                            EST. 2011
                        </span>
                    </div>

                    <!-- Inspiring Quote Box -->
                    <div class="p-3.5 rounded-xl bg-gradient-to-br from-sky-50/90 via-teal-50/60 to-emerald-50/50 border border-teal-200/80 space-y-2">
                        <div class="flex items-start gap-2 text-teal-800">
                            <i data-lucide="quote" class="w-5 h-5 text-teal-600 shrink-0 mt-0.5"></i>
                            <p class="text-xs font-bold leading-relaxed italic text-slate-800">
                                "Tiếng Anh không phải là một môn học thuộc lòng, mà là một kỹ năng cần được luyện tập và phản xạ thông qua trải nghiệm thực tế."
                            </p>
                        </div>
                    </div>

                    <!-- 3 Core Pedagogy Strengths -->
                    <div class="space-y-2 text-xs">
                        <div class="p-2.5 rounded-xl bg-white border border-sky-100 hover:border-cyan-300 transition-all flex items-start gap-2.5 shadow-sm">
                            <div class="w-7 h-7 rounded-lg bg-sky-100 text-sky-700 flex items-center justify-center font-bold shrink-0">
                                <i data-lucide="history" class="w-3.5 h-3.5"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-slate-900 text-[11px] font-heading">Hành Trình 15+ Năm Đào Tạo</h4>
                                <p class="text-[10px] text-slate-500 leading-snug">Dẫn dắt hàng ngàn học viên, sinh viên vượt qua rào cản tiếng Anh, đạt chứng chỉ VSTEP B1 & IELTS quốc tế.</p>
                            </div>
                        </div>

                        <div class="p-2.5 rounded-xl bg-white border border-teal-100 hover:border-teal-300 transition-all flex items-start gap-2.5 shadow-sm">
                            <div class="w-7 h-7 rounded-lg bg-teal-100 text-teal-700 flex items-center justify-center font-bold shrink-0">
                                <i data-lucide="bot" class="w-3.5 h-3.5"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-slate-900 text-[11px] font-heading">Học Tập Suốt Đời Cùng Công Cụ AI</h4>
                                <p class="text-[10px] text-slate-500 leading-snug">Tích hợp bài học HTML 4.0 và trợ lý AI giúp tạo môi trường tự luyện phản xạ liên tục mọi lúc mọi nơi.</p>
                            </div>
                        </div>

                        <div class="p-2.5 rounded-xl bg-white border border-amber-100 hover:border-amber-300 transition-all flex items-start gap-2.5 shadow-sm">
                            <div class="w-7 h-7 rounded-lg bg-amber-100 text-amber-800 flex items-center justify-center font-bold shrink-0">
                                <i data-lucide="calendar" class="w-3.5 h-3.5"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-slate-900 text-[11px] font-heading">Thi Thử Online Sáng Chủ Nhật</h4>
                                <p class="text-[10px] text-slate-500 leading-snug">Thi thử B1 VSTEP định kỳ online vào 8h00 sáng CN giúp học viên cọ xát áp lực phòng thi thật.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Footer Link inside Card -->
                    <div class="pt-1 flex items-center justify-between text-[11px] text-slate-500">
                        <span class="flex items-center gap-1"><i data-lucide="shield-check" class="w-3.5 h-3.5 text-teal-600"></i> Cam kết chuẩn đầu ra</span>
                        <a href="{{ route('about') }}" class="text-teal-700 hover:underline font-bold text-[10px] flex items-center gap-1">
                            Đọc thêm về trung tâm <i data-lucide="arrow-right" class="w-3 h-3"></i>
                        </a>
                    </div>

                </div>
            </div>

        </div>
    </div>
</section>

<!-- USP Section (Compact 4-Column Feature Grid) -->
<section class="py-8 bg-white border-b border-cyan-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="flex flex-col sm:flex-row sm:items-center justify-between mb-6 gap-2">
            <div>
                <span class="px-3 py-0.5 bg-gradient-to-r from-sky-100 to-teal-100 text-teal-950 rounded-full text-[10px] font-bold uppercase tracking-widest border border-teal-300/80">
                    ĐIỂM NỔI BẬT KHÁC BIỆT
                </span>
                <h2 class="text-xl sm:text-2xl font-extrabold text-slate-900 mt-1 font-heading">Tại Sao Chọn Fly High English?</h2>
            </div>
            <p class="text-slate-500 text-xs max-w-md">Phương pháp học tương tác chủ động kết hợp bài học HTML 4.0 trực quan</p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
            
            <!-- Card 1 -->
            <div class="p-4 rounded-2xl bg-gradient-to-br from-white to-sky-50/40 border border-sky-200/80 hover:border-sky-400 hover:shadow-md transition-all flex flex-col justify-between group">
                <div>
                    <div class="w-10 h-10 rounded-xl bg-sky-100 text-sky-700 flex items-center justify-center mb-3 group-hover:bg-cyan-600 group-hover:text-white transition-colors">
                        <i data-lucide="code-2" class="w-5 h-5"></i>
                    </div>
                    <h3 class="font-bold text-slate-900 text-sm mb-1 font-heading">Bài Học HTML Tương Tác</h3>
                    <p class="text-[11px] text-slate-500 leading-relaxed">
                        Thiết kế dạng web HTML tương tác với âm thanh IPA chuẩn, thao tác kéo thả và trắc nghiệm phản xạ.
                    </p>
                </div>
                <div class="mt-3 pt-2 border-t border-sky-100 flex items-center text-[11px] font-bold text-sky-700">
                    Khám phá LMS <i data-lucide="arrow-right" class="w-3.5 h-3.5 ml-1"></i>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="p-4 rounded-2xl bg-gradient-to-br from-white to-teal-50/40 border border-teal-200/80 hover:border-teal-400 hover:shadow-md transition-all flex flex-col justify-between group">
                <div>
                    <div class="w-10 h-10 rounded-xl bg-teal-100 text-teal-700 flex items-center justify-center mb-3 group-hover:bg-teal-600 group-hover:text-white transition-colors">
                        <i data-lucide="award" class="w-5 h-5"></i>
                    </div>
                    <h3 class="font-bold text-slate-900 text-sm mb-1 font-heading">Giảng Viên 15+ Năm Kinh Nghiệm</h3>
                    <p class="text-[11px] text-slate-500 leading-relaxed">
                        Đội ngũ thầy cô tận tâm, sửa bài Nói - Viết chi tiết và hỗ trợ giải đáp 1-1 qua Zalo 0907294800.
                    </p>
                </div>
                <div class="mt-3 pt-2 border-t border-teal-100 flex items-center text-[11px] font-bold text-teal-700">
                    Xem thầy cô <i data-lucide="arrow-right" class="w-3.5 h-3.5 ml-1"></i>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="p-4 rounded-2xl bg-gradient-to-br from-white to-cyan-50/40 border border-cyan-200/80 hover:border-cyan-400 hover:shadow-md transition-all flex flex-col justify-between group">
                <div>
                    <div class="w-10 h-10 rounded-xl bg-cyan-100 text-cyan-700 flex items-center justify-center mb-3 group-hover:bg-cyan-600 group-hover:text-white transition-colors">
                        <i data-lucide="map" class="w-5 h-5"></i>
                    </div>
                    <h3 class="font-bold text-slate-900 text-sm mb-1 font-heading">Lộ Trình Cá Nhân Hóa</h3>
                    <p class="text-[11px] text-slate-500 leading-relaxed">
                        Bài test xếp đúng lớp, tối ưu thời gian học theo mục tiêu VSTEP B1, IELTS hoặc Giao Tiếp.
                    </p>
                </div>
                <div class="mt-3 pt-2 border-t border-cyan-100 flex items-center text-[11px] font-bold text-cyan-700">
                    Test trình độ <i data-lucide="arrow-right" class="w-3.5 h-3.5 ml-1"></i>
                </div>
            </div>

            <!-- Card 4 -->
            <div class="p-4 rounded-2xl bg-gradient-to-br from-white to-emerald-50/40 border border-emerald-200/80 hover:border-emerald-400 hover:shadow-md transition-all flex flex-col justify-between group">
                <div>
                    <div class="w-10 h-10 rounded-xl bg-emerald-100 text-emerald-700 flex items-center justify-center mb-3 group-hover:bg-emerald-600 group-hover:text-white transition-colors">
                        <i data-lucide="calendar" class="w-5 h-5"></i>
                    </div>
                    <h3 class="font-bold text-slate-900 text-sm mb-1 font-heading">Thi Thử B1 VSTEP Sáng CN</h3>
                    <p class="text-[11px] text-slate-500 leading-relaxed">
                        Tổ chức phòng thi thử online miến phí mỗi sáng Chủ Nhật giúp rèn luyện tâm lý thi thật.
                    </p>
                </div>
                <div class="mt-3 pt-2 border-t border-emerald-100 flex items-center text-[11px] font-bold text-emerald-700">
                    Đăng ký thi thử <i data-lucide="arrow-right" class="w-3.5 h-3.5 ml-1"></i>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- Featured Courses Section (Compact & Streamlined) -->
<section class="py-8 bg-gradient-to-b from-sky-50/30 via-teal-50/20 to-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Header & Category Filter Tabs -->
        <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between mb-6 gap-4">
            <div>
                <span class="px-3 py-0.5 bg-gradient-to-r from-sky-100 to-teal-100 text-teal-950 rounded-full text-[10px] font-bold uppercase tracking-widest border border-teal-300/80">
                    DANH SÁCH KHÓA HỌC CHÍNH
                </span>
                <h2 class="text-xl sm:text-2xl font-extrabold text-slate-900 mt-1 font-heading">Lộ Trình Đào Tạo Chuẩn Hóa</h2>
            </div>

            <!-- Segmented Category Controls -->
            <div class="flex flex-wrap items-center gap-1.5 bg-white p-1 rounded-xl border border-cyan-200 shadow-sm">
                <button onclick="filterCourses('all', this)" class="course-tab-btn px-3 py-1.5 rounded-lg text-xs font-bold transition-all bg-gradient-to-r from-blue-600 via-cyan-500 to-emerald-500 text-white shadow-sm">
                    ✨ Tất Cả
                </button>
                <button onclick="filterCourses('giao-tiep', this)" class="course-tab-btn px-3 py-1.5 rounded-lg text-xs font-bold text-slate-600 hover:bg-cyan-50 transition-all">
                    🗣️ Giao Tiếp
                </button>
                <button onclick="filterCourses('ielts', this)" class="course-tab-btn px-3 py-1.5 rounded-lg text-xs font-bold text-slate-600 hover:bg-cyan-50 transition-all">
                    🎯 IELTS 7.0+
                </button>
                <button onclick="filterCourses('toeic', this)" class="course-tab-btn px-3 py-1.5 rounded-lg text-xs font-bold text-slate-600 hover:bg-cyan-50 transition-all">
                    ⚡ TOEIC 800+
                </button>
                <button onclick="filterCourses('tre-em', this)" class="course-tab-btn px-3 py-1.5 rounded-lg text-xs font-bold text-slate-600 hover:bg-cyan-50 transition-all">
                    🎈 Trẻ Em
                </button>
            </div>
        </div>

        <!-- Course Cards Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4" id="courseGrid">
            @foreach($courses as $course)
            <div class="course-card bg-gradient-to-br from-white via-white to-cyan-50/30 rounded-2xl border border-cyan-200/80 hover:border-cyan-400 hover:shadow-md transition-all overflow-hidden flex flex-col justify-between" data-category="{{ $course->category }}">
                
                <div class="p-4 space-y-3">
                    <div class="flex items-center justify-between">
                        <span class="px-2.5 py-0.5 bg-gradient-to-r from-sky-100 to-teal-100 text-teal-950 rounded-full text-[10px] font-extrabold border border-teal-300/80">
                            {{ $course->category_label }}
                        </span>
                        <span class="text-[11px] text-slate-500 font-semibold flex items-center gap-1">
                            <i data-lucide="layers" class="w-3 h-3 text-cyan-600"></i> {{ $course->level }}
                        </span>
                    </div>

                    <div>
                        <h3 class="font-extrabold text-slate-900 text-base mb-1 font-heading line-clamp-1 hover:text-teal-600 transition-colors">
                            <a href="{{ route('courses.show', $course->slug) }}">
                                {{ $course->title }}
                            </a>
                        </h3>

                        <p class="text-[11px] text-slate-500 line-clamp-2 leading-relaxed">
                            {{ $course->description }}
                        </p>
                    </div>

                    <!-- Mini Features Checklist -->
                    <div class="pt-1.5 border-t border-slate-100 space-y-1 text-[11px] text-slate-600">
                        <div class="flex items-center gap-1.5">
                            <i data-lucide="check-circle-2" class="w-3 h-3 text-teal-600 shrink-0"></i>
                            <span>Bài học HTML tương tác 4D</span>
                        </div>
                        <div class="flex items-center gap-1.5">
                            <i data-lucide="check-circle-2" class="w-3 h-3 text-teal-600 shrink-0"></i>
                            <span>Sửa bài trực tiếp với thầy cô</span>
                        </div>
                    </div>
                </div>

                <div class="px-4 py-2.5 bg-gradient-to-r from-sky-50/50 to-teal-50/50 border-t border-cyan-100 flex items-center justify-between">
                    <div>
                        <span class="text-[9px] text-slate-400 block uppercase font-bold">Học phí</span>
                        <span class="text-sm font-black text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-teal-600 font-heading">{{ number_format($course->price) }} đ</span>
                    </div>
                    <a href="{{ route('courses.show', $course->slug) }}" class="px-3 py-1.5 bg-gradient-to-r from-sky-600 via-teal-600 to-emerald-600 hover:from-sky-700 hover:to-emerald-700 text-white rounded-lg text-xs font-bold transition-all shadow-sm flex items-center gap-1">
                        Lộ Trình <i data-lucide="chevron-right" class="w-3 h-3"></i>
                    </a>
                </div>

            </div>
            @endforeach
        </div>

        <div class="mt-6 text-center">
            <a href="{{ route('courses.index') }}" class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl bg-white border border-cyan-200 hover:bg-cyan-50 text-slate-900 text-xs font-extrabold shadow-sm transition-all">
                Xem Tất Cả Lộ Trình Chi Tiết <i data-lucide="arrow-right" class="w-3.5 h-3.5 text-teal-600"></i>
            </a>
        </div>

    </div>
</section>

<!-- Interactive HTML Lesson Preview Section (Compact Row) -->
@if($previewLessons->count() > 0)
<section class="py-8 bg-white border-t border-cyan-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="flex items-center justify-between mb-5">
            <div>
                <span class="px-3 py-0.5 bg-gradient-to-r from-sky-100 to-teal-100 text-teal-950 rounded-full text-[10px] font-extrabold uppercase tracking-widest border border-teal-300/80">
                    INTERACTIVE HTML LESSON PREVIEW
                </span>
                <h2 class="text-xl font-extrabold text-slate-900 mt-1 font-heading">Học Thử Bài Học HTML Free</h2>
            </div>
            <span class="text-xs text-slate-500 hidden sm:inline">Trải nghiệm bài học tương tác không cần đăng nhập</span>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            @foreach($previewLessons as $pLesson)
            <div class="p-5 rounded-2xl bg-gradient-to-br from-white via-cyan-50/20 to-teal-50/20 border border-cyan-200/80 hover:border-cyan-400 hover:shadow-md transition-all flex flex-col justify-between space-y-4">
                <div class="space-y-2">
                    <div class="flex items-center justify-between">
                        <span class="text-[10px] font-extrabold text-teal-950 bg-teal-100 px-2.5 py-0.5 rounded-full border border-teal-300/80">
                            {{ $pLesson->level_or_week }}
                        </span>
                        <span class="px-2 py-0.5 bg-amber-100 text-amber-800 text-[9px] font-extrabold rounded-full border border-amber-300 flex items-center gap-1">
                            <i data-lucide="sparkles" class="w-3 h-3"></i> FREE PREVIEW
                        </span>
                    </div>

                    <h3 class="font-extrabold text-slate-900 text-base font-heading leading-snug">{{ $pLesson->title }}</h3>
                    <p class="text-xs text-slate-500 leading-relaxed line-clamp-2">{{ $pLesson->description }}</p>
                </div>

                <div class="pt-3 border-t border-cyan-100 flex items-center justify-between">
                    <span class="text-xs text-slate-500 flex items-center gap-1 font-semibold">
                        <i data-lucide="clock" class="w-3.5 h-3.5 text-teal-600"></i> 15 Phút
                    </span>
                    <a href="{{ route('lessons.show', $pLesson->id) }}" class="px-4 py-2 bg-gradient-to-r from-blue-600 via-cyan-600 to-emerald-600 hover:from-blue-700 hover:to-emerald-700 text-white text-xs font-extrabold rounded-lg flex items-center gap-1.5 shadow-sm transition-all">
                        <i data-lucide="play-circle" class="w-3.5 h-3.5"></i> Học Thử Ngay
                    </a>
                </div>
            </div>
            @endforeach
        </div>

    </div>
</section>
@endif

<!-- Student Success & Testimonials Section (Compact Row) -->
<section class="py-8 bg-gradient-to-b from-slate-50 via-cyan-50/20 to-white border-t border-cyan-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="text-center max-w-2xl mx-auto mb-6 space-y-1">
            <span class="px-3 py-0.5 bg-amber-100 text-amber-900 rounded-full text-[10px] font-extrabold uppercase tracking-widest border border-amber-300">
                CẢM NHẬN THỰC TẾ
            </span>
            <h2 class="text-xl font-extrabold text-slate-900 font-heading">Học Viên Nói Gì Về Fly High English?</h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            
            <div class="p-4 rounded-2xl bg-white border border-sky-200/80 hover:border-sky-300 shadow-sm transition-all space-y-3">
                <div class="flex items-center justify-between">
                    <div class="flex text-amber-400 gap-0.5">
                        <i data-lucide="star" class="w-3.5 h-3.5 fill-amber-400"></i>
                        <i data-lucide="star" class="w-3.5 h-3.5 fill-amber-400"></i>
                        <i data-lucide="star" class="w-3.5 h-3.5 fill-amber-400"></i>
                        <i data-lucide="star" class="w-3.5 h-3.5 fill-amber-400"></i>
                        <i data-lucide="star" class="w-3.5 h-3.5 fill-amber-400"></i>
                    </div>
                    <span class="px-2 py-0.5 bg-sky-100 text-sky-900 text-[9px] font-extrabold rounded-full border border-sky-300">VSTEP B1</span>
                </div>
                <p class="text-xs text-slate-600 leading-relaxed italic line-clamp-3">
                    "Mình cần gấp bằng VSTEP B1 để bảo vệ thạc sĩ. Nhờ bài học HTML ngắn gọn và thầy cô hỗ trợ chấm bài Nói Viết liên tục qua Zalo, mình đã đỗ ngay lần đầu!"
                </p>
                <div class="flex items-center gap-2.5 pt-2 border-t border-slate-100">
                    <div class="w-8 h-8 rounded-full bg-sky-100 text-sky-700 font-extrabold flex items-center justify-center text-xs font-heading">
                        TH
                    </div>
                    <div>
                        <h4 class="text-xs font-bold text-slate-900 font-heading">Trần Hoàng Nam</h4>
                        <span class="text-[9px] text-slate-400 block">Học viên tháng 5/2026</span>
                    </div>
                </div>
            </div>

            <div class="p-4 rounded-2xl bg-white border border-teal-200/80 hover:border-teal-300 shadow-sm transition-all space-y-3">
                <div class="flex items-center justify-between">
                    <div class="flex text-amber-400 gap-0.5">
                        <i data-lucide="star" class="w-3.5 h-3.5 fill-amber-400"></i>
                        <i data-lucide="star" class="w-3.5 h-3.5 fill-amber-400"></i>
                        <i data-lucide="star" class="w-3.5 h-3.5 fill-amber-400"></i>
                        <i data-lucide="star" class="w-3.5 h-3.5 fill-amber-400"></i>
                        <i data-lucide="star" class="w-3.5 h-3.5 fill-amber-400"></i>
                    </div>
                    <span class="px-2 py-0.5 bg-teal-100 text-teal-900 text-[9px] font-extrabold rounded-full border border-teal-300">IELTS 7.5</span>
                </div>
                <p class="text-xs text-slate-600 leading-relaxed italic line-clamp-3">
                    "Phòng học HTML rất hiện đại, phần nghe có tích hợp sẵn IPA audio bấm phát tức thì. Giúp mình tăng từ 6.0 lên 7.5 chỉ sau 3 tháng."
                </p>
                <div class="flex items-center gap-2.5 pt-2 border-t border-slate-100">
                    <div class="w-8 h-8 rounded-full bg-teal-100 text-teal-700 font-extrabold flex items-center justify-center text-xs font-heading">
                        MY
                    </div>
                    <div>
                        <h4 class="text-xs font-bold text-slate-900 font-heading">Nguyễn Minh Yến</h4>
                        <span class="text-[9px] text-slate-400 block">Sinh viên ĐHQG Hà Nội</span>
                    </div>
                </div>
            </div>

            <div class="p-4 rounded-2xl bg-white border border-cyan-200/80 hover:border-cyan-300 shadow-sm transition-all space-y-3">
                <div class="flex items-center justify-between">
                    <div class="flex text-amber-400 gap-0.5">
                        <i data-lucide="star" class="w-3.5 h-3.5 fill-amber-400"></i>
                        <i data-lucide="star" class="w-3.5 h-3.5 fill-amber-400"></i>
                        <i data-lucide="star" class="w-3.5 h-3.5 fill-amber-400"></i>
                        <i data-lucide="star" class="w-3.5 h-3.5 fill-amber-400"></i>
                        <i data-lucide="star" class="w-3.5 h-3.5 fill-amber-400"></i>
                    </div>
                    <span class="px-2 py-0.5 bg-cyan-100 text-cyan-900 text-[9px] font-extrabold rounded-full border border-cyan-300">Giao Tiếp</span>
                </div>
                <p class="text-xs text-slate-600 leading-relaxed italic line-clamp-3">
                    "Website Fly High lưu tiến độ tự động nên mình học 15 phút mỗi tối. Giờ mình tự tin họp và thuyết trình Tiếng Anh với sếp nước ngoài."
                </p>
                <div class="flex items-center gap-2.5 pt-2 border-t border-slate-100">
                    <div class="w-8 h-8 rounded-full bg-cyan-100 text-cyan-800 font-extrabold flex items-center justify-center text-xs font-heading">
                        LQ
                    </div>
                    <div>
                        <h4 class="text-xs font-bold text-slate-900 font-heading">Lê Quốc Khánh</h4>
                        <span class="text-[9px] text-slate-400 block">Kỹ sư phần mềm</span>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- Floating Feedback / AI Assistant Widget (Bottom Left) -->
<div class="fixed bottom-5 left-5 z-40">
    <div class="relative group">
        <button onclick="toggleFloatingPanel()" class="w-12 h-12 rounded-2xl bg-gradient-to-tr from-blue-600 via-cyan-500 via-teal-500 to-emerald-400 text-white flex items-center justify-center shadow-lg shadow-cyan-500/25 hover:scale-105 transition-all border border-cyan-300/40">
            <i data-lucide="bot" class="w-6 h-6"></i>
            <span class="absolute -top-1 -right-1 w-3 h-3 bg-amber-400 border-2 border-white rounded-full"></span>
        </button>

        <!-- Expandable Assistant Menu Panel -->
        <div id="floatingPanel" class="hidden absolute bottom-14 left-0 w-64 bg-white rounded-2xl p-4 shadow-xl border border-cyan-200 space-y-2.5 animate-in fade-in slide-in-from-bottom-2 duration-200">
            <div class="flex items-center justify-between border-b border-cyan-100 pb-2">
                <div class="flex items-center gap-1.5">
                    <div class="w-6 h-6 rounded-md bg-cyan-100 text-cyan-700 flex items-center justify-center font-bold">
                        <i data-lucide="sparkles" class="w-3.5 h-3.5"></i>
                    </div>
                    <span class="text-xs font-extrabold text-slate-900 font-heading">Hỗ Trợ FlyHigh</span>
                </div>
                <button onclick="toggleFloatingPanel()" class="text-slate-400 hover:text-slate-600 p-1">
                    <i data-lucide="x" class="w-3.5 h-3.5"></i>
                </button>
            </div>

            <p class="text-[10px] text-slate-500">Bạn cần tư vấn khóa học nào hôm nay?</p>

            <div class="space-y-1.5">
                <button onclick="openModal('zaloModal'); toggleFloatingPanel();" class="w-full p-2 bg-cyan-50 hover:bg-cyan-100 text-cyan-900 text-xs font-bold rounded-lg text-left flex items-center gap-2 transition-colors">
                    <i data-lucide="message-circle" class="w-3.5 h-3.5 text-cyan-600"></i> Tư vấn Zalo: 0907294800
                </button>
                <a href="{{ route('placement_test.index') }}" class="w-full p-2 bg-teal-50 hover:bg-teal-100 text-teal-900 text-xs font-bold rounded-lg text-left flex items-center gap-2 transition-colors">
                    <i data-lucide="target" class="w-3.5 h-3.5 text-teal-600"></i> Test trình độ online (Free)
                </a>
                <button onclick="openModal('vstepModal'); toggleFloatingPanel();" class="w-full p-2 bg-amber-50 hover:bg-amber-100 text-amber-900 text-xs font-bold rounded-lg text-left flex items-center gap-2 transition-colors">
                    <i data-lucide="award" class="w-3.5 h-3.5 text-amber-600"></i> Đăng ký thi B1 VSTEP
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
            t.className = 'course-tab-btn px-3 py-1.5 rounded-lg text-xs font-bold text-slate-600 hover:bg-cyan-50 transition-all';
        });
        btn.className = 'course-tab-btn px-3 py-1.5 rounded-lg text-xs font-bold transition-all bg-gradient-to-r from-blue-600 via-cyan-500 to-emerald-500 text-white shadow-sm';

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

    // Floating assistant toggle
    function toggleFloatingPanel() {
        const panel = document.getElementById('floatingPanel');
        panel.classList.toggle('hidden');
    }
</script>
@endsection
