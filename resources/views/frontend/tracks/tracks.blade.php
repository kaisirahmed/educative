@extends('frontend.layouts.layout')
@section('title','Tracks')
@section('content')
<div class="container page__container" id="app">
    <div class="row mb-5">
        <div class="col-xs-12 col-sm-6 col-md-6">
            <h2 class="bold m-4 text-center">Learning Tracks</h2>                
            <div class="card-text">We understand that sometimes you need more than one course to achieve your learning goals. We’re here to help. <br><br>Tracks arrange courses on a topic in sequence, saving you the effort of going through our courses to find out which ones fit well together, and in what order.<br><br>
            Our tracks are carefully vetted and arranged to maximize your learning experience.
            Happy learning!</div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-6 text-center">
            <img class="p-5" src="{{ asset('learningAssets/images/tracks.png') }}" width="60%"/>
        </div>                    
    </div>

    <tracks></tracks>
    
</div>
@endsection