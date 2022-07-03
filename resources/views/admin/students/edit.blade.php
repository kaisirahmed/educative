@extends('admin.layouts.layout')
@section('title','Student Edit')
@section('content')

<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        
                        <form method="POST" action="{{ route('admin.users.update', $user->id) }}" class="custom-validation">
                            @method('PATCH')
                            @csrf
                        <div class="row">   
                            <div class="col-lg-6">     
                                <div class="form-group">
                                    <label for="first_name">First Name</label>
                                    <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ $user->first_name }}" required autocomplete="first_name" autofocus>

                                    @error('first_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="last_name">Last Name</label>
                                    <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ $user->last_name }}" required autocomplete="last_name" autofocus>

                                    @error('last_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="father_name">Father's Name</label>
                                    <input id="father_name" type="text" class="form-control @error('father_name') is-invalid @enderror" name="father_name" value="{{ $user->father_name }}" required autocomplete="father_name" autofocus>

                                    @error('father_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="mother_name">Mother's Name</label>
                                    <input id="mother_name" type="text" class="form-control @error('mother_name') is-invalid @enderror" name="mother_name" value="{{ $user->mother_name }}" required autocomplete="mother_name" autofocus>

                                    @error('mother_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="phone">Phone</label>
                                    <input id="phone" type="number" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ $user->phone }}" required autocomplete="phone" autofocus>

                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="education">Education</label>
                                    <input id="education" type="text" class="form-control @error('education') is-invalid @enderror" name="education" value="{{ $user->education }}" required autocomplete="education" autofocus>

                                    @error('education')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="present_address">Present Address</label>
                                    <input id="present_address" type="text" class="form-control @error('present_address') is-invalid @enderror" name="present_address" value="{{ $user->present_address }}" required autocomplete="present_address" autofocus>

                                    @error('present_address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="permanent_address">Permanent Address</label>
                                    <input id="permanent_address" type="textarea" class="form-control @error('permanent_address') is-invalid @enderror" name="permanent_address" value="{{ $user->permanent_address }}" required autocomplete="permanent_address" autofocus>

                                    @error('permanent_address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                               
                                <div class="form-group">
                                    <button type="submit" class="btn btn-info">
                                      Update
                                    </button>
                                </div>
                            </div>    
                        </div> 
                        </form>

                    </div>
                </div>
            </div> <!-- end col -->
            
        </div> <!-- end row -->
    </div>

</div> <!-- container-fluid -->

@endsection