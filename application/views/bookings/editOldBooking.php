<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      <i class="fa fa-book" aria-hidden="true"></i> Booking Management
        <small>Create / Edit Booking</small>
      </h1>
    </section>
    
    <section class="content">
	<div class="row">
            <!-- left column -->
            <div class="col-md-8">
              <!-- general form elements -->
                
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Enter Booking Details : <b><?= $bookingDetails->name ?></b> (<?= date('Y-m-d', strtotime($bookingDetails->bookStartDate)) ?> to <?= date('Y-m-d', strtotime($bookingDetails->bookEndDate)) ?>)</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    
                    <form role="form" id="editOldBooking" action="<?php echo base_url() ?>booking/updateOldBooking" method="post" role="form">
                        <div class="box-body">                          
                            <div class="row">
							    <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="roomId">Title</label>
                                        <input type="text" class="form-control" name="title" value="<?= $bookingDetails->title; ?>" id="title" placeholder="Title"  required /> 
                                        <input type="hidden" name='bookingId' id='bookingId' value='<?= $bookingDetails->bookingId ?>' />                                  
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="customerId">Your Name</label>
                                        <input type="text" class="form-control" name="name" value="<?= $bookingDetails->name; ?>" id="name" placeholder="Your Name" required />                                    
                                    </div>
                                </div>
                            </div>
                            <div class="row">
							    <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="roomId">Email</label>
                                        <input type="email" class="form-control" name="email" value="<?= $bookingDetails->email; ?>" id="email" placeholder="Email" required />                                   
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="customerId">Phone number</label>
                                        <input type="number" class="form-control" name="phone_number" value="<?= $bookingDetails->phone_number; ?>" id="phone_number" placeholder="Phone number" required />                                    
                                    </div>
                                </div>
                            </div>                       
                            <div class="row">
							    <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="course_type">Puja Title/Name</label>
                                        <select class="form-control" id="course_type" name="course_type" >
                                             <option value="">Select Puja Title/Name</option>
                                            <?php
                                            if(!empty($roomSizes))
                                            {
                                                foreach ($roomSizes as $rm)
                                                {
                                                    $selected3 = ($rm->sizeId == $bookingDetails->course_type) ? 'selected' : '';
                                                    ?>
                                                    <option value="<?= $rm->sizeId ?>" <?= $selected3 ?>><?= $rm->sizeTitle ?></option>
                                                    <?php
                                                }
                                            }
                                            ?> 
                                            </select>                                         
                                                                             
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="customerId">Booking Date and Time</label>
                                        <input type="datetime-local" class="form-control" id="bookingTime" name="bookingTime" value="<?= $bookingDetails->bookingTime; ?>" placeholder="Booking Date and Time">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
							    <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="roomId">Addresss</label>                                        
                                        <input type="text" class="form-control" name="address" value="<?= $bookingDetails->address; ?>" id="address" placeholder="Addresss" required />
                                    </div>
                                </div>
                               
                            </div>  
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="comments">Comments </label>
                                        <textarea name='comments' id="comments"><?php echo $bookingDetails->bookingComments; ?></textarea>
                                    </div>
                                </div>
                            </div>
                            
                        </div><!-- /.box-body -->
    
                        <div class="box-footer">
                            <input type="submit" class="btn btn-primary" value="Submit" />
                            <input type="reset" class="btn btn-default" value="Reset" />
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-4">
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
    </section>
</div>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bookings.js" charset="utf-8"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/tinymce/tinymce.min.js"></script>
<script type="text/javascript">
tinymce.init({
    selector: "textarea",
    plugins: [
        "advlist autolink lists link image charmap print preview anchor",
        "searchreplace visualblocks code fullscreen",
        "insertdatetime media table contextmenu paste"
    ],
    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
});
</script>