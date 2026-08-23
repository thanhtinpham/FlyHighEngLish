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
            'email.required' => 'Vui lòng nhập địa chỉ Gmail học viên.',
            'email.email' => 'Email không đúng định dạng.',
        ]);

        $email = trim(strtolower($request->email));
        $user = User::where('email', $email)->first();

        // Admin login path with password validation if admin user
        if ($user && $user->isAdmin() && $request->filled('password')) {
            if (Auth::attempt(['email' => $email, 'password' => $request->password], $request->boolean('remember'))) {
                $request->session()->regenerate();
                return redirect()->intended(route('admin.dashboard'))->with('success', 'Đăng nhập thành công với quyền Quản trị viên!');
            }
            return back()->withErrors(['password' => 'Mật khẩu quản trị viên không chính xác.'])->onlyInput('email');
        }

        // Enforce Gmail requirement for student login (must end with @gmail.com)
        if (!Str::endsWith($email, '@gmail.com') && !($user && $user->isAdmin())) {
            return back()->withErrors([
                'email' => 'Hệ thống chỉ hỗ trợ đăng nhập bằng Gmail (ví dụ: tenban@gmail.com).',
            ])->onlyInput('email');
        }

        // Student/User login directly via Gmail
        if ($user) {
            Auth::login($user, $request->boolean('remember', true));
            $request->session()->regenerate();

            if ($user->isAdmin()) {
                return redirect()->intended(route('admin.dashboard'))->with('success', 'Đăng nhập thành công với quyền Quản trị viên!');
            }

            return redirect()->intended(route('dashboard'))->with('success', 'Đăng nhập thành công với Gmail: ' . $user->email);
        }

        // Auto-register new student account if Gmail not found
        $nameFromEmail = Str::title(str_replace(['.', '_', '-'], ' ', explode('@', $email)[0]));
        $newUser = User::create([
            'name' => $nameFromEmail,
            'email' => $email,
            'password' => Hash::make(Str::random(16)),
            'role' => 'user',
        ]);

        Auth::login($newUser, true);
        $request->session()->regenerate();

        return redirect()->route('dashboard')->with('success', 'Chào mừng học viên mới! Tài khoản Gmail đã được đăng ký & đăng nhập thành công.');
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
        $request->validate([
            'email' => ['required', 'string', 'email', 'max:255'],
        ], [
            'email.required' => 'Vui lòng nhập địa chỉ Gmail học viên.',
            'email.email' => 'Email không đúng định dạng.',
        ]);

        $email = trim(strtolower($request->email));

        // Enforce Gmail requirement for registration
        if (!Str::endsWith($email, '@gmail.com')) {
            return back()->withErrors([
                'email' => 'Hệ thống chỉ chấp nhận đăng ký bằng Gmail (ví dụ: tenban@gmail.com).',
            ])->onlyInput('email');
        }

        $user = User::where('email', $email)->first();

        if (!$user) {
            $name = $request->filled('name')
                ? $request->name
                : Str::title(str_replace(['.', '_', '-'], ' ', explode('@', $email)[0]));

            $user = User::create([
                'name' => $name,
                'email' => $email,
                'password' => Hash::make(Str::random(16)),
                'role' => 'user',
            ]);
        }

        Auth::login($user, true);
        $request->session()->regenerate();

        return redirect()->route('dashboard')->with('success', 'Đăng ký & Đăng nhập thành công với Gmail: ' . $user->email);
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
}
