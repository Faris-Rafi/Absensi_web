@extends('layouts.main')

@section('section')
    @if (session()->has('success'))
        <div class="w-full bg-green-600 text-center text-white">
            {{ session('success') }}
        </div>
    @endif
    <div class="bg-white rounded-3xl p-8 mb-5">
        <h1 class="text-3xl font-bold text-center mb-5">Daftar Karyawan</h1>
        <div class="flex flex-col">
            <div class="flex justify-end items-end">
                <a href="/dashboard/register"
                    class="bg-green-500 hover:bg-green-700 transition text-white p-3 rounded-lg text-sm">Tambah Karyawan
                    +</a>
            </div>
            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="overflow-hidden">
                        <table class="min-w-full" id="karyawanTable">
                            <thead>
                                <tr>
                                    <th>
                                        #
                                    </th>
                                    <th>
                                        Name
                                    </th>
                                    <th>
                                        Email
                                    </th>
                                    <th>
                                        Batas Cuti
                                    </th>
                                    <th>
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                @foreach ($users as $user)
                                    <tr>
                                        <td>
                                            {{ $loop->iteration }}</td>
                                        <td>
                                            {{ $user['name'] }}
                                        </td>
                                        <td>
                                            {{ $user['email'] }}
                                        </td>
                                        <td>
                                            {{ $user['leave_limit'] }}
                                        </td>
                                        <td class="text-sm flex justify-center font-semibold px-6 py-4 whitespace-nowrap">
                                            <form action="/dashboard/daftar-karyawan/{{ $user->email }}" method="post">
                                                @method('delete')
                                                @csrf
                                                <button type="submit"
                                                    class="bg-red-500 hover:bg-red-700 transition text-white p-2 mx-2 rounded-lg"
                                                    onclick="return confirm('Are you sure?')">Delete</button>
                                            </form>
                                            <a href="/dashboard/daftar-karyawan/edit/{{ $user->email }}"
                                                class="bg-green-500 hover:bg-green-700 transition text-white p-2 mx-2 rounded-lg">Edit</a>
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
    <script>
        let karyawanTable = new DataTable('#karyawanTable')
    </script>
@endsection
