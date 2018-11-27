<link rel="stylesheet" href="<?php echo base_url() ?>resources/front/css/simplelightbox.min.css">
<section class="section paralbackground page-banner" style="background-image:url('<?php echo base_url(); ?>resources/front/images/page_banner_03.jpg');" data-img-width="2000" data-img-height="400" data-diff="100">
        </section><!-- end section -->

        <div class="section page-title">
            <div class="container clearfix">
                <div class="title-area pull-left">
                    <h2>Brutecorp Gallery <small>This is gallery page of Brutecorp</small></h2>
                </div><!-- /.pull-right -->
                <div class="pull-right hidden-xs">
                    <div class="bread">
                        <ol class="breadcrumb">
                            <li><a href="<?php echo base_url() ?>">Home</a></li>
                            <li class="active">Portfolio</li>
                        </ol>
                    </div><!-- end bread -->
                </div><!-- /.pull-right -->
            </div>
        </div><!-- end page-title -->
     
<section class="section lb">
<div class="container">

<div class="row text-center normal-gallery">

<!--Start Menu-->

<div class="col-md-3 col-sm-12 mtl">
<div class="content">
<div class="wbp clearfix" style="padding:30px;">
<div class="small-title">
<h3>Categories</h3>
<hr>
</div><!-- end text -->
<div class="sitemap">
<ul class="check" style="text-align:left;">
<?php foreach($categorys as $key => $list) { ?>
<li><?php echo anchor('portfolio/view/'. $list['category_url'],$list['category_name']) ?></li>
<?php } ?>
</ul>
</div>
</div><!-- end post-padding -->
</div><!-- end content -->
</div>
<!--End Menu-->
<!--Gallery-->
<div class="col-md-9 col-sm-6">
<div class="gallery">
<?php foreach($portfolio as $key => $list){ 
$category = $this->front_model->select_field_where_db('bc_category',array('category_id ="'.$list['portfolio_category_id']. '"'),'category_url');

	?>
<div class="col-md-4 col-sm-6 col-sm-12 clearfix">
<div class="gallery-column">
<div class="post-media entry">
<?php echo img(array('src'=>aw_config_item('back'). 'portfolio/'. $list['portfolio_image'],'class'=>'img-responsive')) ?>
<div class="magnifier">
<div class="visible-buttons">
<span><a data-placement="bottom" data-toggle="tooltip" title="" href="<?php echo base_url() . aw_config_item('back'). 'portfolio/'. $list['portfolio_image']; ?>" class="big" data-original-title=""><i class="fa fa-search"></i></a></span>
</div>
</div>
</div><!-- end post-media -->
<div class="wbp">
<h3><a href="<?php echo base_url();?>portfolio/view_full/<?php echo $list['portfolio_id']?>"><?php echo $list['portfolio_title'] ?></a></h3>
<p><?php echo $list['portfolio_description'] ?></p>
</div><!-- end wp -->
</div><!-- end gallery-column -->
</div><!-- end col -->

<?php } ?>
</div>

</div>
<!--End Gallery-->


</div><!-- end row -->
</div><!-- end container -->
</section>
<script type="text/javascript" src="<?php echo base_url() ?>resources/front/js/jquery.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>resources/front/js/simple-lightbox.js"></script>
<script>
	$(function(){
		var $gallery = $('.gallery a').simpleLightbox();

		$gallery.on('show.simplelightbox', function(){
			console.log('Requested for showing');
		})
		.on('shown.simplelightbox', function(){
			console.log('Shown');
		})
		.on('close.simplelightbox', function(){
			console.log('Requested for closing');
		})
		.on('closed.simplelightbox', function(){
			console.log('Closed');
		})
		.on('change.simplelightbox', function(){
			console.log('Requested for change');
		})
		.on('next.simplelightbox', function(){
			console.log('Requested for next');
		})
		.on('prev.simplelightbox', function(){
			console.log('Requested for prev');
		})
		.on('nextImageLoaded.simplelightbox', function(){
			console.log('Next image loaded');
		})
		.on('prevImageLoaded.simplelightbox', function(){
			console.log('Prev image loaded');
		})
		.on('changed.simplelightbox', function(){
			console.log('Image changed');
		})
		.on('nextDone.simplelightbox', function(){
			console.log('Image changed to next');
		})
		.on('prevDone.simplelightbox', function(){
			console.log('Image changed to prev');
		})
		.on('error.simplelightbox', function(e){
			console.log('No image found, go to the next/prev');
			console.log(e);
		});
	});
</script>