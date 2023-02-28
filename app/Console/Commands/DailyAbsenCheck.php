<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Missing;
use Illuminate\Console\Command;

class DailyAbsenCheck extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'dailycheck:absen';

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
        $timeNow = Carbon::now('Asia/Jakarta')->format('d-m-Y');
        $users = User::with(['attendance' => fn ($query) =>
        $query->where('date', $timeNow)])->where('request_type_id', null)->get();

        $missingUsers = [];
        foreach ($users as $user) {
            if ($user->attendance->count() == 0) {
                $missingUsers[] = $user->id;
            }
        }

        if (count($missingUsers) > 0) {
            foreach ($missingUsers as $userId) {
                Missing::create([
                    'user_id' => $userId,
                    'date' => $timeNow
                ]);
            }
        } else {
            return 'Tidak ada yang tidak absen';
        }
    }
}
