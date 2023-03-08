@extends('Profile.layouts.main')

@section('profileSection')
    @if (session()->has('success'))
        <div id="modalSuccess" data-izimodal-title="{{ session('success') }}">
        </div>
    @elseif (session()->has('error'))
        <div id="modalError" data-izimodal-title="{{ session('error') }}">
        </div>
    @endif

    <div class="flex flex-col justify-center items-center">
        <div class="flex flex-col justify-center items-start mt-7 sm:w-1/2">
            <span class="text-sm text-gray-600 mb-3 w-full">Profile</span>
            <div class="flex flex-row items-center w-full mb-6">
                <h1 class="text-lg font-medium" id="showName">Name : {{ auth()->user()->name }}</h1>
                <button class="bg-green-500 p-1 rounded ml-3" id="modalButton" data-name="{{ auth()->user()->name }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                    </svg>
                </button>
            </div>
            <div class="flex flex-row items-center w-full">
                <h1 class="text-lg font-medium" id="showEmail">Email : {{ auth()->user()->email }}</h1>
                <button class="bg-green-500 p-1 rounded ml-3" id="modalButton" data-email="{{ auth()->user()->email }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                    </svg>
                </button>
            </div>
            <span class="text-sm text-gray-600 mt-5 mb-3 w-full">Password</span>
            <button class="bg-green-600 py-1 px-2 rounded text-sm text-slate-100 font-medium" id="editPassword">Ganti
                Password</button>
        </div>
    </div>

    <div id="modalProfile" data-izimodal-title="Edit Profile" data-izimodal-subtitle="Masukkan data baru anda!">
        <div class="flex justify-center items-center py-10">
            <form action="/dashboard/profile/update" method="post" class="w-1/2" id="form-modal">
                @method('put')
                @csrf
                <input autocomplete="off" id="inputModalName" name="name" type="text"
                    class="py-2 px-3 mb-5 mt-2 rounded border border-gray-300 focus:border-blue-500 w-full"
                    placeholder="Masukkan Nama User...." />
                <input autocomplete="off" id="inputModalEmail" name="email" type="email"
                    class="py-2 px-3 mb-5 mt-2 rounded border border-gray-300 focus:border-blue-500 w-full"
                    placeholder="Masukkan Nama User...." />
                <button type="submit" class="bg-blue-500 rounded-full py-1 px-2 text-white w-full">Submit</button>
            </form>
        </div>
    </div>

    <div id="modalPassword" data-izimodal-title="Ganti Password" data-izimodal-subtitle="Masukkan data baru anda!">
        <div class="flex justify-center items-center py-10">
            <form action="/dashboard/profile/update" method="post" class="w-1/2" id="form-modal">
                @method('put')
                @csrf
                <input autocomplete="off" id="inputModalPasswordLama" name="password_lama" type="password"
                    class="py-2 px-3 mb-5 mt-2 rounded border border-gray-300 focus:border-blue-500 w-full"
                    placeholder="Masukkan Password Lama Anda...." />
                <input autocomplete="off" id="inputModalPassword" name="password" type="password"
                    class="py-2 px-3 mb-5 mt-2 rounded border border-gray-300 focus:border-blue-500 w-full"
                    placeholder="Masukkan Password Baru Anda...." />
                <button type="submit" class="bg-blue-500 rounded-full py-1 px-2 text-white w-full">Submit</button>
            </form>
        </div>
    </div>

    <script>
        $("#modalProfile").iziModal({
            headerColor: '#FDE69A',
            theme: 'light',
            padding: 20,
        });

        $(document).on('click', '#modalButton', function(event) {
            const name = $(this).data('name');
            const email = $(this).data('email');
            if (name) {
                event.preventDefault();
                $('#inputModalName').val(name)
                $('#inputModalEmail').addClass('hidden')
                $('#inputModalName').removeClass('hidden')
                $('#modalProfile').iziModal('open')
            } else if (email) {
                event.preventDefault();
                $('#inputModalEmail').val(email)
                $('#inputModalName').addClass('hidden')
                $('#inputModalEmail').removeClass('hidden')
                $('#modalProfile').iziModal('open');
            }
        });

        $("#modalPassword").iziModal({
            headerColor: '#FDE69A',
            theme: 'light',
            padding: 20,
        });

        $(document).on('click', '#editPassword', function(event) {
            event.preventDefault();
            $('#modalPassword').iziModal('open')
        });

        $(document).ready(function() {
            $('#modalSuccess').iziModal({
                autoOpen: true,
                headerColor: '#4FB748',
                overlayColor: 'rgba(0, 0, 0, 0.5)',
                top: '0',
            });

            $('#modalError').iziModal({
                autoOpen: true,
                headerColor: '#EF4444',
                overlayColor: 'rgba(0, 0, 0, 0.5)',
                top: '0',
            });

            setTimeout(function() {
                $('#modalSuccess').iziModal('close');
                $('#modalError').iziModal('close');
            }, 3000);
        });
    </script>
@endsection
