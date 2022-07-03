@extends('admin.layouts.layout')
@section('title','Blog Edit')
@section('content')

<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
  
                        {!! Form::open([ 'method'=>'PATCH', 'route' => ['admin.blogs.update', $blog->id], 'files' => true ]) !!}

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="title">Blog Title</label>
                                        <input id="title" name="title" type="text" class="form-control @error('title') is-invalid @enderror" value="{{ $blog->title }}">

                                        @error('title')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('title') }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>Banner</label>
                                        <input type="file" name="banner" class="filestyle @error('banner') is-invalid @enderror" data-buttonname="btn-secondary">

                                        @error('banner')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('banner') }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Previous Banner</label>
                                        <br>
                                        <img src="{{ asset('uploadfiles/blogs/banners/'. $blog->banner) }}" alt="icon" class="img-fluid">
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea class="form-control @error('description') is-invalid @enderror" id="textCkeditor" name="description">{!! $blog->description !!}</textarea>

                                        @error('description')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('description') }}</strong>
                                            </span>
                                        @enderror
                                    </div>                                    
                                </div>
                            </div>

                            <button type="submit" class="btn btn-info waves-effect waves-light mr-1">Update</button>
                             
                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>

    </div> <!-- container-fluid -->
</div>

@endsection
