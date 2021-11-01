<?php

$event_id = '';
$event_name = '';
$exp_date_time = '';
$short_desc = '';
$long_desc = '';

if(!empty($floorInfo))
{
    foreach ($floorInfo as $record)
    {
        $event_id = $record->event_id;
        $event_name = $record->event_name;
        $exp_date_time = $record->exp_date_time;
        $short_desc = $record->short_desc;
        $long_desc = $record->long_desc;
    }
}


?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Event Management
        <small>Edit Floor</small>
      </h1>
    </section>
    
    <section class="content">
    
        <div class="row">
            <!-- left column -->
            <div class="col-md-8">
              <!-- general form elements -->
                
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Enter Event Details</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    
                    <form role="form" id="addNewFloors" action="<?php echo base_url() ?>updateOldFloor" method="post" role="form">
                        <div class="box-body">
                        <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="event_name">Name</label>
                                        <input type="text" class="form-control" id="event_name" name="event_name" maxlength="10" value="<?php echo $event_name; ?>">
                                        <input type="hidden" value="<?php echo $event_id; ?>" name="event_id" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exp_date_time">Expiry Date and Time</label>
                                        <input type="datetime-local" class="form-control" id="exp_date_time" name="exp_date_time" value="<?php echo $exp_date_time; ?>">
                                    </div>
                                </div>
                              <!--   <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="image">Image</label>
                                        <input type="file" class="form-control" id="image" name="image" maxlength="50" value="<?php echo $event_name; ?>">
                                    </div>
                                </div> -->
                               <!--  <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="event_date_and_time">Date and Time</label>
                                        <input type="datetime-local" class="form-control" id="event_date_and_time" name="event_date_and_time" value="<?php echo $event_date_and_time; ?>">
                                    </div>
                                </div> -->
                            </div>
                            <div class="row">                             
                               
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="short_desc">Short Description</label>
                                        <input type="text" class="form-control" name='short_desc' id="short_desc" value="<?php echo $short_desc; ?>">                                       
                                    </div>
                                </div>
                            </div>                          
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="long_desc">Long Description</label>
                                        <textarea name="long_desc" id="long_desc" style="width:100%" value="<?php echo $long_desc; ?>"></textarea>
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