
@php
    $datas ??= '';
@endphp

<div class="row">
    <div class="col-xxl-9">
        <div class="row">
            @forelse ($datas as $data)
                        
                <div class="col-xl-4 col-lg-6">
                    <div class="card" style="background-color: #090534;">
                        <a href="{{route('super.admin.add.family', ['family'=>$data])}}">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0 me-3">
                                        <div class="avatar" style="background-image: url('{{$data->urlImage()}}'); background-size: cover; background-position: center; width: 50px; height: 50px; border-radius: 50%;">
                                            <!-- Si nécessaire, ajoutez du contenu ici -->
                                        </div>
                                    </div>
                                    <div class="flex-grow-1">                                                                      
                                        <h4 class="mb-0">Ajouter l'article<br><span class="text-info">{{$data->label_family }}</span></h4>
                                        <p class="text-muted mb-1">Admins: <span class="text-info">{{$data->admins()->count()}}</span></p>
                                    </div>

                                </div>
                            </div>
                        </a>
                        <!-- end card body -->
                    </div>
                    <!-- end card -->
                </div>

            @empty
                <!-- Contenu à afficher si $datas est vide -->
            @endforelse

            <!-- end col -->
        </div>
    </div>
</div>

