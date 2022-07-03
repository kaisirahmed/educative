@extends('frontend.layouts.layout')
@section('title', $lessons->title | $course->title)
@section('content')
<div class="container page__container" style="margin-top: 90px;" id="courseLesson">
    <div class="sidenav">
        <div class="m-4">
            <h6 class="mb-4">{{ $course->title }}</h6>
            <div class="progress mb-4">
				@if(Auth::check() && $isSubscribed)
					<span role="progressbar" class="progress-bar progress-bar-success" aria-valuenow="{{ $enroll->percent_completion }}" aria-valuemin="0" aria-valuemax="100" style="width: 20;">{{ $enroll->percent_completion }}</span>
				@endif
            </div>
            <div class="mb-4">
                <div class="search-form search-form--light d-none d-sm-flex flex">
				<input type="text" v-model="keywords" v-debounce="5000" v-on:keyup="SearchLessonList('{{ $course->id }}')" class="form-control" placeholder="Search lesson">
                    <button class="btn" type="submit"><i class="material-icons">search</i></button>
				</div>
				<ul v-if="results.length > 0" class="timeline">
					<li v-for="result in results" :key="result.id" v-html="Highlight(result.title)" v-on:click="LessonListDetail('/course/{{ $course->id }}/'+result.lesson_id+'/'+result.slug)"></li>
				</ul>
            </div>
        </div>
        <div class="m-4 table-content">

        	@foreach($course->lessons as $lessons)
            	<h4>
            		<span class="course-content-title" data-toggle="tooltip"
            	 	data-title="{{ $lessons->title }}">{{ $lessons->title }}</span> 
            	 	<span class="collapse-course-content material-icons">keyboard_arrow_up</span>
            	</h4>
          
            <ul class="timeline">
	        	@foreach($lessons->lessonLists as $lessonLists)
		            @if(Auth::check())
		                @if($isSubscribed)

		                <li v-on:click="LessonListDetail('/course/{{ $course->id }}/{{ $lessons->id }}/{{ $lessonLists->slug }}')">
		                    {{ $lessonLists->title }}
		                </li>

		                @else
						<li class="{{ $lessonLists->preview === 1 ? '' : 'preview-unavailable' }}" v-on:click="LessonListDetail('/course/{{ $course->id }}/{{ $lessons->id }}/{{ $lessonLists->slug }}')">
						
							{{ $lessonLists->title }}
	
						</li>
						@endif
		            @else
		            <li class="{{ $lessonLists->preview === 1 ? '' : 'preview-unavailable' }}" v-on:click="LessonListDetail('/course/{{ $course->id }}/{{ $lessons->id }}/{{ $lessonLists->slug }}')" v-bind:backgrounds="color">
						
		                {{ $lessonLists->title }}

		            </li>
	            	@endif
	            @endforeach

	            @if(Auth::check())
		            @if(count($lessons->quizzes) > 0)
		                <li class="{{ $isSubscribed ? '' : 'preview-unavailable' }}" v-on:click="LessonListDetail('/course/{{ $course->id }}/{{ $lessons->id }}/quizzes')">Quiz</li>
		            @endif

		        @else
	                @if(count($lessons->quizzes) > 0)
	                	<li class="{{ Auth::check() ? '' : 'preview-unavailable' }}" v-on:click="LessonListDetail('/course/{{ $course->id }}/{{ $lessons->id }}/quizzes')">Quiz</li>
	                @endif
	            @endif
	        </ul>
 			@endforeach
 			
        </div>
        <div class="m-2 text-center"><button type="button" class="btn btn-primary">Mark as completed</button></div>
    </div>

    <div class="main">

        <div class="d-flex justify-content-center" style="min-height: 600px" v-if="isLoading">
	        <div class="spinner-border" role="status">
	           	<span class="sr-only">Loading...</span>
	        </div>
        </div>
		
		<div v-else-if="lessonList">
			<h2 v-text="lessonList.title" style="font-weight: 800;"></h2>
			<br>
			@if(Auth::check() && $isSubscribed)
				<div v-html="lessonList.description"></div>
			@else
			<div v-if="lessonList.preview === 1" v-html="lessonList.description"></div>

			<div v-else>
				<div style="min-height: 500px;">
					
					<h5><i class="material-icons" style="color: red;">lock</i>This lesson is not available in preview. <button class="btn btn-outline-info">Buy now</button> for full access.</h5>
				</div>
			</div>
			@endif
		</div>
		
        <div v-else>
			<h2 style="font-weight: 800;">{{ $lessonList->title }}</h2>
			<br>
			
			@if(Auth::check() && $isSubscribed)
				{!! $lessonList->description !!}
			@elseif($lessonList->preview === 1)
				{!! $lessonList->description !!}
			@else
			<div style="min-height: 500px;">
				<h5><i class="material-icons" style="color: red;">lock</i>This lesson is not available in preview. <button class="btn btn-outline-info">Buy now</button> for full access.</h5>
			</div>
			@endif
		</div>
      
        
               
        <div class="mr-4 mb-2">
            <input type="checkbox" checked/>
            Mark as Completed
        </div>

        <div class="mb-4">
            <button class="btn btn-primary"><span class='material-icons'>keyboard_arrow_left</span>&nbsp;Previous</button>

            <button class="btn btn-primary float-right">Next&nbsp;<span class='material-icons'>keyboard_arrow_right</span></button>
        </div>
        <hr/ >
    </div>
</div>
 
@endsection