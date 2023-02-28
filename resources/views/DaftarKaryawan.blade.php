@extends('layouts.main')

@section('section')
    <div class="bg-white rounded-3xl p-8 mb-5">
        <h1 class="text-3xl font-bold text-center mb-5">Daftar Karyawan</h1>
        <div class="flex flex-col">
            <div class="flex justify-end items-center">
                <a href="/dashboard/register" class="bg-green-300 p-3 rounded-lg text-sm">Tambah Karyawan +</a>
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
                                            <a href="/dashboard/daftar-karyawan/edit/{{ $user->email }}" class="bg-green-300 text-green-800 p-2 mx-2 rounded-lg">Edit</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
