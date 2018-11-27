<style>
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
</style>
<div class="slider-paralaxx" style="background:url('<?php echo base_url() ?>resources/front/images/signup.jpg') #3a343e;background-size:100%;height:auto;background-repeat: no-repeat;" id="signup-bg">
<div class="section-title text-center">
<h3><span>Register</span> or <span>Login</span></h3>
<p class="last">
Listed below our awesome hosting packages. You can select any web hosting services below!<br> If your package not listed here don't forget to check our <strong><a href="#">hosting compose</a></strong> page.
</p>
</div>


<!---728x90--->
<div class="mainer">
<div class="login-top left">
<div class="social_icons">
<!-- Facebook -->
<div class="slide-social w3l">
<?php echo anchor('oauth/login/facebook','<div class="button">Facebook</div><div class="facebook icon"> <i class="facebook"></i> </div><div class="facebook slide"><p>Facebook</p></div><div class="clear"></div>');?>

<!-- 
<a href="">
<div class="button">Facebook</div>
<div class="facebook icon"> <i class="facebook"></i> </div>
<div class="facebook slide">
<p>Facebook</p>
</div>
<div class="clear"></div>
</a>-->
</div>

<!-- Twitter -->
<div class="slide-social w3l">
<a href="#">
<div class="button">Twitter</div>

<div class="twitter icon"> <i class="twitter"></i></div>
<div class="twitter slide">
<p>Twitter</p>
</div>
<div class="clear"></div>
</a> 
</div>

</div>
<?php
echo validation_errors('<div class="alert-danger">','</div>');
$error=$this->session->flashdata('error');
if (!empty($error))
echo '<div class="alert alert-danger" role="alert">'. $error. '</div>';
$message=$this->session->flashdata('message');
if (!empty($message))
echo '<div class="alert alert-success alert-dismissable" role="alert">'. $message. '</div>';
?>

<?php echo form_open(''); ?>
<?php echo form_input(array('name'=>'name', 'class'=>'name','id'=>'name','placeholder'=>'Your Name','value'=>set_value('name'))) ?>
<?php echo form_input(array('name'=>'email', 'class'=>'textbox','id'=>'email','placeholder'=>'Your Email','value'=>set_value('email'))) ?>
<?php echo form_password(array('name'=>'password', 'class'=>'password','id'=>'pass','placeholder'=>'Password','value'=>set_value('password'))) ?>
<?php echo form_password(array('name'=>'confirm_password','class'=>'password','id'=>'cpass','placeholder'=>'Confirm Password','value'=>set_value('confirm_password'))) ?>
<?php echo form_submit('submit','SIGN UP') ?>
<?php echo form_close(); ?>
</div>	


<div class="login-top right">
<h3>Login</h3>
<br/>
<br/>
<?php echo form_open('') ?>
                 <?php echo form_input(array('name'=>'username','placeholder'=>'User Name','value'=>set_value('username'))) ?>
                <?php echo form_password(array('name'=>'password','placeholder'=>'Password')) ?>
                <?php echo form_hidden('token', $this->session->userdata('token')) ?>
                
				<input type="checkbox" id="brand" value="">
				<label for="brand"><span></span> Remember me</label>
				<div class="login-bottom">
					<ul>
					<li>
					<?php echo anchor('user/forgot_password','Forgot Password?') ?>
					</li>
					<li>
						<?php echo form_submit('submit','LOGIN') ?>
					</li>
					<div class="clear"></div>
					</ul>
				</div>	
            
			
			</form>
			
</div>
<div style="clear:both;"></div>

</div>
<!---728x90--->

<div style="clear:both;"></div>



</div>


<style>span.red{ color:#F00;}</style>
<div class="container" id="container">
<!--===================Start left box-->
<div class="left-box" style="width:64%;">

<p style="padding:0px 0px 0px 100px;">
<?php echo img(aw_config_item('front'). 'images/signup.png') ?>
</p>

<div class="clear"></div>

</div>
<!--===================End left box-->

<style>
.enquirybox h2 {
color: #fff;
font-size: 30px;
font-weight: bold;
margin: 0px 0px -10px 0px;
text-align: center;
border: 0;
line-height: 71px;
background: url("http://www.brutecorp.com/resources/front/images/enquiry-title-bg.png") no-repeat #fff;
height: 115px;
overflow: hidden;
float: left;
width: 100%;
background-size: 100% 70%;
}
</style>


<!--===================start right bar-->

<div class="right-bar" style="width:34%;">
<!--Style Signup-->
<div class="signup">
<div class="enquirybox" id="signup">
<h2><span>Signup</span> Now</h2>
</div>
<?php
echo validation_errors('<div class="alert-danger">','</div>');
$error=$this->session->flashdata('error');
if (!empty($error))
echo '<div class="alert alert-danger" role="alert">'. $error. '</div>';
$message=$this->session->flashdata('message');
if (!empty($message))
echo '<div class="alert alert-success alert-dismissable" role="alert">'. $message. '</div>';
?>

<?php echo form_open(''); ?>
<p><label>Full Name<span class="red">*</span></label> <?php echo form_input(array('name'=>'name', 'class'=>'textbox','id'=>'name','value'=>set_value('name'))) ?> </p>
<p><label>Name (On Bill)<span class="red">*</span></label> <?php echo form_input(array('name'=>'onbill', 'class'=>'textbox','id'=>'onbill','value'=>set_value('onbill'))) ?> </p>
<p><label>Username<span class="red">*</span></label> <?php echo form_input(array('name'=>'username', 'class'=>'textbox','id'=>'name','value'=>set_value('username'))) ?> </p>
<p><label>Email Address<span class="red">*</span></label> <?php echo form_input(array('name'=>'email', 'class'=>'textbox','id'=>'email','value'=>set_value('email'))) ?></p>
<p><label>Phone No<span class="red">*</span></label> <?php echo form_input(array('name'=>'phone', 'class'=>'textbox','id'=>'phone','value'=>set_value('phone'))) ?></p>
<p><label>DOB</label> <?php echo form_input(array('name'=>'dob', 'class'=>'textbox','id'=>'dob','value'=>set_value('dob'))) ?></p>
<p><label>Website URL<span class="red">*</span></label><?php echo form_input(array('name'=>'url', 'class'=>'textbox','id'=>'url','value'=>set_value('url'))) ?></p>
<p><label>Password<span class="red">*</span></label> <?php echo form_password(array('name'=>'password', 'class'=>'textbox','id'=>'pass','value'=>set_value('password'))) ?></p>
<p><label>Confirm Pass<span class="red">*</span></label> <?php echo form_password(array('name'=>'confirm_password', 'class'=>'textbox','id'=>'cpass','value'=>set_value('confirm_password'))) ?></p>
<p><label>Address<span class="red">*</span></label><?php echo form_textarea(array('name'=>'address', 'class'=>'textbox','id'=>'address','value'=>set_value('address'),'rows'=>4)) ?></p>
<p><label>Referred by</label> <?php echo form_input(array('name'=>'refer', 'class'=>'textbox','id'=>'refer','value'=>set_value('refer'))) ?></p>
<p><label></label><?php echo form_submit('submit','Submit','class="button"') ?></p>
<?php echo form_close(); ?>

</div>
<!--End Signup-->


</div>
<!--===================End right bar-->



<div class="clear"></div>

</div>
<!--==============|End Container|-->