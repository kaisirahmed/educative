@extends('admin.layouts.layout')
@section('title','Lesson Edit')
@section('content')

<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
  
                       {!! Form::open([ 'method'=>'PATCH', 'route' => ['admin.lessons.update', $lesson->id] ]) !!}

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="control-label">Course Title</label>
                                    <select name="course_id" class="form-control select2 @error('course_id') is-invalid @enderror">
                                        <option selected disabled>Select</option>
                                        <optgroup label="Courses">
                                            @foreach($courses as $courses)
                                            <option value="{{ $courses->id }}" {{ $courses->title === $lesson->course->title ? 'selected' : '' }}>
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

                                    <input type="text" name="title" class="form-control @error('title.') is-invalid @enderror" value="{{ $lesson->title }}">
                                   
                                    @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('title') }}</strong>
                                        </span>
                                    @enderror
                                      
                                </div>

                                <div class="form-group">
                                    <label>Lesson Order</label>

                                    <input type="number" name="order_number" min="1" max="100" class="form-control @error('order_number') is-invalid @enderror" value="{{ $lesson->order_number }}">
                                    
                                    @error('order_number')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('order_number') }}</strong>
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
