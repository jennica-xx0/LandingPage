<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - ARIS</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-100 font-sans">

    <div class="flex min-h-screen">
        <aside class="w-64 bg-slate-800 text-white flex-shrink-0 flex flex-col">
            <div>
                <div class="p-6 text-2xl font-bold border-b border-slate-700">
                    ARIS Admin
                </div>
                <nav class="mt-6">
                    <a href="{{ route('admin.dashboard') }}" class="block py-3 px-6 text-slate-300 hover:bg-slate-700 hover:text-white transition-colors">Dashboard</a>
                    <a href="{{ route('admin.announcements.index') }}" class="block py-3 px-6 text-slate-300 hover:bg-slate-700 hover:text-white transition-colors">Announcements</a>
                    <a href="{{ route('admin.officials.index') }}" class="block py-3 px-6 text-slate-300 hover:bg-slate-700 hover:text-white transition-colors">Officials</a>
                    <a href="#" class="block py-3 px-6 text-slate-300 hover:bg-slate-700 hover:text-white transition-colors">Users</a>
                </nav>
            </div>
           
        </aside>

        <main class="flex-1">
            <header class="bg-white shadow-sm">
                <div class="max-w-7xl mx-auto py-4 px-4 sm:px-6 lg:px-8 flex justify-between items-center">
                    <h1 class="text-2xl font-semibold text-slate-800">
                        @yield('title', 'Dashboard')
                    </h1>
                </div>
            </header>

            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 bg-white border-b border-gray-200">
                            @yield('content')
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

</body>
</html>