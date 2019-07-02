@extends('layouts.master')

@section('pageTitle')
  About Us
@endsection

@section("metaTags")
  <meta name="title" content="" />
  <meta name="keywords" content="" />
  <meta name="description" content="">
@endsection

@section('pageTitleContainer')
    About Us
@endsection

@section('content')
    <section id="content">
        <div class="container">
            <div id="main">
                <div class="large-block image-box style6">
                    <article class="box">
                        <div class="details col-md-12">
                            <h4 class="box-title">Who We Are?</h4>
                            <p>Theetravels is the subsidiary company of Your Choice Travel & Tours which is working globaly our core objective is customer satisfaction Theetravels is offering Wholesale price to its valuable clients as we bet that our prices are best from the rest of the travel agencies.</p>
                        </div>
                    </article>
                    <article class="box">
                        <div class="details col-md-12">
                            <h4 class="box-title">What We Do?</h4>
                            <p>We serve our clients till the issuance of the boarding pass as we facilitate travellers 24/7.We are specialised from U.S.A to all over the World. Send us enquiry and our expert sales team will find out best deal price for you.</p>
                        </div>
                    </article>
                    <article class="box">
                        <div class="details col-md-12">
                            <h4 class="box-title">How Thee Travel Work?</h4>
                            <p>We have experience of 5 years in rendering Air Tickets to passionate travelers from America to Asia,Middleeast,Europe even all over the world.Theetravel warmly welcome to crazy travellers as we know that your trip begins with the provocation of ground plan your journey with THEE TRAVELS.</p>
                        </div>
                    </article>
                </div>

                <div class="row large-block">
                    <div class="col-md-6">
                        <h2>Know More About Us</h2>
                        <div class="toggle-container box" id="accordion1">
                            <div class="panel style1">
                                <h4 class="panel-title">
                                    <a href="#acc1" data-toggle="collapse" data-parent="#accordion1">Contract</a>
                                </h4>
                                <div class="panel-collapse collapse in" id="acc1">
                                    <div class="panel-content">
                                        <p>THEETRAVELS signed contract with more than 450 Airlines and 100,000 hotels are available at our platform so we always offer best bargained price with all the related airlines.As a leading travel agency in travel market we promise that we will give you best options to make your jouney harmoniious.</p>
                                    </div><!-- end content -->
                                </div>
                            </div>

                            <div class="panel style1">
                                <h4 class="panel-title">
                                    <a class="collapsed" href="#acc2" data-toggle="collapse" data-parent="#accordion1">Background</a>
                                </h4>
                                <div class="panel-collapse collapse" id="acc2">
                                    <div class="panel-content">
                                        <p>Theetravels is sister concern company of YOUR CHOICE TRAVEL & TOURS PVT LTD Headoffice is situated in CHICAGO,ILLINOIS,U.S.A. Theetravels is reputed travel agency working globally,with a complex network comprising of a chromatic of compassionate peolple with specific standards,that make theetravels leading corporate entity in travel industry.</p>
                                    </div><!-- end content -->
                                </div>
                            </div>

                            <div class="panel style1">
                                <h4 class="panel-title">
                                    <a class="collapsed" href="#acc3" data-toggle="collapse" data-parent="#accordion1">Goal</a>
                                </h4>
                                <div class="panel-collapse collapse" id="acc3">
                                    <div class="panel-content">
                                        <p>Our aim is to cater our potential travellers with the cheapest available tickets to meet our clients travel requirements,we will use all our resources to find out a fare which should be most probably close to their expected budget.</p>
                                    </div><!-- end content -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h2>Our Core Values</h2>
                        <div class="tab-container">
                            <ul class="tabs">
                                <li><a href="#satisfied-customers" data-toggle="tab">Our Mission</a></li>
                                <li class="active"><a href="#tours-suggestions" data-toggle="tab">Level of Experience</a></li>
                                <li><a href="#careers" data-toggle="tab">Products and Services</a></li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane fade" id="satisfied-customers">
                                    <p>Pay less travel more.we strive to focus on win win situation.Theetravels team will serve you world class service which should be beyond our traveller's expectation.we will work as a skillful,proficient well-organised travel arranger,as we are very responsible travel agent.</p>
                                </div>
                                <div class="tab-pane fade in active" id="tours-suggestions">
                                    <p>We hired IATA certified agents which have minimum experience of 5 years,Furthermore our supervisors are 8 years experienced in corporate sector while managers have minimum of 10 years experience in travel industry.</p>
                                </div>
                                <div class="tab-pane fade" id="careers">
                                    <p>
                                        <h4>Theetravels currently dealing in two core products</h4><br/>
                                        <strong>Flights:</strong> Include all Domestic and International Flights from United States of America to all over the world.<br/><br/>
                                        <strong>Hotels:</strong> Chain of 100,000 worldwide hotels are available at our panel as we are dealing in Standard Rooms,Deluxe Rooms from economy to luxiourious hotels.<br/><br/>
                                        <strong>Benefits:</strong> We just charge 10$ as a service charges,Moreover we will provide you 24/7 Service you can also contact any time after the sale of ticket our customer friendly staff is available all the time to serve you as we focus on CUSTOMER RETENTION policy that is why we are providing world class service to our valuable travellers.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--
                <div class="large-block">
                    <h2>Travelo Dedicated Team</h2>
                    <div class="row image-box style1 team">
                        <div class="col-sm-6 col-md-3">
                            <article class="box">
                                <figure>
                                    <a href="#"><img src="http://placehold.it/270x263" alt="" width="270" height="263" /></a>
                                </figure>
                                <div class="details">
                                    <h4 class="box-title"><a href="#">Jessica Brown<small>Chief Executive</small></a></h4>
                                    <p class="description">Nunc cursus libero purus ac congue arcu cursus ut sed vitae pulvinar massa idporta nequetiam.</p>
                                    <ul class="social-icons clearfix">
                                        <li class="twitter"><a title="twitter" href="#" data-toggle="tooltip"><i class="soap-icon-twitter"></i></a></li>
                                        <li class="googleplus"><a title="googleplus" href="#" data-toggle="tooltip"><i class="soap-icon-googleplus"></i></a></li>
                                        <li class="facebook"><a title="facebook" href="#" data-toggle="tooltip"><i class="soap-icon-facebook"></i></a></li>
                                        <li class="linkedin"><a title="linkedin" href="#" data-toggle="tooltip"><i class="soap-icon-linkedin"></i></a></li>
                                        <li class="vimeo"><a title="vimeo" href="#" data-toggle="tooltip"><i class="soap-icon-vimeo"></i></a></li>
                                        <li class="flickr"><a title="flickr" href="#" data-toggle="tooltip"><i class="soap-icon-flickr"></i></a></li>
                                    </ul>
                                </div>
                            </article>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <article class="box">
                                <figure>
                                    <a href="#"><img src="http://placehold.it/270x263" alt="" width="270" height="263" /></a>
                                </figure>
                                <div class="details">
                                    <h4 class="box-title"><a href="#">David Jackson<small>Director - Hotels</small></a></h4>
                                    <p class="description">Nunc cursus libero purus ac congue arcu cursus ut sed vitae pulvinar massa idporta nequetiam.</p>
                                    <ul class="social-icons clearfix">
                                        <li class="twitter"><a title="twitter" href="#" data-toggle="tooltip"><i class="soap-icon-twitter"></i></a></li>
                                        <li class="googleplus"><a title="googleplus" href="#" data-toggle="tooltip"><i class="soap-icon-googleplus"></i></a></li>
                                        <li class="facebook"><a title="facebook" href="#" data-toggle="tooltip"><i class="soap-icon-facebook"></i></a></li>
                                        <li class="linkedin"><a title="linkedin" href="#" data-toggle="tooltip"><i class="soap-icon-linkedin"></i></a></li>
                                        <li class="vimeo"><a title="vimeo" href="#" data-toggle="tooltip"><i class="soap-icon-vimeo"></i></a></li>
                                        <li class="flickr"><a title="flickr" href="#" data-toggle="tooltip"><i class="soap-icon-flickr"></i></a></li>
                                    </ul>
                                </div>
                            </article>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <article class="box">
                                <figure>
                                    <a href="#"><img src="http://placehold.it/270x263" alt="" width="270" height="263" /></a>
                                </figure>
                                <div class="details">
                                    <h4 class="box-title"><a href="#">Kyle Martin<small>Chief Operating Officer</small></a></h4>
                                    <p class="description">Nunc cursus libero purus ac congue arcu cursus ut sed vitae pulvinar massa idporta nequetiam.</p>
                                    <ul class="social-icons clearfix">
                                        <li class="twitter"><a title="twitter" href="#" data-toggle="tooltip"><i class="soap-icon-twitter"></i></a></li>
                                        <li class="googleplus"><a title="googleplus" href="#" data-toggle="tooltip"><i class="soap-icon-googleplus"></i></a></li>
                                        <li class="facebook"><a title="facebook" href="#" data-toggle="tooltip"><i class="soap-icon-facebook"></i></a></li>
                                        <li class="linkedin"><a title="linkedin" href="#" data-toggle="tooltip"><i class="soap-icon-linkedin"></i></a></li>
                                        <li class="vimeo"><a title="vimeo" href="#" data-toggle="tooltip"><i class="soap-icon-vimeo"></i></a></li>
                                        <li class="flickr"><a title="flickr" href="#" data-toggle="tooltip"><i class="soap-icon-flickr"></i></a></li>
                                    </ul>
                                </div>
                            </article>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <article class="box">
                                <figure>
                                    <a href="#"><img src="http://placehold.it/270x263" alt="" width="270" height="263" /></a>
                                </figure>
                                <div class="details">
                                    <h4 class="box-title"><a href="#">David Robets<small>Founder &amp; Director</small></a></h4>
                                    <p class="description">Nunc cursus libero purus ac congue arcu cursus ut sed vitae pulvinar massa idporta nequetiam.</p>
                                    <ul class="social-icons clearfix">
                                        <li class="twitter"><a title="twitter" href="#" data-toggle="tooltip"><i class="soap-icon-twitter"></i></a></li>
                                        <li class="googleplus"><a title="googleplus" href="#" data-toggle="tooltip"><i class="soap-icon-googleplus"></i></a></li>
                                        <li class="facebook"><a title="facebook" href="#" data-toggle="tooltip"><i class="soap-icon-facebook"></i></a></li>
                                        <li class="linkedin"><a title="linkedin" href="#" data-toggle="tooltip"><i class="soap-icon-linkedin"></i></a></li>
                                        <li class="vimeo"><a title="vimeo" href="#" data-toggle="tooltip"><i class="soap-icon-vimeo"></i></a></li>
                                        <li class="flickr"><a title="flickr" href="#" data-toggle="tooltip"><i class="soap-icon-flickr"></i></a></li>
                                    </ul>
                                </div>
                            </article>
                        </div>
                    </div>
                </div>

                <div class="large-block text-center">
                    <h2>Check our Investors Relations</h2>
                    <p>Nunc cursus libero purus ac congue ar lorem cursus ut sed pulvinar massa idend porta nequetiam</p>
                    <div class="investor-list row">
                        <div class="col-xs-6 col-sm-4 col-lg-2">
                            <div class="travelo-box">
                                <a href="#"><img src="http://placehold.it/160x60" alt=""></a>
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-4 col-lg-2">
                            <div class="travelo-box">
                                <a href="#"><img src="http://placehold.it/160x60" alt=""></a>
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-4 col-lg-2">
                            <div class="travelo-box">
                                <a href="#"><img src="http://placehold.it/160x60" alt=""></a>
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-4 col-lg-2">
                            <div class="travelo-box">
                                <a href="#"><img src="http://placehold.it/160x60" alt=""></a>
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-4 col-lg-2">
                            <div class="travelo-box">
                                <a href="#"><img src="http://placehold.it/160x60" alt=""></a>
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-4 col-lg-2">
                            <div class="travelo-box">
                                <a href="#"><img src="http://placehold.it/160x60" alt=""></a>
                            </div>
                        </div>
                    </div>
                </div>
              -->
            </div>
        </div>
    </section>

@endsection

@section('scripts')
  <!-- Javascript -->
  <script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
  <script type="text/javascript" src="js/jquery.noconflict.js"></script>
  <script type="text/javascript" src="js/modernizr.2.7.1.min.js"></script>
  <script type="text/javascript" src="js/jquery-migrate-1.2.1.min.js"></script>
  <script type="text/javascript" src="js/jquery.placeholder.js"></script>
  <script type="text/javascript" src="js/jquery-ui.1.10.4.min.js"></script>

  <!-- Twitter Bootstrap -->
  <script type="text/javascript" src="js/bootstrap.js"></script>

  <!-- parallax -->
  <script type="text/javascript" src="js/jquery.stellar.min.js"></script>

  <!-- waypoint -->
  <script type="text/javascript" src="js/waypoints.min.js"></script>

  <!-- load page Javascript -->
  <script type="text/javascript" src="js/theme-scripts.js"></script>
  <script type="text/javascript" src="js/scripts.js"></script>
@endsection
