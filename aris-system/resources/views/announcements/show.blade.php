@extends('layouts.app')

@section('title', $announcement->title)

@section('content')

<x-public.navbar />

<div class="bg-base-100 py-16 px-4 sm:px-8">
    <div class="container mx-auto max-w-4xl">

        <div class="text-center mb-12">
            @php
                $displayDate = $announcement->start_date ? \Carbon\Carbon::parse($announcement->start_date) : $announcement->created_at;
            @endphp
            <p class="text-lg font-semibold text-blue-800">{{ $displayDate->format('F d, Y') }}</p>
            <h1 class="text-4xl sm:text-5xl font-bold text-slate-800 mt-2">{{ $announcement->title }}</h1>
        </div>

        <div class="prose max-w-none text-lg text-slate-700 leading-relaxed text-justify">
            <p>
                {!! nl2br(e($announcement->content)) !!}
            </p>
        </div>

        <div class="text-center mt-16">
            <a href="{{ url('/#announcements') }}" class="btn btn-outline btn-primary">
                &larr; Back to All Announcements
            </a>
        </div>

    </div>
</div>

<x-public.footer />

@endsection