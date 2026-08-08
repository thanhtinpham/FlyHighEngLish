<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use Illuminate\Http\Request;

class AdminNotificationController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->query('search');

        $query = Notification::with('author');

        if ($search) {
            $query->where('title', 'like', "%{$search}%");
        }

        $notifications = $query->latest()->paginate(10)->withQueryString();

        return view('admin.notifications.index', compact('notifications', 'search'));
    }

    public function create()
    {
        return view('admin.notifications.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ], [
            'title.required' => 'Vui lòng nhập tiêu đề thông báo.',
            'content.required' => 'Vui lòng nhập nội dung thông báo.',
        ]);

        Notification::create([
            'title' => $request->title,
            'content' => $request->content,
            'is_pinned' => $request->has('is_pinned'),
            'created_by' => auth()->id(),
        ]);

        return redirect()->route('admin.notifications.index')->with('success', 'Đã đăng thông báo mới thành công!');
    }

    public function edit(Notification $notification)
    {
        return view('admin.notifications.edit', compact('notification'));
    }

    public function update(Request $request, Notification $notification)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $notification->update([
            'title' => $request->title,
            'content' => $request->content,
            'is_pinned' => $request->has('is_pinned'),
        ]);

        return redirect()->route('admin.notifications.index')->with('success', 'Đã cập nhật thông báo thành công!');
    }

    public function destroy(Notification $notification)
    {
        $notification->delete();

        return redirect()->route('admin.notifications.index')->with('success', 'Đã xóa thông báo khỏi hệ thống!');
    }
}
