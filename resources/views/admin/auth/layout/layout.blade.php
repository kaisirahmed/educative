<!Doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <title> Login | Admin </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Learning" name="author" />
        <!-- App favicon -->
        
        @include('admin.auth.login.css')

    </head>

    <body>

        <!-- Loader -->
        <div id="preloader"><div id="status"><div class="spinner"></div></div></div>

         <!-- Begin page -->
        <div class="accountbg" style="background: url('');background-size: cover;background-position: center;"></div>

        @yield('content')

        <!-- JAVASCRIPT -->
        @include('admin.auth.login.scripts')

    </body>
</html>
