<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use App\LessonList;
use App\Lesson;
use Illuminate\Http\Request;

class LessonListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lessonLists = LessonList::latest()->get();
        return view('admin.lessonLists.index', compact('lessonLists'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lessons = Lesson::latest()->get();
        return view('admin.lessonLists.create', compact('lessons'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, LessonList $lessonlist)
    {
        $validator = Validator::make($request->all(),[
            'lesson_id' => ['required'],
            'title' => ['required', 'string'],
            'order_number' => ['required','numeric'],
            'description' => ['required', 'string'],
            'preview' => ['required', 'boolean'],
        ],
        [
            'lesson_id.required' => 'Lesson title selection is required.',
            'order_number.numeric' => 'List order must be numeric.',
            'order_number.required' => 'List order_number field is required.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        $lessonlist->lesson_id = $request->lesson_id;
        $lessonlist->title = $request->title;
        $lessonlist->order_number = $request->order_number;
        $lessonlist->description = $request->description;
        $lessonlist->preview = $request->preview;
        $lessonlist->save();

        return redirect('admin/lessonlists')->with('message','Lesson List has been created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\LessonList  $lessonList
     * @return \Illuminate\Http\Response
     */
    public function show(LessonList $lessonlist)
    { 
        return view('admin.lessonLists.show', compact('lessonlist'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\lessonList  $lessonlist
     * @return \Illuminate\Http\Response
     */
    public function edit(LessonList $lessonlist)
    {
        $lessons = Lesson::latest()->get();
        return view('admin.lessonLists.edit', compact('lessonlist','lessons'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\LessonList  $lessonlist
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LessonList $lessonlist)
    {
        $validator = Validator::make($request->all(),[
            'lesson_id' => ['required'],
            'title' => ['required', 'string'],
            'order_number' => ['required','numeric'],
            'description' => ['required', 'string'],
            'preview' => ['required', 'boolean'],
        ],
        [
            'lesson_id.required' => 'Lesson title selection is required.',
            'order_number.numeric' => 'List order must be numeric.',
            'order_number.required' => 'List order_number field is required.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        $lessonlist->lesson_id = $request->lesson_id;
        $lessonlist->title = $request->title;
        $lessonlist->order_number = $request->order_number;
        $lessonlist->description = $request->description;
        $lessonlist->preview = $request->preview;
        $lessonlist->save();

        return redirect('admin/lessonlists')->with('message','Lesson List has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\LessonList  $lessonlist
     * @return \Illuminate\Http\Response
     */
    public function destroy(LessonList $lessonlist)
    {
        $lessonlist->delete();

        return redirect('amdin/lessonlists')->with('message','Lesson list deleted successfully.');
    }
}
