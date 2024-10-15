@extends('back.layout.admin-layout.pages-layout')
@section('titlePage', isset($titlePage) ? $titlePage: 'role')

@section('content')

    @php
        $tables=$users;
    @endphp

<div class="row">
    <div class="col-xxl-9">

    <div class="row">
        @include('back.pages.include.alert-success')
        <div class="col-xl-8">
                <h4>Ajouter des roles <span class="text-info">{{$role->label_role}}</span> au utilisateur du système</h4>
        </div>
        <form method="POST" action="{{route('admin.user.store.role', ['role'=>$role->id])}}">
            @csrf
            @method('post')
            <div class="mt-4 col-xl-8">
                @include('back.pages.include.select.select', [
                    'name'=>'user_id',
                    'options'=>$userSelected,
                    'value'=>$role,      
                    'label'=>'Nom d\'utilisateur',
                    'placeholder'=>'Attrubier le role',       
                ])
            </div>

            <div class="row justify-content-center card-body">

                <div class="justify-content-start d-flex col-xl-4">
                    @include('back.pages.include.component.btn-return',[
                        'route'=>'admin.user.role'
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
                    <h4 class="card-title">Liste des roles</h4>
                </div><!-- end card header -->


                @include('back.pages.include.table.desable',[$data=[
                    'name_user'=>'Nom',
                    'email'=>'Email',                     
                ], 'add'=>'Action', 'role'=>$role->label_role])

            </div>
        </div>
    </div>

@endsection
