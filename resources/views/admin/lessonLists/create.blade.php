@extends('admin.layouts.layout')
@section('title','Lesson List Create')
@section('content')

<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">

                        {!! Form::open(['route' => 'admin.lessonlists.store','files' => true]) !!}

                        <div class="row" id="lessonListWrapper">
                           
                            <div class="col-lg-6">
                                 
                                <div class="form-group">
                                    <label class="control-label">Lesson Title</label>
                                    <select name="lesson_id" class="form-control select2 @error('lesson_id') is-invalid @enderror">
                                        <option selected disabled>Select</option>
                                        <optgroup label="Lessons">
                                            @foreach($lessons as $lessons)
                                            <option value="{{ $lessons->id }}">
                                                {{ $lessons->title }}
                                            </option>
                                            @endforeach
                                        </optgroup>
                                    </select>

                                    @error('lesson_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('lesson_id') }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                
                                <div class="form-group" id="lessonWrapper">
                                    <label>List Title</label>

                                    <div class="input-group">
                                    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror">

                                    @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('title') }}</strong>
                                        </span>
                                    @enderror
                                      
                                    </div>

                                </div>


                            </div>

                            <div class="col-lg-6">

                                <div class="form-group">
                                    <label>Lesson Order</label>

                                    <input type="number" name="order_number" min="1" max="100" class="form-control @error('order_number') is-invalid @enderror">
                                    
                                    @error('order_number')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('order_number') }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="control-label">Preview</label>
                                    <select name="preview" class="form-control select2 @error('preview') is-invalid @enderror">
                                        <option selected disabled>Select</option>
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>

                                    @error('preview')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('preview') }}</strong>
                                        </span>
                                    @enderror
                                </div>

                            </div>
                           

                            <div class="col-sm-12">
                               
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea class="form-control @error('description') is-invalid @enderror" id="textCkeditor" name="description"></textarea>

                                    @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('description') }}</strong>
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
