<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Subscription;
use App\TrackTopic;
use App\lessonList;
use App\Lesson;
use App\Course;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function courses()
    {
        return view('frontend.courses.courses');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function trackCourses($slug)
    {
        $track = TrackTopic::where('course_type', 'track')->where('slug', $slug)->first();
        
        return view('frontend.courses.trackCourses', compact('track'));
    }

    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function topicCourses($slug)
    {
        $topic = TrackTopic::where('course_type', 'topic')->where('slug', $slug)->first();
        
        return view('frontend.courses.topicCourses', compact('topic'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function courseView($slug)
    { 
        if(Course::where('slug', $slug)->exists()){
            $course = Course::where('slug', $slug)->first();
            if (Auth::check()) {
                $isSubscribed = Subscription::where('course_id', $course->id)
                                            ->where('user_id', Auth::user()->id)
                                            ->exists();
                $compact[] = 'isSubscribed';
            }
            $compact[] = 'course';
            return view('frontend.courses.courseView', compact($compact));
        } else {
            abort('404');
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function courseLessons(Request $request, $courseId, $lessonId, $slug)
    {
        if ($request->ajax()) {

            if(LessonList::where('lesson_id', $lessonId)->where('slug', $slug)->exists()){
                $lessonList = lessonList::where('lesson_id', $lessonId)
                                        ->where('slug', $slug)
                                        ->first();
                return $lessonList->toJson();
            }

        } else {
            if(LessonList::where('lesson_id', $lessonId)->where('slug', $slug)->exists()){
                $course = Course::find($courseId);
                $lessons = Lesson::find($lessonId);
                if(Auth::check()){
                    $enroll = Auth::user()->enrolls()->where('course_id', $courseId)->first();
                }
                
                $lessonList = lessonList::where('lesson_id', $lessonId)
                                        ->where('slug', $slug)
                                        ->first();
                
                if (Auth::check()) {
                    $isSubscribed = Subscription::where('course_id', $course->id)
                                                ->where('user_id', Auth::user()->id)
                                                ->exists();
                    $compact[] = ['isSubscribed','lessons','lessonList','course','enroll'];
                }
                $compact[] = ['lessons','lessonList','course'];
                return view('frontend.courses.courseLessons', compact($compact));
            } else {
                abort('404');
            }
        }
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    { 

    }

    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
