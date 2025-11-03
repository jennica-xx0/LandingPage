@extends('layouts.app')

@section('title', $announcement->title)

@section('content')
    <x-public.navbar />

    <div class="bg-white py-12">
        <div class="container mx-auto max-w-4xl px-4 sm:px-6 lg:px-8">
            <article class="prose max-w-none">
                <h1 class="text-3xl md:text-4xl font-bold text-slate-800">{{ $announcement->title }}</h1>
                
                @php
                    $displayDate = $announcement->start_date ? \Carbon\Carbon::parse($announcement->start_date) : $announcement->created_at;
                @endphp
                <div class="flex items-center text-sm text-gray-500 my-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1.5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />
                    </svg>
                    <span>Posted on: {{ $displayDate->format('F d, Y') }}</span>
                </div>

                @if($announcement->image_path)
                    <figure class="mb-8">
                        <img src="{{ asset('storage/' . $announcement->image_path) }}" alt="{{ $announcement->title }}" class="w-full h-auto rounded-lg shadow-md object-cover">
                    </figure>
                @endif
                
                <div class="text-lg text-slate-700 leading-relaxed">
                    {!! nl2br(e($announcement->content)) !!}
                </div>
            </article>

            <div class="mt-12 border-t pt-6">
                <a href="{{ route('home') }}#announcements" class="text-blue-600 hover:text-blue-800 hover:underline">
                    &larr; Back to all announcements
                </a>
            </div>
        </div>
    </div>
    
    <x-public.footer />
@endsection