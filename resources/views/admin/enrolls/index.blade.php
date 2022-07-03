@extends('admin.layouts.layout')
@section('title','Enrolls')
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
 
	                    <table id="datatable" class="table table-bordered table-striped dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">

	                        <thead>
		                        <tr>
		                        	<th></th>
		                        	<th>Students</th>
		                            <th>Tracks/Topics</th>
		                            <th>Courses</th>
		                            <th>Current Lesson</th>
		                            <th>Completed(%)</th>
		                            <th>Coupons</th>
		                            <th>Created Time</th>
		                            <th>Action</th>
		                        </tr>
	                        </thead>
 
	                        <tbody>
	                        @foreach($enrolls as $enrolls)
	                        <tr>
	                        	<td></td>

	                            <td>{{ $enrolls->user->name() }}</td>
	                            	 
	                            <td>
	                            	{{ Str::limit($enrolls->trackTopic->title, 20, '') }}

	                            	@if(strlen($enrolls->trackTopic->title) >= 20)
	                            	<button class="circle-btn" data-toggle="tooltip" data-placement="top" title="{{ $enrolls->trackTopic->title }}" data-original-title="{{ $enrolls->trackTopic->title }}">...
									</button>
									@endif
	                            </td>

	                            <td>{{ Str::limit($enrolls->course->title, 20, '') }}

	                            	@if(strlen($enrolls->course->title) >= 20)
	                            	<button class="circle-btn" data-toggle="tooltip" data-placement="top" title="{{ $enrolls->course->title }}" data-original-title="{{ $enrolls->course->title }}">...
									</button>
									@endif
	                            </td>

	                            <td>
	                            	{{ $enrolls->current_lesson }}
	                            </td>

	                            <td>{{ $enrolls->percent_completion }}</td>

	                            <td><h6 class="badge badge-dark">{{ $enrolls->coupon_code }}</h6></td>

	                            <td>{{ date('d F, Y',strtotime($enrolls->created_at)) }}<br>{{ date('H:i a', strtotime($enrolls->created_at)) }}
	                            </td>

	                            <td>
	                            	<a href="{{ route('admin.enrolls.edit', $enrolls->id) }}">
	                            		<button type="button" class="btn-icon btn-outline-orange waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><i class="mdi mdi-pencil"></i></button>
	                            	</a>

	                            	<a href="{{ route('admin.enrolls.show', $enrolls->id) }}">
	                            		<button type="button" class="btn-icon btn-outline-info waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="" data-original-title="Show"><i class="mdi mdi-eye"></i></button>
	                            	</a>
	                            	 
                                    <button type="submit" class="btn-icon btn-outline-danger" onclick="confirmDelete('{{ $enrolls->id }}')" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><i class="mdi mdi-close"></i></button>
                                
	                            	<form id="delete{{ $enrolls->id }}" action="{{ route('admin.enrolls.destroy', $enrolls->id) }}" method="POST" style="display: none;">
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