
<script>
$(function() {
$( "#sortable" ).sortable();
});
</script>
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
            $(wrapper).append('<div class="ui-state-default" style="float:left;"><input type="text" name="type[]"/><input type="text" name="plan1[]"/><input type="text" name="plan2[]"/><input type="text" name="plan3[]"/><input type="text" name="plan4[]"/> <a href="#" class="remove_field btn btn-danger">Remove</a></div>'); //add input box
        }
    });
    
    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); x--;
    })
});
</script>
<?php foreach($plan_row_details as $key => $list){  ?>
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
                            <?php echo form_open_multipart('admins/plan/edit/'. $list['category_id'],'role="form"') ?>
                                        <div class="form-group">
                                            <label>Page Name</label>
                                            <?php                           
                                            $data=array(''=>'Select Subpage');
                                            foreach($spages as $key =>$list2){
                                                $data[$list2['category_id']]=$list2['category_name'];
                                            }
                                            echo form_dropdown('spage',$data,set_value('spage', isset($list['category_id']) ? $list['category_id'] : ''),'class="form-control"');
                                            ?>
                                        </div>
                                        
                                        <div class="form-group">
                                        <label></label>
                                        <input type="button" id="add_field_button" value="Add More Fields" class="btn btn-info"/>
                                        </div>
                                        <div class="form-group">
                                            <label>Page Title</label>
                                            <div id="sortable" class="input_fields_wrap" style="float:left; margin-bottom:10px;">
                                            <?php foreach($plan_details as $key => $list3){ ?>
                                            <div class="ui-state-default" style="float:left;"><?php echo form_input(array('name'=>'type[]','value'=>$list3['plan_feature_name'])) ?>
                                            <?php echo form_input(array('name'=>'plan1[]','value'=>$list3['plan_plan1'])) ?>
                                            <?php echo form_input(array('name'=>'plan2[]','value'=>$list3['plan_plan2'])) ?>
                                            <?php echo form_input(array('name'=>'plan3[]','value'=>$list3['plan_plan3'])) ?>
                                            <?php echo form_input(array('name'=>'plan4[]','value'=>$list3['plan_plan4'])) ?>
                                            <a href="#" class="remove_field btn btn-danger">Remove</a>
                                            </div>
                                            <?php } ?>
                                            </div>
                                        </div>
                                        <?php echo form_submit('submit','Submit','class="btn btn-primary"'); ?>
                                    <?php echo form_close(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
        <div class="footer">
    <div>
        <strong>Copyright</strong> Brutecorp &copy; <?php echo date('Y');?>
    </div>
</div>