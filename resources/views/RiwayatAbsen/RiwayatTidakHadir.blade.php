<h1 class="text-3xl font-bold text-center mb-5">Riwayat Tidak Hadir</h1>
<div class="flex flex-col">
    <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
            <div class="overflow-hidden">
                <table class="min-w-full" id="missingTable">
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
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @foreach ($missings as $missing)
                            <tr>
                                <td>
                                    {{ $loop->iteration }}</td>
                                <td>
                                    {{ $missing->user->name }}
                                </td>
                                <td>
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
