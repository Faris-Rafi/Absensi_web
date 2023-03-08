<?php

namespace App\Console\Commands;

use App\Models\Request;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Console\Command;

class DailyCutiCheck extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'dailycheck:cuti';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $today = Carbon::now()->format('d-m-Y');
        $requests = Request::all();
        foreach ($requests as $request) {
            if ($request->end_date >= $today) {
                User::where('id', $request->user_id)->update([
                    'request_type_id' => null
                ]);

                Request::where('end_date', $today)->update([
                    'status' => 2
                ]);
            } else {
                return 'Hari ini tidak ada yang selesai cuti';
            }
        }
    }
}
