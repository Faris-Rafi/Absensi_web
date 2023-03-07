<h1 class="text-3xl font-bold text-center mb-5">Riwayat Cuti Yang Ditolak</h1>
<div class="flex flex-col">
    <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
            <div class="overflow-hidden">
                <table class="min-w-full" id="rejectedTable">
                    <thead class="border-b border-black text-center">
                        <tr>
                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4">
                                #
                            </th>
                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4">
                                Name
                            </th>
                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4">
                                Tanggal Mulai
                            </th>
                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4">
                                Tanggal Selesai
                            </th>
                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4">
                                Durasi
                            </th>
                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4">
                                Pengajuan
                            </th>
                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4">
                                Alasan
                            </th>
                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4">
                                Status
                            </th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @php $count = 1 @endphp
                        @foreach ($requests as $request)
                            @if ($request->request_status_id === 3)
                                <tr class="border-b">
                                    <td
                                        class="border-r border-black px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                        {{ $count }}</td>
                                    <td
                                        class="text-sm border-r border-black text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                        {{ $request->user->name }}
                                    </td>
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
                                        {{ $request->duration }}
                                    </td>
                                    <td
                                        class="text-sm border-r border-black text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                        {{ $request->requestType->name }}
                                    </td>
                                    <td
                                        class="text-sm border-r border-black text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                        {{ $request->reason }}
                                    </td>
                                    <td class="text-sm bg-red-500 text-white font-light px-6 py-4 whitespace-nowrap">
                                        {{ $request->requestStatus->name }}
                                    </td>
                                </tr>
                                @php $count++ @endphp
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
