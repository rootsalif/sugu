@php
    $name ??=  '';

    $url ??= null;
    $action ??='Supprimer';
@endphp




<div class="container">
    @if ($action ==='Detache')
        <div class="alert alert-warning text-center" role="alert">
            Attention, êtes-vous sûr de detacher cette role <strong class="text-danger">{{ $name }}</strong> ? Cette action est irréversible.
        </div>
    @else
        <div class="alert alert-warning text-center" role="alert">
            Attention, êtes-vous sûr de supprimer <strong class="text-danger">{{ $name }}</strong> ? Cette action est irréversible.
        </div>
    @endif

    <div class="text-center">
        <button type="reset" class="btn btn-info" onClick="window.location.href='{{ route($url) }}'">Annuler</button>
        <button type="submit" class="btn btn-danger">{{$action}}</button>
    </div>
</div>
