<ul class="nav flex-column sidebar-menu">    
    <li class="nav-item {{ Request::routeIs('admin.home') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.home') }}">
            <div class="aside-item">General</div>
        </a>
    </li>  
    <li class="nav-item {{ Request::routeIs('admin.portada') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.portada') }}">
            <div class="aside-item">Portada</div>
        </a>
    </li>     
 
    <li class="nav-item {{ Request::routeIs('admin.categories') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.categories') }}">
            <div class="aside-item">Categories</div>
        </a>
    </li>     

    <li class="nav-item {{ Request::routeIs('admin.activitats') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.activitats') }}">
            <div class="aside-item">Activitats</div>
        </a>
    </li>     
</ul>