<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class CourseTrackTopic extends Pivot
{
    protected $fillable = [
    	'track_topic_id',
    	'course_id',
    	'created_at',
    	'updated_at',
    ];


    protected $nullable = [
    	'created_at',
    	'updated_at',
    ];

    /**
	 * Indicates if the IDs are auto-incrementing.
	 *
	 * @var bool
	 */
	public $incrementing = true;
}
