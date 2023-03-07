<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestStatus extends Model
{
    use HasFactory;

    public function request()
    {
        return $this->hasMany(Request::class);
    }

    public function attendance()
    {
        return $this->hasMany(Attendance::class);
    }
}
