<!doctype html>
<html lang="en"><head>
    <meta charset="utf-8">
    <title><?php echo $title ?></title>
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>resources/front/lib/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>resources/front/lib/font-awesome/css/font-awesome.css">

    <script src="<?php echo base_url() ?>resources/front/lib/jquery-1.11.1.min.js" type="text/javascript"></script>

    

    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>resources/front/stylesheets/theme.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>resources/front/stylesheets/premium.css">

</head>
<body class=" theme-blue">

    <!-- Demo page code -->

    <script type="text/javascript">
        $(function() {
            var match = document.cookie.match(new RegExp('color=([^;]+)'));
            if(match) var color = match[1];
            if(color) {
                $('body').removeClass(function (index, css) {
                    return (css.match (/\btheme-\S+/g) || []).join(' ')
                })
                $('body').addClass('theme-' + color);
            }

            $('[data-popover="true"]').popover({html: true});
            
        });
    </script>
    <style type="text/css">
        #line-chart {
            height:300px;
            width:800px;
            margin: 0px auto;
            margin-top: 1em;
        }
        .navbar-default .navbar-brand, .navbar-default .navbar-brand:hover { 
            color: #fff;
        }
    </style>

    <script type="text/javascript">
        $(function() {
            var uls = $('.sidebar-nav > ul > *').clone();
            uls.addClass('visible-xs');
            $('#main-menu').append(uls.clone());
        });
    </script>

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="../assets/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">
  

  <!--[if lt IE 7 ]> <body class="ie ie6"> <![endif]-->
  <!--[if IE 7 ]> <body class="ie ie7 "> <![endif]-->
  <!--[if IE 8 ]> <body class="ie ie8 "> <![endif]-->
  <!--[if IE 9 ]> <body class="ie ie9 "> <![endif]-->
  <!--[if (gt IE 9)|!(IE)]><!--> 
   
  <!--<![endif]-->

    <div class="navbar navbar-default" role="navigation">
        <div class="navbar-header">
          <a class="" href="index.html"><span class="navbar-brand"><span class="fa fa-paper-plane"></span> Brutecorp</span></a></div>

        <div class="navbar-collapse collapse" style="height: 1px;">

        </div>
      </div>
    </div>
    


        <div class="dialog">
    <div class="panel panel-default">
        <p class="panel-heading no-collapse"><b><?php echo $title ?></b></p>
        <?php 
		echo validation_errors('<div class="alert alert-danger" role="alert">','</div>');
		$error=$this->session->flashdata('error');
		if (!empty($error))
		echo '<div class="alert alert-danger" role="alert">'. $error. '</div>';
		$message=$this->session->flashdata('message');
		if (!empty($message))
		echo '<div class="alert alert-success alert-dismissable" role="alert">'. $message. '</div>';	
		echo $this->auth->create_token();
		?>
        <div class="panel-body">
            <?php echo form_open('') ?>
                <div class="form-group">
                    <label>Username</label>
                    <?php echo form_input(array('name'=>'username','class'=>'form-control span12','value'=>set_value('username'))) ?>
                </div>
                <div class="form-group">
                <label>Password</label>
                <?php echo form_password(array('name'=>'password','class'=>'form-controlspan12 form-control')) ?>
                </div>
                <?php echo form_hidden('token', $this->session->userdata('token')) ?>
                <?php echo form_submit('submit','Log In','class="btn btn-primary pull-right"') ?>
                <label class="remember-me"><input type="checkbox"> Remember me</label>
                <div class="clearfix"></div>
            </form>
        </div>
    </div>
    <p><a href="reset-password.html">Forgot your password?</a></p>
</div>



    <script src="lib/bootstrap/js/bootstrap.js"></script>
    <script type="text/javascript">
        $("[rel=tooltip]").tooltip();
        $(function() {
            $('.demo-cancel-click').click(function(){return false;});
        });
    </script>
    
  
</body></html>
