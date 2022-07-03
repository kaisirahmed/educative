@extends('admin.layouts.layout')
@section('title','Lessons')
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

	                    <a href="{{ route('admin.lessons.create') }}"><button type="button" class="btn btn-outline-info btn-sm waves-effect waves-light float-right">Add New</button></a>

	                    <table id="datatable" class="table table-bordered table-striped dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">

	                        <thead>
	                        <tr>
	                        	<th></th>
	                            <th>Courses</th>
	                            <th>Lessons</th>
	                            <th>Lesson Order</th>
	                            <th>Created Time</th>
	                            <th>Action</th>
	                        </tr>
	                        </thead>

	                        <tbody>
	                        @foreach($lessons as $lessons)
	                        <tr>
	                        	<td></td>

	                            <td>
	                            	{{ Str::limit($lessons->course->title, 30, '') }}

	                            	@if(strlen($lessons->course->title) >= 30)
	                            	<button class="circle-btn" data-toggle="tooltip" data-placement="top" title="{{ $lessons->course->title }}" data-original-title="{{ $lessons->course->title }}">...
									</button>
									@endif
	                            </td>

	                            <td>
	                            	{{ Str::limit($lessons->title, 30, '') }}

	                            	@if(strlen($lessons->title) >= 30)
	                            	<button class="circle-btn" data-toggle="tooltip" data-placement="top" title="{{ $lessons->title }}" data-original-title="{{ $lessons->title }}">...
									</button>
									@endif
	                            </td>
	                            
	                            <td>{{ $lessons->order_number }}</td>

	                            <td>{{ date('d F, Y',strtotime($lessons->created_at)) }}<br>{{ date('H:i a', strtotime($lessons->created_at)) }}
	                            </td>

	                            <td>
	                            	<a href="{{ route('admin.lessons.edit', $lessons->id) }}">
	                            		<button type="button" class="btn-icon btn-outline-orange waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><i class="mdi mdi-pencil"></i></button>
	                            	</a>

	                            	<a href="{{ route('admin.lessons.show', $lessons->id) }}">
	                            		<button type="button" class="btn-icon btn-outline-info waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="" data-original-title="Show"><i class="mdi mdi-eye"></i></button>
	                            	</a>
	                            	 
                                    <button type="submit" class="btn-icon btn-outline-danger" onclick="confirmDelete('{{ $lessons->id }}')" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><i class="mdi mdi-close"></i></button>
                                
	                            	<form id="delete{{ $lessons->id }}" action="{{ route('admin.lessons.destroy', $lessons->id) }}" method="POST" style="display: none;">
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