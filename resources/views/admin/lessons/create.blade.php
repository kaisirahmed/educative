@extends('admin.layouts.layout')
@section('title','Lesson Create')
@section('content')

<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
  
                        {!! Form::open(['route' => 'admin.lessons.store','files' => true]) !!}

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="control-label">Course Title</label>
                                    <select name="course_id" class="form-control select2 @error('course_id') is-invalid @enderror">
                                        <option selected disabled>Select</option>
                                        <optgroup label="Courses">
                                            @foreach($courses as $courses)
                                            <option value="{{ $courses->id }}">
                                                {{ $courses->title }}
                                            </option>
                                            @endforeach
                                        </optgroup>
                                    </select>

                                    @error('course_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('course_id') }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div>
                                <div class="form-group" id="lessonWrapper">
                                    <label>Lesson Title</label>

                                    <div class="input-group">
                                        <input type="text" name="title[]" class="form-control @error('title.0') is-invalid @enderror">
                                        
                                        <div class="input-group-prepend">
                                            <button id="addLesson" class="btn btn-light" type="button"><i class="mdi mdi-plus"></i></button>
                                        </div>

                                        @error('title.0')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('title.0') }}</strong>
                                            </span>
                                        @enderror
                                      
                                    </div>

                                </div>

                                <div class="form-group" id="orderLesson">
                                    <label>Lesson Order</label>

                                    <input type="number" name="order_number[]" min="1" max="100" class="form-control @error('order_number.0') is-invalid @enderror">
                                    
                                    @error('order_number.0')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('order_number.0') }}</strong>
                                        </span>
                                    @enderror
                                </div>
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
