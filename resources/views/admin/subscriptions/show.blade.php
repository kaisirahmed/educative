@extends('admin.layouts.layout')
@section('title','Subscription Details')
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
                                    <td><h5>{{ $subscription->user->name() }}</h5></td>
                                </tr>
                                <tr>
                                	<td>{{ $subscription->course->course_type === 'track' ? 'Track' : 'Topic' }}</td>
                                    <td>{{ $subscription->trackTopic->title }}</td>
                                    	
                                </tr>

                                 <tr>
                                    <td>Course</td>
                                    <td>{{ $subscription->course->title }}th</td>
                                </tr>
 
                                <tr>
                                    <td>Coupon Validity</td>
                                	<td>
                                        <span class="badge badge-info">{{ date('d F, Y',strtotime($subscription->start_date)) }}</span>  To  <span class="badge badge-danger">{{ date('d F, Y',strtotime($subscription->end_date)) }}</span>
                                    </td>
                                </tr>
                                
                                <tr>
                                   <td>Created Time</td>
                                   <td>
                                   	{{ date('d F, Y',strtotime($subscription->created_at)) }}<br>{{ date('H:i a', strtotime($subscription->created_at)) }}
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
