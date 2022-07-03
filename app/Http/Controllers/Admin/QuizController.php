<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use App\Lesson;
use App\Quiz;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $quizzes = Quiz::latest()->get();
        return view('admin.quizzes.index', compact('quizzes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lessons = Lesson::latest()->get();
        return view('admin.quizzes.create', compact('lessons'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Quiz $quiz)
    {
        $validator = Validator::make($request->all(),[
            'lesson_id' => ['required'],
            'question' => ['required', 'string'],
            'question_type' => ['required'],
            'options' => ['required'],
            'correct_answer' => ['required'],
        ],
        [
            'lesson_id.required' => 'Lesson title selection is required.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }
 
        $quiz->lesson_id = $request->lesson_id;
        $quiz->question = $request->question;
        $quiz->question_type = $request->question_type;
        $quiz->options = $request->options;
        $quiz->correct_answer = $request->correct_answer;
        $quiz->save();

        return redirect('admin/quizzes')->with('message','Quiz has been created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function show(Quiz $quiz)
    {  
        return view('admin.quizzes.show', compact('quiz'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function edit(Quiz $quiz)
    {
        $lessons = Lesson::latest()->get();
        return view('admin.quizzes.edit', compact('quiz','lessons'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Quiz $quiz)
    {
        $validator = Validator::make($request->all(),[
            'lesson_id' => ['required'],
            'question' => ['required', 'string'],
            'question_type' => ['required'],
            'options' => ['required'],
            'correct_answer' => ['required'],
        ],
        [
            'lesson_id.required' => 'Lesson title selection is required.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }
 
        $quiz->lesson_id = $request->lesson_id;
        $quiz->question = $request->question;
        $quiz->question_type = $request->question_type;
        $quiz->options = $request->options;
        $quiz->correct_answer = $request->correct_answer;
        $quiz->save();

        return redirect('admin/quizzes')->with('message','Quiz has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function destroy(Quiz $quiz)
    {
        $quiz->delete();

        return redirect('admin/quizzes')->with('message','Quiz has been deleted successfully.');
    }
}
