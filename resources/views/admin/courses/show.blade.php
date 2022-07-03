@extends('admin.layouts.layout')
@section('title','Course Details')
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
                                    <td>Author</td>
                                    <td><h3>{{ $course->admin->name }}</h3></td>
                                </tr>
                                <tr>
                                	<td>Banner</td>
                                    <td>
                                    	<img src="{{ asset('uploadfiles/courses/banners/'.$course->banner) }}" alt="banner">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Title</td>
                                	<td><h5>{{ $course->title }}</h5></td>
                                </tr>
                                
                                <tr>
                                    <td>Tracks</td>
                                    <td>{{ implode(',',$course->trackTopics->where('course_type','track')->pluck('title')->toArray()) }}</td>
                                </tr>

                                <tr>
                                    <td>Topics</td>
                                    <td>{{ implode(',',$course->trackTopics->where('course_type','topic')->pluck('title')->toArray()) }}</td>
                                </tr>
                                
                                <tr>
                                    <td>Short Description</td>
                                	<td>{!! $course->short_description !!}</td>
                                </tr>
                                <tr>
                                   <td>Created Time</td>
                                   <td>
                                   	{{ date('d F, Y',strtotime($course->created_at)) }}<br>{{ date('H:i a', strtotime($course->created_at)) }}
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
