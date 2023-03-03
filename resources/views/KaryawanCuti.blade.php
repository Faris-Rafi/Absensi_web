@extends('layouts.main')

@section('section')
    @if ($requests->count() >= 1)
        <div class="bg-white rounded-3xl p-8 mb-5">
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
                                            Status
                                        </th>
                                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4">
                                            Alasan
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    @foreach ($requests as $request)
                                        <tr class="border-b">
                                            <td
                                                class="border-r border-black px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                {{ $loop->iteration }}</td>
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
                                                {{ $request->requestType->name }}
                                            </td>
                                            <td
                                                class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                {{ $request->reason }}
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
    @endif
    <div class="bg-slate-100 p-5 rounded-lg shadow-md mx-4 mb-5">
        <p>Anda Mempunyai Batas Cuti : {{ auth()->user()->leave_limit }}</p>
    </div>
    <div class="bg-white rounded-3xl p-8 mb-5">
        <h1 class="text-3xl font-bold text-center mb-10">Form Cuti / Sakit</h1>
        <div class="flex justify-center items-center w-full">
            <form action="/dashboard/cuti-sakit" method="post" class="sm:w-1/2">
                @csrf
                <div class="relative mt-8">
                    <input type="text" id="name"
                        class="peer placeholder-transparent h-10 border-b-2 border-gray-300 text-gray-900 focus:outline-none focus:borer-rose-600 w-full"
                        value="{{ auth()->user()->name }}" disabled>
                    <label for="name"
                        class="absolute left-0 -top-3.5 text-gray-600 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-gray-600 peer-focus:text-sm">Nama
                        Karyawan</label>
                </div>
                <div class="relative mt-8">
                    <select name="request_type_id" id="request_type_id"
                        class="peer placeholder-transparent h-10 border-b-2 border-gray-300 text-gray-900 focus:outline-none focus:borer-rose-600 w-full"
                        required>
                        <option disabled selected>Pilih status saat ini</option>
                        @foreach ($request_types as $request_type)
                            <option value="{{ $request_type->id }}">{{ $request_type->name }}</option>
                        @endforeach
                    </select>
                    <label for="request_type_id"
                        class="absolute left-0 -top-3.5 text-gray-600 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-gray-600 peer-focus:text-sm w-full">Status</label>
                </div>
                <div class="relative mt-8">
                    <input type="date" name="start_date" id="start_date"
                        class="peer placeholder-transparent h-10 border-b-2 border-gray-300 text-gray-900 focus:outline-none focus:borer-rose-600 w-full"
                        required>
                    <label for="start_date"
                        class="absolute left-0 -top-3.5 text-gray-600 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-gray-600 peer-focus:text-sm">Tanggal
                        Mulai Cuti / Sakit</label>
                </div>
                <div class="relative mt-8">
                    <input type="date" name="end_date" id="end_date"
                        class="peer placeholder-transparent h-10 border-b-2 border-gray-300 text-gray-900 focus:outline-none focus:borer-rose-600 w-full"
                        required>
                    <label for="end_date"
                        class="absolute left-0 -top-3.5 text-gray-600 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-gray-600 peer-focus:text-sm">Tanggal
                        Selesai Cuti / Sakit</label>
                </div>
                <div class="relative mt-4">
                    <textarea name="reason" rows="5" placeholder="Ketik Alasannya disini..."
                        class="focus:shadow-soft-primary-outline min-h-unset text-sm leading-5.6 ease-soft block h-auto w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-300 focus:outline-none"
                        required></textarea>
                </div>
                <div class="relative my-5">
                    <button
                        class="bg-blue-500 hover:bg-blue-700 transition text-white rounded-md px-2 py-1 w-full">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection
