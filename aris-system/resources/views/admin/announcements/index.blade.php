@extends('layouts.admin')

@section('title', 'Manage Announcements')

@section('content')
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold">Announcements List</h2>
        <a href="{{ route('admin.announcements.create') }}" class="btn btn-primary">Create New Announcement</a>
    </div>

    <div class="overflow-x-auto bg-white rounded-lg shadow">
        <table class="table w-full">
            <thead class="bg-slate-50">
                <tr>
                    <th class="p-4 text-left text-sm font-semibold text-slate-600">Title</th>
                    <th class="p-4 text-left text-sm font-semibold text-slate-600">Content</th>
                    <th class="p-4 text-left text-sm font-semibold text-slate-600">Start Date</th>
                    <th class="p-4 text-left text-sm font-semibold text-slate-600">End Date</th>
                    <th class="p-4 text-left text-sm font-semibold text-slate-600 w-48">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($announcements as $announcement)
                    <tr class="border-b border-slate-100">
                        <td class="p-4 text-slate-700">{{ $announcement->title }}</td>
                        <td class="p-4 text-slate-500 text-sm">{{ Str::limit($announcement->content, 80) }}</td>
                        <td class="p-4 text-slate-500">{{ $announcement->start_date ? \Carbon\Carbon::parse($announcement->start_date)->format('M d, Y') : 'N/A' }}</td>
                        <td class="p-4 text-slate-500">{{ $announcement->end_date ? \Carbon\Carbon::parse($announcement->end_date)->format('M d, Y') : 'N/A' }}</td>
                        <td class="p-4 flex gap-2">
                            <a href="{{ route('admin.announcements.edit', $announcement->id) }}" class="btn btn-xs btn-outline btn-info">Edit</a>
                            <form action="{{ route('admin.announcements.destroy', $announcement->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this announcement?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-xs btn-outline btn-error">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center py-10">
                            <p class="text-gray-500">No announcements found. Please create one.</p>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection