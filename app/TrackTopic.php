<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\Traits\Enums;

class TrackTopic extends Model
{
	use Enums;

    protected $fillable = [
    	'image',
		'title',
        'slug',
		'course_type',
		'short_description',
    ];

    protected $enumStatuses = [
        'course_type'
    ];

    public function setTitleAttribute($title)
    {
        $this->attributes['title'] = strtolower($title);
        $this->attributes['slug'] = Str::slug($title);
    }

    public function getTitleAttribute($title)
    {
        return ucwords($title);
    }

    public function courses()
    {
    	return $this->belongsToMany(Course::class)
                    ->using(CourseTrackTopic::class)
                    ->withTimestamps();
    }

    public function enrolls()
    {
        return $this->hasMany(Enroll::class);
    }
}
