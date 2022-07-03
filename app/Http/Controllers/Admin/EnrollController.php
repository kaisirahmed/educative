<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Enroll;
use Illuminate\Http\Request;

class EnrollController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $enrolls = Enroll::latest()->get(); 
        return view('admin.enrolls.index', compact('enrolls'));
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
     * @param  \App\Enroll  $enroll
     * @return \Illuminate\Http\Response
     */
    public function show(Enroll $enroll)
    {
        return view('admin.enrolls.show', compact('enroll'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Enroll  $enroll
     * @return \Illuminate\Http\Response
     */
    public function edit(Enroll $enroll)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Enroll  $enroll
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Enroll $enroll)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Enroll  $enroll
     * @return \Illuminate\Http\Response
     */
    public function destroy(Enroll $enroll)
    {
        $enroll->delete();

        return redirect('admin/enrolls')->with('message','Enroll has been deleted successfully.');
    }
}
