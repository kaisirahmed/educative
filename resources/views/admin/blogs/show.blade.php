@extends('admin.layouts.layout')
@section('title','Blog Details')
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
                                	<td>Admin Name</td>
                                    <td><h6>{{ $blog->admin->name }}</h6></td>
                                </tr>
                                <tr>
                                    <td>Blog Title</td>
                                	<td><h6>{{ $blog->title }}</h6></td>
                                </tr>
                                <tr>
                                    <td>Banner</td>
                                	<td>
                                        <img src="{{ asset('uploadfiles/blogs/banners/'.$blog->banner) }}" alt="banner">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Description</td>
                                    <td>{!! $blog->description !!}</td>
                                </tr>
                                <tr>
                                   <td>Created Time</td>
                                   <td>
                                   	{{ date('d F, Y',strtotime($blog->created_at)) }}<br>{{ date('H:i a', strtotime($blog->created_at)) }}
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
