@extends('back.layout.admin-layout.pages-layout')
@section('titlePage', isset($titlePage) ? $titlePage: 'Crée')

@section('content')


<div class="col-xl-8 mx-auto" >
    <div class="card">
        <div class="card-header">
            <h2>{{$user->exists ? 'Modifier ': 'Création '}}des utilisateurs</h2>

            <p class="text-info">Les personnels du système</p>
        </div>
        <div class="card-body">



            <form id="myForm" action="{{ route($user->exists ? 'admin.user.update' : 'admin.user.store', $user) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method($user->exists ? 'PUT' : 'POST')
        
                <div class="mt-4">
                    <h5 class="font-size-24 mb-3">user du système</h5>
        
                    @include('back.pages.include.input', [
                        'label' => 'Nom',
                        'placeholder' => 'Nom complet',
                        'name' => 'name_user',
                        'value' => $user->name_user,
                    ])
        
                    @include('back.pages.include.input', [
                        'type' => 'email',
                        'label' => 'Email',
                        'placeholder' => 'Adresse Electronique',
                        'name' => 'email',
                        'value' => $user->email,
                    ])

                    @include('back.pages.include.input', [
                        'type' => 'tel',
                        'label' => 'Telephone',
                        'placeholder' => 'Son numero',
                        'name' => 'phone_user',
                        'value' => $user->phone_user,
                    ])
                    @include('back.pages.include.input', [
                        'type' => 'password',
                        'label' => 'Mot de passe',
                        'placeholder' => 'Code secret',
                        'name' => 'password',
                        'value' => $user->password,
                    ])

                    @include('back.pages.include.input', [
                        'type' => 'password',
                        'label' => 'Confirmer',
                        'placeholder' => 'Confirmation de passe',
                        'name' => 'pass_conf',
                        'value' => $user->password,
                    ])

                </div>
        
                <div class="row justify-content-center card-body">

                    <div class="justify-content-start d-flex col-xl-4">
                        <button type="reset" class="w-md btn btn-info" onClick="window.location.href='{{ route('admin.user.index') }}'">Retour</button>
                    </div>


                    <div class="justify-content-start d-flex col-xl-4">
                        @include('back.pages.include.btn-submit',[
                            'name' => $user->exists ? 'Modifier' : 'Ajouter',
                            'class' => 'btn-primary',
                            'id'=>'addButton',
                            'type' => 'submit',
                            'data' => $user,
                        ])
                    </div>


                </div>
            </form>

                @if (!$user->exists)

                <div class="col-xl-12 mt-4">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Liste des ajouts </h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped mb-0" id="dataTable">
                                    <thead>
                                        <tr id="tableHeader">
                                            <!-- Les en-têtes seront ajoutés ici -->
                                        </tr>
                                    </thead>
                                        <tbody id="tableBody">
                                            <!-- Les données seront ajoutées ici -->
                                        </tbody>
                                </table>
                            </div>
                        </div>                  
                     
                    </div>
                </div>

                @endif  
        </div>
    </div>
</div>

@push('scripts')
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="/back/assets_/js/ajax-fetch-add.js"> </script>
@endpush

@endsection




