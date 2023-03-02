@extends('layouts.main')

@section('section')
    <div class="bg-white rounded-3xl p-8 mb-16">
        @include('RiwayatCuti.PengajuanCuti')
    </div>
    <div class="bg-white rounded-3xl p-8 mb-16">
        @include('RiwayatCuti.SedangCuti')
    </div>
    <div class="bg-white rounded-3xl p-8 mb-5">
        @include('RiwayatCuti.RiwayatCuti')
    </div>
    <script>
        let pengajuanTable = new DataTable('#pengajuanTable')
        let cutiTable = new DataTable('#cutiTable')
        let riwayatTable = new DataTable('#riwayatTable')
    </script>
@endsection
