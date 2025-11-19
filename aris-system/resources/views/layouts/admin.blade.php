<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>@yield('title', 'Admin Panel') | Barangay Daang Bakal</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
  <div class="app">
    <header class="topbar">
      <div class="brand">
        <img src="{{ asset('img/mandaluyonglogo.jpg') }}" alt="Mandaluyong Logo">
        <img src="{{ asset('img/barangaylogo.jpg') }}" alt="Barangay Logo">
        <div class="meta">
          <span>Barangay Daang Bakal</span>
          <span>Mandaluyong City</span>
        </div>
      </div>
      <div class="top-actions">
        <button class="text-white text-xl p-2 rounded-full hover:bg-white/10 transition-colors">
          <i class="fa-regular fa-bell"></i>
        </button>
        <div class="user-dropdown">
          <div class="w-9 h-9 rounded-full bg-gray-200 grid place-items-center cursor-pointer">
            <i class="fa-solid fa-user text-gray-700"></i>
          </div>
          <div class="dropdown-menu"><a href="#">User Profile</a>
            <form method="POST" action=""><button type="submit">Logout</button></form>
          </div>
        </div>
      </div>
    </header>
    <aside class="sidebar" id="sidebar">
      <div class="toggle">
        <button id="sidebar-toggle" class="hamburger-btn"></button>
      </div>
      <nav class="nav">
        <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}"><i class="fa-solid fa-table-columns"></i><span>Dashboard</span></a>
        <a href="#" class=""><i class="fa-solid fa-users"></i><span>Users</span></a>
        <a href="#"><i class="fa-solid fa-file-lines"></i><span>Document Request</span></a>
        <a href="#"><i class="fa-solid fa-file-pen"></i><span>Complaints</span></a>
        <a href="#"><i class="fa-solid fa-user-tie"></i><span>Staffs</span></a>
        <a href="{{ route('admin.officials.index') }}" class="{{ request()->routeIs('admin.officials.*') ? 'active' : '' }}"><i class="fa-solid fa-user-group"></i><span>Barangay Officials</span></a>
        <a href="{{ route('admin.announcements.index') }}" class="{{ request()->routeIs('admin.announcements.*') ? 'active' : '' }}"><i class="fa-solid fa-bullhorn"></i><span>Announcements</span></a>
        <a href="#"><i class="fa-solid fa-chart-line"></i><span>Reports & Analytics</span></a>
        <a href="#"><i class="fa-solid fa-desktop"></i><span>Audit Logs</span></a>
      </nav>
    </aside>
    <main class="content">
      @yield('content')
    </main>
  </div>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const app = document.querySelector('.app');
      const sidebarToggle = document.getElementById('sidebar-toggle');

      if (sidebarToggle) {
        sidebarToggle.addEventListener('click', () => {
          app.classList.toggle('sidebar-collapsed');
        });
      }
    });
  </script>
  @stack('scripts')
</body>

</html>