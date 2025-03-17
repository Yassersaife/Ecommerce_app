<header class="header">
    <div class="container">
        <div class="row align-items-center">
            <!-- شعار الموقع -->
            <div class="col-lg-3 col-md-3">
                <div class="header__logo">
                    <a href="{{ route('front.index') }}">
                        <img src="{{ asset('logo.png') }}" alt="Logo" width="150">
                    </a>
                </div>
            </div>
            <!-- قائمة التنقل -->
            <div class="col-lg-6 col-md-6">
                <nav class="header__menu mobile-menu">
                    <ul class="nav-list">
                        <li class="@yield('home_active')"><a href="{{ route('front.index') }}">Home</a></li>
                        <li class="@yield('shop_active')"><a href="{{ route('front.shop') }}">Shop</a></li>
                        <li class="@yield('about_active')"><a href="{{ route('front.about') }}">About Us</a></li>
                        <li class="@yield('contact_active')"><a href="{{ route('front.contact') }}">Contact Us</a></li>
                    </ul>
                </nav>
            </div>
            <!-- خيارات التصفح -->
            <div class="col-lg-3 col-md-3">
                <div class="header__nav__option d-flex justify-content-end">
                    <a href="#" class="search-switch" aria-label="Search">
                        <img src="{{ asset('assets-front/img/icon/search.png') }}" alt="Search Icon">
                    </a>
                    <a href="#" aria-label="Favorites">
                        <img src="{{ asset('assets-front/img/icon/heart.png') }}" alt="Favorites Icon">
                    </a>
                    <a href="#" aria-label="Shopping Cart" class="position-relative">
                        <img src="{{ asset('assets-front/img/icon/cart.png') }}" alt="Cart Icon">
                        <span class="cart-count">0</span>
                    </a>
                </div>
            </div>
        </div>
        <!-- زر القائمة (للهواتف المحمولة) -->
       <!-- زر القائمة (للهواتف المحمولة) -->
<div class="canvas__open d-lg-none">
    <button class="menu-toggle" aria-label="Toggle Navigation">
        <i class="fa fa-bars"></i>
    </button>
</div>

</header>
