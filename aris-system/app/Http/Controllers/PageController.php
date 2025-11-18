<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\Official;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{
    public function home()
    {
        $now = now();

        $announcements = Announcement::where(function ($query) use ($now) {
            $query->where('start_date', '<=', $now)
                ->orWhereNull('start_date');
        })
            ->where(function ($query) use ($now) {
                $query->where('end_date', '>=', $now)
                    ->orWhereNull('end_date');
            })
            ->orderByRaw("CASE WHEN start_date IS NULL THEN 1 ELSE 0 END ASC") // Sorts NULLs last (equivalent to 'IS NULL' ASC)
            ->orderBy('start_date', 'desc')
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        $captain = Official::where('position', 'Barangay Captain')->first();
        $kagawads = Official::where('position', '!=', 'Barangay Captain')->orderBy('display_order', 'asc')->get();

        return view('home', compact('announcements', 'captain', 'kagawads'));
    }

    public function showAnnouncement(Announcement $announcement)
    {
        return view('announcements.show', compact('announcement'));
    }
}