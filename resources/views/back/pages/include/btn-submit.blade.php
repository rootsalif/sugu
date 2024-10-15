
@php
    $data ??= null;
    $class ??= 'btn-primary';
    $id ??= '';
    $type ??= '';
    $name ??= '';
@endphp

{{-- <div class="row justify-content-end"> --}}
    <div class="col-3 mx-2">
        <div>
            <button type="{{$type}}" id="{{$id}}" @class(["w-md", "btn", $class])>
             
                    {{$name}}
               
            </button>
        </div>
    </div>
{{-- </div> --}}