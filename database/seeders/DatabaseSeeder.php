<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Enrollment;
use App\Models\Lesson;
use App\Models\LessonProgress;
use App\Models\Registration;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Create Users (safe with firstOrCreate)
        $admin = User::firstOrCreate(
            ['email' => 'admin@flyhighenglish.com'],
            [
                'name' => 'Quản Trị Viên (Admin)',
                'password' => Hash::make('password'),
                'role' => 'admin',
                'phone' => '0988888888',
            ]
        );

        $student = User::firstOrCreate(
            ['email' => 'user@flyhighenglish.com'],
            [
                'name' => 'Nguyễn Văn Học Viên',
                'password' => Hash::make('password'),
                'role' => 'student',
                'phone' => '0912345678',
            ]
        );

        // Ensure storage folder exists
        Storage::disk('public')->makeDirectory('lessons');

        // 2. Create Courses for 4 main categories
        $coursesData = [
            [
                'title' => 'Tiếng Anh Giao Tiếp Thực Chiến (Interactive Communication)',
                'slug' => 'tieng-anh-giao-tiep-thuc-chien',
                'category' => 'giao-tiep',
                'level' => 'Sơ cấp - Trung cấp (A1-B1)',
                'price' => 2500000,
                'description' => 'Khóa học giúp học viên xóa bỏ rào cản tự tin phản xạ Tiếng Anh trong giao tiếp hàng ngày, công sở và du lịch thông qua các bài học HTML tương tác 4D sinh động.',
                'objectives' => [
                    'Thành thạo 500+ từ vựng & 100+ cấu trúc câu giao tiếp thông dụng',
                    'Chuẩn hóa phát âm IPA giọng Mỹ với tương tác âm thanh trực tiếp',
                    'Tự tin phỏng vấn xin việc, thuyết trình và giao tiếp với đồng nghiệp nước ngoài',
                ],
                'roadmap' => [
                    'Tuần 1-4: Chuẩn hóa phát âm IPA & Chào hỏi cơ bản',
                    'Tuần 5-8: Giao tiếp nhà hàng, du lịch, mua sắm',
                    'Tuần 9-12: Tiếng Anh công sở, viết Email & thuyết trình',
                ],
                'structure' => [
                    '24 bài học HTML tương tác trực tuyến',
                    '12 buổi thực hành phòng Zoom với giảng viên bản ngữ',
                    'Bảng chấm điểm tiến độ tự động LMS',
                ],
                'is_published' => true,
            ],
            [
                'title' => 'Luyện Thi IELTS Intensive Target 7.0+',
                'slug' => 'luyen-thi-ielts-intensive-target-7',
                'category' => 'ielts',
                'level' => 'Intermediate to Advanced (B2-C1)',
                'price' => 6800000,
                'description' => 'Chương trình luyện thi IELTS chuyên sâu 4 kỹ năng Nghe-Nói-Đọc-Viết tích hợp kho bài tập HTML mô phỏng chuẩn giao diện thi máy IELTS Computer Delivered.',
                'objectives' => [
                    'Nắm vững toàn bộ dạng bài IELTS Listening Part 1-4 & Reading Passage 1-3',
                    'Chiến thuật giải bài chi tiết cho Matching Headings, True/False/Not Given',
                    'Bộ từ vựng C1/C2 ăn điểm cho Writing Task 2 & Speaking Part 2-3',
                ],
                'roadmap' => [
                    'Chặng 1: Xây nền tảng Academic Vocab & Phân tích dạng đề (Band 5.0 - 6.0)',
                    'Chặng 2: Nâng cấp kỹ năng Writing Task 1-2 & Speaking Part 2 (Band 6.0 - 7.0)',
                    'Chặng 3: Luyện bộ đề thi thật Quý mới nhất & Thi thử VSTEP/IELTS (Target 7.0+)',
                ],
                'structure' => [
                    '36 bài học tương tác HTML Listening & Reading',
                    'Chữa bài Writing & Speaking 1-1 với cựu giám khảo IELTS',
                    'Thi thử định kỳ VSTEP & IELTS Mock Test',
                ],
                'is_published' => true,
            ],
            [
                'title' => 'Bứt Phá Điểm Số TOEIC 800+ Nghe Đọc',
                'slug' => 'but-pha-diem-so-toeic-800',
                'category' => 'toeic',
                'level' => 'Mọi trình độ (A2-B2)',
                'price' => 3200000,
                'description' => 'Lộ trình tối ưu cho sinh viên và người đi làm cần bằng TOEIC ra trường/tăng lương cấp tốc. Hệ thống bài test HTML tính giờ chuẩn như thi thật.',
                'objectives' => [
                    'Luyện kỹ năng nghe Part 1-4 bắt từ khóa chính xác 100%',
                    'Làm chủ 13 chủ đề ngữ pháp TOEIC Part 5 & 6',
                    'Chiến thuật phân bổ thời gian Reading Part 7 không lo thiếu giờ',
                ],
                'roadmap' => [
                    'Giai đoạn 1: Luyện bẫy Part 1-4 & Từ vựng TOEIC 600 từ',
                    'Giai đoạn 2: Ngữ pháp Part 5-6 & Kỹ năng Skimming Part 7',
                    'Giai đoạn 3: Giải bộ đề thi ETS TOEIC mới nhất',
                ],
                'structure' => [
                    '20 bài luyện HTML TOEIC Part-by-Part',
                    '10 đề thi thử TOEIC Full Test 200 câu tính giờ',
                ],
                'is_published' => true,
            ],
            [
                'title' => 'Fly High Kids - Tiếng Anh Trẻ Em Sáng Tạo',
                'slug' => 'fly-high-kids-tieng-anh-tre-em',
                'category' => 'tre-em',
                'level' => 'Trẻ em (6-12 tuổi)',
                'price' => 2800000,
                'description' => 'Khóa học thiết kế sinh động với bài học HTML game kéo thả, phát âm audio hoạt hình giúp trẻ hứng thú học tiếng Anh tự nhiên.',
                'objectives' => [
                    'Nhận biết 300+ từ vựng chủ đề quen thuộc (Gia đình, Động vật, Màu sắc)',
                    'Phát âm Phonics chuẩn giọng Anh - Anh',
                    'Tạo thói quen tự học qua bài tập game tương tác vui nhộn',
                ],
                'roadmap' => [
                    'Cấp độ Starters: Phonics & Từ vựng hình ảnh',
                    'Cấp độ Movers: Câu đơn & Đoạn thoại hoạt hình',
                    'Cấp độ Flyers: Đọc truyện ngắn & Tự tin nói tiếng Anh',
                ],
                'structure' => [
                    '16 bài học HTML dạng Mini Game tương tác',
                    'Báo cáo tiến độ cho phụ huynh hàng tuần',
                ],
                'is_published' => true,
            ],
        ];

        $createdCourses = [];
        foreach ($coursesData as $cData) {
            $createdCourses[$cData['category']] = Course::firstOrCreate(
                ['slug' => $cData['slug']],
                $cData
            );
        }

        // 3. Create HTML Interactive Lessons for Courses
        $giaoTiepCourse = $createdCourses['giao-tiep'];
        $ieltsCourse = $createdCourses['ielts'];
        $toeicCourse = $createdCourses['toeic'];
        $kidsCourse = $createdCourses['tre-em'];

        $l1 = Lesson::firstOrCreate(
            ['slug' => 'bai-1-essential-daily-english-greetings'],
            [
                'course_id' => $giaoTiepCourse->id,
                'title' => 'Bài 1: Essential Daily English Greetings & Introductions',
                'level_or_week' => 'Tuần 1 - Buổi 1',
                'description' => 'Bài học tương tác chào hỏi cơ bản, luyện nghe phát âm chuẩn giọng Mỹ và hoàn thành đoạn thoại.',
                'html_file_path' => 'lessons/lesson_sample_1.html',
                'is_preview' => true,
                'order' => 1,
            ]
        );

        $l2 = Lesson::firstOrCreate(
            ['slug' => 'bai-2-ordering-food-and-drinks'],
            [
                'course_id' => $giaoTiepCourse->id,
                'title' => 'Bài 2: Ordering Food & Drinks at a Coffee Shop',
                'level_or_week' => 'Tuần 1 - Buổi 2',
                'description' => 'Thực hành gọi đồ uống, gọi món ăn tại nhà hàng với tình huống tương tác thực tế.',
                'html_file_path' => 'lessons/lesson_sample_1.html',
                'is_preview' => false,
                'order' => 2,
            ]
        );

        $l3 = Lesson::firstOrCreate(
            ['slug' => 'ielts-listening-map-labelling'],
            [
                'course_id' => $ieltsCourse->id,
                'title' => 'IELTS Listening: Map & Diagram Labelling Strategies',
                'level_or_week' => 'Level B2 - Module 1',
                'description' => 'Kỹ thuật xác định phương hướng và từ chỉ vị trí trong đề thi IELTS Listening Part 2.',
                'html_file_path' => 'lessons/lesson_sample_2.html',
                'is_preview' => true,
                'order' => 1,
            ]
        );

        $l4 = Lesson::firstOrCreate(
            ['slug' => 'toeic-part-5-subject-verb-agreement'],
            [
                'course_id' => $toeicCourse->id,
                'title' => 'TOEIC Part 5: Master Subject-Verb Agreement',
                'level_or_week' => 'Tuần 1 - TOEIC Part 5',
                'description' => 'Bài tập trắc nghiệm HTML tính giờ luyện sự hòa hợp giữa Chủ ngữ và Động từ.',
                'html_file_path' => 'lessons/lesson_sample_1.html',
                'is_preview' => true,
                'order' => 1,
            ]
        );

        $l5 = Lesson::firstOrCreate(
            ['slug' => 'fly-high-kids-animal-kingdom'],
            [
                'course_id' => $kidsCourse->id,
                'title' => 'Fly High Kids: Animal Kingdom & Fun Sounds',
                'level_or_week' => 'Tuần 1 - Phonics Fun',
                'description' => 'Học tên các loài động vật qua trò chơi nghe âm thanh và chọn hình ảnh.',
                'html_file_path' => 'lessons/lesson_sample_1.html',
                'is_preview' => true,
                'order' => 1,
            ]
        );

        // 4. Create Enrollment for Student
        Enrollment::firstOrCreate([
            'user_id' => $student->id,
            'course_id' => $giaoTiepCourse->id,
        ], [
            'status' => 'active',
            'enrolled_at' => now(),
        ]);

        Enrollment::firstOrCreate([
            'user_id' => $student->id,
            'course_id' => $ieltsCourse->id,
        ], [
            'status' => 'active',
            'enrolled_at' => now(),
        ]);

        // 5. Create Lesson Progress
        LessonProgress::firstOrCreate([
            'user_id' => $student->id,
            'lesson_id' => $l1->id,
        ], [
            'status' => 'completed',
            'score' => 100,
            'completed_at' => now(),
        ]);

        // 6. Create Lead Registrations
        Registration::firstOrCreate([
            'email' => 'thuha@gmail.com',
        ], [
            'name' => 'Trần Thị Thu Hà',
            'phone' => '0987654321',
            'type' => 'zalo_trial',
            'notes' => 'Đăng ký học thử khóa Giao tiếp qua Zalo. Rảnh buổi tối thứ 2-4-6.',
            'status' => 'pending',
        ]);

        Registration::firstOrCreate([
            'email' => 'minhquan@gmail.com',
        ], [
            'name' => 'Lê Minh Quân',
            'phone' => '0933221100',
            'type' => 'placement_test',
            'notes' => 'Điểm test: 75/100 - Đánh giá trình độ: B1 Intermediate',
            'details' => ['score' => 75, 'level' => 'B1 Intermediate'],
            'status' => 'contacted',
        ]);

        Registration::firstOrCreate([
            'email' => 'hoangnam@gmail.com',
        ], [
            'name' => 'Phạm Hoàng Nam',
            'phone' => '0977112233',
            'type' => 'vstep_exam',
            'notes' => 'Đăng ký thi thử B1 VSTEP đợt tháng 9/2026. Mục tiêu đạt chuẩn ra trường.',
            'status' => 'pending',
        ]);
    }
}
