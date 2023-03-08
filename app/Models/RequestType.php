<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RequestType extends Model
{
    use HasFactory;

    public function request()
    {
        return $this->hasMany(Request::class);
    }

    public function user()
    {
        return $this->hasMany(User::class);
    }

}
