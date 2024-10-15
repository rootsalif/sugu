@extends('back.layout.user-layout.pages-layout')
@section('titlePage', isset($titlePage) ? $titlePage: 'role')

{{-- {{dd($role)}} --}}
@section('content')


@include('back.pages.include.card.card-image',[
    'data'=>$categories,
    'describ'=>'describ_categorie',
    'title'=>'label_categorie',
    'relation'=>'subCategories',
    'route'=>'user.regist.sub',

])

@endsection