<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="distribution" content="web">
    <title>@yield('title') | eLearning</title>

    <!-- Prevent the demo from appearing in search engines -->
    <meta name="robots" content="noindex">

    @include('frontend.components.css')

</head>

<body class="layout-fixed layout-sticky-subnav">


    <div class="preloader"></div>

    <!-- Header Layout -->
    <div class="mdk-header-layout">

        <!-- Header -->

        @include('frontend.components.header')
       
        <!-- // END Header -->

        <!-- Header Layout Content -->
        <div class="mdk-header-layout__content page">

            @include('frontend.components.navbar')

            @yield('banner')

            <div class="container page__container"  style="margin-top: 90px;">                
                @yield('content')

            </div>
            {{-- @if(view('frontend.courses.courseLessons'))
                
            @else --}}
            @include('frontend.components.footer')
            {{-- @endif --}}
        </div>
        <!-- // END Header Layout Content -->

    </div>
    <!-- // END Header Layout -->
    <div class="mdk-drawer  js-mdk-drawer" id="default-drawer" data-align="">
        
        @include('frontend.components.sidebar')

    </div>
    @include('frontend.components.whyElearningModal')
    @include('frontend.components.script')

</body>

</html>