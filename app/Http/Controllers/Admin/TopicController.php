<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\Controller;
use App\TrackTopic;
use Illuminate\Http\Request;

class TopicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $topics = TrackTopic::all()->where('course_type','topic')->sortByDesc('created_at');
        return view('admin.learningTopics.index', compact('topics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.learningTopics.create');
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
            'title' => ['required', 'string', 'max:100'],
            'image' => ['required', 'image', 'file', 'mimes:png', 'max:512', 'dimensions:min_width=160,min_height=160'],
            'short_description' => ['required', 'string'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }  

        $input = $request->all();

        $icon = $request->image;
        
        $iconTargetName = 'icon'.time().$icon->getClientOriginalName();
        
        $destination = public_path('uploadfiles/topics/icons/');

        Image::make($icon->getRealPath())->save($destination.$iconTargetName);

        $input['image'] = $iconTargetName;
      
        TrackTopic::create($input);

        return redirect('admin/topics')->with('message','Topic has beed created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function show(TrackTopic $topic)
    {
        return view('admin.learningTopics.show', compact('topic'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function edit(TrackTopic $topic)
    {
        return view('admin.learningTopics.edit', compact('topic'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TrackTopic $topic)
    {
        $validator = Validator::make($request->all(),[
            'title' => ['required', 'string', 'max:100'],
            'image' => ['nullable', 'image', 'file', 'mimes:png', 'max:512', 'dimensions:min_width=160,min_height=160'],
            'short_description' => ['required', 'string'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }  

        $input = $request->all();

        if (!empty($request->image)) {

            $icon = $request->image;
            
            $iconTargetName = 'icon'.time().$icon->getClientOriginalName();
            
            $destination = public_path('uploadfiles/topics/icons/');

            Image::make($icon->getRealPath())->save($destination.$iconTargetName);

            $input['image']=$iconTargetName;

            if (File::exists($destination.$topic->image)) {
                unlink($destination.$topic->image);
            }
        
        }else{
            $input['image'] = $topic->image; 
        }

        TrackTopic::find($topic->id)->update($input);

        return redirect('admin/topics')->with('message','Topic has beed updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function destroy(Topic $topic)
    {
        TrackTopic::destroy($topic->id);

        return redirect('admin/topics')->with('message','Topic has been deleted successfully.');
    }
}
