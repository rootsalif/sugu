@extends('back.layout.super-layout.pages-layout')
@section('titlePage', isset($titlePage) ? $titlePage: 'Déttache')


@section('content')


<form action="{{ route('super.admin.storeDetach.family', ['family'=>$family, 'admin'=>$admin]) }}" method="POST">
    @csrf
    @method('put')
    @include('back.pages.include.alert-delete', ['name'=>$family->label_family,'action'=>'Detache', 'url'=>'super.admin.family'])

</form>

@push('scripts')
    
    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="/back/assets_/js/ajax-fetch-add.js"> </script> --}}
@endpush
@endsection
