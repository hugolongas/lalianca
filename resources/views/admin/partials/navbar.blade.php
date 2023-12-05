<nav id="navbar-top" class="navbar navbar-expand navbar-dark bg-dark fixed-top nav-top">
<a class="navbar-brand" href="{{route('home')}}" target="_blank">
        <img class="brand-logo img-fluid logo-ohfit" src="{{ asset('img/logo.png') }}" alt="Logo"/>
    </a>    
    <!-- Navbar -->
    <ul class="user-options navbar-nav ml-auto">
        <li class="nav-item">                
            <a class="nav-link" href="#" id="userDropdown" role="button" data-toggle="dropdown"
             aria-haspopup="true" aria-expanded="false">
            <div class="soci-name">
                {{Auth::user()->name}}                    
                <i class="fa fa-caret-down" aria-hidden="true"></i>
            </div>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
            <div class="dropdown-item">
                <form action="{{ url('/logout') }}" method="POST" >
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-link nav-link text-black">
                        Cerrar Sesion
                    </button>
                </form>
            </div>
            <div class="dropdown-item">
                <li class="nav-item {{ Request::routeIs('admin.users') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('admin.users') }}">
                        <div class="aside-item">Usuaris</div>
                    </a>
                </li>     
            </div>
        </div>
      </li>
    </ul>    
  </nav>