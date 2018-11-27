<style>span.red{ color:#F00;}


</style>
<div class="container" id="container">
<!--===================Start left box-->
<!--<div class="left-box" style="width:64%;">

<p>

<?php //echo img(array('src'=>aw_config_item('front'). 'images/req-quote.png','class'=>'small-imagee')) ?>

</p>

<div class="clear"></div>

</div>-->
<!--===================End left box-->

<!--===================start right bar-->
<style>
#container {
box-shadow: 0px 0px 5px 1px #ccc;
margin-top: -20px;
background: url("/resources/front/images/quote-bg.jpg");
background-size:cover;
padding-top: 24px;
}
</style>

<div class="right-bar" style="width:34%;margin:auto;float:none;">
<!--Style Signup-->
<div class="signup">
<div class="enquirybox" id="signup">
<h2><span>Request Quote</span>
<div class="clear"></div>
<p style="font-size:12px">(Fell Free To Discuss Your Project)</p>
</h2>
</div>
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
<p><label>Full Name<span class="red">*</span></label> <?php echo form_input(array('name'=>'name', 'class'=>'textbox','id'=>'name','value'=>set_value('name'))) ?> </p>
<p><label>Email Address<span class="red">*</span></label> <?php echo form_input(array('name'=>'email', 'class'=>'textbox','id'=>'email','value'=>set_value('email'))) ?></p>
<p><label>Phone</label> <?php echo form_input(array('name'=>'phone', 'class'=>'textbox','id'=>'phone','value'=>set_value('phone'))) ?></p>
<p><label>Budget<span class="red">*</span></label> 
<?php echo form_dropdown('budget',array('Less Then Rs. 5,000'=>'Less Then Rs. 5,000', 'Between Rs. 5,000 - Rs. 10,000'=>'Between Rs. 10,000 - Rs. 20,000','Between Rs. 10,000 - Rs. 20,000'=>'Between Rs. 10,000 - Rs. 20,000','Between Rs. 20,000 - Rs. 30,000'=>'Between Rs. 20,000 - Rs. 30,000','Between Rs. 30,000 - Rs. 50,000'=>'Between Rs. 30,000 - Rs. 50,000','Above Rs. 50,000'=>'Above Rs. 50,000'),set_value('budget'),'class="textbox"') ?></p>
<p><label>Subject</label> <?php echo form_input(array('name'=>'subject', 'class'=>'textbox','id'=>'subject','value'=>set_value('subject'))) ?></p>
<p><label>Looking for<span class="red">*</span></label> 
<?php $data=array();
foreach($categorys as $key => $list){
	$data[$list['category_name']]=$list['category_name'];
}
echo form_dropdown('interest',$data,set_value('interest'),'class="textbox"') ?></p>
<p><label>Message</label><?php echo form_textarea(array('name'=>'message', 'class'=>'textbox','id'=>'message','value'=>set_value('message'),'rows'=>4)) ?></p>
<p><label></label><?php echo form_submit('submit','Submit','class="button"') ?></p>
<?php echo form_close(); ?>

</div>
<!--End Signup-->


</div>
<!--===================End right bar-->


<br/><br/>
<div class="clear"></div>

</div>
<!--==============|End Container|-->