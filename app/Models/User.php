<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Attendance;
use App\Models\Request;
use App\Models\UserLevel;
use App\Models\RequestType;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [
        'id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function attendance()
    {
        return $this->hasMany(Attendance::class);
    }

    public function missing()
    {
        return $this->hasMany(Missing::class);
    }
    
    public function userLevel()
    {
        return $this->belongsTo(UserLevel::class);
    }

    public function request()
    {
        return $this->hasMany(Request::class);
    }

    public function requestType()
    {
        return $this->belongsTo(RequestType::class);
    }
}
