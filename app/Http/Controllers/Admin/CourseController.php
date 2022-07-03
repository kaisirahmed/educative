<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\Controller;
use App\TrackTopic;
use App\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::latest()->get();
        return view('admin.courses.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $trackTopics = TrackTopic::all(); 
        return view('admin.courses.create', compact('trackTopics'));
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
            'title' => ['required', 'string', 'max:255'],
            'price' => ['required', 'regex:/^(?=.+)(?:[1-9]\d*|0)?(?:\.\d+)?$/', 'between:0,99.99'],
            'banner' => ['required', 'image', 'file', 'mimes:png', 'max:512', 'dimensions:min_width=600,min_height=300'],
            'level' => ['required', 'string'],
            'short_description' => ['required', 'string'],
            'track_topic_id' => ['required'],
        ],[
            'track_topic_id.required' => 'Track or Topic checkbox is required.'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        $input = $request->all();

        $input['admin_id'] = Auth::user()->id;

        $banner = $request->banner;
        
        $banner_target_name = 'banner'.time().$banner->getClientOriginalName();
        
        $destination = public_path('uploadfiles/courses/banners/');

        $img = Image::make($banner->getRealPath());
        $img->resize(600, 300);
        $img->save($destination.$banner_target_name);

        $input['banner'] = $banner_target_name;

        $course = Course::create($input);

        $course->trackTopics()->attach($request->track_topic_id);

        return redirect('admin/courses')->with('message','Course has been created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        return view('admin.courses.show', compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        $trackTopics = TrackTopic::all(); 
        return view('admin.courses.edit', compact('course','trackTopics'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        $validator = Validator::make($request->all(),[
            'title' => ['required', 'string', 'max:255'],
            'price' => ['required', 'regex:/^(?=.+)(?:[1-9]\d*|0)?(?:\.\d+)?$/', 'between:0,99.99'],
            'banner' => ['nullable', 'image', 'file', 'mimes:png', 'max:512', 'dimensions:min_width=600,min_height=300'],
            'level' => ['required', 'string'],
            'short_description' => ['required', 'string' ],
            'track_topic_id' => ['required'],
        ],[
            'track_topic_id.required' => 'Track or Topic checkbox is required.'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        $input = $request->all();

        $course->admin_id = Auth::user()->id;

        if ($request->banner) {
            $banner = $request->banner;
        
            $banner_target_name = 'banner'.time().$banner->getClientOriginalName();
            
            $destination = public_path('uploadfiles/courses/banners/');

            $img = Image::make($banner->getRealPath());
            $img->resize(600, 300);
            $img->save($destination.$banner_target_name);

            $course->banner = $banner_target_name;

            if (File::exists($destination.$course->image)) {
                unlink($destination.$course->image);
            }
        }else{
            $course->banner = $course->banner; 
        }

        $course->trackTopics()->sync($request->track_topic_id);

        $course->fill($input)->save();

        return redirect('admin/courses')->with('message','Course has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        $course->lessons()->delete();
        $course->delete();

        return redirect('admin/courses')->with('message','Course has been deleted successfully.');
    }
}
