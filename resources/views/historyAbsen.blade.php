@extends('layouts.main')

@section('section')
    <h1 class="text-3xl font-bold text-center mb-5">History Absen</h1>
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
                                    Kehadiran
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
                            @foreach ($absens as $absen)
                                <tr class="border-b">
                                    <td class="border-r border-black px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                        {{ $loop->iteration }}</td>
                                    <td class="text-sm border-r border-black text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                        {{ $absen->user->name }}
                                    </td>
                                    <td class="text-sm border-r border-black text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                        {{ $absen->tanggal }}
                                    </td>
                                    <td class="text-sm border-r border-black text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                        {{ $absen->jam_masuk }}
                                    </td>
                                    <td class="text-sm border-r border-black text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                        @if ($absen->jam_keluar == null)
                                            -
                                        @else
                                            {{ $absen->jam_keluar }}
                                        @endif
                                    </td>
                                    <td class="text-sm border-r border-black text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                        {{ $absen->lokasi }}
                                    </td>
                                    @if ($absen->kehadiran == 'Hadir')
                                        <td class="text-sm border-r border-black text-white bg-green-800 font-light px-6 py-4 whitespace-nowrap">
                                            {{ $absen->kehadiran }}
                                        </td>
                                    @elseif ($absen->kehadiran == 'Izin')
                                        <td class="text-sm border-r border-black text-white bg-yellow-800 font-light px-6 py-4 whitespace-nowrap">
                                            {{ $absen->kehadiran }}
                                        </td>
                                    @elseif ($absen->kehadiran == 'Sakit')
                                        <td class="text-sm border-r border-black text-white bg-red-800 font-light px-6 py-4 whitespace-nowrap">
                                            {{ $absen->kehadiran }}
                                        </td>
                                    @else
                                        <td class="text-sm border-r border-black bg-yellow-400 font-light px-6 py-4 whitespace-nowrap">
                                            {{ $absen->kehadiran }}
                                        </td>
                                    @endif
                                    @if ($absen->keterangan == 'Telat')
                                    <td class="text-sm border-r border-black text-white bg-red-800 font-light px-6 py-4 whitespace-nowrap">
                                        {{ $absen->keterangan }}
                                    </td>
                                    @else
                                    <td class="text-sm border-r border-black text-white bg-green-800 font-light px-6 py-4 whitespace-nowrap">
                                        {{ $absen->keterangan }}
                                    </td>
                                    @endif
                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                        {{ $absen->status }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
