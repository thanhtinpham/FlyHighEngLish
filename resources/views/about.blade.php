@extends('layouts.app')

@section('title', 'Giới Thiệu Trung Tâm - Fly High English')

@section('content')
<!-- Header Banner in Modern Light Style -->
<section class="bg-gradient-to-br from-emerald-50 via-teal-50/50 to-sky-50 py-16 border-b border-emerald-100/80 text-slate-900">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-3">
        <span class="px-3.5 py-1 bg-emerald-100 text-emerald-800 rounded-full text-xs font-extrabold uppercase tracking-wider border border-emerald-300">
            ABOUT FLY HIGH ENGLISH
        </span>
        <h1 class="text-4xl sm:text-5xl font-black text-slate-900 font-heading tracking-tight">Giới Thiệu Về Trung Tâm</h1>
        <p class="text-slate-600 text-sm max-w-2xl mx-auto leading-relaxed">
            Tìm hiểu lịch sử hình thành, kinh nghiệm giảng dạy cùng triết lý đào tạo tiếng Anh tương tác hiện đại.
        </p>
    </div>
</section>

<!-- Content Container -->
<section class="py-16 bg-white">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 space-y-16">
        
        <!-- Block 1: Lịch sử & Kinh nghiệm -->
        <div class="grid grid-cols-1 md:grid-cols-12 gap-8 items-center">
            <div class="md:col-span-6 space-y-4">
                <div class="w-12 h-12 rounded-2xl bg-emerald-100 text-emerald-700 flex items-center justify-center font-bold shadow-soft-sm">
                    <i data-lucide="history" class="w-6 h-6"></i>
                </div>
                <h2 class="text-2xl sm:text-3xl font-black text-slate-900 font-heading">Lịch Sử & Kinh Nghiệm Giảng Dạy</h2>
                <p class="text-slate-600 text-sm leading-relaxed">
                    Được thành lập từ năm 2018, <strong>Fly High English</strong> đã có hơn 8 năm đồng hành cùng hơn 15,000 học viên trên khắp cả nước. Trung tâm bắt đầu từ những lớp học tiếng Anh giao tiếp nhỏ và dần mở rộng quy mô thành hệ thống đào tạo Anh ngữ toàn diện cho mọi lứa tuổi và mục tiêu.
                </p>
                <p class="text-slate-600 text-sm leading-relaxed">
                    Đội ngũ giảng viên tại trung tâm đều sở hữu chứng chỉ quốc tế (TESOL, CELTA, IELTS 8.0+ / VSTEP C1) với tối thiểu 4 năm kinh nghiệm đứng lớp trực tiếp và giảng dạy trực tuyến.
                </p>
            </div>
            <div class="md:col-span-6 bg-emerald-50/50 rounded-3xl p-8 border border-emerald-100 shadow-soft">
                <div class="space-y-6">
                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 rounded-xl bg-emerald-600 text-white flex items-center justify-center shrink-0 font-bold font-heading shadow-emerald-glow">8+</div>
                        <div>
                            <h4 class="font-extrabold text-slate-900 text-base font-heading">Năm kinh nghiệm chuyên sâu</h4>
                            <p class="text-xs text-slate-500">Giảng dạy Giao tiếp, IELTS, TOEIC & VSTEP B1/B2</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 rounded-xl bg-sky-600 text-white flex items-center justify-center shrink-0 font-bold font-heading shadow-sky-glow">15k+</div>
                        <div>
                            <h4 class="font-extrabold text-slate-900 text-base font-heading">Học viên tốt nghiệp</h4>
                            <p class="text-xs text-slate-500">Đạt mục tiêu chuẩn đầu ra ra trường & thăng tiến sự nghiệp</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 rounded-xl bg-gold-500 text-slate-950 flex items-center justify-center shrink-0 font-bold font-heading shadow-gold-glow">98%</div>
                        <div>
                            <h4 class="font-extrabold text-slate-900 text-base font-heading">Tỷ lệ hài lòng cao</h4>
                            <p class="text-xs text-slate-500">Nhận xét tích cực về phương pháp bài học HTML tương tác</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Block 2: Triết lý & Phương pháp đào tạo -->
        <div class="p-8 rounded-3xl bg-slate-50/80 border border-slate-200 space-y-6">
            <div class="text-center max-w-2xl mx-auto space-y-1">
                <h2 class="text-2xl sm:text-3xl font-black text-slate-900 font-heading">Triết Lý & Phương Pháp Đào Tạo</h2>
                <p class="text-xs text-slate-500">Phương pháp Active Interactive Learning độc quyền tại Fly High English</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 pt-4">
                <div class="dashboard-card p-6 bg-white space-y-2">
                    <div class="w-10 h-10 rounded-xl bg-emerald-100 text-emerald-700 flex items-center justify-center font-bold mb-3">
                        <i data-lucide="zap" class="w-5 h-5"></i>
                    </div>
                    <h3 class="font-extrabold text-slate-900 text-base font-heading">Học Bằng Tương Tác Trực Tiếp</h3>
                    <p class="text-xs text-slate-500 leading-relaxed">Học viên không chỉ nghe giảng thụ động mà trực tiếp tương tác với các bài học web HTML, luyện tập âm thanh và giải câu đố phản xạ tại chỗ.</p>
                </div>

                <div class="dashboard-card p-6 bg-white space-y-2">
                    <div class="w-10 h-10 rounded-xl bg-sky-100 text-sky-700 flex items-center justify-center font-bold mb-3">
                        <i data-lucide="target" class="w-5 h-5"></i>
                    </div>
                    <h3 class="font-extrabold text-slate-900 text-base font-heading">Cá Nhân Hóa Tiến Độ</h3>
                    <p class="text-xs text-slate-500 leading-relaxed">Hệ thống LMS ghi nhận chính xác thời gian và kết quả làm bài của từng học viên, giúp thầy cô điều chỉnh bài giảng kịp thời.</p>
                </div>

                <div class="dashboard-card p-6 bg-white space-y-2">
                    <div class="w-10 h-10 rounded-xl bg-amber-100 text-amber-700 flex items-center justify-center font-bold mb-3">
                        <i data-lucide="smile" class="w-5 h-5"></i>
                    </div>
                    <h3 class="font-extrabold text-slate-900 text-base font-heading">Tự Tin & Ứng Dụng Thực Tế</h3>
                    <p class="text-xs text-slate-500 leading-relaxed">Tập trung vào tính ứng dụng thực tế trong công việc, học tập và các kỳ thi chuẩn hóa quốc tế.</p>
                </div>
            </div>
        </div>

    </div>
</section>
@endsection
