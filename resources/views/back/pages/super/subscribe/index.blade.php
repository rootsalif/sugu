@extends('back.layout.super-layout.pages-layout')
@section('titlePage', isset($titlePage) ? $titlePage: 'Subscribe')

@section('content')

    @php
        $tables=$admins;
    @endphp

    <div class="row">
        @include('back.pages.include.alert-success')
        <div class="col-xl-4">

                <h4>Ajouter un abonnement</h4>

        </div>
        <div class="col-xl-4 right">
            <a href="{{ route('super.adminCreate') }}">
                @include('back.pages.include.btn-create')
            </a>
        </div>
    </div>


    {{-- Data table --}}

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Liste des abonnées</h4>
                </div><!-- end card header -->


                @include('back.pages.include.datatable',$data=[
                    'name_admin'=>'Nom',
                    'date_debut'=>'Date debut',
                    'date_fin'=>'Date fin',
                    'created_at'=>'Cration',
                    'updated_at'=>'Modifier',
                ])

            </div>
        </div>
    </div>

@endsection
