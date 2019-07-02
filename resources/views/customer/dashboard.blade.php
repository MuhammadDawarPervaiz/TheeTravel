@extends('layouts.admin')

@section("tab-content")
<div id="dashboard" class="tab-pane fade in active">
    <h1 class="no-margin skin-color">Hi {{ Auth::guard('customer')->user()->name }}, Welcome to Thee Travel!</h1>
    <p>All your trips booked with us will appear here and you’ll be able to manage everything!</p>
    <br />
    <div class="row block">
        <div class="col-sm-6 col-md-3">
            <a href="#">
                <div class="fact blue">
                    <div class="numbers counters-box">
                        <dl>
                            <dt class="display-counter" data-value="3200">0</dt>
                            <dd>Hotels to Stay</dd>
                        </dl>
                        <i class="icon soap-icon-hotel"></i>
                    </div>
                    <div class="description">
                        <i class="icon soap-icon-longarrow-right"></i>
                        <span>View Hotels</span>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-sm-6 col-md-3">
            <a href="#">
                <div class="fact yellow">
                    <div class="numbers counters-box">
                        <dl>
                            <dt class="display-counter" data-value="4509">0</dt>
                            <dd>Airlines to Travel</dd>
                        </dl>
                        <i class="icon soap-icon-plane"></i>
                    </div>
                    <div class="description">
                        <i class="icon soap-icon-longarrow-right"></i>
                        <span>View Flights</span>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-sm-6 col-md-3">
            <a href="#">
                <div class="fact red">
                    <div class="numbers counters-box">
                        <dl>
                            <dt class="display-counter" data-value="3250">0</dt>
                            <dd>VIP Transports</dd>
                        </dl>
                        <i class="icon soap-icon-car"></i>
                    </div>
                    <div class="description">
                        <i class="icon soap-icon-longarrow-right"></i>
                        <span>View Cars</span>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-sm-6 col-md-3">
            <a href="#">
                <div class="fact green">
                    <div class="numbers counters-box">
                        <dl>
                            <dt class="display-counter" data-value="1570">0</dt>
                            <dd>Celebrity Cruises</dd>
                        </dl>
                        <i class="icon soap-icon-cruise flip-effect"></i>
                    </div>
                    <div class="description">
                        <i class="icon soap-icon-longarrow-right"></i>
                        <span>View Cruises</span>
                    </div>
                </div>
            </a>
        </div>
    </div>

    <div class="row block">
        <div class="col-md-12 notifications">
            <h2>Notifications</h2>
            <a href="#">
                <div class="icon-box style1 fourty-space">
                    <i class="soap-icon-plane-right takeoff-effect yellow-bg"></i>
                    <span class="time pull-right">JUST NOW</span>
                    <p class="box-title">London to Paris flight in <span class="price">$120</span></p>
                </div>
            </a>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-4">
            <h4>Benefits of Thee Tavel Account</h4>
            <ul class="benefits triangle hover">
                <li><a href="#">Faster bookings with lesser clicks</a></li>
                <li><a href="#">Track travel history &amp; manage bookings</a></li>
                <li class="active"><a href="#">Manage profile &amp; personalize experience</a></li>
                <li><a href="#">Receive alerts &amp; recommendations</a></li>
            </ul>
        </div>
        <div class="col-md-4 previous-bookings image-box style14">
            <h4>Your Previous Bookings</h4>
            <article class="box">
                <figure class="no-padding">
                    <a title="" href="#">
                        <img alt="" src="http://placehold.it/63x59" width="63" height="59">
                    </a>
                </figure>
                <div class="details">
                    <h5 class="box-title"><a href="#">Half-Day Island Tour</a><small class="fourty-space"><span class="price">$35</span> Family Package</small></h5>
                </div>
            </article>
        </div>
        <div class="col-md-4">
            <h4>Need Thee Travel Help?</h4>
            <div class="contact-box">
                <p>We would be more than happy to help you. Our team advisor are 24/7 at your service to help you.</p>
                <address class="contact-details">
                    <span class="contact-phone"><i class="soap-icon-phone"></i> 001-866-256-6122</span>
                    <br>
                    <a class="contact-email" href="#">enquiry@theetravel.com</a>
                </address>
            </div>
        </div>
    </div>
</div>
@endsection
