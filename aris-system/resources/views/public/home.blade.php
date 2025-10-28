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
    {{-- <x-public.services /> --}} <!-- We will add this next -->

    <!-- About Us Section -->
    {{-- <x-public.about /> --}} <!-- We will add this next -->

    <!-- Barangay Officials Section -->
    {{-- <x-public.officials /> --}} <!-- We will add this next -->
    
    <!-- FAQ Section -->
    {{-- <x-public.faq /> --}} <!-- We will add this next -->

    <!-- Footer Section -->
    {{-- <x-public.footer /> --}} <!-- We will add this next -->

@endsection