@extends('layouts.main')

@section('section')
    <div class="bg-white rounded-3xl p-8 mb-10">
        @if ($user->attendance->isEmpty())
            <h1 class="text-3xl font-bold text-center mb-10">Form Absen</h1>
            <div class="flex justify-center items-center w-full">
                <form action="/dashboard/absen/masuk" method="post" class="sm:w-1/2">
                    @csrf
                    <div class="relative mt-8">
                        <input type="text" id="name"
                            class="peer placeholder-transparent h-10 border-b-2
                    border-gray-300 text-gray-900 focus:outline-none focus:border-blue-600 w-full"
                            value="{{ auth()->user()->name }}" autocomplete="off" disabled />
                        <label for="name"
                            class="absolute left-0 -top-3.5 text-gray-600 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-400 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-gray-600 peer-focus:text-sm w-full">Nama
                            Lengkap</label>
                    </div>
                    <div class="relative mt-8">
                        <select id="location" name="location_id"
                            class="peer placeholder-transparent h-10 border-b-2
                    border-gray-300 text-gray-900 focus:outline-none focus:border-blue-600 w-full" />
                        <option selected disabled>Pilih Lokasi Saat Ini</option>
                        @foreach ($locations as $location)
                            <option value="{{ $location->id }}">{{ $location->name }}</option>
                        @endforeach
                        </select>
                        <label for="location"
                            class="absolute left-0 -top-3.5 text-gray-600 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-400 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-gray-600 peer-focus:text-sm w-full">Lokasi</label>
                    </div>
                    <div class="relative my-5">
                        <button type="submit" class="bg-blue-500 text-white rounded-md px-2 py-1 w-full">Submit</button>
                    </div>
                </form>
            </div>
        @elseif ($user->attendance->isNotEmpty() && $user->attendance->first()->arrival_type_id == 1)
            <h1 class="text-3xl font-bold text-center mb-10">Absen Pulang</h1>
            <div class="flex justify-center items-center mb-10">
                <div class="bg-slate-100 p-5 rounded-lg shadow-md mx-4">
                    <p id="timeNow" class="text-lg font-semibold"></p>
                </div>
                <div class="bg-slate-100 p-5 rounded-lg shadow-md mx-4">
                    <p class="text-lg font-semibold">Waktu Pulang : {{ $timeOut }}</p>
                </div>
            </div>
            <div class="flex justify-center items-center flex-col">
                @if (strtotime($timeNow->format('H:i:s')) >= $timeLimit)
                    <div class="bg-slate-100 p-5 rounded-lg shadow-md my-4">
                        <p class="text-lg font-semibold">Anda Sudah Bisa Pulang</p>
                    </div>
                    <form action="/dashboard/absen/pulang/{{ $user->attendance->first()->uuid }}" method="post">
                        @csrf
                        <button type="submit" class="bg-blue-500 text-white rounded-md px-2 py-1 w-full">Absen
                            Pulang</button>
                    </form>
                @else
                    <div class="bg-slate-100 p-5 rounded-lg shadow-md my-4">
                        <p class="text-lg font-semibold">Anda Belum Bisa Pulang</p>
                    </div>
                    <div class="bg-blue-500 px-2 py-1 rounded-lg shadow-md my-4 cursor-pointer" onclick="displayForm()">
                        <p class="text-white">Ajukan Pulang Lebih Awal</p>
                    </div>
                    <form action="/dashboard/absen/pulang-awal" method="post" class="w-1/2" id="formPulang" style="display: none;">
                        @csrf
                        <div class="relative mt-8">
                            <textarea name="reason" rows="5" placeholder="Ketik Alasan Pulang disini..."
                                class="focus:shadow-soft-primary-outline min-h-unset text-sm leading-5.6 ease-soft block h-auto w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-300 focus:outline-none"></textarea>
                        </div>
                        <div class="relative my-5">
                            <button type="submit"
                                class="bg-blue-500 text-white rounded-md px-2 py-1 w-full">Submit</button>
                        </div>
                    </form>
                @endif
            </div>
        @else
            <h1 class="text-3xl font-bold text-center mb-10">Terima Kasih Untuk Hari Ini</h1>
        @endif
    </div>
    <script>
        const displayForm = () => {
            const formPulang = document.getElementById('formPulang')
            formPulang.style.display = 'block';
        }

        const displayTime = () => {
            const timeNow = document.getElementById('timeNow')
            const date = new Date()
            const time = date.toLocaleTimeString('en-US', {
                hour12: false,
                hour: '2-digit',
                minute: '2-digit',
                second: '2-digit'
            })

            timeNow.innerHTML = `Waktu Sekarang : ${time}`
        }
        setInterval(displayTime, 1);
    </script>
@endsection
