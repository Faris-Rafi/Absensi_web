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
                        @if (auth()->user()->request_type_id === null)
                            <a href="/dashboard/absen"
                                class="flex items-center {{ Request::is('dashboard/absen') ? 'bg-yellow-200' : '' }} rounded-xl font-bold text-sm text-yellow-900 py-3 px-4">Absen</a>
                        @endif
                        <a href="/dashboard/cuti-sakit"
                            class="flex items-center {{ Request::is('dashboard/cuti-sakit') ? 'bg-yellow-200' : '' }} rounded-xl font-bold text-sm text-yellow-900 py-3 px-4">
                            Ajukan Cuti / Sakit
                        </a>
                        @can('admin')
                            <p class="flex items-center text-sm text-gray-400 py-3 px-4 mt-3">Administration</p>
                            <a href="/dashboard/pulang-awal"
                                class="flex items-center {{ Request::is('dashboard/pulang-awal') ? 'bg-yellow-200' : '' }} rounded-xl font-bold text-sm text-yellow-900 py-3 px-4">
                                Pengajuan Pulang Awal
                            </a>
                            <a href="/dashboard/pengajuan-cuti-sakit"
                                class="flex items-center {{ Request::is('dashboard/pengajuan-cuti-sakit') ? 'bg-yellow-200' : '' }} rounded-xl font-bold text-sm text-yellow-900 py-3 px-4">
                                Daftar Cuti / Sakit
                            </a>
                            <a href="/dashboard/riwayat-absen"
                                class="flex items-center {{ Request::is('dashboard/riwayat-absen') ? 'bg-yellow-200' : '' }} rounded-xl font-bold text-sm text-yellow-900 py-3 px-4">
                                Riwayat Absen
                            </a>
                            <a href="/dashboard/daftar-karyawan"
                                class="flex items-center {{ Request::is('dashboard/daftar-karyawan') || Request::is('dashboard/register') ? 'bg-yellow-200' : '' }} rounded-xl font-bold text-sm text-yellow-900 py-3 px-4">
                                Daftar Karyawan
                            </a>
                        @endcan
                    </li>
                </ul>
            </div>
        </div>
        <div class="p-4">
            <a href="/dashboard/profile"
                class="inline-flex items-center justify-center h-9 px-4 rounded-xl bg-gray-900 text-gray-300 hover:text-white text-sm font-semibold transition mt-3"><svg
                    width="1em" height="1em" viewBox="0 0 24 24" fill="currentColor"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M7.25007 2.38782C8.54878 2.0992 10.1243 2 12 2C13.8757 2 15.4512 2.0992 16.7499 2.38782C18.06 2.67897 19.1488 3.176 19.9864 4.01358C20.824 4.85116 21.321 5.94002 21.6122 7.25007C21.9008 8.54878 22 10.1243 22 12C22 13.8757 21.9008 15.4512 21.6122 16.7499C21.321 18.06 20.824 19.1488 19.9864 19.9864C19.1488 20.824 18.06 21.321 16.7499 21.6122C15.4512 21.9008 13.8757 22 12 22C10.1243 22 8.54878 21.9008 7.25007 21.6122C5.94002 21.321 4.85116 20.824 4.01358 19.9864C3.176 19.1488 2.67897 18.06 2.38782 16.7499C2.0992 15.4512 2 13.8757 2 12C2 10.1243 2.0992 8.54878 2.38782 7.25007C2.67897 5.94002 3.176 4.85116 4.01358 4.01358C4.85116 3.176 5.94002 2.67897 7.25007 2.38782ZM12 6C9.79086 6 8 7.79086 8 10C8 12.2091 9.79086 14 12 14C14.2091 14 16 12.2091 16 10C16 7.79086 14.2091 6 12 6ZM18.3775 17.2942C18.7303 17.8695 18.6055 18.63 18.0369 18.9935C17.5199 19.3241 16.9158 19.5265 16.3159 19.6598C15.2322 19.9006 13.8299 20 11.9998 20C10.1698 20 8.76744 19.9006 7.68381 19.6598C7.09516 19.529 6.50205 19.3319 5.99131 19.012C5.41247 18.6495 5.28523 17.8786 5.64674 17.2991C6.06303 16.6318 6.63676 16.1075 7.40882 15.7344C8.58022 15.1684 10.1157 15 11.9996 15C13.8771 15 15.4109 15.1548 16.5807 15.7047C17.3727 16.077 17.9572 16.6089 18.3775 17.2942Z" />
                </svg></a> <span class="font-bold text-sm ml-2">Profile</span>
            <form action="/logout" method="post">
                @csrf
                <button type="submit"
                    class="inline-flex items-center justify-center h-9 px-4 rounded-xl bg-gray-900 text-gray-300 hover:text-white text-sm font-semibold transition mt-3">
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
