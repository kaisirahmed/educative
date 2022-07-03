@extends('admin.auth.layout.layout')
@section('title','Login')
@section('content')
<div class="account-pages mt-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 col-xl-5">
                <div class="card">
                    <div class="card-body">
                        <div class="text-center mt-4">
                            <div class="mb-3">
                                <a href="{{ route('home') }}"><img src="{{ asset('learningAdminAssets/images/logo.png') }}" height="30" alt="logo"></a>
                            </div>
                        </div>
                        <div class="p-3">
                            <h4 class="font-size-18 mt-2 text-center">Welcome Back !</h4>
                            <p class="text-muted text-center mb-4">Sign in to continue to E-Learning.</p>

                            {!! Form::open([ 'route' => 'admin.login' ]) !!}
                            
                                @if (session('warning'))
                                    <div class="alert alert-danger" role="alert">
                                        {{ session('warning') }}
                                    </div>
                                @endif

                                @if (session('status'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('status') }}
                                    </div>
                                @endif

                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group row mt-4">
                                    <div class="col-sm-6">
                                        <div class="custom-control custom-checkbox">
                                            <input class="custom-control-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                            <label class="custom-control-label" for="remember">
                                                {{ __('Remember Me') }}
                                            </label>
                                             
                                        </div>
                                    </div>
                                    <div class="col-sm-6 text-right">
                                        <button class="btn btn-info w-md waves-effect waves-light" type="submit">{{ __('Login') }}</button>
                                    </div>
                                </div>

                                <div class="form-group mb-0 row">
                                    <div class="col-12 mt-4">
                                        @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('admin.password.request') }}" class="text-muted"><i class="mdi mdi-lock"></i>{{ __('Forgot Your Password?') }}</a>
                                        @endif
                                    </div>
                                </div>
                            {!! Form::close() !!}

                        </div>

                    </div>
                </div>
             {{--    <div class="mt-5 text-center">
                    <p class="text-white">{{ now()->format('Y') }} © Learning<i class="mdi mdi-heart text-danger"></i> by Learning</p>
                </div> --}}

            </div>
        </div>
    </div>
</div>
@endsection