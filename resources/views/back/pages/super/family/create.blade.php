@extends('back.layout.super-layout.pages-layout')
@section('titlePage', isset($titlePage) ? $titlePage: 'Crée')

@section('content')


<div class="col-xl-8 mx-auto" >
    <div class="card">
        <div class="card-header">
            <h2>{{$family->exists ? 'Modifier ': 'Création '}}des familles</h2>

            <p class="text-info">Definir des familles pour les produits</p>
        </div>
        <div class="card-body">

            {{-- <form id="myForm" action="{{ route($family->exists? 'super.family.update': 'super.family.store', $family) }}" method="POST" enctype="multipart/form-data">

                @csrf
                @method($family->exists ? 'put': 'post')

                <div class="mt-4">
                    <h5 class="font-size-24 mb-3">family du système</h5>

                    @include('back.pages.include.input', [
                        'label'=>'familys',
                        'placeholder'=> 'Titre',
                        'name'=>'label_family',
                        'id'=>'idInputName',
                        'value'=> $family->label_family,
                    ])

                    @include('back.pages.include.input', [
                        'label'=>'Description',
                        'placeholder'=> 'Description',
                        'name'=>'describ_family',
                        'id'=>'idInputDescrip',
                        'value'=> $family->describ_family,
                    ])

                    @include('back.pages.include.input', [
                        'type'=>'file',
                        'label'=>'Image',
                        'placeholder'=> 'Image',
                        'name'=>'path_family',
                        'id'=>'idInputImage',
                        'value'=> $family->path_family,
                    ])
                </div>



                <div class="row justify-content-center card-body">
                    <div class="justify-content-start d-flex col-xl-4">
                        @include('back.pages.include.btn-submit',[
                            'name'=>$family->exists ? 'Modifier':'Ajouter',
                            'class'=>'btn-primary',
                            'type'=>'submit',
                            'data'=>$family,
                            ])
                    </div>

               
                </div>  
            </form> --}}

            <form id="myForm" action="{{ route($family->exists ? 'super.family.update' : 'super.family.store', $family) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method($family->exists ? 'PUT' : 'POST')
        
                <div class="mt-4">
                    <h5 class="font-size-24 mb-3">famille de produit</h5>
        
                    @include('back.pages.include.input', [
                        'label' => 'familles',
                        'placeholder' => 'Titre',
                        'name' => 'label_family',
                        'id' => 'idInputName',
                        'value' => $family->label_family,
                    ])
        
                    @include('back.pages.include.input', [
                        'label' => 'Description',
                        'placeholder' => 'Description',
                        'name' => 'describ_family',
                        'id' => 'idInputDescrip',
                        'value' => $family->describ_family,
                    ])
        
                    @include('back.pages.include.input', [
                        'type' => 'file',
                        'label' => 'Image',
                        'placeholder' => 'Image',
                        'name' => 'path_family',
                        'id' => 'idInputImage',
                        'value' => $family->path_family,
                    ])
                </div>
        
                <div class="row justify-content-center card-body">
                    <div class="justify-content-start d-flex col-xl-4">
                        @include('back.pages.include.btn-submit',[
                            'name' => $family->exists ? 'Modifier' : 'Ajouter',
                            'class' => 'btn-primary',
                            'id'=>'addButton',
                            'type' => 'submit',
                            'data' => $family,
                        ])
                    </div>
                </div>
            </form>

                @if (!$family->exists)
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
                                        <tbody id="familyList">
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




