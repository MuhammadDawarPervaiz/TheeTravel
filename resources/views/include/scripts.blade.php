<script type="text/javascript">(function() {function addEventListener(element,event,handler) {
if(element.addEventListener) {
 element.addEventListener(event,handler, false);
} else if(element.attachEvent){
 element.attachEvent('on'+event,handler);
}
}function maybePrefixUrlField() {
if(this.value.trim() !== '' && this.value.indexOf('http') !== 0) {
 this.value = "http://" + this.value;
}
}

var urlFields = document.querySelectorAll('.mc4wp-form input[type="url"]');
if( urlFields && urlFields.length > 0 ) {
for( var j=0; j < urlFields.length; j++ ) {
 addEventListener(urlFields[j],'blur',maybePrefixUrlField);
}
}/* test if browser supports date fields */
var testInput = document.createElement('input');
testInput.setAttribute('type', 'date');
if( testInput.type !== 'date') {

/* add placeholder & pattern to all date fields */
var dateFields = document.querySelectorAll('.mc4wp-form input[type="date"]');
for(var i=0; i<dateFields.length; i++) {
 if(!dateFields[i].placeholder) {
   dateFields[i].placeholder = 'YYYY-MM-DD';
 }
 if(!dateFields[i].pattern) {
   dateFields[i].pattern = '[0-9]{4}-(0[1-9]|1[012])-(0[1-9]|1[0-9]|2[0-9]|3[01])';
 }
}
}

})();</script>


 <script type='text/javascript' src="{{ URL::asset('wp-content/plugins/revslider/rs-plugin/js/jquery.themepunch.tools.min0f0c.js?rev=4.6.5') }}"></script>
 <script type='text/javascript' src="{{ URL::asset('wp-content/plugins/revslider/rs-plugin/js/jquery.themepunch.revolution.min0f0c.js?rev=4.6.5') }}"></script>


   <style scoped>.tp-caption.largewhitebg_button1,.largewhitebg_button1{background-color:rgba(0,0,0,0);color:#ffffff;font-size:14px;font-weight:400;line-height:33px;padding:0px 25px 0px 25px;text-decoration:none;text-shadow:none;cursor:pointer;border-width:1px;border-color:rgb(255,255,255);border-style:solid}.tp-caption.largewhitebg_button1:hover,.largewhitebg_button1:hover{background-color:rgb(255,255,255);color:rgb(1,183,242);font-size:14px;font-weight:400;line-height:33px;padding:0 25px;text-decoration:none;text-shadow:none;border-width:1px;border-color:rgb(255,255,255);border-style:solid}.tp-caption.large_bold_white_med111,.large_bold_white_med111{background-color:transparent;color:rgb(255,255,255);font-size:17px;font-weight:600;line-height:28px;text-decoration:none;text-transform:uppercase;border-width:0px;border-color:rgb(255,214,88);border-style:none}</style>

   <script type="text/javascript">

     /******************************************
       -	PREPARE PLACEHOLDER FOR SLIDER	-
     ******************************************/


     var setREVStartSize = function() {
       var	tpopt = new Object();
         tpopt.startwidth = 1200;
         tpopt.startheight = 646;
         tpopt.container = jQuery('#rev_slider_9_1');
         tpopt.fullScreen = "off";
         tpopt.forceFullWidth="off";

       tpopt.container.closest(".rev_slider_wrapper").css({height:tpopt.container.height()});tpopt.width=parseInt(tpopt.container.width(),0);tpopt.height=parseInt(tpopt.container.height(),0);tpopt.bw=tpopt.width/tpopt.startwidth;tpopt.bh=tpopt.height/tpopt.startheight;if(tpopt.bh>tpopt.bw)tpopt.bh=tpopt.bw;if(tpopt.bh<tpopt.bw)tpopt.bw=tpopt.bh;if(tpopt.bw<tpopt.bh)tpopt.bh=tpopt.bw;if(tpopt.bh>1){tpopt.bw=1;tpopt.bh=1}if(tpopt.bw>1){tpopt.bw=1;tpopt.bh=1}tpopt.height=Math.round(tpopt.startheight*(tpopt.width/tpopt.startwidth));if(tpopt.height>tpopt.startheight&&tpopt.autoHeight!="on")tpopt.height=tpopt.startheight;if(tpopt.fullScreen=="on"){tpopt.height=tpopt.bw*tpopt.startheight;var cow=tpopt.container.parent().width();var coh=jQuery(window).height();if(tpopt.fullScreenOffsetContainer!=undefined){try{var offcontainers=tpopt.fullScreenOffsetContainer.split(",");jQuery.each(offcontainers,function(e,t){coh=coh-jQuery(t).outerHeight(true);if(coh<tpopt.minFullScreenHeight)coh=tpopt.minFullScreenHeight})}catch(e){}}tpopt.container.parent().height(coh);tpopt.container.height(coh);tpopt.container.closest(".rev_slider_wrapper").height(coh);tpopt.container.closest(".forcefullwidth_wrapper_tp_banner").find(".tp-fullwidth-forcer").height(coh);tpopt.container.css({height:"100%"});tpopt.height=coh;}else{tpopt.container.height(tpopt.height);tpopt.container.closest(".rev_slider_wrapper").height(tpopt.height);tpopt.container.closest(".forcefullwidth_wrapper_tp_banner").find(".tp-fullwidth-forcer").height(tpopt.height);}
     };

     /* CALL PLACEHOLDER */
     setREVStartSize();


     var tpj=jQuery;
     tpj.noConflict();
     var revapi9;

     tpj(document).ready(function() {

     if(tpj('#rev_slider_9_1').revolution == undefined){
       revslider_showDoubleJqueryError('#rev_slider_9_1');
     }else{
        revapi9 = tpj('#rev_slider_9_1').show().revolution(
       {
                     dottedOverlay:"none",
         delay:9000,
         startwidth:1200,
         startheight:646,
         hideThumbs:200,

         thumbWidth:100,
         thumbHeight:50,
         thumbAmount:3,


         simplifyAll:"off",

         navigationType:"none",
         navigationArrows:"solo",
         navigationStyle:"round",

         touchenabled:"on",
         onHoverStop:"on",
         nextSlideOnWindowFocus:"off",

         swipe_threshold: 0.7,
         swipe_min_touches: 1,
         drag_block_vertical: false,



         keyboardNavigation:"off",

         navigationHAlign:"center",
         navigationVAlign:"bottom",
         navigationHOffset:0,
         navigationVOffset:20,

         soloArrowLeftHalign:"left",
         soloArrowLeftValign:"center",
         soloArrowLeftHOffset:20,
         soloArrowLeftVOffset:0,

         soloArrowRightHalign:"right",
         soloArrowRightValign:"center",
         soloArrowRightHOffset:20,
         soloArrowRightVOffset:0,

         shadow:0,
         fullWidth:"on",
         fullScreen:"off",

                     spinner:"spinner0",

         stopLoop:"off",
         stopAfterLoops:-1,
         stopAtSlide:-1,

         shuffle:"off",

         autoHeight:"off",
         forceFullWidth:"off",



         hideThumbsOnMobile:"off",
         hideNavDelayOnMobile:1500,
         hideBulletsOnMobile:"off",
         hideArrowsOnMobile:"off",
         hideThumbsUnderResolution:0,

                     hideSliderAtLimit:0,
         hideCaptionAtLimit:0,
         hideAllCaptionAtLilmit:0,
         startWithSlide:0					});



               }
     });	/*ready*/

   </script>


   <script type='text/javascript' src="{{ URL::asset('wp-content/plugins/contact-form-7/includes/js/jquery.form.mind03d.js?ver=3.51.0-2014.06.20') }}"></script>
<script type='text/javascript'>
/* <![CDATA[ */
var _wpcf7 = {"loaderUrl":"http:\/\/www.soaptheme.net\/wordpress\/travelo\/wp-content\/plugins\/contact-form-7\/images\/ajax-loader.gif","sending":"Sending ..."};
/* ]]> */
</script>
<script type='text/javascript' src="{{ URL::asset('wp-content/plugins/contact-form-7/includes/js/scripts3a05.js?ver=4.2.2') }}"></script>
<script type='text/javascript' src="{{ URL::asset('wp-content/themes/Travelo_/js/plugin4a41.js?ver=4.8.2') }}"></script>
<script type='text/javascript' src="{{ URL::asset('wp-content/themes/Travelo_/js/jquery-ui.min4a41.js?ver=4.8.2') }}"></script>
<script type='text/javascript' src="{{ URL::asset('wp-content/themes/Travelo_/js/bootstrap.min6aec.js?ver=3.0') }}"></script>
<script type='text/javascript' src="{{ URL::asset('wp-content/themes/Travelo_/js/components/jquery.bxslider/jquery.bxslider.min4a41.js?ver=4.8.2') }}"></script>
<script type='text/javascript' src="{{ URL::asset('wp-content/themes/Travelo_/js/components/flexslider/jquery.flexslider-min4a41.js?ver=4.8.2') }}"></script>
<script type='text/javascript' src="{{ URL::asset('wp-content/themes/Travelo_/js/jquery.validate.min4a41.js?ver=4.8.2') }}"></script>
<script type='text/javascript'>
/* <![CDATA[ */
var ajaxurl = "index.html\/\/www.soaptheme.net\/wordpress\/travelo\/wp-admin\/admin-ajax.php";
var themeurl = "index.html\/\/www.soaptheme.net\/wordpress\/travelo\/wp-content\/themes\/Travelo_";
var date_format = "mm\/dd\/yy";
var settings = {"sticky_menu":"1"};
/* ]]> */
</script>
<script type='text/javascript' src="{{ URL::asset('wp-content/themes/Travelo_/js/theme-scripts4a41.js?ver=4.8.2') }}"></script>
<script type='text/javascript' src='https://maps.googleapis.com/maps/api/js?v=3.exp&amp;sensor=false&amp;ver=3.0'></script>
<script type='text/javascript' src="{{ URL::asset('wp-content/themes/Travelo_/js/gmap3.min6aec.js?ver=3.0') }}"></script>
<script type='text/javascript' src="{{ URL::asset('wp-includes/js/comment-reply.min4a41.js?ver=4.8.2') }}"></script>
<script type='text/javascript' src="{{ URL::asset('wp-includes/js/wp-embed.min4a41.js?ver=4.8.2') }}"></script>
<script type='text/javascript' src="{{ URL::asset('wp-content/plugins/js_composer/assets/js/dist/js_composer_front.min5859.js?ver=4.9.1') }}"></script>
<script type='text/javascript'>
/* <![CDATA[ */
var mc4wp_forms_config = [];
/* ]]> */
</script>
<script type='text/javascript' src="{{ URL::asset('../wp-content/plugins/mailchimp-for-wp/assets/js/forms-api.min5fa1.js?ver=4.1.9') }}"></script>

<script>
    $(function()
    {
        $('#flash').delay(200).fadeIn(10000).delay(2000).fadeOut(1000);
    });
</script>

<script type="text/javascript" async="async" defer="defer" data-cfasync="false" src="https://mylivechat.com/chatinline.aspx?hccid=44337354"></script>

<!-- Call button scripts -->
  <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
  <script src="{{ URL::asset('call_button_files/js/jquery.arcontactus.js') }}"></script>
<!-- End Call button scripts -->
