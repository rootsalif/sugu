@extends('back.layout.super-layout.pages-layout')
@section('titlePage', isset($titlePage) ? $titlePage: 'Article')

@section('content')

    @php
        $tables=$admins;
    @endphp

<div class="row">
    <div class="col-xxl-9">

    <div class="row">
        @include('back.pages.include.alert-success')
        <div class="col-xl-8">
                <h4>Ajouter des articles <span class="text-info">{{$family->label_family}}</span> au utilisateur du système</h4>
        </div>
        <form method="POST" action="{{route('super.admin.store.family', ['family'=>$family->id])}}">
            @csrf
            @method('post')
            <div class="mt-4 col-xl-8">
                @include('back.pages.include.select.select', [
                    'name'=>'admin_id',
                    'options'=>$adminSelected,
                    'value'=>$family,      
                    'label'=>'Nom d\'utilisateur',
                    'placeholder'=>'Attrubier l\'article',       
                ])
            </div>

            <div class="row justify-content-center card-body">

                <div class="justify-content-start d-flex col-xl-4">
                    @include('back.pages.include.component.btn-return',[
                        'route'=>'super.family.add.index'
                    ])

                </div>

                <div class="justify-content-start d-flex col-xl-4">
                    @include('back.pages.include.btn-submit',[
                        'name' => 'Ajouter',
                        'class' => 'btn-primary',
                        'type' => 'submit',
                    ])
                </div>
            </div>

            


            
        </form>
    </div>
    


    </div>


    {{-- Data table --}}

    <div class="row mt-4">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Liste des articles</h4>
                </div><!-- end card header -->


                @include('back.pages.include.table.desable',[$data=[
                    'name_admin'=>'Nom',
                    'email'=>'Email',                     
                ], 'add'=>'Action', 'role'=>$family->label_family])

            </div>
        </div>
    </div>

@endsection
