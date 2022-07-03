@extends('admin.layouts.layout')
@section('title','Blogs')
@section('content')
<div class="page-content">
	<div class="container-fluid">
	    <div class="row">
	        <div class="col-12">
	            <div class="card">
	                <div class="card-body">
 
	                    @if (session()->has('message'))
	                        <div class="alert alert-success alert-dismissible fade show" role="alert"> 
	                        	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
	                                <span aria-hidden="true">×</span>
	                            </button>
	                            <strong>{!! session('message') !!}</strong>
	                        </div>
	                    @endif

	                    <a href="{{ route('admin.blogs.create') }}"><button type="button" class="btn btn-outline-info btn-sm waves-effect waves-light float-right">Add New</button></a>

	                    <table id="datatable" class="table table-bordered table-striped dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">

	                        <thead>
	                        <tr>
	                        	<th></th>
	                            <th>Banners</th>
	                            <th>Admins</th>
	                            <th>Title</th>
	                            <th>Descriptions</th>
	                            <th>Created Time</th>
	                            <th>Action</th>
	                        </tr>
	                        </thead>

	                        <tbody>
	                        @foreach($blogs as $blogs)
	                        <tr>
	                        	<td></td>

	                            <td> 
	                            	<img width="34px" height="34px" src="{{ asset('uploadfiles/blogs/banners/'.$blogs->banner) }}" alt="banner" data-toggle="tooltip" data-placement="top" data-original-title="<img width='175px' height='100px' src='{{ asset('uploadfiles/blogs/banners/'.$blogs->banner) }}'>">
	                            </td>

	                            <td>{{ $blogs->admin->name }}</td>

	                            <td>
	                            	{{ Str::limit($blogs->title, 30, '') }}

	                            	@if(strlen($blogs->title) >= 30)
	                            	<button class="circle-btn" data-toggle="tooltip" data-placement="top" title="{{ $blogs->title }}" data-original-title="{{ $blogs->title }}">...
									</button>
									@endif
	                            </td>
	                            
	                            <td>
	                            	{!! Str::limit($blogs->description, 30) !!}
	                            </td>

	                            <td>{{ date('d F, Y', strtotime($blogs->created_at)) }}<br>{{ date('H:i a', strtotime($blogs->created_at)) }}
	                            </td>

	                            <td>
	                            	<a href="{{ route('admin.blogs.edit', $blogs->id) }}">
	                            		<button type="button" class="btn-icon btn-outline-orange waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><i class="mdi mdi-pencil"></i></button>
	                            	</a>

	                            	<a href="{{ route('admin.blogs.show', $blogs->id) }}">
	                            		<button type="button" class="btn-icon btn-outline-info waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="" data-original-title="Show"><i class="mdi mdi-eye"></i></button>
	                            	</a>
	                            	 
                                    <button type="submit" class="btn-icon btn-outline-danger" onclick="confirmDelete('{{ $blogs->id }}')" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><i class="mdi mdi-close"></i></button>
                                
	                            	<form id="delete{{ $blogs->id }}" action="{{ route('admin.blogs.destroy', $blogs->id) }}" method="POST" style="display: none;">
	                                	@csrf
	                                	@method('DELETE')
									</form>
	                            	 
	                            </td>
	                        </tr>
	                        @endforeach
	                        </tbody>
	                    </table>

	                </div>
	            </div>
	        </div> <!-- end col -->
	    </div> <!-- end row -->
	</div> <!-- container-fluid -->
</div>

@endsection