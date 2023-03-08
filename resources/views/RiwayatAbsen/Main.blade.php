@extends('layouts.main')

@section('section')
    <div class="bg-white rounded-3xl p-8 mb-20">
        @include('RiwayatAbsen.AbsenHariIni')
    </div>

    <div class="flex justify-end items-end">
        <button class="bg-blue-500 text-lg text-white rounded-md px-4 py-2 mb-2 hover:bg-blue-700 transition"
            onclick="openModal('modal')">Filter</button>
    </div>

    <div class="bg-white rounded-3xl p-8 mb-20">
        @include('RiwayatAbsen.RiwayatKehadiran')
    </div>

    <div class="bg-white rounded-3xl p-8 mb-5">
        @include('RiwayatAbsen.RiwayatTidakHadir')
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
    <script>
        let todaysTable = new DataTable('#todaysTable')
        let attendTable = new DataTable('#attendTable')
        let missingTable = new DataTable('#missingTable')
    </script>
    <script src="{{ asset('js/dataFilter.js') }}"></script>
    <script src="{{ asset('js/modal.js') }}"></script>
@endsection
