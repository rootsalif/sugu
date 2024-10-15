@extends('back.layout.user-layout.pages-layout')
@section('titlePage', isset($titlePage) ? $titlePage: 'Sous Categorie')

{{-- {{dd($role)}} --}}
@section('content')


@include('back.pages.include.card.card-image',[
    'data'=>$subCategories,
    'describ'=>'describ_sub_categorie',
    'title'=>'label_sub_categorie',
    'relation'=>'modele',
    'route'=>'user.article.index',

])

@endsection