<h1 class="text-3xl font-bold text-center mb-5">Riwayat Kehadiran</h1>
<div class="flex flex-col">
    <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
            <div class="overflow-hidden">
                <table class="min-w-full" id="attendTable">
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
                                Durasi Bekerja
                            </th>
                            <th>
                                Durasi Telat
                            </th>
                            <th>
                                Lokasi
                            </th>
                            <th>
                                Keterangan
                            </th>
                            <th>
                                Status
                            </th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @foreach ($attendances as $attendance)
                            <tr >
                                <td
                                    >
                                    {{ $loop->iteration }}</td>
                                <td
                                    >
                                    {{ $attendance->user->name }}
                                </td>
                                <td
                                    >
                                    {{ $attendance->date }}
                                </td>
                                <td
                                    >
                                    {{ $attendance->clock_in }}
                                </td>
                                <td
                                    >
                                    @if ($attendance->clock_out === null)
                                        -
                                    @else
                                        {{ $attendance->clock_out }}
                                    @endif
                                </td>
                                <td
                                    >
                                    @if ($attendance->work_duration === null)
                                        -
                                    @else
                                        {{ $attendance->work_duration }}
                                    @endif
                                </td>
                                <td
                                    >
                                    @if ($attendance->late_duration === null)
                                        -
                                    @else
                                        {{ $attendance->late_duration }}
                                    @endif
                                </td>
                                <td
                                    >
                                    {{ $attendance->location->name }}
                                </td>
                                @if ($attendance->presenceType && $attendance->presenceType->id === 1)
                                    <td
                                        class=" text-white bg-green-800">
                                        {{ $attendance->presenceType->name }}
                                    </td>
                                @elseif ($attendance->presenceType && $attendance->presenceType->id === 2)
                                    <td
                                        class="text-white bg-red-800">
                                        {{ $attendance->presenceType->name }}
                                    </td>
                                @elseif ($attendance->presenceType && $attendance->presenceType->id === 3)
                                    <td
                                        class="text-white bg-yellow-800">
                                        {{ $attendance->presenceType->name }}
                                    </td>
                                @else
                                    <td
                                        class=>
                                        -
                                    </td>
                                @endif
                                <td class="">
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
