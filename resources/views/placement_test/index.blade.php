@extends('layouts.app')

@section('title', 'Làm Bài Test Đầu Vào Online - Fly High English')

@section('content')
<!-- Header Banner in Modern Light Style -->
<section class="bg-gradient-to-br from-emerald-50 via-teal-50/50 to-sky-50 py-14 border-b border-emerald-100/80 text-slate-900">
    <div class="max-w-4xl mx-auto px-4 text-center space-y-3">
        <span class="px-3.5 py-1 bg-gold-100 text-gold-700 rounded-full text-xs font-extrabold uppercase tracking-wider border border-gold-300">
            PLACEMENT TEST ONLINE
        </span>
        <h1 class="text-3xl sm:text-4xl font-black text-slate-900 font-heading">Bài Test Đánh Giá Trình Độ Tiếng Anh</h1>
        <p class="text-slate-600 text-sm max-w-2xl mx-auto leading-relaxed">
            Trả lời các câu hỏi trắc nghiệm dưới đây để hệ thống đánh giá trình độ và tư vấn lộ trình học phù hợp nhất cho bạn.
        </p>
    </div>
</section>

<section class="py-12 bg-slate-50">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white rounded-3xl p-6 sm:p-10 shadow-xl border border-slate-200" id="testContainer">
            
            <div id="quizForm">
                <!-- Question 1 -->
                <div class="mb-8 p-5 rounded-2xl bg-slate-50 border border-slate-200 space-y-2">
                    <span class="text-xs font-extrabold text-emerald-700 font-heading block">Câu 1 (Ngữ Pháp):</span>
                    <p class="font-extrabold text-slate-900 text-base mb-4 font-heading">She ________ to the English center every Tuesday and Thursday evening.</p>
                    <div class="space-y-2.5">
                        <label class="flex items-center gap-3 p-3.5 rounded-xl border border-slate-200 hover:border-emerald-400 hover:bg-emerald-50/50 cursor-pointer text-sm font-medium transition-all">
                            <input type="radio" name="q1" value="A" class="accent-emerald-600"> A. go
                        </label>
                        <label class="flex items-center gap-3 p-3.5 rounded-xl border border-slate-200 hover:border-emerald-400 hover:bg-emerald-50/50 cursor-pointer text-sm font-medium transition-all">
                            <input type="radio" name="q1" value="B" class="accent-emerald-600"> B. goes
                        </label>
                        <label class="flex items-center gap-3 p-3.5 rounded-xl border border-slate-200 hover:border-emerald-400 hover:bg-emerald-50/50 cursor-pointer text-sm font-medium transition-all">
                            <input type="radio" name="q1" value="C" class="accent-emerald-600"> C. went
                        </label>
                    </div>
                </div>

                <!-- Question 2 -->
                <div class="mb-8 p-5 rounded-2xl bg-slate-50 border border-slate-200 space-y-2">
                    <span class="text-xs font-extrabold text-emerald-700 font-heading block">Câu 2 (Từ Vựng Giao Tiếp):</span>
                    <p class="font-extrabold text-slate-900 text-base mb-4 font-heading">Which response is most appropriate for "Thank you so much for your help!"?</p>
                    <div class="space-y-2.5">
                        <label class="flex items-center gap-3 p-3.5 rounded-xl border border-slate-200 hover:border-emerald-400 hover:bg-emerald-50/50 cursor-pointer text-sm font-medium transition-all">
                            <input type="radio" name="q2" value="A" class="accent-emerald-600"> A. You're very welcome!
                        </label>
                        <label class="flex items-center gap-3 p-3.5 rounded-xl border border-slate-200 hover:border-emerald-400 hover:bg-emerald-50/50 cursor-pointer text-sm font-medium transition-all">
                            <input type="radio" name="q2" value="B" class="accent-emerald-600"> B. Yes, I am.
                        </label>
                        <label class="flex items-center gap-3 p-3.5 rounded-xl border border-slate-200 hover:border-emerald-400 hover:bg-emerald-50/50 cursor-pointer text-sm font-medium transition-all">
                            <input type="radio" name="q2" value="C" class="accent-emerald-600"> C. No problem, I don't care.
                        </label>
                    </div>
                </div>

                <!-- Question 3 -->
                <div class="mb-8 p-5 rounded-2xl bg-slate-50 border border-slate-200 space-y-2">
                    <span class="text-xs font-extrabold text-emerald-700 font-heading block">Câu 3 (Reading Comprehension):</span>
                    <p class="font-extrabold text-slate-900 text-base mb-4 font-heading">If a document is marked "CONFIDENTIAL", it means:</p>
                    <div class="space-y-2.5">
                        <label class="flex items-center gap-3 p-3.5 rounded-xl border border-slate-200 hover:border-emerald-400 hover:bg-emerald-50/50 cursor-pointer text-sm font-medium transition-all">
                            <input type="radio" name="q3" value="A" class="accent-emerald-600"> A. It can be shared publicly on social media.
                        </label>
                        <label class="flex items-center gap-3 p-3.5 rounded-xl border border-slate-200 hover:border-emerald-400 hover:bg-emerald-50/50 cursor-pointer text-sm font-medium transition-all">
                            <input type="radio" name="q3" value="B" class="accent-emerald-600"> B. It is private and intended only for authorized people.
                        </label>
                        <label class="flex items-center gap-3 p-3.5 rounded-xl border border-slate-200 hover:border-emerald-400 hover:bg-emerald-50/50 cursor-pointer text-sm font-medium transition-all">
                            <input type="radio" name="q3" value="C" class="accent-emerald-600"> C. It contains errors and needs revision.
                        </label>
                    </div>
                </div>

                <!-- Student Info inputs -->
                <div class="border-t border-slate-200 pt-6 mb-6 space-y-4">
                    <h3 class="font-extrabold text-slate-900 text-base font-heading">Thông Tin Người Làm Test</h3>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-bold text-slate-700 mb-1.5">Họ và tên *</label>
                            <input type="text" id="studentName" required placeholder="Nhập họ và tên" class="w-full px-4 py-3 rounded-xl border border-slate-200 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-slate-700 mb-1.5">Số điện thoại *</label>
                            <input type="tel" id="studentPhone" required placeholder="Nhập số điện thoại" class="w-full px-4 py-3 rounded-xl border border-slate-200 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500">
                        </div>
                    </div>
                </div>

                <button onclick="calculateResult()" class="w-full py-4 bg-gradient-to-r from-emerald-600 to-teal-600 hover:from-emerald-700 hover:to-teal-700 text-white font-extrabold text-sm rounded-2xl shadow-emerald-glow transition-all hover:scale-[1.01]">
                    Chấm Điểm & Nộp Bài Test
                </button>
            </div>

            <!-- Result Box -->
            <div id="resultBox" class="hidden text-center space-y-6 py-6">
                <div class="w-20 h-20 rounded-full bg-emerald-100 text-emerald-600 flex items-center justify-center mx-auto text-3xl font-black shadow-emerald-glow">
                    <i data-lucide="award" class="w-10 h-10"></i>
                </div>
                <div>
                    <span class="text-xs font-bold text-slate-400 uppercase tracking-widest block">KẾT QUẢ BÀI TEST CỦA BẠN</span>
                    <h2 class="text-4xl font-black text-slate-900 mt-1 font-heading" id="scoreText">100 / 100 Điểm</h2>
                    <p class="text-emerald-600 font-extrabold text-lg mt-2 font-heading" id="levelText">Trình độ đề xuất: B1 Intermediate</p>
                </div>
                
                <p class="text-slate-600 text-xs max-w-md mx-auto leading-relaxed">
                    Fly High English đã nhận thông tin kết quả. Tư vấn viên sẽ liên hệ hỗ trợ bạn đăng ký lớp học phù hợp nhất!
                </p>

                <div class="pt-4 flex justify-center gap-3">
                    <a href="{{ route('courses.index') }}" class="px-6 py-3 bg-emerald-600 hover:bg-emerald-700 text-white rounded-xl text-xs font-extrabold shadow-emerald-glow transition-all">Xem Danh Sách Khóa Học</a>
                    <button onclick="openModal('zaloModal')" class="px-6 py-3 bg-slate-900 hover:bg-slate-800 text-white rounded-xl text-xs font-extrabold transition-all">Học Thử Qua Zalo</button>
                </div>
            </div>

        </div>
    </div>
</section>

@section('scripts')
<script>
    function calculateResult() {
        const name = document.getElementById('studentName').value.trim();
        const phone = document.getElementById('studentPhone').value.trim();

        if (!name || !phone) {
            alert('Vui lòng nhập Họ tên và Số điện thoại trước khi nộp bài test!');
            return;
        }

        const q1 = document.querySelector('input[name="q1"]:checked')?.value;
        const q2 = document.querySelector('input[name="q2"]:checked')?.value;
        const q3 = document.querySelector('input[name="q3"]:checked')?.value;

        let score = 0;
        if (q1 === 'B') score += 33;
        if (q2 === 'A') score += 33;
        if (q3 === 'B') score += 34;

        let level = 'Sơ cấp A1 (Beginner)';
        if (score >= 66) level = 'Trung cấp B1 (Intermediate)';
        if (score >= 90) level = 'Cao cấp B2/C1 (Advanced)';

        // Submit via AJAX
        fetch("{{ route('placement_test.submit') }}", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": "{{ csrf_token() }}"
            },
            body: JSON.stringify({
                name: name,
                phone: phone,
                score: score,
                level_recommendation: level,
                answers: { q1, q2, q3 }
            })
        })
        .then(res => res.json())
        .then(data => {
            document.getElementById('quizForm').classList.add('hidden');
            document.getElementById('resultBox').classList.remove('hidden');
            document.getElementById('scoreText').innerText = score + " / 100 Điểm";
            document.getElementById('levelText').innerText = "Đánh Giá Trình Độ: " + level;
            showToast('🎉 Nộp bài thành công!', `Bạn đạt ${score}/100 điểm - ${level}`, 'emerald');
        })
        .catch(err => {
            alert('Có lỗi xảy ra khi gửi bài test. Vui lòng thử lại!');
        });
    }
</script>
@endsection
@endsection
