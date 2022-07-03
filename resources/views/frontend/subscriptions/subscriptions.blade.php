@extends('frontend.layouts.layout')
@section('title','Subscription')
@section('content')
<div class="container page__container" id="app">
    <div class="row">
        <div class="col-md-12">
            <h2 class="bold p-5 text-center" style="width:100%; height:50px;"><i class="material-icons bold" style="font-size: 40px;">library_books</i>&nbsp;My Subscriptions</h2>
        </div>
    </div>
    <subscriptions></subscriptions>
</div>
@endsection