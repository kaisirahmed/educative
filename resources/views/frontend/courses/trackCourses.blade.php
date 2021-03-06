@extends('frontend.layouts.layout')
@section('title', $track->title)
@section('content')
 <div class="container page__container" style="margin-top: 90px;" id="app">
    <h2 class="bold m-4 text-center">{{ $track->title }}</h2>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="text-center">
                <img class="text-center" src="{{ asset('uploadfiles/tracks/banners/'.$track->image) }}" alt="Tack Banner">                            
            </div>
            <div class="m-4">
                <i class="material-icons">library_books</i>&nbsp;&nbsp;<span>{{ count($track->courses) }}&nbsp;Courses</span>
            </div>

            <div class="p-4">
               {{ $track->short_description }}
            </div>

            <div class="p-4">
                <div class="main-timeline4 style-course">
                	@foreach($track->courses as $course)
                    <div class="timeline">
                    <div class="timeline-content">                                        
                            <div class="card">
                                <img class="card-img-top" src="{{ asset('uploadfiles/courses/banners/'.$course->banner) }}" alt="Course cover image" title="Course cover image">
                                <div class="card-body row">
                                 
                                    <div class="col-md-12 border-bottom card-header">
                                        <img class="course-img-user rounded-circle" width="35px" src="{{ asset('learningAssets/images/logo.png') }}" alt="Card image cap" title="eLearning icon">&nbsp;
                                        <span class="tutor-name" title="Author name">{{ $course->admin->name }}</span>
                                        <span class="float-right d-inline-flex course-cost">৳ {{ $course->price }}</span>
                                    </div>
                                    <div class="col-md-12">
                                        <p class="card-text pb-4 pt-4">{{ $course->title }}</p>
                                    </div>
                                    <div class="col-md-12 border-bottom mb-4 pb-4">
                                        <!--<span>0% completed</span>-->
                                        <span class="progress">
                                            <span role="progressbar" class="progress-bar progress-bar-success" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 20%;">20</span>
                                        </span>
                                        <span class="btn btn-light float-right" onclick="window.location.href = '{{ route('course',['slug'=>$course->slug]) }}';"> Preview <i class="material-icons">arrow_forward</i></span>
                                    </div>
                                    <div class="col-md-12 mb-4">
                                        <span class="mr-2">
                                            <a href="#" class="rating-link active"><i class="material-icons icon-16pt">star</i></a>
                                            <a href="#" class="rating-link active"><i class="material-icons icon-16pt">star</i></a>
                                            <a href="#" class="rating-link active"><i class="material-icons icon-16pt">star</i></a>
                                            <a href="#" class="rating-link active"><i class="material-icons icon-16pt">star_half</i></a>
                                            <a href="#" class="rating-link active"><i class="material-icons icon-16pt">star_outline</i></a>
                                        </span>
                                        <strong>3.7</strong>
                                        <small class="text-muted float-right">(150 ratings)</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>                
</div>
@endsection