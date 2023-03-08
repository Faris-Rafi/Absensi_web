<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * @return void
     */
    public function run()
    {
        
        \App\Models\User::factory()->create([
            'name' => 'Muhammad Faris Rafi',
            'email' => 'rees@gmail.com',
            'user_levels_id' => 2
        ]);
        \App\Models\User::factory(4)->create();

        \App\Models\ArrivalType::create([
            'name' => 'Masuk',
            'status' => 1
        ]);

        \App\Models\ArrivalType::create([
            'name' => 'Pulang',
            'status' => 1
        ]);

        \App\Models\UserLevel::create([
            'name' => 'User',
            'status' => 1
        ]);

        \App\Models\UserLevel::create([
            'name' => 'Admin',
            'status' => 1
        ]);

        \App\Models\PresenceType::create([
            'name' => 'On Time',
            'status' => 1
        ]);

        \App\Models\PresenceType::create([
            'name' => 'Telat',
            'status' => 1
        ]);

        \App\Models\PresenceType::create([
            'name' => 'Overtime',
            'status' => 1
        ]);

        \App\Models\Location::create([
            'name' => 'Kantor',
            'status' => 1
        ]);

        \App\Models\Location::create([
            'name' => 'Rumah',
            'status' => 1
        ]);

        \App\Models\RequestType::create([
            'name' => 'Cuti',
            'status' => 1
        ]);

        \App\Models\RequestType::create([
            'name' => 'Sakit',
            'status' => 1
        ]);

        \App\Models\RequestType::create([
            'name' => 'Izin',
            'status' => 1
        ]);

        \App\Models\Sysconf::create([
            'sysconf_name' => 'time_in',
            'value' => '08:00:00'
        ]);

        \App\Models\Sysconf::create([
            'sysconf_name' => 'time_out',
            'value' => '17:00:00'
        ]);

        \App\Models\Sysconf::create([
            'sysconf_name' => 'working_time',
            'value' => '540'
        ]);
    }
}
