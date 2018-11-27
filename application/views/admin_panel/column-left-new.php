<?php
$id = $_SESSION['user_id'];
$user_image = $this->back_model->select_field_where_db('bc_users',array('user_id ='. $id),'user_image');

?>
<div class="sidebar-collapse">
            <ul class="nav" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element"> <span>
                            <img alt="image" class="img-circle" src="<?php echo base_url()?>resources/uploads/<?php echo $user_image;?>" />
                             </span>
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">Brutecorp</strong>
                             </span> <span class="text-muted text-xs block">Admin<b class="caret"></b></span> </span> </a>
                        <ul class="dropdown-menu animated fadeInRight m-t-xs">
                            <li><a href="#">Profile</a></li>
                            <li><a href="#">Contacts</a></li>
                            <li><a href="#">Mailbox</a></li>
                            <li class="divider"></li>
                            <li><a href="<?php echo base_url()?>admins/dashboard/logout">Logout</a></li>
                        </ul>
                    </div>
                    <div class="logo-element">
                        <img src="<?php echo base_url();?>resources/back/images/favicon.ico">
                    </div>
                </li>
                <li class="active">
                    <a href="<?php echo base_url()?>admins/dashboard"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboards</span></a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-wrench"></i> <span class="nav-label">Services</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li><a href="<?php echo base_url()?>admins/services/add_category">Add Category</a></li>
                        <li><a href="<?php echo base_url()?>admins/services/add_subcategory">Add Sub Category</a></li>
                        <li><a href="<?php echo base_url()?>admins/services/list_category">List Category</a></li>
                        <li><a href="<?php echo base_url()?>admins/services/list_subcategory">List Sub Category</a></li>
                        <li><a href="<?php echo base_url()?>admins/services/add_link">Add Link</a></li>
                        <li><a href="<?php echo base_url()?>admins/services/list_link">List Link</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="fa fa-folder-open"></i> <span class="nav-label">Portfolio</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li><a href="<?php echo base_url()?>admins/portfolio/add_category">Add Category</a></li>
                        <li><a href="<?php echo base_url()?>admins/portfolio/list_category">List Category</a></li>
                        <li><a href="<?php echo base_url()?>admins/portfolio/add_portfolio">Add Portfolio</a></li>
                        <li><a href="<?php echo base_url()?>admins/portfolio/list_portfolio">List Portfolio</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="fa fa-edit"></i> <span class="nav-label">Plans</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li><a href="<?php echo base_url()?>admins/plan/add">Add Plans</a></li>
                        <li><a href="<?php echo base_url()?>admins/plan">Plans List</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="fa fa-users"></i> <span class="nav-label">Users</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li><a href="<?php echo base_url()?>admins/dashboard/add">Add User</a></li>
                        <li><a href="<?php echo base_url()?>admins/dashboard/users">Users List</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="fa fa-handshake-o" aria-hidden="true"></i> <span class="nav-label">Franchise</span>  <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li><a href="<?php echo base_url()?>admins/franchise/add">Add Franchise</a></li>
                        <li><a href="<?php echo base_url()?>admins/franchise">Franchise List</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="fa fa-shopping-cart"></i><span class="nav-label">Orders</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li><a href="<?php echo base_url()?>admins/franchise/add_order">Add Orders</a></li>
                        <li><a href="<?php echo base_url()?>admins/franchise/orders">User Orders</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="fa fa-commenting"></i> <span class="nav-label">Send Bulk Messages</span></a>
                    <ul class="nav nav-second-level">
                        <li><a href="<?php echo base_url()?>admins/dashboard/sms_view">Send bulk SMS</a></li>
                        <!-- <li><a href="<?php echo base_url()?>admins/dashboard/sms_view">Send bulk emails</a></li> -->
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="fa fa-comments"></i> <span class="nav-label">Reviews</span><span class="label label-info pull-right">NEW</span></a>
                    <ul class="nav nav-second-level">
                        <li><a href="<?php echo base_url()?>admins/services/reviews">Review List</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="fa fa-cog"></i> <span class="nav-label">Settings</span></a>
                    <ul class="nav nav-second-level">
                        <li><a href="<?php echo base_url()?>admins/dashboard/change_password">Change Password</a></li>
                        <li><a href="<?php echo base_url()?>admins/dashboard/update_profile_pic">Update Profile Pic</a></li>
                    </ul>
                </li>
            </ul>

        </div>