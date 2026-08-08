<?php

namespace App\Http\Controllers;

use App\Models\Registration;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'nullable|email|max:255',
            'type' => 'required|string|in:zalo_trial,placement_test,vstep_exam',
            'notes' => 'nullable|string',
            'details' => 'nullable|array',
        ]);

        $registration = Registration::create($validated);

        if ($request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Đăng ký thành công! Tư vấn viên của Fly High English sẽ liên hệ với bạn ngay.',
                'registration' => $registration,
            ]);
        }

        return redirect()->back()->with('success', 'Đăng ký thành công! Fly High English sẽ liên hệ với bạn qua Zalo/SĐT trong thời gian sớm nhất.');
    }
}
