<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Course;
use App\Lesson;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lessons = Lesson::latest()->get();
        return view('admin.lessons.index', compact('lessons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courses = Course::latest()->get();
        return view('admin.lessons.create', compact('courses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
        $validator = Validator::make($request->all(),[
            'course_id' => ['required'],
            'title.*' => ['required', 'string'],
            'order_number.*' => ['required','numeric'],
        ],
        [
            'course_id.required' => 'Course title selection is required.',
            'order_number.*.required' => 'Lesson order field is required.',
            'order_number.*.numeric' => 'Lesson order must be require.',
            'title.*.required' => 'Lesson title field is required.',
            'title.*.string' => 'Lesson title must be string',        
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        foreach($request->order_number as $key => $order_number) {
            
            $lesson = new Lesson;

            $lesson->course_id = $request->course_id;
            $lesson->order_number = $order_number;
            $lesson->title = $request->input('title')[$key];
            $lesson->save();
        }
       
        return redirect('admin/lessons')->with('message','Lesson has been created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function show(Lesson $lesson)
    {
        return view('admin.lessons.show', compact('lesson'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function edit(Lesson $lesson)
    {
        $courses = Course::latest()->get();
        return view('admin.lessons.edit', compact('lesson', 'courses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lesson $lesson)
    {
        $validator = Validator::make($request->all(),[
            'course_id' => ['required'],
            'title' => ['required', 'string'],
            'order_number' => ['required', 'numeric'],
        ],
        [
            'course_id.required' => 'Course title selection field is required.',
            'order_number.required' => 'Lesson order field is required.',
            'order_number.numeric' => 'Lesson order must be require.',
            'title.required' => 'Lesson title field is required.',
            'title.string' => 'Lesson title must be string',      
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }
            
        $lesson = new Lesson;

        $lesson->course_id = $request->course_id;
        $lesson->order_number = $request->order_number;
        $lesson->title = $request->title;
        $lesson->save();
       
        return redirect('admin/lessons')->with('message','Lesson has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lesson $lesson)
    {
        Lesson::destroy($lesson->id);

        return redirect('admin/lessons')->with('message','Lesson has been deleted successfully.');
    }
}
