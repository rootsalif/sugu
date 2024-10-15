@php
    $label ??='Retour';
    $class ??='';
    $route ??=''
@endphp



<button type="reset" class="btn btn-info" onClick="window.location.href='{{ route($route) }}'">{{$label}}</button>
