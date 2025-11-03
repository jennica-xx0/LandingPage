@extends('layouts.admin')

@section('title', 'Manage Barangay Officials')

@section('content')
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold">Barangay Officials List</h2>
        <a href="{{ route('admin.officials.create') }}" class="btn btn-primary">Add New Official</a>
    </div>

    <div class="overflow-x-auto bg-white rounded-lg shadow">
        <table class="table w-full">
            <thead class="bg-slate-50">
                <tr>
                    <th class="p-4 text-left text-sm font-semibold text-slate-600">Name</th>
                    <th class="p-4 text-left text-sm font-semibold text-slate-600">Position</th>
                    <th class="p-4 text-left text-sm font-semibold text-slate-600">Display Order</th>
                    <th class="p-4 text-left text-sm font-semibold text-slate-600 w-48">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($officials as $official)
                    <tr class="border-b border-slate-100">
                        <td class="p-4 text-slate-700 font-medium">{{ $official->first_name }} {{ $official->middle_initial }} {{ $official->last_name }}</td>
                        <td class="p-4 text-slate-500">{{ $official->position }}</td>
                        <td class="p-4 text-slate-500">{{ $official->display_order }}</td>
                        <td class="p-4 flex gap-2">
                            <a href="{{ route('admin.officials.edit', $official->id) }}" class="btn btn-xs btn-outline btn-info">Edit</a>
                            <form action="{{ route('admin.officials.destroy', $official->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this official?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-xs btn-outline btn-error">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center py-10">
                            <p class="text-gray-500">No officials found. Please add one.</p>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection