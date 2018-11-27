
<section class="section paralbackground page-banner" style="background-image:url('<?php echo base_url(); ?>/resources/front/images/page_banner_03.jpg');" data-img-width="2000" data-img-height="400" data-diff="100">
</section><!-- end section -->
<?php echo validation_errors('<div class="alert alert-danger" role="alert">','</div>');
      $error=$this->session->flashdata('error');
if (!empty($error))
      echo '<div class="alert alert-danger" role="alert">'. $error. '</div>';
$message=$this->session->flashdata('message');
if (!empty($message))
        echo '<div class="alert alert-success alert-dismissable" role="alert">'. $message. '</div>';
?>
<?php foreach($subcategorys as $key => $list){ $category_name=$list['category_name'];$slug=$list['category_slug'];$cid=$list['category_id'] ?>

<section class="section lb" style="padding:30px 0px;">
<div class="container">
<div class="row">
<div class="col-md-8 col-sm-12 mtl">
<div class="content wbp" style="padding: 25px;">
<div class="post-padding clearfix">


<h3 class="entry-title"><?php echo $list['category_name'] ?></h3>

<div class="post-sharing">
<ul class="list-inline">
<li><a href="#" class="fb-button btn btn-primary"><i class="fa fa-facebook"></i> <span class="hidden-xs">Share on Facebook</span></a></li>
<li><a href="#" class="tw-button btn btn-primary"><i class="fa fa-twitter"></i> <span class="hidden-xs">Tweet on Twitter</span></a></li>
<li><a href="#" class="gp-button btn btn-primary"><i class="fa fa-google-plus"></i></a></li>
</ul>
</div><!-- end post-sharing -->

<?php if (!empty($list['category_image'])){ echo img(array('src'=>aw_config_item('back') . 'services/' . $list['category_image'],'class'=>'alignleft'));} ?>
<?php 
$desc=$list['category_description'];
$all_category=$this->front_model->select_row_where_db('bc_sv_category',array(),'*','category_id','asc');
foreach($all_category as $key3 => $list3){
	$desc=str_ireplace($list3['category_name'], anchor('services/'.$list3['category_slug'] ,$list3['category_name']),$desc);
}
$links=$this->front_model->select_row_where_db('bc_links',array(),'*','link_keyword','asc');
foreach($links as $key4 => $list4){
	$desc=str_ireplace($list4['link_keyword'], '<a href="'.$list4['link_url'].'">'.$list4['link_keyword'].'</a>',$desc);
}
echo str_replace('<ul>', '<ul class="features">', $desc) ?>
<div class="clear"></div>

<div class="fb-like" data-href="<?php base_url(). 'services/ppc' ?>" data-layout="button_count" data-action="like" data-show-faces="true" data-share="true"></div>

</div><!-- end post-padding -->
</div><!-- end content -->

</div><!-- end col -->





<div class="sidebar col-md-4 col-sm-12">
<div class="widget">
<div class="loginbox text-center" id="quey-form">
<?php $this->load->view('user_panel/quick-enquiry'); ?>       
</div><!-- end newsletter -->
</div><!-- end widget -->


</div>


<!-- end sidebar -->
</div><!-- end row -->
</div><!-- end container -->
</section>
<?php //$portfolio=$this->front_model->select_row_where_db('bc_portfolio',array(),'*','portfolio_id','asc');
//echo '<pre>'; print_r($portfolio);
?>
<section class="section lb" id="portfolio">
<div class="container">
<div class="section-title text-center">
<h3>Our <span>Protfolio</span> Best</h3>
<p class="last">
Because we offer high-quality support, unlimited disk usage and bandwidth with all our packages.<br> Some reasons and dashboard screenshots listed below.
</p>
</div>

<div class="row text-center normal-gallery">
<?php 
$portfolio=$this->front_model->select_row_where_db('bc_portfolio',array(),'*','portfolio_id','asc');

foreach($portfolio as $key4 => $list4){ 
$tags=explode(',',$list4['portfolio_tags']);
foreach($tags as $list5){
if (strtolower($list5)==strtolower($category_name)){ ?>
<div class="col-md-3 col-sm-6 col-sm-12 clearfix">
	<div class="gallery-column">
		<div class="post-media entry">
			<?php echo img(array('src'=>aw_config_item('back'). 'portfolio/'. $list4['portfolio_image'],'class'=>'img-responsive')) ?>
			<div class="magnifier">
				<div class="visible-buttons">
					<span>
						<a class="item-hover example-image-link" href="<?php echo base_url() . aw_config_item('back'). 'portfolio/'. $list4['portfolio_image']; ?>" data-lightbox="example-set" data-title="Click the right half of the image to move forward."><i class="fa fa-search"></i><span></a>
				</div>
			</div>	
		</div>
		<div class="wbp">
			<h3><a href=""><?php echo $list4['portfolio_title'] ?></a></h3>
			<p><?php echo $list4['portfolio_description'] ?></p>
		</div>
</div>
</div>

<?php }}} ?>

</div>

<!-- end row -->

</div><!-- end container -->
</section>
<?php if (count($plans)>0){ ?>

<section class="section">
<div class="container">
<div class="section-title text-center">
<h3>Plans & <span>Pricing</span></h3>

</div><!-- end section-title -->
<?php //echo '<pre>'; print_r($plans); echo '</pre>';?>
<div class="row pricing-bigger">


<div class="col-md-4 col-sm-4 col-xs-12 pricing-choose nopadding pricing-border">
<div class="pricing-header colorprimary">
<p>Professional Websites Packages</p>
<h3>Available Plans</h3>
</div>
<div class="pricing-body">
<ul class="plans">
	<?php 
	$count=0; 
	foreach($plans as $key => $list)
		{ 
			$count+=1; 
			if ($count==1)
			{
				echo '<li>Price</li>';
			}
			elseif ($count == 2) {
				echo '<!--<li></li>-->';
			}
			else
			{
			?>
        		<li><?php echo $list['plan_feature_name'] ?></li>
   			<?php }} ?>

<!-- <li>&nbsp;</li>
<li>&nbsp;</li> -->
</ul><!-- end ul -->
</div><!-- end body -->
</div><!-- end col -->
<?php echo form_open('cart/add') ?>
<div class="col-md-2 col-sm-2 col-xs-12 pricing-plan nopadding text-center pricing-border">
        <?php $count=0; foreach($plans as $key => $list){ $count+=1; if ($count==1){echo '<div class="pricing-header color1"><p>Plan For</p><h3>'. $list['plan_plan1'].'</h3>
        <input type="hidden" id="plan_name" name="plan_name" value="'.$list['plan_plan1'].'">
        <input type="hidden" id="plan_category_id" name="plan_category_id" value="'.$list['plan_spage_id'].'">
        </div>';} }?>
        <div class="pricing-body">
			<ul class="plans">
				<?php $count=0; foreach($plans as $key => $list){ $count+=1; if($count>1){?>
				<li><?php if ($list['plan_plan1'] == 'Yes'){
							echo '<i class="fa fa-check"></i>';
						}else if ($list['plan_plan1'] == 'No'){
							echo '<i class="fa fa-close"></i>';
						}else{
							echo $list['plan_plan1'];
						}
					}
					
				} ?> </li>
				<li>
				<input type="hidden" name="plan_price" value="<?php echo $list['plan_plan1'];?>">
				<?php
					if(isset($logged_in) == TRUE)
					{?>
						<input type="hidden" name="uri" value="<?php echo $this->uri->segment(2);?>">
						<input type="hidden" id="user_id" name="user_id" value="<?php echo $_SESSION['user_id'];?>">
						<input type="submit" class="btn btn-primary btn-block" value="Add To Cart"/>
				<?php	
					}else
					{ ?>
						<a href="<?php echo base_url();?>user/signup" class="btn btn-primary">Signup</a>
				<?php	
					}
				?>
				</li></li>
			</ul>
		</div>
</div>
<?php echo form_close();?>
<?php echo form_open('cart/add') ?>
<div class="col-md-2 col-sm-2 col-xs-12 pricing-plan nopadding text-center pricing-border">
        <?php $count=0; foreach($plans as $key => $list){ $count+=1; if ($count==1){echo '<div class="pricing-header color1"><p>Plan For</p><h3>'. $list['plan_plan2'].'</h3>
        <input type="hidden" id="plan_name" name="plan_name" value="'.$list['plan_plan2'].'">
        <input type="hidden" id="plan_category_id" name="plan_category_id" value="'.$list['plan_spage_id'].'">
        </div>';} }?>
        <div class="pricing-body">
			<ul class="plans">
				<?php $count=0; foreach($plans as $key => $list){ $count+=1; if($count>1){?>
				<li><?php if ($list['plan_plan2'] == 'Yes'){
							echo '<i class="fa fa-check"></i>';
						}else if ($list['plan_plan2'] == 'No'){
							echo '<i class="fa fa-close"></i>';
						}else{
							echo $list['plan_plan2'];
						}
					}
					
				} ?> </li>
				<li>
				<input type="hidden" name="plan_price" value="<?php echo $list['plan_plan2'];?>">
				<?php
					if(isset($logged_in) == TRUE)
					{?>
						<input type="hidden" name="uri" value="<?php echo $this->uri->segment(2);?>">
						<input type="hidden" id="user_id" name="user_id" value="<?php echo $_SESSION['user_id'];?>">
						<input type="submit" class="btn btn-primary btn-block" value="Add To Cart"/>
				<?php	
					}else
					{ ?>
						<a href="<?php echo base_url();?>user/signup" class="btn btn-primary">Signup</a>
				<?php	
					}
				?>
				
				</li>
			</ul>
		</div>
</div>
<?php echo form_close();?>
<?php echo form_open('cart/add') ?>
<div class="col-md-2 col-sm-2 col-xs-12 pricing-plan nopadding text-center pricing-border">
        <?php $count=0; foreach($plans as $key => $list){ $count+=1; if ($count==1){echo '<div class="pricing-header color1"><p>Plan For</p><h3>'. $list['plan_plan3'].'</h3>
        <input type="hidden" id="plan_name" name="plan_name" value="'.$list['plan_plan3'].'">
        <input type="hidden" id="plan_category_id" name="plan_category_id" value="'.$list['plan_spage_id'].'">
        </div>';} }?>
        <div class="pricing-body">
			<ul class="plans">
				<?php $count=0; foreach($plans as $key => $list){ $count+=1; if($count>1){?>
				<li><?php if ($list['plan_plan3'] == 'Yes'){
							echo '<i class="fa fa-check"></i>';
						}else if ($list['plan_plan3'] == 'No'){
							echo '<i class="fa fa-close"></i>';
						}else{
							echo $list['plan_plan3'];
						}
					}
					
				} ?> </li>
				<li>
					
					<input type="hidden" name="plan_price" value="<?php echo $list['plan_plan3'];?>">
					<?php
					if(isset($logged_in) == TRUE)
					{?>
						<input type="hidden" name="uri" value="<?php echo $this->uri->segment(2);?>">
						<input type="hidden" id="user_id" name="user_id" value="<?php echo $_SESSION['user_id'];?>">
						<input type="submit" class="btn btn-primary btn-block" value="Add To Cart"/>
				<?php	
					}else
					{ ?>
						<a href="<?php echo base_url();?>user/signup" class="btn btn-primary">Signup</a>
				<?php	
					}
				?>
				</li>
			</ul>
		</div>
</div>
<?php echo form_close();?>
<?php echo form_open('cart/add'); ?>
<div class="col-md-2 col-sm-2 col-xs-12 pricing-plan nopadding text-center pricing-border">
        <?php $count=0; foreach($plans as $key => $list){ $count+=1; if ($count==1){echo '<div class="pricing-header color1"><p>Plan For</p><h3>'. $list['plan_plan4'].'</h3>
        <input type="hidden" id="plan_name" name="plan_name" value="'.$list['plan_plan4'].'">
        <input type="hidden" id="plan_category_id" name="plan_category_id" value="'.$list['plan_spage_id'].'">
        </div>';} }?>
        <div class="pricing-body">
			<ul class="plans">
				<?php 
				$count=0; 
				foreach($plans as $key => $list)
				{ 
					$count+=1; 
					if($count>1){
				?>
					<li>
						<?php if ($list['plan_plan4'] == 'Yes')
						{
							echo '<i class="fa fa-check"></i>';
						}
						else if ($list['plan_plan4'] == 'No')
						{
							echo '<i class="fa fa-close"></i>';
						}
						else
						{
							echo $list['plan_plan4'];
						}
					}	
				} ?>
				</li>
				<li>
					
					<input type="hidden" name="plan_price" id="plan_price" value="<?php echo $list['plan_plan4'];?>">
					<?php
					if(isset($logged_in) == TRUE)
					{?>
						<input type="hidden" name="uri" value="<?php echo $this->uri->segment(2);?>">
						<input type="hidden" id="user_id" name="user_id" value="<?php echo $_SESSION['user_id'];?>">
						<input type="submit" class="btn btn-primary btn-block" value="Add To Cart"/>
				<?php	
					}else
					{ ?>
						<a href="<?php echo base_url();?>user/signup" class="btn btn-primary">Signup</a>
				<?php	
					}
				?>
					
				</li>
			</ul>
		</div>
</div>
<?php echo form_close();?>
</div><!-- end row -->
</div><!-- end container -->
</section>

<?php } ?>
<?php } ?>

<section class="section lb" style="padding:30px 0px;">
<div class="container">
<div class="row">



<div class="col-md-8 col-sm-12">


<div class="content wbp"  style="padding: 10px 30px;">
<div class="contact_form offical_form">
<div class="small-title" id="review">
<h3>Leave a Comment</h3>
<?php
echo validation_errors('<div class="alert-danger">','</div>');
$error=$this->session->flashdata('error');
if (!empty($error))
echo '<div class="alert alert-danger" role="alert">'. $error. '</div>';
$message=$this->session->flashdata('message');
if (!empty($message))
echo '<div class="alert alert-success alert-dismissable" role="alert">'. $message. '</div>';
?>
<hr>
</div>

<div class="contact_form">
<?php $attributes = array('class' => 'row'); ?>
<?php echo form_open('services/'.$slug.'#review','class="row"') ?>
<div class="col-md-4 col-sm-12">
<label>Name <span class="required">*</span></label>
<input type="text" class="form-control" placeholder="">
<?php echo form_input(array('class'=>'form-control','name'=>'uname','value'=>set_value('uname'))) ?>
</div>
<div class="col-md-4 col-sm-12">
<label>Email <span class="required">*</span></label>
<input type="email" class="form-control" placeholder="">
<?php echo form_input(array('class'=>'form-control','name'=>'uemail','value'=>set_value('uemail'))) ?>
</div>
<div class="col-md-4 col-sm-12">
<label>Website</label>
<input type="text" class="form-control" placeholder="">
</div>
<div class="col-md-12 col-sm-12">
<label>Comment <span class="required">*</span></label>
<?php echo form_textarea(array('class'=>'form-control','name'=>'ucomment','value'=>set_value('ucomment'))) ?>
</div>
<div class="col-md-12 col-sm-12">
<?php echo form_submit(array('class'=>'btn btn-primary'),'Send Comment','submit');?>
</div>
</form>
</div><!-- end commentform -->
</div><!-- end postpager -->
</div><!-- end content -->



<div class="content wbp" style="padding: 10px 30px;">
<div class="post-padding">
<div class="small-title">
<?php $reviews=$this->front_model->select_row_where_db('bc_reviews',array('review_service_id = '.$cid,'review_status = "active"'),'*','review_id','desc'); 
echo '<h3>'.count($reviews).'&nbsp;Comments</h3>'; ?>
<hr>
</div>

<div class="row">
<div class="col-md-12">
<div class="panel">
<div class="panel-body comments">
<ul class="media-list">
<?php
foreach($reviews as $key => $list){
?>
					<li class="media">
						<div class="comment">
							<a href="" class="pull-left"><?php echo img(array('src'=>aw_config_item('front'). 'images/profile.jpg','class'=>'img-circle')) ?></a>
						
							<div class="media-body">
								<strong class="text-success"><?php echo $list['review_uname'] ?></strong>
								<span class="text-muted"><small class="text-muted"><?php echo aw_convert_date($list['review_date']) ?></small></span>
								<p><?php echo $list['review_ucomment'] ?></p>
							</div>
							<div class="clearfix"></div>
							<div class="clear"></div>
						</div>
					</li>	
<?php } ?>

</ul>
</div>
</div>
</div>
</div>
</div><!-- end postpager -->
</div><!-- end content -->

</div>


</div><!-- end row -->
</div><!-- end container -->
</section>
<script>
	$(document).ready(function(){

		if($('.normal-gallery').children().length > 0)
		{
			$('#portfolio').show();
		}
		else
		{
			$('#portfolio').hide();
		}

	});
</script>
<style type="text/css">
	.plans li:nth-child(even) { 
		background: #F4F4F7; 
	}
</style>