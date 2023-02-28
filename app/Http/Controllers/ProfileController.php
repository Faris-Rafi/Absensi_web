<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Request as ModelsRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        $title = 'Profile';

        return view('Profile.Profile', compact('title'));
    }

    public function show()
    {
        $attendances = Attendance::where('status', 1)->where('user_id', auth()->user()->id)->latest()->get();
        
        $requests = ModelsRequest::where('status', 1)->where('user_id', auth()->user()->id)->latest()->get();

        $title = 'Riwayat Absen';

        return view('Profile.RiwayatAbsenProfile', compact('title', 'attendances', 'requests'));
    }

    public function update(Request $request)
    {
        $user_id = Auth::id();

        $user = User::find($user_id);

        if ($request->name !== null) {
            $user->name = $request->name;
        }

        if ($request->email !== null) {
            $user->email = $request->email;
        }

        $password_lama =  $request->password_lama;

        if ($request->password !== null) {
            if (Hash::check($password_lama, auth()->user()->password)) {
                $user->password = Hash::make($request->password);
            } else {
                return redirect('/dashboard/profile')->with('error', 'Password Gagal Dirubah');
            }
        }

        $user->save();
        return redirect('/dashboard/profile')->with('success', 'Update Profile Berhasil!');
    }
}
