@extends('layouts.app')

@section('title', 'Welcome to Barangay Daang Bakal')

@section('content')

<!-- Topbar / Navbar -->
<x-public.navbar />

<!-- Announcement Ticker -->
<x-public.announcement-ticker />

<!-- Hero Section -->
<x-public.hero />

<!-- Announcements List Section -->
<x-public.announcements-list />

<!-- Barangay Services Section -->
<x-public.services />

<!-- About Us Section -->
<x-public.about />

<!-- Barangay Officials Section -->
<x-public.officials />

<!-- FAQ Section -->
<x-public.faq />

<!-- Footer Section -->
<x-public.footer />

@endsection