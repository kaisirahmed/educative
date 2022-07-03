<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Blog extends Model
{
	protected $fillable = [
		'admin_id',
		'title',
		'slug',
		'banner',
		'description',
	];

	public function setTitleAttribute($title)
    {
        $this->attributes['title']  =  strtolower($title);
        $this->attributes['slug'] = Str::slug($title);
	}
	
	public function scopeWhereLike($query, $column, $value)
    {
        return $query->where($column, 'like', '%'.$value.'%');
	}
	
	public function scopeOrWhereLike($query, $column, $value)
    {
        return $query->orWhere($column, 'like', '%'.$value.'%');
    }

    public function getTitleAttribute($title)
    {
    	return ucfirst($title);
    }

	public function admin()
	{
		return $this->belongsTo(Admin::class);
	}
}
