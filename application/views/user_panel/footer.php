        <footer class="footer lb">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-12">
                        <div class="widget clearfix">
                            <div class="widget-title">
                                <h4>Hosting Packages</h4>
                            </div><!-- end widget-title -->

                            <div class="link-widget">   
                                <ul class="check">
                                    <li><a href="#">Web Hosting</a></li>
                                    <li><a href="#">WordPress Hosting</a></li>
                                    <li><a href="#">VPS Hosting</a></li>
                                    <li><a href="#">Cloud Server</a></li>
                                    <li><a href="#">Reseller Package</a></li>
                                    <li><a href="#">Dedicated Hosting</a></li>
                                </ul><!-- end check -->
                            </div><!-- end link-widget -->
                        </div>

                        <hr>

                        <div class="widget clearfix">
                            <div class="widget-title">
                                <h4>Domain Names</h4>
                            </div><!-- end widget-title -->

                            <div class="link-widget">   
                                <ul class="check">
                                    <li><a href="#">Buy a Domain</a></li>
                                    <li><a href="#">Premium Domain Names</a></li>
                                    <li><a href="#">Transfer Your Domain</a></li>
                                    <li><a href="#">Domain Marketplace</a></li>
                                </ul><!-- end check -->
                            </div><!-- end link-widget -->
                        </div>
                    </div><!-- end col -->

                    <div class="col-md-3 col-sm-12">
                        <div class="widget clearfix">
                            <div class="widget-title">
                                <h4>Company</h4>
                            </div><!-- end widget-title -->

                            <div class="link-widget">   
                                <ul class="check">
                                    <li><a href="<?php echo base_url();?>aboutus">About Brutecorp</a></li>
                                    <li><a href="<?php echo base_url();?>contactus">Contact Us</a></li>
                                    <li><a href="#">Our Team Members</a></li>
                                    <li><a href="#">Worldwide Offices</a></li>
                                    <li><a href="#">Worldwide Meet Up</a></li>
                                    <li><a href="#">Awards & Reviews</a></li>
                                    <li><a href="#">Brutecorp in Press</a></li>
                                    <li><a href="#">Carrers</a></li>
                                    <li><a href="#">User Guide</a></li>
                                    <li><a href="#">Knowledgebase</a></li>
                                    <li><a href="#">Affiliate</a></li>
                                </ul><!-- end check -->
                            </div><!-- end link-widget -->
                        </div>
                    </div><!-- end col -->

                    <div class="col-md-3 col-sm-12">
                        <div class="widget clearfix">
                            <div class="widget-title">
                                <h4>Support</h4>
                            </div><!-- end widget-title -->

                            <div class="link-widget">   
                                <ul class="check">
                                    <li><a href="#">Get In Touch</a></li>
                                    <li><a href="#">Support Forums</a></li>
                                    <li><a href="#">Submit a Ticket</a></li>
                                    <li><a href="#">Video Tutorials</a></li>
                                    <li><a href="#">Live Chat Support</a></li>
                                </ul><!-- end check -->
                            </div><!-- end link-widget -->
                        </div>

                        <hr>

                        <div class="widget clearfix">
                            <div class="widget-title">
                                <h4>Domain Names</h4>
                            </div><!-- end widget-title -->

                            <div class="link-widget">   
                                <ul class="check">
                                    <li><a href="#">Buy a Domain</a></li>
                                    <li><a href="#">Premium Domain Names</a></li>
                                    <li><a href="#">Transfer Your Domain</a></li>
                                    <li><a href="#">Domain Marketplace</a></li>
                                    <li><a href="#">Manage Domains</a></li>
                                </ul><!-- end check -->
                            </div><!-- end link-widget -->
                        </div>
                    </div><!-- end col -->

                    <div class="col-md-3 col-sm-12">
                        <div class="widget clearfix">
                            <div class="widget-title">
                                <h4>Email Newsletter</h4>
                            </div><!-- end widget-title -->

                            <div class="newsletter-widget">
                                <p>Subscribe our newsletter for discount and coupon codes</p>
                                        <?php $this->auth->create_token();
echo validation_errors('<div class="alert alert-danger" role="alert">','</div>');
$error=$this->session->flashdata('error');
if (!empty($error))
echo '<div class="alert alert-danger" role="alert">'. $error. '</div>';
$message=$this->session->flashdata('message');
if (!empty($message))
echo '<div class="alert alert-success alert-dismissable" role="alert">'. $message. '</div>';
?>
                                <?php echo form_open('user/newsletter');?>
                                    <input type="text" name="user_name" class="form-control input-lg" placeholder="Your name" />
                                    <input type="email" name="email" class="form-control input-lg" placeholder="Email" />
                                    <input type="submit" name="submit" class="btn btn-primary btn-block" value="Subscribe Now">
                                <?php echo form_close();?>
                            </div><!-- end newsletter -->
                        </div>

                        <hr>

                        <div class="widget clearfix">
                            <div class="widget-title">
                                <h4>Find us on</h4>
                            </div><!-- end widget-title -->
                            <div class="downloadbuttons clearfix">
                                <a href="#"><img src="<?php echo base_url()?>resources/front/images/appstore.png" alt=""></a>
                                <a href="#"><img src="<?php echo base_url()?>resources/front/images/googlestore.png" alt=""></a>
                            </div>
                        </div>
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end container -->
        </footer><!-- end footer -->

        <div class="footer-distributed">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-12 footer-left">
                        <div class="widget">
                        <img src="<?php echo base_url()?>resources/front/images/flogo.png" alt="">
                        <p class="footer-links">
                            <a href="<?php echo base_url();?>">Home</a>
                            |
                            <a href="#">Blog</a>
                            |
                            <a href="#">Pricing</a>
                            |
                            <a href="<?php echo base_url();?>aboutus">About</a>
                            |
                            <a href="#">Faq</a>
                            |
                            <a href="<?php echo base_url();?>contactus">Contact</a>
                        </p>
                        <p class="footer-company-name">BruteCorp &copy; <?php echo date('Y');?></p>
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-12 footer-center">
                        <div class="widget">
                        <div>
                            <i class="fa fa-map-marker"></i>
                            <p>21 Revolution Street Paris, France</p>
                        </div>
                        <div>
                            <i class="fa fa-phone"></i>
                            <p>+1 555 123456</p>
                        </div>
                        <div>
                            <i class="fa fa-envelope-o"></i>
                            <p><a href="mailto:support@company.com">info@brutecorp.com</a></p>
                        </div>
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-12 footer-right">
                        <div class="widget">
                        <p class="footer-company-about">
                            <span>BruteCorp</span>
                            Web-development is not only our profession, it’s our passion.
                        </p>
                        <div class="footer-icons">
                            <a href="facebook.com"><i class="fa fa-facebook"></i></a>
                            <a href="twitter.com"><i class="fa fa-twitter"></i></a>
                            <a href="linkedin.com"><i class="fa fa-linkedin"></i></a>
                            <a href="github.com"><i class="fa fa-github"></i></a>
                        </div>
                        </div>
                    </div>
                </div><!-- end row -->
            </div><!-- end container -->
        </div><!-- end copyrights -->

