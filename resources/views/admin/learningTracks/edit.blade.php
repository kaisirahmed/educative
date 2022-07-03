@extends('admin.layouts.layout')
@section('title','Tracks Edit')
@section('content')

<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
  
                        {!! Form::open([ 'method'=>'PATCH', 'route' => ['admin.tracks.update', $track->id], 'files' => true ]) !!}

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="title">Title</label>
                                        <input id="title" name="title" type="text" class="form-control @error('title') is-invalid @enderror" value="{{ $track->title }}">

                                        @error('title')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('title') }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="shortdescription">Short Description</label>
                                        <textarea class="form-control @error('short_description') is-invalid @enderror" id="shortdescription" name="short_description" rows="5">{{ $track->short_description }}</textarea>
                                        
                                        @error('short_description')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('short_description') }}</strong>
                                            </span>
                                        @enderror
                                    </div>  
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Banner</label>
                                        <input type="file" name="image" class="filestyle @error('title') is-invalid @enderror" data-buttonname="btn-secondary">

                                        @error('image')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('image') }}</strong>
                                            </span>
                                        @enderror
                                    </div>     

                                    <div class="form-group">
                                        <label>Previous Banner</label>
                                        <br>
                                        <img src="{{ asset('uploadfiles/tracks/banners/'. $track->image) }}" alt="banner" class="img-fluid" style="max-width: 200px;" />
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-orange waves-effect">Update</button>

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>

    </div> <!-- container-fluid -->
</div>

@endsection
