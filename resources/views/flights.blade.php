@extends('layouts.master')

@section('pageTitle')
  Flights - {{ $seo['page_title'] }}
@endsection

@section("metaTags")
  <meta name="title" content="{{ $seo['meta_title'] }}" />
  <meta name="keywords" content="{{ $seo['meta_keywords'] }}" />
  <meta name="description" content="{{ $seo['meta_description'] }}">
@endsection

@section('pageTitleContainer')
  Flights
@endsection

@section('header_keywords')
  {!! $seo['header_keywords'] !!}
@endsection

@section("currentPageStyles")

    <style id='trav_style_custom-inline-css' type='text/css'>

        .fair_inner_sec ul li a {
            background: #323231 none repeat scroll 0 0;
            border: 0 solid #808080;
            box-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7);
            color: #fff;
            float: left;
            font-size: 16px;
            margin: 0 0 20px;
            padding: 15px 0;
            text-align: center;
            text-decoration: none;
            text-transform: none;
            width: 100%;
        }
    </style>

@endsection

@section('content')
    <div class="innr_banner">
      @foreach ($continent_image as $continent)
        <span class="text-center">
            <img src="{{ URL::asset('/' . $continent->image) }}" alt="{{ $continent->name }}" align="middle" style="display:block; width:100%; margin:auto;"/>
        </span>
      @endforeach
    </div>
    <div class="inner_hedding">
        <div class="container-fluid">
            <div class="row" style="background-color: #808080; padding-top:10px;">
                <div class="col-lg-12 col-md-12">
                    <h1 class="text-center" style="text-weight: bold; color: #fff;">{{ $continent_name }}</h1>
                    <div class="row">
                      <div class="text-center">
                          <h1 class="text-center" style="text-weight: bold; color: #fff;">{!! $seo['body_keywords'] !!}</h1>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="panel panel-primary">
            <div class="panel-footer">{!! $seo['body_content'] !!}</div>
          </div>
        </div>
      </div>
    </div>

    <br/>
    <div class="fair_inner_sec">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <ul>
                      @foreach ($cities as $city)
                        <li class="col-lg-3 col-md-3">
                            <a href="{{ route('show.routes', [str_replace(' ', '_', $continent_name), str_replace(' ', '_', $city->name)]) }}">{{ $city->name }}</a>
                        </li>
                      @endforeach
                    </ul>
                </div>

              </div>
          </div>
      </div>
@endsection

@section('scripts')
@endsection
