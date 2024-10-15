@extends('back.layout.user-layout.pages-layout')
@section('titlePage', isset($titlePage) ? $titlePage: 'Crée')

@section('content')


<div class="col-xl-8 mx-auto" >
    <div class="card">
        <div class="card-header">
            <h2>{{$number->exists ? 'Modifier ': 'Création '}}des numbers</h2>

            <p class="text-info">Definir les number pour les utilisateur du système</p>
        </div>
        <div class="card-body">



            <form id="myForm" action="{{ route($number->exists ? 'user.number.update' : 'user.number.store', $number) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method($number->exists ? 'PUT' : 'POST')
        
                <div class="mt-4">
                    <h5 class="font-size-24 mb-3">number du système</h5>
        
                    @include('back.pages.include.input', [
                        'label' => 'numbers',
                        'placeholder' => 'Pointure Chaussure',
                        'name' => 'label_number',
                        'id' => 'idInputName',
                        'value' => $number->label_number,
                    ])

                    @include('back.pages.include.select.select', [
                        'name'=>'size_id',
                        'options'=>$sizeSelected,
                        'value'=>$number,      
                        'label'=>'Taille chaussure',
                        'placeholder'=>'selectionné un number',       
                    ])
        
        
                    @include('back.pages.include.input', [
                        'type' => 'file',
                        'label' => 'Image',
                        'placeholder' => 'Image',
                        'name' => 'path_number',
                        'id' => 'idInputImage',
                        'value' => $number->path_number,
                    ])
                </div>
        
                <div class="row justify-content-center card-body">

                    <div class="justify-content-start d-flex col-xl-4">
                        @include('back.pages.include.component.btn-return',[
                            'route'=>'user.number.index'
                        ])
    
                    </div>

                    <div class="justify-content-start d-flex col-xl-4">
                        @include('back.pages.include.btn-submit',[
                            'name' => $number->exists ? 'Modifier' : 'Ajouter',
                            'class' => 'btn-primary',
                            'id'=>'addButton',
                            'type' => 'submit',
                            'data' => $number,
                        ])
                    </div>
                </div>
            </form>

                @if (!$number->exists)
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




