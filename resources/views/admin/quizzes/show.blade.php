@extends('admin.layouts.layout')
@section('title','Quiz Details')
@section('content')
<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
 
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped mb-0">
                                <thead>
                                <tr>
                                    <th>Column Name</th>
                                    <th>Description</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                	<td>Lesson</td>
                                    <td><h6>{{ $quiz->lesson->title }}</h6></td>
                                </tr>
                                <tr>
                                    <td>Question Type</td>
                                	<td><h6>{{ $quiz->question_type }}</h6></td>
                                </tr>
                                <tr>
                                    <td>Question</td>
                                	<td><h6>{!! $quiz->question !!}</h6></td>
                                </tr>
                                <tr>
                                    <td>Options</td>
                                    <td>
                                        @foreach($quiz->options as $key => $value)
                                        {{ $key+1 }}.&nbsp;{{ $value }}<br>
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <td>Correct Answer</td>
                                    <td>
                                        @foreach($quiz->correct_answer as $key => $value)
                                        {{ $key+1 }}.&nbsp;{{ $value }}<br>
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                   <td>Created Time</td>
                                   <td>
                                   	{{ date('d F, Y',strtotime($quiz->created_at)) }}<br>{{ date('H:i a', strtotime($quiz->created_at)) }}
                                   </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div> <!-- end col -->

        </div> <!-- end row -->
    </div> <!-- container-fluid -->
</div>
@endsection
