@extends('admin.layouts.layout')
@section('title','Students')
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
	                            <th>Name</th>
	                            <th>Email</th>
	                            <th>Phone</th>
	                            <th>Status</th>
	                            <th>Join Date</th>
	                            <th>Action</th>
	                        </tr>
	                        </thead>

	                        <tbody>
	                        @foreach($users as $users)
	                        <tr>
	                        	<td></td>
	                            <td>
	                            	{{ $users->name() }}
	                            </td>

	                            <td>{{ $users->email }}</td>
	                            <td>{{ $users->phone }}</td>

	                            <td>
	                            	<span class="badge badge-{{ $users->email_verify == 1 ? 'info' : 
		                             'orange' }}">{{ $users->email_verify == 1 ? 'Verified' : 
		                             'Not Verified' }}</span>
	                         	</td>

	                            <td>
	                            	{{ date('d F, Y',strtotime($users->created_at)) }}<br>{{ date('H:m a', strtotime($users->created_at)) }}
	                            </td>

	                            <td>
	                            	
	                            	<a href="{{ route('admin.users.edit', $users->id) }}">
	                            		<button type="button" class="btn-icon btn-outline-orange waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><i class="mdi mdi-pencil"></i></button>
	                            	</a> 

	                            	<a href="{{ route('admin.users.show', $users->id) }}">
	                            		<button type="button" class="btn-icon btn-outline-info waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="" data-original-title="Show"><i class="mdi mdi-eye"></i></button>
	                            	</a> 

	                            	@if(Auth::user()->superAdmin())

	                                   <button type="submit" class="btn-icon btn-outline-danger" onclick="confirmDelete('{{ $users->id }}')"  data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><i class="mdi mdi-close"></i></button>	

	                                    <form id="delete{{ $users->id }}" action="{{ route('admin.users.destroy', $users->id) }}" method="POST" style="display: none;">
	                                	@csrf
	                                	{{ method_field('DELETE') }}
										</form> 

	                            	@endif
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