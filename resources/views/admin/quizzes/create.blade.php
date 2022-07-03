@extends('admin.layouts.layout')
@section('title','Quiz Create')
@section('content')

<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-10">
                <div class="card">
                    <div class="card-body">

                        {!! Form::open(['route' => 'admin.quizzes.store','files' => true, 'id' => 'quizzes']) !!}
 
                        <div class="row" id="optionDivision">
                           
                            <div class="col-lg-9">
                                 
                                <div class="form-group">
                                    <label class="control-label">Lesson Title</label>
                                    <select name="lesson_id" class="form-control select2 @error('lesson_id') is-invalid @enderror">
                                        <option selected disabled>Select</option>
                                        <optgroup label="Lessons">
                                            @foreach($lessons as $lessons)
                                            <option value="{{ $lessons->id }}" {{ old('lesson_id') == $lessons->id ? 'selected' : ''}}>
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

                             
                            </div>

                            <div class="col-lg-3">
                                   
                                <div class="form-group">
                                    <label>Question Type</label>
                                    <br>
                                    <input type="radio" id="Single" name="question_type" class="@error('question_type') is-invalid @enderror" value="radio" {{ old('question_type') == 'radio' ? 'checked' : 'checked' }}>
                                    <label>Single</label>
                                    <span style="padding: 10px;"></span>
                                    <input type="radio" id="Multiple" name="question_type" value="checkbox" class="@error('question_type') is-invalid @enderror" {{ old('question_type') == 'checkbox' ? 'checked' : '' }}>
                                    <label>Multiple</label>

                                    @error('question_type')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('question_type') }}</strong>
                                        </span>
                                    @enderror

                                </div>

                            </div>
                           

                            <div class="col-lg-12">

                               <div class="form-group">
                                    <label for="question">Question</label>
                                    <textarea name="question" class="form-control @error('question') is-invalid @enderror" id="question" rows="3">{{ old('question') }}</textarea>

                                    @error('question')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('question') }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <h6 class="float-left">Write options and select the correct answer</h6>
                                <button type="button" id="moreOption" class="btn btn-light float-right">
                                <i class="mdi mdi-plus"></i>More Option</button>
                            </div>

                            <div class="col-lg-12 optionIncrease">
                                <div id="optionRadio">
                                @for($i = 1; $i <= 2; $i++)
                                    <div class="form-group">
                                        
                                        <label>Option #{{ $i }}</label>
                                        <div class="input-group mb-3">
                                          
                                          <input type="text" id="option{{ $i }}" name="options[]" class="form-control @error('options') is-invalid @enderror @error('correct_answer') is-invalid @enderror" required>

                                          <div class="input-group-prepend">
                                            <div class="input-group-text">
                                              <input type="radio" id="check{{ $i }}"  name="correct_answer[]" value="">
                                            </div>
                                          </div>

                                        @error('options')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('options') }}</strong>
                                            </span>
                                        @enderror

                                        @error('correct_answer')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('correct_answer') }}</strong>
                                            </span>
                                        @enderror

                                        </div>
               
                                    </div>
                                @endfor
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
 