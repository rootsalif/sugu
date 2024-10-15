@extends('back.layout.super-layout.pages-layout')
@section('titlePage', isset($titlePage) ? $titlePage: 'Fonctionnalité')

@section('content')

    @php
        $tables=$functionals;
    @endphp

    <div class="row">
        @include('back.pages.include.alert-success')
        <div class="col-xl-4">

                <h4>Ajouter des Administrateurs</h4>

        </div>

    </div>

    @include('back.pages.include.select-multiple')


    {{-- Data table --}}

    {{-- <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Liste des fonctionnalité</h4>
                </div><!-- end card header -->


                @include('back.pages.include.datatable',[$data=[
                    'label_functional'=>'Label',
                    'descrip_functional'=>'Description',                    
            ],'add'=>'Admin'])

            </div>
        </div>
    </div> --}}


@endsection
