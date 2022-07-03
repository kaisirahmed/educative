@extends('admin.layouts.layout')
@section('title','Contact')
@section('content')
 <div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="text-center mt-2">
                                    <h5>Have any questions?</h5>
                                    <p class="text-muted">It is a long established fact that a reader will be of a page when looking at its layout.</p>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-5">
                            <div class="col-md-4">
                                <div>
                                    <h6 class="font-size-14">Email Address</h6>
                                    <p class="text-muted">supportemail@admiria  .com</p>
                                </div>
                                <div class="pt-3">
                                    <h6 class="font-size-14">Telephone number</h6>
                                    <p class="text-muted">+123 45 56 879</p>
                                </div>
                                <div class="pt-3">
                                    <h6 class="font-size-14">Address</h6>
                                    <p class="text-muted">09 Design Street, Downtown Victoria, Australia</p>
                                </div>
                            </div>
                            <div class="col-md-8">
                                {!! Form::open(['route' => 'admin.contact.store', 'class'=>'form-custom']) !!}
                                    <div class="row">
                                        @if (session()->has('message'))
                                            <div class="alert alert-success alert-dismissible fade show" role="alert"> 
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                                <strong>{!! session('message') !!}</strong>
                                            </div>
                                        @endif

                                        @if (session()->has('error-mail'))
                                            <div class="alert alert-warning alert-dismissible fade show" role="alert"> 
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                                <strong>{!! session('error-mail') !!}</strong>
                                            </div>
                                        @endif
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="sr-only" for="username">Name</label>
                                                <input type="text" name="name" class="form-control" id="username" placeholder="Your Name" required="">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="sr-only" for="useremail">Email address</label>
                                                <input type="email" name="email" class="form-control" id="useremail" placeholder="Your Email" required="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="sr-only" for="usersubject">Subject</label>
                                                <input type="text" name="subject" class="form-control" id="usersubject" placeholder="Subject" required="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <textarea class="form-control" name="message" rows="5" placeholder="Your Message...."></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 text-center">
                                            <button type="submit" class="btn btn-primary waves-effect waves-light">Send Mail</button>
                                        </div>
                                    </div>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- container-fluid -->
</div>
@endsection