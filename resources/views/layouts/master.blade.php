<!DOCTYPE html>
<!--[if IE 8]>          <html class="ie ie8"> <![endif]-->
<!--[if IE 9]>          <html class="ie ie9"> <![endif]-->
<!--[if gt IE 9]><!-->
<html> <!--<![endif]-->
<head>
    <!-- Begin Inspectlet Asynchronous Code -->
      <script type="text/javascript">
      (function() {
      window.__insp = window.__insp || [];
      __insp.push(['wid', 709153742]);
      var ldinsp = function(){
      if(typeof window.__inspld != "undefined") return; window.__inspld = 1; var insp = document.createElement('script'); insp.type = 'text/javascript'; insp.async = true; insp.id = "inspsync"; insp.src = ('https:' == document.location.protocol ? 'https' : 'http') + '://cdn.inspectlet.com/inspectlet.js?wid=709153742&r=' + Math.floor(new Date().getTime()/3600000); var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(insp, x); };
      setTimeout(ldinsp, 0);
      })();
      </script>
    <!-- End Inspectlet Asynchronous Code -->

    <meta name="msvalidate.01" content="BBA3E2B1FC8711C2F7A8EEFA8FBF7D6D" />

    <!-- Page Title -->
    <title>@yield("pageTitle")</title>

    <!-- Ajax -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Meta Tags -->
    <meta charset="utf-8">
    @yield("metaTags")
    <meta name="author" content="SoapTheme">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Theme Styles -->
    <link rel="shortcut icon" href="{{ URL::asset('fav.ico') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/font-awesome.min.css') }}">
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="{{ URL::asset('css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('/layerslider/css/layerslider.css') }}" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('components/flexslider/flexslider.css') }}" media="screen" />
    <!-- Current Page Styles -->
    @yield("currentPageStyles")


    <!-- Main Style -->
    <link id="main-style" rel="stylesheet" href="{{ URL::asset('css/style.css') }}">

    <!-- Custom Styles -->
    <link rel="stylesheet" href="{{ URL::asset('css/custom.css') }}">

    <!-- Updated Styles -->
    <link rel="stylesheet" href="{{ URL::asset('css/updates.css') }}">

    <!-- Responsive Styles -->
    <link rel="stylesheet" href="{{ URL::asset('css/responsive.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('/layerslider/css/layerslider.css') }}" type="text/css">

    <!-- Call button style -->
      <link href="{{ URL::asset('call_button_files/css/jquery.arcontactus.css') }}" rel="stylesheet" />
    <!-- end Call button style -->

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-108225565-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-108225565-1');
    </script>

    <!-- External libraries: jQuery & GreenSock -->
    <script src="{{ URL::asset('/layerslider/js/jquery.js') }}" type="text/javascript"></script>
    <script src="{{ URL::asset('/layerslider/js/greensock.js') }}" type="text/javascript"></script>

    <!-- LayerSlider script files -->
    <script src="{{ URL::asset('/layerslider/js/layerslider.transitions.js') }}" type="text/javascript"></script>
    <script src="{{ URL::asset('/layerslider/js/layerslider.kreaturamedia.jquery.js') }}" type="text/javascript"></script>
    <!-- Extra slider links-->
    <script type="text/javascript" src="{{ URL::asset('components/revolution_slider/js/extensions/revolution.extension.video.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('components/revolution_slider/js/extensions/revolution.extension.slideanims.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('components/revolution_slider/js/extensions/revolution.extension.actions.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('components/revolution_slider/js/extensions/revolution.extension.layeranimation.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('components/revolution_slider/js/extensions/revolution.extension.kenburn.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('components/revolution_slider/js/extensions/revolution.extension.navigation.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('components/revolution_slider/js/extensions/revolution.extension.migration.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('components/revolution_slider/js/extensions/revolution.extension.parallax.min.js') }}"></script>

    <script type="text/javascript" src="http://www.iccila.com.br/js/plugins/revslider/public/assets/js/extensions/revolution.extension.slideanims.min.js"></script>
    <script type="text/javascript" src="http://www.iccila.com.br/js/plugins/revslider/public/assets/js/extensions/revolution.extension.layeranimation.min.js"></script>
    <script type="text/javascript" src="http://www.iccila.com.br/js/plugins/revslider/public/assets/js/extensions/revolution.extension.kenburn.min.js"></script>
    <script type="text/javascript" src="http://www.iccila.com.br/js/plugins/revslider/public/assets/js/extensions/revolution.extension.navigation.min.js"></script>

    <link rel='stylesheet' id='contact-form-7-css'  href="{{ URL::asset('wp-content/p-content/plugins/contact-form-7/includes/css/styles3a05.css?ver=4.2.2') }}" type='text/css' media='all' />
    <link rel='stylesheet' id='rs-plugin-settings-css'  href="{{ URL::asset('wp-content/plugins/revslider/rs-plugin/css/settings1dc6.css?ver=4.6.5') }}" type='text/css' media='all' />
    <link rel='stylesheet' id='trav_style_font_googleapis-css'  href='http://fonts.googleapis.com/css?family=Lato%3A300%2C400%2C700%2C900&amp;ver=4.8.2' type='text/css' media='all' />
    <link rel='stylesheet' id='trav_style_animate-css'  href="{{ URL::asset('wp-content/themes/Travelo_/css/animate.min4a41.css?ver=4.8.2') }}" type='text/css' media='all' />
    <link rel='stylesheet' id='trav_style_font_awesome-css'  href="{{ URL::asset('wp-content/themes/Travelo_/css/font-awesome4a41.css?ver=4.8.2') }}" type='text/css' media='all' />
    <link rel='stylesheet' id='trav_style_bootstrap-css'  href="{{ URL::asset('wp-content/themes/Travelo_/css/bootstrap.min4a41.css?ver=4.8.2') }}" type='text/css' media='all' />
    <link rel='stylesheet' id='trav_style_flexslider-css'  href="{{ URL::asset('wp-content/themes/Travelo_/js/components/flexslider/flexslider4a41.css?ver=4.8.2') }}" type='text/css' media='all' />
    <link rel='stylesheet' id='trav_style_bxslider-css'  href="{{ URL::asset('wp-content/themes/Travelo_/js/components/jquery.bxslider/jquery.bxslider4a41.css?ver=4.8.2') }}" type='text/css' media='all' />
    <link rel='stylesheet' id='trav_style_main_style-css'  href="{{ URL::asset('wp-content/themes/Travelo_/css/style-light-blue4a41.css?ver=4.8.2') }}" type='text/css' media='all' />
    <link rel='stylesheet' id='trav_style_custom-css'  href="{{ URL::asset('wp-content/themes/Travelo_/css/custom4a41.css?ver=4.8.2') }}" type='text/css' media='all' />
    <style id='trav_style_custom-inline-css' type='text/css'>

			#header .logo a, #footer .bottom .logo a, .chaser .logo a, .logo-modal {
				background-image: url(wp-content/themes/Travelo_/images/logo.png);
				background-repeat: no-repeat;
				display: block;
			}
			.chaser .logo a {
				background-size: auto 20px;
			}
      .footer-wrapper .widget_nav_menu ul {
        column-count: 2;
      }
      .mobile-section .promo-box {
        padding-top: 50px;
      }
    </style>
    <link rel='stylesheet' id='trav_style_responsive-css'  href="{{ URL::asset('wp-content/themes/Travelo_/css/responsive4a41.css?ver=4.8.2') }}" type='text/css' media='all' />
    <link rel='stylesheet' id='mc4wp-form-basic-css'  href="{{ URL::asset('wp-content/plugins/mailchimp-for-wp/assets/css/form-basic.min5fa1.css?ver=4.1.9') }}" type='text/css' media='all' />
    <link rel='stylesheet' id='js_composer_front-css'  href="{{ URL::asset('wp-content/plugins/js_composer/assets/css/js_composer.min5859.css?ver=4.9.1') }}" type='text/css' media='all' />
    <script type='text/javascript' src="{{ URL::asset('wp-includes/js/jquery/jqueryb8ff.js?ver=1.12.4') }}"></script>
    <script type='text/javascript' src="{{ URL::asset('wp-includes/js/jquery/jquery-migrate.min330a.js?ver=1.4.1') }}"></script>
    <link rel='https://api.w.org/' href='http://www.soaptheme.net/wordpress/travelo/wp-json/' />
    <link rel="EditURI" type="application/rsd+xml" title="RSD" href="http://www.soaptheme.net/wordpress/travelo/xmlrpc.php?rsd" />
    <link rel="wlwmanifest" type="application/wlwmanifest+xml" href="http://www.soaptheme.net/wordpress/travelo/wp-includes/wlwmanifest.xml" />
    <meta name="generator" content="WordPress 4.8.2" />
    <link rel='shortlink' href='http://www.soaptheme.net/wordpress/travelo/?p=1074' />
    <link rel="alternate" type="application/json+oembed" href="http://www.soaptheme.net/wordpress/travelo/wp-json/oembed/1.0/embed?url=http%3A%2F%2Fwww.soaptheme.net%2Fwordpress%2Ftravelo%2Fhomepage5%2F" />
    <link rel="alternate" type="text/xml+oembed" href="http://www.soaptheme.net/wordpress/travelo/wp-json/oembed/1.0/embed?url=http%3A%2F%2Fwww.soaptheme.net%2Fwordpress%2Ftravelo%2Fhomepage5%2F&amp;format=xml" />
		<script type="text/javascript">
			jQuery(document).ready(function() {
				// CUSTOM AJAX CONTENT LOADING FUNCTION
				var ajaxRevslider = function(obj) {

					// obj.type : Post Type
					// obj.id : ID of Content to Load
					// obj.aspectratio : The Aspect Ratio of the Container / Media
					// obj.selector : The Container Selector where the Content of Ajax will be injected. It is done via the Essential Grid on Return of Content

					var content = "";

					data = {};

					data.action = 'revslider_ajax_call_front';
					data.client_action = 'get_slider_html';
					data.token = '75043e3800';
					data.type = obj.type;
					data.id = obj.id;
					data.aspectratio = obj.aspectratio;

					// SYNC AJAX REQUEST
					jQuery.ajax({
						type:"post",
						url:"http://www.soaptheme.net/wordpress/travelo/wp-admin/admin-ajax.php",
						dataType: 'json',
						data:data,
						async:false,
						success: function(ret, textStatus, XMLHttpRequest) {
							if(ret.success == true)
								content = ret.data;
						},
						error: function(e) {
							console.log(e);
						}
					});

					 // FIRST RETURN THE CONTENT WHEN IT IS LOADED !!
					 return content;
				};

				// CUSTOM AJAX FUNCTION TO REMOVE THE SLIDER
				var ajaxRemoveRevslider = function(obj) {
					return jQuery(obj.selector+" .rev_slider").revkill();
				};

				// EXTEND THE AJAX CONTENT LOADING TYPES WITH TYPE AND FUNCTION
				var extendessential = setInterval(function() {
					if (jQuery.fn.tpessential != undefined) {
						clearInterval(extendessential);
						if(typeof(jQuery.fn.tpessential.defaults) !== 'undefined') {
							jQuery.fn.tpessential.defaults.ajaxTypes.push({type:"revslider",func:ajaxRevslider,killfunc:ajaxRemoveRevslider,openAnimationSpeed:0.3});
							// type:  Name of the Post to load via Ajax into the Essential Grid Ajax Container
							// func: the Function Name which is Called once the Item with the Post Type has been clicked
							// killfunc: function to kill in case the Ajax Window going to be removed (before Remove function !
							// openAnimationSpeed: how quick the Ajax Content window should be animated (default is 0.3)
						}
					}
				},30);
			});
		</script>


    <!-- CSS for IE -->
    <!--[if lte IE 9]>
        <link rel="stylesheet" type="text/css" href="css/ie.css" />
    <![endif]-->


    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script type='text/javascript' src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
      <script type='text/javascript' src="http://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.js"></script>
    <![endif]-->

    <!-- Call button reCaptcha script -->
      <script src='https://www.google.com/recaptcha/api.js?render=6LcJwnwUAAAAAJHIRl-sfJkrrsIK3edKconh9Bvz'></script>
</head>

<body>

    <div id="page-wrapper">

        @include("include.header")

        @yield("slider")

        @hasSection('pageTitleContainer')
            <div class="page-title-container">
                <div class="container">
                    <div class="page-title pull-left">
                        <div class="row" style="margin: 10px 0px -10px 0px;">
                          <h2 class="entry-title">@yield("header_keywords")</h2>
                        </div>
                    </div>
                    <ul class="breadcrumbs pull-right">
                        <li><a href="{{ route('home') }}">HOME</a></li>
                        <li class="active">@yield("pageTitleContainer")</li>
                    </ul>
                </div>
            </div>
        @endif

        @yield("content")

        <!-- Call Button code -->
          @include("include.contactUsButton")
        <!-- End Call Button code -->

        @include("include.footer")

    </div>

   <div class="opacity-overlay opacity-ajax-overlay"><i class="fa fa-spinner fa-spin spinner"></i></div>

   @include("include.scripts")
   @yield("scripts")

  <!--[if lte IE 9]>
  <script type='text/javascript' src='http://www.soaptheme.net/wordpress/travelo/wp-content/plugins/mailchimp-for-wp/assets/js/third-party/placeholders.min.js?ver=4.1.9'></script>
  <![endif]-->

</body>
</html>
