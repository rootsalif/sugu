@extends('back.layout.super-layout.pages-layout')
@section('titlePage', isset($titlePage) ? $titlePage: 'Admins')

@section('content')

    @php
        $tables=$admins;
    @endphp

    <div class="row">
        @include('back.pages.include.alert-success')
        <div class="col-xl-4">

                <h4>Ajouter un administrateur</h4>

        </div>
        <div class="col-xl-4 right">
            <a href="{{ route('super.adminCreate') }}">
            <div class="card">
                    <button type="button" class="btn btn-primary waves-effect waves-light w-sm">
                            <i class="d-block font-size-16"></i> Crée

                    </button>

            </div>
            </a>
        </div>
    </div>


    {{-- Data table --}}

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">List des Administrateurs</h4>
                </div><!-- end card header -->


                @include('back.pages.include.datatable',$data=[
                    'name_admin'=>'Nom',
                    'name_business_admin'=>'Structure',
                    'email'=>'Email',
                    'phone_admin'=>'Numero',
                    'address_admin'=>'Adresse',
                    'status_admin'=>'Status',
                ])

            </div>
        </div>
    </div>

@endsection
