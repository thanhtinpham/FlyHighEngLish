<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\Admin\AdminCourseController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminEnrollmentController;
use App\Http\Controllers\Admin\AdminLessonController;
use App\Http\Controllers\Admin\AdminRegistrationController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LearningHubController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\PlacementTestController;
use App\Http\Controllers\RegistrationController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes - Fly High English Portal
|--------------------------------------------------------------------------
*/

// Public Guest Routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [AboutController::class, 'index'])->name('about');

// Courses Browsing
Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');
Route::get('/courses/{slug}', [CourseController::class, 'show'])->name('courses.show');

// Placement Test (Assessment)
Route::get('/placement-test', [PlacementTestController::class, 'index'])->name('placement_test.index');
Route::post('/placement-test/submit', [PlacementTestController::class, 'submit'])->name('placement_test.submit');

// Registration Forms (Zalo Trial, VSTEP Exam, Consultations)
Route::post('/registrations', [RegistrationController::class, 'store'])->name('registrations.store');

// HTML Lesson Player (Available for preview or authenticated enrolled users)
Route::get('/lessons/{lesson}', [LessonController::class, 'show'])->name('lessons.show');
Route::post('/lessons/{lesson}/progress', [LessonController::class, 'saveProgress'])->name('lessons.progress');

// Authentication Routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Authenticated Student Routes
Route::middleware('auth')->group(function () {
    // Interactive Learning Hub (Student Classroom & Progress)
    Route::get('/learning-hub', [LearningHubController::class, 'index'])->name('learning_hub.index');
});

// Admin Control Panel Routes
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminDashboardController::class, 'index'])->name('dashboard');

    // Courses Management
    Route::resource('courses', AdminCourseController::class);

    // HTML Lessons Management
    Route::resource('lessons', AdminLessonController::class);

    // Student Enrollments Management
    Route::get('enrollments', [AdminEnrollmentController::class, 'index'])->name('enrollments.index');
    Route::post('enrollments', [AdminEnrollmentController::class, 'store'])->name('enrollments.store');
    Route::delete('enrollments/{enrollment}', [AdminEnrollmentController::class, 'destroy'])->name('enrollments.destroy');

    // Lead Registrations Management
    Route::get('registrations', [AdminRegistrationController::class, 'index'])->name('registrations.index');
    Route::patch('registrations/{registration}/status', [AdminRegistrationController::class, 'updateStatus'])->name('registrations.updateStatus');
    Route::delete('registrations/{registration}', [AdminRegistrationController::class, 'destroy'])->name('registrations.destroy');
});
