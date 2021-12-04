<?php
$selected = "selected='selected'";
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <i class="fa fa-book" aria-hidden="true"></i> Appointments
            
        </h1>
    </section>
    <br>
    <section class="content">

        <form action="<?php echo base_url() ?>bookings" method="POST" id="searchList">
            <div class="row form-group">
                <div class="col-md-2">
                    <select class="form-control input-sm" id="accept_rejected" name="accept_rejected">
                        <option value="">Select Type</option>
                        <option value="0">All</option>
                        <option value="1">Accepted</option>
                        <option value="2">Rejected</option>
                        </option>
                    </select>
                </div>
                <div class="col-md-2">
                    <div class="input-group">
                        <input type="text" id="startDate" name="startDate" value="" class="form-control input-sm" placeholder="yyyy-mm-dd" autocomplete="off" />
                        <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="input-group">
                        <input type="text" id="endDate" name="endDate" value="" class="form-control input-sm" placeholder="yyyy-mm-dd" autocomplete="off" />
                        <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <input type="text" name="customerName" value="<?= $customerName; ?>" class="form-control input-sm" placeholder="Customer Name" autocomplete="off" />
                </div>
                <div class="col-md-2">
                    <input type="text" name="mobileNumber" value="<?= $mobileNumber; ?>" class="form-control input-sm" placeholder="Mobile Number" autocomplete="off" />
                    <!-- <button class="btn btn-sm btn-block btn-default searchList"><i class="fa fa-search"></i></button> -->
                </div>
                <div class="col-md-2">
                    <button class="btn btn-sm btn-primary btn-block searchList"><i class="fa fa-search"></i></button>
                </div>
            </div>
            <!--  <div class="row"> </div> -->
        </form>
        <br>
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header" style='padding-bottom: 15px'>
                        <h3 class="box-title">Booking List</h3>
                        <div class="box-tools">
                        </div>
                    </div><!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                            <tr>
                                <!-- <th>Title</th> -->
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Pooja Type</th>
                                <th>Booking Date & time</th>
                                <th>Addresss</th>
                                <th>Accepted/Rejected</th>
                                <th class="text-center">Actions</th>
                            </tr>

                            <?php
                            if (!empty($bookingRecords)) {
                                foreach ($bookingRecords as $record) {
                            ?>
                                    <tr>
                                        <!-- <td><?= $record->title ?></td> -->
                                        <td><?= $record->name ?></td>
                                        <td><?= $record->email ?></td>
                                        <td><?= $record->phone_number ?></td>
                                        <td><?= getpujaName($record->course_type); ?></td>
                                        <td><?= $record->bookingTime ?></td>
                                        <td><?= $record->address ?></td>
                                        <td><?php
                                            if ($record->accept_rejected == '1') {
                                                echo "<p style='color:#218838;'> Accpted</p>";
                                            } else if ($record->accept_rejected == '2') {
                                                echo "<p style='color:#bd2130;'> Rejected</p>";
                                            } else {
                                            ?>
                                                <p style='color:#d39e00;'><a href="" data-toggle="modal" data-target="#exampleModalCenter" title="Accept/Reject Booking"> Action</a></p>
                                                
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
                                    <input type="text" id="startDate" name="startDate" value="<?= date('Y-m-d', strtotime($record->bookStartDate)); ?>" class="form-control" placeholder="yyyy-mm-dd" autocomplete="off" readonly />
                                    <input type="hidden" name='bookingId' id='bookingId' value='<?= $record->bookingId ?>' />
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
                                    <input type="text" id="endDate" name="endDate" value="<?= date('Y-m-d', strtotime($record->bookEndDate)); ?>" class="form-control" placeholder="yyyy-mm-dd" autocomplete="off" readonly />
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
                                            $selected3 = ($rm->sizeId == $record->course_type) ? 'selected' : '';
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
                            <input type="hidden" name='bookingId' id='bookingId' value='<?= $record->bookingId ?>' />
                            <select name="accept_rejected" class="form-control" id="approval_data" required>
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

                                            <?php } ?>
                                        </td>
                                        <td class="text-center">
                                           <!--  <a href="<?php echo base_url() . 'booking/bookingInfo/' . $record->bookingId; ?>" class="btn btn-sm btn-warning" title="Information"><i class="fa fa-info-circle"></i></a> -->
                                            <a href="<?php echo base_url() . 'booking/editOldBooking/' . $record->bookingId; ?>" class="btn btn-sm btn-info" title="Edit"><i class="fa fa-pencil"></i></a>
                                            <a href="" data-bookid="<?php echo $record->bookingId; ?>" class="deleteBooking btn btn-sm btn-danger" title="Delete"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                            <?php
                                }
                            } ?>
                        </table>

                    </div><!-- /.box-body -->
                    <div class="box-footer clearfix">
                        <?php echo $this->pagination->create_links(); ?>
                    </div>
                </div><!-- /.box -->
            </div>
        </div>
    </section>
</div>
<script type="text/javascript" src="<?= base_url() ?>assets/js/common.js" charset="utf-8"></script>
<script type="text/javascript">
    jQuery(document).ready(function() {
        var nowDate = new Date();
        var today = new Date(nowDate.getFullYear(), nowDate.getMonth(), nowDate.getDate(), 0, 0, 0, 0);
        jQuery('#startDate, #endDate').datepicker({
            autoclose: true,
            todayHighlight: true,
            format: 'yyyy-mm-dd'
            // startDate : today
        });
        jQuery('ul.pagination li a').click(function(e) {
            e.preventDefault();
            var link = jQuery(this).get(0).href;
            var value = link.substring(link.lastIndexOf('/') + 1);
            jQuery("#searchList").attr("action", baseURL + "bookings/" + value);
            jQuery("#searchList").submit();
        });

        $("#approval_data").change(function() {
            var status = this.value;
            //alert(status);
            if (status == "1")
                // $("#icon_class, #background_class").hide();// hide multiple sections          
                $('#approval_data_comment').removeAttr('required');
        });

    });
</script>