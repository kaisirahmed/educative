@extends('admin.layouts.layout')
@section('title',$user->first_name.' '.$user->last_name)
@section('content')
<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
 
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped mb-0">
                                <thead>
                                <tr>
                                    <th>Column Name</th>
                                    <th>Description</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>Name</td>
                                    <td>{{ $user->name() }}</td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td><a href="mailto:{{ $user->email }}" >{{ $user->email }}</a></td>
                                </tr>
                                <tr>
                                   <td>Father's Name</td>
                                   <td>{{ $user->father_name }}</td>
                                </tr>
                                <tr>
                                    <td>Mother's Name</td>
                                    <td>{{ $user->mother_name }}</td>
                                </tr>
                                <tr>
                                   <td>Phone</td>
                                   <td>{{ $user->phone }}</td>
                                </tr>
                                <tr>
                                   <td>Education</td>
                                   <td>{{ $user->education }}</td>
                                </tr>
                                <tr>
                                   <td>Present Address</td>
                                   <td>{{ $user->present_address }}</td>
                                </tr>
                                <tr>
                                   <td>Permanent Address</td>
                                   <td>{{ $user->permanent_address }}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div> <!-- end col -->

        </div> <!-- end row -->
    </div> <!-- container-fluid -->
</div>

@endsection