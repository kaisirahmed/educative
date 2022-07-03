<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    protected $hidden = ['id'];

    protected $fillable = [
    	'track_topic_id',
		'course_id',
		'user_id',
		'start_date',
		'end_date',
        'created_at',
        'updated_at',
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
