<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 * Enumerations status
 */
abstract class Status {
    const ACTIVE = 1;
    const SUSPENDED = 0;
}

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    const STATUS_ACTIVE = 1;
    const STATUS_SUSPENDED = 0;

    public static $status = [
        Status::ACTIVE => 'Active',
        Status::SUSPENDED => 'Supended',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'status',
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

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected function password(): Attribute
    {
        return new Attribute(
            set: fn ($value) => hash('sha256', $value)
        );
    }

    public function getStatus(){
        return static::$status[$this->status];
    }

    public function login($email, $pass){
        
        return static::where('email', $email)
        ->where('password', hash('sha256', $pass))
        //->where('status', static::STATUS_ACTIVE)
        ->first();

    }
}
