@extends('back.layout.super-layout.pages-layout')
@section('titlePage', isset($titlePage) ? $titlePage: 'Suprimer')


@section('content')


<form action="{{ route('super.family.destroy', $family) }}" method="POST">
    @csrf
    @method('delete')
    @include('back.pages.include.alert-delete', ['name'=>$family->label_family, 'url'=>'super.family.index'])
    {{-- <div class="container">
        <div class="alert alert-warning text-center" role="alert">
            Attention, êtes-vous sûr de vouloir supprimer <strong class="text-danger">{{ $admin->name_admin }}</strong> ? Cette action est irréversible.
        </div>
        <div class="text-center">
            <button type="reset" class="btn btn-info" onClick="window.location.href='{{ route('super.add') }}'">Annuler</button>
            <button type="submit" class="btn btn-danger">Supprimer</button>
        </div>
    </div> --}}
</form>

</form>

@endsection
