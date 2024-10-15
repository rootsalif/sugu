@php
    $name ??= '';
    $options ??= null;
    // $value ??= '';
    $label ??= '';
    $placeholder ??= $label;
    $validate ??= '';
    $class ??='';
@endphp

<div @class(["row", "mb-4", $class])>
    <label for="horizontal-firstname-input font-size-24" class="col-sm-3 col-form-label">{{ $label }} <i class="text-danger font-size-18">{{$validate}}</i></label>
    <div class="col-sm-9">
        <select class="form-control" placeholder="{{$placeholder}}" name="{{ $name }}" id="{{ $name }}">        
            <option>{{$placeholder}}</option>
            @foreach($options as $k => $v)              
                <option value="{{$k}}">{{$v}}</option>
            @endforeach
            {{-- @selected($value->contains($k)) --}}
        </select>
    </div>
</div>

@error( $name )
<div class="d-block text-danger" style="margin-top:25px; margin-bottom:15px">
    {{ $message }}
</div>
@enderror











    



