@extends('back.layout.super-layout.pages-layout')
@section('titlePage', isset($titlePage) ? $titlePage: 'Sous Categorie')

@section('content')

    @php
        $tables=$sub_categories;
    @endphp

    <div class="row">
        @include('back.pages.include.alert-success')
        <div class="col-xl-4">

                <h4>Ajouter des Sous Categories</h4>

        </div>
        <div class="col-xl-4 right">
            <a href="{{ route('super.sub-categorie.create') }}">
                @include('back.pages.include.btn-create')
            </a>
        </div>
    </div>


    {{-- Data table --}}

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Liste des Sous Categories</h4>
                </div><!-- end card header -->

                @include('back.pages.include.datatable',[$data=[
                    'label_sub_categorie'=>'Label',
                    'describ_sub_categorie'=>'Description',           
                    'categorie_id'=>'Article',     
                ], 'val'=>'categorie_id'])

            </div>
        </div>
    </div>

@endsection
