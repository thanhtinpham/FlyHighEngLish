<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Document;
use App\Models\Notification;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $categories = Category::withCount('documents')->get();
        $pinnedNotifications = Notification::with('author')
            ->where('is_pinned', true)
            ->latest()
            ->get();

        $recentNotifications = Notification::with('author')
            ->latest()
            ->take(5)
            ->get();

        $recentDocuments = Document::with('category')
            ->latest()
            ->take(6)
            ->get();

        $popularDocuments = Document::with('category')
            ->orderBy('download_count', 'desc')
            ->take(5)
            ->get();

        return view('dashboard', compact(
            'categories',
            'pinnedNotifications',
            'recentNotifications',
            'recentDocuments',
            'popularDocuments'
        ));
    }
}
