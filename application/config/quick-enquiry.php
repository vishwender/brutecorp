<div class="enquirybox">
<h2><span>Quick</span> Enquiry</h2>
<?php echo form_open(''); ?>
<?php echo form_input(array('name'=>'name', 'class'=>'text-enq','id'=>'name','value'=>set_value('name'),'placeholder'=>'Full Name'));
echo form_input(array('name'=>'email', 'class'=>'text-enq','id'=>'email','value'=>set_value('email'),'placeholder'=>'Email'));
echo form_input(array('name'=>'phone', 'class'=>'text-enq','id'=>'phone','value'=>set_value('phone'),'placeholder'=>'Phone No'));
echo form_textarea(array('name'=>'message', 'class'=>'text-enq','id'=>'message','value'=>set_value('message'),'rows'=>5,'placeholder'=>'Message'));
echo form_submit('submit','Submit','class="button"');
?>
</div>