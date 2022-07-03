@extends('admin.layouts.layout')
@section('title','Courses')
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

	                    <a href="{{ route('admin.courses.create') }}"><button type="button" class="btn btn-outline-info btn-sm waves-effect waves-light float-right">Add New</button></a>

	                    <table id="datatable" class="table table-bordered table-striped dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">

	                        <thead>
		                        <tr>
		                        	<th></th>
		                            <th>Image</th>
		                            <th>Title</th>
		                            <th>Level</th>
		                            <th>Short Description</th>
		                            <th>Price (৳)</th>
		                            <th>Created Time</th>
		                            <th>Action</th>
		                        </tr>
	                        </thead>

	                        <tbody>
	                        @foreach($courses as $courses)
	                        <tr>
	                        	<td></td>

	                            <td>
	                            	<img width="34px" height="34px" src="{{ asset('uploadfiles/courses/banners/'.$courses->banner) }}" alt="banner" data-toggle="tooltip" data-placement="top" data-original-title="<img width='175px' height='100px' src='{{ asset('uploadfiles/courses/banners/'.$courses->banner) }}'>">
	                            </td>

	                            <td>
	                            	{{ Str::limit($courses->title, 20, '') }}

	                            	@if(strlen($courses->title) >= 20)
	                            	<button class="circle-btn" data-toggle="tooltip" data-placement="top" title="{{ $courses->title }}" data-original-title="{{ $courses->title }}">...
									</button>
									@endif
	                            </td>

	                            <td><span class="badge badge-{{ $courses->level === 'Beginner' ? 'info' : ($courses->level === 'Intermediate' ? 'blue-grey' : 'dark')}}">{{ $courses->level }}</td>

	                            <td>
	                            	{!! Str::limit($courses->short_description, 25, '') !!}
	                            	@if(strlen($courses->short_description) >= 25)
	                            	<button class="circle-btn" data-toggle="tooltip" data-placement="top"data-original-title="{!! $courses->short_description !!}" style="border-radius: 50px; border: none;">...
									</button>
									@endif
	                            </td>

	                            <td>{{ $courses->price }}</td>

	                            <td>{{ date('d F, Y',strtotime($courses->created_at)) }}<br>{{ date('H:i a', strtotime($courses->created_at)) }}
	                            </td>

	                            <td>
	                            	<a href="{{ route('admin.courses.edit', $courses->id) }}">
	                            		<button type="button" class="btn-icon btn-outline-orange waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><i class="mdi mdi-pencil"></i></button>
	                            	</a>

	                            	<a href="{{ route('admin.courses.show', $courses->id) }}">
	                            		<button type="button" class="btn-icon btn-outline-info waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="" data-original-title="Show"><i class="mdi mdi-eye"></i></button>
	                            	</a>
	                            	 
                                    <button type="submit" class="btn-icon btn-outline-danger" onclick="confirmDelete('{{ $courses->id }}')" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><i class="mdi mdi-close"></i></button>
                                
	                            	<form id="delete{{ $courses->id }}" action="{{ route('admin.courses.destroy', $courses->id) }}" method="POST" style="display: none;">
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