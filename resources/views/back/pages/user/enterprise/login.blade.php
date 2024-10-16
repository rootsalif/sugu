
@extends('back.layout.user-layout.pages-layout')
@section('titlePage', isset($titlePage) ? $titlePage: 'Fonctionnalité')

@section('content')


<!doctype html>
<html lang="en">

    
<!-- Mirrored from themesbrand.com/borex/layouts/auth-lock-screen.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 11 Mar 2024 18:28:47 GMT -->
<head>
        
        <meta charset="utf-8" />
        <title>Lock Screen | Borex - Admin & Dashboard Template</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesbrand" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!-- Bootstrap Css -->
        <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

    </head>

   <body>
        <div class="auth-page">
            <div class="container-fluid p-0">
                <div class="row g-0 align-items-center">
                    <div class="col-xxl-4 col-lg-4 col-md-6">
                        <div class="row justify-content-center g-0">
                            <div class="col-xl-9">
                                <div class="p-4">
                                    <div class="card mb-0">
                                        <div class="card-body">
                                            <div class="auth-full-page-content rounded d-flex p-3 my-2">
                                                <div class="w-100">
                                                    <div class="d-flex flex-column h-100">
                                                        <div class="mb-4 mb-md-5">
                                                            <a href="index.html" class="d-block auth-logo">
                                                                <img src="assets/images/logo-dark.png" alt="" height="22" class="auth-logo-dark me-start">
                                                                <img src="assets/images/logo-light.png" alt="" height="22" class="auth-logo-light me-start">
                                                            </a>
                                                        </div>
                                                        <div class="auth-content my-auto">
                                                            <div class="text-center">
                                                                <h5 class="mb-0">Lock screen</h5>
                                                                <p class="text-muted mt-2">Enter your password to unlock the screen!</p>
                                                            </div>
                                                            <div class="user-thumb text-center mb-4 mt-4 pt-2">
                                                                <img src="assets/images/users/avatar-1.jpg" class="rounded-circle img-thumbnail avatar-lg" alt="thumbnail">
                                                                <h5 class="font-size-15 mt-3">Jennifer Bennett</h5>
                                                            </div>
                                                            <form class="mt-4 pt-2" action="https://themesbrand.com/borex/layouts/index.html">
                                                                <div class="form-floating form-floating-custom mb-4 auth-pass-inputgroup">
                                                                    <input type="password" class="form-control pe-5" id="password-input" placeholder="Enter Password">
                                                                    <label for="input-password">Password</label>
                                                                    <div class="form-floating-icon">
                                                                        <i data-eva="lock-outline"></i>
                                                                    </div>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <button class="btn btn-primary w-100 waves-effect waves-light" type="submit">Unlock</button>
                                                                </div>
                                                            </form>
                        
                                                            <div class="mt-4 pt-3 text-center">
                                                                <p class="text-muted mb-0">Not you ? return <a href="auth-login.html"
                                                                    class="text-primary fw-semibold"> Sign In </a> </p>
                                                            </div>
                                                        </div>
                                                        <div class="mt-4 text-center">
                                                            <p class="mb-0">© <script>document.write(new Date().getFullYear())</script> Borex   . Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesbrand</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end auth full page content -->
                    </div>
                    <!-- end col -->
                    <div class="col-xxl-8 col-lg-8 col-md-6">
                        <div class="auth-bg bg-white py-md-5 p-4 d-flex">
                            <div class="bg-overlay bg-white"></div>
                            <!-- end bubble effect -->
                            <div class="row justify-content-center align-items-center">
                                <div class="col-xl-8">
                                    <div class="mt-4">
                                        <img src="assets/images/login-img.png" class="img-fluid" alt="">
                                    </div>
                                    <div class="p-0 p-sm-4 px-xl-0 py-5">
                                        <div id="reviewcarouselIndicators" class="carousel slide auth-carousel" data-bs-ride="carousel">
                                            <div class="carousel-indicators carousel-indicators-rounded">
                                                <button type="button" data-bs-target="#reviewcarouselIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                                <button type="button" data-bs-target="#reviewcarouselIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                                <button type="button" data-bs-target="#reviewcarouselIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                                            </div>
                                        
                                            <!-- end carouselIndicators -->
                                            <div class="carousel-inner w-75 mx-auto">
                                                <div class="carousel-item active">
                                                    <div class="testi-contain text-center">
                                                        <h5 class="font-size-20 mt-4">“I feel confident
                                                            imposing change
                                                            on myself”
                                                        </h5>
                                                        <p class="font-size-15 text-muted mt-3 mb-0">Vestibulum auctor orci in risus iaculis consequat suscipit felis rutrum aliquet iaculis
                                                            augue sed tempus In elementum ullamcorper lectus vitae pretium Aenean sed odio dolor Nullam ultricies diam
                                                            eu ultrices tellus eifend sagittis.</p>
                                                    </div>
                                                </div>

                                                <div class="carousel-item">
                                                    <div class="testi-contain text-center">
                                                        <h5 class="font-size-20 mt-4">“Our task must be to
                                                            free widening our circle”</h5>
                                                        <p class="font-size-15 text-muted mt-3 mb-0">
                                                            Curabitur eget nulla eget augue dignissim condintum Nunc imperdiet ligula porttitor commodo elementum
                                                            Vivamus justo risus fringilla suscipit faucibus orci luctus
                                                            ultrices posuere cubilia curae lectus non ultricies cursus.
                                                        </p>
                                                    </div>
                                                </div>

                                                <div class="carousel-item">
                                                    <div class="testi-contain text-center">
                                                        <h5 class="font-size-20 mt-4">“I've learned that
                                                            people will forget what you”</h5>
                                                        <p class="font-size-15 text-muted mt-3 mb-0">
                                                            Pellentesque lacinia scelerisque arcu in aliquam augue molestie rutrum magna Fusce dignissim dolor id auctor accumsan
                                                            vehicula dolor
                                                            vivamus feugiat odio erat sed vehicula lorem tempor quis Donec nec scelerisque magna
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end carousel-inner -->
                                        </div>
                                        <!-- end review carousel -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container fluid -->
        </div>

        <!-- JAVASCRIPT -->
        <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/libs/metismenujs/metismenujs.min.js"></script>
        <script src="assets/libs/simplebar/simplebar.min.js"></script>
        <script src="assets/libs/eva-icons/eva.min.js"></script>

        <script src="assets/js/pages/eva-icon.init.js"></script>

    </body>

<!-- Mirrored from themesbrand.com/borex/layouts/auth-lock-screen.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 11 Mar 2024 18:28:50 GMT -->
</html>



@endsection
