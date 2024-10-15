@extends('back.layout.user-layout.pages-layout')
@section('titlePage', isset($titlePage) ? $titlePage: 'Suprimer')


@section('content')


<form action="{{ route('user.modele.destroy', $modele) }}" method="POST">
    @csrf
    @method('delete')
    @include('back.pages.include.alert-delete', ['name'=>$modele->label_modele, 'url'=>'user.modele.index'])
    {{-- <div class="container">
        <div class="alert alert-warning text-center" role="alert">
            Attention, êtes-vous sûr de vouloir supprimer <strong class="text-danger">{{ $admin->name_admin }}</strong> ? Cette action est irréversible.
        </div>
        <div class="text-center">
            <button type="reset" class="btn btn-info" onClick="window.location.href='{{ route('user.add') }}'">Annuler</button>
            <button type="submit" class="btn btn-danger">Supprimer</button>
        </div>
    </div> --}}
</form>

</form>

@endsection
