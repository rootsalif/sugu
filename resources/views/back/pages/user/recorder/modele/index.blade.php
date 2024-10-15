@extends('back.layout.user-layout.pages-layout')
@section('titlePage', isset($titlePage) ? $titlePage: 'Marque')

@section('content')

    @php
        $tables=$modeles;
    @endphp

    <div class="row">
        @include('back.pages.include.alert-success')
        <div class="col-xl-4">

                <h4>Ajouter des modeles</h4>

        </div>
        <div class="col-xl-4 right">
            <a href="{{ route('user.modele.create') }}">
                @include('back.pages.include.btn-create')
            </a>
        </div>
    </div>


    {{-- Data table --}}

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Liste des modeles</h4>
                </div><!-- end card header -->


                @include('back.pages.include.datatable',$data=[
                    'label_modele'=>'Label',
                    'describ_modele'=>'Description',                                        
                ])

            </div>
        </div>
    </div>

@endsection
