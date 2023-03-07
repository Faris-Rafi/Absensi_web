<h1 class="text-3xl font-bold text-center mb-5">Pengajuan Cuti / Sakit</h1>
<div class="flex flex-col">
    <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
            <div class="overflow-hidden">
                <table class="min-w-full" id="pengajuanTable">
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
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @php $count = 1 @endphp
                        @foreach ($requests as $request)
                            @if ($request->status === 0)
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
                                    <td
                                        class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap flex justify-center items-center">
                                        <form action="/dashboard/pengajuan-cuti-sakit/approve/{{ $request->uuid }}"
                                            method="post">
                                            @csrf
                                            <button
                                                class="bg-green-500 hover:bg-green-700 transition text-white p-2 font-semibold rounded-md mr-1">Approve</button>
                                        </form>
                                        <form action="/dashboard/pengajuan-cuti-sakit/reject/{{ $request->uuid }}"
                                            method="post">
                                            @method('delete')
                                            @csrf
                                            <button
                                                class="bg-red-500 hover:bg-red-700 transition text-white p-2 font-semibold rounded-md ml-1">Reject</button>
                                        </form>
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
