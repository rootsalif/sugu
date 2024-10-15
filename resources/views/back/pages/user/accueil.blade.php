@extends("back.layout.$path-layout.pages-layout")

@section('titlePage', isset($titlePage) ? $titlePage: 'Accueil')
@section('content')

<!-- end col -->
<div class="col-xxl-3">

    <div class="user-sidebar">
        <div class="card">
            <div class="card-body p-0">
                <div class="user-profile-img">
                    <img src="{{isset($enterprise->font_path_enterprise)? $enterprise->urlImageLogo(): '/back/src/image/produit/IMG-20240730-WA0019.jpg' }}" class="profile-img profile-foreground-img rounded-top" style="height: 120px;" alt="">
                    {{-- <div class="overlay-content rounded-top">
                        <div>
                            <div class="user-nav p-3">
                                <div class="d-flex justify-content-end">
                                    <div class="dropdown">
                                        <a class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i data-eva="more-horizontal-outline" data-eva-width="20" data-eva-height="20" class="fill-white"></i>
                                        </a>

                                        <ul class="dropdown-menu dropdown-menu-end">
                                            <li><a class="dropdown-item" href="#">Action</a></li>
                                            <li><a class="dropdown-item" href="#">Another action</a>
                                            </li>
                                            <li><a class="dropdown-item" href="#">Something else
                                                    here</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                </div>
                <!-- end user-profile-img -->

                <div class="mt-n5 position-relative">
                    <div class="text-center">
                        <img src="{{isset($enterprise->logo_enterprise)? $enterprise->urlImageFont() : '/back/src/image/user/famanta.png'}}" alt="" class="avatar-xl rounded-circle img-thumbnail">

                        <div class="mt-3">
                            <h5 class="mb-1">{{isset($enterprise->name_enterprise)? $enterprise->name_enterprise: 'Entreprise Fils Famanta'}}</h5>
                            <p class="text-muted">{{isset($enterprise->activity_enterprise)? $enterprise->activity_enterprise: 'Commerçant de Chaussure'}}</p>
                        </div>
                    </div>
                </div>

                <div class="p-3">
                    <div class="row text-center pb-3">
                        <div class="col-6 border-end">
                            <div class="p-1">
                                <h5 class="mb-1">{{isset($produits)? $produits->count(): '20000'}}</h5>
                                <p class="text-muted mb-0">Products</p>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="p-1">
                                <h5 class="mb-1">{{isset($marques)? $marques->count(): '1000'}}</h5>
                                <p class="text-muted mb-0">Marques</p>
                            </div>
                        </div>
                    </div>

                    <hr class="mb-4">


                    <div class="mb-4">
                        <div class="d-flex align-items-start">
                            <div class="flex-grow-1">
                                <h5 class="card-title mb-3">Notre Ojectif</h5>
                            </div>
                            <div>
                                <button class="btn btn-link py-0 shadow-none" data-bs-toggle="tooltip" data-bs-placement="left" data-bs-trigger="hover" title="Info">
                                    <i data-eva="info-outline" class="fill-muted" data-eva-height="20" data-eva-width="20"></i>
                                </button>
                            </div>
                        </div>

                        <div id="chart-radialBar" class="apex-charts" data-colors='["#3b76e1"]'></div>

                        <div class="text-center mt-4">                            
                            <p class="text-muted">{{isset($enterprise->argument_enterprise)? $enterprise->argument_enterprise: '
                            Nous somme présent pour la satisfraction de nos client.'}}</p>
                            <div class="d-flex align-items-start justify-content-center gap-2">
                                {{-- <div class="badge rounded-pill font-size-13 bg-success-subtle text-success">+ 2.65%
                                </div> --}}
                                <div class="text-muted text-start text-truncate">Nos clients d'abort</div>
                            </div>
                        </div>
                    </div>

                    <hr class="mb-4">
                    <div class="px-4 mx-n3" data-simplebar style="height: 258px;">

                        <div>
                            <h5 class="card-title mb-3">Description de l'entreprise</h5>
{{-- 
                            <ul class="list-unstyled mb-0">
                                <li class="py-2">
                                    <div class="d-flex align-items-start">
                                        <div class="flex-shrink-0 me-3">
                                            <div class="avatar-md h-auto p-1 py-2 bg-light rounded">
                                                <div class="text-center">
                                                    <h5 class="mb-0">12</h5>
                                                    <div>Sep</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flex-grow-1 pt-2 text-muted">
                                            <p class="mb-0">Responded to need “Volunteer Activities"</p>
                                        </div>
                                    </div>
                                </li>

                                <li class="py-2">
                                    <div class="d-flex align-items-start">
                                        <div class="flex-shrink-0 me-3">
                                            <div class="avatar-md h-auto p-1 py-2 bg-light rounded">
                                                <div class="text-center">
                                                    <h5 class="mb-0">11</h5>
                                                    <div>Sep</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flex-grow-1 pt-2 text-muted">
                                            <p class="mb-0">Everyone realizes would be desirable... <a href="javascript: void(0);">Read more</a></p>
                                        </div>
                                    </div>
                                </li>
                                <li class="py-2">
                                    <div class="d-flex align-items-start">
                                        <div class="flex-shrink-0 me-3">
                                            <div class="avatar-md h-auto p-1 py-2 bg-light rounded">
                                                <div class="text-center">
                                                    <h5 class="mb-0">10</h5>
                                                    <div>Sep</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flex-grow-1 pt-2 text-muted">
                                            <p class="mb-0">
                                                Joined the group “Boardsmanship Forum”</p>
                                        </div>
                                    </div>
                                </li>
                                <li class="pt-2">
                                    <a href="#" class="btn btn-link w-100 shadow-none"><i class="mdi mdi-loading mdi-spin me-2"></i> Load More</a>
                                </li>
                            </ul> --}}

                            <p class="text-center">{{isset($enterprise->describ_enterprise)? $enterprise->describ_enterprise :'
                            Please pouvez vous ajouter une description de votre entreprise'}}</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end card body -->
        </div>
        <!-- end card -->
    </div>
</div>
<!-- end col -->

<!-- card product -->

{{-- @include('back.pages.include.card.card-image') --}}
@include('back.pages.include.card-slide-product')


@endsection
