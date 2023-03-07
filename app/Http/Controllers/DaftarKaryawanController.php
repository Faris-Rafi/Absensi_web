<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\Missing;
use App\Models\Request as ModelsRequest;
use Illuminate\Support\Facades\Hash;

class DaftarKaryawanController extends Controller
{
    
    public function index()
    {
        $this->authorize('admin');

        if (request('search')) {
            $users = User::where('name', 'like', '%' . request('search') . '%')->orWhere('email', 'like', '%' . request('search') . '%')->paginate(6);
        } else {
            $users = User::paginate(6);
        }
        

        $title = 'Daftar Karyawan';

        return view('DaftarKaryawan', compact('users', 'title'));
    }

    public function create()
    {
        $this->authorize('admin');
        $title = 'Register';
        $head = 'Tambah Karyawan';
        
        return view('Register', compact('title', 'head'));
    }

    public function store(Request $request)
    {
        $this->authorize('admin');
        $validatedData = $request->validate([
            'name' => ['required', 'max:255'],
            'email' => ['required', 'email:dns', 'unique:users'],
            'leave_limit' => ['required', 'numeric'],
            'password' => ['required', 'min:8']
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData);
        return redirect('/dashboard/daftar-karyawan')->with('success', 'Anda Berhasil Menambah Karyawan!');
    }

    public function edit(User $user)
    {
        $this->authorize('admin');
        $user = $user;
        $title = 'Edit';
        $head = 'Edit Karyawan';
        return view('Register', compact('title', 'user', 'head'));
    }

    public function update(Request $request)
    {
        $this->authorize('admin');
        $validatedData = $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email:dns'],
            'leave_limit' => ['required', 'numeric']
        ]);

        User::where('email', $validatedData['email'])->update($validatedData);
        return redirect('/dashboard/daftar-karyawan')->with('success', 'Anda Berhasil Mengedit Karyawan!');
    }

    public function destroy(User $user, Request $request)
    {
        $this->authorize('admin');
        $name = $request->input('name');
        $user = User::where('name', $name)->first();
        if ($user) {
            Attendance::where('user_id', '=', $user->id)->delete();
            Missing::where('user_id', '=', $user->id)->delete();
            ModelsRequest::where('user_id', '=', $user->id)->delete();
            $user->delete();
            return redirect('/dashboard/daftar-karyawan')->with('success', 'Anda Berhasil Menghapus Karyawan!');
        } else {
            return redirect('/dashboard/daftar-karyawan')->with('error', 'Nama karyawan tidak sesuai!');
        }
    }
}
