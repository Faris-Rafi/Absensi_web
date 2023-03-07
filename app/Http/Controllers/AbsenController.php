<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Location;
use App\Models\Sysconf;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Carbon\CarbonInterval;

class AbsenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $auth = auth()->user()->id;
        $timeNow = Carbon::now('Asia/Jakarta');
        $timeOut = Sysconf::where('sysconf_name', 'time_out')->value('value');
        $timeLimit = strtotime($timeOut);
        $key = $timeNow->format('ymd');

        $user = User::with([
            'attendance' => fn ($query) =>
            $query->where('key', $key . '_' . $auth)
        ])->where('id', $auth)->orderBy('created_at')->first();

        $locations = Location::where('status', 1)->get();
        $attendances = Attendance::where(function ($query) {
            $query->where('status', 0)
                ->where('request_status_id', '<>', 2);
        })
            ->orWhere(function ($query) {
                $query->where('status', 1)
                    ->where('request_status_id', '>=', 2);
            })->where('key', $key . '_' . $auth)
            ->latest()->get();

        $title = 'Absen';

        return view('Absen', compact('title', 'user', 'attendances', 'locations', 'timeNow', 'timeOut', 'timeLimit'));
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
        $auth = auth()->user()->id;
        $timeNow = Carbon::now('Asia/Jakarta');
        $key = $timeNow->format('ymd');

        $validatedData = $request->validate([
            'location_id' => ['required'],
        ]);

        $validatedData['uuid'] = Str::orderedUuid();
        $validatedData['key'] = $key . '_' . $auth;
        $validatedData['user_id'] = $auth;
        $validatedData['date'] = $timeNow->format('d-m-Y');
        $validatedData['clock_in'] = $timeNow->format('H:i:s');
        $validatedData['ip_address'] = $request->ip();
        $validatedData['arrival_type_id'] = 1;
        $validatedData['status'] = 1;
        $validatedData['year'] = $timeNow->format('Y');
        $validatedData['month'] = $timeNow->format('m');

        Attendance::create($validatedData);

        return redirect('/dashboard')->with('success', 'Anda Berhasil Absen!');
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
    public function update(Attendance $attendance, Request $request)
    {
        $timeNow = Carbon::now('Asia/Jakarta');

        $sysconf = Sysconf::where('sysconf_name', 'working_time')->value('value');

        $clock_in = strtotime(date('H:i', strtotime($attendance->clock_in)));
        $clock_out = strtotime($timeNow->format('H:i'));

        $working_time = $sysconf;

        $diff = abs($clock_out - $clock_in) / 60;
        $late_duration = $working_time - $diff;

        if ($late_duration == 0) {
            $presence = 1;
        } else if ($late_duration > 0) {
            $presence = 2;
        } else {
            $presence = 3;
        }

        $interval = CarbonInterval::minutes($diff);
        $work_duration = $interval->cascade()->format('%h hours %i minutes');

        Attendance::where('key', $attendance->key)->update([
            'clock_out' => $timeNow->format('H:i:s'),
            'work_duration' => $work_duration,
            'late_duration' => $late_duration . ' minutes',
            'presence_type_id' => $presence,
            'arrival_type_id' => 2,
            'notes' => $request->input('notes'),
            'request_status_id' => null
        ]);

        return redirect('/dashboard')->with('success', 'Anda Berhasil Absen!');
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

    public function pengajuan(Request $request)
    {
        $auth = auth()->user()->id;
        $timeNow = Carbon::now('Asia/Jakarta');
        $key = $timeNow->format('ymd');

        $validatedData = $request->validate([
            'reason' => ['required'],
            'notes' => ['required']
        ]);

        $validatedData['status'] = 0;
        $validatedData['request_status_id'] = 1;

        Attendance::where('key', $key . '_' . $auth)->update($validatedData);

        return redirect('/dashboard')->with('success', 'Pengajuan anda berhasil dikirim, mohon tunggu');
    }
}
