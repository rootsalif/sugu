


<ul class="navbar-nav">   
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle arrow-none" href="{{route('user.role.accueil')}}" id="topnav-dashboard" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="icon nav-icon" data-eva="grid-outline"></i>
            <span >Accueil</span>
            {{-- <div class="arrow-down"></div> --}}
        </a>                                 
    </li>

    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle arrow-none" href="{{route('user.regist.detail')}}" id="topnav-components" role="button">
            <i class="icon nav-icon" data-eva="archive-outline"></i>
            <span>Détails Articles</span>
            {{-- <div class="arrow-down"></div> --}}
        </a>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle arrow-none" href="{{route('user.regist.categorie')}}" id="topnav-components" role="button">
            <i class="icon nav-icon" data-eva="archive-outline"></i>
            <span>Enregistrement</span>
            {{-- <div class="arrow-down"></div> --}}
        </a>
    </li>


    
    @include('back.layout.user-layout.include.back-compt')

</ul>



