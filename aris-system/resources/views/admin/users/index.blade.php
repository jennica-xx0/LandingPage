@extends('layouts.admin')

@section('title', 'Users')

@section('content')
<div class="page-head">
    <div class="page-title">USERS</div>
    <div class="actions">
        <a class="primary-btn" href="{{ route('admin.users.create') }}">
            <span>ADD USER</span><i class="fa-solid fa-circle-plus"></i>
        </a>
    </div>
</div>

<div class="card table-wrap">
    <table>
        <thead>
            <tr>
                <th style="width:35%">Name</th>
                <th style="width:35%">Email</th>
                <th style="width:15%">Created At</th>
                <th style="width:15%">Action</th>
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
                            <a href="{{ route('admin.users.show', $user) }}" class="icon-btn icon-view"><i class="fa-regular fa-eye"></i></a>
                            <button class="icon-btn icon-edit"><i class="fa-regular fa-pen-to-square"></i></button>
                            <button class="icon-btn icon-del"><i class="fa-solid fa-trash"></i></button>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center py-4">No users found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

@if ($users->hasPages())
    <div class="flex justify-end pt-6">
         {{ $users->links() }}
    </div>
@endif
@endsection