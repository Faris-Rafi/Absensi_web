<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Dashboard</title>
</head>

<body class="relative bg-yellow-50 overflow-hidden max-h-screen">
    
    @include('layouts.sidebar')

    <main class="ml-60 pt-16 max-h-screen overflow-auto">
        <div class="px-6 py-8">
            <div class="max-w-5xl mx-auto">
                <div class="bg-white rounded-3xl p-8 mb-5">
                    @yield('section')
                </div>
            </div>
        </div>
    </main>
</body>

</html>