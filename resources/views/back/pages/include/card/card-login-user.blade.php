
@php 
  $roles ??= null;
  $route ??= '';
@endphp

<style>
    .card-custom {
      width: 100%;
      height: 400px; /* Ajustez la hauteur selon vos besoins */
      display: flex;
      flex-direction: column;
    }
    .card-custom img {
      height: 200px; /* Ajustez la hauteur de l'image */
      object-fit: cover; /* Pour que l'image remplisse l'espace sans se déformer */
    }
    .card-body-custom {
      flex: 1;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
    }
  </style>
@foreach ($roles as $role)
  <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
    <a href="">
      <div class="card card-custom">
          <img src="{{$role?->urlImage()}}" class="card-img-top" alt="App Image">
          <div class="card-body card-body-custom">
            <h2 class="text-center text-primary">{{$role->label_role}}</h2>
            <p class="card-text text-center">Connecter vous en tant que {{$role->label_role}}.</p>
            <a href="{{route($route, ['role'=>$role])}}" class="btn btn-primary">Connecter</a>
          </div>
      </div>
    </a>
  </div>  
@endforeach
