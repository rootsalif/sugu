

@php
    $data ??= null;
    $title ??= 'Titre';
    $describ ??= 'Description';
    $relation ??= 'subCategories';
    $textCount ??= 'Sous Categorie ';
    $route ??= ''
@endphp

<div class="row">
    @if ($data !== null)
    @foreach ($data as $value)
    
        <div class="col-lg-4">
            <a href="{{route($route, $value->id)}}">
            <div class="card">
                <!-- Image ajustée pour être visible -->
                <img class="card-img img-fluid" style="object-fit: cover; height: 300px; width: 100%;" src="{{$value?->urlImage()}}" alt="Card image">
                
                <!-- Overlay avec une couleur d'arrière-plan -->
                <div class="card-img-overlay d-flex flex-column justify-content-center align-items-center" style="background-color: rgba(0, 0, 0, 0.5);">
                    <!-- Agrandir et centrer le titre avec un fond sous le texte -->
                    <h4 class="card-title text-white fw-bold text-center display-5 p-2" style="background-color: rgba(255, 255, 255, 0.2); border-radius: 5px;">{{$value?->$title}}</h4>
                    <!-- Agrandir la description avec un fond sous le texte -->
                    <p class="card-text text-white mt-3 fs-5 text-center p-2" style="background-color: rgba(255, 255, 255, 0.2); border-radius: 5px;">{{$value?->$describ}}</p>
                    @if ($value?->$relation?->count())

                        <p class="card-text text-center p-2" style="background-color: rgba(255, 255, 255, 0.2); border-radius: 5px;">
                            <small class="text-white">{{$textCount.'N: '. $value?->$relation?->count()}}</small>

                        </p>
                    @endif

                </div>
            </div>
            </a>
        </div>
   
    
    
    @endforeach

    @else
    {{-- <div class="col-lg-4">
        <div class="card shadow-sm">
            <!-- En-tête du titre avec background color info -->
            <div class="card-header bg-info text-white text-center py-3">
                <h4 class="fw-bold mb-0">{{$value?->$title}}</h4>
            </div>
            <!-- Contenu de la carte -->
            <div class="card-body">
                <p class="card-text">
                    {{$value?->$describ}}
                </p>
                <p class="card-text">
                    <small>{{$textCount. $value?->$relation?->count()}}</small>
                </p>
            </div>
        </div>
    </div> --}}
    
    @endif


</div>
<!-- end row -->