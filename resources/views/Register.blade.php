@extends('layouts.main')

@section('section')
    <div class="bg-white rounded-3xl p-8 mb-5">
        <h1 class="text-3xl font-bold text-center mb-5">{{ $head }}</h1>
        <div class="flex justify-center items-center w-full">
            <form action="/dashboard/register" method="post" class="w-1/2">
                @if (isset($user))
                    @method('put')
                @endif
                @csrf
                <div class="relative mt-8">
                    <input autocomplete="off" id="name" name="name" type="text"
                        class="peer placeholder-transparent h-10 border-b-2 border-gray-300 text-gray-900 focus:outline-none focus:borer-rose-600 w-full"
                        placeholder="Name" value="@if (isset($user)) {{ $user->name }} @endif" autofocus
                        required />
                    <label for="name"
                        class="absolute left-0 -top-3.5 text-gray-600 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-gray-600 peer-focus:text-sm">Nama
                        Lengkap</label>
                    @error('name')
                        <p class="text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="relative mt-8">
                    <input autocomplete="off" id="email" name="email" type="email"
                        class="peer placeholder-transparent h-10 border-b-2 border-gray-300 text-gray-900 focus:outline-none focus:borer-rose-600 w-full"
                        placeholder="email" value="@if (isset($user)) {{ $user->email }} @endif" required />
                    <label for="email"
                        class="absolute left-0 -top-3.5 text-gray-600 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-gray-600 peer-focus:text-sm">Email
                        Address</label>
                    @error('email')
                        <p class="text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                @if (!isset($user))
                    <div class="relative mt-8">
                        <input autocomplete="off" id="password" name="password" type="password"
                            class="peer placeholder-transparent h-10 border-b-2 border-gray-300 text-gray-900 focus:outline-none focus:borer-rose-600 w-full"
                            placeholder="password" required />
                        <label for="password"
                            class="absolute left-0 -top-3.5 text-gray-600 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-gray-600 peer-focus:text-sm">Password</label>
                        @error('password')
                            <p class="text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                @endif
                <div class="relative mt-8">
                    <input autocomplete="off" id="leave_limit" name="leave_limit" type="text"
                        class="peer placeholder-transparent h-10 border-b-2 border-gray-300 text-gray-900 focus:outline-none focus:borer-rose-600 w-full"
                        placeholder="leave_limit" value="@if (isset($user)) {{ $user->leave_limit }} @endif"
                        required />
                    <label for="leave_limit"
                        class="absolute left-0 -top-3.5 text-gray-600 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-gray-600 peer-focus:text-sm">Batas
                        Cuti</label>
                    @error('leave_limit')
                        <p class="text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="relative my-5">
                    <button
                        class="bg-blue-500 hover:bg-blue-700 transition text-white rounded-md px-2 py-1 w-full">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection
