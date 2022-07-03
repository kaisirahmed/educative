@extends('admin.layouts.layout')
@section('title','Topics New')
@section('content')

<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
  
                        {!! Form::open(['route' => 'admin.topics.store','files' => true]) !!}

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="title">Title</label>
                                        <input id="title" name="title" type="text" class="form-control @error('title') is-invalid @enderror">

                                        @error('title')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('title') }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <input type="hidden" name="course_type" value="topic">
                                   <div class="form-group">
                                        <label>Icon</label>
                                        <input type="file" name="image" class="filestyle @error('image') is-invalid @enderror" data-buttonname="btn-secondary">

                                        @error('image')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('image') }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="shortdescription">Short Description</label>
                                        <textarea class="form-control @error('short_description') is-invalid @enderror" id="shortdescription" name="short_description" rows="5"></textarea>
                                        
                                        @error('short_description')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('short_description') }}</strong>
                                            </span>
                                        @enderror
                                    </div>                                    
                                </div>
                            </div>

                            <button type="submit" class="btn btn-info waves-effect waves-light mr-1">Submit</button>
                            <button type="reset" class="btn btn-orange waves-effect">Reset</button>

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>

    </div> <!-- container-fluid -->
</div>

@endsection
