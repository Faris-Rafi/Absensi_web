@extends('layouts.main')

@section('section')
    <div class="bg-white rounded-3xl p-8 mb-5">
        <h1 class="text-3xl font-bold text-center mb-5">Pengajuan Pulang Awal</h1>
        <div class="flex flex-col">
            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="overflow-hidden">
                        <table class="min-w-full" id="myTable">
                            <thead>
                                <tr>
                                    <th>
                                        #
                                    </th>
                                    <th>
                                        Name
                                    </th>
                                    <th>
                                        Tanggal
                                    </th>
                                    <th>
                                        Jam Masuk
                                    </th>
                                    <th>
                                        Jam Keluar
                                    </th>
                                    <th>
                                        Lokasi
                                    </th>
                                    <th>
                                        Alasan
                                    </th>
                                    <th>
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                @foreach ($attendances as $attendance)
                                    <tr>
                                        <td {{ $loop->iteration }}</td>
                                        <td>
                                            {{ $attendance->user->name }}
                                        </td>
                                        <td>
                                            {{ $attendance->date }}
                                        </td>
                                        <td>
                                            {{ $attendance->clock_in }}
                                        </td>
                                        <td>
                                            @if ($attendance->clock_out === null)
                                                -
                                            @else
                                                {{ $attendance->clock_out }}
                                            @endif
                                        </td>
                                        <td>
                                            {{ $attendance->location->name }}
                                        </td>
                                        <td>
                                            {{ $attendance->reason }}
                                        </td>
                                        <td class="flex justify-center">
                                            <form action="/dashboard/pulang-awal/approve/{{ $attendance->uuid }}"
                                                method="post">
                                                @csrf
                                                <button
                                                    class="bg-green-900 text-green-200 p-2 font-semibold rounded-md mr-1">Approve</button>
                                            </form>
                                            <form action="/dashboard/pulang-awal/reject/{{ $attendance->uuid }}"
                                                method="post">
                                                @csrf
                                                <button
                                                    class="bg-red-900 text-red-200 p-2 font-semibold rounded-md ml-1">Reject</button>
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
    <script>
        let myTable = new DataTable('#myTable')
    </script>
@endsection
