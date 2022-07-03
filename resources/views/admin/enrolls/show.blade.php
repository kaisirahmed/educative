@extends('admin.layouts.layout')
@section('title','Enrolls Details')
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
                                    <td>Student Name</td>
                                    <td><h4>{{ $enroll->user->name() }}</h4></td>
                                </tr>
                                <tr>
                                	<td>{{ $enroll->course->course_type === 'track' ? 'Track' : 'Topic' }}</td>
                                    <td>{{ $enroll->trackTopic->title }}</td>
                                    	
                                </tr>
                                <tr>
                                    <td>Course</td>
                                	<td>{{ $enroll->course->title }}</td>
                                </tr>
                                
                                <tr>
                                    <td>Current Lessons</td>
                                    <td>{{ $enroll->current_lesson }}th</td>
                                </tr>

                                <tr>
                                    <td>Completed</td>
                                    <td>{{ $enroll->percent_completion }}%</td>
                                </tr>
                                
                                <tr>
                                   <td>Created Time</td>
                                   <td>
                                   	{{ date('d F, Y',strtotime($enroll->created_at)) }}<br>{{ date('H:i a', strtotime($enroll->created_at)) }}
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
