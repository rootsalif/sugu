@extends('back.layout.admin-layout.auth-layout')
@section('titlePage', isset($titlePage) ? $titlePage: 'Auth')


@section('content')

<div class="row justify-content-center align-items-center p-auto">
    <div class="col-xl-6 my-auto" >
        <div class="mt-4">
            <img src="/back/assets/images/login-img.png" class="img-fluid" alt="">
        </div>
        {{-- <div class="p-0 p-sm-4 px-xl-0 py-5">
            <div id="reviewcarouselIndicators" class="carousel slide auth-carousel" data-bs-ride="carousel">
                <div class="carousel-indicators carousel-indicators-rounded">
                    <button type="button" data-bs-target="#reviewcarouselIndicators" data-bs-slide-to="0" class="" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#reviewcarouselIndicators" data-bs-slide-to="1" aria-label="Slide 2" class="active" aria-current="true"></button>
                    <button type="button" data-bs-target="#reviewcarouselIndicators" data-bs-slide-to="2" aria-label="Slide 3" class=""></button>
                </div>

                <!-- end carouselIndicators -->
                <div class="carousel-inner w-75 mx-auto">
                    <div class="carousel-item">
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

                    <div class="carousel-item active">
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
        </div> --}}
    </div>

    <div class="col-xxl-4 col-lg-4 col-md-6 my-auto">
        <div class="row justify-content-center g-0">
            {{-- <div class="col-xl-9"> --}}
                <div class="p-4">
                    <div class="card mb-0">
                        <div class="card-body">
                            <div class="auth-full-page-content rounded d-flex p-1 my-1">
                                <div class="w-100">
                                    <div class="d-flex flex-column h-100">

                                        <div class="auth-content my-auto">
                                            <div class="text-center">
                                                <h5 class="mb-0">Bien venue !</h5>
                                                <p class="text-muted mt-2">Joindre votre structure.</p>
                                            </div>
                                            @if (Session::get('fail'))

                                            <div class="alert alert-danger">
                                                {{ Session::get('fail') }}
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>

                                            </div>

                                            @endif
                                            <form class="mt-4 pt-2" action="{{ route('admin.logfrom') }}" method="POST">
                                                @csrf
                                                @method('post')
                                                <div class="form-floating form-floating-custom mb-4">
                                                    <input type="text" name="email" value="{{ old('email_admin') }}" class="form-control" id="input-username" placeholder="Entre l'Email">
                                                    <label for="input-username">Email</label>
                                                    <div class="form-floating-icon">
                                                        <i data-eva="people-outline"></i>
                                                    </div>
                                                </div>
                                                @error('email')
                                                    <div class="d-block text-danger" style="margin-top:25px; margin-bottom:15px">
                                                        {{ $message }}
                                                    </div>
                                                @enderror

                                                <div class="form-floating form-floating-custom mb-4 auth-pass-inputgroup">
                                                    <input type="password" name="password" class="form-control pe-5" id="password-input" placeholder="Enter le mots de passe">

                                                    <button type="button" class="btn btn-link position-absolute h-100 end-0 top-0" id="password-addon">
                                                        <i class="mdi mdi-eye-outline font-size-18 text-muted"></i>
                                                    </button>
                                                    <label for="password-input">Password</label>
                                                    <div class="form-floating-icon">
                                                        <i data-eva="lock-outline"></i>
                                                    </div>
                                                </div>

                                                @error('password')
                                                    <div class="d-block text-danger" style="margin-top:25px; margin-bottom:15px">
                                                        {{ $message }}
                                                    </div>
                                                @enderror


                                                {{-- <div class="row mb-4">
                                                    <div class="col">
                                                        <div class="form-check font-size-15">
                                                            <input class="form-check-input" type="checkbox" id="remember-check">
                                                            <label class="form-check-label font-size-13" for="remember-check">
                                                                Remember me
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div> --}}
                                                <div class="mb-3">
                                                    <button class="btn btn-primary w-100 waves-effect waves-light" type="submit">Connecter</button>
                                                </div>
                                            </form>

                                            {{-- <div class="mt-4 pt-3 text-center">
                                                <div class="signin-other-title">
                                                    <h5 class="font-size-14 mb-4 text-muted fw-medium">- Or you can join with -</h5>
                                                </div>

                                                <div class="d-flex gap-2">
                                                    <button type="button" class="btn btn-soft-primary waves-effect waves-light w-100">
                                                        <i class="bx bxl-facebook font-size-16 align-middle"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-soft-info waves-effect waves-light w-100">
                                                        <i class="bx bxl-linkedin font-size-16 align-middle"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-soft-danger waves-effect waves-light w-100">
                                                        <i class="bx bxl-google font-size-16 align-middle"></i>
                                                    </button>
                                                </div>
                                            </div> --}}

                                            {{-- <div class="mt-4 pt-3 text-center">
                                                <p class="text-muted mb-0">êtes vous employer ? <a href="auth-register.html"
                                                    class="text-primary fw-semibold"> Joindre votre Entreprise </a> </p>
                                            </div> --}}
                                        </div>
                                        {{-- <div class="mt-4 text-center">
                                            <p class="mb-0">© <script>document.write(new Date().getFullYear())</script> Sugu   . Consus <i class="mdi mdi-heart text-danger"></i> pour aider</p>
                                        </div> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            {{-- </div> --}}
        </div>
        <!-- end auth full page content -->
    </div>
    <!-- end col -->

</div>







@endsection
