@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
    <p class="text-xl font-semibold mb-6">Welcome to the ARIS Admin Panel!</p>
    <p class="text-slate-600 mb-8">
        This is the central hub for managing the content and users of the Barangay Daang Bakal website. You can manage announcements, update the list of officials, and oversee registered users from the sidebar navigation.
    </p>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <div class="bg-slate-50 p-6 rounded-lg border border-slate-200">
            <h3 class="font-bold text-lg mb-2">Manage Announcements</h3>
            <p class="text-slate-500 mb-4">Create, edit, and publish news and updates for the community.</p>
            <a href="{{ route('admin.announcements.index') }}" class="btn btn-sm btn-primary">Go to Announcements</a>
        </div>

        <div class="bg-slate-50 p-6 rounded-lg border border-slate-200">
            <h3 class="font-bold text-lg mb-2">Manage Officials</h3>
            <p class="text-slate-500 mb-4">Update the list and photos of current barangay officials.</p>
            <a href="#" class="btn btn-sm btn-primary">Go to Officials</a>
        </div>
    </div>
@endsection