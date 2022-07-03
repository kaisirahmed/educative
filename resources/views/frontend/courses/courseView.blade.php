@extends('frontend.layouts.layout')
@section('title', $course->title)
@section('content')
 <div class="container page__container" style="margin-top: 90px;" id="app">
    
    <h2 class="bold m-4 text-center">{{ $course->title }}</h2>
    <h6 class="mb-4 text-center"><i> by <a href="#">

        <img class="course-img-user rounded-circle" width="50px" src="{{ asset('learningAssets/images/logo.png') }}" alt="Card image cap"></a>&nbsp;&nbsp;<a href="">{{ $course->admin->name }}</a></i></h6>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="text-center">
                <img class="text-center" src="{{ asset('uploadfiles/courses/banners/'.$course->banner) }}" alt="">

                <div class="m-2">
                    <span><img class="course-img-level" src="{{ asset('learningAssets/images/'.$course->level.'.png') }}" alt="Card image cap">&nbsp;<span class='course-level'>{{ $course->level }}</span></span>&nbsp;&nbsp;
                    <span>{{ count($course->lessons) }}&nbsp;Lessons</span>
                </div>
            </div>

            <div class="p-4">
               {!! $course->short_description !!}
            </div>

            <div class="p-4 bg-white">
                <nav> 
                    <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                    	@if(count($course->lessons) > 0)
                            <a class="nav-item nav-link active" id="nav-content-tab" data-toggle="tab" href="#nav-content" role="tab" aria-controls="nav-content" aria-selected="true">Contents</a> 
                        @endif

                        @if(count($course->trackTopics) > 0)

                        @foreach($course->trackTopics as $trackTopics)
                       		@php 	
                       			$course_types[] = $trackTopics->course_type;	
                       		@endphp
                       	@endforeach
                          
                        @foreach(array_unique($course_types) as $course_type)
                        
                            <a class="nav-item nav-link" id="nav-track-tab" data-toggle="tab" href="#nav-{{ $course_type }}" role="tab" aria-controls="nav-{{ $course_type }}" aria-selected="false">{{ ucfirst($course_type) }}</a>
                        
                        @endforeach	
                        @endif
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-content" role="tabpanel" aria-labelledby="nav-content-tab">
                        <div class="m-4 col-md-12">
                        	@foreach($course->lessons as $key => $lessons)
                                <h4>
                                    <span class="course-content-title">{{ $key+1 }}. {{ $lessons->title }}</span>
                                </h4>

                                <div class="{{ count($lessons->lessonLists) > 0 ? 'timeline-area' : '' }}">

                            <ul class="timeline">

                            	@foreach($lessons->lessonLists as $lessonLists)
                                @if(Auth::check())
                                    @if($isSubscribed)

                                    <li onclick="window.location.href = '/course/{{ $course->id }}/{{ $lessons->id }}/{{ $lessonLists->slug }}'">
                                        {{ $lessonLists->title }}
                                    </li>

                                    @endif
                                    
                                @else
                                <li class="{{ $lessonLists->preview === 1 ? '' : 'preview-unavailable' }}" onclick="window.location.href = '/course/{{ $course->id }}/{{ $lessons->id }}/{{ $lessonLists->slug }}'">

                                    {{ $lessonLists->title }}

                                    @if($lessonLists->preview === 1)
                                        <small class="badge badge-soft-success ">FREE PREVIEW</small>
                                    @endif
                                </li>
                                @endif

                                @endforeach
                                @if(Auth::check())

                                    @if(count($lessons->quizzes) > 0)
                                        <li class="{{ $isSubscribed ? '' : 'preview-unavailable' }}" onclick="window.location.href = '/course/{{ $course->id }}/{{ $lessons->id }}/quizzes'">Quiz</li>
                                    @endif
                                @else
                                    @if(count($lessons->quizzes) > 0)
                                        <li class="{{ Auth::check() ? '' : 'preview-unavailable' }}" onclick="window.location.href = '/course/{{ $course->id }}/{{ $lessons->id }}/quizzes'">Quiz</li>
                                    @endif
                                @endif
                            </ul>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    
                    <div class="tab-pane fade" id="nav-track" role="tabpanel" aria-labelledby="nav-track-tab">
                        <div class="row style-course m-4">
                        	@foreach($course->trackTopics as $trackTopics)
                        	 
                        	@if($trackTopics->course_type == 'track')
                        	<div class="col-xs-12 col-sm-6 col-md-6">
					            <div class="card">
					                <img class="card-img-top" src="{{ asset('/uploadfiles/tracks/banners/'.$trackTopics->image)}}" alt="Card image cap">
					                <div class="card-body row">
					                    <div class="col-md-12">
					                        <h5 class="bold card-text pb-4 pt-4">{{ $trackTopics->title }}</h5>
					                    </div>
					                    <div class="col-md-12 pb-4">
					                        <p class="card-text">{!! $trackTopics->short_description !!}</p>
					                    </div>
					                </div>
					            </div>
					        </div> 
					        @endif
                        	@endforeach
                            
                        </div>
                    </div>

                    <div class="tab-pane fade" id="nav-topic" role="tabpanel" aria-labelledby="nav-topic-tab">
                    	<div class="row style-course m-4">
                    	@foreach($course->trackTopics as $trackTopics)
						@if($trackTopics->course_type == 'topic')
				        <div class="col-xs-12 col-sm-4 col-md-3">
				            <div class="image-flip" >
				                <div class="mainflip flip-0">
				                    <div class="frontside">
				                        <div class="card">
				                            <div class="card-body text-center">
				                                <h5 class="card-title">{{ $trackTopics->title }}</h5>
				                                <p><img height="50px" width="50px" class="img-fluid" src="{{ asset('uploadfiles/topics/icons/'.$trackTopics->image)}}" alt="topic image"></p>
				                            </div>
				                        </div>
				                    </div>
				                    <div class="backside">
				                        <div class="card">
				                            <div class="card-body text-center">
				                                <h5 class="card-title">{{ $trackTopics->title }}</h5>
				                                <p class="card-text">{!! Str::limit($trackTopics->short_description, 50) !!}
				                                </p>
				                                
				                                <ul class="list-inline">
				                                    <li class="list-inline-item">
                                                    <a class="btn btn-info btn-rounded btn-sm text-xs-center text-light" onclick="window.location.href = '{{ route('topic.courses',['slug'=>$trackTopics->slug]) }}';">
				                                            Explore
				                                        </a>
				                                    </li>
				                                </ul>
				                            </div>
				                        </div>
				                    </div>
				                </div>
				            </div>
				        </div> 
						@endif
                        @endforeach	
                        </div>						
                    </div>
                </div>
            </div>
        </div>
    </div>                
</div>
@endsection