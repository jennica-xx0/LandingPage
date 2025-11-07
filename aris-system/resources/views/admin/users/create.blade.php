@extends('layouts.admin')

@section('title', 'Add User')

@section('content')
<h2 class="text-2xl font-bold mb-6">Add New User</h2>
<div class="bg-white p-8 rounded-lg shadow-md">
    <p class="text-gray-600">This feature is currently under development.</p>
    <div class="mt-6 flex justify-end">
        <a href="{{ route('admin.users.index') }}" class="btn btn-ghost">Back to User List</a>
    </div>
</div>
@endsection