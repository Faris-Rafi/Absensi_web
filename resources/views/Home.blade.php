@extends('layouts.main')

@section('section')
    @if (session()->has('success'))
    <div class="w-full bg-green-600 text-center text-white">
        {{ session('success') }}
    </div>
    @endif
    <div class="bg-white rounded-3xl p-8 mb-5">
        <h1 class="text-3xl font-bold text-center mb-5">Welcome, {{ auth()->user()->name }}!</h1>
        @if ($user->request_type_id === 1 || $user->request_type_id === 3)
            <h1 class="text-xl font-semibold text-center">Selamat Menikmati Cuti Anda!</h1>
            <p class="text-center mt-5">Tanggal Selesai : {{ $request->end_date }}</p>
        @elseif ($user->request_type_id === 2)
            <h1 class="text-xl font-semibold text-center">Semoga Lekas Sembuh</h1>
            <p class="text-center mt-5">Tanggal Selesai : {{ $request->end_date }}</p>
        @else
            <div class="flex justify-center items-center">
                <div class="p-4">
                    <p id="timeNow"></p>
                </div>
                <div class="p-4">
                    <p>Waktu Masuk Kerja : {{ $timeLimit }}</p>
                </div>
            </div>
            @if ($user->attendance->count() == 0)
                <div class="p-4 text-center">
                    <p class="mb-5">Anda Belum Absen</p>
                    <a href="/dashboard/absen" class="bg-blue-300 p-2 rounded-lg text-sm">Absen Sekarang</a>
                </div>
            @else
                <div class="p-4 text-center">
                    <p>Anda Sudah Absen</p>
                </div>
            @endif
        @endif
    </div>
    <script>
        const displayTime = () => {
            const date = new Date();
            const time = date.toLocaleTimeString('en-US', {
                hour12: false,
                hour: '2-digit',
                minute: '2-digit',
                second: '2-digit'
            });
            document.getElementById('timeNow').innerHTML = `Waktu Sekarang : ${time}`;
        }
        setInterval(displayTime, 1000);
    </script>
@endsection
