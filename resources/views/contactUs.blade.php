@extends('layouts.master')

@section('pageTitle')
    Contact Us
@endsection

@section("metaTags")
  <meta name="title" content="" />
  <meta name="keywords" content="" />
  <meta name="description" content="">
@endsection

@section('pageTitleContainer')
    Contact Us
@endsection

@section('content')
<section id="content">
    <div class="container">
        <div id="main">
            <div class="travelo-google-map block"></div>
            <div class="row">
                <div class="col-sm-4 col-md-3">
                    <div class="travelo-box contact-us-box">
                        <h4>Contact us</h4>
                        <ul class="contact-address">
                            <li class="address">
                                <i class="soap-icon-address circle"></i>
                                <h5 class="title">Address</h5>
                                <p>4106 Liberty Boulevard Chicago Illinois USA</p>
                            </li>
                            <li class="phone">
                                <i class="soap-icon-phone circle"></i>
                                <h5 class="title">Phone</h5>
                                <p>Local: 001-866-256-6122</p>
                            </li>
                            <li class="email">
                                <i class="soap-icon-message circle"></i>
                                <h5 class="title">Email</h5>
                                <a href="mailto:inquiry@theetravel.com" target="_top" class="contact-email">inquiry@theetravel.com</a>
                            </li>
                        </ul>
                        <ul class="social-icons full-width">
                            <li><a href="https://twitter.com/TheeTravel" data-toggle="tooltip" title="Twitter"><i class="soap-icon-twitter"></i></a></li>
                            <li><a href="#" data-toggle="tooltip" title="GooglePlus"><i class="soap-icon-googleplus"></i></a></li>
                            <li><a href="#" data-toggle="tooltip" title="Facebook"><i class="soap-icon-facebook"></i></a></li>
                            <li><a href="#" data-toggle="tooltip" title="Linkedin"><i class="soap-icon-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-8 col-md-9">
                    <div class="travelo-box">
                        <form class="" action="{{ route('postContactUs')}}" method="post">
                            {{ csrf_field() }}
                            <h4 class="box-title">Send us a Message</h4>
                            <div class="alert small-box" style="display: none;"></div>
                            <div class="row form-group">
                                <div class="col-xs-6{{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label>Your Name</label>
                                    <input type="text" name="name" class="input-text full-width" value="{{ old('name') }}" required>
                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="col-xs-6{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label>Your Email</label>
                                    <input type="email" name="email" class="input-text full-width" value="{{ old('email') }}" required>
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('message') ? ' has-error' : '' }}">
                                <label>Your Message</label>
                                <textarea name="message" rows="6" class="input-text full-width" placeholder="write message here" required></textarea>
                                @if ($errors->has('message'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('message') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <button type="submit" class="btn-large full-width">SEND MESSAGE</button>
                        </form>
                    </div>
                </div>
            </div>

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

<!-- Google Map Api -->
<script type='text/javascript' src="http://maps.google.com/maps/api/js?sensor=false&amp;language=en"></script>
<script type="text/javascript" src="js/gmap3.min.js"></script>

<!-- parallax -->
<script type="text/javascript" src="js/jquery.stellar.min.js"></script>

<!-- waypoint -->
<script type="text/javascript" src="js/waypoints.min.js"></script>

<!-- load page Javascript -->
<script type="text/javascript" src="js/theme-scripts.js"></script>
<script type="text/javascript" src="js/contact.js"></script>
<script type="text/javascript">
    tjq(".travelo-google-map").gmap3({
        map: {
            options: {
                center: [41.8115491, -87.9832494],
                zoom: 15
            }
        },
        marker:{
            values: [
                {latLng:[41.8115491, -87.9832494], data:"USA"}

            ],
            options: {
                draggable: false
            },
        }
    });
</script>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-108225565-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-108225565-1');
</script>

@endsection
