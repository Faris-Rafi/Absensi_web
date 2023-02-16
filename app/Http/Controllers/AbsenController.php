<?php

namespace App\Http\Controllers;

use App\Models\Absen;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;

class AbsenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('absen');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $timeNow = Carbon::now('Asia/Jakarta');
        $timeLimit = Carbon::createFromTime(8, 0, 0, 'Asia/Jakarta');

        $validatedData = $request->validate([
            'lokasi' => ['required'],
            'status' => ['required']
        ]);

        $validatedData['uuid'] = Str::orderedUuid();
        $validatedData['key'] = date('ymd').'_'.auth()->user()->id;
        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['tanggal_masuk'] = $timeNow;
        $validatedData['ip_address'] = $_SERVER['REMOTE_ADDR'];
        $validatedData['tahun'] = date('Y');
        $validatedData['bulan'] = date('m');
        $validatedData['tanggal'] = date('d');

        if ($timeNow->timestamp <= $timeLimit->timestamp) {
            $validatedData['keterangan'] = 'On Time';
        } else {
            $validatedData['keterangan'] = 'Telat';
        }

        if ($request->date('tanggal_beres_cuti')) {
            $validatedData['tanggal_beres_cuti'] = $request->date('tanggal_beres_cuti');
        }


        Absen::create($validatedData);

        return redirect('/dashboard')->with('success', 'Anda Berhasi Absen!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Absen  $absen
     * @return \Illuminate\Http\Response
     */
    public function show(Absen $absen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Absen  $absen
     * @return \Illuminate\Http\Response
     */
    public function edit(Absen $absen)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Absen  $absen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Absen $absen)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Absen  $absen
     * @return \Illuminate\Http\Response
     */
    public function destroy(Absen $absen)
    {
        //
    }
}
