<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\Official;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    // ... announcement methods ...
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function announcementsIndex()
    {
        $announcements = Announcement::orderBy('start_date', 'desc')->get();
        return view('admin.announcements.index', compact('announcements'));
    }

    public function announcementsCreate()
    {
        return view('admin.announcements.create');
    }

    public function announcementsStore(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
        ]);

        Announcement::create($validatedData);

        return redirect()->route('admin.announcements.index');
    }

    public function announcementsEdit(Announcement $announcement)
    {
        return view('admin.announcements.edit', compact('announcement'));
    }

    public function announcementsUpdate(Request $request, Announcement $announcement)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
        ]);

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

    public function officialsCreate()
    {
        return view('admin.officials.create');
    }

    public function officialsStore(Request $request)
    {
        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'middle_initial' => 'nullable|string|max:5',
            'position' => 'required|string|max:255',
            'display_order' => 'required|integer|min:0',
            'photo_path' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('photo_path')) {
            $path = $request->file('photo_path')->store('officials', 'public');
            $validatedData['photo_path'] = $path;
        }

        Official::create($validatedData);

        return redirect()->route('admin.officials.index');
    }

    public function officialsEdit(Official $official)
    {
        return view('admin.officials.edit', compact('official'));
    }

    public function officialsUpdate(Request $request, Official $official)
    {
        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'middle_initial' => 'nullable|string|max:5',
            'position' => 'required|string|max:255',
            'display_order' => 'required|integer|min:0',
            'photo_path' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

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