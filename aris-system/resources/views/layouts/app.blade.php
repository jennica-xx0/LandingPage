<!DOCTYPE html>
<html lang="en" data-theme="light"> <!-- Set a default DaisyUI theme -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'BARIS - Barangay Daang Bakal')</title>

    <!-- This links your compiled CSS and JS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-base-200">

    <!-- All page content will be injected here -->
    @yield('content')

</body>
</html>