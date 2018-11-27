<script>
$(document).ready(function() {
    var max_fields      = 20; //maximum input boxes allowed
    var wrapper         = $(".input_fields_wrap"); //Fields wrapper
    var add_button      = $(".add_field_button"); //Add button ID
    var x = 1; //initlal text box count
    $('#add_field_button').click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
            $(wrapper).append('<div style="float:left; width:100%; margin-bottom:20px;"><input type="text" name="type[]"/><input type="text" name="plan1[]"/><input type="text" name="plan2[]"/><input type="text" name="plan3[]"/><input type="text" name="plan4[]"> <a href="#" class="remove_field btn btn-danger">Remove</a></div>'); //add input box
        }
    });
    
    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); x--;
    })
});
</script>
<div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2><?php echo $title; ?></h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="<?php echo base_url()?>admins/dashboard">Home</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url()?>admins/plan">Plans</a>
                        </li>
                        <li class="active">
                            <strong><?php echo $title;?></strong>
                        </li>
                    </ol>
                </div>
                <div class="col-lg-2">

                </div>
            </div>
            <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
<?php echo validation_errors('<div class="alert alert-danger" role="alert">','</div>');
      $error=$this->session->flashdata('error');
if (!empty($error))
      echo '<div class="alert alert-danger" role="alert">'. $error. '</div>';
$message=$this->session->flashdata('message');
if (!empty($message))
        echo '<div class="alert alert-success alert-dismissable" role="alert">'. $message. '</div>';
?>
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5><?php echo $title;?></h5>
                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                    <i class="fa fa-wrench"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-user">
                                    <li><a href="#">Config option 1</a>
                                    </li>
                                    <li><a href="#">Config option 2</a>
                                    </li>
                                </ul>
                                <a class="close-link">
                                    <i class="fa fa-times"></i>
                                </a>
                            </div>
                        </div>
                        <div class="ibox-content">
                            <?php echo form_open_multipart('','role="form"') ?>
                                    <div class="form-group">
                                        <label>Sub Category Name</label>
                                        <?php
                                        $data=array(''=>'Select Plan');
                                        foreach($sub_category as $list){
                                            $data[$list['category_id']]=$list['category_name'];
                                        }
                                        echo form_dropdown('spage',$data,set_value('spage'),'class="form-control" id="focusedinput"');
                                        ?>
                                      </div>
                                      <div class="form-group">
                                        <label></label>
                                          <input type="button" id="add_field_button" value="Add More Fields" class="btn btn-info" />
                                      </div>
                                     
                                     <div class="form-group input_fields_wrap">                                     
                                        <label>Page Title</label>                                        
                                        <div class="clear"></div>
                                        <div style="float:left; width:100%; margin-bottom:20px;"><input type="text" name="type[]"><input type="text" name="plan1[]"><input type="text" name="plan2[]"><input type="text" name="plan3[]"><input type="text" name="plan4[]"></div>
                                        <div class="clear"></div>
                                     </div>
                                     <div class="clear"></div>
                                     <div class="form-group">
                                        <?php echo form_submit('submit','Submit','class="btn btn-primary"');
                                        ?>
                                     </div>
                                    <?php echo form_close(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer">
    <div>
        <strong>Copyright</strong> Brutecorp &copy; <?php echo date('Y');?>
    </div>
</div>