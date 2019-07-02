@extends('layouts.master')

@section('pageTitle')
    Routes - {{ $seo['page_title'] }}
@endsection

@section("metaTags")
  <meta name="title" content="{{ $seo['meta_title'] }}" />
  <meta name="keywords" content="{{ $seo['meta_keywords'] }}" />
  <meta name="description" content="{{ $seo['meta_description'] }}">
@endsection

@section('pageTitleContainer')
    Routes
@endsection

@section('header_keywords')
  {!! $seo['header_keywords'] !!}
@endsection

@section("currentPageStyles")
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('components/revolution_slider/css/settings.css') }}" media="screen" />
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('components/revolution_slider/css/style.css') }}" media="screen" />
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('components/jquery.bxslider/jquery.bxslider.css') }}" media="screen" />
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('components/flexslider/flexslider.css') }}" media="screen" />
@endsection

@section('content')
    <div class="innr_banner">
        <span class="text-center">
            <img src="{{ URL::asset('/' . $city_image) }}" alt="{{ $city_name }}" align="middle" style="display:block; width:100%; margin:auto;"/>
        </span>
    </div>
    <div class="inner_hedding">
        <div class="container-fluid">
            <div class="row" style="background-color: #808080; padding-top:10px;">
                <div class="col-lg-12 col-md-12">
                    <h1 class="text-center" style="text-weight: bold; color: #fff;">{{ $city_name }}</h1>
                    <h1 class="text-center" style="text-weight: bold; color: #fff;">{!! $seo['body_keywords'] !!}</h1>
                </div>
            </div>
        </div>
    </div>

    <section id="content">
        <div class="container">
            <br>
            <div class="row">
              <div class="col-md-12">
                <div class="panel panel-primary">
                  <div class="panel-body">{!! $seo['body_content'] !!}</div>
                </div>
              </div>
            </div>

            <div id="main">
                <div class="row">
                    <div class="col-sm-4 col-md-4">
                      <div class="booking-section travelo-box">
                          <form class="booking-form" action="{{ route('book.ticket') }}" method="post">
                              {{ csrf_field() }}
                              <div class="card-information">
                                  <h2>Flight Information</h2>
                                  <div class="form-group row">
                                      <div class="col-sm-12 col-md-12">
                                          <label>Departure Date :</label>
                                          <input type="date" required name="departure_date" class="input-text full-width" value="{{ old('departure_date') }}" placeholder="Enter Date">
                                          @if($errors->has('departure_date'))
                                              <label style="color:#CF1602;">* {{ $errors->first('departure_date') }}</label>
                                          @endif
                                      </div>
                                      <div class="col-sm-12 col-md-12">
                                          <label>Return Date : <small>(Use same if oneway)</small></label>
                                          <input type="date" required name="return_date" class="input-text full-width" value="{{ old('return_date') }}" placeholder="Enter Date">
                                          @if($errors->has('return_date'))
                                              <label style="color:#CF1602;">* {{ $errors->first('return_date') }}</label>
                                          @endif
                                      </div>
                                  </div>
                                  <div class="form-group row">
                                      <div class="col-sm-12 col-md-12">
                                          <label>Departure Airport :</label>
                                          <input type="text" required name="departure_airport" class="input-text full-width" value="{{ old('departure_airport') }}" placeholder="Flying From">
                                          @if($errors->has('departure_airport'))
                                              <label style="color:#CF1602;">* {{ $errors->first('departure_airport') }}</label>
                                          @endif
                                      </div>
                                      <div class="col-sm-12 col-md-12">
                                          <label>Destination Airport :</label>
                                          <input type="text" required name="destination_airport" class="input-text full-width" value="{{ old('destination_airport') }}" placeholder="Flying to">
                                          @if($errors->has('destination_airport'))
                                              <label style="color:#CF1602;">* {{ $errors->first('destination_airport') }}</label>
                                          @endif
                                      </div>
                                  </div>
                                  <div class="form-group row">
                                      <div class="col-sm-6 col-md-6">
                                          <label>Fare Type:</label>
                                          <div class="selector">
                                              <select class="full-width" required name="fare_type">
                                                  <option value="">Choose an option</option>
                                                  <option value="return">Return</option>
                                                  <option value="oneway">One way</option>
                                              </select>
                                          </div>
                                          @if($errors->has('fare_type'))
                                              <label style="color:#CF1602;">* {{ $errors->first('fare_type') }}</label>
                                          @endif
                                      </div>
                                      <div class="col-sm-6 col-md-6">
                                          <label>Ticket Class:</label>
                                          <div class="selector">
                                              <select class="full-width" required name="ticket_class">
                                                  <option value="">Choose an option</option>
                                                  @foreach ($classes as $class)
                                                      <option value="{{ $class->id }}" @if(old('ticket_class') == $class->id) selected @endif>{{ $class->name }}</option>
                                                  @endforeach
                                              </select>
                                          </div>
                                          @if($errors->has('ticket_class'))
                                              <label style="color:#CF1602;">* {{ $errors->first('ticket_class') }}</label>
                                          @endif
                                      </div>
                                  </div>
                                  <div class="form-group row">
                                      <div class="col-sm-6 col-md-6">
                                          <label>Preferred Airline :</label>
                                          <div class="selector">
                                              <select class="full-width" name="preffered_airline">
                                                  <option value="">Any Airline</option>
                                                  @foreach ($airlines as $airline)
                                                      <option value="{{ $airline->id }}" @if(old('preffered_airline') == $airline->id) selected @endif>{{ $airline->name }}</option>
                                                  @endforeach
                                              </select>
                                          </div>
                                          @if($errors->has('preffered_airline'))
                                              <label style="color:#CF1602;">* {{ $errors->first('preffered_airline') }}</label>
                                          @endif
                                      </div>
                                      <div class="col-sm-6 col-md-6">
                                          <label>Flight Route:</label>
                                          <div class="selector">
                                              <select class="full-width" required name="flight_route">
                                                  <option value="">Choose an option</option>
                                                  <option value="direct">Direct</option>
                                                  <option value="indirect">In-Direct</option>
                                                  <option value="both">Both</option>
                                              </select>
                                          </div>
                                          @if($errors->has('flight_route'))
                                              <label style="color:#CF1602;">* {{ $errors->first('flight_route') }}</label>
                                          @endif
                                      </div>
                                  </div>
                              </div>
                              <hr />
                              <div class="person-information">
                                  <h2>Your Personal Information</h2>
                                  <div class="form-group row">
                                      <div class="col-sm-12 col-md-12">
                                          <label>Customer Name</label>
                                          <input type="text" required name="customer_name" class="input-text full-width" value="{{ old('customer_name') }}" placeholder="Enter your name" />
                                          @if($errors->has('customer_name'))
                                              <label style="color:#CF1602;">* {{ $errors->first('customer_name') }}</label>
                                          @endif
                                      </div>
                                  </div>
                                  <div class="form-group row">
                                      <div class="col-sm-12 col-md-12">
                                          <label>email address</label>
                                          <input type="email" required name="email_address" class="input-text full-width" value="{{ old('email_address') }}" placeholder="Enter your e-mail" />
                                          @if($errors->has('email_address'))
                                              <label style="color:#CF1602;">* {{ $errors->first('email_address') }}</label>
                                          @endif
                                      </div>
                                      <div class="col-sm-12 col-md-12">
                                          <label>Phone / Mobile :</label>
                                          <input type="number" required name="contact_number" class="input-text full-width" value="{{ old('contact_number') }}" placeholder="Enter your contact number"/>
                                          @if($errors->has('contact_number'))
                                              <label style="color:#CF1602;">* {{ $errors->first('contact_number') }}</label>
                                          @endif
                                      </div>
                                  </div>
                                  <strong>Total No. of Passengers :</strong>
                                  <div class="form-group row">
                                      <div class="col-sm-6 col-md-6">
                                          <label>Adult <em>(16+)</em> </label>
                                          <div class="selector">
                                              <select class="full-width" required name="adult">
                                                  @for($i = 1; $i <= 9; $i++)
                                                      <option value="{{ $i }}" @if(old('adult') == $i) selected @endif>{{ $i }}</option>
                                                  @endfor
                                              </select>
                                          </div>
                                          @if($errors->has('adult'))
                                              <label style="color:#CF1602;">* {{ $errors->first('adult') }}</label>
                                          @endif
                                      </div>
                                      <div class="col-sm-6 col-md-6">
                                          <label>Teenager <em>(12 - 16)</em> </label>
                                          <div class="selector">
                                              <select class="full-width" required name="teenagers">
                                                  @for($i = 0; $i <= 9; $i++)
                                                      <option value="{{ $i }}" @if(old('teenagers') == $i) selected @endif>{{ $i }}</option>
                                                  @endfor
                                              </select>
                                          </div>
                                          @if($errors->has('teenagers'))
                                              <label style="color:#CF1602;">* {{ $errors->first('teenagers') }}</label>
                                          @endif
                                      </div>
                                  </div>
                                  <div class="form-group row">
                                      <div class="col-sm-6 col-md-6">
                                          <label>Child <em>(2 - 11)</em> </label>
                                          <div class="selector">
                                              <select class="full-width" required name="child">
                                                  @for($i = 0; $i <= 9; $i++)
                                                      <option value="{{ $i }}" @if(old('child') == $i) selected @endif>{{ $i }}</option>
                                                  @endfor
                                              </select>
                                          </div>
                                          @if($errors->has('child'))
                                              <label style="color:#CF1602;">* {{ $errors->first('child') }}</label>
                                          @endif
                                      </div>
                                      <div class="col-sm-6 col-md-6">
                                          <label>Infant <em>(0 - 2)</em> </label>
                                          <div class="selector">
                                              <select class="full-width" required name="infant">
                                                  @for($i = 0; $i <= 9; $i++)
                                                      <option value="{{ $i }}" @if(old('infant') == $i) selected @endif>{{ $i }}</option>
                                                  @endfor
                                              </select>
                                          </div>
                                          @if($errors->has('infant'))
                                              <label style="color:#CF1602;">* {{ $errors->first('infant') }}</label>
                                          @endif
                                      </div>
                                  </div>
                                  <div class="form-group row">
                                      <div class="col-sm-12 col-md-12">
                                          <label>Comments or Questions:</label>
                                          <textarea rows="4" cols="50" class="input-text full-width" value="{{ old('comments_or_questions') }}" name="comments_or_questions"></textarea>
                                          @if($errors->has('comments_or_questions'))
                                              <label style="color:#CF1602;">* {{ $errors->first('comments_or_questions') }}</label>
                                          @endif
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <div class="checkbox">
                                          <label>
                                              <input type="checkbox" name="promo_code" value="1"> I want to receive <span class="skin-color"> Thee Travel</span> promo-code offers in the future.
                                          </label>
                                      </div>
                                  </div>
                              </div>
                              <hr />
                              <div class="form-group row">
                                  <div class="col-sm-12 col-md-12">
                                      <button type="submit" class="full-width btn-large">CONFIRM BOOKING</button>
                                  </div>
                              </div>
                              <blockquote>
                                  <cite title="Source Title">You will receive an email to complete the booking process from our agent.</cite>
                                  <footer>Be sure to check your spam folders.</footer>
                    					</blockquote>
                          </form>
                      </div>
                    </div>
                    <div class="col-sm-8 col-md-8">
                        <div class="flight-list listing-style3 flight">
                            @foreach ($routes as $route)
                                <article class="box">
                                    <figure class="col-xs-4 col-sm-4">
                                        <span style="overflow:hidden;"><img alt="{{ $route->airline_name }}" src="{{ URL::asset('/' . $route->airline_image) }}"></span>
                                    </figure>
                                    <div class="details col-xs-9 col-sm-10">
                                        <div class="details-wrapper">
                                            <div class="first-row">
                                                <div>
                                                    <h4 class="box-title">{{ $route->city }}<small>Call Now To Book 001-866-256-6122</small></h4>
                                                    <div class="amenities">
                                                        <i class="soap-icon-wifi circle"></i>
                                                        <i class="soap-icon-entertainment circle"></i>
                                                        <i class="soap-icon-fork circle"></i>
                                                        <i class="soap-icon-suitcase circle"></i>
                                                    </div>
                                                </div>
                                                <div>
                                                    <span class="price"><small>@if($flag) Excluding @else Including @endif Taxes</small>${{ $route->price }}</span>
                                                </div>
                                            </div>
                                            <div class="second-row">
                                                <div class="time">
                                                    <div class="take-off col-sm-4">
                                                        <div class="icon"><i class="soap-icon-plane-right yellow-color"></i></div>
                                                        <div>
                                                            <span class="skin-color">Fly From</span><br />{{ $route->fromm }}
                                                        </div>
                                                    </div>
                                                    <div class="landing col-sm-4">
                                                        <div class="icon"><i class="soap-icon-plane-right yellow-color"></i></div>
                                                        <div>
                                                            <span class="skin-color">Fly To</span><br />{{ $route->city }}
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="icon"><i class="soap-icon-passenger yellow-color"></i></div>
                                                        <div>
                                                            <span class="skin-color">Class</span><br />{{ $route->class }}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="action">
                                                    <a href="{{ route('show.inquiry_form') }}" class="button btn-small full-width">BOOK NOW</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
@endsection
