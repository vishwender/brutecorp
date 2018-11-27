<style>span.red{ color:#F00;} td b{ margin:0 5px -15px 0 !important;}</style>

<section class="section lb">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="support-box whitebg">
                            <h3>Postal Support</h3>
                            <p>2, First Floor, Near Punjab & Sind Bank, Lohgarh Chowk, Amritsar-143001, Punjab, India<br>
                            <a href="#">info@brutecorp.com</a></p>
                        </div><!-- end support-box -->

                        <hr>

                        <div class="support-box whitebg">
                            <h3>Online Chat</h3>
                            <p>You can get support by contacting our live support through active operator on the lower right page located.</p>

                        </div><!-- end support-box -->
                    </div><!-- end col -->
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <div class="wbp">
                            <div class="small-title">
                                <h3>Contact Form</h3>
                                <hr>
                            </div><!-- end big-title -->

                            <br>

                            <div class="contact_form offical_form">
                                <div id="message"></div>
								<?php
									echo validation_errors('<div class="alert-danger">','</div>');
									$error=$this->session->flashdata('error');
									if (!empty($error))
									echo '<div class="alert alert-danger" role="alert">'. $error. '</div>';
									$message=$this->session->flashdata('message');
									if (!empty($message))
									echo '<div class="alert alert-success alert-dismissable" role="alert">'. $message. '</div>';
									?>
									
									<?php echo form_open(''); ?>
									<p><?php echo form_input(array('name'=>'user_name', 'class'=>'form-control','id'=>'name','placeholder'=>'Name','value'=>set_value('user_name'))) ?> </p>
									<p><?php echo form_input(array('name'=>'user_email', 'class'=>'form-control','id'=>'email','placeholder'=>'Email','value'=>set_value('user_email'))) ?></p>
									<p><?php echo form_input(array('name'=>'user_phone', 'class'=>'form-control','id'=>'phone','placeholder'=>'Phone','value'=>set_value('user_phone'))) ?></p>
									<p><?php echo form_input(array('name'=>'user_city', 'class'=>'form-control','id'=>'city','placeholder'=>'City','value'=>set_value('user_city'))) ?></p>
									<p><?php echo form_textarea(array('name'=>'user_address', 'class'=>'form-control','id'=>'address','placeholder'=>'Address','value'=>set_value('user_address'),'rows'=>4)) ?></p>
									<p><?php echo form_textarea(array('name'=>'user_message', 'class'=>'form-control','id'=>'message','placeholder'=>'Message Below','value'=>set_value('user_message'),'rows'=>4)) ?></p>
									<p><?php echo $captcha_img ?></p>
									<p><?php echo form_input(array('name'=>'captcha','class'=>'form-control','id'=>'captcha','value'=>set_value('captcha'))) ?></p>
									
									<p><?php echo form_submit('submit','Send Form','class="btn btn-primary"') ?></p>
									<?php echo form_close(); ?>

                            </div>
                        </div><!-- end wbp -->
                    </div><!-- end col -->
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="support-box whitebg">
                            <h3>Technical Support</h3>
                            <p>You can send support requests via your membership account, or contact us on our number +90 123 45 67 89</p>
                        </div><!-- end support-box -->

                        <hr>

                        <div class="support-box whitebg">
                            <h3>Sales Department</h3>
                            <p>For pre-sale question let's decide together with appropriate service for you in consultation with sales team.</p>

                        </div><!-- end support-box -->
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end container -->
        </section>