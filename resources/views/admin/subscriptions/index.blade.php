@extends('admin.layouts.layout')
@section('title','Subscriptions')
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
		                            <th>Validity</th>
		                            <th>Created Time</th>
		                            <th>Action</th>
		                        </tr>
	                        </thead>
 
	                        <tbody>
	                        @foreach($subscriptions as $subscriptions)
	                        <tr>
	                        	<td></td>

	                            <td>{{ $subscriptions->user->name() }}</td>
	                            	 
	                            <td>
	                            	{{ Str::limit($subscriptions->trackTopic->title, 20, '') }}

	                            	@if(strlen($subscriptions->trackTopic->title) >= 20)
	                            	<button class="circle-btn" data-toggle="tooltip" data-placement="top" title="{{ $subscriptions->trackTopic->title }}" data-original-title="{{ $subscriptions->trackTopic->title }}">...
									</button>
									@endif
	                            </td>

	                            <td>{{ Str::limit($subscriptions->course->title, 20, '') }}

	                            	@if(strlen($subscriptions->course->title) >= 20)
	                            	<button class="circle-btn" data-toggle="tooltip" data-placement="top" title="{{ $subscriptions->course->title }}" data-original-title="{{ $subscriptions->course->title }}">...
									</button>
									@endif
	                            </td>

	                            <td>
	                            	<span class="badge badge-info">{{ date('d F, Y',strtotime($subscriptions->start_date)) }}</span><br> To <br><span class="badge badge-danger">{{ date('d F, Y',strtotime($subscriptions->end_date)) }}</span>
	                            </td>

	                            <td>{{ date('d F, Y',strtotime($subscriptions->created_at)) }}<br>{{ date('H:i a', strtotime($subscriptions->created_at)) }}
	                            </td>

	                            <td>
	                            	<a href="{{ route('admin.subscriptions.edit', $subscriptions->id) }}">
	                            		<button type="button" class="btn-icon btn-outline-orange waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><i class="mdi mdi-pencil"></i></button>
	                            	</a>

	                            	<a href="{{ route('admin.subscriptions.show', $subscriptions->id) }}">
	                            		<button type="button" class="btn-icon btn-outline-info waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="" data-original-title="Show"><i class="mdi mdi-eye"></i></button>
	                            	</a>
	                            	 
                                    <button type="submit" class="btn-icon btn-outline-danger" onclick="confirmDelete('{{ $subscriptions->id }}')" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><i class="mdi mdi-close"></i></button>
                                
	                            	<form id="delete{{ $subscriptions->id }}" action="{{ route('admin.subscriptions.destroy', $subscriptions->id) }}" method="POST" style="display: none;">
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