
@extends('back.layout.user-layout.pages-layout')
@section('titlePage', isset($titlePage) ? $titlePage: 'Fonctionnalité')

@section('content')




<div class="row">
        
    <!-- Card de connection d'utilisateur -->

        @include('back.pages.include.card-connect-user', [
        'href'=>'user.user.login',
        'label'=> 'Dirigeant',
        'role'=> 'Gérant',
        'name_src'=>'gerant.jpeg'
        ])


        @include('back.pages.include.card-connect-user', [
        'href'=>'user.user.login',
        'label'=> 'Caissier',
        'role'=> 'Caissier',
        'name_src'=>'caissier1.jpeg'

        ])

        @include('back.pages.include.card-connect-user', [
        'href'=>'user.user.login',
        'label'=> 'Comptable',
        'role'=> 'Comptable',
        'name_src'=>'comptable1.jpeg'

        ])
    </a>

        @include('back.pages.include.card-connect-user', [
        'href'=>'user.user.login',
        'label'=> 'Gestionnaire',
        'role'=> 'Gestionnaire',
        'name_src'=>'gestionnaire2.jpeg'

        ])
    </a>

        @include('back.pages.include.card-connect-user', [
        'href'=>'user.user.login',
        'label'=> 'Magasinier',
        'role'=> 'Magasinier',
        'name_src'=>'magasinier2.jpeg'

        ])
    </a>

        @include('back.pages.include.card-connect-user', [
        'href'=>'user.user.login',
        'label'=> 'Client',
        'role'=> 'Client',
        'name_src'=>'caissier2.jpeg'

        ]) 

        @include('back.pages.include.card-connect-user', [
            'href'=>'user.user.login',
            'label'=> 'Enregistrement',
            'role'=> 'Enregistrer',
            'name_src'=>'magasinier1.jpeg'

            ]) 
        
        @include('back.pages.include.card-connect-user', [
            'href'=>'user.user.login',
            'label'=> 'Commander',
            'role'=> 'Commander',
            'name_src'=>'commande1.jpeg'

            ]) 
        
        @include('back.pages.include.card-connect-user', [
            'href'=>'user.user.login',
            'label'=> 'Courssier',
            'role'=> 'Courssier',
            'name_src'=>'courssier.jpeg'
            ]) 

    
    
  </div>



@endsection
