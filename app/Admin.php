<?php

namespace App;

use Illuminate\Support\Facades\Auth;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Notifications\AdminEmailVerificationNotification;
use App\Notifications\AdminResetPasswordNotification as Notification;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Traits\Enums;

class Admin extends Authenticatable implements MustVerifyEmail
{
    use Notifiable, Enums;

    protected $guard = 'admin';

    protected $fillable = [
        'name', 'email', 'password', 'role',
    ];

    protected $enumStatuses = [
        'role'
    ];

    protected $hidden = [
        'id', 'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Custom password reset notification.
     * 
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new Notification($token));
    }

    /**
     * Send email verification notice.
     * 
     * @return void
     */
    public function sendEmailVerificationNotification()
    {
        $this->notify(new AdminEmailVerificationNotification);
    }

    public function setNameAttribute($name)
    {
        return $this->attributes['name'] = strtolower($name);
    }

    public function getNameAttribute($name)
    {
        return ucwords($name);
    }

    public function superAdmin()
    {
    	if(Auth::user()->role === 'superAdmin'){
    		return true;
    	}   
    	return false;
    }

    public function blogs()
    {
        $this->hasMany(Blog::class);
    }

    public function courses()
    {
        return $this->hasMany(Course::class);
    }
}