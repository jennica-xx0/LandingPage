@extends('layouts.admin')

@section('title', 'View Announcement')

@section('content')
    <div class="d-flex align-items-center justify-content-between mb-3">
        <h1 class="h4 mb-0">View Announcement</h1>
        <a href="{{ route('admin.announcements.index') }}" class="btn btn-sm btn-link">
            &larr; Back to Announcements
        </a>
    </div>

    <div class="card">
        <div class="card-header">
            <h5 class="card-title mb-0">{{ $announcement->title }}</h5>
        </div>
        <div class="card-body">
            <p class="text-muted mb-3">
                Created on: {{ $announcement->created_at->format('F d, Y \a\t h:i A') }}
            </p>
            <div class="prose">
                {!! nl2br(e($announcement->content)) !!}
            </div>
        </div>
        <div class="card-footer text-end">
            <a href="{{ route('admin.announcements.edit', $announcement) }}" class="btn btn-primary">Edit</a>
        </div>
    </div>
@endsection