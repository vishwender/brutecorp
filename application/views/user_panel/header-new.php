<div class="topbar">
            <div class="container">
                <div class="row">
                    <div class="col-md-6  col-md-offset-2 col-sm-12 text-left cenmobile">
                        <div class="topmenu">
                            <span><i class="fa fa-envelope-o"></i> <a href="mailto:#">info@brutecorp.com</a></span>
                            <span><i class="fa fa-phone-square"></i>+91-887 271 5999</span>
                            <!-- <span class="hidden-xs"><i class="fa fa-comments-o"></i> 
                                <a href="hosting-chat.html">Online Chat</a></span> -->
                        </div><!-- end callus -->
                    </div>

<div class="col-md-4 col-sm-12 text-right cenmobile">
<span class="top-Num">Call now: <a href="tel:+91 8872715999">+91-887 271 5999</a></span>
</div><!-- end col -->
	
					
                </div><!-- end row -->
            </div><!-- end topbar -->
        </div><!-- end topbar -->
        <header class="header">
<div class="container-fluid">
<nav class="navbar navbar-default yamm">
<div class="container">

<div class="navbar-header">
<a class="navbar-brand" href="<?php echo base_url()?>"><img src="<?php echo base_url();?>resources/front/images/logo.png" class="logo-X" alt=""></a>
</div>


<div class="col align-self-end">


<div class="icon-box">
<i class="fa fa-life-ring" aria-hidden="true"></i>
<span><b><a href="<?php echo base_url();?>contactus">Live Support</a></b></br><font>24X7 Support</font></span>
</div>

<div class="icon-box">
<i class="fa fa-paper-plane" aria-hidden="true"></i>
<span><b><a href="<?php echo base_url();?>contactus">Get Quotation</a></b></br><font>Call you in 24 Hrs</font></span>
</div>


</div>


</div><!--/.container-fluid -->
</nav><!-- end nav -->
</div><!-- end container -->
</header><!-- end header -->

<div class="after-header">
<div class="container"> 
<div class="row">
<div class="col-md-11 col-md-offset-1">

<div id='cssmenu'>
<ul>
<li><a href='<?php echo base_url();?>'>Home</a></li>
<li class="dropdown has-submenu">
    <a href="#">Services</a>
            <ul>
            <?php 
                $category=$this->front_model->select_row_where_db('bc_sv_category',array('category_parent_id =0'),'*','category_sort','asc');
                foreach($category as $key => $list){?>
                    
                    <?php $subcategory=$this->front_model->select_row_where_db('bc_sv_category',array('category_parent_id ="'. $list['category_id'] . '"'),'*','category_sort','asc'); ?>
                    <li><?php echo anchor('services/'. $list['category_slug'],count($subcategory)?''.$list['category_name']:$list['category_name']) ?>
                    <?php                   
                    if (count($subcategory)>0){echo '<ul>';}
                    foreach($subcategory as $key2 => $list2){?>
                        
                        <li><?php echo anchor('services/'. $list2['category_slug'],$list2['category_name']) ?>
                    <?php } if (count($subcategory)>0){echo '</ul>';} ?>
                    </li>   
            <?php } ?>
            </ul>
        </li>
        
        <li><a href="<?php echo base_url()?>services/digital-marketing">Digital Marketing</a></li>
        <li><a href="<?php echo base_url();?>services/franchise">Franchise Opportunity</a></li>
        <li><a href='<?php echo base_url();?>aboutus'>About</a></li>
        <li><a href='<?php echo base_url();?>contactus'>Contact</a></li>
        <!-- <li><a href="#">Website Starts in Rs.999/-</a></li> -->

<?php if(isset($logged_in) == true)
{ ?>
<li class="dropdown has-submenu navbar-right">
    <a href="#">Welcome <?php echo $_SESSION['user_username']; ?></a>
    <ul>
        <li><a href='<?php echo base_url();?>user/dashboard'>View Dashboard</a></li>
        <li><a href="<?php echo base_url();?>cart">View Cart</a></li>
        <li><a href='<?php echo base_url();?>user/home_logout'>Logout</a></li>
    </ul>
</li> 
<?php 
}else
{ ?>
    <li><a href="<?php echo base_url()?>user/usersignup">Signup</a></li>
<?php 
}
?>
</ul>
</div>


</div>
</div><!-- end row -->
</div><!-- end container -->
</div><!-- end after-header -->


<link rel="stylesheet" href="<?php echo base_url();?>resources/front/css3/animate.css" />
<link rel="stylesheet" href="<?php echo base_url();?>resources/front/css3/icofonts.css" />
<link rel="stylesheet" href="<?php echo base_url();?>resources/front/css3/custom-slider.css">
<link rel="stylesheet" href="<?php echo base_url();?>resources/front/css3/responsive.css">