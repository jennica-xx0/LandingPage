@extends('layouts.admin')

@section('title', 'User Management')

@section('content')
<div class="page-head">
    <div class="page-title">USERS</div>
</div>

<div class="flex justify-end items-center mb-6">
    <a href="{{ route('admin.users.create') }}" class="primary-btn">
        <span>ADD USER</span><i class="fa-solid fa-circle-plus"></i>
    </a>
</div>

<div class="card table-wrap">
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Date Registered</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->created_at->format('m/d/Y') }}</td>
                <td>
                    <div class="col-actions">
                        <a href="{{ route('admin.users.show', $user) }}" class="icon-btn icon-view" title="View">
                            <i class="fa-regular fa-eye"></i>
                        </a>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4" class="text-center py-4">No users found. (Feature is under development)</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

@if ($users->hasPages())
<div class="flex justify-end pt-4">
    {{ $users->links() }}
</div>
@endif
@endsection