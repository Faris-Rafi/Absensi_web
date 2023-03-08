<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Missing;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class RiwayatAbsenController extends Controller
{

    public function index()
    {
        $this->authorize('admin');
        $timeNow = Carbon::now('Asia/Jakarta');

        $attendances = Attendance::where('status', '1')->latest()->get();

        $attendanceTodays = Attendance::where('status', '1')->where('date', $timeNow->format('d-m-Y'))->latest()->get();

        $months = collect([]);
        for ($i = 1; $i <= 12; $i++) {
            $month = \Carbon\Carbon::create(null, $i, 1)->format('F');
            $months->push($month);
        }

        $monthsNum = collect([]);
        foreach ($months as $month) {
            $monthNum = \Carbon\Carbon::parse($month)->format('m');
            $monthsNum->push($monthNum);
        }

        $attendanceYears = Attendance::distinct('year')->pluck('year');

        $missings = Missing::latest()->get();

        $title = 'Riwayat Absen';

        return view('RiwayatAbsen.Main', compact('title', 'attendances', 'attendanceTodays', 'timeNow', 'missings', 'months', 'monthsNum', 'attendanceYears'));
    }

    public function Filter(Request $request)
    {
        $this->authorize('admin');
        $timeNow = Carbon::now('Asia/Jakarta');

        $attendanceTodays = Attendance::where('status', '1')->where('date', $timeNow->format('d-m-Y'))->latest()->get();
        $missings = Missing::latest()->get();
        $query = Attendance::query();

        if ($request->has('year')) {
            $query->where('year', $request->input('year'));
        }

        if ($request->has('month')) {
            $query->where('month', $request->input('month'));
        }

        $attendances = $query->where('status', 1)->latest()->get();

        $months = collect([]);
        for ($i = 1; $i <= 12; $i++) {
            $month = \Carbon\Carbon::create(null, $i, 1)->format('F');
            $months->push($month);
        }

        $monthsNum = collect([]);
        foreach ($months as $month) {
            $monthNum = \Carbon\Carbon::parse($month)->format('m');
            $monthsNum->push($monthNum);
        }

        $attendanceYears = Attendance::distinct('year')->pluck('year');

        $title = 'Riwayat Absen';

        return view('RiwayatAbsen.Main', compact('title', 'attendances', 'attendanceTodays', 'timeNow', 'missings', 'months', 'monthsNum', 'attendanceYears'));
    }
}
