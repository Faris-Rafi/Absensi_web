<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite('resources/css/app.css')
    <title>{{ $title }} - Dashboard</title>
    <script src="{{ asset('js/jquery/jquery.min.js') }}"></script>   
</head>

<body class="relative bg-yellow-50 overflow-hidden max-h-screen">
    
    @include('layouts.sidebar')

    <main class="ml-60 pt-16 max-h-screen overflow-auto">
        <div class="px-6 py-8">
            <div class="max-w-5xl mx-auto">
                @yield('section')
            </div>
        </div>
    </main>
</body>

</html>