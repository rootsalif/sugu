@extends('back.layout.admin-layout.pages-layout')
@section('titlePage', isset($titlePage) ? $titlePage: 'Déttache')


@section('content')


<form action="{{ route('admin.user.storeDetach.role', ['role'=>$role, 'user'=>$user]) }}" method="POST">
    @csrf
    @method('put')
    @include('back.pages.include.alert-delete', ['name'=>$role->label_role,'action'=>'Detache', 'url'=>'admin.user.role'])

</form>

@push('scripts')
    
    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="/back/assets_/js/ajax-fetch-add.js"> </script> --}}
@endpush
@endsection
