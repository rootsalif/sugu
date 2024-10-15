@extends('back.layout.admin-layout.pages-layout')
@section('titlePage', isset($titlePage) ? $titlePage: 'role')

@section('content')

    @php
        $tables=$users;
    @endphp

    <div class="row">
        @include('back.pages.include.alert-success')
        <div class="col-xl-4">

                <h4>Ajouter des roles</h4>

        </div>
        @include('back.pages.include.card.card-role', ['datas'=>$roles])
    </div>


    {{-- Data table --}}

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Liste des roles</h4>
                </div><!-- end card header -->


                @include('back.pages.include.table.show',$data=[
                    'name_user'=>'Nom',
                    'email'=>'Email',  
                    'roles'=>'Role',                
                ])

            </div>
        </div>
    </div>

@endsection
