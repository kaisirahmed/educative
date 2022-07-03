@extends('frontend.layouts.layout')
@section('title', 'Blog')
{{-- @section('banner')
<div class="home-banner text-white mb-2">
    <div class="container page__container">
        <h1 class="display-4 bold">eLearning Blog</h1>
        <p class="lead mb-5">To help you know the latest technology & also latest courses.</p>
       
    </div>
</div>
@endsection --}}
@section('content')

<div class="container page__container" id="app">
    <h1 class="display-4">eLearning Blog</h1>
    <p class="lead mb-5">It helps you to know the latest technology & also latest programming languages .</p>
    <blogs></blogs>
</div>
@endsection
        