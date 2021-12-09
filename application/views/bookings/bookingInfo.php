<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <i class="fa fa-book" aria-hidden="true"></i> Booking Management
            <small>View Booking</small>
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
                                        <label for="startDate">From Date</label>
                                        <div class="input-group">
                                            <input type="text" id="startDate" name="startDate" value="<?= date('Y-m-d', strtotime($bookingDetails->bookStartDate)); ?>" class="form-control" placeholder="yyyy-mm-dd" autocomplete="off" readonly />
                                            <input type="hidden" name='bookingId' id='bookingId' value='<?= $bookingDetails->bookingId ?>' />
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="endDate">To Date</label>
                                        <div class="input-group">
                                            <input type="text" id="endDate" name="endDate" value="<?= date('Y-m-d', strtotime($bookingDetails->bookEndDate)); ?>" class="form-control" placeholder="yyyy-mm-dd" autocomplete="off" readonly />
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr />
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="roomId">Title</label>
                                            <input type="text" class="form-control" name="title" value="<?= $bookingDetails->title; ?>" id="title" placeholder="Title" readonly />
                                            <input type="hidden" name='bookingId' id='bookingId' value='<?= $bookingDetails->bookingId ?>' />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="customerId">Your Name</label>
                                            <input type="text" class="form-control" name="name" value="<?= $bookingDetails->name; ?>" id="name" placeholder="Your Name" readonly />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="roomId">Email</label>
                                            <input type="email" class="form-control" name="email" value="<?= $bookingDetails->email; ?>" id="email" placeholder="Email" readonly />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="customerId">Phone number</label>
                                            <input type="number" class="form-control" name="phone_number" value="<?= $bookingDetails->phone_number; ?>" id="phone_number" placeholder="Phone number" readonly />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="course_type">Puja Title/Name</label>
                                            <select class="form-control" id="course_type" name="course_type" readonly style='pointer-events:none'>
                                                <option value="">Select Puja Title/Name</option>
                                                <?php
                                                if (!empty($roomSizes)) {
                                                    foreach ($roomSizes as $rm) {
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
                                            <input type="text" class="form-control" id="bookingTime" name="bookingTime" value="<?= $bookingDetails->bookingTime; ?>" placeholder="Booking Date and Time" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="roomId">Addresss</label>
                                            <input type="text" class="form-control" name="address" value="<?= $bookingDetails->address; ?>" id="address" placeholder="Addresss" readonly />
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="comments">Comments </label>
                                            <textarea name='comments' id="comments" autocomplete="off" readonly><?php echo $bookingDetails->bookingComments; ?></textarea>
                                        </div>
                                    </div>
                                </div>

                            </div><!-- /.box-body -->


                        </div><!-- /.box-body -->
                        <?php if($bookingDetails->accept_rejected =='0') {?>
                        <div class="box-footer">
                            <!--  <input type="button" class="btn btn-primary" value="Action" /> -->
                            <!-- <input type="reset" class="btn btn-default" value="Reset" /> -->
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter" title="Accept/Reject Booking">
                                Action
                            </button>
                        </div>
                        <?php } ?>
                    </form>
                </div>
            </div>
            <div class="col-md-4">
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
                    <script>alertMessage('<?php echo $this->session->flashdata('error'); ?>', 'error');</script>
                    <div class="alert alert-danger alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <?php echo $this->session->flashdata('error'); ?>
                    </div>
                <?php } ?>
                <?php
                $success = $this->session->flashdata('success');
                if ($success) {
                ?>
                    <script>alertMessage('<?php echo $this->session->flashdata('success'); ?>', 'success');</script>
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

<!-- Modal Start for Action-->

<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <form role="form" id="actionBooking" action="<?php echo base_url() ?>booking/actionBooking" method="post" role="form">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Accept / Reject Booking</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="startDate">From Date</label>
                                <div class="input-group">
                                    <input type="text" id="startDate" name="startDate" value="<?= date('Y-m-d', strtotime($bookingDetails->bookStartDate)); ?>" class="form-control" placeholder="yyyy-mm-dd" autocomplete="off" readonly />
                                    <input type="hidden" name='bookingId' id='bookingId' value='<?= $bookingDetails->bookingId ?>' />
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="endDate">To Date</label>
                                <div class="input-group">
                                    <input type="text" id="endDate" name="endDate" value="<?= date('Y-m-d', strtotime($bookingDetails->bookEndDate)); ?>" class="form-control" placeholder="yyyy-mm-dd" autocomplete="off" readonly />
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr />
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="course_type">Puja Title/Name</label>
                                <select class="form-control" id="course_type" name="course_type" readonly style='pointer-events:none'>
                                    <option value="">Select Puja Title/Name</option>
                                    <?php
                                    if (!empty($roomSizes)) {
                                        foreach ($roomSizes as $rm) {
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
                        <div class="col-lg-6">
                            <label style="background: yellow;">Action</label>
                            <select name="accept_rejected" class="form-control"  id="approval_data" required>
                                <option value="">Action</option>
                                <option value="1">Approved</option>
                                <option value="2">Rejected</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <label>Action Comment</label>
                            <textarea class="form-control" name="comment_action" id="approval_data_comment" value="" required></textarea>
                        </div>
                    </div>
                    <br />
                </div>
                <div class="modal-footer">                   
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Action</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal END for Action-->

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bookings.js" charset="utf-8"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/tinymce/tinymce.min.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/js/common.js" charset="utf-8"></script>
<script type="text/javascript">
 jQuery(document).ready(function() {
        $("#approval_data").change(function() {
            var status = this.value;
            //alert(status);
            if (status == "1")
                // $("#icon_class, #background_class").hide();// hide multiple sections          
                $('#approval_data_comment').removeAttr('required');
        });

    });
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