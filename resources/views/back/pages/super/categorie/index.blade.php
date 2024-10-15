@extends('back.layout.super-layout.pages-layout')
@section('titlePage', isset($titlePage) ? $titlePage: 'Categorie')

@section('content')

    @php
        $tables=$categories;
    @endphp

    <div class="row">
        @include('back.pages.include.alert-success')
        <div class="col-xl-4">

                <h4>Ajouter des Categories</h4>

        </div>
        <div class="col-xl-4 right">
            <a href="{{ route('super.categorie.create') }}">
                @include('back.pages.include.btn-create')
            </a>
        </div>
    </div>


    {{-- Data table --}}

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Liste des Categories</h4>
                </div><!-- end card header -->

                @include('back.pages.include.datatable',[$data=[
                    'label_categorie'=>'Label',
                    'describ_categorie'=>'Description',           
                    'familie_id'=>'Article',     
                ], 'val'=>'familie_id'])

            </div>
        </div>
    </div>

@endsection
