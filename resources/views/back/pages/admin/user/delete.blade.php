@extends('back.layout.admin-layout.pages-layout')
@section('titlePage', isset($titlePage) ? $titlePage: 'Suprimer')


@section('content')


<form id="myForm" action="{{ route('admin.user.destroy', $user) }}" method="POST">
    @csrf
    @method('delete')
    @include('back.pages.include.alert-delete', ['name'=>$user->name_user, 'url'=>'admin.user.index'])

</form>

@push('scripts')
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="/back/assets_/js/ajax-fetch-add.js"> </script>
@endpush
@endsection
