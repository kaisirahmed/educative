@extends('admin.layouts.layout')
@section('title','Topic Details')
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
                                	<td>Icon</td>
                                    <td>
                                    	<img src="{{ asset('uploadfiles/topics/icons/'.$topic->image) }}" alt="icon">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Title</td>
                                	<td><h5>{{ $topic->title }}</h5></td>
                                </tr>
                                <tr>
                                    <td>Short Description</td>
                                	<td>{!! $topic->short_description !!}</td>
                                </tr>
                                <tr>
                                   <td>Created Time</td>
                                   <td>
                                   	{{ date('d F, Y',strtotime($topic->created_at)) }}<br>{{ date('H:i a', strtotime($topic->created_at)) }}
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
