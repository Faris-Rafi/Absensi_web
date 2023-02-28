<?php

namespace App\Console\Commands;

use App\Models\Absen;
use Illuminate\Console\Command;

class DailyAbsen extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'absen:daily';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Artisan Command to send daily absen';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        Attendance::where('arrival_type_id', 1)->update([
            'arrival_type_id' => 2
        ]);
    }
}
