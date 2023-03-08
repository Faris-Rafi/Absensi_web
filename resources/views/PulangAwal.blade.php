@extends('layouts.main')

@section('section')
    @if (session()->has('success'))
        <div id="modalSuccess" data-izimodal-title="{{ session('success') }}">
        </div>
    @elseif (session()->has('error'))
        <div id="modalError" data-izimodal-title="{{ session('error') }}">
        </div>
    @endif
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
                                        Catatan
                                    </th>
                                    <th>
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                @foreach ($attendances as $attendance)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
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
                                        <td>
                                            {{ $attendance->notes }}
                                        </td>
                                        <td class="flex justify-center">
                                            <form action="/dashboard/pulang-awal/approve/{{ $attendance->uuid }}"
                                                method="post">
                                                @csrf
                                                <button
                                                    class="bg-green-500 hover:bg-green-700 transition text-white p-2 font-semibold rounded-md mr-1">Approve</button>
                                            </form>
                                            <form action="/dashboard/pulang-awal/reject/{{ $attendance->uuid }}"
                                                method="post">
                                                @csrf
                                                <button
                                                    class="bg-red-500 hover:bg-red-700 transition text-white p-2 font-semibold rounded-md ml-1">Reject</button>
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

        $(document).ready(function() {
            $('#modalSuccess').iziModal({
                autoOpen: true,
                headerColor: '#4FB748',
                overlayColor: 'rgba(0, 0, 0, 0.5)',
                top: '0',
            });

            $('#modalError').iziModal({
                autoOpen: true,
                headerColor: '#EF4444',
                overlayColor: 'rgba(0, 0, 0, 0.5)',
                top: '0',
            });

            setTimeout(function() {
                $('#modalSuccess').iziModal('close');
                $('#modalError').iziModal('close');
            }, 3000);
        });
    </script>
@endsection
