@extends('admin.layouts.layout')
@section('title','Lesson Lists')
@section('content')
<div class="page-content">
	<div class="container-fluid">
	    <div class="row">
	        <div class="col-lg-12">
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

	                    <a href="{{ route('admin.lessonlists.create') }}"><button type="button" class="btn btn-outline-info btn-sm waves-effect waves-light float-right">Add New</button></a>

	                    <table id="datatable" class="table table-bordered table-striped dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">

	                        <thead>
	                        <tr>
	                        	<th></th>
	                            <th>List Title</th>
	                            <th>Descriptions</th>
	                            <th>Lists Order</th>
	                            <th>Preview</th>
	                            <th>Created Time</th>
	                            <th>Action</th>
	                        </tr>
	                        </thead>

	                        <tbody>
	                        @foreach($lessonLists as $lessonLists)
	                        <tr>
	                        	<td></td>

	                            <td>
	                            	{{ Str::limit($lessonLists->title, 25, '') }}

	                            	@if(strlen($lessonLists->title) >= 25)
	                            	<button class="circle-btn" data-toggle="tooltip" data-placement="top" title="{{ $lessonLists->title }}" data-original-title="{{ $lessonLists->title }}">...
									</button>
									@endif
	                            </td>

	                            <td>
	                            	{!! Str::limit($lessonLists->description, 30) !!}
	                            </td>
	                            
	                            <td>{{ $lessonLists->order_number }}</td>

	                            <td><span class="badge badge-{{ $lessonLists->preview === 1 ? 'success' : 'danger' }}">{{ $lessonLists->preview === 1 ? 'available' : 'Unavailable' }}</span></td>

	                            <td>{{ date('d F, Y',strtotime($lessonLists->created_at)) }}<br>{{ date('H:i a', strtotime($lessonLists->created_at)) }}
	                            </td>

	                            <td>
	                            	<a href="{{ route('admin.lessonlists.edit', $lessonLists->id) }}">
	                            		<button type="button" class="btn-icon btn-outline-orange waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><i class="mdi mdi-pencil"></i></button>
	                            	</a>

	                            	<a href="{{ route('admin.lessonlists.show', $lessonLists->id) }}">
	                            		<button type="button" class="btn-icon btn-outline-info waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="" data-original-title="Show"><i class="mdi mdi-eye"></i></button>
	                            	</a>
	                            	 
                                    <button type="submit" class="btn-icon btn-outline-danger" onclick="confirmDelete('{{ $lessonLists->id }}')" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><i class="mdi mdi-close"></i></button>
                                
	                            	<form id="delete{{ $lessonLists->id }}" action="{{ route('admin.lessonlists.destroy', $lessonLists->id) }}" method="POST" style="display: none;">
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