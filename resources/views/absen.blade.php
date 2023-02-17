@extends('layouts.main')

@section('section')
    @if ($user->absen->count() == 0)
        <h1 class="text-3xl font-bold text-center mb-10">Form Absen</h1>
        <div class="flex justify-center items-center w-full">
            <form action="/dashboard/absen" method="post" enctype="multipart/form-data" class="w-1/2">
                @csrf
                <div class="relative mt-8">
                    <input autocomplete="off" id="nama" name="user_id" type="text"
                        class="peer placeholder-transparent h-10 border-b-2 border-gray-300 text-gray-900 focus:outline-none focus:borer-rose-600 w-full"
                        placeholder="Nama" value="{{ auth()->user()->name }}" disabled />
                    <label for="nama"
                        class="absolute left-0 -top-3.5 text-gray-600 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-gray-600 peer-focus:text-sm">Nama</label>
                </div>
                <div class="relative mt-8">
                    <select name="lokasi" id="lokasi"
                        class="peer placeholder-transparent h-10 border-b-2 border-gray-300 text-gray-900 focus:outline-none focus:borer-rose-600 w-full">
                        <option disabled selected>Pilih lokasi absen</option>
                        <option value="rumah">Rumah</option>
                        <option value="kantor">Kantor</option>
                    </select>
                    <label for="lokasi"
                        class="absolute left-0 -top-3.5 text-gray-600 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-gray-600 peer-focus:text-sm">Lokasi</label>
                </div>
                <div class="relative mt-8">
                    <select name="kehadiran" id="kehadiran"
                        class="peer placeholder-transparent h-10 border-b-2 border-gray-300 text-gray-900 focus:outline-none focus:borer-rose-600 w-full"
                        onclick="tanggalCuti()">
                        <option disabled selected>Pilih status saat ini</option>
                        <option value="Hadir">Hadir</option>
                        <option value="Izin">Izin</option>
                        <option value="Sakit">Sakit</option>
                        <option value="Cuti">Cuti</option>
                    </select>
                    <label for="kehadiran"
                        class="absolute left-0 -top-3.5 text-gray-600 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-gray-600 peer-focus:text-sm w-full">Kehadiran</label>
                </div>
                <div id="dateForm" class="relative mt-8" style="display: none;">
                    <input type="date" name="tanggal_beres_cuti" id="tanggal_cuti"
                        class="peer placeholder-transparent h-10 border-b-2 border-gray-300 text-gray-900 focus:outline-none focus:borer-rose-600 w-full">
                    <label for="tanggal_cuti"
                        class="absolute left-0 -top-3.5 text-gray-600 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-gray-600 peer-focus:text-sm">Tanggal
                        beres cuti/sakit</label>
                </div>
                <div class="relative my-5">
                    <button class="bg-blue-500 text-white rounded-md px-2 py-1 w-full">Submit</button>
                </div>
            </form>
        </div>
    @elseif ($user->absen->first()->tanggal_keluar)
        <h1 class="text-3xl font-bold text-center">Terima kasih untuk hari ini</h1>
    @else
        <h1 class="text-3xl font-bold text-center mb-5">Absen Pulang</h1>
        <div class="flex justify-center items-center flex-col w-full">
            <p class="mb-3" id="timeNow"></p>
            <p class="mb-3">Waktu Pulang : {{ $timeLimit->format('H:i:s') }}</p>
            @if ($timeNow->timestamp >= $timeLimit->timestamp)
                <form action="/dashboard/absen/pulang" method="post" class="w-1/2">
                    @csrf
                    <div class="relative my-5">
                        <button class="bg-blue-500 text-white rounded-md px-2 py-1 w-full">Submit</button>
                    </div>
                </form>
            @else
            <p>Maaf Anda Belum Bisa Pulang</p>
            @endif
        </div>
    @endif

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

        const displayTime = () => {
            const date = new Date();
			const time = date.toLocaleTimeString('en-US', { hour12: false, hour: '2-digit', minute: '2-digit', second: '2-digit' });
			document.getElementById('timeNow').innerHTML = `Waktu Sekarang : ${time}`;
        }
		setInterval(displayTime, 1000);
    </script>
@endsection
