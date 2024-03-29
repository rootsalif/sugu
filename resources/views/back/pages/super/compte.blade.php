@extends('back.layout.super-layout.pages-layout')
@section('titlePage', isset($titlePage) ? $titlePage: 'Compte')


@section('content')

    <div class="col-xl-8 mx-auto" >
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Création des comptes admins</h4>
            </div>
            <div class="card-body">

                <form  action="{{ route($admin->exists? 'super.adminUpdate':'super.store', $admin) }}" method="POST">
                    @csrf

                    @method($admin->exists ? 'put': 'post')

                    @include('back.pages.include.input', ['name'=>'name_admin', 'label'=>'Nom', 'placeholder'=>'Nom complet'])
                    @include('back.pages.include.input', ['name'=>'email', 'type'=>'email' ,'label'=>'Email'])
                    @include('back.pages.include.input', ['name'=>'password', 'type'=>'password' , 'label'=>'Mot de passe'])
                    @include('back.pages.include.input', ['name'=>'name_business_admin', 'label'=>'Structure', 'placeholder'=>'Nom de la societé'])
                    @include('back.pages.include.input', ['name'=>'phone_admin', 'label'=>'Numero', 'placeholder'=>'Numero de phone'])
                    @include('back.pages.include.input', ['name'=>'address_admin', 'label'=>'Adresse', 'placeholder'=>'Adresse'])


                    <div class="row justify-content-end">
                        <div class="col-sm-9">
                            <div>
                                <button type="submit" class="btn btn-primary w-md">
                                    @if($admin->exists)
                                        Modifier
                                    @else
                                        Crée
                                    @endif
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <!-- end card body -->
        </div>
        <!-- end card -->
    </div>

        {{-- Data table --}}


        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">List des Abonnements</h4>
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
