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
        $attendanceMonths = Attendance::distinct('month')->pluck('month');
        $attendanceYears = Attendance::distinct('year')->pluck('year');

        $users = User::all();
        $missings = Missing::all();

        $title = 'Riwayat Absen';

        return view('RiwayatAbsen', compact('title', 'attendances', 'users', 'timeNow', 'missings', 'attendanceMonths', 'attendanceYears'));
    }

    public function Filter(Request $request)
    {
        $this->authorize('admin');
        $timeNow = Carbon::now('Asia/Jakarta');

        $attendances = Attendance::where('status', 1);

        if ($request->has('nameFilter')) {
            $attendances->where('user_id', $request->input('nameFilter'));
        }
        if ($request->has('yearFilter')) {
            $attendances->where('year', $request->input('yearFilter'));
        }
        if ($request->has('dateFilter')) {
            $attendances->where('month', $request->input('dateFilter'));
        }

        $attendances = $attendances->latest()->get();

        $attendanceMonths = Attendance::distinct('month')->pluck('month');
        $attendanceYears = Attendance::distinct('year')->pluck('year');

        $users = User::all();
        $missings = Missing::all();

        $title = 'Riwayat Absen';

        return view('RiwayatAbsen', compact('title', 'attendances', 'users', 'timeNow', 'missings', 'attendanceMonths', 'attendanceYears'));
    }
}
