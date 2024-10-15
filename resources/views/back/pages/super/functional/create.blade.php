@extends('back.layout.super-layout.pages-layout')
@section('titlePage', isset($titlePage) ? $titlePage: 'Crée')


@section('content')

<div class="col-xl-8 mx-auto" >
    <div class="card">
        <div class="card-header">
            <h2>{{$functional->exists ? 'Modifier ': 'Création '}}des fonctionnalités</h2>
            <p class="text-info">Definir les tache fonctionnelle pour les utilisateur du système</p>
        </div>
        <div class="card-body">

            <form  action="{{ route($functional->exists? 'super.functional.update': 'super.functional.store', $functional) }}" method="POST">
                @csrf
                @method($functional->exists ? 'put': 'post')

                <!-- multi select input Example -->


                <div class="mt-4">
                    <h5 class="font-size-24 mb-3">Fonctionnalité du système</h5>

                            @include('back.pages.include.input', [
                                'label'=>'Fonctionnalités',
                                'placeholder'=> 'Titre',
                                'name'=>'label_functional',
                                'id'=>'idInputName',
                                'value'=> $functional->label_functional,
                            ])

                            @include('back.pages.include.input', [
                                'label'=>'Description',
                                'placeholder'=> 'Description',
                                'name'=>'describ_functional',
                                'id'=>'idInputDescrip',
                                'value'=> $functional->describ_functional,
                            ])

                </div>

                <div class="row justify-content-center card-body">

                    <div class="justify-content-start d-flex col-xl-4">
                        @include('back.pages.include.btn-submit',[
                        'name'=>'Annuler',
                        'class'=>'btn-danger',
                        'id'=>'resetButton',
                        'type'=>'button',
                        'data'=>$functional,
                        ])
                    </div>

                    <div class="justify-content-end d-flex col-xl-4">
                        @include('back.pages.include.btn-submit',[
                        'name'=>$functional->exists ? 'Modifier':'Ajouter',
                        'class'=>'btn-primary',
                        'id'=>$functional->exists ? '':'addButton',
                        'type'=>$functional->exists ? 'submit':'button',
                        'data'=>$functional,
                        ])
                    </div>
                </div>
                @if (!$functional->exists)
                <div class="col-xl-12 mt-4">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Liste des ajouts (<i class="text-danger">Enregistrer les ajouts afin de soumettre les modification</i>)</h4>
                        </div>
                        <div class="card-body">
                            
                            <div class="table-responsive">
                                <table class="table table-striped mb-0" id="itemTable">
        
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Label</th>
                                            <th>Description</th>
                                            <th>Supprimer</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {{-- <tr>
                                            <th scope="row">1</th>
                                            <td>Mark</td>
                                            <td>Otto</td>
                                            <td>@mdo</td>
                                        </tr> --}}
                                    </tbody>
                                </table>
                            </div>
        
                        </div>
                    </div>
                </div>

                <div class="row justify-content-center card-body">
                    <div class="justify-content-end d-flex">
                        @include('back.pages.include.btn-submit',[
                        'name'=>'Enregistrer',
                        'id'=>'subRegist',
                        'class'=>'btn-success',                       
                        'type'=>'submit',
                        'data'=>$functional,
                        ])
                    </div>
                </div>
                @endif
                

               
                
            </form>
        </div>
        <!-- end card body -->
    </div>



    <!-- end row -->
    </div>
    <!-- end card -->
</div>
    @push('scripts')

        {{-- <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>  --}}

        {{-- <script src="/back/assets_/js/add.js"></script>  --}}
        <script src="/back/assets_/js/list-tr.js"></script> 
        
    @endpush

@endsection




