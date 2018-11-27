<?php foreach($profile as $key => $list){ ?>
<div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2><?php echo $title;?></h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="<?php echo base_url()?>user/dashboard">Home</a>
                        </li>
                        <li>
                            <a>Account</a>
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
                <div class="col-lg-6">
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
                            <?php echo form_open_multipart();?>
                                <div class="form-group">
                                            <label>Full Name</label>
                                            <?php echo form_input(array('name'=>'name','id'=>'name','value'=>set_value('name', isset($list['user_fullname']) ? $list['user_fullname'] : ''),'class'=>'form-control')) ?>
                                        </div>
                                        <div class="form-group">
                                            <label>Name (On Bill)</label>
                                            <?php echo form_input(array('name'=>'onbill','id'=>'onbill','value'=>set_value('onbill', isset($list['user_name_on_bill']) ? $list['user_name_on_bill'] : ''),'class'=>'form-control')) ?>
                                        </div>
                                        <div class="form-group">
                                            <label>Email</label>
                                            <?php echo form_input(array('name'=>'email','id'=>'email','value'=>set_value('email', isset($list['user_email']) ? $list['user_email'] : ''),'class'=>'form-control')) ?>
                                        </div>
                                        <div class="form-group">
                                            <label>Mobile No.</label>
                                            <?php echo form_input(array('name'=>'mobile','id'=>'mobile','value'=>set_value('mobile', isset($list['user_mobile']) ? $list['user_mobile'] : ''),'class'=>'form-control')) ?>
                                        </div>
                                        <div class="form-group">
                                            <label>Address</label>
                                            <?php echo form_textarea(array('name'=>'address','id'=>'address','value'=>set_value('address', isset($list['user_address']) ? $list['user_address'] : ''),'class'=>'form-control','rows'=>2)) ?>
                                        </div>
                                        <div class="form-group">
                                            <label>City</label>
                                            <?php echo form_input(array('name'=>'city','id'=>'city','value'=>set_value('city', isset($list['user_city']) ? $list['user_city'] : ''),'class'=>'form-control')) ?>
                                        </div>
                                        <div class="form-group">
                                            <label>State</label>
                                            <?php echo form_input(array('name'=>'state','id'=>'state','value'=>set_value('state', isset($list['user_state']) ? $list['user_state'] : ''),'class'=>'form-control')) ?>
                                        </div>
                                        <div class="form-group">
                                            <label>Pin</label>
                                            <?php echo form_input(array('name'=>'pin','id'=>'pin','value'=>set_value('pin', isset($list['user_zip']) ? $list['user_zip'] : ''),'class'=>'form-control')) ?>
                                        </div>
                                        <div class="form-group">
                                            <label>Date of Birth</label>
                                            <?php echo form_input(array('name'=>'dob','id'=>'datepicker','value'=>set_value('dob', isset($list['user_dob']) ? $list['user_dob'] : ''),'class'=>'form-control')) ?>
                                        </div>
                                        <div class="form-group">
                                            <label>Status</label>
                                            <?php echo form_input(array('name'=>'status','id'=>'status','value'=>set_value('status', isset($list['user_status']) ? $list['user_status'] : ''),'class'=>'form-control','disabled'=>'disabled')) ?>
                                        </div>
                                        <div class="form-group">
                                            <label>Profile Pic</label>
                                            <?php echo form_upload(array('name'=>'userfile','class'=>'form-control'));?>
                                        </div>
                            <?php echo form_submit('submit','Update','class="btn btn-primary"') ?>            
                            <?php echo form_close(); ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Profile Pic</h5>
                        </div>
                        <div class="ibox-content">
                            <div>
                                <img alt="image" class="img-responsive" src="<?php echo base_url()?>resources/uploads/<?php if(empty($list['user_image'])){echo 'dummy-profile-pic.png';}else{echo $list['user_image'];}?>">
                            </div>
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
<?php } ?>
