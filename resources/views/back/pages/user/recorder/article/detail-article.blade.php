@extends('back.layout.user-layout.pages-layout')
@section('titlePage', isset($titlePage) ? $titlePage: 'role')

@section('content')


    <div class="row">
        @include('back.pages.include.alert-success')
        
        @include('back.pages.include.card.card-text', [
            'title'=>'Enregistrer les détails de Chaussure'
        ])

        <div class="row">
            <div class="col-xxl-9">        
                <div class="row">

                @include('back.pages.include.card.card', [
                    'title'=>'Tailles de Chaussure',
                    'describ'=>'Ajouter des taills de chaussure',
                    'route'=>'user.size.index',

                ])
                @include('back.pages.include.card.card', [
                    'title'=>'Pointure de Chaussure',
                    'describ'=>'Ajouter des des pointure de chaussure',
                    'route'=>'user.number.index',

                ])

                @include('back.pages.include.card.card', [
                    'title'=>'Marque de Chaussure',
                    'describ'=>'Ajouter des marques de chaussure',
                    'route'=>'user.marque.index'
                ])
                @include('back.pages.include.card.card', [
                    'title'=>'Modele de Chaussure',
                    'describ'=>'Ajouter des modele de chaussure',
                    'route'=>'user.modele.index'

                ])
                @include('back.pages.include.card.card', [
                    'title'=>'Usine de chaussure',
                    'describ'=>'Ajouter des fournisseur de chaussure',
                    'route'=>'user.usine.index',

                ])
                @include('back.pages.include.card.card', [
                    'title'=>'Composant de Chaussure',
                    'describ'=>'Ajouter des des composant de chaussure',
                    'route'=>'user.component.index',

                ])
                {{-- @include('back.pages.include.card.card', [
                    'title'=>'Image de Chaussure',
                    'describ'=>'Ajouter des des images de chaussure',
                    'route'=>'user.image.index',

                ]) --}}
                @include('back.pages.include.card.card', [
                    'title'=>'Couleur de Chaussure',
                    'describ'=>'Ajouter des des couleur de chaussure',
                    'route'=>'user.couleur.index',

                ])
            </div>
            </div>
        </div>
    </div>



  

@endsection
