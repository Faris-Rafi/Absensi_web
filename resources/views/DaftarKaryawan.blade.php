@extends('layouts.main')

@section('section')
    <div class="bg-white rounded-3xl p-8 mb-5">
        <h1 class="text-3xl font-bold text-center mb-5">Daftar Karyawan</h1>
        <div class="flex flex-col">
            <div class="flex flex-row justify-between items-center">
                <div class="flex justify-start items-start">
                    <form action="/dashboard/daftar-karyawan">
                        <div class="relative flex rounded-md shadow-sm">
                            <input type="text" id="hs-trailing-button-add-on-with-icon-and-button" name="search"
                                class="py-2 px-3 pl-11 block w-full border-gray-200 shadow-md rounded-l-md text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500" value="{{ request('search') }}">
                            <div class="absolute inset-y-0 left-0 flex items-center pointer-events-none z-20 pl-4">
                                <svg class="h-4 w-4 text-gray-400" xmlns="http://www.w3.org/2000/svg" width="16"
                                    height="16" fill="currentColor" viewBox="0 0 16 16">
                                    <path
                                        d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                                </svg>
                            </div>
                            <button type="submit"
                                class="py-2 px-3 inline-flex flex-shrink-0 justify-center items-center rounded-r-md border border-transparent shadow-md font-semibold bg-blue-500 text-white hover:bg-blue-600 focus:z-10 focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all text-sm">Search</button>
                        </div>
                    </form>
                </div>
                <div class="flex justify-end items-end">
                    <a href="/dashboard/register" class="bg-green-300 p-3 rounded-lg text-sm">Tambah Karyawan +</a>
                </div>
            </div>
            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="overflow-hidden">
                        <table class="min-w-full">
                            <thead class="border-b text-center">
                                <tr>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4">
                                        #
                                    </th>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4">
                                        Name
                                    </th>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4">
                                        Email
                                    </th>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4">
                                        Batas Cuti
                                    </th>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($users->count() === 0)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 text-center"
                                            colspan="5">
                                            TIDAK ADA DATA
                                        </td>
                                    </tr>
                                @endif
                                @foreach ($users as $user)
                                    <tr class="border-b text-center">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                            {{ $loop->iteration }}</td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            {{ $user['name'] }}
                                        </td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            {{ $user['email'] }}
                                        </td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            {{ $user['leave_limit'] }}
                                        </td>
                                        <td class="text-sm flex justify-center font-semibold px-6 py-4 whitespace-nowrap">
                                            <form action="/dashboard/daftar-karyawan/{{ $user->email }}" method="post">
                                                @method('delete')
                                                @csrf
                                                <button type="submit" class="bg-red-300 text-red-800 p-2 mx-2 rounded-lg"
                                                    onclick="return confirm('Are you sure?')">Delete</button>
                                            </form>
                                            <a href="/dashboard/daftar-karyawan/edit/{{ $user->email }}"
                                                class="bg-green-300 text-green-800 p-2 mx-2 rounded-lg">Edit</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex justify-center items-center">
            {{ $users->links('pagination::simple-tailwind') }}
        </div>
    </div>
@endsection
