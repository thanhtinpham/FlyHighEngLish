<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Registration;
use Illuminate\Http\Request;

class AdminRegistrationController extends Controller
{
    public function index(Request $request)
    {
        $type = $request->query('type');
        $query = Registration::latest();
        if ($type) {
            $query->where('type', $type);
        }

        $registrations = $query->get();

        return view('admin.registrations.index', compact('registrations', 'type'));
    }

    public function updateStatus(Request $request, Registration $registration)
    {
        $validated = $request->validate([
            'status' => 'required|string|in:pending,contacted,enrolled,cancelled',
        ]);

        $registration->update(['status' => $validated['status']]);

        return redirect()->back()->with('success', 'Đã cập nhật trạng thái tư vấn!');
    }

    public function destroy(Registration $registration)
    {
        $registration->delete();
        return redirect()->back()->with('success', 'Đã xóa thông tin đăng ký!');
    }
}
