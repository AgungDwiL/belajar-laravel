<header class="navbar">
    <div class="container nav-content">
        <div class="logo">
            <img src="{{ asset('images/Logo/logo eterna.png') }}" alt="Eterna Logo">
        </div>
        <div class="search-box">
            <input type="text" placeholder="Search by Keyword..">
            <button><img onmouseover="this.style.opacity='0.7'" onmouseout="this.style.opacity='1.0'" src="{{ asset('images/Icon/search.png') }}" alt="Search" width="15"></button>
        </div>
        <div class="navigation">
            <ul class="nav-links">
                <li><a class="nav-link" style='{{request()->is('/')? "font-weight:bold":''}}' href="/">Home</a></li>
                <li><a class="nav-link" style='{{request()->is('products')? "font-weight:bold":''}}' href="{{url('products')}}">Products</a></li>
                @guest
                    <li><a class="nav-link" href="login">Login</a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="nav-link dropdown-toggle" onclick="toggleDropdown(event)">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
                            </svg>  
                            {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu">
                            <li style="list-style : none">
                                <a class="dropdown-item" href="logout"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    Sign Out
                                </a>
                                <form id="logout-form" action="logout" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</header>