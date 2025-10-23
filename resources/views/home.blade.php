
@extends('layouts.app')

@section('page-title', 'Home')

@section('content')
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
        @include('partials.product-container')
        <button class="view-more"> <a href="\products" style="text-decoration:none; color:white"> More </a></button>
    </section>

    <!-- Footer -->
    <footer>
        <div class="footer-content container">
            
            <!-- Left section: eCommerce info -->
            <div class="footer-left">
                <p>Looking for factory automation goods?</p>
                <p>Visit our E-commerce</p>
                <button class="btn-shop"><a href="https://www.tokopedia.com/eternaks" style="text-decoration: none; color:white" target="_blank">Tokopedia</a></button>
                <button class="btn-shop-icon"><a href="https://www.tokopedia.com/eternaks" target="_blank"><img src="{{ asset('images\Logo\tokopedia.png')}}"></a></button>
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
    </footer>
@endsection

</body>
</html>
