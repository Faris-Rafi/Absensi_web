@extends('Profile.layouts.main')

@section('profileSection')
    <div class="flex flex-col justify-center items-start mt-7 w-1/2">
        <span class="text-sm text-gray-600 mb-3 w-full">Profile</span>
        <div class="flex flex-row items-center w-full mb-6">
            <h1 class="text-lg font-medium" id="showName">Name : {{ auth()->user()->name }}</h1>
            <button class="bg-green-500 p-1 rounded ml-3" id="editName" onclick="displayFormName()">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                </svg>
            </button>
            <form action="/dashboard/profile/update" class="w-full" method="post" id="formName" style="display: none">
                @method('put')
                @csrf
                <label for="nama">Nama Lengkap : </label>
                <input autocomplete="off" id="nama" name="nama" type="text"
                    class="py-2 px-3 mb-5 mt-2 rounded-full border block w-full" placeholder="Masukkan Nama Anda...." value="{{ auth()->user()->name }}" />
                <button class="bg-blue-500 rounded-full py-1 px-2 text-white w-full">
                    Submit
                </button>
            </form>
        </div>
        <div class="flex flex-row items-center w-full">
            <h1 class="text-lg font-medium" id="showEmail">Email : {{ auth()->user()->email }}</h1>
            <button class="bg-green-500 p-1 rounded ml-3" id="editEmail" onclick="displayFormEmail()">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                </svg>
            </button>
            <form action="/dashboard/profile/update" class="w-full" method="post" id="formEmail" style="display: none">
                @method('put')
                @csrf
                <label for="email">Alamat Email : </label>
                <input autocomplete="off" id="email" name="email" type="email"
                    class="py-2 px-3 mb-5 mt-2 rounded-full border block w-full" placeholder="Masukkan Email Anda...." value="{{ auth()->user()->email }}" />
                <button class="bg-blue-500 rounded-full py-1 px-2 text-white w-full">
                    Submit
                </button>
            </form>
        </div>
        <span class="text-sm text-gray-600 mt-5 mb-3 w-full">Password</span>
        <button class="bg-green-600 py-1 px-2 rounded text-sm text-slate-100 font-medium" id="editPassword"
            onclick="displayFormPassword()">Ganti Password</button>
        <form action="/dashboard/profile/update" class=" w-full" method="post" id="formPassword" style="display: none">
            @method('put')
            @csrf
            <label for="password">Password Lama : </label>
            <input autocomplete="off" id="password" name="password_lama" type="password"
                class="py-2 px-3 mb-5 mt-2 rounded-full border block w-full" placeholder="Masukkan Password Anda...." />
            <label for="password">Password Baru : </label>
            <input autocomplete="off" id="password" name="password" type="password"
                class="py-2 px-3 rounded-full border block mt-2 mb-5  w-full" placeholder="Masukkan Password Anda...." />
            <button class="bg-blue-500 py-1 px-2 text-white rounded-full w-full">
                Submit
            </button>
        </form>
    </div>
    <script>
        const showName = document.getElementById('showName')
        const editName = document.getElementById('editName')
        const formName = document.getElementById('formName')

        const displayFormName = () => {
            formName.style.display = 'block'
            showName.style.display = 'none'
            editName.style.display = 'none'
        }

        const showEmail = document.getElementById('showEmail')
        const editEmail = document.getElementById('editEmail')
        const formEmail = document.getElementById('formEmail')

        const displayFormEmail = () => {
            formEmail.style.display = 'block'
            showEmail.style.display = 'none'
            editEmail.style.display = 'none'
        }

        const editPassword = document.getElementById('editPassword')
        const formPassword = document.getElementById('formPassword')

        const displayFormPassword = () => {
            formPassword.style.display = 'block'
            editPassword.style.display = 'none'
        }
    </script>
@endsection
