@extends('back.layout.admin-layout.pages-layout')
@section('titlePage', isset($titlePage) ? $titlePage: 'User')

@section('content')

    @php
        $tables=$users;
    @endphp

    <div class="row">
        @include('back.pages.include.alert-success')
        <div class="col-xl-4">

                <h4>Ajouter des users</h4>

        </div>
        <div class="col-xl-4 right">
            <a href="{{ route('admin.user.create') }}">
                @include('back.pages.include.btn-create')
            </a>
        </div>
    </div>


    {{-- Data table --}}

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Liste des users</h4>
                </div><!-- end card header -->


                @include('back.pages.include.datatable',$data=[
                    'name_user'=>'Nom',
                    'email'=>'Email',                                        
                ])

            </div>
        </div>
    </div>

@endsection
