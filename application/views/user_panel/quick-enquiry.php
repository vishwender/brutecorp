<h3>Get a Quote!</h3>
<?php 
echo form_open('user/contactus','class="form-inline"'); 
echo form_input(array('name'=>'user_name', 'class'=>'form-control','id'=>'full_name','value'=>set_value('user_name'),'placeholder'=>'Name','required'=>'required'));
echo form_input(array('name'=>'user_email', 'class'=>'form-control','id'=>'user_email','value'=>set_value('user_email'),'placeholder'=>'Email','required'=>'required'));
echo form_input(array('name'=>'user_phone', 'class'=>'form-control','id'=>'user_phone','value'=>set_value('user_phone'),'placeholder'=>'Phone No','required'=>'required'));
echo form_input(array('name'=>'user_subject', 'class'=>'form-control','id'=>'full_name','value'=>set_value('user_subject'),'placeholder'=>'Subject','required'=>'required'));
echo form_textarea(array('class'=>'form-control','name'=>'user_message','value'=>set_value('user_message'),'placeholder'=>'Message'));
echo form_submit('submit','SUBMIT','class="btn btn-primary btn-block"');
echo form_close(); ?>
