<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\lessonList;
use App\TrackTopic;
use App\Lesson;
use App\Course;
use App\Admin;
use App\Blog;

class LearningVueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function topics()
    {
        $topics = TrackTopic::where('course_type','topic')->latest()->paginate(12);

        return response()->json($topics, 200);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function courses()
    {
        $courses = Course::with('admin')->latest()->paginate(9);

        return $courses->toJson();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function latestCourses()
    {
        $courses = Course::with('admin')
                         ->latest()->take(4)->get();

        return $courses->toJson();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function tracks()
    {
        $tracks = TrackTopic::where('course_type','track')
                            ->latest()->paginate(4);

        return $tracks->toJson();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function latestTopics()
    {
        $topics = TrackTopic::latest()->take(4)->get();
        return $topics->toJson();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function searchLessonLists($courseId)
    {
        $course = Course::find($courseId);
        $lessons = Lesson::where('course_id', $course->id)->get();

        foreach($lessons as $lesson){
            foreach($lesson->lessonLists as $lessonList){
                $lessonLists[] = [
                    'id' => $lessonList->id,
                    'lesson_id' => $lessonList->lesson_id,
                    'title' => $lessonList->title,
                    'slug' => $lessonList->slug
                ];
            }
        }
        return $lessonLists;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function courseSearchQuery($query)
    {
        $courses = Course::with('admin')
                         ->whereLike('title', $query)
                         ->latest()->paginate(6);
                         
        return $courses->toJson();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function courseFilter($filter)
    {
        if($filter === 'free'){
            $courses = Course::with('admin')
                             ->whereCourse('price', '0.00')
                             ->latest()->paginate(6);
        } elseif($filter === 'paid') {
            $courses = Course::with('admin')
                             ->whereCoursePaid('price', '0.00')
                             ->latest()->paginate(6);
        } else {
            $courses = Course::with('admin')
                             ->latest()->paginate(6);
        }
        return $courses->toJson();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function blogs()
    {
        $blogs = Blog::with('admin')
                     ->latest()->paginate(8);

        return $blogs->toJson();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function latestBlogs()
    {
        $blogs = Blog::with('admin')
                     ->latest()->take(4)->get();

        return $blogs->toJson();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function searchBlogs($query)
    {
        $searchBlogs = Blog::whereLike('title', $query)
                           ->orWhereLike('description', $query)
                           ->latest()->paginate(8);
                         
        return $searchBlogs->toJson();
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
