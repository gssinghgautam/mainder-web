
<?php include('headerFront.php'); ?>
<link rel='stylesheet' id="appoitment-form-css" href='<?php echo base_url(); ?>assets/front/css/booking.css' type='text/css' media='all' />
<style>
   select, input[type="number"], input[type="comment"], input[type="datetime-local"] {
    color: #666;
    border: 1px solid #ccc;
    padding: 3px;
    border-radius: 3px;
   }
</style>
      <!-- peace layout start. end in footer.php -->
      <div id="peace-layout">
      <!-- Blog Page Container -->
      
      <div class="main-container">
          <div class="fluid-container form-container">
             <div class="row">
                <div class="col-md-12">
                <div id="validationDiv" style='display:none'><div class="box box-primary"><div class="box-body"><div class="row"><div class="col-md-12"><div class="callout callout-danger"><h4>Unable to check!</h4><p id='dateValidationMsg'></p></div></div></div></div></div></div>
                <div id='availableRoomDiv'></div>

                <?php
                    $this->load->helper('form');
                    $error = $this->session->flashdata('error');
                    if($error)
                    {
                ?>
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <?php echo $this->session->flashdata('error'); ?>                    
                </div>
                <?php } ?>
                <?php  
                    $success = $this->session->flashdata('success');
                    if($success)
                    {
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
          <form role="form" class="appointment-form" id="appointment-form" action="<?php echo base_url() ?>addedNewBookingfront" method="post" role="form">
            
                <h2>Book An Appointment with Pandit Ji</h2>
                <div class="form-group-1">
                  <select  name="title" id="title"  required >
                     <option value="">
                        Select Title
                    </option>
                     <option value="Mr.">
                        Dr.
                    </option>
                     <option value="Mr.">
                        Mr.
                    </option>
                    <option value="Mr.">
                        Ms.
                    </option>
                    <option value="Mr.">
                        Mrs.
                    </option>
                  </select>
                   <input type="text" name="name" id="name" placeholder="Your Name" required />
                   <input type="email" name="email" id="email" placeholder="Email" required />
                   <input type="number" name="phone_number" id="phone_number" placeholder="Phone number" required />
                   <div class="select-list" style="margin-bottom: 0px;">
                      <select name="course_type" id="course_type">
                         <option slected value="">Select Pooja</option>
                         <?php
                           if(!empty($pujaNameList))
                           {
                              foreach ($pujaNameList as $rs)
                              {
                                    ?>
                                    <option value="<?php echo $rs->sizeId ?>"><?php echo $rs->sizeTitle ?></option>
                                    <?php
                              }
                           }
                           ?>                     
                      </select>
                   </div>
                   <!-- <label for="bookingTime">Birthday (date and time):</label> -->
                   <?php
                     $mindate = date("Y-m-d");
                     $mintime = date("h:i");
                     $min = $mindate."T".$mintime;
                     $maxdate = date("Y-m-d", strtotime("+10 Days"));
                     $maxtime = date("h:i");
                     $max = $maxdate."T".$maxtime;
                  ?>
                   <input type="text" id="bookingTime" name="bookingTime" placeholder="Booking Date and Time" min="<?php echo $min ?>">
                   <input type="text" name="address" id="address" placeholder="Addresss" required />
                   <textarea type="comment" name="detail" id="detail" placeholder="Details" required ></textarea>
                </div>
                <!-- <div class="form-check">
                   <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                   <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree to the  <a href="#" class="term-service">Terms and Conditions</a></label>
                </div> -->
                <div class="form-submit">
                   <input type="submit" name="submit" id="submit" class="submit" value="Request an appointment" />
                </div>
             </form>
          </div>
        </div>
        <script>
           jQuery(document).ready(function(){
               jQuery("#bookingTime").focus( function() {
                  jQuery(this).attr({type: 'datetime-local'});
               });
            });
            
      </script>
      <!-- blog page container -->
      <?php include('footerFront.php'); ?>