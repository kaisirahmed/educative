<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    protected $hidden = [ 'id' ];

    protected $fillable = [
    	'lesson_id',
        'question',
        'question_type',
        'options',
        'correct_answer',
    ];

    protected $casts = [
        'options' => 'array',
        'correct_answer' => 'array',
    ];

    public function setQuestionAttribute($question)
    {
        return $this->attributes['question'] = strtolower($question);
    }

    public function getQuestionAttribute($question)
    {
        return ucfirst($question);
    }

    public function lesson()
    {
    	return $this->belongsTo(Lesson::class);
    }

}
