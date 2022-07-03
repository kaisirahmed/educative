<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\Controller;
use App\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::latest()->get();
        return view('admin.blogs.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.blogs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Blog $blog)
    {
        $validator = Validator::make($request->all(),[
            'title' => ['required', 'string', 'max:100'],
            'banner' => ['required', 'image', 'file', 'mimes:png,jpg,jpeg', 'max:1024'],
            'description' => ['required', 'string'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }  

        $blog->title = $request->title;
        $blog->admin_id = Auth::user()->id;
        $blogBanner = $request->banner;
        
        $blogTargetName = 'blogBanner'.time().$blogBanner->getClientOriginalName();
        
        $destination = public_path('uploadfiles/blogs/banners/');

        Image::make($blogBanner->getRealPath())->save($destination.$blogTargetName);

        $blog->banner = $blogTargetName;
        $blog->description = $request->description;
        $blog->save();

        return redirect('admin/blogs')->with('message','Blog has beed created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        return view('admin.blogs.show', compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        return view('admin.blogs.edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
        $validator = Validator::make($request->all(),[
            'title' => ['required', 'string', 'max:100'],
            'banner' => ['nullable', 'image', 'file', 'mimes:png,jpg,jpeg', 'max:1024'],
            'description' => ['required', 'string'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }  

        $blog->title = $request->title;
        $blog->admin_id = Auth::user()->id;

        if (!empty($request->banner)) {
            $blogBanner = $request->banner;
        
            $blogTargetName = 'blogBanner'.time().$blogBanner->getClientOriginalName();
            
            $destination = public_path('uploadfiles/blogs/banners/');

            Image::make($blogBanner->getRealPath())->save($destination.$blogTargetName);

            $blog->banner = $blogTargetName;

            if (File::exists($destination.$blog->banner)) {
                unlink($destination.$blog->banner);
            }
        }else{
            $blog->banner = $blog->banner;
        }
        
        $blog->description = $request->description;
        $blog->save();

        return redirect('admin/blogs')->with('message','Blog has beed updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        $blog->delete();

        return redirect('admin/blogs')->with('message','Blog has been deleted successfully.');
    }
}
