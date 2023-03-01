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

        $attendances = Attendance::where('status', '1')->latest()->paginate(6,['*'], 'attendances');

        $attendanceTodays = Attendance::where('status', '1')->where('date', $timeNow->format('d-m-Y'))->latest()->paginate(6,['*'], 'attendanceTodays');

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

        $users = User::all();
        $missings = Missing::latest()->paginate(6, ['*'], 'missings');

        $title = 'Riwayat Absen';

        return view('RiwayatAbsen', compact('title', 'attendances', 'attendanceTodays', 'users', 'timeNow', 'missings', 'months', 'monthsNum', 'attendanceYears'));
    }

    public function Filter(Request $request)
    {
        $this->authorize('admin');
        $timeNow = Carbon::now('Asia/Jakarta');

        $missing = Missing::query();
        $query = Attendance::query();

        if ($request->has('email')) {
            $userFilter = User::where('email', 'like', $request->input('email'))->first();
            $query->where('user_id', $userFilter->id);
            $missing->where('user_id', $userFilter->id);
        }

        if ($request->has('year')) {
            $query->where('year', $request->input('year'));
        }

        if ($request->has('month')) {
            $query->where('month', $request->input('month'));
        }

        $attendances = $query->where('status', 1)->latest()->paginate(6,['*'], 'attendances');

        $attendanceTodays = $query->where('status', '1')->where('date', $timeNow->format('d-m-Y'))->latest()->paginate(6, ['*'], 'attendanceTodays');
        
        $missings = $missing->paginate(6, ['*'], 'missings');

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

        $users = User::all();

        $title = 'Riwayat Absen';

        return view('RiwayatAbsen', compact('title', 'attendances', 'attendanceTodays', 'users', 'timeNow', 'missings', 'months', 'monthsNum', 'attendanceYears'));
    }
}
