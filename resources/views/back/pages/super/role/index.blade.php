@extends('back.layout.super-layout.pages-layout')
@section('titlePage', isset($titlePage) ? $titlePage: 'Role')

@section('content')

    @php
        $tables=$roles;
    @endphp

    <div class="row">
        @include('back.pages.include.alert-success')
        <div class="col-xl-4">

                <h4>Ajouter des roles</h4>

        </div>
        <div class="col-xl-4 right">
            <a href="{{ route('super.role.create') }}">
                @include('back.pages.include.btn-create')
            </a>
        </div>
    </div>


    {{-- Data table --}}

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Liste des roles</h4>
                </div><!-- end card header -->


                @include('back.pages.include.datatable',$data=[
                    'label_role'=>'Label',
                    'describ_role'=>'Description',                    
                ])

            </div>
        </div>
    </div>

@endsection
