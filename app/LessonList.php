<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class LessonList extends Model
{   
    protected $fillable = [
    	'lesson_id',
        'title',
        'slug',
		'description',
		'order_number',
		'preview',
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

    public function lesson()
    {
    	return $this->belongsTo(Lesson::class);
    }
}
