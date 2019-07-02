@extends('layouts.master')

@section('pageTitle')
Home
@endsection

@section("metaTags")
  <meta name="title" content="" />
  <meta name="keywords" content="" />
  <meta name="description" content="">
@endsection

@section("currentPageStyles")
<link rel="stylesheet" type="text/css" href="{{ URL::asset('components/revolution_slider/css/settings.css') }}" media="screen" />
<link rel="stylesheet" type="text/css" href="{{ URL::asset('components/revolution_slider/css/style.css') }}" media="screen" />
<link rel="stylesheet" type="text/css" href="{{ URL::asset('components/jquery.bxslider/jquery.bxslider.css') }}" media="screen" />
<link rel="stylesheet" type="text/css" href="{{ URL::asset('components/flexslider/flexslider.css') }}" media="screen" />
@endsection

@section("slider")

@include("include.slider")

@endsection

@section("content")
<section id="content">
  <div class="search-box-wrapper">
    <div class="search-box container">
      <ul class="search-tabs clearfix">
        @foreach($continents as $continent)
        <li class="active">
          <a href="{{ route('show.continents', str_replace(' ', '_', $continent->name)) }}">{{ $continent->name }}</a>
        </li>
        @endforeach
      </ul>
      <div class="visible-mobile">
        <ul id="mobile-search-tabs" class="search-tabs clearfix">
          @foreach($continents as $continent)
          <li class="active">
            <a href="{{ route('show.continents', str_replace(' ', '_', $continent->name)) }}">{{ $continent->name }}</a>
          </li>
          @endforeach
        </ul>
      </div>
      <div class="search-tab-content">
        <div class="tab-pane fade active in" id="flights-tab">
          <form action="{{ route('search') }}">
            <div class="row">
              <div class="col-md-4">
                <div class="row">
                  <div class="col-md-2">
                    <h4 class="title">Where</h4>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Leaving From</label>
                      <input type="text" class="input-text full-width" placeholder="Flying From" name="leaving_from" required/>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Going To</label>
                      <input type="text" class="input-text full-width" placeholder="Flying to" name="going_to" required/>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-3">
                <div class="row">
                  <div class="col-md-2">
                    <h4 class="title">How</h4>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <label>Airline</label>
                    <div class="form-group row">
                      <div class="selector">
                        <select class="full-width" name="airline">
                          <option value="">Choose airline</option>
                          @foreach($airlines as $airline)
                          <option value="{{ $airline->id }}">{{ $airline->name }}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-3">
                <div class="row">
                  <div class="col-md-2">
                    <h4 class="title">Which</h4>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <label>Class</label>
                    <div class="form-group row">
                      <div class="selector">
                        <select class="full-width" name="class">
                          <option value="">Choose Category</option>
                          @foreach($classes as $class)
                          <option value="{{ $class->id }}">{{ $class->name }}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-2">
                <div class="row">
                  <div class="col-md-2">
                    <h4 class="title"></h4>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group row">
                      <label>&nbsp;</label>
                      <button class="full-width icon-check">SERACH NOW</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <div class="container section">
    <h2>Best Flight Offers</h2>
    <div class="row image-box listing-style1 flight">
      @foreach ($routes as $route)
      <div class="col-sm-6 col-md-3">
        <article class="box">
          <figure class="animated" data-animation-type="fadeInDown">
            <span style="height:100px;"><img alt="{{ $route->airline_name }}" src="{{ URL::asset('/' . $route->airline_image) }}"></span>
          </figure>
          <div class="details">
            <span class="price"><small>@if($flag) Excluding @else Including @endif Taxes</small>${{ $route->price }}</span>
            <h4 class="box-title">{{ $route->city }}<small>Call Now To Book<br/> 001-866-256-6122 </small></h4>
            <div class="time">
              <div class="take-off">
                <div class="icon"><i class="soap-icon-plane-right yellow-color"></i></div>
                <div>
                  <span class="skin-color">Fly From</span><br>{{ $route->from }}
                </div>
              </div>
              <div class="landing">
                <div class="icon"><i class="soap-icon-plane-right yellow-color"></i></div>
                <div>
                  <span class="skin-color">Fly To</span><br><span style="white-space: nowrap; overflow:hidden;">{{ $route->city }}</span>
                </div>
              </div>
            </div>
            <div class="action">
              <a class="button btn-small full-width" href="{{ route('show.inquiry_form') }}">SELECT NOW</a>
            </div>
          </div>
        </article>
      </div>
      @endforeach
    </div>
  </div>

  <div class="global-map-area mobile-section parallax" data-stellar-background-ratio="0.5">
    <div class="container">
      <div class="table-wrapper hidden-table-sm">
        @foreach ($news as $letter)
        <div class="col-md-7 description section table-cell">
          <h1 style=" margin-bottom: -10px;"> <em style="font-size:1.6em; font-weight: normal;">Latest News</em> <br><br> {{ $letter->heading }} </h1>
          <br>
          <p style="font-size:1.2em;" class="text-justify"> {{ $letter->news }} </p>
        </div>
        <div class="col-md-5 image-wrapper table-cell hidden-sm">
          <img src="{{ $letter->image }}" alt="" class="animated" data-animation-type="fadeInUp" height="250px">
        </div>
        @endforeach
      </div>
    </div>
  </div>

  <div class="container section">
    <h2>Travelo Photo Gallery</h2>
    <div class="flexslider image-carousel style2 row-2" data-animation="slide" data-item-width="170" data-item-margin="30">
      <ul class="slides">
        <li>
          <a href="#" class="hover-effect">
            <img src="{{ URL::asset('/storage/hotel_image/1.jpg') }}" height="100" alt="" />
            <p class="caption">La Degue Island</p>
          </a>
          <a href="#" class="hover-effect">
            <img src="{{ URL::asset('/storage/hotel_image/2.jpg') }}" height="100%" alt="" />
            <p class="caption">La Degue Island</p>
          </a>
        </li>
        <li>
          <a href="#" class="hover-effect">
            <img src="{{ URL::asset('/storage/hotel_image/3.jpg') }}" height="100%" alt="" />
            <p class="caption">La Degue Island</p>
          </a>
          <a href="#" class="hover-effect">
            <img src="{{ URL::asset('/storage/hotel_image/4.jpg') }}" height="100%" alt="" />
            <p class="caption">La Degue Island</p>
          </a>
        </li>
        <li>
          <a href="#" class="hover-effect">
            <img src="{{ URL::asset('/storage/hotel_image/5.jpg') }}" height="100%" alt="" />
            <p class="caption">La Degue Island</p>
          </a>
          <a href="#" class="hover-effect">
            <img src="{{ URL::asset('/storage/hotel_image/6.jpg') }}" height="100%" alt="" />
            <p class="caption">La Degue Island</p>
          </a>
        </li>
        <li>
          <a href="#" class="hover-effect">
            <img src="{{ URL::asset('/storage/hotel_image/7.jpg') }}" height="100%" alt="" />
            <p class="caption">La Degue Island</p>
          </a>
          <a href="#" class="hover-effect">
            <img src="{{ URL::asset('/storage/hotel_image/8.jpg') }}" height="100%" alt="" />
            <p class="caption">La Degue Island</p>
          </a>
        </li>
        <li>
          <a href="#" class="hover-effect">
            <img src="{{ URL::asset('/storage/hotel_image/2.jpg') }}" height="100%" alt="" />
            <p class="caption">La Degue Island</p>
          </a>
          <a href="#" class="hover-effect">
            <img src="{{ URL::asset('/storage/hotel_image/1.jpg') }}" height="100%" alt="" />
            <p class="caption">La Degue Island</p>
          </a>
        </li>
        <li>
          <a href="#" class="hover-effect">
            <img src="{{ URL::asset('/storage/hotel_image/11.jpg') }}" height="100%" alt="" />
            <p class="caption">La Degue Island</p>
          </a>
          <a href="#" class="hover-effect">
            <img src="{{ URL::asset('/storage/hotel_image/12.jpg') }}" height="100%" alt="" />
            <p class="caption">La Degue Island</p>
          </a>
        </li>
        <li>
          <a href="#" class="hover-effect">
            <img src="{{ URL::asset('/storage/hotel_image/13.jpg') }}" height="100%" alt="" />
            <p class="caption">La Degue Island</p>
          </a>
          <a href="#" class="hover-effect">
            <img src="{{ URL::asset('/storage/hotel_image/14.jpg') }}" height="100" alt="" />
            <p class="caption">La Degue Island</p>
          </a>
        </li>
      </ul>
    </div>
  </div>

  <div class="global-map-area section parallax" data-stellar-background-ratio="0.5">
    <div class="container description">
      <h1 class="text-center box">Why Thee Travel</h1>
      <div class="row">
        <div class="col-xs-6 col-sm-3">
          <div class="icon-box style8 animated" data-animation-type="slideInUp" data-animation-delay="0">
            <i class="soap-icon-hotel"></i>
            <h4 class="box-title">145,000+ Hotels</h4>
            <p class="description">
              There are 145000 Hotels at our panel, please send us enquiry and we will book for you.
            </p>
          </div>
        </div>
        <div class="col-xs-6 col-sm-3">
          <div class="icon-box style8 animated" data-animation-type="slideInUp" data-animation-delay="0.6">
            <i class="soap-icon-insurance"></i>
            <h4 class="box-title">Low Rates &amp; Top Savings</h4>
            <p class="description">
              We assure that we will give you best cheapest price with excellence of service.
            </p>
          </div>
        </div>
        <div class="col-xs-6 col-sm-3">
          <div class="icon-box style8 animated" data-animation-type="slideInUp" data-animation-delay="0.9">
            <i class="soap-icon-star-1"></i>
            <h4 class="box-title">24/7 Services</h4>
            <p class="description">
              We are available 24/7 for our clients we will provide services till the issuance of boarding pass.
            </p>
          </div>
        </div>
        <div class="col-xs-6 col-sm-3">
          <div class="icon-box style8 animated" data-animation-type="slideInUp" data-animation-delay="1.2">
            <i class="soap-icon-support"></i>
            <h4 class="box-title">Language</h4>
            <p class="description">
              Our staff can communicate in English,Urdu and Hindi as well.
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection

@section('scripts')
@endsection
