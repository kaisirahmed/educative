@extends('admin.layouts.layout')
@section('title','Topics')
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

	                    <a href="{{ route('admin.topics.create') }}"><button type="button" class="btn btn-outline-info btn-sm waves-effect waves-light float-right">Add New</button></a>

	                    <table id="datatable" class="table table-bordered table-striped dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">

	                        <thead>
	                        <tr>
	                        	<th></th>
	                            <th>Icons</th>
	                            <th>Title</th>
	                            <th>Short Description</th>
	                            <th>Create Time</th>
	                            <th>Action</th>
	                        </tr>
	                        </thead>

	                        <tbody>
	                        @foreach($topics as $topics)
	                        <tr>
	                        	<td></td>

	                            <td>
	                            	<img width="34px" height="34px" src="{{ asset('uploadfiles/topics/icons/'.$topics->image) }}" alt="icon" data-toggle="tooltip" data-placement="top" data-original-title="<img src='{{ asset('uploadfiles/topics/icons/'.$topics->image) }}' alt='icon'>">
	                            </td>

	                            <td>
	                            	{{ Str::limit($topics->title, 35, '') }}

	                            	@if(strlen($topics->title) >= 35)
	                            	<button class="circle-btn" data-toggle="tooltip" data-placement="top" title="{{ $topics->title }}" data-original-title="{{ $topics->title }}">...
									</button>
									@endif
	                            </td>

	                            <td>
	                            	{{ Str::limit($topics->short_description, 40, '') }}
	                            	@if(strlen($topics->short_description) >= 40)
	                            	<button class="circle-btn" data-toggle="tooltip" data-placement="top" title="{{ $topics->short_description }}" data-original-title="{{ $topics->short_description }}" style="border-radius: 50px; border: none;">...
									</button>
									@endif
	                            </td>

	                            <td>{{ date('d F, Y',strtotime($topics->created_at)) }}<br>{{ date('H:i a', strtotime($topics->created_at)) }}
	                            </td>

	                            <td>
	                            	<a href="{{ route('admin.topics.edit', $topics->id) }}">
	                            		<button type="button" class="btn-icon btn-outline-orange waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><i class="mdi mdi-pencil"></i></button>
	                            	</a>

	                            	<a href="{{ route('admin.topics.show', $topics->id) }}">
	                            		<button type="button" class="btn-icon btn-outline-info waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="" data-original-title="Show"><i class="mdi mdi-eye"></i></button>
	                            	</a>
	                            	 
                                    <button type="submit" class="btn-icon btn-outline-danger" onclick="confirmDelete('{{ $topics->id }}')" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><i class="mdi mdi-close"></i></button>
                                
	                            	<form id="delete{{ $topics->id }}" action="{{ route('admin.topics.destroy', $topics->id) }}" method="POST" style="display: none;">
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