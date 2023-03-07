<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Absen;
use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\Sysconf;
use Carbon\CarbonInterval;

class PulangAwalController extends Controller
{
    public function index()
    {
        $this->authorize('admin');
        $timeNow = Carbon::now('Asia/Jakarta');
        $attendances = Attendance::where('status', '0')->latest()->get();
        $users = User::all();

        $title = 'Pulang Awal';

        return view('PulangAwal', compact('title', 'attendances', 'users'));
    }

    public function approve(Attendance $attendance)
    {
        $this->authorize('admin');
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
            'status' => 1,
            'clock_out' => $timeNow->format('H:i:s'),
            'work_duration' => $work_duration,
            'late_duration' => $late_duration . ' minutes',
            'presence_type_id' => $presence,
            'arrival_type_id' => 3,
            'request_status_id' => 2
        ]);
        return redirect('/dashboard/pulang-awal')->with('success', 'Pengajuan diterima');
    }

    public function reject(Attendance $attendance)
    {
        $this->authorize('admin');
        Attendance::where('key', $attendance->key)->update([
            'notes' => null,
            'status' => 1,
            'request_status_id' => 3
        ]);
        return redirect('/dashboard/pulang-awal')->with('success', 'Pengajuan ditolak');
    }
}
