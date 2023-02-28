<?php

namespace App\Models;

use App\Models\User;
use App\Models\Pengajuan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RequestType extends Model
{
    use HasFactory;

    public function pengajuan()
    {
        return $this->hasMany(Pengajuan::class);
    }

    public function user()
    {
        return $this->hasMany(User::class);
    }

}
