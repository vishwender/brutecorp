<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Brutecorp | <?php echo $title;?></title>
    <link rel="shortcut icon" href="<?php echo base_url() ?>resources/front/images/favicon.ico" type="image/x-icon">
    <link href="<?php echo base_url()?>resources/back/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url()?>resources/back/css/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="<?php echo base_url()?>resources/back/css/animate.css" rel="stylesheet">
    <link href="<?php echo base_url()?>resources/back/css/style.css" rel="stylesheet">
</head>
<body class="gray-bg">
    <div class="middle-box text-center loginscreen  animated fadeInDown">
        <div>
            <div>
                <h1 class="logo-name"><img src="<?php echo base_url()?>resources/front/images/logo.png" class="logo"></h1>
            </div>
            <h3>Welcome to BruteCorp <?php echo $title;?></h3>
            <p>Login</p>
            <?php echo validation_errors('<div class="alert alert-danger" role="alert">','</div>');
                            $error=$this->session->flashdata('error');
                if (!empty($error))
                            echo '<div class="alert alert-danger" role="alert">'. $error. '</div>';
                            $message=$this->session->flashdata('message');
                if (!empty($message))
                echo '<div class="alert alert-success alert-dismissable" role="alert">'. $message. '</div>';    
                echo $this->auth->create_token(); 
                echo form_open('','role="form" class="m-t"') ?>
                <div class="form-group">
                    <?php echo form_input(array('name'=>'username','id'=>'username','value'=>set_value('username'),'placeholder'=>'Username','class'=>'form-control')) ?>
                </div>
                <div class="form-group">
                    <?php echo form_password(array('name'=>'password','id'=>'password','value'=>'','placeholder'=>'Password','class'=>'form-control')) ?>
                </div>
                <?php echo form_hidden('token', $this->session->userdata('token')) ?>
                <?php echo form_submit('Submit','Login','class="btn btn-primary block full-width m-b"') ?>
                <a href="<?php echo base_url();?>user/forgot_password"><small>Forgot password?</small></a>
                <p class="text-muted text-center"><small>Do not have an account?</small></p>
                <a class="btn btn-sm btn-white btn-block" href="<?php echo base_url()?>user/signup">Create an account</a>
            <?php echo form_close(); ?>
            <p class="m-t"> <small> Brutecorp &copy; <?php echo date('Y');?></small> </p>
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="<?php echo base_url()?>resources/back/js/jquery-2.1.1.js"></script>
    <script src="<?php echo base_url()?>resources/back/js/bootstrap.min.js"></script>

</body>

</html>
