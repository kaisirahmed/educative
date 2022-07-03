@extends('frontend.layouts.layout')
@section('title','Topics')
@section('content')
<div class="container page__container" id="app">
	<div class="row m-4 p-4">
        <div class="col-md-12">
            <h1 class="text-center">
               
            <img class="float-right" src="{{ asset('learningAssets/images/topics.png') }}" alt="Topic Cap">
            <h2 class="bold text-center">I want to...</h2>
            <h1 class="bold text-center"> become a developer</h1>
            <p class="text-center">Take the first steps on your journey toward becoming a software developer</p>
        </h1>
        </div>
    </div>
    <h2 class="bold m-3 p-3 text-center"><i class="material-icons bold" style="font-size: 50px">code</i>&nbsp;Topics</h2>
    <topics></topics>
    <div class="text-center m-4 pb-4">
        <a href="#" class="btn btn-outline-info btn-lg">View All Courses</a>
    </div>
</div>
@endsection