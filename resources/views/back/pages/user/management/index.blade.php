
@extends('back.layout.user-layout.pages-layout')
@section('titlePage', isset($titlePage) ? $titlePage: 'role')
@php
    // session(['role'=>$role->label_role]);
@endphp
{{-- {{dd($role)}} --}}
@section('content')

@include('back.pages.include.card.card-text', [
    'title'=>$role->label_role,
    'describ'=>$user?->name_user.' Vous êtes connecté sur votre compte '.$role->label_role,

])

<div class="row">
    <div class="col-xxl-9">
        <div class="row">
            <div class="col-xl-4 col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="flex-shrink-0 me-3">
                                <div class="avatar">
                                    <div class="avatar-title rounded bg-primary bg-gradient">
                                        <i data-eva="pie-chart-2" class="fill-white"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="flex-grow-1">
                                <p class="text-muted mb-1">Revenue</p>
                                <h4 class="mb-0">F CFA</h4>
                            </div>

                            <div class="flex-shrink-0 align-self-end ms-2">
                                <div class="badge rounded-pill font-size-13 bg-success-subtle text-success">+ 2.65%
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end card body -->
                </div>
                <!-- end card -->
            </div>
            <!-- end col -->
            <div class="col-xl-4 col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="flex-shrink-0 me-3">
                                <div class="avatar">
                                    <div class="avatar-title rounded bg-primary bg-gradient">
                                        <i data-eva="shopping-bag" class="fill-white"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="flex-grow-1">
                                <p class="text-muted mb-1">Nombres</p>
                                <h4 class="mb-0">9887655</h4>
                            </div>
                            <div class="flex-shrink-0 align-self-end ms-2">
                                <div class="badge rounded-pill font-size-13  bg-danger-subtle  text-danger ">- 0.82%
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end card body -->
                </div>
                <!-- end card -->
            </div>
            <!-- end col -->
            <div class="col-xl-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="flex-shrink-0 me-3">
                                <div class="avatar">
                                    <div class="avatar-title rounded bg-primary bg-gradient">
                                        <i data-eva="people" class="fill-white"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="flex-grow-1">
                                <p class="text-muted mb-1">Utilisateurs</p>
                                <h4 class="mb-0">15</h4>
                            </div>
                            <div class="flex-shrink-0 align-self-end ms-2">
                                <div class="badge rounded-pill font-size-13  bg-danger-subtle  text-danger ">- 1.04%
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end card body -->
                </div>
                <!-- end card -->
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->

        <div class="card">
            <div class="card-body pb-0">
                <div class="d-flex align-items-start">
                    <div class="flex-grow-1">
                        <h5 class="card-title mb-3">Vue d'ensemble</h5>
                    </div>
                    <div class="flex-shrink-0">
                        <div class="dropdown">
                            <a class="dropdown-toggle text-reset" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="fw-semibold">Chercher par:</span> <span class="text-muted">Annuel<i class="mdi mdi-chevron-down ms-1"></i></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="#">Annuel</a>
                                <a class="dropdown-item" href="#">Mensuel</a>
                                <a class="dropdown-item" href="#">Hebdomadaire</a>
                                <a class="dropdown-item" href="#">Jour</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row gy-4">
                    <div class="col-xxl-3">
                        <div>
                            <div class="mt-3 mb-3">
                                <p class="text-muted mb-1">Ce Moi</p>

                                <div class="d-flex flex-wrap align-items-center gap-2">
                                    <h2 class="mb-0">F CFA</h2>
                                    <div class="badge rounded-pill font-size-13 bg-success-subtle text-success">+
                                        2.65%</div>
                                </div>
                            </div>

                            <div class="row g-0">
                                <div class="col-sm-6">
                                    <div class="border-bottom border-end p-3 h-100">
                                        <p class="text-muted text-truncate mb-1">Nombres</p>
                                        <h5 class="text-truncate mb-0">5,643</h5>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="border-bottom p-3 h-100">
                                        <p class="text-muted text-truncate mb-1">Ventes</p>
                                        <h5 class="text-truncate mb-0">F CFA</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="row g-0">
                                <div class="col-sm-6">
                                    <div class="border-bottom border-end p-3 h-100">
                                        <p class="text-muted text-truncate mb-1">Nombres</p>
                                        <h5 class="text-truncate mb-0">12.03 %</h5>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="border-bottom p-3 h-100">
                                        <p class="text-muted text-truncate mb-1">Utilisateurs</p>
                                        <h5 class="text-truncate mb-0">21,456</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="row g-0">
                                <div class="col-sm-6">
                                    <div class="border-end p-3 h-100">
                                        <p class="text-muted text-truncate mb-1">Niveau de revenu</p>
                                        <h5 class="text-truncate mb-0">F CFA</h5>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="p-3 h-100">
                                        <p class="text-muted text-truncate mb-1">Cher</p>
                                        <h5 class="text-truncate mb-0">F CFA</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- end card body -->
        </div>
        <!-- end card -->

        <div class="row">

            <div class="col-xl-4 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-start">
                            <div class="flex-grow-1">
                                <h5 class="card-title mb-3">Nouveau Produit par jour</h5>
                            </div>
                            <div class="flex-shrink-0">
                                <div class="dropdown">
                                    <a class="dropdown-toggle text-muted" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Monthly<i class="mdi mdi-chevron-down ms-1"></i>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a class="dropdown-item" href="#">Yearly</a>
                                        <a class="dropdown-item" href="#">Monthly</a>
                                        <a class="dropdown-item" href="#">Weekly</a>
                                        <a class="dropdown-item" href="#">Today</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mx-n4" data-simplebar style="max-height: 296px;">
                            <ul class="list-unstyled mb-0">
                                <li class="py-3">
                                    <div class="d-flex align-items-center">
                                        <div class="flex-shrink-0 me-3">
                                            <div class="avatar-sm">
                                                <div class="avatar-title bg-primary bg-gradient rounded">
                                                    #1
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flex-grow-1 overflow-hidden">
                                            <p class="text-muted mb-1 text-truncate">Polo blue T-shirt
                                            </p>
                                            <div class="fw-semibold font-size-15">$ 25.4</div>
                                        </div>
                                        <div class="flex-shrink-0">
                                            <h5 class="font-size-14 mb-0 text-truncate w-xs bg-light p-2 rounded text-center">
                                                3.82k</h5>
                                        </div>
                                    </div>
                                </li>
                                <li class="py-3">
                                    <div class="d-flex align-items-center">
                                        <div class="flex-shrink-0 me-3">
                                            <div class="avatar-sm">
                                                <div class="avatar-title bg-primary bg-gradient rounded">
                                                    #2
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flex-grow-1 overflow-hidden">
                                            <p class="text-muted mb-1 text-truncate">Hoodie for men</p>
                                            <div class="fw-semibold font-size-15">$ 24.5</div>
                                        </div>
                                        <div class="flex-shrink-0">
                                            <h5 class="font-size-14 mb-0 text-truncate w-xs bg-light p-2 rounded text-center">
                                                3.14k</h5>
                                        </div>
                                    </div>
                                </li>
                                <li class="py-3">
                                    <div class="d-flex align-items-center">
                                        <div class="flex-shrink-0 me-3">
                                            <div class="avatar-sm">
                                                <div class="avatar-title bg-primary bg-gradient rounded">
                                                    #3
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flex-grow-1 overflow-hidden">
                                            <p class="text-muted mb-1 text-truncate">Red color Cap</p>
                                            <div class="fw-semibold font-size-15">$ 22.5</div>
                                        </div>
                                        <div class="flex-shrink-0">
                                            <h5 class="font-size-14 mb-0 text-truncate w-xs bg-light p-2 rounded text-center">
                                                2.84k</h5>
                                        </div>
                                    </div>
                                </li>
                                <li class="py-3">
                                    <div class="d-flex align-items-center">
                                        <div class="flex-shrink-0 me-3">
                                            <div class="avatar-sm">
                                                <div class="avatar-title bg-primary bg-gradient rounded">
                                                    #4
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flex-grow-1 overflow-hidden">
                                            <p class="text-muted mb-1 text-truncate">Pocket T-shirt</p>
                                            <div class="fw-semibold font-size-15">$ 21.5</div>
                                        </div>
                                        <div class="flex-shrink-0">
                                            <h5 class="font-size-14 mb-0 text-truncate w-xs bg-light p-2 rounded text-center">
                                                2.06k</h5>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- end card -->
            </div>
            <!-- end col -->
            <div class="col-xl-8">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-start">
                            <div class="flex-grow-1">
                                <h5 class="card-title mb-3">Permitation par jour</h5>
                            </div>
                            <div class="flex-shrink-0">
                                <div class="dropdown">
                                    <a class="dropdown-toggle text-reset" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="fw-semibold">Report By:</span> <span class="text-muted">Monthly<i class="mdi mdi-chevron-down ms-1"></i></span>
                                    </a>
        
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a class="dropdown-item" href="#">Yearly</a>
                                        <a class="dropdown-item" href="#">Monthly</a>
                                        <a class="dropdown-item" href="#">Weekly</a>
                                        <a class="dropdown-item" href="#">Today</a>
                                    </div>
                                </div>
                            </div>
                        </div>
        
                        <div class="table-responsive">
                            <table class="table align-middle table-nowrap mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th class="align-middle">Order ID</th>
                                        <th class="align-middle">Billing Name</th>
                                        <th class="align-middle">Date</th>
                                        <th class="align-middle">Total</th>
                                        <th class="align-middle">Pay Status</th>
                                        <th class="align-middle">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><a href="javascript: void(0);" class="text-body fw-semibold">#BR2150</a> </td>
                                        <td>Smith</td>
                                        <td>
                                            07 Oct, 2021
                                        </td>
                                        <td>
                                            $24.05
                                        </td>
                                        <td class="text-center">
                                            <span class="badge badge-pill bg-success-subtle text-success font-size-11">Paid</span>
                                        </td>
                                        <td>
                                            <div class="d-flex gap-2">
                                                <button type="button" class="btn btn-primary bg-gradient btn-sm">
                                                    <i data-eva="eye" data-eva-height="14" data-eva-width="14" class="fill-white align-text-top"></i>
                                                </button>
                                                <button type="button" class="btn btn-success bg-gradient btn-sm">
                                                    <i data-eva="edit" data-eva-height="14" data-eva-width="14" class="fill-white align-text-top"></i>
                                                </button>
                                                <button type="button" class="btn btn-danger bg-gradient btn-sm">
                                                    <i data-eva="trash-2" data-eva-height="14" data-eva-width="14" class="fill-white align-text-top"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
        
                                    <tr>
                                        <td><a href="javascript: void(0);" class="text-body fw-semibold">#BR2149</a> </td>
                                        <td>James</td>
                                        <td>
                                            07 Oct, 2021
                                        </td>
                                        <td>
                                            $26.15
                                        </td>
                                        <td class="text-center">
                                            <span class="badge badge-pill bg-success-subtle text-success font-size-11">Paid</span>
                                        </td>
                                        <td>
                                            <div class="d-flex gap-2">
                                                <button type="button" class="btn btn-primary bg-gradient btn-sm">
                                                    <i data-eva="eye" data-eva-height="14" data-eva-width="14" class="fill-white align-text-top"></i>
                                                </button>
                                                <button type="button" class="btn btn-success bg-gradient btn-sm">
                                                    <i data-eva="edit" data-eva-height="14" data-eva-width="14" class="fill-white align-text-top"></i>
                                                </button>
                                                <button type="button" class="btn btn-danger bg-gradient btn-sm">
                                                    <i data-eva="trash-2" data-eva-height="14" data-eva-width="14" class="fill-white align-text-top"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
        
                                    <tr>
                                        <td><a href="javascript: void(0);" class="text-body fw-semibold">#BR2148</a> </td>
                                        <td>Jill</td>
                                        <td>
                                            06 Oct, 2021
                                        </td>
                                        <td>
                                            $21.25
                                        </td>
                                        <td class="text-center">
                                            <span class="badge badge-pill  bg-warning-subtle  text-warning  font-size-11">Refund</span>
                                        </td>
                                        <td>
                                            <div class="d-flex gap-2">
                                                <button type="button" class="btn btn-primary bg-gradient btn-sm">
                                                    <i data-eva="eye" data-eva-height="14" data-eva-width="14" class="fill-white align-text-top"></i>
                                                </button>
                                                <button type="button" class="btn btn-success bg-gradient btn-sm">
                                                    <i data-eva="edit" data-eva-height="14" data-eva-width="14" class="fill-white align-text-top"></i>
                                                </button>
                                                <button type="button" class="btn btn-danger bg-gradient btn-sm">
                                                    <i data-eva="trash-2" data-eva-height="14" data-eva-width="14" class="fill-white align-text-top"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
        
                                    <tr>
                                        <td><a href="javascript: void(0);" class="text-body fw-semibold">#BR2147</a> </td>
                                        <td>Kyle</td>
                                        <td>
                                            05 Oct, 2021
                                        </td>
                                        <td>
                                            $25.03
                                        </td>
                                        <td class="text-center">
                                            <span class="badge badge-pill bg-success-subtle text-success font-size-11">Paid</span>
                                        </td>
                                        <td>
                                            <div class="d-flex gap-2">
                                                <button type="button" class="btn btn-primary bg-gradient btn-sm">
                                                    <i data-eva="eye" data-eva-height="14" data-eva-width="14" class="fill-white align-text-top"></i>
                                                </button>
                                                <button type="button" class="btn btn-success bg-gradient btn-sm">
                                                    <i data-eva="edit" data-eva-height="14" data-eva-width="14" class="fill-white align-text-top"></i>
                                                </button>
                                                <button type="button" class="btn btn-danger bg-gradient btn-sm">
                                                    <i data-eva="trash-2" data-eva-height="14" data-eva-width="14" class="fill-white align-text-top"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
        
                                    <tr>
                                        <td><a href="javascript: void(0);" class="text-body fw-semibold">#BR2146</a> </td>
                                        <td>Robert</td>
                                        <td>
                                            05 Oct, 2021
                                        </td>
                                        <td>
                                            $22.61
                                        </td>
                                        <td class="text-center">
                                            <span class="badge badge-pill bg-success-subtle text-success font-size-11">Paid</span>
                                        </td>
                                        <td>
                                            <div class="d-flex gap-2">
                                                <button type="button" class="btn btn-primary bg-gradient btn-sm">
                                                    <i data-eva="eye" data-eva-height="14" data-eva-width="14" class="fill-white align-text-top"></i>
                                                </button>
                                                <button type="button" class="btn btn-success bg-gradient btn-sm">
                                                    <i data-eva="edit" data-eva-height="14" data-eva-width="14" class="fill-white align-text-top"></i>
                                                </button>
                                                <button type="button" class="btn btn-danger bg-gradient btn-sm">
                                                    <i data-eva="trash-2" data-eva-height="14" data-eva-width="14" class="fill-white align-text-top"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
        
                                </tbody>
                            </table>
                            <!-- end table -->
                        </div>
                        <!-- end table responsive -->
                    </div>
                    <!-- end card body -->
                </div>
                <!-- end card -->
            </div>
            <!-- end col -->

        </div>
        <!-- end row -->
    </div>
    <!-- end col -->

</div>
<!-- end row -->



@endsection
