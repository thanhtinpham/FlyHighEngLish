<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->query('search');

        $query = Notification::with('author');

        if ($search) {
            $query->where('title', 'like', "%{$search}%")
                  ->orWhere('content', 'like', "%{$search}%");
        }

        $notifications = $query->orderBy('is_pinned', 'desc')
            ->latest()
            ->paginate(8)
            ->withQueryString();

        return view('notifications.index', compact('notifications', 'search'));
    }

    public function show(Notification $notification)
    {
        $notification->load('author');
        
        $otherNotifications = Notification::where('id', '!=', $notification->id)
            ->latest()
            ->take(5)
            ->get();

        return view('notifications.show', compact('notification', 'otherNotifications'));
    }
}
