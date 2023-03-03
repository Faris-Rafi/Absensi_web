@extends('layouts.main')

@section('section')
    <div class="bg-white rounded-3xl p-8 mb-5">
        <div class="flex flex-col justify-center items-center">
            <h1 class="font-bold text-xl mb-8">{{ auth()->user()->name }}</h1>
            <div class="flex justify-center items-center mb-8 w-full">
                <a href="/dashboard/profile"
                    class="mx-5 font-medium border-b-2 border-b-gray-500 hover:border-blue-600">Profile</a>
                <a href="/dashboard/profile/riwayat" class="mx-5 font-medium border-b-2 border-b-gray-500 hover:border-blue-600">Riwayat
                    Absen</a>
            </div>
        </div>
        @yield('profileSection')
    </div>
@endsection
