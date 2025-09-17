<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactSubmission;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_submissions' => ContactSubmission::count(),
            'unread_submissions' => ContactSubmission::unread()->count(),
            'today_submissions' => ContactSubmission::whereDate('created_at', today())->count(),
            'this_week_submissions' => ContactSubmission::whereBetween('created_at', [
                now()->startOfWeek(),
                now()->endOfWeek()
            ])->count()
        ];

        $recent_submissions = ContactSubmission::with([])
            ->latest()
            ->take(5)
            ->get();

        return view('admin.dashboard', compact('stats', 'recent_submissions'));
    }
}
