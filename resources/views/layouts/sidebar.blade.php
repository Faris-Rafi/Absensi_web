<aside class="fixed inset-y-0 left-0 bg-white shadow-md max-h-screen w-60">
    <div class="flex flex-col justify-between h-full">
        <div class="flex-grow">
            <div class="px-4 py-6 text-center border-b">
                <h1 class="text-xl font-bold leading-none"><span class="text-yellow-700">Absen</span> Karyawan
                </h1>
            </div>
            <div class="p-4">
                <ul class="space-y-1">
                    <li>
                        <a href="/dashboard"
                        class="flex items-center {{ Request::is('dashboard') ? 'bg-yellow-200' : '' }} rounded-xl font-bold text-sm text-yellow-900 py-3 px-4">
                        Home
                        </a>
                        <a href="/dashboard/absen" class="flex items-center {{ Request::is('dashboard/absen') ? 'bg-yellow-200' : '' }} rounded-xl font-bold text-sm text-yellow-900 py-3 px-4">Absen</a>
                        @can('admin')
                        <a href="/dashboard/daftar-karyawan"
                            class="flex items-center {{ Request::is('dashboard/daftar-karyawan') ? 'bg-yellow-200' : '' }} rounded-xl font-bold text-sm text-yellow-900 py-3 px-4">
                            Daftar Karyawan
                        </a>
                        <a href="/dashboard/history-absen"
                            class="flex items-center {{ Request::is('dashboard/history-absen') ? 'bg-yellow-200' : '' }} rounded-xl font-bold text-sm text-yellow-900 py-3 px-4">
                            History Absen
                        </a>
                        @endcan
                    </li>
                </ul>
            </div>
        </div>
        <div class="p-4">
            <form action="/logout" method="post">
            @csrf
            <button type="submit"
                class="inline-flex items-center justify-center h-9 px-4 rounded-xl bg-gray-900 text-gray-300 hover:text-white text-sm font-semibold transition">
                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" 
                    viewBox="0 0 16 16">
                    <path
                        d="M12 1a1 1 0 0 1 1 1v13h1.5a.5.5 0 0 1 0 1h-13a.5.5 0 0 1 0-1H3V2a1 1 0 0 1 1-1h8zm-2 9a1 1 0 1 0 0-2 1 1 0 0 0 0 2z" />
                </svg>
            </button> <span class="font-bold text-sm ml-2">Logout</span>
            </form>
        </div>
    </div>
</aside>
