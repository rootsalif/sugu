@extends('back.layout.super-layout.pages-layout')
@section('titlePage', isset($titlePage) ? $titlePage: 'Crée')

@section('content')

<div class="col-xl-8 mx-auto" >
    <div class="card">
        <div class="card-header">
            <h2 class="text-center">Création des comptes admins</h2>
        </div>
        <div class="card-body">

            <form  action="{{ route($admin->exists? 'super.adminUpdate':'super.store', $admin) }}" method="POST" enctype="multipart/form-data">
                @csrf

                @method($admin->exists ? 'put': 'post')

                <div class="form-group">
                    <div class="card-header">
                        <h2 class="card-title">Informations Personnel</h2>
                    </div>
                    <div class="form-control">
                        @include('back.pages.include.input', [
                            'name'=>'path_admin', 
                            'type'=>'file', 
                            'label'=>'Profil', 
                            'placeholder'=>'Profil', 
                            'value'=>$admin->path_admin
                            ])
                        @include('back.pages.include.input', [
                            'name'=>'name_admin', 
                            'label'=>'Nom','validate'=>'*', 
                            'placeholder'=>'Nom complet', 
                            'value'=>$admin->name_admin
                            ])
                        @include('back.pages.include.input', [
                            'name'=>'profession_admin', 
                            'label'=>'Proffession',
                            'validate'=>'*', 
                            'placeholder'=>'Votre bulot', 
                            'value'=>$admin->profession_admin
                            ])
                        @include('back.pages.include.input', [
                            'name'=>'email', 
                            'type'=>'email' , 
                            'validate'=>'*',
                            'label'=>'Email', 
                            'value'=>$admin->email
                            ])
                        @include('back.pages.include.input', [
                            'name'=>'password', 
                            'type'=>'password' , 
                            'validate'=>'*', 
                            'label'=>'Mot de passe'
                            ])

                        @include('back.pages.include.input', [
                            'name'=>'pass_conf', 
                            'type'=>'password' , 
                            'validate'=>'*', 
                            'label'=>'Confirmer le passe'
                            ])
                        @include('back.pages.include.input', [
                            'name'=>'phone_admin', 
                            'label'=>'Numero', 
                            'validate'=>'*', 
                            'placeholder'=>'Numero de phone', 
                            'value'=>$admin->phone_admin
                            ])
                        @include('back.pages.include.input', [
                            'name'=>'address_admin', 
                            'label'=>'Adresse', 
                            'validate'=>'*', 
                            'placeholder'=>'Adresse', 
                            'value'=>$admin->address_admin
                            ])
                    </div>
                </div>

                <div class="form-group">
                    <div class="card-header">
                        <h2 class="card-title">informations Entreprise</h2>
                    </div>
                    <div class="form-control">

                        @include('back.pages.include.input', [
                            'name'=>'logo_enterprise', 
                            'type'=>'file', 
                            'label'=>'Logo', 
                            'placeholder'=>'Logo De Entreprise', 
                            'validate'=>'*',
                            'value'=>$admin->path_admin
                            ])

                        @include('back.pages.include.input', [
                            'name'=>'font_path_enterprise', 
                            'type'=>'file' , 
                            'validate'=>'*',
                            'label'=>"Font d'image", 
                            'placeholder'=>"Font d'image",
                            'value'=>$admin->enterprise?->font_path_enterprise
                            ])
                        @include('back.pages.include.input', [
                            'name'=>'name_enterprise', 
                            'label'=>'Nom','validate'=>'*', 
                            'placeholder'=>'Nom Entreprise', 
                            'validate'=>'*',
                            'value'=>$admin->enterprise?->name_enterprise
                            ])
                        @include('back.pages.include.select.select', [
                            'name'=>'family_id',
                            'label'=>'Article de l\'Entreprise',
                            'placeholder'=>'Choisir un article',
                            'options'=>$familySelected,
                            'validate'=>'*',
                        ])

                        @include('back.pages.include.input', [
                            'name'=>'phone_enterprise', 
                            'label'=>'Téléphone', 
                            'placeholder'=>'Séparer par/ les numero', 
                            'validate'=>'*',
                            'value'=>$admin->enterprise?->phone_enterprise
                            ])
                        @include('back.pages.include.input', [
                            'name'=>'address_enterprise', 
                            'label'=>'Adresse', 
                            'placeholder'=>'Domicile Entreprise', 
                            'validate'=>'*',
                            'value'=>$admin->enterprise?->address_enterprise
                            ])


                        @include('back.pages.include.input', [
                            'name'=>'num_Id_enterprise', 
                            'label'=>'Identification', 
                            'placeholder'=>'Numero de SIREN', 
                            'value'=>$admin->enterprise?->num_Id_enterprise
                            ])
     
                        @include('back.pages.include.input', [
                            'type'=>'email',
                            'name'=>'email_enterprise', 
                            'label'=>'Email/Domain', 
                            'placeholder'=>"Adresse electronique", 
                            'validate'=>'*',
                            'value'=>$admin->enterprise?->email_enterprise
                            ])
                        @include('back.pages.include.input', [
                            'name'=>'created_enterprise',
                            'type'=>'date',
                            'label'=>'Date', 
                            'placeholder'=>"Creation de l'entreprise", 
                            'validate'=>'*',
                            'value'=>$admin->enterprise?->created_enterprise
                            ])

                        
                        @include('back.pages.include.textarea', [
                            'name'=>'argument_enterprise', 
                            'label'=>'Argument', 
                            'placeholder'=>"Argumenter votre entreprise", 
                            'validate'=>'*',
                            'attribut'=>$admin->enterprise?->argument_enterprise,
                            'entity'=>2,
                        ])

                        @include('back.pages.include.textarea', [
                            'name'=>'describ_enterprise',                             
                            'label'=>'Description', 
                            'placeholder'=>'Text Introduction',    
                            'validate'=>'*',                        
                            'attribut'=>$admin->enterprise?->describ_enterprise
                        ])
                        
                       
                    </div>
                </div>




                <div class="row justify-content-end mt-2">
                    <div class="col-sm-9 d-flex justify-content-end">
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


@endsection
