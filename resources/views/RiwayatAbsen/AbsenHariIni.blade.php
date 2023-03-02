<h1 class="text-3xl font-bold text-center mb-5">Absen Hari ini</h1>
<div class="flex flex-col">
    <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
            <div class="overflow-hidden">
                <table class="min-w-full" id="todaysTable">
                    <thead>
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

