<ul class="nav flex-column sidebar-menu">    
    <li class="nav-item {{ Request::routeIs('admin.home') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.home') }}">
            <div class="aside-item">General</div>
        </a>
    </li>    
    <li class="nav-item {{ Request::routeIs('admin.activitats') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.activitats') }}">
            <div class="aside-item">Activitats</div>
        </a>
    </li>     
</ul>