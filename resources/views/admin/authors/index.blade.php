@extends('admin.layouts.layout')
@section('title', Auth::user()->superAdmin() ? 'Authors & Super Admins' : 'Authors')
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

	                    <a href="{{ route('admin.register') }}"><button type="button" class="btn btn-outline-info btn-sm waves-effect waves-light float-right">Add New</button></a>

	                    <table id="datatable" class="table table-bordered table-striped dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">

	                        <thead>
	                        <tr>
	                        	<th></th>
	                            <th>Name</th>
	                            <th>Email</th>
	                            <th>Role</th>
	                            <th>Register Time</th>
	                            <th>Action</th>
	                        </tr>
	                        </thead>

	                        <tbody>
	                        @foreach($admins as $admins)
	                        <tr>
	                        	<td></td>
	                            <td>{{ $admins->name }}</td>
	                            <td>{{ $admins->email }}</td>
	                            <td>
	                            	<span class="badge badge-{{ $admins->role == 'superAdmin' ? 'orange' : 'blue-grey' }}">{{ $admins->role }}</span>
	                            </td>

	                            <td>
	                            	{{ date('d F, Y',strtotime($admins->created_at)) }}<br>{{ date('H:i a', strtotime($admins->created_at)) }}
	                            </td>

	                            <td>
	                            	<a href="{{ route('admin.authors.edit', $admins->id) }}">
	                            		<button type="button" class="btn-icon btn-outline-orange waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><i class="mdi mdi-pencil"></i></button>
	                            	</a>

	                            	@if(Auth::user()->superAdmin())

                                    <button type="submit" class="btn-icon btn-outline-danger" onclick="confirmDelete('{{ $admins->id }}')" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><i class="mdi mdi-close"></i></button>
                                
	                            	<form id="delete{{ $admins->id }}" action="{{ route('admin.authors.destroy', $admins->id) }}" method="POST" style="display: none;">
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