<section class="section paralbackground page-banner" style="background-image:url('<?php echo base_url()?>resources/front/upload/page_banner_04.jpg');" data-img-width="2000" data-img-height="400" data-diff="100"></section>
<div class="section-title text-center">
<h3><span>Reset Password</span></h3>
<p class="last">
Please Enter Password.
</p>
</div>
<div class="mainer">
	<div class="forget-password">
		<?php $this->auth->create_token();
echo validation_errors('<div class="alert alert-danger" role="alert">','</div>');
$error=$this->session->flashdata('error');
if (!empty($error))
echo '<div class="alert alert-danger" role="alert">'. $error. '</div>';
$message=$this->session->flashdata('message');
if (!empty($message))
echo '<div class="alert alert-success alert-dismissable" role="alert">'. $message. '</div>';
?>
<?php echo form_open();?>
<div class="form-group">
	<label>Enter Password</label>
	<input type="password" name="new_password" class="form-control" placeholder="New Password">
</div>
<div class="form-group">
	<label>Confirm Password</label>
	<input type="password" name="confirm_password" class="form-control" placeholder="Confirm Password">
</div>
<?php 
echo form_hidden('token',$this->session->userdata('token'));
echo form_submit('Submit','Submit','class="btn btn-primary"');
echo form_close();?>
<div style="clear:both;"></div>
	</div>
</div>