@extends('admin.layouts.layout')
@section('title','Quizzes')
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

	                    <a href="{{ route('admin.quizzes.create') }}"><button type="button" class="btn btn-outline-info btn-sm waves-effect waves-light float-right">Add New</button></a>

	                    <table id="datatable" class="table table-bordered table-striped dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">

	                        <thead>
	                        <tr>
	                        	<th></th>
	                            <th>Lessons</th>
	                            <th>Questions</th>
	                            <th>Question Type</th>
	                            <th>Options</th>
	                            <th>Correct Answer</th>
	                            <th>Created Time</th>
	                            <th>Action</th>
	                        </tr>
	                        </thead>

	                        <tbody>
	                        @foreach($quizzes as $quizzes)
	                        <tr>
	                        	<td></td>

	                            <td>
	                            	{{ Str::limit($quizzes->lesson->title, 20, '') }}

	                            	@if(strlen($quizzes->title) >= 20)
	                            	<button class="circle-btn" data-toggle="tooltip" data-placement="top" data-original-title="{{ $quizzes->lesson->title }}">...
									</button>
									@endif
	                            </td>

	                            <td>
	                            	{!! Str::limit($quizzes->question, 20, '') !!}

	                            	@if(strlen($quizzes->question) >= 20)
	                            	<button class="circle-btn" data-toggle="tooltip" data-placement="top"  data-original-title="{!! $quizzes->question !!}">...
									</button>
									@endif
	                            </td>
	                            
	                            <td>{{ $quizzes->question_type === "radio" ? "Single" : "Multiple" }}</td>

	                            <td>
									@foreach(array_slice($quizzes->options, 0, 2) as $key => $value)
	                            	{{ Str::limit($value, 20, '') }} {!! $key == 0 ? '<br>' : '' !!}  
									@endforeach
									<button class="circle-btn" data-toggle="tooltip" data-placement="top" data-original-title="@foreach($quizzes->options as $key => $value){{ $key+1 }}.&nbsp;
	                            	{{ $value }}<br> 
									@endforeach">...
									</button>
	                            </td>

	                            <td>
									@foreach(array_slice($quizzes->correct_answer, 0, 2) as $key => $value)
	                            	{{ Str::limit($value, 20, '') }}{!! $key == 0 ? '<br>' : '' !!}
									@endforeach	
									@if(count($quizzes->correct_answer) > 1 &&  strlen($value[2]) > 20)
									<button class="circle-btn" data-toggle="tooltip" data-placement="top" data-original-title="@foreach($quizzes->correct_answer as $key => $value) {{ $key+1 }}.&nbsp;{{ $value }}<br>
									@endforeach ">...
									</button>                          	
									@endif
	                            </td>

	                            <td>{{ date('d F, Y',strtotime($quizzes->created_at)) }}<br>{{ date('H:i a', strtotime($quizzes->created_at)) }}
	                            </td>

	                            <td>
	                            	<a href="{{ route('admin.quizzes.edit', $quizzes->id) }}">
	                            		<button type="button" class="btn-icon btn-outline-orange waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><i class="mdi mdi-pencil"></i></button>
	                            	</a>

	                            	<a href="{{ route('admin.quizzes.show', $quizzes->id) }}">
	                            		<button type="button" class="btn-icon btn-outline-info waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="" data-original-title="Show"><i class="mdi mdi-eye"></i></button>
	                            	</a>
	                            	 
                                    <button type="submit" class="btn-icon btn-outline-danger" onclick="confirmDelete('{{ $quizzes->id }}')" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><i class="mdi mdi-close"></i></button>
                                
	                            	<form id="delete{{ $quizzes->id }}" action="{{ route('admin.quizzes.destroy', $quizzes->id) }}" method="POST" style="display: none;">
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