<?php
 ?>
      <!-- start footer -->
      <footer id="footer">
         <div class="container">
            <div class="row">
               <div class="copyright">
                  <p>Copyright © 2021 <a href="https://agrim.no/">Agrim</a> | Designed by <a href="https://agrim.no/">Agrim</a>
                  </p>
               </div>
               <!-- .copyright -->
            </div>
            <!-- /.row -->
         </div>
         <!-- /.container -->
      </footer>
      <!-- end footer -->
      </div>
      <!-- /.peace layout end -->
      <!-- js include -->
      <script type='text/javascript' src='https://maps.google.com/maps/api/js?ver=1.0'></script>
      <script type='text/javascript' src='<?php echo base_url(); ?>assets/front/js/plugins.js'></script>
      <script type='text/javascript' src='<?php echo base_url(); ?>assets/front/js/masterslider.min.js'></script>
      <script type='text/javascript' src='<?php echo base_url(); ?>assets/front/js/functions.js'></script>
      <!-- custom -->
      <script>
         (function ($) {
                 "use strict";
         
                 $(function () {
                     var masterslider_df7d = new MasterSlider();
         
                     // slider controls
                     masterslider_df7d.control('bullets', {
                         autohide: true,
                         overVideo: true,
                         dir: 'h',
                         align: 'bottom',
                         space: 6,
                         margin: 10
                     });
                     // slider setup
                     masterslider_df7d.setup("MS562c5f7f2df7d", {
                         width: 1170,
                         height: 680,
                         minHeight: 0,
                         space: 0,
                         start: 1,
                         grabCursor: true,
                         swipe: true,
                         mouse: true,
                         keyboard: false,
                         layout: "fullwidth",
                         wheel: false,
                         autoplay: true,
                         instantStartLayers: false,
                         loop: false,
                         shuffle: false,
                         preload: 0,
                         heightLimit: true,
                         autoHeight: false,
                         smoothHeight: true,
                         endPause: false,
                         overPause: true,
                         fillMode: "fill",
                         centerControls: true,
                         startOnAppear: false,
                         layersMode: "center",
                         autofillTarget: "",
                         hideLayers: false,
                         fullscreenMargin: 0,
                         speed: 96,
                         dir: "h",
                         parallaxMode: 'mouse',
                         view: "fade"
                     });
         
         
         
                     $("head")
                         .append("<link rel='stylesheet' id='ms-fonts'  href='https//fonts.googleapis.com/css?family=Roboto:900,regular' type='text/css' media='all' />");
         
                     window.masterslider_instances = window.masterslider_instances || [];
                     window.masterslider_instances.push(masterslider_df7d);
                 });
         
             })(jQuery);
         
         /**  circular countdown.
         --------------------------------------------------------------------------------------------------- */
         var findClass = jQuery('.next-event');
         
         if (findClass.length) {
         
             jQuery(document)
                 .ready(function () {
                     JBCountDown({
                         secondsColor: "#f1c152",
                         secondsGlow: "none",
         
                         minutesColor: "#f1c152",
                         minutesGlow: "none",
         
                         hoursColor: "#f1c152",
                         hoursGlow: "none",
         
                         daysColor: "#f1c152",
                         daysGlow: "none",
         
                         // startDate   : "1443657600",
                         endDate: "1445385600",
                         now: "1444200921"
                     });
                 });
         
         }
         
         
         
         /*-------------------------- Isotope Init --------------------*/
         jQuery(window)
             .on("load resize", function (e) {
         
                 var $container = jQuery('.isotope-items'),
                     colWidth = function () {
                         var w = $container.width(),
                             columnNum = 1,
                             columnWidth = 0;
                         if (w > 1040) {
                             columnNum = 5;
                         } else if (w > 850) {
                             columnNum = 2;
                         } else if (w > 768) {
                             columnNum = 2;
                         } else if (w > 480) {
                             columnNum = 2;
                         }
                         columnWidth = Math.floor(w / columnNum);
         
                         //Isotop Version 1
                         var $containerV1 = jQuery('.isotope-items');
                         $containerV1.find('.item')
                             .each(function () {
                                 var $item = jQuery(this),
                                     multiplier_w = $item.attr('class')
                                     .match(/item-w(\d)/),
                                     multiplier_h = $item.attr('class')
                                     .match(/item-h(\d)/),
                                     width = multiplier_w ? columnWidth * multiplier_w[1] - 10 : columnWidth,
                                     height = multiplier_h ? columnWidth * multiplier_h[1] * 0.7 : columnWidth * 0.7;
                                 $item.css({
                                     width: width,
                                     height: height,
                                 });
                             });
         
         
                         return columnWidth;
                     },
                     isotope = function () {
                         $container.isotope({
                             resizable: true,
                             itemSelector: '.item',
                             masonry: {
                                 columnWidth: colWidth(),
                                 gutterWidth: 10
                             }
                         });
                     };
                 isotope();
         
         
         
                 // bind filter button click
                 jQuery('.isotope-filters')
                     .on('click', 'button', function () {
                         var filterValue = jQuery(this)
                             .attr('data-filter');
                         $container.isotope({
                             filter: filterValue
                         });
                     });
         
                 // change active class on buttons
                 jQuery('.isotope-filters')
                     .each(function (i, buttonGroup) {
                         var $buttonGroup = jQuery(buttonGroup);
                         $buttonGroup.on('click', 'button', function () {
                             $buttonGroup.find('.active')
                                 .removeClass('active');
                             jQuery(this)
                                 .addClass('active');
                         });
                     });
         
         
                 // Masonry Isotope
                 var $masonryIsotope = jQuery('.isotope-masonry-items')
                     .isotope({
                         itemSelector: '.item',
                     });
         
                 // bind filter button click
                 jQuery('.isotope-filters')
                     .on('click', 'button', function () {
                         var filterValue = jQuery(this)
                             .attr('data-filter');
                         $masonryIsotope.isotope({
                             filter: filterValue
                         });
                     });
         
                 // change active class on buttons
                 jQuery('.isotope-filters')
                     .each(function (i, buttonGroup) {
                         var $buttonGroup = jQuery(buttonGroup);
                         $buttonGroup.on('click', 'button', function () {
                             $buttonGroup.find('.active')
                                 .removeClass('active');
                             jQuery(this)
                                 .addClass('active');
                         });
                     });
             });
         
         
         /*------------------------------------------------------------------------------------------------------------------*/
         /* clock counter 
         /*------------------------------------------------------------------------------------------------------------------*/
         
         
         jQuery(document)
             .ready(function () {
         
         
         
                 jQuery('.clock_counter')
                     .each(function () {
                         //22
                         var time = jQuery(this)
                             .data('time');
                         var date = jQuery(this)
                             .data('date');
                         var i = jQuery(this);
                         var init = othermakeCounter(time, date, i);
                     });
         
                 function othermakeCounter(time, date, i) {
         
                     var nextDay = "2015/10/8 ";
                     if (date > nextDay) {
                         greeting = date;
                     } else {
                         greeting = nextDay;
                     }
         
         
                     var currentTime = greeting + time;
                     jQuery(i)
                         .countdown(currentTime, function (event) {
                             var $this = jQuery(this)
                                 .html(event.strftime('' + '<div class="hour col-xs-6"><h3>%d</h3> <span>Day</span></div>' + '<div class="hour min col-xs-6"><h3>%H</h3> <span>Hours</span></div>'));
                         })
                         .on('finish.countdown', othermakeCounter);
                 }
         
         
         
         
             });
         
         
         /*------------------------------------------------------------------------------------------------------------------*/
         /* google map 
         /*------------------------------------------------------------------------------------------------------------------*/
         
         jQuery(document)
             .ready(function () {
         
                 /*----------- Google Map - with support of gmaps.js ----------------*/
                 function isMobile() {
                     return ('ontouchstart' in document.documentElement);
                 }
         
                 function init_gmap() {
                     if (typeof google == 'undefined') return;
                     var options = {
                         center: [23.739393, 90.389195],
                         zoom: 15,
                         mapTypeControl: true,
                         mapTypeControlOptions: {
                             style: google.maps.MapTypeControlStyle.DROPDOWN_MENU
                         },
                         navigationControl: true,
                         scrollwheel: false,
                         streetViewControl: true
                     }
         
                     if (isMobile()) {
                         options.draggable = false;
                     }
         
                     jQuery('.googleMaps')
                         .gmap3({
                             map: {
                                 options: options
                             },
                             marker: {
                                 latLng: [23.739393, 90.389195],
                                 options: {
                                     icon: "images/09/map-icon.png"
                                 }
                             }
                         });
                 }
         
                 init_gmap();
         
         
             });
         
         
         jQuery(document)
                         .ready(function () {
                             jQuery(".service .service-details .pooja1")
                                 .hover(function () {
                                     jQuery(".service .hand .item-element")
                                         .css('background-color', '#f1c152');
                                 }, function () {
                                     // on mouseout, reset the background colour
                                     jQuery('.service .hand .item-element')
                                         .css('background-color', '');
                                 });
         
                             jQuery(".service .service-details .pooja2")
                                 .hover(function () {
                                     jQuery(".service .hand2 .item-element")
                                         .css('background-color', '#f1c152');
                                 }, function () {
                                     // on mouseout, reset the background colour
                                     jQuery('.service .hand2 .item-element')
                                         .css('background-color', '');
                                 });
         
                             jQuery(".service .service-details .pooja3")
                                 .hover(function () {
                                     jQuery(".service .hand4 .item-element")
                                         .css('background-color', '#f1c152');
                                 }, function () {
                                     // on mouseout, reset the background colour
                                     jQuery('.service .hand4 .item-element')
                                         .css('background-color', '');
                                 });
         
                             jQuery(".service .service-details .darson1")
                                 .hover(function () {
                                     jQuery(".service .hand1 .item-element")
                                         .css('background-color', '#f1c152');
                                 }, function () {
                                     // on mouseout, reset the background colour
                                     jQuery('.service .hand1 .item-element')
                                         .css('background-color', '');
                                 });
         
                             jQuery(".service .service-details .darson2")
                                 .hover(function () {
                                     jQuery(".service .hand3 .item-element")
                                         .css('background-color', '#f1c152');
                                 }, function () {
                                     // on mouseout, reset the background colour
                                     jQuery('.service .hand3 .item-element')
                                         .css('background-color', '');
                                 });
         
                             jQuery(".service .service-details .darson3")
                                 .hover(function () {
                                     jQuery(".service .hand5 .item-element")
                                         .css('background-color', '#f1c152');
                                 }, function () {
                                     // on mouseout, reset the background colour
                                     jQuery('.service .hand5 .item-element')
                                         .css('background-color', '');
                                 });
                         });
         
         
      </script>
   </body>
</html>