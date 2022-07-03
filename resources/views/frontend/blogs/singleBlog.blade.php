@extends('frontend.layouts.layout')
@section('title', $singleBlog->title)
@section('content')
<div class="container-fluid page__container">
    <div class="row">
        <div class="card">
            <div class="card-header card-header-large bg-light d-flex align-items-center">
                <div class="flex">
                    <div class="text-center">
                        <img class="text-center" style="width: 100%;" src="{{ asset('uploadfiles/blogs/banners/'.$singleBlog->banner) }}" alt="Blog Banner">                            
                    </div>
                    <h2 class="bold m-4 text-center">{{ $singleBlog->title }}</h2>
                </div>
            </div>
            <div class="card-body">
                <p style="padding: 10px;">{!! $singleBlog->description !!}</p>
            </div>
        </div>
    </div>
</div>
@endsection