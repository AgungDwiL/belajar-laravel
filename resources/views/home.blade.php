<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PT Eterna Karya Sejahtera</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>
    <!-- Navbar -->
    <header class="navbar">
        <div class="container nav-content">
            <div class="logo">
                <img src="{{ asset('images/Logo/logo eterna.png') }}" alt="Eterna Logo">
            </div>
            <div class="search-box">
                <input type="text" placeholder="Search by Keyword..">
                <button><img src="{{ asset('images/Icon/search.png') }}" alt="Search" width="15"></button>
            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-content container">
            <div class="hero-image">
                <img src="{{ asset('images\Banner\Banner.PNG') }}" alt="Banner">
            </div>
        </div>
    </section>

    <!-- Introduction -->
    <section class="intro container">
        <h1>We are a distributor for factory automation goods and services</h1>
        <p>We are ready and committed to provide the best services for our customers</p>
    </section>

    <!-- Features -->
    <section class="features container">
        <h1>Features</h1>
        <h2>Brand - Categories</h2>
        <div class="feature-grid">
            <div class="feature-item">
                <div class="feature-product">
                    <img src="{{ asset('images\Product\Control Valve.png') }}" alt="Control Valve">
                </div>
                <p>Control Valve</p>
            </div>
            <div class="feature-item">
                <div class="feature-product">
                    <img src="{{ asset('images\Product\Fitting.png') }}" alt="Fitting">
                </div>
                <p>Fitting</p>
            </div>
            <div class="feature-item">
                <div class="feature-product">
                    <img src="{{ asset('images\Product\Tube.png') }}" alt="Tube">
                </div>
                <p>Tube</p>
            </div>
            <div class="feature-item">
                <div class="feature-product">
                    <img src="{{ asset('images\Product\Vacuum Generator, Unitasking.png') }}" alt="Vacuum Generator, Unitasking">
                </div>
                <p>Vacuum Generator, Unitasking</p>
            </div>
            <div class="feature-item">
                <div class="feature-product">
                    <img src="{{ asset('images\Product\Valve.png') }}" alt="Valve">
                </div>
                <p>Valve</p>
            </div>
        </div>
        <button class="view-more">View More</button>
    </section>

    <!-- Footer -->
    <footer>
        <div class="footer-content container">
            
            <!-- Left section: eCommerce info -->
            <div class="footer-left">
                <p>Looking for factory automation goods?</p>
                <p>Visit our E-commerce</p>
                <button class="btn-shop">Tokopedia</button>
                <button class="btn-shop-icon"> <img src="{{ asset('images\Logo\tokopedia.png')}}"></button>
            </div>

            <!-- Right section: company info and contact -->
            <div class="footer-right container">

                <!-- Sub-section: address -->
                <div class="footer-address">
                    <h4>PT Eterna Karya Sejahtera</h4>
                    <p>
                    Jl. Gajah Mada 3-5 Petojo Utara<br>
                    Komplek Duta Merlin Blok C 31-32,<br>
                    Jakarta 13110
                    </p>
                </div>

                <!-- Sub-section: contact and socials -->
                <div class="footer-contact">
                    <p> <i class ="fa-regular fa-envelope"></i>
                        <a href="mailto:support@eterna.co.id">support@eterna.co.id</a>
                    </p>
                    <p><i class="fa-solid fa-phone"></i> (021) 6341749</p>

                    <div class="socialmedia-content container">
                        <a href="#"><img src="{{ asset('images\Logo\facebook.png') }}" alt="Facebook"></a>
                        <a href="#"><img src="{{ asset('images\Logo\instagram.png') }}" alt="Instagram"></a>
                        <a href="#"><img src="{{ asset('images\Logo\linkedin.png') }}" alt="LinkedIn"></a>
                        <a href="#"><img src="{{ asset('images\Logo\youtube.png') }}" alt="Youtube"></a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bottom copyright -->
        <div class="footer-bottom">
            <p>Copyright © 2022 PT Eterna Karya Sejahtera</p>
        </div>
    </footer>
</body>
</html>
