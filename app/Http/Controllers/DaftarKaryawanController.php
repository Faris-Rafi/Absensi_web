<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DaftarKaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('admin');
        return view('listKaryawan', [
            'users' => User::all()
        ]);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DaftarKaryawan  $daftarKaryawan
     * @return \Illuminate\Http\Response
     */
    public function show(DaftarKaryawan $daftarKaryawan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DaftarKaryawan  $daftarKaryawan
     * @return \Illuminate\Http\Response
     */
    public function edit(DaftarKaryawan $daftarKaryawan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DaftarKaryawan  $daftarKaryawan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DaftarKaryawan $daftarKaryawan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DaftarKaryawan  $daftarKaryawan
     * @return \Illuminate\Http\Response
     */
    public function destroy(DaftarKaryawan $daftarKaryawan)
    {
        //
    }
}
