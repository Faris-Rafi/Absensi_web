<?php

namespace App\Models;

use App\Models\User;
use App\Models\RequestType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Request extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function requestType()
    {
        return $this->belongsTo(RequestType::class);
    }

    public function requestStatus()
    {
        return $this->belongsTo(RequestStatus::class);
    }
}
