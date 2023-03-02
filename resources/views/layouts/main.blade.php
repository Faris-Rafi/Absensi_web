<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="/css/jquery.dataTables.min.css">
    <title>{{ $title }} - Dashboard</title>
    <script src="{{ asset('js/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('js/datatables/jquery.dataTables.min.js') }}"></script>
</head>

<body class="relative bg-yellow-50 overflow-hidden max-h-screen">

    @include('layouts.navbar')

    <main class="sm:ml-60 pt-16 max-h-screen overflow-auto">
        <div class="px-6 py-8">
            <div class="max-w-5xl mx-auto">
                @yield('section')
            </div>
        </div>
    </main>

    <script>
        const linksButton = document.getElementById('linksButton')
        const navLinks = document.getElementById('navLinks')
        let isNavLinksVisible = false

        linksButton.addEventListener('click', function() {
            if (isNavLinksVisible) {
                navLinks.classList.add('hidden')
                navLinks.classList.remove('block')
                isNavLinksVisible = false
            } else {
                navLinks.classList.remove('hidden')
                navLinks.classList.add('block')
                isNavLinksVisible = true
            }
        })
    </script>
</body>

</html>
