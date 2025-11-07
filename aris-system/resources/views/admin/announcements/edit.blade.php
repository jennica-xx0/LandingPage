@extends('layouts.admin')

@section('title', 'Edit Announcement')

@section('content')
<h2 class="text-2xl font-bold mb-6">Edit Announcement</h2>

<form action="{{ route('admin.announcements.update', $announcement->id) }}" method="POST" class="bg-white p-8 rounded-lg shadow-md space-y-6">
    @csrf
    @method('PUT')

    <div>
        <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
        <input type="text" name="title" id="title" class="input input-bordered w-full mt-1" value="{{ old('title', $announcement->title) }}" required>
    </div>

    <div>
        <label for="content" class="block text-sm font-medium text-gray-700">Content</label>
        <textarea name="content" id="content" rows="6" class="textarea textarea-bordered w-full mt-1" required>{{ old('content', $announcement->content) }}</textarea>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
            <label for="start_date" class="block text-sm font-medium text-gray-700">Start Date (Optional)</label>
            <input type="date" name="start_date" id="start_date" class="input input-bordered w-full mt-1" value="{{ old('start_date', $announcement->start_date) }}">
            <p class="text-xs text-gray-500 mt-1">The date the announcement becomes visible.</p>
        </div>
        <div>
            <label for="end_date" class="block text-sm font-medium text-gray-700">End Date (Optional)</label>
            <input type="date" name="end_date" id="end_date" class="input input-bordered w-full mt-1" value="{{ old('end_date', $announcement->end_date) }}">
            <p class="text-xs text-gray-500 mt-1">The date the announcement expires.</p>
        </div>
    </div>

    <div class="flex justify-end space-x-4">
        <a href="{{ route('admin.announcements.index') }}" class="btn btn-ghost">Cancel</a>
        <button type="submit" class="btn btn-primary">Update Announcement</button>
    </div>
</form>
@endsection