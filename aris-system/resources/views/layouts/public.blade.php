@extends('layouts.app')

@section('content')
    <!-- Page specific content will go here -->
    <div class="container mx-auto p-4">
         @yield('page-content')
    </div>

    <!-- DaisyUI Footer -->
    <footer class="footer p-10 bg-neutral text-neutral-content">
        <!-- Add footer content here -->
    </footer>
@endsection