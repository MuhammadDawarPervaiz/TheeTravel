<!DOCTYPE html>
<!--[if IE 8]>          <html class="ie ie8"> <![endif]-->
<!--[if IE 9]>          <html class="ie ie9"> <![endif]-->
<!--[if gt IE 9]><!-->
<html lang="{{ app()->getLocale() }}" class=""> <!--<![endif]-->
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="Travelo - Travel, Tour Booking HTML5 Template">
    <meta name="author" content="SoapTheme">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Page Title -->
    <title>TheeTravel</title>

    <link rel="shortcut icon" href="{{ URL::asset('fav.ico') }}" type="image/x-icon">

    <!-- Theme Styles -->
    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/font-awesome.min.css') }}">
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,900' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,100,200,300,500' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="{{ URL::asset('css/animate.min.css') }}">

    <!-- Main Style -->
    <link id="main-style" rel="stylesheet" href="{{ URL::asset('css/style.css') }}">

    <!-- Updated Styles -->
    <link rel="stylesheet" href="{{ URL::asset('css/updates.css') }}">

    <!-- Custom Styles -->
    <link rel="stylesheet" href="{{ URL::asset('css/custom.css') }}">

    <!-- Responsive Styles -->
    <link rel="stylesheet" href="{{ URL::asset('css/responsive.css') }}">

    <!-- CSS for IE -->
    <!--[if lte IE 9]>
        <link rel="stylesheet" type="text/css" href="css/ie.css" />
    <![endif]-->


    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script type='text/javascript' src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
      <script type='text/javascript' src="http://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.js"></script>
    <![endif]-->
</head>
<body class="soap-login-page style1 body-blank">
    <div id="page-wrapper" class="wrapper-blank">

        @include("auth.include.header")

        <section id="content">
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
            <div class="container">
                <div id="main">
                    <h1 class="block">
                        <a href="{{ route('home') }}" title="Travelo - home">
                            <img src="{{ url('/images/logo.png') }}" alt="Thee Travel logo" />
                        </a>
                    </h1>
                    <div class="text-center yellow-color box" style="font-size: 4em; font-weight: 300; line-height: 1em;">Welcome back!</div>

                    @yield("content")

                </div>
            </div>
        </section>

        @include("auth.include.footer")
    </div>

    @include("auth.include.scripts")

</body>
</html>
