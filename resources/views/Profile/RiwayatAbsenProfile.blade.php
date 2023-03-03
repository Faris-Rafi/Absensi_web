@extends('Profile.layouts.main')

@section('profileSection')
    <h1 class="text-3xl font-bold text-center my-5">Riwayat Absen</h1>
    <div class="flex flex-col">
        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                <div class="overflow-hidden">
                    <table class="min-w-full" id="absenTable">
                        <thead class="border-b border-black text-center">
                            <tr>
                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4">
                                    #
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
                                    Keterangan
                                </th>
                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4">
                                    Status
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
                                    @if ($attendance->presenceType && $attendance->presenceType->id === 1)
                                        <td
                                            class="text-sm border-r border-black text-white bg-green-800 font-light px-6 py-4 whitespace-nowrap">
                                            {{ $attendance->presenceType->name }}
                                        </td>
                                    @elseif ($attendance->presenceType && $attendance->presenceType->id === 2)
                                        <td
                                            class="text-sm border-r border-black text-white bg-red-800 font-light px-6 py-4 whitespace-nowrap">
                                            {{ $attendance->presenceType->name }}
                                        </td>
                                    @else
                                        <td class="text-sm border-r border-black font-light px-6 py-4 whitespace-nowrap">
                                            -
                                        </td>
                                    @endif
                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                        {{ $attendance->arrivalType->name }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <h1 class="text-3xl font-bold text-center mt-20 mb-5">Riwayat Cuti</h1>
    <div class="flex flex-col">
        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                <div class="overflow-hidden">
                    <table class="min-w-full" id="cutiTable">
                        <thead class="border-b border-black text-center">
                            <tr>
                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4">
                                    #
                                </th>
                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4">
                                    Tanggal Mulai
                                </th>
                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4">
                                    Tanggal Selesai
                                </th>
                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4">
                                    Status
                                </th>
                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4">
                                    Alasan
                                </th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @foreach ($requests as $request)
                                <tr class="border-b">
                                    <td
                                        class="border-r border-black px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                        {{ $loop->iteration }}</td>
                                    <td
                                        class="text-sm border-r border-black text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                        {{ $request->start_date }}
                                    </td>
                                    <td
                                        class="text-sm border-r border-black text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                        {{ $request->end_date }}
                                    </td>
                                    <td
                                        class="text-sm border-r border-black text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                        {{ $request->requestType->name }}
                                    </td>
                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                        {{ $request->reason }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <script>
            let absenTable = new DataTable('#absenTable')
            let cutiTable = new DataTable('#cutiTable')
        </script>
    @endsection
