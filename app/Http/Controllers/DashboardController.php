<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Sysconf;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $auth = auth()->user()->id;
        $timeNow = Carbon::now('Asia/Jakarta');
        $key = $timeNow->format('ymd');
        $timeLimit = Sysconf::where('sysconf_name', 'time_in')->value('value');
        $key = $timeNow->format('ymd');
        $date = strtotime($timeNow->format('d-m-Y'));

        $user = User::with([
            'attendance' => fn ($query) =>
            $query->where('key', $key . '_' . $auth),
            'request' => fn ($query) =>
            $query->where('user_id', $auth)
        ])->where('id', $auth)->first();

        $request = $user->request->last();

        $title = 'Home';

        return view('Home', compact('title', 'user', 'timeNow', 'timeLimit', 'date', 'request'));
    }
}
