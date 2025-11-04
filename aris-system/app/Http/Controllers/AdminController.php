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

    // USER METHODS
    public function usersIndex()
    {
        $users = User::orderBy('name')->paginate(10);
        return view('admin.users.index', compact('users'));
    }

    public function usersCreate()
    {
        return view('admin.users.create');
    }

    public function usersStore(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('admin.users.index');
    }

    public function usersShow(User $user)
    {
        $profileData = (object) [
            'full_name' => $user->name,
            'user_id_code' => 'SADM-K8209', // Placeholder
            'photo_path' => null,
            'last_name' => explode(' ', $user->name)[1] ?? '',
            'first_name' => explode(' ', $user->name)[0] ?? '',
            'middle_name' => '', // Placeholder
            'suffix' => '', // Placeholder
            'age' => 'N/A', // Placeholder
            'date_of_birth' => 'N/A', // Placeholder
            'place_of_birth' => 'N/A', // Placeholder
            'gender' => 'N/A', // Placeholder
            'civil_status' => 'N/A', // Placeholder
            'citizenship' => 'N/A', // Placeholder
            'contact_number' => 'N/A', // Placeholder
            'email' => $user->email,
            'house_street' => 'N/A', // Placeholder
            'barangay' => 'Brgy. Daang Bakal', // Placeholder
            'city_municipality' => 'Mandaluyong City', // Placeholder
        ];
        return view('admin.users.show', compact('profileData'));
    }

    // ANNOUNCEMENT METHODS
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

        $announcements = $query->orderBy('start_date', 'desc')->paginate(10)->withQueryString();

        // KPI counts are not affected by filters
        $total_announcements = Announcement::count();
        $ended_announcements = Announcement::where('end_date', '<', $now)->count();
        $ongoing_announcements = Announcement::where(function ($q) use ($now) {
            $q->where('start_date', '<=', $now)->orWhereNull('start_date');
        })->where(function ($q) use ($now) {
            $q->where('end_date', '>=', $now)->orWhereNull('end_date');
        })->count();

        return view('admin.announcements.index', compact('announcements', 'total_announcements', 'ended_announcements', 'ongoing_announcements', 'status'));
    }
    
    public function announcementsStore(Request $request){ $validatedData = $request->validate(['title' => 'required|string|max:255', 'content' => 'required|string', 'start_date' => 'nullable|date', 'end_date' => 'nullable|date|after_or_equal:start_date']); Announcement::create($validatedData); return redirect()->route('admin.announcements.index'); }
    
    public function announcementsUpdate(Request $request, Announcement $announcement){ $validatedData = $request->validate(['title' => 'required|string|max:255', 'content' => 'required|string', 'start_date' => 'nullable|date', 'end_date' => 'nullable|date|after_or_equal:start_date']); $announcement->update($validatedData); return redirect()->route('admin.announcements.index'); }
    
    public function announcementsDestroy(Announcement $announcement){ $announcement->delete(); return redirect()->route('admin.announcements.index'); }

    // OFFICIAL METHODS
    public function officialsIndex()
    {
        $officials = Official::orderBy('display_order', 'asc')->get();
        return view('admin.officials.index', compact('officials'));
    }
    
    public function officialsStore(Request $request) { $validatedData = $request->validate(['first_name' => 'required|string|max:255', 'last_name' => 'required|string|max:255', 'middle_initial' => 'nullable|string|max:5', 'position' => 'required|string|max:255', 'display_order' => 'required|integer|min:0', 'photo_path' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048']); if ($request->hasFile('photo_path')) { $path = $request->file('photo_path')->store('officials', 'public'); $validatedData['photo_path'] = $path; } Official::create($validatedData); return redirect()->route('admin.officials.index'); }
    
    public function officialsUpdate(Request $request, Official $official) { $validatedData = $request->validate(['first_name' => 'required|string|max:255', 'last_name' => 'required|string|max:255', 'middle_initial' => 'nullable|string|max:5', 'position' => 'required|string|max:255', 'display_order' => 'required|integer|min:0', 'photo_path' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048']); if ($request->hasFile('photo_path')) { if ($official->photo_path) { Storage::disk('public')->delete($official->photo_path); } $path = $request->file('photo_path')->store('officials', 'public'); $validatedData['photo_path'] = $path; } $official->update($validatedData); return redirect()->route('admin.officials.index'); }
    
    public function officialsDestroy(Official $official) { if ($official->photo_path) { Storage::disk('public')->delete($official->photo_path); } $official->delete(); return redirect()->route('admin.officials.index'); }
}