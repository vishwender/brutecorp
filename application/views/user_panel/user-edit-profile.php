<?php foreach($profile as $key => $list){ ?>
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
  <li class="active"><a href="#home" data-toggle="tab">Profile</a></li>
</ul>

<div class="row">
  <div class="col-md-4">
    <br>
    <?php echo form_open('','id="tab"')?>
    <div id="myTabContent" class="tab-content">
      <div class="tab-pane active in" id="home">
      
        								<div class="form-group">
                                            <label>Full Name*</label>
                                            <?php echo form_input(array('name'=>'name','id'=>'name','value'=>set_value('name', isset($list['user_fullname']) ? $list['user_fullname'] : ''),'class'=>'form-control')) ?>
                                        </div>
                                        <div class="form-group">
                                            <label>Name (On Bill)*</label>
                                            <?php echo form_input(array('name'=>'onbill','id'=>'onbill','value'=>set_value('onbill', isset($list['user_name_on_bill']) ? $list['user_name_on_bill'] : ''),'class'=>'form-control')) ?>
                                        </div>
                                        <div class="form-group">
                                            <label>Mobile No.*</label>
                                            <?php echo form_input(array('name'=>'mobile','id'=>'mobile','value'=>set_value('mobile', isset($list['user_mobile']) ? $list['user_mobile'] : ''),'class'=>'form-control')) ?>
                                        </div>
                                        <div class="form-group">
                                            <label>Address*</label>
                                            <?php echo form_textarea(array('name'=>'address','id'=>'address','value'=>set_value('address', isset($list['user_address']) ? $list['user_address'] : ''),'class'=>'form-control','rows'=>2)) ?>
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
<?php } ?>