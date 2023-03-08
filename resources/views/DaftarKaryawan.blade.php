@extends('layouts.main')

@section('section')
    @if (session()->has('success'))
        <div id="modalSuccess" data-izimodal-title="{{ session('success') }}">
        </div>
    @elseif (session()->has('error'))
        <div id="modalError" data-izimodal-title="{{ session('error') }}">
        </div>
    @endif
    <div class="bg-white rounded-3xl p-8 mb-5">
        <h1 class="text-3xl font-bold text-center mb-5">Daftar Karyawan</h1>
        <div class="flex flex-col">
            <div class="flex justify-end items-end">
                <a href="/dashboard/register"
                    class="bg-green-500 hover:bg-green-700 transition text-white p-3 rounded-lg text-sm">Tambah Karyawan
                    +</a>
            </div>
            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="overflow-hidden">
                        <table class="min-w-full" id="karyawanTable">
                            <thead>
                                <tr>
                                    <th>
                                        #
                                    </th>
                                    <th>
                                        Name
                                    </th>
                                    <th>
                                        Email
                                    </th>
                                    <th>
                                        Batas Cuti
                                    </th>
                                    <th>
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                @foreach ($users as $user)
                                    <tr>
                                        <td>
                                            {{ $loop->iteration }}</td>
                                        <td>
                                            {{ $user['name'] }}
                                        </td>
                                        <td>
                                            {{ $user['email'] }}
                                        </td>
                                        <td>
                                            {{ $user['leave_limit'] }}
                                        </td>
                                        <td class="text-sm flex justify-center font-semibold px-6 py-4 whitespace-nowrap">
                                            <button
                                                class="bg-red-500 hover:bg-red-700 transition text-white p-2 mx-2 rounded-lg"
                                                data-izimodal-open="#modal" data-izimodal-transitionin="bounceInDown"
                                                data-email={{ $user->email }} id="deleteButton">Delete</button>
                                            <a href="/dashboard/daftar-karyawan/edit/{{ $user->email }}"
                                                class="bg-green-500 hover:bg-green-700 transition text-white p-2 mx-2 rounded-lg">Edit</a>
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
    <div id="modal" data-izimodal-title="Verifikasi Nama"
        data-izimodal-subtitle="Masukkan nama user yang ingin dihapus">
        <div class="flex justify-center items-center py-10">
            <form action="" method="post" class="w-1/2" id="form-modal">
                @method('delete')
                @csrf
                <input autocomplete="off" id="nama" name="name" type="text"
                    class="py-2 px-3 mb-5 mt-2 rounded border border-gray-300 focus:border-blue-500 w-full"
                    placeholder="Masukkan Nama User...." />
                <button type="submit" class="bg-blue-500 rounded-full py-1 px-2 text-white w-full">Submit</button>
            </form>
        </div>
    </div>

    <script>
        let karyawanTable = new DataTable('#karyawanTable')
        $("#modal").iziModal({
            headerColor: '#FDE69A',
            theme: 'light',
            padding: 20,
        });
        $(document).on('click', '#deleteButton', function(event) {
            const email = $(this).data('email');
            event.preventDefault();
            $('#modal').iziModal('open');
            $('#form-modal').attr('action', '/dashboard/daftar-karyawan/' + email);
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
