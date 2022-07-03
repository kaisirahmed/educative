<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\ContactMail;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.contact.contact');
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
        $validator = Validator::make($request->all(),[
            'name'  =>  ['required','string'],
            'email' =>  ['required','email'],
            'subject'   =>  ['required','string'],
            'message'   =>  ['required','string'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        $data = array(
            'name'  =>  $request->name,
            'email' =>  $request->email,
            'subject'   =>  $request->subject,
            'message'   =>  $request->message
        );

        try{
            Mail::to($request->email)->send(new ContactMail($data));

            return redirect()->back()->with('message','E-mail sent successfully. We will contact you very soon.');
        }catch(Exception $ex){
            return redirect()->back()->with('error-mail','There was a problem sending e-mail.');
        }        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
