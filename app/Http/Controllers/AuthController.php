<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function showLogin()
    {
        if (Auth::check()) {
            return redirect()->route('dashboard');
        }
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
        ], [
            'email.required' => 'Vui lòng nhập địa chỉ email.',
            'email.email' => 'Email không đúng định dạng.',
        ]);

        $email = trim(strtolower($request->email));
        $user = User::where('email', $email)->first();

        // Admin login path with password validation
        if ($user && $user->isAdmin() && $request->filled('password')) {
            if (Auth::attempt(['email' => $email, 'password' => $request->password], $request->boolean('remember'))) {
                $request->session()->regenerate();
                return redirect()->intended(route('admin.dashboard'))->with('success', 'Đăng nhập thành công với quyền Quản trị viên!');
            }
            return back()->withErrors(['password' => 'Mật khẩu quản trị viên không chính xác.'])->onlyInput('email');
        }

        // Student/Regular Users must use Google OAuth
        return redirect()->route('auth.google');
    }

    public function showRegister()
    {
        if (Auth::check()) {
            return redirect()->route('dashboard');
        }
        return view('auth.register');
    }

    public function register(Request $request)
    {
        // Enforce Google OAuth for all student registrations
        return redirect()->route('auth.google');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        if ($request->hasSession()) {
            $request->session()->invalidate();
            $request->session()->regenerateToken();
        }

        return redirect()->route('login')->with('success', 'Bạn đã đăng xuất thành công.');
    }

    public function redirectToGoogle()
    {
        if (!config('services.google.client_id') || !config('services.google.client_secret')) {
            return redirect()->route('login')->with('error', '⚠️ Hệ thống yêu cầu cấu hình GOOGLE_CLIENT_ID & GOOGLE_CLIENT_SECRET trong file .env để chọn tài khoản Google cá nhân. Vui lòng thêm bộ khóa từ Google Cloud Console.');
        }

        return \Laravel\Socialite\Facades\Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $googleUser = \Laravel\Socialite\Facades\Socialite::driver('google')->user();

            $user = User::where('google_id', $googleUser->id)
                ->orWhere('email', $googleUser->email)
                ->first();

            if ($user) {
                $user->update([
                    'google_id' => $googleUser->id,
                    'avatar' => $googleUser->avatar ?? $user->avatar,
                ]);
            } else {
                $user = User::create([
                    'name' => $googleUser->name ?? explode('@', $googleUser->email)[0],
                    'email' => $googleUser->email,
                    'google_id' => $googleUser->id,
                    'avatar' => $googleUser->avatar,
                    'password' => Hash::make(Str::random(16)),
                    'role' => 'user',
                ]);
            }

            Auth::login($user, true);
            request()->session()->regenerate();

            if ($user->isAdmin()) {
                return redirect()->intended(route('admin.dashboard'))->with('success', 'Đăng nhập Google thành công với quyền Quản trị viên!');
            }

            return redirect()->intended(route('dashboard'))->with('success', 'Đăng nhập Google OAuth thành công! Xin chào ' . $user->name);

        } catch (\Exception $e) {
            return redirect()->route('login')->with('error', 'Đăng nhập bằng Google chưa hoàn tất hoặc bị hủy: ' . $e->getMessage());
        }
    }
}
