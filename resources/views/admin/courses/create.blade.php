@extends('admin.layouts.layout')
@section('title','Course Create')
@section('content')
<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">

                <div class="card">
                    <div class="card-body">
 
                        {!! Form::open(['route' => 'admin.courses.store','files' => true]) !!}

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="title">Course Title</label>
                                        <input id="title" name="title" type="text" class="form-control @error('title') is-invalid @enderror">

                                        @error('title')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('title') }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="input-currency">Course Price (৳)</label>

                                        <input id="input-currency" name="price" class="form-control input-mask text-left @error('price') is-invalid @enderror" data-inputmask="'alias': 'numeric', 'groupSeparator': ',', 'digits': 2, 'digitsOptional': false, 'placeholder': '0'">
                                        
                                        @error('price')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('price') }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                   
                                </div>
                                <div class="col-sm-6">                                  
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
                                        <label class="control-label">Course Level</label><br>
                                        &nbsp;&nbsp;&nbsp;
                                        <input class="@error('short_description') is-invalid @enderror" type="radio" name="level" value="Beginner">
                                        <label class="control-label">Beginner</label>
                                        &nbsp;&nbsp;&nbsp;
                                        <input class="@error('short_description') is-invalid @enderror" type="radio" name="level" value="Intermediate">
                                        <label class="control-label">Intermediate</label>
                                        &nbsp;&nbsp;&nbsp;
                                        <input class="@error('short_description') is-invalid @enderror" type="radio" name="level" value="Advanced">
                                        <label class="control-label">Advanced</label>

                                        @error('level')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('level') }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                     
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="shortdescription">Short Description</label>
                                        <textarea name="short_description" class="form-control @error('short_description') is-invalid @enderror" id="textCkeditor" rows="5"></textarea>

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
                                    <div class="form-group">
                                        <label class="control-label @error('track_topic_id') is-invalid @enderror">Course Type</label><br>

                                        <label class="control-label">Track</label> <br>

                                        @error('track_topic_id')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('track_topic_id') }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                
                                @foreach($trackTopics->where('course_type','track') as $track)

                                <div class="col-sm-6">
                                    
                                    <div class="form-group">
                                       
                                        <input class="" type="checkbox" name="track_topic_id[]" value="{{ $track->id }}">

                                        <label>{{ $track->title }}</label><br>

                                    </div>
                                   
                                </div>

                                @endforeach

                            </div>
                            <hr>

                            <div class="row">
                                <div class="col-sm-12">
                                 
                                <label class="control-label  @error('track_topic_id') is-invalid @enderror">Topic</label> <br>

                                @error('track_topic_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('track_topic_id') }}</strong>
                                    </span>
                                @enderror
                                <br>
                                </div>

                                @foreach($trackTopics->where('course_type','topic') as $topic)

                                <div class="col-sm-6">
                                    
                                    <div class="form-group">
                                       
                                        <input type="checkbox" name="track_topic_id[]" value="{{ $topic->id }}">
                                        <label>{{ $topic->title }}</label><br>

                                    </div>
                                   
                                </div>

                                @endforeach
                            </div>
 
                            <button type="submit" class="btn btn-info waves-effect waves-light mr-1">Submit</button>
                            <button type="reset" class="btn btn-warning waves-effect">Reset</button>

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
