@extends('back.layout.super-layout.pages-layout')
@section('titlePage', isset($titlePage) ? $titlePage: 'Crée')

@section('content')


<div class="col-xl-8 mx-auto" >
    <div class="card">
        <div class="card-header">
            <h2>{{$sub_categorie->exists ? 'Modifier ': 'Création '}}des sous categories</h2>

            <p class="text-info">Definir des sous categories pour les produits</p>
        </div>
        <div class="card-body">


            <form id="myForm" action="{{ route($sub_categorie->exists ? 'super.sub-categorie.update' : 'super.sub-categorie.store', $sub_categorie) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method($sub_categorie->exists ? 'PUT' : 'POST')
        
                <div class="mt-4">
                    <h5 class="font-size-24 mb-3">sous categorie de produit</h5>

                    @include('back.pages.include.select.select', [
                        'name'=>'categorie_id',
                        'options'=>$categorieSelected,
                        'label'=>'Categorie',
                        'placeholder'=>'Choisir un Categorie',       
                    ])
        
                    @include('back.pages.include.input', [
                        'label' => 'sous categories',
                        'placeholder' => 'Titre',
                        'name' => 'label_sub_categorie',
                        'id' => 'idInputName',
                        'value' => $sub_categorie->label_sub_categorie,
                    ])
        
                    @include('back.pages.include.input', [
                        'label' => 'Description',
                        'placeholder' => 'Description',
                        'name' => 'describ_sub_categorie',
                        'id' => 'idInputDescrip',
                        'value' => $sub_categorie->describ_sub_categorie,
                    ])
        
                    @include('back.pages.include.input', [
                        'type' => 'file',
                        'label' => 'Image',
                        'placeholder' => 'Image',
                        'name' => 'path_sub_categorie',
                        'id' => 'idInputImage',
                        'value' => $sub_categorie->path_sub_categorie,
                    ])
                </div>
        
                <div class="row justify-content-center card-body">
                    <div class="justify-content-start d-flex col-xl-4">
                        @include('back.pages.include.btn-submit',[
                            'name' => $sub_categorie->exists ? 'Modifier' : 'Ajouter',
                            'class' => 'btn-primary',
                            'id'=>'addButton',
                            'type' => 'submit',
                            'data' => $sub_categorie,
                        ])
                    </div>
                </div>
            </form>

                @if (!$sub_categorie->exists)
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
    
    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="/back/assets_/js/ajax-fetch-add.js"> </script> --}}
@endpush

@endsection




