
@php
    $data ??= '';
    $route ??= null;
    $title ??= '';
    $relation ??= '';
    $describ ??= ''
@endphp
@if ($data)

<div class="row">
    <div class="col-xxl-9">
        <div class="row">
            @forelse ($data as $value)                        
            <div class="col-xl-4 col-lg-6">
                <div class="card" style="background-color: #090534;">
                    <a href="{{isset($route)?route($route, $value?->id):'#'}}">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                {{-- <div class="flex-shrink-0 me-3">
                                    <div class="avatar" style="background-image: url('{{$data->urlImage()}}'); background-size: cover; background-position: center; width: 50px; height: 50px; border-radius: 50%;">
                                        <!-- Si nécessaire, ajoutez du contenu ici -->
                                    </div>
                                </div> --}}
                                <div class="flex-grow-1">                                                                      
                                    <h4 class="mb-0"><br><span class="text-info">{{$data?->$title}}</span></h4>
                                    @if ($relation)
                                        <p class="text-muted mb-1">Users: <span class="text-info">{{$data?->$relation->count()}}</span></p>
                                    @endif
                                </div>

                            </div>
                        </div>
                    </a>
                    <!-- end card body -->
                </div>
                <!-- end card -->
            </div>

        @empty

        @endforelse
    </div>
</div>
</div>
                
@else
                <!-- Contenu à afficher si $datas est vide -->

    <div class="col-xl-4 col-lg-6">
        <div class="card" style="background-color: #090534;">
            <a href="{{isset($route)? route($route): '#'}}">
                <div class="card-body">
                    <div class="d-flex align-items-center">

                        <div class="flex-grow-1">                                                                      
                            <h4 class="mb-0"><br><span class="text-info">{{$title}}</span></h4>
                            <p class="text-muted mb-1">{{$describ}}</p>

                        </div>

                    </div>
                </div>
            </a>
            <!-- end card body -->
        </div>
        <!-- end card -->
    </div>
@endif
<!-- end col -->


