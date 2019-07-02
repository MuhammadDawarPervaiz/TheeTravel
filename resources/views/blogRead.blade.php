@extends('layouts.master')

@section('pageTitle')
    Blog
@endsection

@section("metaTags")
  <meta name="title" content="{{ $seo['meta_title'] }}" />
  <meta name="keywords" content="{{ $seo['meta_keywords'] }}" />
  <meta name="description" content="{{ $seo['meta_description'] }}">
@endsection

@section('pageTitleContainer')
    Blog Post
@endsection

@section('header_keywords')

@endsection

@section('content')
<section id="content">
    <div class="container">
        <div id="main">
            <div class="page">
                <div class="post-content">
                    <div class="blog-infinite">
                        @foreach ($blogs as $blog)
                            <div class="post">
                                <div class="post-content-wrapper">
                                    <div class="flexslider photo-gallery style4">
                                        <ul class="slides">
                                            @foreach(json_decode($blog->blog_image) as $path)
                                                <li><img src="{{ URL::asset('/' . $path) }}" style="height:342px; width:1170;" alt=""/></li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div class="details">
                                        <div class="excerpt-container">
                                            {!! $blog->blog_post !!}
                                        </div>
                                        <div class="post-meta">
                                            <div class="entry-date">
                                                <label class="date">{{ $blog->created_at->format('d') }}</label>
                                                <label class="month">{{ $blog->created_at->format('M') }}</label>
                                            </div>
                                            <div class="entry-author fn">
                                                <i class="icon soap-icon-user"></i> Posted By:
                                                <a href="#" class="author">Admin</a>
                                            </div>
                                            <div class="entry-action">
                                                <a href="#" class="button entry-comment btn-small"><i class="soap-icon-clock"></i><span>{{ $blog->created_at }}</span></a>
                                                <a href="{{ $blog->blog_link }}" target="_blank" class="button btn-small"><i class="soap-icon-places"></i><span>Learn more...</span></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
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

<!-- Flex Slider -->
<script type="text/javascript" src="components/flexslider/jquery.flexslider-min.js"></script>

<!-- Fit Video -->
<script type="text/javascript" src="js/jquery.fitvids.min.js"></script>

<!-- parallax -->
<script type="text/javascript" src="js/jquery.stellar.min.js"></script>

<!-- waypoint -->
<script type="text/javascript" src="js/waypoints.min.js"></script>

<!-- load page Javascript -->
<script type="text/javascript" src="js/theme-scripts.js"></script>
<script type="text/javascript" src="js/scripts.js"></script>
@endsection
