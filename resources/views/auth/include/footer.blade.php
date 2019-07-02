<footer id="footer">
    <div class="footer-wrapper">
        <div class="container">
            <nav id="main-menu" role="navigation" class="inline-block hidden-mobile">
                <ul class="menu">
                    <li class="menu-item-has-children">
                        <a href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="menu-item-has-children">
                        <a href="">Flights</a>
                        <ul class="sub-menu ">
                          @foreach($continents as $continent)
                            <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-658">
                                <a href="/{{ str_replace(' ', '_', $continent->name) }}">{{ $continent->name }}</a>
                            </li>
                          @endforeach
                        </ul>
                    </li>
                    <li id="menu-item-1271" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-1271">
                        <a href="{{ route('faq') }}">Faq's</a>
                        <ul class="sub-menu ">
                        </ul>
                    </li>
                    <li id="menu-item-1305" class="menu-item menu-item-type-post_type menu-item-object-travel_guide menu-item-1305">
                        <a href="{{ route('terms-and-conditions') }}">Terms & Conditions</a>
                    </li>
                    <li id="menu-item-1273" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-1273">
                        <a href="{{ route('about-us') }}">About Us</a>
                    </li>
                    <li id="menu-item-1306" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-1306">
                        <a href="{{ route('contact-us') }}">Contact us</a>
                    </li>
                </ul>
            </nav>
            <div class="copyright">
                <p>&copy; {{ date('Y') }} {{ config('app.name') }}</p>
            </div>
        </div>
    </div>
</footer>
