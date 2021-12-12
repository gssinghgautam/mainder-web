<?php include('headerFront.php'); ?>
<!-- start contact us section -->
<div class="contact-us-section">
   <div class="container">
      <div class="content-section">
         <div class="content-wrapper">

            <h2 class="section-title">Send Us a Message</h2>
            <div class="section-detail">Please fill in the below information and one of the devotees will reach out to you soon with an answer to your query.</div>
            <div role="form" class="wpcf7" id="wpcf7-f7-p367-o1" lang="en-US" dir="ltr">
               <div class="row">
                  <div class="col-md-12">
                     <div id="validationDiv" style='display:none'>
                        <div class="box box-primary">
                           <div class="box-body">
                              <div class="row">
                                 <div class="col-md-12">
                                    <div class="callout callout-danger">
                                       <h4>Unable to check!</h4>
                                       <p id='dateValidationMsg'></p>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div id='availableRoomDiv'></div>

                     <?php
                     $this->load->helper('form');
                     $error = $this->session->flashdata('error');
                     if ($error) {
                     ?>
                        <div class="alert alert-danger alert-dismissable">
                           <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                           <?php echo $this->session->flashdata('error'); ?>
                        </div>
                     <?php } ?>
                     <?php
                     $success = $this->session->flashdata('success');
                     if ($success) {
                     ?>
                        <div class="alert alert-success alert-dismissable">
                           <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                           <?php echo $this->session->flashdata('success'); ?>
                        </div>
                     <?php } ?>

                     <div class="row">
                        <div class="col-md-12">
                           <?php echo validation_errors('<div class="alert alert-danger alert-dismissable">', ' <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>'); ?>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="screen-reader-response"></div>
               <!-- <form action="#" method="post" class="wpcf7-form" novalidate="novalidate"> -->
               <form role="form" class="wpcf7-form" id="appointment-form" action="<?php echo base_url() ?>addedNewconnectDetails" method="post" role="form">
                  <div style="display: none;">
                     <input type="hidden" name="fromform" value="contactform" />
                     <!--  <input type="hidden" name="_wpcf7" value="7" />
                           <input type="hidden" name="_wpcf7_version" value="4.2.2" />
                           <input type="hidden" name="_wpcf7_locale" value="en_US" />
                           <input type="hidden" name="_wpcf7_unit_tag" value="wpcf7-f7-p367-o1" />
                           <input type="hidden" name="_wpnonce" value="bfbea92b91" /> -->
                  </div>
                  <div class="col-md-6 form-group">
                     <label class="sr-only">Full Name</label>
                     <span class="wpcf7-form-control-wrap your-name">
                        <input type="text" name="customerName" required value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required form-control" aria-required="true" aria-invalid="false" placeholder="Full Name" />
                     </span>
                  </div>
                  <!-- end form group -->
                  <div class="col-md-6 form-group">
                     <label class="sr-only">Email Address</label>
                     <span class="wpcf7-form-control-wrap your-email">
                        <input type="email" name="customerEmail" required value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email form-control" aria-required="true" aria-invalid="false" placeholder="Email Address" />
                     </span>
                  </div>
                  <!-- end form group -->
                  <div class="form-group col-md-12">
                     <label class="sr-only">Subject</label>
                     <span class="wpcf7-form-control-wrap your-subject">
                        <input type="text" name="your_subject" required value="" size="40" class="wpcf7-form-control wpcf7-text form-control" aria-invalid="false" placeholder="Subject" />
                     </span>
                  </div>
                  <!-- end form group -->
                  <div class="form-group col-md-12">
                     <span class="wpcf7-form-control-wrap your-message">
                        <textarea name="your_message" required cols="40" rows="5" class="wpcf7-form-control wpcf7-textarea form-control input-md" aria-invalid="false" placeholder="YOUR MESSAGE"></textarea>
                     </span>
                  </div>
                  <!-- end form group -->
                  <p class="event-btn-container col-md-12">
                     <input type="submit" value="SEND NOW" class="wpcf7-form-control wpcf7-submit btn custom-btn" />
                  </p>
                  <div class="wpcf7-response-output wpcf7-display-none"></div>
               </form>
            </div>
            <!-- end wpcf7 -->
         </div>
         <!-- end content wrapper -->
      </div>
      <!-- end contact section -->
   </div>
   <!-- end container -->
</div>
<!-- end contact us -->
<!--  start full width -->
<div class="full-width">
   <div class="row-fluid">
      <div class="content-section">
         <div class="content-wrapper">
            <div class="map-container">
               <div class="googleMaps google-map-container"></div>
               <div class="contact-info col-md-6 pull-right wow fadeInRight">
                  <div class="contact-person">
                     <h2>Contact Person</h2>
                     <img width="150" height="150" src="images/09/personimg02.jpg" class="img-circle" alt="team-3">
                     <div class="info">
                        <h3>Neelam Gupta</h3>
                        <span><b>TEL:</b> +88006691332584</span>
                        <br>
                        <span><b>Email:</b><a href="mailto:guptaneelam@hotmail.com" style="color:white">guptaneelam@hotmail.com</a></span>
                     </div>
                     <!-- /.info -->
                  </div>
                  <!-- /.contact-person -->
                  <div class="contact-information">
                     <h2>Contact Info</h2>
                     <div class="address">
                        <div class="media">
                           <div class="media-left"><i class="fa fa-map-marker base-color"></i></div>
                           <div class="media-body">Landfalløya 109 3023<br>Drammen, Norway
                              <br>
                           </div>
                        </div>
                        <!-- end media -->
                        <div class="media">
                           <div class="media-left"><i class="fa fa-clock-o base-color"></i>
                           </div>
                           <div class="media-body"><strong>Monday-Saturday :</strong> 08:00 am - 10:00 am (Aarti: 09:00)
                              <br />
                              <strong>Friday :</strong>18:00 - 20:00 (Aarti: 19:00)
                              <br />
                              <strong>Sunday Kirtan</strong>
                              <strong>14:00 - 16:00</strong>
                              <br />
                              Any additional services will be announced on our<br />notice board and on our website.
                           </div>
                           <!-- end media body -->
                        </div>
                     </div>
                     <!-- /.info -->
                  </div>
                  <!-- /.contact-person -->
               </div>
               <!-- end contact info -->
            </div>
            <!-- Google Map Section End -->
         </div>
         <!-- end content wrapper -->
      </div>
      <!-- end contect section -->
   </div>
   <!-- end row fluid -->
</div>
<!-- end full width -->
</div><!-- end container -->
</div><!-- end footer widget -->
<?php include('footerFront.php'); ?>