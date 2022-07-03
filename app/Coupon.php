<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
	protected $hidden = ['id'];

    protected $fillable = [
    	'coupon_code',
		'start_date',
		'end_date',
    ];

    protected $dates = [
    	'start_date','end_date',
    ];

}	
