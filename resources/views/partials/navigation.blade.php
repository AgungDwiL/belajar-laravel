<header class="navbar">
    <div class="container nav-content">
        <div class="logo">
            <img src="{{ asset('images/Logo/logo eterna.png') }}" alt="Eterna Logo">
        </div>
        <div class="navigation">
            <ul class="nav-links">
                <li><a class="nav-link" href="/">Home</a></li>
                <li><a class="nav-link" href="{{url('products')}}">Products</a></li>
                <li><a class="nav-link" href="{{url('add-products')}}">Add Products</a></li>
            </ul>
        </div>
        <div class="search-box">
            <input type="text" placeholder="Search by Keyword..">
            <button><img onmouseover="this.style.opacity='0.7'" onmouseout="this.style.opacity='1.0'" src="{{ asset('images/Icon/search.png') }}" alt="Search" width="15"></button>
        </div>
    </div>
</header>