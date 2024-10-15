
@php
    $title ??= 'Titre';
    $describ ??= null;
@endphp

<div class="col">
    <h2 class="text-center bg-gradient p-3">{{$title}}</h2>
</div>
@if($describ)
    <div class="col my-2">
        <h4 class="text-info text-center">{{$describ}}</h4>
    </div>
@endif

<style>
    .bg-gradient {
        background: linear-gradient(to left, #17a2b8, #007bff); /* Dégradé de droite à gauche */
        color: white;
    }
</style>