@extends('layouts.app')

@section('title', 'Danh Sách Khóa Học Tiếng Anh - Fly High English')

@section('content')
<!-- Header Banner in Modern Light Style -->
<section class="bg-gradient-to-br from-emerald-50 via-teal-50/50 to-sky-50 py-14 border-b border-emerald-100/80 text-slate-900">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-2">
        <span class="px-3.5 py-1 bg-emerald-100 text-emerald-800 rounded-full text-xs font-extrabold uppercase tracking-widest border border-emerald-300">
            LỘ TRÌNH ĐÀO TẠO
        </span>
        <h1 class="text-3xl sm:text-4xl font-black text-slate-900 font-heading">Danh Sách Khóa Học Chi Tiết</h1>
        <p class="text-slate-600 text-sm">Lựa chọn chương trình đào tạo phù hợp nhất với mục tiêu của bạn.</p>

        <!-- Category Tabs -->
        <div class="flex flex-wrap gap-2.5 pt-4">
            <a href="{{ route('courses.index') }}" class="px-4 py-2.5 rounded-xl text-xs font-bold transition-all {{ !$category ? 'bg-emerald-600 text-white shadow-emerald-glow' : 'bg-white text-slate-700 hover:bg-emerald-50 border border-slate-200 shadow-soft-sm' }}">
                ✨ Tất Cả Khóa Học
            </a>
            <a href="{{ route('courses.index', ['category' => 'giao-tiep']) }}" class="px-4 py-2.5 rounded-xl text-xs font-bold transition-all {{ $category === 'giao-tiep' ? 'bg-emerald-600 text-white shadow-emerald-glow' : 'bg-white text-slate-700 hover:bg-emerald-50 border border-slate-200 shadow-soft-sm' }}">
                🗣️ Tiếng Anh Giao Tiếp
            </a>
            <a href="{{ route('courses.index', ['category' => 'ielts']) }}" class="px-4 py-2.5 rounded-xl text-xs font-bold transition-all {{ $category === 'ielts' ? 'bg-emerald-600 text-white shadow-emerald-glow' : 'bg-white text-slate-700 hover:bg-emerald-50 border border-slate-200 shadow-soft-sm' }}">
                🎯 Luyện Thi IELTS
            </a>
            <a href="{{ route('courses.index', ['category' => 'toeic']) }}" class="px-4 py-2.5 rounded-xl text-xs font-bold transition-all {{ $category === 'toeic' ? 'bg-emerald-600 text-white shadow-emerald-glow' : 'bg-white text-slate-700 hover:bg-emerald-50 border border-slate-200 shadow-soft-sm' }}">
                ⚡ Luyện Thi TOEIC
            </a>
            <a href="{{ route('courses.index', ['category' => 'tre-em']) }}" class="px-4 py-2.5 rounded-xl text-xs font-bold transition-all {{ $category === 'tre-em' ? 'bg-emerald-600 text-white shadow-emerald-glow' : 'bg-white text-slate-700 hover:bg-emerald-50 border border-slate-200 shadow-soft-sm' }}">
                🎈 Tiếng Anh Cho Trẻ Em
            </a>
        </div>
    </div>
</section>

<section class="py-16 bg-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($courses as $course)
            <div class="dashboard-card bg-white overflow-hidden flex flex-col justify-between">
                <div class="p-6 sm:p-8 space-y-4">
                    <div class="flex items-center justify-between">
                        <span class="px-3.5 py-1 bg-emerald-50 text-emerald-700 rounded-full text-xs font-extrabold border border-emerald-200">
                            {{ $course->category_label }}
                        </span>
                        <span class="text-xs font-semibold text-slate-400 flex items-center gap-1">
                            <i data-lucide="layers" class="w-3.5 h-3.5 text-sky-500"></i> {{ $course->level }}
                        </span>
                    </div>

                    <div>
                        <h3 class="font-extrabold text-slate-900 text-xl font-heading hover:text-emerald-600 transition-colors">
                            <a href="{{ route('courses.show', $course->slug) }}">
                                {{ $course->title }}
                            </a>
                        </h3>

                        <p class="text-xs text-slate-500 line-clamp-3 leading-relaxed mt-2">
                            {{ $course->description }}
                        </p>
                    </div>

                    <div class="space-y-2 text-xs font-medium text-slate-600 border-t border-slate-100 pt-4">
                        <div class="flex items-center gap-2">
                            <i data-lucide="book-open" class="w-4 h-4 text-emerald-500"></i>
                            <span>Sĩ số bài học: <strong>{{ $course->lessons_count }} bài HTML tương tác</strong></span>
                        </div>
                        <div class="flex items-center gap-2">
                            <i data-lucide="award" class="w-4 h-4 text-gold-500"></i>
                            <span>Chứng nhận hoàn thành LMS</span>
                        </div>
                    </div>
                </div>

                <div class="px-6 py-5 bg-slate-50 border-t border-slate-100 flex items-center justify-between">
                    <div>
                        <span class="text-[10px] text-slate-400 block uppercase font-bold">Học phí trọn gói</span>
                        <span class="text-base font-black text-emerald-600 font-heading">{{ number_format($course->price) }} VNĐ</span>
                    </div>
                    <a href="{{ route('courses.show', $course->slug) }}" class="px-4 py-2.5 bg-emerald-600 hover:bg-emerald-700 text-white rounded-xl text-xs font-extrabold shadow-emerald-glow transition-all flex items-center gap-1.5">
                        Xem Chi Tiết <i data-lucide="chevron-right" class="w-3.5 h-3.5"></i>
                    </a>
                </div>
            </div>
            @empty
            <div class="col-span-3 text-center py-16">
                <i data-lucide="folder-open" class="w-12 h-12 text-slate-300 mx-auto mb-3"></i>
                <p class="text-slate-500 text-sm font-medium">Chưa có khóa học nào thuộc danh mục này.</p>
            </div>
            @endforelse
        </div>
    </div>
</section>
@endsection
