@extends('layouts.app')

@section('title', 'Fly High English - Trung Tâm Đào Tạo Tiếng Anh Tương Tác & Luyện Thi B1 VSTEP, IELTS')

@section('content')

<!-- 1. HERO SECTION - Clean Academic Blue & Slate Theme -->
<section class="bg-white border-b border-slate-200 py-10 sm:py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
            
            <!-- Left Hero Content -->
            <div class="lg:col-span-7 space-y-5 text-left">
                
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-md bg-blue-50 border border-blue-200 text-blue-800 text-xs font-semibold">
                    <i data-lucide="shield-check" class="w-4 h-4 text-blue-600"></i>
                    <span>HỆ THỐNG ĐÀO TẠO TIẾNG ANH TƯƠNG TÁC FLY HIGH</span>
                </div>

                <h1 class="text-3xl sm:text-4xl font-extrabold tracking-tight text-slate-900 font-heading leading-tight">
                    Nâng Tầm Tiếng Anh - Bứt Phá Lộ Trình <span class="text-blue-600">VSTEP B1 & IELTS</span>
                </h1>

                <p class="text-slate-600 text-sm leading-relaxed max-w-2xl font-normal">
                    Fly High English kết hợp phương pháp giảng dạy phản xạ trực quan với hệ thống **bài học HTML 4.0 tương tác**. Giúp học viên dễ dàng theo dõi tiến độ, thực hành 4 kỹ năng và sẵn sàng chinh phục các kỳ thi chuẩn hóa quốc gia & quốc tế.
                </p>

                <!-- 4 Primary Action CTAs -->
                <div class="pt-2 grid grid-cols-1 sm:grid-cols-2 gap-3 max-w-xl">
                    <!-- CTA 1: Zalo Trial -->
                    <button onclick="openModal('zaloModal')" class="px-4 py-3 rounded-lg bg-blue-600 hover:bg-blue-700 text-white font-bold text-xs flex items-center justify-center gap-2 shadow-sm transition-all">
                        <i data-lucide="message-circle" class="w-4 h-4"></i>
                        Đăng Ký Tư Vấn Zalo: 0907294800
                    </button>

                    <!-- CTA 3: Courses List -->
                    <a href="{{ route('courses.index') }}" class="px-4 py-3 rounded-lg bg-slate-100 hover:bg-slate-200 text-slate-800 font-bold text-xs flex items-center justify-center gap-2 border border-slate-300 transition-all">
                        <i data-lucide="book-open" class="w-4 h-4 text-slate-600"></i>
                        Xem Danh Sách Khóa Học
                    </a>

                    <!-- CTA 4: Sunday VSTEP Exam -->
                    <button onclick="openModal('vstepModal')" class="px-4 py-3 rounded-lg bg-amber-50 hover:bg-amber-100 text-amber-900 border border-amber-300 font-bold text-xs flex items-center justify-center gap-2 transition-all">
                        <i data-lucide="award" class="w-4 h-4 text-amber-600"></i>
                        Thi Thử B1 VSTEP (Sáng CN)
                    </button>
                </div>

                <!-- Sub-info note -->
                <div class="pt-1 flex items-center gap-2 text-xs text-slate-500 font-medium">
                    <i data-lucide="check-circle-2" class="w-4 h-4 text-blue-600"></i>
                    <span>Tổ chức thi thử B1 VSTEP Online định kỳ <strong>8h00 sáng Chủ Nhật hàng tuần</strong>.</span>
                </div>

            </div>

            <!-- Right Hero Card: Institutional Credentials -->
            <div class="lg:col-span-5">
                <div class="bg-slate-50 rounded-xl p-6 border border-slate-200 space-y-4">
                    
                    <div class="flex items-center justify-between border-b border-slate-200 pb-3">
                        <div class="flex items-center gap-2.5">
                            <div class="w-9 h-9 rounded-lg bg-blue-600 text-white flex items-center justify-center font-bold">
                                <i data-lucide="building-2" class="w-5 h-5"></i>
                            </div>
                            <div>
                                <h3 class="font-bold text-sm text-slate-900 font-heading">Thông Tin Trung Tâm</h3>
                                <p class="text-xs text-slate-500">Hơn 15 năm uy tín giảng dạy</p>
                            </div>
                        </div>
                        <span class="px-2.5 py-1 bg-slate-200 text-slate-800 rounded text-xs font-mono font-bold">
                            EST. 2011
                        </span>
                    </div>

                    <!-- Core highlights list -->
                    <div class="space-y-3 text-xs">
                        <div class="p-3 rounded-lg bg-white border border-slate-200 flex items-start gap-3">
                            <div class="w-7 h-7 rounded bg-blue-50 text-blue-600 flex items-center justify-center font-bold shrink-0 mt-0.5">
                                <i data-lucide="award" class="w-4 h-4"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-slate-900 text-xs font-heading">15+ Năm Kinh Nghiệm Luyện Thi</h4>
                                <p class="text-slate-500 leading-snug mt-0.5">Đã đồng hành và hỗ trợ hàng ngàn học viên vượt qua các kỳ thi VSTEP B1, IELTS và Giao tiếp.</p>
                            </div>
                        </div>

                        <div class="p-3 rounded-lg bg-white border border-slate-200 flex items-start gap-3">
                            <div class="w-7 h-7 rounded bg-blue-50 text-blue-600 flex items-center justify-center font-bold shrink-0 mt-0.5">
                                <i data-lucide="code-2" class="w-4 h-4"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-slate-900 text-xs font-heading">Mô Hình Bài Học HTML 4.0</h4>
                                <p class="text-slate-500 leading-snug mt-0.5">Tích hợp âm thanh phát âm chuẩn, trắc nghiệm phản xạ và theo dõi lộ trình học cá nhân.</p>
                            </div>
                        </div>

                        <div class="p-3 rounded-lg bg-white border border-slate-200 flex items-start gap-3">
                            <div class="w-7 h-7 rounded bg-blue-50 text-blue-600 flex items-center justify-center font-bold shrink-0 mt-0.5">
                                <i data-lucide="user-check" class="w-4 h-4"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-slate-900 text-xs font-heading">Sửa Bài Nói - Viết 1-1 Chi Tiết</h4>
                                <p class="text-slate-500 leading-snug mt-0.5">Giảng viên trực tiếp sửa lỗi bài tập và hỗ trợ tư vấn qua Zalo 0907.294.800 trong suốt khóa học.</p>
                            </div>
                        </div>
                    </div>

                    <div class="pt-2 border-t border-slate-200 flex items-center justify-between text-xs text-slate-500">
                        <span class="flex items-center gap-1 font-medium"><i data-lucide="shield-check" class="w-4 h-4 text-blue-600"></i> Cam kết chuẩn đầu ra</span>
                        <a href="{{ route('about') }}" class="text-blue-600 hover:underline font-bold flex items-center gap-1">
                            Xem chi tiết trung tâm <i data-lucide="arrow-right" class="w-3.5 h-3.5"></i>
                        </a>
                    </div>

                </div>
            </div>

        </div>
    </div>
</section>

<!-- 2. KEY STATISTICS BAR -->
<section class="py-6 bg-slate-900 text-white border-b border-slate-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6 text-center">
            <div class="space-y-1">
                <p class="text-2xl sm:text-3xl font-extrabold text-blue-400 font-heading">15+ Năm</p>
                <p class="text-xs text-slate-400 font-medium">Kinh nghiệm đào tạo</p>
            </div>
            <div class="space-y-1">
                <p class="text-2xl sm:text-3xl font-extrabold text-blue-400 font-heading">5.000+</p>
                <p class="text-xs text-slate-400 font-medium">Học viên tin tưởng</p>
            </div>
            <div class="space-y-1">
                <p class="text-2xl sm:text-3xl font-extrabold text-blue-400 font-heading">98%</p>
                <p class="text-xs text-slate-400 font-medium">Tỷ lệ đạt B1 / IELTS target</p>
            </div>
            <div class="space-y-1">
                <p class="text-2xl sm:text-3xl font-extrabold text-blue-400 font-heading">100+</p>
                <p class="text-xs text-slate-400 font-medium">Bài học HTML tương tác</p>
            </div>
        </div>
    </div>
</section>

<!-- 3. CORE STRENGTHS & FEATURES -->
<section class="py-10 bg-slate-50 border-b border-slate-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="text-center max-w-2xl mx-auto mb-8 space-y-1">
            <span class="text-xs font-bold text-blue-600 uppercase tracking-wider">Ưu Điểm Nổi Bật</span>
            <h2 class="text-2xl font-extrabold text-slate-900 font-heading">Tại Sao Học Viên Chọn Fly High English?</h2>
            <p class="text-xs text-slate-600">Phương pháp học hiện đại kết hợp bài học tương tác trực quan và hỗ trợ sát sao</p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
            
            <div class="p-5 rounded-xl bg-white border border-slate-200 hover:border-blue-400 transition-all space-y-3">
                <div class="w-10 h-10 rounded-lg bg-blue-50 text-blue-600 flex items-center justify-center font-bold">
                    <i data-lucide="layout" class="w-5 h-5"></i>
                </div>
                <h3 class="font-bold text-slate-900 text-sm font-heading">Bài Học HTML Tương Tác</h3>
                <p class="text-xs text-slate-500 leading-relaxed">
                    Nội dung bài học dạng HTML trực quan, nghe audio chuẩn IPA, làm bài tập trắc nghiệm & phản xạ trực tiếp trên trình duyệt.
                </p>
            </div>

            <div class="p-5 rounded-xl bg-white border border-slate-200 hover:border-blue-400 transition-all space-y-3">
                <div class="w-10 h-10 rounded-lg bg-blue-50 text-blue-600 flex items-center justify-center font-bold">
                    <i data-lucide="users" class="w-5 h-5"></i>
                </div>
                <h3 class="font-bold text-slate-900 text-sm font-heading">Giảng Viên 15+ Năm Chuyên Môn</h3>
                <p class="text-xs text-slate-500 leading-relaxed">
                    Đội ngũ thầy cô giàu kinh nghiệm, trực tiếp chấm bài Speaking - Writing và giải đáp thắc mắc 1-1 qua Zalo.
                </p>
            </div>

            <div class="p-5 rounded-xl bg-white border border-slate-200 hover:border-blue-400 transition-all space-y-3">
                <div class="w-10 h-10 rounded-lg bg-blue-50 text-blue-600 flex items-center justify-center font-bold">
                    <i data-lucide="target" class="w-5 h-5"></i>
                </div>
                <h3 class="font-bold text-slate-900 text-sm font-heading">Lộ Trình Đào Tạo Rõ Ràng</h3>
                <p class="text-xs text-slate-500 leading-relaxed">
                    Đánh giá đúng trình độ qua bài test xếp lớp, tối ưu thời gian học theo mục tiêu VSTEP B1, IELTS hoặc Giao Tiếp.
                </p>
            </div>

            <div class="p-5 rounded-xl bg-white border border-slate-200 hover:border-blue-400 transition-all space-y-3">
                <div class="w-10 h-10 rounded-lg bg-blue-50 text-blue-600 flex items-center justify-center font-bold">
                    <i data-lucide="calendar" class="w-5 h-5"></i>
                </div>
                <h3 class="font-bold text-slate-900 text-sm font-heading">Thi Thử B1 VSTEP Sáng CN</h3>
                <p class="text-xs text-slate-500 leading-relaxed">
                    Tổ chức kỳ thi thử VSTEP online định kỳ vào sáng Chủ Nhật hàng tuần giúp học viên rèn luyện áp lực phòng thi thật.
                </p>
            </div>

        </div>
    </div>
</section>

<!-- 4. FEATURED COURSES SECTION -->
<section class="py-10 bg-white border-b border-slate-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Header & Category Filter Tabs -->
        <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between mb-8 gap-4 border-b border-slate-200 pb-4">
            <div>
                <span class="text-xs font-bold text-blue-600 uppercase tracking-wider">Chương Trình Đào Tạo</span>
                <h2 class="text-2xl font-extrabold text-slate-900 mt-0.5 font-heading">Các Khóa Học Trọng Tâm</h2>
            </div>

            <!-- Segmented Category Controls -->
            <div class="flex flex-wrap items-center gap-1.5 bg-slate-100 p-1 rounded-lg border border-slate-200">
                <button onclick="filterCourses('all', this)" class="course-tab-btn px-3 py-1.5 rounded text-xs font-bold transition-all bg-blue-600 text-white">
                    Tất Cả
                </button>
                <button onclick="filterCourses('giao-tiep', this)" class="course-tab-btn px-3 py-1.5 rounded text-xs font-bold text-slate-600 hover:bg-slate-200 transition-all">
                    Giao Tiếp
                </button>
                <button onclick="filterCourses('ielts', this)" class="course-tab-btn px-3 py-1.5 rounded text-xs font-bold text-slate-600 hover:bg-slate-200 transition-all">
                    IELTS 7.0+
                </button>
                <button onclick="filterCourses('toeic', this)" class="course-tab-btn px-3 py-1.5 rounded text-xs font-bold text-slate-600 hover:bg-slate-200 transition-all">
                    TOEIC 800+
                </button>
                <button onclick="filterCourses('tre-em', this)" class="course-tab-btn px-3 py-1.5 rounded text-xs font-bold text-slate-600 hover:bg-slate-200 transition-all">
                    Trẻ Em
                </button>
            </div>
        </div>

        <!-- Course Cards Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-5" id="courseGrid">
            @foreach($courses as $course)
            <div class="course-card bg-white rounded-xl border border-slate-200 hover:border-slate-400 hover:shadow-sm transition-all overflow-hidden flex flex-col justify-between" data-category="{{ $course->category }}">
                
                <div class="p-5 space-y-3">
                    <div class="flex items-center justify-between">
                        <span class="px-2.5 py-0.5 bg-blue-50 text-blue-700 rounded text-[11px] font-bold border border-blue-200">
                            {{ $course->category_label }}
                        </span>
                        <span class="text-xs text-slate-500 font-medium">
                            Trình độ: {{ $course->level }}
                        </span>
                    </div>

                    <div>
                        <h3 class="font-bold text-slate-900 text-base mb-1.5 font-heading hover:text-blue-600 transition-colors">
                            <a href="{{ route('courses.show', $course->slug) }}">
                                {{ $course->title }}
                            </a>
                        </h3>

                        <p class="text-xs text-slate-500 line-clamp-2 leading-relaxed">
                            {{ $course->description }}
                        </p>
                    </div>

                    <!-- Mini Highlights -->
                    <div class="pt-2 border-t border-slate-100 space-y-1 text-xs text-slate-600">
                        <div class="flex items-center gap-1.5">
                            <i data-lucide="check" class="w-3.5 h-3.5 text-blue-600 shrink-0"></i>
                            <span>Bài học tương tác HTML trực quan</span>
                        </div>
                        <div class="flex items-center gap-1.5">
                            <i data-lucide="check" class="w-3.5 h-3.5 text-blue-600 shrink-0"></i>
                            <span>Sửa bài Speaking & Writing 1-1</span>
                        </div>
                    </div>
                </div>

                <div class="px-5 py-3 bg-slate-50 border-t border-slate-200 flex items-center justify-end">
                    <a href="{{ route('courses.show', $course->slug) }}" class="w-full py-2 bg-blue-600 hover:bg-blue-700 text-white rounded text-xs font-bold transition-all flex items-center justify-center gap-1">
                        Xem Chi Tiết Bài Học <i data-lucide="chevron-right" class="w-3.5 h-3.5"></i>
                    </a>
                </div>

            </div>
            @endforeach
        </div>

        <div class="mt-8 text-center">
            <a href="{{ route('courses.index') }}" class="inline-flex items-center gap-2 px-5 py-2.5 rounded-lg bg-slate-900 hover:bg-slate-800 text-white text-xs font-bold transition-all">
                Xem Tất Cả Khóa Học & Lộ Trình Chi Tiết <i data-lucide="arrow-right" class="w-4 h-4 text-blue-400"></i>
            </a>
        </div>

    </div>
</section>

<!-- 5. INTERACTIVE HTML LESSON PREVIEW -->
@if($previewLessons->count() > 0)
<section class="py-10 bg-slate-50 border-b border-slate-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="flex items-center justify-between mb-6 border-b border-slate-200 pb-3">
            <div>
                <span class="text-xs font-bold text-blue-600 uppercase tracking-wider">Trải Nghiệm Thực Tế</span>
                <h2 class="text-2xl font-extrabold text-slate-900 mt-0.5 font-heading">Học Thử Bài Học HTML Miễn Phí</h2>
            </div>
            <span class="text-xs text-slate-500 hidden sm:inline">Trải nghiệm bài học tương tác ngay không cần đăng nhập</span>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            @foreach($previewLessons as $pLesson)
            <div class="p-5 rounded-xl bg-white border border-slate-200 hover:border-blue-400 transition-all flex flex-col justify-between space-y-4">
                <div class="space-y-2">
                    <div class="flex items-center justify-between">
                        <span class="text-xs font-bold text-blue-700 bg-blue-50 px-2.5 py-0.5 rounded border border-blue-200">
                            {{ $pLesson->level_or_week }}
                        </span>
                        <span class="px-2 py-0.5 bg-amber-100 text-amber-800 text-[10px] font-bold rounded border border-amber-300 flex items-center gap-1">
                            <i data-lucide="sparkles" class="w-3 h-3"></i> BÀI HỌC MIỄN PHÍ
                        </span>
                    </div>

                    <h3 class="font-bold text-slate-900 text-base font-heading">{{ $pLesson->title }}</h3>
                    <p class="text-xs text-slate-500 leading-relaxed line-clamp-2">{{ $pLesson->description }}</p>
                </div>

                <div class="pt-3 border-t border-slate-100 flex items-center justify-between">
                    <span class="text-xs text-slate-500 flex items-center gap-1 font-medium">
                        <i data-lucide="clock" class="w-3.5 h-3.5 text-blue-600"></i> Thời lượng: ~15 phút
                    </span>
                    <a href="{{ route('lessons.show', $pLesson->id) }}" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-xs font-bold rounded flex items-center gap-1.5 transition-all">
                        <i data-lucide="play-circle" class="w-4 h-4"></i> Học Thử Ngay
                    </a>
                </div>
            </div>
            @endforeach
        </div>

    </div>
</section>
@endif

<!-- 6. WEEKLY VSTEP B1 MOCK EXAM SPOTLIGHT -->
<section class="py-10 bg-white border-b border-slate-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-slate-900 rounded-2xl p-6 sm:p-8 text-white grid grid-cols-1 lg:grid-cols-12 gap-6 items-center">
            
            <div class="lg:col-span-8 space-y-3">
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded bg-amber-500/20 border border-amber-500/30 text-amber-400 text-xs font-bold">
                    <i data-lucide="award" class="w-4 h-4"></i> CHƯƠNG TRÌNH THI THỬ ĐỊNH KỲ
                </div>
                <h2 class="text-2xl sm:text-3xl font-extrabold font-heading text-white">
                    Thi Thử B1 VSTEP Online Sáng Chủ Nhật Hàng Tuần
                </h2>
                <p class="text-xs sm:text-sm text-slate-300 leading-relaxed max-w-2xl font-normal">
                    Được thiết kế chuẩn cấu trúc bài thi VSTEP trên máy tính của Bộ Giáo Dục & Đào Tạo. Học viên được trải nghiệm áp lực thi thực tế, nhận điểm số và nhận xét chi tiết 4 kỹ năng Nghe - Nói - Đọc - Viết từ giảng viên.
                </p>
                <div class="flex flex-wrap items-center gap-4 text-xs text-slate-300 pt-1">
                    <span class="flex items-center gap-1"><i data-lucide="clock" class="w-4 h-4 text-amber-400"></i> Thời gian: 8:00 AM Sáng CN</span>
                    <span class="flex items-center gap-1"><i data-lucide="laptop" class="w-4 h-4 text-amber-400"></i> Hình thức: Online trên máy tính</span>
                    <span class="flex items-center gap-1"><i data-lucide="file-check" class="w-4 h-4 text-amber-400"></i> Chấm bài 4 kỹ năng</span>
                </div>
            </div>

            <div class="lg:col-span-4 text-center lg:text-right">
                <button onclick="openModal('vstepModal')" class="w-full sm:w-auto px-6 py-3.5 rounded-lg bg-amber-500 hover:bg-amber-400 text-slate-950 font-extrabold text-sm transition-all shadow-md">
                    Đăng Ký Thi Thử B1 VSTEP
                </button>
            </div>

        </div>
    </div>
</section>

<!-- 7. 4-STEP LEARNING ROADMAP -->
<section class="py-10 bg-slate-50 border-b border-slate-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="text-center max-w-2xl mx-auto mb-8 space-y-1">
            <span class="text-xs font-bold text-blue-600 uppercase tracking-wider">Lộ Trình Học Tập</span>
            <h2 class="text-2xl font-extrabold text-slate-900 font-heading">Quy Trình Đào Tạo Tại Fly High English</h2>
            <p class="text-xs text-slate-600">4 bước đơn giản giúp bạn làm chủ tiếng Anh và chinh phục chứng chỉ</p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
            
            <div class="p-5 rounded-xl bg-white border border-slate-200 space-y-2 relative">
                <span class="w-7 h-7 rounded-full bg-blue-600 text-white font-extrabold text-xs flex items-center justify-center font-mono mb-2">1</span>
                <h3 class="font-bold text-slate-900 text-sm font-heading">Kiểm Tra Đầu Vào</h3>
                <p class="text-xs text-slate-500 leading-relaxed">
                    Làm bài test online 15 phút để đánh giá chính xác trình độ và phản xạ hiện tại.
                </p>
            </div>

            <div class="p-5 rounded-xl bg-white border border-slate-200 space-y-2 relative">
                <span class="w-7 h-7 rounded-full bg-blue-600 text-white font-extrabold text-xs flex items-center justify-center font-mono mb-2">2</span>
                <h3 class="font-bold text-slate-900 text-sm font-heading">Tư Vấn Lộ Trình</h3>
                <p class="text-xs text-slate-500 leading-relaxed">
                    Giảng viên liên hệ xếp lớp phù hợp với mục tiêu VSTEP, IELTS hoặc Giao tiếp.
                </p>
            </div>

            <div class="p-5 rounded-xl bg-white border border-slate-200 space-y-2 relative">
                <span class="w-7 h-7 rounded-full bg-blue-600 text-white font-extrabold text-xs flex items-center justify-center font-mono mb-2">3</span>
                <h3 class="font-bold text-slate-900 text-sm font-heading">Học Tương Tác HTML</h3>
                <p class="text-xs text-slate-500 leading-relaxed">
                    Học lý thuyết & thực hành qua các bài học HTML sinh động, lưu tiến độ tự động.
                </p>
            </div>

            <div class="p-5 rounded-xl bg-white border border-slate-200 space-y-2 relative">
                <span class="w-7 h-7 rounded-full bg-blue-600 text-white font-extrabold text-xs flex items-center justify-center font-mono mb-2">4</span>
                <h3 class="font-bold text-slate-900 text-sm font-heading">Sửa Bài & Thi Đạt</h3>
                <p class="text-xs text-slate-500 leading-relaxed">
                    Thầy cô chấm bài 1-1, tham gia thi thử định kỳ và tự tin đạt chứng chỉ mục tiêu.
                </p>
            </div>

        </div>
    </div>
</section>

<!-- 8. LATEST DOCUMENTS & SYSTEM ANNOUNCEMENTS -->
@if((isset($latestDocuments) && $latestDocuments->count() > 0) || (isset($notifications) && $notifications->count() > 0))
<section class="py-10 bg-white border-b border-slate-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
            
            <!-- Documents Column -->
            @if(isset($latestDocuments) && $latestDocuments->count() > 0)
            <div class="lg:col-span-7 space-y-4">
                <div class="flex items-center justify-between border-b border-slate-200 pb-3">
                    <div>
                        <span class="text-xs font-bold text-blue-600 uppercase tracking-wider">Tài Tài Liệu Học Tập</span>
                        <h3 class="text-xl font-bold text-slate-900 font-heading">Tài Liệu Mới Cập Nhật</h3>
                    </div>
                    <a href="{{ route('documents.index') }}" class="text-xs font-bold text-blue-600 hover:underline flex items-center gap-1">
                        Xem tất cả <i data-lucide="arrow-right" class="w-3.5 h-3.5"></i>
                    </a>
                </div>

                <div class="space-y-2.5">
                    @foreach($latestDocuments as $doc)
                    <div class="p-3.5 rounded-lg bg-slate-50 border border-slate-200 flex items-center justify-between hover:border-slate-300 transition-all">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 rounded bg-blue-100 text-blue-700 flex items-center justify-center font-bold shrink-0">
                                <i data-lucide="file-text" class="w-4 h-4"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-slate-900 text-xs font-heading hover:text-blue-600 transition-colors">
                                    <a href="{{ route('documents.show', $doc->id) }}">{{ $doc->title }}</a>
                                </h4>
                                <p class="text-[11px] text-slate-500">{{ $doc->formatted_size }} • {{ $doc->download_count }} lượt tải</p>
                            </div>
                        </div>
                        <a href="{{ route('documents.download', $doc->id) }}" class="px-3 py-1.5 bg-white border border-slate-300 hover:bg-slate-100 text-slate-800 text-xs font-bold rounded flex items-center gap-1 transition-all">
                            <i data-lucide="download" class="w-3.5 h-3.5 text-blue-600"></i> Tải về
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif

            <!-- Notifications Column -->
            @if(isset($notifications) && $notifications->count() > 0)
            <div class="lg:col-span-5 space-y-4">
                <div class="flex items-center justify-between border-b border-slate-200 pb-3">
                    <div>
                        <span class="text-xs font-bold text-blue-600 uppercase tracking-wider">Thông Báo Hệ Thống</span>
                        <h3 class="text-xl font-bold text-slate-900 font-heading">Tin Tức Mới Nhất</h3>
                    </div>
                    <a href="{{ route('notifications.index') }}" class="text-xs font-bold text-blue-600 hover:underline flex items-center gap-1">
                        Xem tất cả <i data-lucide="arrow-right" class="w-3.5 h-3.5"></i>
                    </a>
                </div>

                <div class="space-y-2.5">
                    @foreach($notifications as $noti)
                    <div class="p-3.5 rounded-lg bg-slate-50 border border-slate-200 space-y-1">
                        <div class="flex items-center justify-between">
                            <h4 class="font-bold text-slate-900 text-xs font-heading">
                                <a href="{{ route('notifications.show', $noti->id) }}" class="hover:text-blue-600">{{ $noti->title }}</a>
                            </h4>
                            @if($noti->is_pinned)
                            <span class="px-2 py-0.5 bg-amber-100 text-amber-800 text-[10px] font-bold rounded">Ghim</span>
                            @endif
                        </div>
                        <p class="text-[11px] text-slate-500 line-clamp-2 leading-relaxed">{{ Str::limit(strip_tags($noti->content), 90) }}</p>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif

        </div>
    </div>
</section>
@endif


<!-- 10. DIRECT CONSULTATION / REGISTRATION FORM ON HOMEPAGE -->
<section class="py-12 bg-white">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-slate-50 border border-slate-200 rounded-2xl p-6 sm:p-8">
            <div class="text-center max-w-xl mx-auto mb-6 space-y-1">
                <span class="text-xs font-bold text-blue-600 uppercase tracking-wider">Đăng Ký Tư Vấn Trực Tiếp</span>
                <h2 class="text-2xl font-extrabold text-slate-900 font-heading">Nhận Lộ Trình & Đăng Ký Học Thử</h2>
                <p class="text-xs text-slate-600">Để lại thông tin, tư vấn viên sẽ liên hệ xếp lớp và tư vấn miễn phí trong 15 phút</p>
            </div>

            <form action="{{ route('registrations.store') }}" method="POST" class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                @csrf
                <input type="hidden" name="type" value="zalo_trial">

                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">Họ và tên *</label>
                    <input type="text" name="name" required placeholder="Nhập họ và tên của bạn" class="w-full px-3.5 py-2.5 rounded-lg border border-slate-300 text-xs focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent">
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">Số điện thoại / Zalo *</label>
                    <input type="tel" name="phone" required placeholder="09xxxxxxx" class="w-full px-3.5 py-2.5 rounded-lg border border-slate-300 text-xs focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent">
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">Khóa học bạn quan tâm</label>
                    <select name="notes" class="w-full px-3.5 py-2.5 rounded-lg border border-slate-300 text-xs focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent bg-white">
                        <option value="Tiếng Anh Giao Tiếp">Tiếng Anh Giao Tiếp Tương Tác</option>
                        <option value="Luyện Thi VSTEP B1">Luyện Thi Chứng Chỉ VSTEP B1 / B2</option>
                        <option value="Luyện Thi IELTS">Luyện Thi IELTS Target 7.0+</option>
                        <option value="Luyện Thi TOEIC">Luyện Thi TOEIC 800+</option>
                        <option value="Tiếng Anh Cho Trẻ Em">Tiếng Anh Trẻ Em Fly High Kids</option>
                    </select>
                </div>

                <div class="flex items-end">
                    <button type="submit" class="w-full py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-bold text-xs rounded-lg shadow-sm transition-all flex items-center justify-center gap-1.5">
                        <i data-lucide="send" class="w-3.5 h-3.5"></i> Gửi Đăng Ký Tư Vấn Free
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>

@endsection

@section('scripts')
<script>
    // Category Course Tab Filtering
    function filterCourses(category, btn) {
        // Update active tab buttons visual state
        const tabs = document.querySelectorAll('.course-tab-btn');
        tabs.forEach(t => {
            t.className = 'course-tab-btn px-3 py-1.5 rounded text-xs font-bold text-slate-600 hover:bg-slate-200 transition-all';
        });
        btn.className = 'course-tab-btn px-3 py-1.5 rounded text-xs font-bold transition-all bg-blue-600 text-white';

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
</script>
@endsection
