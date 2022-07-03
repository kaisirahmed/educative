<!doctype html>
<html lang="en">

    <head>
       
       @include('admin.components.meta')
        
        <title>@yield('title') | Learning Tutorial </title>
        
        @include('admin.components.css')

    </head>

    <body data-sidebar="white">

        <!-- Loader -->
        <div id="preloader"><div id="status"><div class="spinner"></div></div></div>

        <!-- Begin page -->
        <div id="layout-wrapper">

            <header id="page-topbar">
                @include('admin.components.header')
            </header>

            <!-- ========== Left Sidebar Start ========== -->
            <div class="vertical-menu">

                <div data-simplebar class="h-100">

                    <!--- Sidemenu -->
                    @include('admin.components.sidebar')
                    <!-- Sidebar -->
                </div>
            </div>
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                @yield('content')
                <!-- End Page-content -->

                @include('admin.components.footer')
                
            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->
 
        <!-- JAVASCRIPT -->
       
       @include('admin.components.scripts')

    </body>
</html>
