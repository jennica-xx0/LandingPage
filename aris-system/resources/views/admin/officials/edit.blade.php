@extends('layouts.admin')

@section('title', 'Edit Official')

@section('content')
<h2 class="text-2xl font-bold mb-6">Edit Barangay Official</h2>

<form action="{{ route('admin.officials.update', $official->id) }}" method="POST" enctype="multipart/form-data" class="bg-white p-8 rounded-lg shadow-md space-y-6">
    @csrf
    @method('PUT')

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div>
            <label for="first_name" class="block text-sm font-medium text-gray-700">First Name</label>
            <input type="text" name="first_name" id="first_name" class="input input-bordered w-full mt-1" value="{{ old('first_name', $official->first_name) }}" required>
        </div>
        <div>
            <label for="middle_initial" class="block text-sm font-medium text-gray-700">Middle Initial</label>
            <input type="text" name="middle_initial" id="middle_initial" class="input input-bordered w-full mt-1" value="{{ old('middle_initial', $official->middle_initial) }}">
        </div>
        <div>
            <label for="last_name" class="block text-sm font-medium text-gray-700">Last Name</label>
            <input type="text" name="last_name" id="last_name" class="input input-bordered w-full mt-1" value="{{ old('last_name', $official->last_name) }}" required>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
            <label for="position" class="block text-sm font-medium text-gray-700">Position</label>
            <input type="text" name="position" id="position" class="input input-bordered w-full mt-1" value="{{ old('position', $official->position) }}" required>
        </div>
        <div>
            <label for="display_order" class="block text-sm font-medium text-gray-700">Display Order</label>
            <input type="number" name="display_order" id="display_order" class="input input-bordered w-full mt-1" value="{{ old('display_order', $official->display_order) }}" required>
        </div>
    </div>

    <div>
        <label for="photo_path" class="block text-sm font-medium text-gray-700">Photo</label>
        <input type="file" name="photo_path" id="photo_path" class="file-input file-input-bordered w-full mt-1">
        @if ($official->photo_path)
        <div class="mt-4">
            <p class="text-sm text-gray-500">Current Photo:</p>
            <img src="{{ asset('storage/' . $official->photo_path) }}" alt="Current Photo" class="mt-2 h-24 w-24 rounded-md object-cover">
        </div>
        @endif
    </div>

    <div class="flex justify-end space-x-4">
        <a href="{{ route('admin.officials.index') }}" class="btn btn-ghost">Cancel</a>
        <button type="submit" class="btn btn-primary">Update Official</button>
    </div>
</form>
@endsection