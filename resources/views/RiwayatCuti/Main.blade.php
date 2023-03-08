@extends('layouts.main')

@section('section')
    @if (session()->has('success'))
        <div id="modalSuccess" data-izimodal-title="{{ session('success') }}">
        </div>
    @elseif (session()->has('error'))
        <div id="modalError" data-izimodal-title="{{ session('error') }}">
        </div>
    @endif
    
    <div class="bg-white rounded-3xl p-8 mb-16">
        @include('RiwayatCuti.PengajuanCuti')
    </div>
    <div class="bg-white rounded-3xl p-8 mb-16">
        @include('RiwayatCuti.SedangCuti')
    </div>
    <div class="bg-white rounded-3xl p-8 mb-16">
        @include('RiwayatCuti.CutiDisetujui')
    </div>
    <div class="bg-white rounded-3xl p-8 mb-16">
        @include('RiwayatCuti.CutiDitolak')
    </div>
    <div class="bg-white rounded-3xl p-8 mb-5">
        @include('RiwayatCuti.RiwayatCuti')
    </div>
    <script>
        let pengajuanTable = new DataTable('#pengajuanTable')
        let cutiTable = new DataTable('#cutiTable')
        let approvedTable = new DataTable('#approvedTable')
        let rejectedTable = new DataTable('#rejectedTable')
        let riwayatTable = new DataTable('#riwayatTable')

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
