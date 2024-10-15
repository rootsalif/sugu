@extends('back.layout.user-layout.pages-layout')
@section('titlePage', isset($titlePage) ? $titlePage: 'role')

@section('content')

    @php
        $tables=$articles;
    @endphp

    <div class="row">
        @include('back.pages.include.alert-success')
        <div class="col-xl-4">

                <h4>Ajouter des articles</h4>

        </div>
        <div class="col-xl-4 right">
            <a href="{{ route('user.article.create', $subCategorie) }}">
                @include('back.pages.include.btn-create')
            </a>
        </div>

        @include('back.pages.include.product.upload-image')
    </div>


    {{-- Data table --}}

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Liste des articles</h4>
                </div><!-- end card header -->


                @include('back.pages.include.datatable',$data=[
                    'label_article'=>'Label',
                    'describ_article'=>'Description',                    
                ])

            </div>
        </div>
    </div>

@endsection

