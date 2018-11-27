<?php //echo '<pre>'; print_r($portfolio); ?>
        <section class="section paralbackground page-banner" style="background-image:url('<?php echo base_url()?>resources/front/upload/page_banner_03.jpg');" data-img-width="2000" data-img-height="400" data-diff="100">
        </section><!-- end section -->

        <div class="section page-title">
            <div class="container clearfix">
                <div class="title-area pull-left">
                    <h2>Brutecorp Single Gallery <small>This is gallery page of Brutecorp</small></h2>
                </div><!-- /.pull-right -->
                <div class="pull-right hidden-xs">
                    <div class="bread">
                        <ol class="breadcrumb">
                            <li><a href="<?php echo base_url();?>">Home</a></li>
                            <li class="active">Gallery</li>
                        </ol>
                    </div><!-- end bread -->
                </div><!-- /.pull-right -->
            </div>
        </div><!-- end page-title -->

<section class="section lb">
<div class="container">
<div class="row text-left box">
<div class="col-md-6 col-sm-6 col-xs-12 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.1s">
<div class="wbp2">
<div class="blog-image">
<div id="myCarousel" class="carousel slide" data-ride="carousel">
<div class="carousel-inner" role="listbox">
<div class="item active">
<img src="<?php echo base_url()?>resources/back/portfolio/<?php echo $portfolio[0]['portfolio_image'];?>" alt="" class="img-responsive">
</div>
</div>

<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
<span class="fa fa-angle-left" aria-hidden="true"></span>
<span class="sr-only">Previous</span>
</a>
<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
<span class="fa fa-angle-right" aria-hidden="true"></span>
<span class="sr-only">Next</span>
</a>
</div>
</div><!-- end blog-image --> 
</div><!-- end module -->


<style>
.wbp2 {padding: 30px;background-color: #ffffff;}
</style>

</div><!-- end col -->

<div class="col-md-6 col-sm-6 col-xs-12">
<div class="singlegallery wbp2">
<div class="small-title">
<h3><?php echo $portfolio[0]['portfolio_title']; ?></h3>
<hr>
</div>

<div class="gallery-desc">
<p><?php echo $portfolio[0]['portfolio_description'];?></p>
<div class="workinghours clearfix">

<ul>
<!-- <li>Published <span>12 June 2015</span></li>-->
<?php foreach($categorys as $cat){ 

    if($cat['category_id'] == $portfolio[0]['portfolio_category_id'])
    { ?>
        <li>Category <span><a href="<?php echo base_url()?>portfolio/view/<?php echo $cat['category_url']; ?>"><?php echo $cat['category_name']; ?></a></span></li>
<?php } } ?>

<!--<li>Client <span>U.S Office</span></li> -->
<li>Client Website <span><a href="<?php echo $portfolio[0]['portfolio_live_link']; ?>" target="__blank"><?php echo $portfolio[0]['portfolio_live_link']; ?></a></span></li>
</ul>

</div>
</div>
</div><!-- end welcome -->
</div><!-- end col -->
</div><!-- end row -->

<hr class="invis1">

<nav>
<ul class="pager clearfix">
<li class="pull-left"><a href="#"><i class="fa fa-angle-left"></i></a></li>
<li class="pull-right"><a href="#"><i class="fa fa-angle-right"></i></a></li>
</ul>
</nav>

</div><!-- end container -->
</section><!-- end section -->
<?php //die; ?>