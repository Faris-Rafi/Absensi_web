@extends('layouts.main')

@section('section')
    <div class="flex justify-end items-end">
        <button class="bg-blue-500 text-lg text-white rounded-md px-4 py-2 mb-2 hover:bg-blue-700 transition"
            onclick="openModal('modal')">Filter</button>
    </div>

    <div id="modal" class="fixed hidden z-50 inset-0 bg-gray-900 bg-opacity-60 overflow-y-auto h-full w-full px-4 modal">
        <div class="relative top-20 mx-auto shadow-xl rounded-md bg-white max-w-md">

            <!-- Modal header -->
            <div class="flex justify-between items-center text-xl rounded-t-md px-4 py-2">
                <h3>Filter</h3>
                <button onclick="closeModal('modal')">x</button>
            </div>

            <!-- Modal body -->
            <div class="max-h-48 p-4">
                <form action="/dashboard/riwayat-absen/filter" method="get" id="filterForm">
                    <select
                        class="w-1/2 my-2 peer placeholder-transparent h-10 border-b-2
                    border-gray-300 text-gray-900 focus:outline-none focus:border-blue-600"
                        name="email" id="">
                        <option value="" disabled selected>Nama</option>
                        @foreach ($users as $user)
                            <option value="{{ $user->email }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                    <select
                        class="w-1/2 my-2 peer placeholder-transparent h-10 border-b-2
                    border-gray-300 text-gray-900 focus:outline-none focus:border-blue-600"
                        name="year" id="">
                        <option value="" disabled selected>Tahun</option>
                        @foreach ($attendanceYears as $year)
                            <option value="{{ $year }}">{{ $year }}</option>
                        @endforeach
                    </select>
                    <select
                        class="w-1/2 my-2 peer placeholder-transparent h-10 border-b-2
                    border-gray-300 text-gray-900 focus:outline-none focus:border-blue-600"
                        name="month" id="">
                        <option value="" disabled selected>Bulan</option>
                        @foreach ($months as $key => $month)
                            <option value="{{ $monthsNum[$key] }}">{{ $month }}</option>
                        @endforeach
                    </select>
                </form>
            </div>

            <!-- Modal footer -->
            <div class="px-4 py-2 border-t border-t-gray-500 flex justify-end items-center space-x-4">
                <button class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-700 transition"
                    id="submitButton">Submit</button>
                <button class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition"
                    onclick="closeModal('modal')">Cancel</button>
            </div>
        </div>
    </div>

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
                                @if ($attendanceTodays->count() === 0)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900"
                                            colspan="9">
                                            TIDAK ADA DATA
                                        </td>
                                    </tr>
                                @endif
                                @foreach ($attendanceTodays as $attendance)
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
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex flex-col justify-center items-center mt-4">
            {{ $attendanceTodays->links('pagination::simple-tailwind', ['paginator' => $attendances]) }}
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
                                @if ($attendances->count() === 0)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900"
                                            colspan="10">
                                            TIDAK ADA DATA
                                        </td>
                                    </tr>
                                @endif
                                @foreach ($attendances as $attendance)
                                    <tr class="border-b">
                                        <td
                                            class="border-r border-black px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                            {{ $loop->iteration}}</td>
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
        <div class="flex justify-center items-center mt-4">
            {{ $attendances->links('pagination::simple-tailwind', ['paginator' => $attendanceTodays]) }}
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
        <div class="flex justify-center items-center mt-4">
            {{ $missings->links('pagination::simple-tailwind', ['paginator' => $missings]) }}
        </div>
    </div>

    <script src="{{ asset('js/dataFilter.js') }}"></script>
    <script src="{{ asset('js/modal.js') }}"></script>
@endsection
