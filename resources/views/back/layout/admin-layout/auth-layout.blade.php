
<!doctype html>
<html lang="en">


<!-- Mirrored from themesbrand.com/borex/layouts/auth-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 11 Mar 2024 18:29:57 GMT -->
<head>

        <meta charset="utf-8" />
        <title>@yield('auth')</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesbrand" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="/back/assets/images/favicon.ico">

        <!-- Bootstrap Css -->
        <link href="/back/assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="/back/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="/back/assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

        @stack('stylesheets')
    </head>

   <body>
        <div class="auth-page">
            <div class="container-fluid p-0">

                <div class="row g-0 align-items-center">
                    @yield('content')

                </div>
                <!-- end row -->
            </div>
            <!-- end container fluid -->
        </div>

        <!-- JAVASCRIPT -->
        <script src="/back/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="/back/assets/libs/metismenujs/metismenujs.min.js"></script>
        <script src="/back/assets/libs/simplebar/simplebar.min.js"></script>
        <script src="/back/assets/libs/eva-icons/eva.min.js"></script>

        <script src="/back/assets/js/pages/pass-addon.init.js"></script>

       <script src="/back/assets/js/pages/eva-icon.init.js"></script>
        @stack('scripts')
    </body>

<!-- Mirrored from themesbrand.com/borex/layouts/auth-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 11 Mar 2024 18:29:58 GMT -->
</html>
