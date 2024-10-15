




@if (session('key')==='user')

<li class="nav-item dropdown ms-auto">
    <a class="nav-link dropdown-toggle arrow-none" href="{{route('admin.home')}}" id="topnav-components" role="button">
        <i class="mdi mdi-account-circle"></i>
        <span>Compte Admin</span>
        {{-- <div class="arrow-down"></div> --}}
    </a>
</li>  
@endif