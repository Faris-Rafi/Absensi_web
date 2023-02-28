@extends('layouts.main')

@section('section')
    <div class="bg-white rounded-3xl p-8 mb-20">
        <h1 class="text-3xl font-bold text-center mb-5">Absen Hari ini</h1>
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
                                        Jam Bekerja
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
                                    @if ($attendance->date == $timeNow->format('d-m-Y'))
                                        <tr class="border-b">
                                            <td
                                                class="border-r border-black px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                {{ $loop->index + 1 }}</td>
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
                                                @if ($attendance->work_duration === null)
                                                    -
                                                @else
                                                    {{ $attendance->work_duration }}
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
                                            @elseif ($attendance->presenceType && $attendance->presenceType->id === 3)
                                                <td
                                                    class="text-sm border-r border-black text-white bg-yellow-800 font-light px-6 py-4 whitespace-nowrap">
                                                    {{ $attendance->presenceType->name }}
                                                </td>
                                            @else
                                                <td
                                                    class="text-sm border-r border-black text-black font-light px-6 py-4 whitespace-nowrap">
                                                    -
                                                </td>
                                            @endif
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                {{ $attendance->arrivalType->name }}
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-white rounded-3xl p-8 mb-20">
        <h1 class="text-3xl font-bold text-center mb-5">Riwayat Kehadiran</h1>
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
                                        Durasi Bekerja
                                    </th>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4">
                                        Durasi Telat
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
                                            @if ($attendance->work_duration === null)
                                                -
                                            @else
                                                {{ $attendance->work_duration }}
                                            @endif
                                        </td>
                                        <td
                                            class="text-sm border-r border-black text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            @if ($attendance->late_duration === null)
                                                -
                                            @else
                                                {{ $attendance->late_duration }}
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
                                        @elseif ($attendance->presenceType && $attendance->presenceType->id === 3)
                                            <td
                                                class="text-sm border-r border-black text-white bg-yellow-800 font-light px-6 py-4 whitespace-nowrap">
                                                {{ $attendance->presenceType->name }}
                                            </td>
                                        @else
                                            <td
                                                class="text-sm border-r border-black text-black font-light px-6 py-4 whitespace-nowrap">
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
    </div>
    <div class="bg-white rounded-3xl p-8 mb-5">
        <h1 class="text-3xl font-bold text-center mb-5">Riwayat Tidak Hadir</h1>
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
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                @if ($missings->count() === 0)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900"
                                            colspan="3">
                                            TIDAK ADA DATA
                                        </td>
                                    </tr>
                                @endif
                                @foreach ($missings as $missing)
                                    <tr class="border-b">
                                        <td
                                            class="border-r border-black px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                            {{ $loop->iteration }}</td>
                                        <td
                                            class="text-sm border-r border-black text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            {{ $missing->user->name }}
                                        </td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            {{ $missing->date }}
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
    <script src="{{ asset('js/dataFilter.js') }}"></script>
@endsection
