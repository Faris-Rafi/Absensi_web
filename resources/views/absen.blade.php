@extends('layouts.main')

@section('section')
    <h1 class="text-3xl font-bold">Form Absen</h1>
    <form action="/dashboard/absen" method="post" enctype="multipart/form-data">
        @csrf
        <div class="relative mt-8">
            <input autocomplete="off" id="nama" name="user_id" type="text"
                class="peer placeholder-transparent h-10 w-2/5 border-b-2 border-gray-300 text-gray-900 focus:outline-none focus:borer-rose-600"
                placeholder="Nama" value="{{ auth()->user()->name }}" disabled />
            <label for="nama"
                class="absolute left-0 -top-3.5 text-gray-600 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-gray-600 peer-focus:text-sm">Nama</label>
        </div>
        <div class="relative mt-8">
            <select name="lokasi" id="lokasi"
                class="peer placeholder-transparent h-10 w-2/5 border-b-2 border-gray-300 text-gray-900 focus:outline-none focus:borer-rose-600">
                <option disabled selected>Pilih lokasi absen</option>
                <option value="rumah">Rumah</option>
                <option value="kantor">Kantor</option>
            </select>
            <label for="lokasi"
                class="absolute left-0 -top-3.5 text-gray-600 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-gray-600 peer-focus:text-sm">Lokasi</label>
        </div>
        <div class="relative mt-8">
            <select name="status" id="status"
                class="peer placeholder-transparent h-10 w-2/5 border-b-2 border-gray-300 text-gray-900 focus:outline-none focus:borer-rose-600"
                onclick="tanggalCuti()">
                <option disabled selected>Pilih status saat ini</option>
                <option value="hadir">Hadir</option>
                <option value="izin">Izin</option>
                <option value="sakit">Sakit</option>
                <option value="cuti">Cuti</option>
            </select>
            <label for="status"
                class="absolute left-0 -top-3.5 text-gray-600 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-gray-600 peer-focus:text-sm">Status</label>
        </div>
        <div id="dateForm" class="relative mt-8" style="display: none;">
            <input type="date" name="tanggal_beres_cuti" id="tanggal_cuti"
                class="peer placeholder-transparent h-10 w-2/5 border-b-2 border-gray-300 text-gray-900 focus:outline-none focus:borer-rose-600">
            <label for="tanggal_cuti"
                class="absolute left-0 -top-3.5 text-gray-600 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-gray-600 peer-focus:text-sm">Tanggal
                beres cuti/sakit</label>
        </div>
        <div class="relative my-5">
            <button class="bg-blue-500 text-white rounded-md px-2 py-1">Submit</button>
        </div>
    </form>
    <script>
        const tanggalCuti = () => {
            const status = document.getElementById('status')
            const dateForm = document.getElementById('dateForm')
            const dateInput = document.getElementById('tanggal_cuti')
            if (status.value == 'sakit' || status.value == 'cuti') {
                dateForm.style.display = 'block'
            } else {
                dateForm.style.display = 'none'
                dateInput.value = ''
            }
            event.preventDefault();
        }
    </script>
@endsection
