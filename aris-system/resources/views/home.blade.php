@extends('layouts.app')

@section('title', 'Welcome to Barangay Daang Bakal')

@section('content')

<x-public.navbar />

<x-public.announcement-ticker />

<x-public.hero />

<x-public.announcements-list />

<x-public.services />

<x-public.about />

<x-public.officials />

<x-public.faq />

<x-public.footer />

@endsection