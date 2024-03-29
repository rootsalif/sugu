@php
    $label ??= null;
    $placeholder ??= $label;
    $type ??= 'text';
    $class ??= null;
    $name ??= '';
    $value ??= '';
@endphp


<div @class(["row", "mb-4", $class])>
    <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">{{ $label }}</label>
    <div class="col-sm-9">
      <input type="{{ $type }}" name="{{ $name }}" class="form-control @error($name) is-invalid @enderror"
      placeholder="{{ $placeholder }}" value="{{ old($name, $value) }}" id="horizontal-firstname-input">
    </div>
</div>

@error( $name )
<div class="d-block text-danger" style="margin-top:25px; margin-bottom:15px">
    {{ $message }}
</div>
@enderror
