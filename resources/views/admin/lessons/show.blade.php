@extends('admin.layouts.layout')
@section('title','Lesson Details')
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
                                	<td>Course</td>
                                    <td><h6>{{ $lesson->course->title }}</h6></td>
                                </tr>
                                <tr>
                                    <td>Lesson</td>
                                	<td><h6>{{ $lesson->title }}</h6></td>
                                </tr>
                                <tr>
                                    <td>Lesson Order</td>
                                	<td>{{ $lesson->order_number }}</td>
                                </tr>
                                <tr>
                                   <td>Created Time</td>
                                   <td>
                                   	{{ date('d F, Y',strtotime($lesson->created_at)) }}<br>{{ date('H:i a', strtotime($lesson->created_at)) }}
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
