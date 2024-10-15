@php
    $label ??= null;
    $placeholder ??= $label;
    $type ??= 'text';
    $class ??= null;
    $name ??= '';
    $value ??= '';
@endphp

    <div @class(["mb-3", $class])>
        <label for="choices-text-unique-values" class="form-label font-size-13 text-muted">
            {{$label}}
        </label>
        <input class="form-control custom" id="choices-text-unique-values" name="{{$name}}" type="{{$type}}"
            value="{{ old($name, $value) }}" placeholder="{{$placeholder}}"
            />
    </div>

@error( $name )
    <div class="d-block text-danger" style="margin-top:25px; margin-bottom:15px">
        {{ $message }}
    </div>
@enderror
