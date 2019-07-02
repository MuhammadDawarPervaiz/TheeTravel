<footer id="footer">
    <div class="footer-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-md-3">
                  <ul class="travel-news">
                      <li>
                          <div class="thumb">
                              <img src="{{ URL::asset('/storage/footer_logo_image/1.jpg') }}" alt="" width="120" height="100" />
                          </div>
                      </li>
                      <li>
                          <div class="thumb">
                              <img src="{{ URL::asset('/storage/footer_logo_image/5.jpg') }}" alt="" width="120" height="100" />
                          </div>
                      </li>
                      <li>
                          <div class="thumb">
                              <img src="{{ URL::asset('/storage/footer_logo_image/2.jpg') }}" alt="" width="300" height="100" style="margin-left: 60px;" />
                          </div>
                      </li>
                  </ul>
                </div>
                <div class="col-sm-6 col-md-3">
                    <ul class="travel-news">
                        <li>
                            <div class="thumb">
                                <img src="{{ URL::asset('/storage/footer_logo_image/3.jpg') }}" alt="" width="120" height="100" />
                            </div>
                        </li>
                        <li>
                            <div class="thumb">
                                <img src="{{ URL::asset('/storage/footer_logo_image/4.png') }}" alt="" width="120" height="100" />
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="col-sm-6 col-md-3">
                    <h2>Mailing List</h2>
                    <p>Sign up for our mailing list to get latest updates and offers.</p>
                    <br />
                    <div class="icon-check">
                        <input type="text" class="input-text full-width" placeholder="your email" />
                    </div>
                    <br />
                    <span>We respect your privacy</span>
                </div>
                <div class="col-sm-6 col-md-3">
                    <h2>About Thee Travel</h2>
                    <p>Theetravels is the subsidiary company of Your Choice Travel & Tours which is working globaly our core objective is customer satisfaction Theetravels is offering Wholesale price to its valuable clients as we bet that our prices are best from the rest of the travel agencies.</p>
                    <br />
                    <address class="contact-details">
                        <a href="tel:001-866-256-6122">
                          <span class="contact-phone"><i class="soap-icon-phone"></i>001-866-256-6122</span>
                        </a>
                        <br />
                        <a href="mailto:inquiry@theetravel.com" target="_top" class="contact-email">inquiry@theetravel.com</a>
                    </address>
                    <ul class="social-icons clearfix" style="margin-left: 30px;">
                        <li class="twitter"><a title="twitter" href="https://twitter.com/TheeTravel" data-toggle="tooltip"><i class="soap-icon-twitter"></i></a></li>
                        <li class="googleplus"><a title="googleplus" href="#" data-toggle="tooltip"><i class="soap-icon-googleplus"></i></a></li>
                        <li class="facebook"><a title="facebook" href="#" data-toggle="tooltip"><i class="soap-icon-facebook"></i></a></li>
                        <li class="linkedin"><a title="linkedin" href="#" data-toggle="tooltip"><i class="soap-icon-linkedin"></i></a></li>
                    </ul>
                </div>
                <center><a class="btn btn-primary" target="_blank" href="{{ route('sitemap') }}">SITE MAP</a></center>
            </div>
        </div>
    </div>
    <div class="bottom gray-area">
        <div class="container">
            <div class="logo pull-left">
                <a href="index.html" title="Thee Travel - home" style="background: url('../images/logo.png') no-repeat 0 0;">
                    <img src="{{ URL::asset('/images/logo.png') }}" alt="Thee Travelo logo" />
                </a>
            </div>
            <div class="pull-right">
                <a id="back-to-top" href="#" class="animated" data-animation-type="bounce"><i class="soap-icon-longarrow-up circle"></i></a>
            </div>
            <div class="copyright pull-right">
                <p> &copy; {{ date('Y') }} <a href="theetravel.com">{{ config('app.name') }}</a>, All rights reserved by <a href="meddytechnology.com">MEDDY TECH</a></p>
            </div>
        </div>
    </div>
</footer>
