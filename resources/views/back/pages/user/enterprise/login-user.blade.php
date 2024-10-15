
@extends('back.layout.enterprise-layout.pages-layout')
@section('titlePage', isset($titlePage) ? $titlePage: 'Role login')

@section('content')




<div class="row">
        
    <!-- Card de connection d'utilisateur -->
        {{-- {{dd(Auth::guard('admin')->user()?->id)}} --}}
        @include('back.pages.include.card.card-login-user',[
            'roles'=>$roles,
            'route'=>'user.role.enterprise.login',
        ])

    
    
  </div>



@endsection
