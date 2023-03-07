<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="/css/iziModal.min.css">
    <title>{{ $title }} - Dashboard</title>
    <script src="{{ asset('js/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('js/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/izimodal/iziModal.min.js') }}"></script>
</head>

<body class="relative bg-yellow-100 overflow-hidden max-h-screen">

    @include('layouts.navbar')

    <main class="sm:ml-60 pt-16 max-h-screen overflow-auto">
        <div class="flex justify-center items-center w-full">
            <div class="bg-white rounded-3xl p-8 mb-5 md:w-1/4 w-1/2">
                <img src="/img/logo_hitam.png" alt="logo eksam.id" />
            </div>
        </div>
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
