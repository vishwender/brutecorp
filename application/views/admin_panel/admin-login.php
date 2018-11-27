    <div class="middle-box text-center loginscreen  animated fadeInDown">
        <div>
            <div>

                <h1 class="logo-name"><img src="<?php echo base_url();?>resources/front/images/logo.png"></h1>

            </div>
            <h3>Welcome to BruteCorp Admin</h3>
            <!-- <p>Complete Web Services</p> -->
           <!--  <p>Creating Website is not only our profession,
               it's our passion.</p> -->
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
                <a href="#"><small>Forgot password?</small></a>
                <!-- <p class="text-muted text-center"><small>Do not have an account?</small></p>
                <a class="btn btn-sm btn-white btn-block" href="register.html">Create an account</a> -->
            <?php echo form_close(); ?>
            <p class="m-t"> <small> Brutecorp &copy; <?php echo date('Y');?></small> </p>
        </div>
    </div>