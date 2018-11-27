<div class="sidebar-nav">
    <ul>
    <li><a href="#" data-target=".dashboard-menu" class="nav-header" data-toggle="collapse"><i class="fa fa-fw fa-dashboard"></i> Dashboard<i class="fa fa-collapse"></i></a></li>
    <li><ul class="dashboard-menu nav nav-list collapse in">
            <li><?php echo anchor('user/dashboard','<span class="fa fa-caret-right"></span> Main') ?></a></li>
            <li><?php echo anchor('user/order_list','<span class="fa fa-caret-right"></span> Order List') ?></a></li>
            <li><?php echo anchor('user/invoice','<span class="fa fa-caret-right"></span> Invoice Details') ?></a></li>
    </ul></li>
    <li><a href="#" data-target=".accounts-menu" class="nav-header collapsed" data-toggle="collapse"><i class="fa fa-fw fa-briefcase"></i> Account <span class="label label-info">+2</span></a></li>
        <li><ul class="accounts-menu nav nav-list collapse">
            <li ><?php echo anchor('user/edit_profile','<span class="fa fa-caret-right"></span> Edit Profile') ?></li>
            <li ><?php echo anchor('user/change_password','<span class="fa fa-caret-right"></span> Change Password') ?></li>
    </ul></li>

        

            </ul>
    </div>