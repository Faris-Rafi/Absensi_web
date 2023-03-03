@extends('auth.layouts.main')

@section('section')
    <div class="relative px-4 py-10 bg-white shadow-lg sm:rounded-3xl sm:p-20">
        @if (session()->has('error'))
            <div class="mb-5">
                <div class="text-gray-300 text-center font-semibold text-sm bg-red-900 p-2 rounded-md border-gray-500">
                    {{ session('error') }}
                </div>
            </div>
        @endif
        <div class="w-full mx-auto">
            <h1 class="text-2xl font-semibold text-center">Login Absen Karyawan</h1>
            <div class="divide-y divide-gray-200">
                <div class="py-8 text-base leading-6 space-y-4 text-gray-700 sm:text-lg sm:leading-7">
                    <form action="/" method="post">
                        @csrf
                        <div class="relative my-1">
                            <input autocomplete="off" id="email" name="email" type="text"
                                class="peer placeholder-transparent h-10 w-full border-b-2  @error('email') border-red-500 @else border-gray-300 @enderror text-gray-900 focus:outline-none focus:borer-rose-600"
                                placeholder="Email address" value="{{ old('email') }}" autofocus required />
                            <label for="email"
                                class="absolute left-0 -top-3.5 text-gray-600 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-gray-600 peer-focus:text-sm">Email
                                Address</label>
                            @error('email')
                                <div class="text-red-500 font-semibold text-sm">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="relative my-5">
                            <input autocomplete="off" id="password" name="password" type="password"
                                class="peer placeholder-transparent h-10 w-full border-b-2 border-gray-300 text-gray-900 focus:outline-none focus:borer-rose-600"
                                placeholder="Password" required />
                            <label for="password"
                                class="absolute left-0 -top-3.5 text-gray-600 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-gray-600 peer-focus:text-sm">Password</label>
                        </div>
                        <div class="relative my-5">
                            <button class="bg-blue-500 hover:bg-blue-700 transition text-white rounded-md px-2 py-1 w-full">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
