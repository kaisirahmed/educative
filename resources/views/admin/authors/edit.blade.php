@extends('admin.layouts.layout')
@section('title','Admin Edit')
@section('content')

<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                         
                        {!! Form::open([ 'method'=>'PATCH', 'route' => ['admin.authors.update', $author->id], 'files' => true , 'class' => 'custom-validation']) !!}
                        
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $author->name }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $author->email }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                           
                            <div class="form-group">
                                <button type="submit" class="btn btn-info">
                                  Update
                                </button>
                            </div>
                            
                        {!! Form::close() !!}

                    </div>
                </div>
            </div> <!-- end col -->
            
        </div> <!-- end row -->
    </div>

</div> <!-- container-fluid -->

@endsection