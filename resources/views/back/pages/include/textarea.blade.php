

@php
    $label ??= null;
    $placeholder ??= $label;
    $class ??= null;
    $name ??= '';
    $attribut ??= '';
    $entity ??= 4;
    $validate ??='';
@endphp



<div @class(['mb-0', $class])>
    <label class="form-label">{{$label.' '}} <i class="text-danger font-size-18">{{$validate}}</i></label>
    <textarea name="{{$name}}" class="form-control" rows="{{$entity}}">
        {{isset($attribut)? $attribut : $placeholder}}
    </textarea>
</div>