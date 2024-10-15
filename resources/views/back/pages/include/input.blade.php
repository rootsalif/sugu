@php
    $label ??= null;
    $placeholder ??= $label;
    $type ??= 'text';
    $class ??= null;
    $name ??= '';
    $value ??= '';
    $id ??='';
    $validate ??= '';
@endphp


<div @class(["row", "mb-4", $class])>
    <label for="horizontal-firstname-input font-size-24" class="col-sm-3 col-form-label">{{ $label }} <i class="text-danger font-size-18">{{$validate}}</i></label>
    <div class="col-sm-9">
      <input type="{{ $type }}" name="{{ $name }}" id="{{$id}}" class="form-control @error($name) is-invalid @enderror"
      placeholder="{{ $placeholder }}" value="{{ old($name, $value) }}" id="horizontal-firstname-input">
    </div>
</div>

@error( $name )
<div class="d-block text-danger" style="margin-top:25px; margin-bottom:15px">
    {{ $message }}
</div>
@enderror
