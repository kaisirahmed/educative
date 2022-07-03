<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Lesson extends Model
{
    protected $hidden = ['id'];
    
    protected $fillable = [
    	'course_id',
		'title',
        'slug',
		'order_number',
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

    public function course()
    {
    	return $this->belongsTo(Course::class);
    }

    public function lessonLists()
    {
    	return $this->hasMany(LessonList::class);
    }

    public function quizzes()
    {
        return $this->hasMany(Quiz::class);
    }
}
