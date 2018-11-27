<div class="content">
        <?php $this->load->view('user_panel/user-topbar'); ?>
        <div class="main-content">
<?php 
echo validation_errors('<div class="alert alert-danger" role="alert">','</div>');
$error=$this->session->flashdata('error');
if (!empty($error))
echo '<div class="alert alert-danger" role="alert">'. $error. '</div>';
$message=$this->session->flashdata('message');
if (!empty($message))
echo '<div class="alert alert-success alert-dismissable" role="alert">'. $message. '</div>';	
echo $this->auth->create_token(); ?>
<ul class="nav nav-tabs">
  <li class="active"><a href="#home" data-toggle="tab">Change Password</a></li>
</ul>

<div class="row">
  <div class="col-md-4">
    <br>
    <?php echo form_open('','id="tab"')?>
    <div id="myTabContent" class="tab-content">
      <div class="tab-pane active in" id="home">
      
        <div class="form-group">
                                            <label>Old Password</label>
                                            <?php echo form_password(array('name'=>'old_password','id'=>'old_password','value'=>set_value('old_password'),'class'=>'form-control')) ?>
                                        </div>
                                        <div class="form-group">
                                            <label>New Password</label>
                                            <?php echo form_password(array('name'=>'new_password','id'=>'new_password','value'=>set_value('new_password'),'class'=>'form-control')) ?>
                                        </div>
                                        <div class="form-group">
                                            <label>Confirm Password</label>
                                            <?php echo form_password(array('name'=>'confirm_password','id'=>'confirm_password','value'=>set_value('confirm_password'),'class'=>'form-control')) ?>
                                        </div>
                                        
      </div>

      
    </div>

    <div class="btn-toolbar list-toolbar">
    <?php echo '<i class="fa fa-save"></i>'. form_submit('submit','Save','class="btn btn-primary"') ?>
    </div>
    <?php echo form_close() ?>
  </div>
</div>


            <?php $this->load->view('user_panel/user-footer'); ?>
        </div>
    </div>