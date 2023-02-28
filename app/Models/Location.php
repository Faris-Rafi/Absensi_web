<?php

namespace App\Models;

use App\Models\Absen;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Location extends Model
{
    use HasFactory;

    public function attendance()
    {
        return $this->hasMany(Attendance::class);
    }
}
