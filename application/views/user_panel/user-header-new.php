<div id="wrapper">
    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element"> <span>
                            <img alt="image" class="img-circle" height="50px" width="50px"  src="<?php echo base_url();?>resources/uploads/<?php  if(empty($profile[0]['user_image'])){echo 'dummy-profile-pic.png';}else{ echo $profile[0]['user_image']; } ?>" />
                             </span>
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold"><?php echo $_SESSION['user_username'];?></strong>
                             </span> <span class="text-muted text-xs block">Brutecorp User<b class="caret"></b></span> </span> </a>
                        <ul class="dropdown-menu animated fadeInRight m-t-xs">
                            <li><a href="#">Profile</a></li>
                            <li><a href="#">Contacts</a></li>
                            <li><a href="#">Mailbox</a></li>
                            <li class="divider"></li>
                            <li><a href="<?php echo base_url()?>user/logout">Logout</a></li>
                        </ul>
                    </div>
                    <div class="logo-element">
                        IN+
                    </div>
                </li>
                <li class="active">
                    <a href="<?php echo base_url()?>user/dashboard"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboards</span></a>
                </li>
                <li>
                    <a href="<?php echo base_url()?>user/order_list"><i class="fa fa-shopping-cart"></i> <span class="nav-label">Order List</span></a>
                </li>
                <li>
                    <a href="<?php echo base_url()?>user/invoice"><i class="fa fa-inr"></i> <span class="nav-label">Invoice Details</span></a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-briefcase"></i> <span class="nav-label">Account</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li><a href="<?php echo base_url()?>user/edit_profile">Edit Profile</a></li>
                        <li><a href="<?php echo base_url()?>user/change_password">Change Password</a></li>
                    </ul>
                </li>
            </ul>

        </div>
    </nav>