@php
    $name ??=  '';

    $url ??= null;
@endphp




<div class="container">
    <div class="alert alert-warning text-center" role="alert">
        Attention, êtes-vous sûr de vouloir supprimer <strong class="text-danger">{{ $name }}</strong> ? Cette action est irréversible.
    </div>
    <div class="text-center">
        <button type="reset" class="btn btn-info" onClick="window.location.href='{{ route($url) }}'">Annuler</button>
        <button type="submit" class="btn btn-danger">Supprimer</button>
    </div>
</div>
