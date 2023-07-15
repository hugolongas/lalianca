<header class="header">
    <nav id="navbar" class="navbar fixed-top navbar-expand-lg">
        <div class="navbar-brand abs">
            <a href="{{ '/' }}" data-target="0">
                <img class="brand-logo" src="{{ asset('img/logo.png') }}" alt="Logo" />
            </a>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsingNavbar">
            <i class="fas fa-bars"></i>
        </button>
        <div class="navbar-collapse collapse" id="collapsingNavbar">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item">
                    <a class="nav-link {{ Request::routeIs('activitats') ? 'active' : '' }}"
                        href="{{ route('activitats') }}">ACTIVITATS</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle {{ Request::routeIs('alianca', 'historia', 'arxiu', 'edifici', 'organitzacio', 'mecenatge') ? 'active' : '' }}"
                        href="{{ route('alianca') }}" data-toggle="dropdown">ALIANÇA</a>                    
                    <ul class="dropdown-menu">
                        <li class="nav-item menu">
                            <a class="nav-item {{ Request::routeIs('historia') ? 'active' : '' }}"
                                href="{{ route('historia') }}">HISTÒRIA &raquo</a>
                            <ul  class="submenu dropdown-menu">
                                <li class="nav-item">
                                    <a class="nav-link {{ Request::routeIs('arxiu') ? 'active' : '' }}"
                                        href="{{ route('arxiu') }}">ARXIU</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ Request::routeIs('edifici') ? 'active' : '' }}"
                                        href="{{ route('edifici') }}">L'EDIFICI</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::routeIs('organitzacio') ? 'active' : '' }}"
                                href="{{ route('organitzacio') }}">ORGANITZACIÓ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::routeIs('mecenatge') ? 'active' : '' }}"
                                href="{{ route('mecenatge') }}">MECENATGE</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::routeIs('seccions') ? 'active' : '' }}" 
                        href="{{ route('seccions') }}" >SECCIONS I GRUPS</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link  dropdown-toggle {{ Request::routeIs('serveis', 'bar', 'padel', 'lloguer') ? 'active' : '' }}"
                        href="{{ route('serveis') }}" data-toggle="dropdown">SERVEIS</a>
                    <ul class="dropdown-menu">
                        <li class="nav-item">
                            <a class="nav-link {{ Request::routeIs('bar') ? 'active' : '' }}"
                                href="{{ route('bar') }}">BAR</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::routeIs('padel') ? 'active' : '' }}"
                                href="{{ route('padel') }}">PÀDEL</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::routeIs('lloguer') ? 'active' : '' }}"
                                href="{{ route('lloguer') }}">Lloguer de sala</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item menu">
                    <a class="nav-link {{ Request::routeIs('socis') ? 'active' : '' }}"
                        href="{{ route('socis') }}">SOCIS</a>
                </li>
                <li class="nav-item menu">
                    <a class="nav-link {{ Request::routeIs('contact') ? 'active' : '' }}"
                        href="{{ route('contact') }}">CONTACTE</a>
                </li>
            </ul>
            <div class="my-2 my-lg-0 nav-item">
                <a class="nav-link" href="https://socis.lalianca.cat/" target="_blank" rel="nofollow"><i
                        class="fa-solid fa-user"></i></a>
            </div>
        </div>
    </nav>
</header>
