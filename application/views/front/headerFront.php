<?php
 ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Hindu Sanatan Mandir</title>
      <!-- css include -->
      <link rel='stylesheet' id='bootstrap-css' href='<?php echo base_url(); ?>assets/front/css/bootstrap.min.css' type='text/css' media='all' />
      <link rel='stylesheet' id='fontawesome-css' href='<?php echo base_url(); ?>assets/front/css/font-awesome.min.css' type='text/css' media='all' />
      <link rel='stylesheet' id='theme-css-css' href='<?php echo base_url(); ?>assets/front/css/theme-style.css' type='text/css' media='all' />
      <link rel='stylesheet' id='peace-style-css' href='<?php echo base_url(); ?>assets/front/css/style.css' type='text/css' media='all' />
      <link rel='stylesheet' id='masterslider-css' href='<?php echo base_url(); ?>assets/front/css/masterslider.main.css' type='text/css' media='all' />
      
      <!-- js inlcude -->
      <script type='text/javascript' src='<?php echo base_url(); ?>assets/front/js/jquery.js'></script>
      <link rel='stylesheet' type='text/css' media='all' href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.4/jquery-confirm.min.css" />
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.4/jquery-confirm.min.js"></script>
      
      <script>
         (function ($){
            window.alertMessage = function (message, type){
               $.alert({
                  title: type == 'success' ? 'Success!' : 'Error!',
                  type: type == 'success' ? 'green' : 'red',
                  content: message,
               });
            }
         })(jQuery);
         
      </script>
   </head>
   <body class="home page">
      <div id="preloader">
         <div id="loader">
            <div class="loader-inner ball-scale-multiple">
               <div></div>
               <div></div>
               <div></div>
            </div>
            <!-- loader inner -->
         </div>
         <!-- /#loader -->
      </div>
      <!-- /#preloader -->
      <!-- peace layout start. -->
      <div id="peace-layout" style="background: #F7E4D9;">
         <header id="top-section">
            <div class="container">
               <div class="col-sm-4 hidden-xs address">
                  <div class="pull-left">
                     <ul>
                        <li style="color: black;">Welcome to Official Website of Sanatan Dharm Mandir Drammen, Norway.</li>
                     </ul>
                  </div>
                  <!-- pull left  -->
               </div>
               <!-- /.address -->
              



               <!-- col sm 4 -->
               <div class="social-search pull-right hidden-xs">
                  <ul>
                     <li><a href="https://www.facebook.com/HinduSanatanMandir" target="_blank"><i class="fa fa-facebook"></i><span></span>
                     
                     </a>
                     </li>
                  </ul>
                
                  <!--   site search  -->
                  <!--  top cart  -->
               </div>
               <!-- social search  -->
            </div>
            <!-- /.container -->
            <!-- menu slider start -->
            <div class="menu-slider">
               <nav id="peace-menu">
                  <div class="container">
                     <!-- Brand and toggle get grouped for better mobile display -->
                     <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#responsive-icon" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        </button>
                     </div>
                     <!-- end navbar head -->
                     <!-- Collect the nav links, forms, and other content for toggling -->
                     <div class="collapse navbar-collapse" id="responsive-icon">
                        <div class="menu-menu-1-container">
                           <ul class="nav navbar-nav text-center nav navbar-nav text-center">
                              <li><a title="Home" href="index">Home</a>
                              </li>
                              <li class="dropdown">
                                 <a title="Who We Are" href="event-single" data-toggle="dropdown" class="dropdown-toggle" aria-haspopup="true">Who We are <i class="fa fa-angle-down"></i></a>
                                 <ul role="menu" class=" dropdown-menu">
                                    <li><a title="About us" href="about-us">About us</a>
                                    </li>
                                    <li><a title="Contact us" href="contact-us">Contact us</a>
                                    </li>
                                     <li><a title="Management Committee" href="committee">Management Committee</a>
                                 </li>
                                 </ul>
                              </li>
                              <li><a title="Hinduism" href="about-hinduism">Hinduism</a>
                              </li>
                              <li><a title="Events" href="events">Events</a>
                              <li><a title="Gallery" href="gallery">Gallery</a></li>
                              <!-- <li><a title="Gallery Default" href="404page">Membership</a></li> -->
                              <li><a title="Book an Appointment" href="booking">Book an Appointment</a></li>
                              <!-- <li class="button-skew"><a class="donate-button" href="#"><span> Donate Now <i class="fa fa-heart"></i></span></a>
                              </li> -->
                           </ul>
                        </div>
                        <!-- end menu-1-container -->
                     </div>
                     <!-- /.navbar-collapse -->
                  </div>
                  <!-- end container -->
               </nav>
               <!-- /#peace-menu -->
            </div>
            <!-- /.menu-slider -->
         </header>
      