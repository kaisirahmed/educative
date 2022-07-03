<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enroll extends Model
{
    protected $hidden = ['id'];

    protected $fillable = [
        'track_topic_id',
        'course_id',
        'user_id',
        'current_lesson',
        'lesson_completion',
        'coupon',
    ];

    protected $nullable = [
        'current_lesson',
        'lesson_completion',
        'coupon',
    ];
   

    public function trackTopic()
    {
        return $this->belongsTo(TrackTopic::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
