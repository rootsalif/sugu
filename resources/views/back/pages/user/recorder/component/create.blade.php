@extends('back.layout.user-layout.pages-layout')
@section('titlePage', isset($titlePage) ? $titlePage: 'Crée')

@section('content')


<div class="col-xl-8 mx-auto" >
    <div class="card">
        <div class="card-header">
            <h2>{{$component->exists ? 'Modifier ': 'Création '}}des components</h2>

            <p class="text-info">Definir les component pour les utilisateur du système</p>
        </div>
        <div class="card-body">



            <form id="myForm" action="{{ route($component->exists ? 'user.component.update' : 'user.component.store', $component) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method($component->exists ? 'PUT' : 'POST')
        
                <div class="mt-4">
                    <h5 class="font-component-24 mb-3">component du système</h5>
        
                    @include('back.pages.include.input', [
                        'label' => 'components',
                        'placeholder' => 'Titre',
                        'name' => 'label_component',
                        'id' => 'idInputName',
                        'value' => $component->label_component,
                    ])        
                
                </div>
        
                <div class="row justify-content-center card-body">

                    <div class="justify-content-start d-flex col-xl-4">
                        @include('back.pages.include.component.btn-return',[
                            'route'=>'user.component.index'
                        ])
    
                    </div>

                    <div class="justify-content-start d-flex col-xl-4">
                        @include('back.pages.include.btn-submit',[
                            'name' => $component->exists ? 'Modifier' : 'Ajouter',
                            'class' => 'btn-primary',
                            'id'=>'addButton',
                            'type' => 'submit',
                            'data' => $component,
                        ])
                    </div>
                </div>
            </form>

                @if (!$component->exists)
                <div class="col-xl-12 mt-4">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Liste des ajouts (<i class="text-danger">Enregistrer les ajouts afin de soumettre les modification</i>)</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped mb-0" id="dataTable">
                                    <thead>
                                        <tr id="tableHeader">
                                            <!-- Les en-têtes seront ajoutés ici -->
                                        </tr>
                                    </thead>
                                        <tbody id="roleList">
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
    {{-- <script src="/back/assets_/js/add-form.js"></script> --}}
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="/back/assets_/js/ajax-fetch-add.js"> </script>
@endpush

@endsection




