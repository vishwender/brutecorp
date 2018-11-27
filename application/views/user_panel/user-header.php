<div class="navbar navbar-default" role="navigation">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="" href="index.html"><span class="navbar-brand"><span class="fa fa-paper-plane"></span> Brutecorp</span></a></div>

        <div class="navbar-collapse collapse" style="height: 1px;">
          <ul id="main-menu" class="nav navbar-nav navbar-right">
            <li class="dropdown hidden-xs">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <span class="glyphicon glyphicon-user padding-right-small" style="position:relative;top: 3px;"></span> <?php echo $_SESSION['user_username']; ?>
                    <i class="fa fa-caret-down"></i>
                </a>

              <ul class="dropdown-menu">
              <?php if($this->auth->logged_in('user') == TRUE){ ?>
                    <li><?php echo anchor('user/edit_profile','Edit Profile') ?></li>
                    <li class="divider"></li>
                    <li class="dropdown-header">Admin Panel</li>
                    <li><?php echo anchor('user/change_password','Change Password') ?></li>
                    <li class="divider"></li>
                    <li><?php echo anchor('user/logout','Logout') ?></li>
                <?php } else { ?>
                
                	<li><?php echo anchor('franchise/edit_profile','Edit Profile') ?></li>
                    <li class="divider"></li>
                    <li class="dropdown-header">Admin Panel</li>
                    <li><?php echo anchor('franchise/change_password','Change Password') ?></li>
                    <li class="divider"></li>
                    <li><?php echo anchor('franchise/logout','Logout') ?></li>
                <?php } ?>
              </ul>
            </li>
          </ul>

        </div>
      </div>