<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\Traits\Enums;

class Course extends Model
{
    use Enums;

    protected $fillable = [
    	'admin_id',
    	'title',
        'slug',
    	'banner',
    	'level',
    	'short_description',
        'price',
    ];

    protected $enumStatuses = [
        'level'
    ];

    public function setTitleAttribute($title)
    {
        $this->attributes['title']  =  strtolower($title);
        $this->attributes['slug'] = Str::slug($title);
    }

    public function getTitleAttribute($title)
    {
        return ucwords($title);
    }

    public function getSlugAttrubute($slug)
    {
        return strtolower($slug);
    }

    public function setLevelAttribute($level)
    {
        $this->attributes['level']  =  strtolower($level);
    }

    public function getLevelAttribute($level)
    {
        return ucfirst($level);
    }

    public function scopeWhereLike($query, $column, $value)
    {
        return $query->where($column, 'like', '%'.$value.'%');
    }

    public function scopeOrWhereLike($query, $column, $value)
    {
        return $query->orWhere($column, 'like', '%'.$value.'%');
    }

    public function scopeWhereCourse($query, $column, $value)
    {
        return $query->where($column, '=', $value);
    }

    public function scopeWhereCoursePaid($query, $column, $value)
    {
        return $query->where($column, '!=', $value);
    }

    public function admin()
    {
    	return $this->belongsTo(Admin::class);
    }

    public function trackTopics()
    {
        return $this->belongsToMany(TrackTopic::class)
                    ->using(CourseTrackTopic::class)
                    ->withTimestamps();
    }

    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }

    public function enrolls()
    {
        return $this->hasMany(Enroll::class);
    }
}
