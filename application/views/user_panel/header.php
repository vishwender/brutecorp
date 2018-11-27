<!--Start Topbar-->
<div class="topbar">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-12 text-left cenmobile">
                        <div class="topmenu">
                            <span><i class="fa fa-envelope-o"></i> <a href="mailto:#">hello@hosthubs.com</a></span>
                            <span><i class="fa fa-phone-square"></i> 1-900-324-5467</span>
                            <span class="hidden-xs"><i class="fa fa-comments-o"></i> <a href="hosting-chat.html">Online Chat</a></span>
                        </div><!-- end callus -->
                    </div>

<div class="col-md-6 col-sm-12 text-right cenmobile">
<span class="top-Num">Call now: <a href="tel:+91 8872715999">+91-887 271 5999</a></span>
</div><!-- end col -->
	
<style>
.top-Num {padding: 15px 20px;font-weight: 600;color: #000;}
.top-Num a {font-weight: bold;}
</style>	
		
      </div><!-- end row -->
      </div><!-- end topbar -->
</div>
<!--End Topbar-->

<header class="header">
<div class="container-fluid">
<nav class="navbar navbar-default yamm">
<div class="container">
<div class="navbar-header">
<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
<span class="sr-only">Toggle navigation</span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</button>
<?php echo anchor('',img(array('src'=>aw_config_item('front'). 'images/logo.png','class'=>'navbar-brand'))) ?>
</div>

<div id="navbar" class="navbar-collapse collapse">
	<ul class="nav navbar-nav">
        <li><?php echo anchor('','Home ') ?></li>
		
		<li class="dropdown has-submenu"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
Services <span class="fa fa-angle-down"></span></a>
			<ul class="dropdown-menu">
			<?php 
				$category=$this->front_model->select_row_where_db('bc_sv_category',array('category_parent_id =0'),'*','category_sort','asc');
				foreach($category as $key => $list){?>
					
					<?php $subcategory=$this->front_model->select_row_where_db('bc_sv_category',array('category_parent_id ="'. $list['category_id'] . '"'),'*','category_sort','asc'); ?>
					<li><?php echo anchor('services/'. $list['category_slug'],count($subcategory)?'<span class="fa fa-angle-right"></span>'.$list['category_name']:$list['category_name']) ?>
					<?php					
					if (count($subcategory)>0){echo '<ul class="dropdown-menu">';}
					foreach($subcategory as $key2 => $list2){?>
						
						<li class="dropdown"><?php echo anchor('services/'. $list2['category_slug'],$list2['category_name']) ?>
					<?php } if (count($subcategory)>0){echo '</ul>';} ?>
					</li>	
			<?php } ?>
			</ul>
		</li>
		<li><?php echo anchor('portfolio','Our Portfolio ') ?></li>
        <li><?php echo anchor('contactus','Contacts ') ?></li>
		
	</ul>
	
<ul class="nav navbar-nav navbar-right hidden-xs">
    <?php if(isset($logged_in) == TRUE)
    { ?>
        <li class="dropdown searchmenu hasmenu">
            <a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dashboard <i class="fa fa-angle-down"></i></a>
            <ul class="dropdown-menu show-right">
                <li><a href="<?php echo base_url();?>user/dashboard">View Dashboard</a></li>
                <li><a href="<?php echo base_url();?>user/logout">Logout</a></li>
            </ul>
        </li>
    <?php
    }
    else
    { ?>
       <li class="dropdown searchmenu hasmenu">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> Sign In <i class="fa fa-angle-down"></i></a>
        <ul class="dropdown-menu show-right">
        <li>
            <div id="custom-search-input">
            <div class="input-group col-md-12">
            <?php echo form_open('user/home_login') ?>
            <?php echo form_input(array('name'=>'username','class'=>'form-control input-lg','placeholder'=>'User Name','value'=>set_value('username'))) ?>
            <?php echo form_password(array('name'=>'password','placeholder'=>'Password','class'=>'form-control input-lg')) ?>
            <?php echo form_hidden('token', $this->session->userdata('token')) ?>
            <label><?php echo anchor('user/forgot_password','Forgot Password?') ?></label>
            <?php echo form_submit('submit','Login Account','class="btn btn-primary btn-block"') ?>
            <?php echo form_close();?>
            </div>
            </div>
        </li>
        </ul>
    </li> 
    <?php } ?>
    <li><a href="<?php echo base_url();?>cart" role="button">Cart<i class="fa fa-shopping-cart" aria-hidden="true"></i></a></li>
</ul>
</div><!--/.nav-collapse -->
</div><!--/.container-fluid -->
</nav><!-- end nav -->
</div><!-- end container -->
</header>

<div class="after-header">
            <div class="container"> 
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <ul class="list-inline text-center">
                            <li><a href="#">Digital Marketing</a></li>
                            <li><a href="#">Franchise Opportunity</a></li>
                            <li><a href="#">Website Starts in Rs.999/-</a></li>
                            <li class="active"><b><?php echo anchor('digitalmarketing','Digital Marketing') ?></b></li>
                        </ul>
                    </div>
                </div><!-- end row -->
            </div><!-- end container -->
        </div>