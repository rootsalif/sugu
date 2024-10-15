@extends('back.layout.super-layout.pages-layout')
@section('titlePage', isset($titlePage) ? $titlePage: 'Article')

@section('content')

    @php
        $tables=$admins;
    @endphp

    <div class="row">
        @include('back.pages.include.alert-success')
        <div class="col-xl-4">

                <h4>Ajouter des articles</h4>

        </div>
        @include('back.pages.include.card.card-family', ['datas'=>$families])
    </div>


    {{-- Data table --}}

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Liste des articles</h4>
                </div><!-- end card header -->


                @include('back.pages.include.table.show',[$data=[
                    'name_admin'=>'Nom',
                    'email'=>'Email',  
                    'families'=>'Article',                
                ],'pivot'=>'families'])

            </div>
        </div>
    </div>

@endsection
