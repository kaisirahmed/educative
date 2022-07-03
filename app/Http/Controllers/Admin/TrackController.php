<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\Controller;
use App\TrackTopic;
use Illuminate\Http\Request;

class TrackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tracks = TrackTopic::all()->where('course_type','track')->sortByDesc('created_at');
        return view('admin.learningTracks.index', compact('tracks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.learningTracks.create');
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
            'image' => ['required', 'image', 'file', 'mimes:png', 'max:512', 'dimensions:min_width=800,min_height=300'],
            'short_description' => ['required', 'string'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }  

        $input = $request->all();

        $banner = $request->image;
        
        $banner_target_name = 'banner'.time().$banner->getClientOriginalName();
        
        $destination = public_path('uploadfiles/tracks/banners/');

        $img = Image::make($banner->getRealPath());
        $img->resize(600, 300);
        $img->save($destination.$banner_target_name);

        $input['image'] = $banner_target_name;
      
        TrackTopic::create($input);

        return redirect('admin/tracks')->with('message','Track has beed created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Track  $track
     * @return \Illuminate\Http\Response
     */
    public function show(TrackTopic $track)
    {
        return view('admin.learningTracks.show', compact('track'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Track  $track
     * @return \Illuminate\Http\Response
     */
    public function edit(TrackTopic $track)
    {  
        return view('admin.learningTracks.edit', compact('track'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Track  $track
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TrackTopic $track)
    {
        $validator = Validator::make($request->all(),[
            'title' => ['required', 'string', 'max:100'],
            'image' => ['nullable', 'image', 'file', 'mimes:png', 'max:512', 'dimensions:min_width=800,min_height=300'],
            'short_description' => ['required', 'string'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }  

        $input = $request->all();
       
        if (!empty($request->image)) {

            $banner = $request->image;
        
            $banner_target_name = 'banner'.time().$banner->getClientOriginalName();
            
            $destination = public_path('uploadfiles/tracks/banners/');

            $img = Image::make($banner->getRealPath());
            $img->resize(600, 300);
            $img->save($destination.$banner_target_name);

            $input['image'] = $banner_target_name;

            if (File::exists($destination.$track->image)) {
                unlink($destination.$track->image);
            }
        
        }else{
            $input['image'] = $track->image; 
        }

        TrackTopic::find($track->id)->update($input);

        return redirect('admin/tracks')->with('message','Track has beed updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Track  $track
     * @return \Illuminate\Http\Response
     */
    public function destroy(TrackTopic $track)
    {
        TrackTopic::destroy($track->id);
        return redirect('admin/tracks')->with('message','Track has been deleted successfully.');
    }
}
