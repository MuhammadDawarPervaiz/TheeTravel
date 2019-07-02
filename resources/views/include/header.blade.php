<header id="header" class="navbar-static-top">
    <div class="topnav hidden-xs">
        <div class="container">
            <ul class="quick-menu pull-left">
                @if(Auth::guard('customer')->check())
                    <li class="ribbon">
                        <a href="#">{{ Auth::guard('customer')->user()->first_name }}</a>
                        <ul class="menu mini uppercase">
                            <li><a href="{{ route('customer.dashboard') }}" class="location-reload">Dashboard</a></li>
                            <li><a href="{{ route('customer.profile') }}" class="location-reload">Profile</a></li>
                            <li><a href="{{ route('customer.complaintRegistration') }}" class="location-reload">Complaint Registeration</a></li>
                            <li><a href="{{ route('customer.personalDocuments') }}" class="location-reload">Personal Documents</a></li>
                            <li><a href="{{ route('customer.viewDocuments') }}" class="location-reload">View Documents</a></li>
                            <li>
                              <a href="{{ route('customer.logout') }}"
                                  onclick="event.preventDefault();
                                           document.getElementById('customer-logout-form').submit();">
                                  Logout
                              </a>

                              <form id="customer-logout-form" action="{{ route('customer.logout') }}" method="POST" style="display: none;">
                                  {{ csrf_field() }}
                              </form>
                            </li>
                        </ul>
                    </li>
                @else
                    <li><a href="{{ route('customer.login') }}">LOGIN</a></li>
                    <li><a href="{{ url('/register') }}">SIGNUP</a></li>
                @endif
            </ul>
            <ul class="quick-menu pull-right">
                <!-- Authentication Links -->
                @if(Auth::guard('web')->check())
                    <li class="ribbon">
                        <a href="#">{{ Auth::guard('web')->user()->name }}</a>
                        <ul class="menu mini uppercase">
                            <li><a href="{{ route('admin.dashboard') }}" class="location-reload">Dashboard</a></li>
                            <li><a href="{{ route('admin.addFlights') }}" class="location-reload">Add Flights</a></li>
                            <li><a href="{{ route('admin.manageFlights') }}" class="location-reload">Manage Flights</a></li>
                            <li><a href="{{ route('admin.manageBookings') }}" class="location-reload">Manage Booking</a></li>
                            <li><a href="{{ route('admin.manageNews') }}" class="location-reload">Manage News</a></li>
                            <li><a href="{{ route('admin.blogPost') }}" class="location-reload">Add Blog</a></li>
                            <li><a href="{{ route('admin.manageBlogPost') }}" class="location-reload">Manage Blog</a></li>
                            <li><a href="{{ route('admin.customerComlaints') }}" class="location-reload">Complaints</a></li>
                            <li><a href="{{ route('admin.viewCustomers') }}" class="location-reload">Customers</a></li>
                            <li>
                              <a href="{{ route('admin.logout') }}"
                                  onclick="event.preventDefault();
                                           document.getElementById('admin-logout-form').submit();">
                                  Logout
                              </a>

                              <form id="admin-logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                                  {{ csrf_field() }}
                              </form>
                            </li>
                        </ul>
                    </li>
                @endguest
                <!-- Currency
                <li class="ribbon currency">
                    <a href="#" title="">USD</a>
                    <ul class="menu mini">
                        <li><a href="#" title="AUD">AUD</a></li>
                        <li><a href="#" title="BRL">BRL</a></li>
                        <li class="active"><a href="#" title="USD">USD</a></li>
                        <li><a href="#" title="CAD">CAD</a></li>
                        <li><a href="#" title="CHF">CHF</a></li>
                        <li><a href="#" title="CNY">CNY</a></li>
                        <li><a href="#" title="CZK">CZK</a></li>
                        <li><a href="#" title="DKK">DKK</a></li>
                        <li><a href="#" title="EUR">EUR</a></li>
                        <li><a href="#" title="GBP">GBP</a></li>
                        <li><a href="#" title="HKD">HKD</a></li>
                        <li><a href="#" title="HUF">HUF</a></li>
                        <li><a href="#" title="IDR">IDR</a></li>
                    </ul>
                </li>
              -->
            </ul>
        </div>
    </div>

    <div class="main-header">
        <a href="#mobile-menu-01" data-toggle="collapse" class="mobile-menu-toggle">
            Mobile Menu Toggle
        </a>

        <div class="container">
            <div class="logo navbar-brand">
                <a href="{{ route('home') }}" title="TheeTravel - home" style="margin:-12px 0px 10px 0px; background: url('../images/logo.png') no-repeat 0 0;">
                    <img src="{{ url('/images/logo.png') }}" alt="Thee Travel Logo"/>
                </a>
            </div>

            <nav id="main-menu" role="navigation">
                <ul class="menu">
                    <li class="menu-item-has-children">
                        <a href="tel:001-866-256-6122" style="font-size:2em;"><i class="soap-icon-phone"></i>001-866-256-6122</a>
                    </li>
                    <li class="menu-item-has-children">
                        <a href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="menu-item-has-children">
                        <a href="">Flights</a>
                        <ul class="sub-menu ">
                          @foreach($continents as $continent)
                            <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-658">
                                <a href="{{ route('show.continents', str_replace(' ', '_', $continent->name)) }}">{{ $continent->name }}</a>
                            </li>
                          @endforeach
                        </ul>
                    </li>
                    <li id="menu-item-1271" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-1271">
                        <a href="{{ route('blog') }}">Blog</a>
                    </li>
                    <li id="menu-item-1271" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-1271">
                        <a href="{{ route('faq') }}">Faq's</a>
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

            @if($flash = session('message'))
                <div id="flash" class="alert alert-success text-center" role="alert">
                    {{ $flash }}
                </div>
            @endif
            @if($flash = session('exception'))
                <div id="flash" class="alert alert-danger text-center" role="alert">
                    {{ $flash }}
                </div>
            @endif
            @if (count($errors) > 0)
                <div id="flash" class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>

        <nav id="mobile-menu-01" class="mobile-menu collapse">
            <ul id="mobile-primary-menu" class="menu">
                <li class="menu-item-has-children">
                    <a href="{{ route('home') }}">Home</a>
                </li>
                <li class="menu-item-has-children">
                    <a href="">Flights</a>
                    <ul  class="sub-menu">
                        @foreach($continents as $continent)
                          <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-658">
                              <a href="/category/{{ str_replace(' ', '_', $continent->name) }}">{{ $continent->name }}</a>
                          </li>
                        @endforeach
                    </ul>
                </li>
                <li class="">
                    <a href="{{ route('blog') }}">Blog</a>
                </li>
                <li class="">
                    <a href="{{ route('faq') }}">Faq's</a>
                </li>
                <li class="">
                    <a href="{{ route('terms-and-conditions') }}">Terms & Conditions</a>
                </li>
                <li class="">
                    <a href="{{ route('about-us') }}">About Us</a>
                </li>
                <li class="">
                    <a href="{{ route('contact-us') }}">Contact Us</a>
                </li>
            </ul>

            <ul class="mobile-topnav container">
                @if(Auth::guard('customer')->check())
                    <li class="ribbon">
                        <a href="{{ route('customer.dashboard') }}">{{ Auth::guard('customer')->user()->first_name }}</a>
                        <ul class="menu mini uppercase">
                            <li><a href="{{ route('customer.dashboard') }}" class="location-reload">Dashboard</a></li>
                            <li><a href="{{ route('customer.profile') }}" class="location-reload">Profile</a></li>
                            <li><a href="{{ route('customer.complaintRegistration') }}" class="location-reload">Complaint Registeration</a></li>
                            <li><a href="{{ route('customer.personalDocuments') }}" class="location-reload">Personal Documents</a></li>
                            <li>
                              <a href="{{ route('customer.logout') }}"
                                  onclick="event.preventDefault();
                                           document.getElementById('customer-logout-form').submit();">
                                  Logout
                              </a>

                              <form id="customer-logout-form" action="{{ route('customer.logout') }}" method="POST" style="display: none;">
                                  {{ csrf_field() }}
                              </form>
                            </li>
                        </ul>
                    </li>
                @else
                    <li><a href="{{ route('customer.login') }}">LOGIN</a></li>
                    <li><a href="{{ url('/register') }}">SIGNUP</a></li>
                @endif
            </ul>

        </nav>
    </div>
    <!--
    <div id="travelo-signup" class="travelo-signup-box travelo-box">
        <div class="login-social">
            <a href="#" class="button login-facebook"><i class="soap-icon-facebook"></i>Login with Facebook</a>
            <a href="#" class="button login-googleplus"><i class="soap-icon-googleplus"></i>Login with Google+</a>
        </div>
        <div class="seperator"><label>OR</label></div>
        <div class="simple-signup">
            <div class="text-center signup-email-section">
                <a href="#" class="signup-email"><i class="soap-icon-letter"></i>Sign up with Email</a>
            </div>
            <p class="description">By signing up, I agree to Travelo's Terms of Service, Privacy Policy, Guest Refund olicy, and Host Guarantee Terms.</p>
        </div>
        <div class="email-signup">
            <form>
                <div class="form-group">
                    <input type="text" class="input-text full-width" placeholder="first name">
                </div>
                <div class="form-group">
                    <input type="text" class="input-text full-width" placeholder="last name">
                </div>
                <div class="form-group">
                    <input type="text" class="input-text full-width" placeholder="email address">
                </div>
                <div class="form-group">
                    <input type="password" class="input-text full-width" placeholder="password">
                </div>
                <div class="form-group">
                    <input type="password" class="input-text full-width" placeholder="confirm password">
                </div>
                <div class="form-group">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox"> Tell me about Travelo news
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <p class="description">By signing up, I agree to Travelo's Terms of Service, Privacy Policy, Guest Refund Policy, and Host Guarantee Terms.</p>
                </div>
                <button type="submit" class="full-width btn-medium">SIGNUP</button>
            </form>
        </div>
        <div class="seperator"></div>
        <p>Already a Travelo member? <a href="#travelo-login" class="goto-login soap-popupbox">Login</a></p>
    </div>
    <div id="travelo-login" class="travelo-login-box travelo-box">
        <div class="login-social">
            <a href="#" class="button login-facebook"><i class="soap-icon-facebook"></i>Login with Facebook</a>
            <a href="#" class="button login-googleplus"><i class="soap-icon-googleplus"></i>Login with Google+</a>
        </div>
        <div class="seperator"><label>OR</label></div>
        <form>
            <div class="form-group">
                <input type="text" class="input-text full-width" placeholder="email address">
            </div>
            <div class="form-group">
                <input type="password" class="input-text full-width" placeholder="password">
            </div>
            <div class="form-group">
                <a href="#" class="forgot-password pull-right">Forgot password?</a>
                <div class="checkbox checkbox-inline">
                    <label>
                        <input type="checkbox"> Remember me
                    </label>
                </div>
            </div>
        </form>
        <div class="seperator"></div>
        <p>Don't have an account? <a href="#travelo-signup" class="goto-signup soap-popupbox">Sign up</a></p>
    </div>-->
</header>
