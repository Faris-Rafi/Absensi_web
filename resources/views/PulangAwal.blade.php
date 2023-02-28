@extends('layouts.main')

@section('section')
    <div class="bg-white rounded-3xl p-8 mb-5">
        <h1 class="text-3xl font-bold text-center mb-5">Pengajuan Pulang Awal</h1>
        <div class="flex flex-col">
            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="overflow-hidden">
                        <table class="min-w-full">
                            <thead class="border-b border-black text-center">
                                <tr>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4">
                                        #
                                    </th>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4">
                                        Name
                                    </th>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4">
                                        Tanggal
                                    </th>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4">
                                        Jam Masuk
                                    </th>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4">
                                        Jam Keluar
                                    </th>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4">
                                        Lokasi
                                    </th>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4">
                                        Alasan
                                    </th>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                @foreach ($attendances as $attendance)
                                    <tr class="border-b">
                                        <td
                                            class="border-r border-black px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                            {{ $loop->iteration }}</td>
                                        <td
                                            class="text-sm border-r border-black text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            {{ $attendance->user->name }}
                                        </td>
                                        <td
                                            class="text-sm border-r border-black text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            {{ $attendance->date }}
                                        </td>
                                        <td
                                            class="text-sm border-r border-black text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            {{ $attendance->clock_in }}
                                        </td>
                                        <td
                                            class="text-sm border-r border-black text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            @if ($attendance->clock_out === null)
                                                -
                                            @else
                                                {{ $attendance->clock_out }}
                                            @endif
                                        </td>
                                        <td
                                            class="text-sm border-r border-black text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            {{ $attendance->location->name }}
                                        </td>
                                        <td
                                            class="text-sm border-r border-black text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            {{ $attendance->reason }}
                                        </td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap flex">
                                            <form action="/dashboard/pulang-awal/approve/{{ $attendance->uuid }}" method="post">
                                                @csrf
                                                <button class="bg-green-900 text-green-200 p-2 font-semibold rounded-md mr-1">Approve</button>
                                            </form>
                                            <form action="/dashboard/pulang-awal/reject/{{ $attendance->uuid }}" method="post">
                                                @csrf
                                                <button class="bg-red-900 text-red-200 p-2 font-semibold rounded-md ml-1">Reject</button>
                                            </form>
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
