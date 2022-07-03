@extends('admin.layouts.layout')
@section('title','Tracks')
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

	                    <a href="{{ route('admin.tracks.create') }}"><button type="button" class="btn btn-outline-info btn-sm waves-effect waves-light float-right">Add New</button></a>

	                    <table id="datatable" class="table table-bordered table-striped dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">

	                        <thead>
	                        <tr>
	                        	<th></th>
	                            <th>Banners</th>
	                            <th>Title</th>
	                            <th>Short Description</th>
	                            <th>Create Time</th>
	                            <th>Action</th>
	                        </tr>
	                        </thead>

	                        <tbody>
	                        @foreach($tracks as $tracks)
	                        <tr>
	                        	<td></td>

	                            <td>
	                            	<img width="34px" height="34px" src="{{ asset('uploadfiles/tracks/banners/'.$tracks->image) }}" alt="banner">
	                            </td>

	                            <td>
	                            	{{ Str::limit($tracks->title, 35, '') }}
	                            	@if(strlen($tracks->title) >= 35)
	                            	<button class="circle-btn" data-toggle="tooltip" data-placement="top" title="{{ $tracks->title }}" data-original-title="{{ $tracks->title }}">...
									</button>
									@endif
	                            </td>

	                            <td>
	                            	{{ Str::limit($tracks->short_description, 40, '') }}
	                            	@if(strlen($tracks->short_description >= 40))
	                            	<button class="circle-btn" data-toggle="tooltip" data-placement="top" title="{{ $tracks->short_description }}" data-original-title="{{ $tracks->short_description }}" style="border-radius: 50px; border: none;">...
									</button>
									@endif
	                            </td>

	                            <td>{{ date('d F, Y',strtotime($tracks->created_at)) }}<br>{{ date('H:i a', strtotime($tracks->created_at)) }}
	                            </td>

	                            <td>
	                            	<a href="{{ route('admin.tracks.edit', $tracks->id) }}">
	                            		<button type="button" class="btn-icon btn-outline-orange waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><i class="mdi mdi-pencil"></i></button>
	                            	</a>

	                            	<a href="{{ route('admin.tracks.show', $tracks->id) }}">
	                            		<button type="button" class="btn-icon btn-outline-info waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="" data-original-title="Show"><i class="mdi mdi-eye"></i></button>
	                            	</a>
	                            	 
                                    <button type="submit" class="btn-icon btn-outline-danger" onclick="confirmDelete('{{ $tracks->id }}')" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><i class="mdi mdi-close"></i></button>
                                
	                            	<form id="delete{{ $tracks->id }}" action="{{ route('admin.tracks.destroy', $tracks->id) }}" method="POST" style="display: none;">
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