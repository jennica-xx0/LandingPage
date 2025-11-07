<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\Official;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }
    public function announcementsIndex(Request $request)
    {
        $now = Carbon::now();
        $query = Announcement::query();
        $status = $request->query('status');

        if ($status === 'ended') {
            $query->where('end_date', '<', $now);
        } elseif ($status === 'scheduled') {
            $query->where('start_date', '>', $now);
        } elseif ($status === 'ongoing') {
            $query->where(function ($q) use ($now) {
                $q->where('start_date', '<=', $now)->orWhereNull('start_date');
            })->where(function ($q) use ($now) {
                $q->where('end_date', '>=', $now)->orWhereNull('end_date');
            });
        }

        $announcements = $query->orderBy('created_at', 'desc')->simplePaginate(3)->withQueryString();

        $total_announcements = Announcement::count();
        $ended_announcements = Announcement::where('end_date', '<', $now)->count();
        $ongoing_announcements = Announcement::where(function ($q) use ($now) {
            $q->where('start_date', '<=', $now)->orWhereNull('start_date');
        })->where(function ($q) use ($now) {
            $q->where('end_date', '>=', $now)->orWhereNull('end_date');
        })->count();

        return view('admin.announcements.index', compact('announcements', 'total_announcements', 'ended_announcements', 'ongoing_announcements', 'status'));
    }
    public function announcementsStore(Request $request)
    {
        $validatedData = $request->validate(['title' => 'required|string|max:255', 'content' => 'required|string', 'start_date' => 'nullable|date', 'end_date' => 'nullable|date|after_or_equal:start_date']);
        Announcement::create($validatedData);
        return redirect()->route('admin.announcements.index');
    }
    public function announcementsUpdate(Request $request, Announcement $announcement)
    {
        $validatedData = $request->validate(['title' => 'required|string|max:255', 'content' => 'required|string', 'start_date' => 'nullable|date', 'end_date' => 'nullable|date|after_or_equal:start_date']);
        $announcement->update($validatedData);
        return redirect()->route('admin.announcements.index');
    }
    public function announcementsDestroy(Announcement $announcement)
    {
        $announcement->delete();
        return redirect()->route('admin.announcements.index');
    }
    public function officialsIndex()
    {
        $officials = Official::orderBy('display_order', 'asc')->get();
        return view('admin.officials.index', compact('officials'));
    }
    public function officialsStore(Request $request)
    {
        $validatedData = $request->validate(['first_name' => 'required|string|max:255', 'last_name' => 'required|string|max:255', 'middle_initial' => 'nullable|string|max:5', 'position' => 'required|string|max:255', 'display_order' => 'required|integer|min:0', 'photo_path' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048']);
        if ($request->hasFile('photo_path')) {
            $path = $request->file('photo_path')->store('officials', 'public');
            $validatedData['photo_path'] = $path;
        }
        Official::create($validatedData);
        return redirect()->route('admin.officials.index');
    }
    public function officialsUpdate(Request $request, Official $official)
    {
        $validatedData = $request->validate(['first_name' => 'required|string|max:255', 'last_name' => 'required|string|max:255', 'middle_initial' => 'nullable|string|max:5', 'position' => 'required|string|max:255', 'display_order' => 'required|integer|min:0', 'photo_path' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048']);
        if ($request->hasFile('photo_path')) {
            if ($official->photo_path) {
                Storage::disk('public')->delete($official->photo_path);
            }
            $path = $request->file('photo_path')->store('officials', 'public');
            $validatedData['photo_path'] = $path;
        }
        $official->update($validatedData);
        return redirect()->route('admin.officials.index');
    }
    public function officialsDestroy(Official $official)
    {
        if ($official->photo_path) {
            Storage::disk('public')->delete($official->photo_path);
        }
        $official->delete();
        return redirect()->route('admin.officials.index');
    }
}
