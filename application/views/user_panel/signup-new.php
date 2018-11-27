<!--Slider Paralaxx Start Here-->		
<div class="slider-paralaxx" id="signup-bg">	


<!---728x90--->
<div class="mainer">
<div class="login-top left">
<?php echo validation_errors('<div class="alert alert-danger" role="alert">','</div>');
      $error=$this->session->flashdata('error');
if (!empty($error))
      echo '<div class="alert alert-danger" role="alert">'. $error. '</div>';
$message=$this->session->flashdata('message');
if (!empty($message))
        echo '<div class="alert alert-success alert-dismissable" role="alert">'. $message. '</div>';
?>
<h2>Sign Up</h2>

<form action="<?php echo base_url()?>user/usersignup" method="post">
<input type="text" name="username" class="name" placeholder="Choose Username" required="">
<input type="text" name="email" class="email" placeholder="Enter Your Email" required="">	
<input type="text" name="phone" class="phone" placeholder="Enter Your Number" required="">	
<input type="password" name="password" class="password" placeholder="Create Password" required="">										
<input type="submit" value="Create an account">

</form>
</div>	


<div class="login-top right">

<img src="<?php echo base_url();?>resources/front/images/logo.png" class="logo-login"/>

<h3><span>Already a user ?</span> <br/>Login Here</h3>
<br/>
<br/>
<form action="<?php echo base_url()?>user/home_login" method="POST">
<input type="text" class="email1 " name="username" placeholder="Username" required="">
<input type="password" class="password1" name="password"  placeholder="Password" required="">
<?php echo form_hidden('token', $this->session->userdata('token')) ?>
<input type="checkbox" id="brand" value="">
<label for="brand"><span></span> Remember me</label>
<div class="login-bottom">
<ul>
<li>
<a href="<?php echo base_url()?>user/forgot_password">Forgot password?</a>
</li>
<li>
<input type="submit" value="Login" name="submit">

</li>
<div class="clear"></div>
</ul>
</div>
</form>


</div>
<div style="clear:both;"></div>

<br/>

<p class="last"><strong><a href="<?php echo base_url()?>"><i class="fa fa-long-arrow-left" aria-hidden="true"></i> Back to Website</a></strong></p>


<br/><br/>

<div class="hfeatures">
<div class="row-elements row">

<h4>Our <span>Expertise</span></h4>
<div class="clearfix"></div>

<div class="col-md-2 col-sm-6 col-xs-6">
<div class="box GrayScale">
<div class="icon-container">
<img src="<?php echo base_url()?>resources/front/images/html-5.jpg" alt="" class="img-responsive">
</div>
</div><!-- end featurebox -->
</div><!-- end col -->

<div class="col-md-2 col-sm-6 col-xs-6">
<div class="box GrayScale">
<div class="icon-container">
<img src="<?php echo base_url()?>resources/front/images/codeigniter.jpg" alt="" class="img-responsive">
</div>
</div><!-- end featurebox -->
</div><!-- end col -->

<div class="col-md-2 col-sm-6 col-xs-6">
<div class="box GrayScale">
<div class="icon-container">
<img src="<?php echo base_url()?>resources/front/images/laravel.jpg" alt="" class="img-responsive">
</div>
</div><!-- end featurebox -->
</div><!-- end col -->

<div class="col-md-2 col-sm-6 col-xs-6">
<div class="box GrayScale">
<div class="icon-container">
<img src="<?php echo base_url()?>resources/front/images/google-ads.jpg" alt="" class="img-responsive">
</div>
</div><!-- end featurebox -->
</div><!-- end col -->

<div class="col-md-2 col-sm-6 col-xs-6">
<div class="box GrayScale">
<div class="icon-container">
<img src="<?php echo base_url()?>resources/front/images/bing-ads.jpg" alt="" class="img-responsive">
</div>
</div><!-- end featurebox -->
</div><!-- end col -->


<div class="col-md-2 col-sm-6 col-xs-6">
<div class="box GrayScale">
<div class="icon-container">
<img src="<?php echo base_url()?>resources/front/images/seo.jpg" alt="" class="img-responsive">
</div>
</div><!-- end featurebox -->
</div><!-- end col -->


</div>
</div><!-- end hfeatures -->






</div>
<!---728x90--->








<div style="clear:both;"></div>



</div>
<style>

/*
#signup-bg::before {

    position: absolute;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    content: '';
    background-image: -moz-linear-gradient(90deg, #bfceff 0%, #e1e8ff 80%, #f9faff 100%);
    background-image: -webkit-linear-gradient(90deg, #bfceff 0%, #e1e8ff 80%, #f9faff 100%);
    background-image: -ms-linear-gradient(90deg, #bfceff 0%, #e1e8ff 80%, #f9faff 100%);
    z-index: -1;

}
*/


.slider-paralaxx {
    /* background: url(http://demo.themewinter.com/html/seobin/images/slider/home-10-banner.png); */
    background-image: -moz-linear-gradient(90deg, #bfceff 0%, #e1e8ff 80%, #f9faff 100%);
    background-image: -webkit-linear-gradient(90deg, #bfceff 0%, #e1e8ff 80%, #f9faff 100%);
    background-image: -ms-linear-gradient(90deg, #bfceff 0%, #e1e8ff 80%, #f9faff 100%);
    background-size: 100%;
    height: 100%;
    background-repeat: no-repeat;
    padding: 40px 0px 40px 0px;
}

.logo-login {
    width: 70px;
    margin: -73px 0px -20px -20px;
    position: relative;
    float: left;
}

</style>