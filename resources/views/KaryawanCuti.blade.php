@extends('layouts.main')

@section('section')
    <div class="bg-white rounded-3xl p-8 mb-5">
        <h1 class="text-3xl font-bold text-center mb-10">Form Cuti / Sakit</h1>
        <div class="flex justify-center items-center w-full">
            <form action="/dashboard/cuti-sakit" method="post" class="w-1/2">
                @csrf
                <div class="relative mt-8">
                    <input type="text" id="name" class="peer placeholder-transparent h-10 border-b-2 border-gray-300 text-gray-900 focus:outline-none focus:borer-rose-600 w-full" value="{{ auth()->user()->name }}" disabled>
                    <label for="name"
                        class="absolute left-0 -top-3.5 text-gray-600 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-gray-600 peer-focus:text-sm">Nama
                        Karyawan</label>
                </div>
                <div class="relative mt-8">
                    <select name="request_type_id" id="request_type_id"
                        class="peer placeholder-transparent h-10 border-b-2 border-gray-300 text-gray-900 focus:outline-none focus:borer-rose-600 w-full" required>
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
                        class="peer placeholder-transparent h-10 border-b-2 border-gray-300 text-gray-900 focus:outline-none focus:borer-rose-600 w-full" required>
                    <label for="start_date"
                        class="absolute left-0 -top-3.5 text-gray-600 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-gray-600 peer-focus:text-sm">Tanggal
                        Mulai Cuti / Sakit</label>
                </div>
                <div class="relative mt-8">
                    <input type="date" name="end_date" id="end_date"
                        class="peer placeholder-transparent h-10 border-b-2 border-gray-300 text-gray-900 focus:outline-none focus:borer-rose-600 w-full" required>
                    <label for="end_date"
                        class="absolute left-0 -top-3.5 text-gray-600 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-gray-600 peer-focus:text-sm">Tanggal
                        Selesai Cuti / Sakit</label>
                </div>
                <div class="relative mt-4">
                    <textarea name="reason" rows="5" placeholder="Ketik Alasannya disini..."
                        class="focus:shadow-soft-primary-outline min-h-unset text-sm leading-5.6 ease-soft block h-auto w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-300 focus:outline-none" required></textarea>
                </div>
                <div class="relative my-5">
                    <button class="bg-blue-500 text-white rounded-md px-2 py-1 w-full">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection
