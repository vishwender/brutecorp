<!-- <style>
.after-header {background: rgba(0, 71, 143, 0.89) none repeat scroll 0 0;}
#franchise-bg h1 {color: #0c2c4d;text-shadow: 0px 0px 0px;}
#franchise-bg h3{margin-bottom: 10px;color: #313131;font-size: 19px;}

#signup-form {background: rgba(8, 71, 135, 0.85)!important;padding: 40px 50px;box-shadow: 0px 0px 60px rgba(0, 0, 0, 0.2);}
#franchise-bg h3 {margin-bottom: 0px;color: #ffffff;font-size: 26px;}

#frenchise-form .btn.btn-primary.btn-block {background: #313131;border: 1px solid #313131;}
#frenchise-form .form-control {color: #313131;background: rgb(234, 232, 232)!important;border: 4px double #d8d6d6!important;}
#frenchise-form p {color: #565656;}
#franchise-bg ul li {font-size: 16px;line-height: 40px;    list-style: none;}
#absluid .list-unstyled li i {color: #00478f;}
.slider-paralaxx {
    background: #00468e;
    padding: 100px 0px 100px 0px;
}
.box-feature-02 {background-color: #daecff;}
.box-feature-01 {background-color: #b1d6fd;}
.box-feature-04 {background-color: #bfd5ec;}
.box-feature-03 {background-color: #98c0ea;}
</style> -->
        <section class="section paralbackground page-banner" style="background-image:url('<?php echo base_url()?>resources/front/upload/page_banner_04.jpg');" data-img-width="2000" data-img-height="400" data-diff="100">
        </section><!-- end section -->
<div class="section-title text-center">
<h3><span>Forgot Password</span></h3>
<p class="last">
Please Enter Your registered email address.
</p>
</div>


<!---728x90--->
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
<?php echo form_open('','id="RegisterUserForm"'); ?>
<fieldset>
<div class="form-group">
<label>Email Address</label>
<?php echo form_input(array('name'=>'email','id'=>'email','class'=>'form-control','value'=>set_value('email'),'placeholder'=>'Your Email')); ?>
</div>

<div class="form-group">
<label></label>
<?php 
echo form_hidden('token',$this->session->userdata('token'));
echo form_submit('Submit','Submit','id="registerNew" class="btn btn-primary"'); 
echo form_close();?>
</div>
</fieldset>
</div>	



<div style="clear:both;"></div>

</div>
<!---728x90--->

<div style="clear:both;"></div>



</div>