<div class="slider-paralaxx" style="background:url('resources/front/images/banner.jpg');">
<div class="container">

<div id="absluid">
<div class="col-md-7 col-sm-12 col-xs-12" id="left-colz">
<h1>We Create Websites Like a Pro</h1>
<h3>Creating Website is not only our profession, it's our passion. We Creates stunning websites, who catch your customer's eye</h3>
<a href="#" class="btn btn-custom">View Our Work</a> 
<a href="#" class="btn btn-primary">Request a Quote &nbsp;<i class="fa fa-quote-right" aria-hidden="true"></i></a>

</div>


</div>
<!--absluid-->
</div>

</div>
<style>
.slider-paralaxx {
    background: #00468e;
    padding: 100px 0px 100px 0px;
}
</style>
<?php //echo '<pre>'; print_r($orders);?>
<!-- <div id="mainBody"> -->
	<div class="container">
		<div class="row">
			<div class="span12">
			<ul class="breadcrumb">
				<li><a href="<?php echo base_url('user');?>">Home</a> <span class="divider"></span></li>
				<li class="active">Cart</li>
			</ul>
<h3> Cart <small><span class="count">-<?php if(!empty($orders)){echo count($orders);}?></span> Item(s) </small>
	<a href="<?php echo base_url('user');?>" class="btn btn-large btn-primary pull-right">
		<i class="icon-arrow-left"></i> Continue Shopping </a>
		<!-- <a href="<?php echo base_url('user');?>" class="btn btn-large btn-primary pull-right">
		<i class="icon-arrow-left"></i>Checkout</a> -->
	</h3>
	<?php echo validation_errors('<div class="alert alert-danger" role="alert">','</div>');
      $error=$this->session->flashdata('error');
if (!empty($error))
      echo '<div class="alert alert-danger" role="alert">'. $error. '</div>';
$message=$this->session->flashdata('message');
if (!empty($message))
        echo '<div class="alert alert-success alert-dismissable" role="alert">'. $message. '</div>';
?>
<hr class="soft"/>
	<table class="table table-bordered " id="mytable">
	<thead>
		<tr>
			<th>Product Id</th>
			<th>Product</th>
			<th>Description</th>
			<th>Price</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
<?php
	$grand_total = 0;
	if(!empty($orders)){
	foreach ($orders as $data) {
	$grand_total+=$data['order_price'];
?>
		<?php echo form_open('cart/pay_request');?>
		<?php echo form_hidden('order_id',$data['order_id']);?>
		<?php echo form_hidden('order_title',$data['order_title']);?>	
		<?php echo form_hidden('category_name',$data['category_name']);?>	
		<?php echo form_hidden('order_price',$data['order_price']);?>
		<?php echo form_hidden('user_username',$_SESSION['user_username']);?>	
		<tr>
			<td id="order_id"><?php echo $data['order_id'];?></td>
			<td id="order_title"><?php echo $data['order_title'];?></td>
			<td id="category_name"><?php echo $data['category_name']; ?></td>
			<td id="order_price"><i class="fa fa-inr" aria-hidden="true"></i> <?php echo $data['order_price']; ?></td>
			<td><a href="<?php echo base_url()?>cart/remove/<?php echo $data['order_id'];?>" class="btn btn-danger" onclick="return confirm('Are you sure?')">Remove Item</a></td>
		</tr>
<?php } }?>
<tr>
<td colspan="6" style="text-align:right"><strong>Total <i class="fa fa-inr" aria-hidden="true"></i> <?php echo $grand_total;?></strong></td>
</tr>
	</tbody>
</table>
<input type="submit" class="btn btn-large btn-primary pull-right" value="Proceed to checkout">
<?php echo form_close();?>	
</div>
</div>
</div>

<!-- </div> -->