@extends('admin.layouts.layout')
@section('title','Course Edit')
@section('content')
<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">

                <div class="card">
                    <div class="card-body">
                        
                        {!! Form::open([ 'method'=>'PATCH', 'route' => ['admin.courses.update', $course->id], 'files' => true ]) !!}
                        
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="title">Course Title</label>
                                        <input id="title" name="title" type="text" class="form-control @error('title') is-invalid @enderror" value="{{ $course->title }}">

                                        @error('title')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('title') }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="price">Course Price</label>
                                        <input id="price" name="price" type="text" class="form-control @error('price') is-invalid @enderror" value="{{ $course->price }}">

                                        @error('price')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('price') }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="control-label">Course Level</label><br>
                                        &nbsp;&nbsp;&nbsp;
                                        <input type="radio" name="level" value="Beginner" {{ $course->level === 'Beginner' ? 'checked' : '' }}>
                                        <label class="control-label">Beginner</label>
                                        &nbsp;&nbsp;&nbsp;
                                        <input type="radio" name="level" value="Intermediate" {{ $course->level === 'Intermediate' ? 'checked' : '' }}>
                                        <label class="control-label">Intermediate</label>
                                        &nbsp;&nbsp;&nbsp;
                                        <input type="radio" name="level" value="Advanced" {{ $course->level === 'Advanced' ? 'checked' : '' }}>
                                        <label class="control-label">Advanced</label>

                                        @error('level')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('level') }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                </div>

                                <div class="col-md-6">
                                    
                                    <div class="form-group">
                                        <label>Banner</label>
                                        <input type="file" name="banner" class="filestyle @error('banner') is-invalid @enderror" data-buttonname="btn-secondary">

                                        @error('banner')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('banner') }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>Previous Banner</label><br>
                                        <img style="max-width: 100%; max-height: 220px;" src="{{ asset('uploadfiles/courses/banners/'.$course->banner) }}" alt="courseBanner">
                                    </div>  
                                     
                                </div>

                                <div class="col-sm-12">

                                    <div class="form-group">
                                        <label for="shortdescription">Short Description</label>
                                        <textarea name="short_description" class="form-control @error('short_description') is-invalid @enderror" id="textCkeditor" rows="5">{!! $course->short_description !!}</textarea>

                                        @error('short_description')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('short_description') }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                </div>

                            </div>

                            <div class="row">
                                <div class="col-sm-12">
                                    <label class="control-label">Course Type</label><br>

                                    <label class="control-label">Track</label> <br>

                                </div>
                                @foreach($trackTopics->where('course_type','track') as $track)

                                <div class="col-sm-6">
                                    
                                    <div class="form-group">
                                       
                                        <input type="checkbox" name="track_topic_id[]" value="{{ $track->id }}" @if($course->trackTopics()->where('course_type','track')->pluck('track_topic_id')->contains($track->id)) checked @endif>

                                        <label>{{ $track->title }}</label><br>

                                    </div>
                                   
                                </div>

                                @endforeach
                            </div>
                            <hr>

                            <div class="row">
                                <div class="col-sm-12">
                                 
                                <label class="control-label">Topic</label> <br>

                                </div>
                                @foreach($trackTopics->where('course_type','topic') as $topic)

                                <div class="col-sm-6">
                                    
                                    <div class="form-group">
                                       
                                        <input type="checkbox" name="track_topic_id[]" value="{{ $topic->id }}" @if($course->trackTopics()->where('course_type','topic')->pluck('track_topic_id')->contains($topic->id)) checked @endif>
                                        <label>{{ $topic->title }}</label><br>

                                    </div>
                                   
                                </div>

                                @endforeach
                            </div>
 
                            <button type="submit" class="btn btn-info waves-effect waves-light mr-1">Update</button>

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
