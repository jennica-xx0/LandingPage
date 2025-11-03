@extends('layouts.app')

@section('title', 'Welcome to Barangay Daang Bakal')

@section('content')

<x-public.navbar />

<x-public.announcement-ticker :announcements="$announcements" />

<x-public.hero />

<x-public.announcements-list :announcements="$announcements" />

<x-public.services />

<x-public.about />

<x-public.officials :captain="$captain" :kagawads="$kagawads" />

<x-public.faq />

<x-public.footer />

@endsection