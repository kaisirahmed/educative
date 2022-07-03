<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin;
use App\Coupon;
use App\Course;
use App\Enroll;
use App\Lesson;
use App\LessonList;
use App\Quiz;
use App\Subscription;
use App\TrackTopic;
use App\User;
use App\Blog;

class AdminController extends Controller
{ 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function admin()
    {
        $authors = Admin::all()->where('role','admin')->count();
        $coupons = Coupon::all()->count();
        $courses = Course::all()->count();
        $enrolls = Enroll::all()->count();
        $lessons = Lesson::all()->count();
        $lessonLists = LessonList::all()->count();
        $quizzes = Quiz::all()->count();
        $subscriptions = Subscription::all()->count();
        $tracks = TrackTopic::all()->where('course_type','track')->count();
        $topics = TrackTopic::all()->where('course_type','topic')->count();
        $students = User::all()->count();
        $blogs = Blog::all()->count();

        $percentSubscriptions = intval(($subscriptions / $courses) * 100);

        $compact = [
            'authors','coupons','courses','enrolls','lessons','lessonLists',
            'quizzes','subscriptions','tracks','topics','students','blogs','percentSubscriptions'
        ];
        return view('admin.index.index', compact($compact));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->superAdmin()) {
            $admins = Admin::all()->sortByDesc('created_at');
        }else{
            $admins = Admin::all()->where('role','admin')->sortByDesc('created_at');
        }
        
        return view('admin.authors.index', compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $author)
    {
        return view('admin.authors.edit', compact('author'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admin $author)
    {
        $validator = Validator::make($request->all(),[
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
        ]);

        if ($validator->fails()) {  
            return redirect()->back()->withErrors($validator);
        }else{
            $author->name = $request->name;
            $author->email = $request->email;
            $author->role = 'admin';
            $author->save();

            return redirect('admin/authors')->with('message','Author updated successfully.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $author)
    {
        Admin::destroy($author->id);

        return redirect('admin/authors')->with(['message'=>'Author has been deleted successfully.']);
    }
}
