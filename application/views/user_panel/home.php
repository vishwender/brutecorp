<!--=====================Start Slider-->
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


<section class="section nopadtop">
<div class="container-fluid">
<div class="row center-tab">

<div class="panel-body container">
<div class="row">

<div class="col-md-8 col-sm-12">
<div class="hfeatures">
<div class="big-title">
    <h3>Welcome to your<br>
    <span>Brutecorp <font>(Complete Web Services)</font></span>
    </h3>
    <p><b>Web-development is not only our profession, it's our passion.</b></p>
    <hr>
</div>

<ul class="lists-elements">
<li class="first">
<div class="box">
<div class="icon-container alignleft">
<?php //echo img(array('src'=>aw_config_item('front'). 'images/icons/feature_01.png','class'=>'img-responsive')) ?>
</div>

<div class="feature-desc">
<h4><a href="" title="Website Development">Website Development</a></h4>
<p>Suspendisse posuere lectus sed nunc bibendum, in suscipit felis imperdiet.
</p>

</div><!-- end desc -->
</div><!-- end featurebox -->
</li><!-- end col -->
<li class="last">
<div class="box">
<div class="icon-container alignleft">
<?php //echo img(array('src'=>aw_config_item('front'). 'images/icons/feature_02.png','class'=>'img-responsive')) ?>
</div>

<div class="feature-desc">
<h4><a href="">Domain & Hosting</a></h4>
<p>Suspendisse non ipsum condimentum, facilisis lorem id, eleifend lacus.</p>
</div><!-- end desc -->
</div><!-- end featurebox -->
</li><!-- end col -->
<li class="first">
<div class="box">
<div class="icon-container alignleft">
<?php //echo img(array('src'=>aw_config_item('front'). 'images/icons/feature_03.png','class'=>'img-responsive')) ?>
</div>

<div class="feature-desc">
<h4><a href="">Online Promotion</a></h4>
<p>Vestibulum placerat lacus nec felis iaculis, sit amet tempus eros maximus.</p>
</div><!-- end desc -->
</div><!-- end featurebox -->
</li><!-- end col -->
<li class="last">
<div class="box">
<div class="icon-container alignleft">
<?php //echo img(array('src'=>aw_config_item('front'). 'images/icons/feature_04.png','class'=>'img-responsive')) ?>
</div>

<div class="feature-desc">
<h4><a href="">Graphic Designing</a></h4>
<p>Nulla tincidunt diam vehicula, dictum magna ut, vestibulum eros sit amet.</p>
</div><!-- end desc -->
</div><!-- end featurebox -->
</li><!-- end col -->
<li class="first">
<div class="box">
<div class="icon-container alignleft">
<?php echo img(array('src'=>aw_config_item('front'). 'images/icons/feature_05.png','class'=>'img-responsive')) ?>
</div>

<div class="feature-desc">
<h4><a href="">SEO, PPC</a></h4>
<p>Duis eleifend enim eget turpis aliquam, vitae bibendum tellus varius.</p>
</div><!-- end desc -->
</div><!-- end featurebox -->
</li><!-- end col -->
<li class="last">
<div class="box">
<div class="icon-container alignleft">
<?php echo img(array('src'=>aw_config_item('front'). 'images/icons/feature_06.png','class'=>'img-responsive')) ?>
</div>

<div class="feature-desc">
<h4><a href="">Social Media</a></h4>
<p>Pellentesque eget justo quis lorem commodo consectetur non sit amet lorem.</p>
</div><!-- end desc -->
</div><!-- end featurebox -->
</li><!-- end col -->
</ul>
</div><!-- end hfeatures -->
</div><!-- end col -->




<div class="col-md-4 col-sm-12 col-xs-12">

<div class="widget">
<div class="loginbox text-center" id="quey-form">
<h3>Get A Quote !</h3>
<p>Details About Your Project</p>
<?php echo form_open('user/requestquote'); ?>
<?php echo form_input(array('name'=>'name', 'class'=>'form-control','id'=>'name','placeholder'=>'Add your name here..','required'=>'required','value'=>set_value('name'))) ?>
<?php echo form_input(array('name'=>'email', 'class'=>'form-control','id'=>'email','placeholder'=>'Add your email here..','required'=>'required','value'=>set_value('email'))) ?>
<?php echo form_input(array('name'=>'phone', 'class'=>'form-control','id'=>'phone','placeholder'=>'Add your phone no..','required'=>'required','value'=>set_value('phone'))) ?>
<?php echo form_dropdown('budget',array('Less Then Rs. 5,000'=>'Less Then Rs. 5,000', 'Between Rs. 5,000 - Rs. 10,000'=>'Between Rs. 10,000 - Rs. 20,000','Between Rs. 10,000 - Rs. 20,000'=>'Between Rs. 10,000 - Rs. 20,000','Between Rs. 20,000 - Rs. 30,000'=>'Between Rs. 20,000 - Rs. 30,000','Between Rs. 30,000 - Rs. 50,000'=>'Between Rs. 30,000 - Rs. 50,000','Above Rs. 50,000'=>'Above Rs. 50,000'),set_value('budget'),'class="form-control"') ?>
<?php echo form_input(array('name'=>'subject','placeholder'=>'Add your subject here..','required'=>'required','class'=>'form-control','id'=>'subject','value'=>set_value('subject'))) ?>
<?php $data=array();
foreach($categorys as $key => $list){
	$data[$list['category_name']]=$list['category_name'];
}
echo form_dropdown('interest',$data,set_value('interest'),'class="form-control"') ?>
<?php echo form_textarea(array('name'=>'message', 'class'=>'form-control','required'=>'required','value'=>set_value('message'))) ?>
<?php echo form_submit('submit','Subscribe','class="btn btn-primary btn-block"') ?>
<?php echo form_close(); ?>         
</div><!-- end newsletter -->
</div><!-- end widget -->


</div><!-- end col -->
</div><!-- end row -->

</div><!-- end panel-body -->
</div><!-- end row -->
</div><!-- end container -->
</section><!-- end section -->

<section class="section lb">
<div class="container">
<div class="section-title text-center">
<h3>Our <span>Protfolio</span> Best</h3>
<p class="last">
Because we offer high-quality support, unlimited disk usage and bandwidth with all our packages.<br> Some reasons and dashboard screenshots listed below.
</p>
</div>

<div class="row text-center normal-gallery">

<?php $count=0; foreach($portfolio as $key => $list){ $count+=1; if ($count>8){break;}  ?>
        <div class="col-md-3 col-sm-6 col-sm-12 clearfix">
			<div class="gallery-column">
				<div class="post-media entry">
					<?php echo img(array('src'=>aw_config_item('back'). 'portfolio/tmp/'. $list['portfolio_image'],'class'=>'img-responsive')) ?>
					<div class="magnifier">
<div class="visible-buttons">
<span><a data-placement="bottom" data-toggle="tooltip" title="" href="blog-single.html" data-original-title=""><i class="fa fa-search"></i></a></span>
</div>
</div>
				</div>
				<div class="wbp">
					<h3><a href="<?php echo base_url() ?>portfolio" target="_blank"><?php echo $list['portfolio_title'] ?></a></h3>
					<p><?php echo aw_word_limiter($list['portfolio_description'],20) ?></p>
				</div>
			</div><!-- end gallery-column -->
		</div><!-- end col -->
			
      <?php } ?>

<div class="clearfix"></div>

</div><!-- end row -->


<nav class="clearfix text-center">
<a href="<?php echo base_url() ?>portfolio" target="_blank" class="btn btn-primary"><i class="fa fa-arrows-alt" aria-hidden="true"></i> View Full Portfolio </a>
</nav>

</div><!-- end container -->
</section>

<section class="section nopadding clearfix" style="background-color: #00458e;">
<div class="container">
<div class="row">
<div class="col-md-5 col-sm-12 customsection hidden-sm hidden-xs">
<?php echo img(aw_config_item('front'). 'images/section_01.jpg') ?>
<div class="text_container">
<span class="logo"></span>
<!--<h4>We taking care of each detail</h4>-->
<!--<p>Welcome to the HostHubs, we make really beautiful and amazing stuff. This can be used to describe what you do, how you do it, & who you do it for. Don’t miss today!</p>
<a href="#" class="btn btn-primary">Buy Theme</a>-->
</div>
</div>

<div class="col-md-7 col-sm-12">
<div class="box-feature-full clearfix">
<div class="vertical-elements">
<div class="box" id="cbox">
<div class="feature-desc">
<h4>Clean code</h4>
<p>We provide the code with easy to understand by users with tagged comments. Coding should be like that its easy and reliable. Our programmers provide clean coding.</p>
</div><!-- end desc -->
</div><!-- end featurebox -->


<div class="box" id="cbox">
<div class="feature-desc">
<h4>Fast page loading</h4>
<p>Light weight pages for website is necessary to increase the productivity of website. Fast loading pages attract users to easily load pages without wasting time.</p>
</div><!-- end desc -->
</div><!-- end featurebox -->

<div class="box" id="cbox">
<!--<div class="icon-container alignleft">
<i class="fa fa-spinner" aria-hidden="true"></i>
</div>-->
<div class="feature-desc">
<h4>Created with love</h4>
<p>As our team is good at their work. We create a code with love and passion. We make a trust of our existing clients and trying to make a good relation to new clients by providing all facility to them.</p>
</div><!-- end desc -->
</div><!-- end featurebox -->
</div><!-- end vertical -->
</div>
</div>
</div>
</div>
</section>

<section class="section lb">
<div class="container">
<div class="section-title text-center">
<h3>Best Selling<span> Plans</span></h3>
<p class="last">
Listed below our awesome hosting packages. You can select any web hosting services below!<br> If your package not listed here don't forget to check our <strong><a href="#">hosting compose</a></strong> page.
</p>
</div><!-- end section-title -->
<br/>
                            <div class="row flat white-style">
                                <div class="col-md-3 col-sm-12 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.2s">
                                    <ul class="plan plan1">
                                        <li class="plan-name">
                                        Beginner Package
                                        </li>
                                        <li class="plan-price">
                                        <strong>$11</strong> / month
                                        </li>
                                        <li>
                                        <strong>5GB</strong> Storage
                                        </li>
                                        <li>
                                        <strong>1GB</strong> RAM
                                        </li>
                                        <li>
                                        <strong>400GB</strong> Bandwidth
                                        </li>
                                        <li>
                                        <strong>10</strong> Email Address
                                        </li>
                                        <li>
                                        <strong>Forum</strong> Support
                                        </li>
                                        <li class="plan-action">
										<?php echo anchor('user/signup','Signup',array('class'=>'btn btn-primary')) ?>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-md-3 col-sm-12 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.4s">
                                    <ul class="plan plan2">
                                        <li class="plan-name">
                                        Professional Package
                                        </li>
                                        <li class="plan-price">
                                        <strong>$55</strong> / month
                                        </li>
                                        <li>
                                        <strong>5GB</strong> Storage
                                        </li>
                                        <li>
                                        <strong>1GB</strong> RAM
                                        </li>
                                        <li>
                                        <strong>400GB</strong> Bandwidth
                                        </li>
                                        <li>
                                        <strong>10</strong> Email Address
                                        </li>
                                        <li>
                                        <strong>Forum</strong> Support
                                        </li>
                                        <li class="plan-action">
                                        <?php echo anchor('user/signup','Signup',array('class'=>'btn btn-primary')) ?>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-md-3 col-sm-12 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.6s">
                                    <ul class="plan plan3 featured">
                                        <li class="plan-name">
                                        Business Package
                                        </li>
                                        <li class="plan-price">
                                        <strong>$99</strong> / month
                                        </li>
                                        <li>
                                        <strong>50GB</strong> Storage
                                        </li>
                                        <li>
                                        <strong>8GB</strong> RAM
                                        </li>
                                        <li>
                                        <strong>1024GB</strong> Bandwidth
                                        </li>
                                        <li>
                                        <strong>Unlimited</strong> Email Address
                                        </li>
                                        <li>
                                        <strong>Forum</strong> Support
                                        </li>
                                        <li class="plan-action">
                                       		<?php echo anchor('user/signup','Signup',array('class'=>'btn btn-primary')) ?>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-md-3 col-sm-12 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.8s">
                                    <ul class="plan plan4">
                                        <li class="plan-name">
                                        Ultimate Package
                                        </li>
                                        <li class="plan-price">
                                        <strong>$190</strong> / month
                                        </li>
                                        <li>
                                        <strong>50GB</strong> Storage
                                        </li>
                                        <li>
                                        <strong>8GB</strong> RAM
                                        </li>
                                        <li>
                                        <strong>1024GB</strong> Bandwidth
                                        </li>
                                        <li>
                                        <strong>Unlimited</strong> Email Address
                                        </li>
                                        <li>
                                        <strong>Forum</strong> Support
                                        </li>
                                        <li class="plan-action">
                                        	<?php echo anchor('user/signup','Signup',array('class'=>'btn btn-primary')) ?>
                                        </li>
                                    </ul>
                                </div>
                            </div><!-- end flat -->						
</div><!-- end container -->
</section>

<section class="smallsec">
<div class="container">
<div class="row">
<div class="col-md-8 text-center">
<h3>Start Building Your 10x Fast Website Today!</h3>
</div>
<div class="col-md-4 text-center">
<a href="#" class="btn btn-primary btn-lg">Compose All Plans</a>
</div><!-- end col -->
</div><!-- end row -->
</div><!-- end container -->
</section>

<section class="section testibanner">
            <div class="container-fluid">
                <div class="section-title text-center">
                    <h3>Happy <span>Testimonials</span></h3>
                    <p class="last">
                        Let's see what other's say about HostHubs web hosting company!<br> 10.000+ customers can not be wrong!
                    </p>
                </div><!-- end section-title -->

                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <div class="row testimonials">
                            <div class="col-md-3 col-sm-6 m30">
                                <blockquote>
                                    <p class="clients-words"> One of the best theme i ever found , i was always wishing theme like this for my project. i really love it good job!</p>
                                    <span class="clients-name text-primary"> - Amanda Corey</span>
									<?php echo img(array('src'=>aw_config_item('front'). 'images/client_01.png','class'=>'img-circle img-thumbnail')) ?>
									
                                </blockquote>
                            </div>
                            <div class="col-md-3 col-sm-6 m30">
                                <blockquote>
                                    <p class="clients-words">HostHubs is an one powerful hosting company! Now with Php contact form. Perfect! Nice design, great support. </p>
                                    <span class="clients-name text-primary"> - Factory nn (@facnnteam)</span>
									<?php echo img(array('src'=>aw_config_item('front'). 'images/client_02.png','class'=>'img-circle img-thumbnail')) ?>
                                </blockquote>
                            </div>
                            <div class="col-md-3 col-sm-6">
                                <blockquote>
                                    <p  class="clients-words"> It's an amazing hosting!. HostHubs is very easy to edit for a beginner and the design quality excellent.</p>
                                    <span class="clients-name text-primary"> - Martin Lorrenso</span>
                                    <img class="img-circle img-thumbnail" src="upload/client_03.png" alt="">
									<?php echo img(array('src'=>aw_config_item('front'). 'images/client_03.png','class'=>'img-circle img-thumbnail')) ?>
                                </blockquote>
                            </div>
                            <div class="col-md-3 col-sm-6">
                                <blockquote>
                                    <p  class="clients-words">Well designed and organized hosting package! with good amount of features available in it. High recommended!</p>
                                    <span class="clients-name text-primary"> - Boby Anderson</span>
									<?php echo img(array('src'=>aw_config_item('front'). 'images/client_04.png','class'=>'img-circle img-thumbnail')) ?>
                                </blockquote>
                            </div>
                        </div>
                    </div><!--/.col-->  
                </div><!--/.row-->
            </div><!-- end container -->
        </section>
		
<section class="section overflow">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="big-title">
                            <h3>Best Companies in IT Fields<br>
                            <span>Our Partners</span>
                            </h3>
                        </div><!-- end big-title -->

                        <div class="hfeatures">
                            <p>With our awesome one-click installation tool, you can build your own <strong>content management system</strong> just a minute. Drop your folder name which you want to one-click installation...</p>

                            <ul class="work-elements">
                                <li>
                                    <div class="box GrayScale">
                                        <div class="icon-container">
											<?php echo img(array('src'=>aw_config_item('front'). 'images/work_01.png','class'=>'img-responsive')) ?>
                                        </div>
                                    </div><!-- end featurebox -->
                                </li><!-- end col -->

                                <li>
                                    <div class="box GrayScale">
                                        <div class="icon-container">
											<?php echo img(array('src'=>aw_config_item('front'). 'images/work_02.png','class'=>'img-responsive')) ?>
                                        </div>
                                    </div><!-- end featurebox -->
                                </li><!-- end col -->

                                <li>
                                    <div class="box GrayScale">
                                        <div class="icon-container">
											<?php echo img(array('src'=>aw_config_item('front'). 'images/work_03.png','class'=>'img-responsive')) ?>
                                        </div>
                                    </div><!-- end featurebox -->
                                </li><!-- end col -->

                                <li>
                                    <div class="box GrayScale">
                                        <div class="icon-container">
											<?php echo img(array('src'=>aw_config_item('front'). 'images/work_04.png','class'=>'img-responsive')) ?>
                                        </div>
                                    </div><!-- end featurebox -->
                                </li><!-- end col -->

                                <li>
                                    <div class="box GrayScale">
                                        <div class="icon-container">
											<?php echo img(array('src'=>aw_config_item('front'). 'images/work_05.png','class'=>'img-responsive')) ?>
                                        </div>
                                    </div><!-- end featurebox -->
                                </li><!-- end col -->

                                <li>
                                    <div class="box GrayScale">
                                        <div class="icon-container">
											<?php echo img(array('src'=>aw_config_item('front'). 'images/work_06.png','class'=>'img-responsive')) ?>
                                        </div>
                                    </div><!-- end featurebox -->
                                </li><!-- end col -->
                            </ul>
                        </div><!-- end hfeatures -->
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end container -->

            <div class="image-box hidden-sm hidden-xs wow slideInRight">
                <img alt="" src="<?php echo base_url();?>resources/front/images/device_04.png">
            </div>
        </section>

