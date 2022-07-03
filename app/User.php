<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'father_name',
        'mother_name',
        'present_address',
        'permanent_address',
        'education',
        'email_verified_at',
        'coupon_code',
        'phone',
        'created_at',
        'updated_at',
    ];

    protected $nullable = [
        'email_verified_at', 'coupon_code',
    ];


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'id','password',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function setFirstNameAttribute($first_name)
    {
        $this->attributes['first_name']  =  strtolower($first_name);
    }

    public function setLastNameAttribute($last_name)
    {
        $this->attributes['last_name']  =  strtolower($last_name);
    }

    public function getFirstNameAttribute($first_name)
    {
        return ucwords($first_name);
    }

    public function getLastNameAttribute($last_name)
    {
        return ucwords($last_name);
    }

    public function setFatherNameAttribute($father_name)
    {
        $this->attributes['father_name']  =  strtolower($father_name);
    }

    public function setMotherNameAttribute($mother_name)
    {
        $this->attributes['mother_name']  =  strtolower($mother_name);
    }

    public function name()
    {
        return ucwords($this->attributes['first_name'].' '.$this->attributes['last_name']);
    }
  
    public function getFatherNameAttribute($father_name)
    {
        return ucwords($father_name);
    }

    public function getMotherNameAttribute($mother_name)
    {
        return ucwords($mother_name);
    }

    public function enrolls()
    {
        return $this->hasMany(Enroll::class);
    }
}
