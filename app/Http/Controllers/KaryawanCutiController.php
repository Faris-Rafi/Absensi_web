<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\RequestType;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Request as ModelsRequest;

class KaryawanCutiController extends Controller
{
    public function index()
    {
        $request_types = RequestType::all();
        $title = 'Pengajuan Cuti';

        return view('KaryawanCuti', compact('title', 'request_types'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'start_date' => ['required', 'date'],
            'end_date' => ['required', 'date'],
            'request_type_id' => ['required'],
            'reason' => ['required']
        ]);

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['start_date'] = date('d-m-Y', strtotime($request->start_date));
        $validatedData['end_date'] = date('d-m-Y', strtotime($request->end_date));
        $validatedData['uuid'] = Str::orderedUuid();

        ModelsRequest::create($validatedData);

        return redirect('/dashboard')->with('success', 'Pengajuan Anda Berhasil Dikirim');
    }

    public function show(User $user)
    {
        $this->authorize('admin');
        $timeNow = Carbon::now('Asia/Jakarta');
        $requests = ModelsRequest::all();
        $title = 'Riwayat Cuti';

        return view('RiwayatCuti', compact('title', 'requests', 'timeNow'));
    }

    public function update(ModelsRequest $modelsRequest)
    {
        $this->authorize('admin');

        $user = User::where('id', $modelsRequest->user_id)->first();

        $leave_limit = $user->leave_limit -1;


        User::where('id', $modelsRequest->user_id)->update([
            'request_type_id' => $modelsRequest->request_type_id,
            'leave_limit' => $leave_limit
        ]);

        ModelsRequest::where('uuid', $modelsRequest->uuid)->update([
            'status' => 1
        ]);

        return redirect('/dashboard')->with('success', 'Pengajuan Diterima');
    }

    public function destroy(ModelsRequest $modelsRequest)
    {
        $this->authorize('admin');
        ModelsRequest::destroy($modelsRequest->id);

        return redirect('/dashboard')->with('success', 'Pengajuan Ditolak');
    }
}
