<?php

namespace App\Http\Controllers;

use App\Models\Registration;
use Illuminate\Http\Request;

class PlacementTestController extends Controller
{
    public function index()
    {
        return view('placement_test.index');
    }

    public function submit(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'nullable|email|max:255',
            'answers' => 'required|array',
            'score' => 'required|integer',
            'level_recommendation' => 'required|string',
        ]);

        $registration = Registration::create([
            'name' => $validated['name'],
            'phone' => $validated['phone'],
            'email' => $validated['email'] ?? null,
            'type' => 'placement_test',
            'notes' => 'Điểm test: ' . $validated['score'] . '/100 - Đánh giá trình độ: ' . $validated['level_recommendation'],
            'details' => [
                'score' => $validated['score'],
                'level' => $validated['level_recommendation'],
                'answers' => $validated['answers'],
            ],
            'status' => 'pending',
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Kết quả bài test đã được ghi nhận!',
            'score' => $validated['score'],
            'level' => $validated['level_recommendation'],
        ]);
    }
}
