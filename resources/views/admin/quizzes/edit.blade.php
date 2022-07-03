@extends('admin.layouts.layout')
@section('title','Quiz Edit')
@section('content')

<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-10">
                <div class="card">
                    <div class="card-body">

                        {!! Form::open([ 'method'=>'PATCH', 'route' => ['admin.quizzes.update', $quiz->id] ]) !!}
 
                        <div class="row" id="optionDivision">
                           
                            <div class="col-lg-9">
                                 
                                <div class="form-group">
                                    <label class="control-label">Lesson Title</label>
                                    <select name="lesson_id" class="form-control select2 @error('lesson_id') is-invalid @enderror">
                                        <option selected disabled>Select</option>
                                        <optgroup label="Lessons">
                                            @foreach($lessons as $lessons)
                                            <option value="{{ $lessons->id }}" {{ $quiz->lesson_id == $lessons->id ? 'selected' : ''}}>
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
                                    <input type="radio" id="Single" name="question_type" class="@error('question_type') is-invalid @enderror" value="radio" {{ $quiz->question_type === 'radio' ? 'checked' : '' }}>
                                    <label>Single</label>
                                    <span style="padding: 10px;"></span>
                                    <input type="radio" id="Multiple" name="question_type" value="checkbox" class="@error('question_type') is-invalid @enderror" {{ $quiz->question_type === 'checkbox' ? 'checked' : '' }}>
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
                                    <textarea name="question" class="form-control @error('question') is-invalid @enderror" id="question" rows="3">{{ $quiz->question }}</textarea>

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
                            <input type="hidden" name="countOptions" value="{{ count($quiz->options) }}">
                            <div class="col-lg-12 optionIncrease">
                                <div id="{{ $quiz->question_type === 'radio' ? 'optionRadio' : 'optionCheckbox' }}">

                               
                                @foreach($quiz->options as $key => $value)
                                <div id="{{ $quiz->question_type === 'radio' ? 'optionRadio' : 'optionCheckbox' }}">
                                    <div class="form-group" id="{{ $key+1 }}">
                                        
                                        <label>Option #{{ $key+1 }}</label>
                                        <div class="input-group mb-3">
                                          
                                          <input type="text" id="option{{ $key+1 }}" name="options[]" class="form-control @error('options') is-invalid @enderror @error('correct_answer') is-invalid @enderror" required value="{{ $value }}">
                                          
                                          <div class="input-group-prepend">
                                            <div class="input-group-text">
                                              <input type="{{ $quiz->question_type == 'radio' ? 'radio' : 'checkbox' }}" id="check{{ $key+1 }}" name="correct_answer[]" value="{{ $value }}" {{ in_array($value,array_intersect($quiz->options, $quiz->correct_answer)) == true ? 'checked' : '' }}>
                                            </div>
                                          </div>
                                           
                                          @if($key+1 > 2)
                                            <div class="input-group-prepend">
                                                <button id="removeOptionField" class="btn btn-outline-danger" type="button"><i class="mdi mdi-minus"></i></button>
                                            </div>
                                          @endif

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
                                </div>
                                @endforeach
                                
                                </div>
                            </div>
 
                        </div>

                        @foreach($quiz->options as $key => $value)
                            <input type="hidden" id="optionsValue{{ $key+1 }}" value="{!! $value !!}">
                        @endforeach

                        @foreach($quiz->correct_answer as $key => $value)
                            <input type="hidden" id="answerValue{{ $key+1 }}" value="{!! $value !!}">
                        @endforeach

                        <button type="submit" class="btn btn-info waves-effect waves-light mr-1">Update</button>
                        <a href="{{ redirect('admins/quizzes') }}"><button class="btn btn-warning waves-effect waves-light mr-1">Cancel</button></a>
                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>

    </div> <!-- container-fluid -->
</div>

@endsection
 