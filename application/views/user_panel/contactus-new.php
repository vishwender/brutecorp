        <section class="section paralbackground page-banner" style="background-image:url('<?php echo base_url()?>resources/front/upload/page_banner_04.jpg');" data-img-width="2000" data-img-height="400" data-diff="100">
        </section><!-- end section -->

        <div class="section page-title lb">
            <div class="container clearfix">
                <div class="title-area pull-left">
                    <h2>Contact Center <small>Welcome to the BruteCorp Support Center</small></h2>
                </div><!-- /.pull-right -->
                <div class="pull-right hidden-xs">
                    <div class="bread">
                        <ol class="breadcrumb">
                            <li><a href="<?php echo base_url()?>">Home</a></li>
                            <li class="active">Contact</li>
                        </ol>
                    </div><!-- end bread -->
                </div><!-- /.pull-right -->
            </div>
        </div><!-- end page-title -->

        <section class="section">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-12 col-xs-12">
                        <div>
                            <div class="small-title">
                                <h3>France Office</h3>
                                <hr>
                            </div><!-- end big-title -->

                            <div class="email-widget">
                                <p>PO Box 16122 Collins Street West Victoria 8007 HustHubs INC. France.</p>
                                <ul class="check-list">
                                    <li><a href="#">france@hosthubs.com</a></li>
                                    <li><a href="#">+90 123 45 67 89</a></li>
                                </ul><!-- end check -->
                            </div><!-- end email widget -->
                        </div><!-- end wbp -->    
                    </div><!-- end col -->

                    <div class="col-md-4 col-sm-12 col-xs-12">
                        <div>
                            <div class="small-title">
                                <h3>Amsterdam Office</h3>
                                <hr>
                            </div><!-- end big-title -->

                            <div class="email-widget">
                                <p>PO Box 16122 Collins Street West Victoria 8007 HustHubs INC. Holland.</p>
                                <ul class="check-list">
                                    <li><a href="#">amsterdam@hosthubs.com</a></li>
                                    <li><a href="#">+90 123 45 67 89</a></li>
                                </ul><!-- end check -->
                            </div><!-- end email widget -->
                        </div><!-- end wbp -->    
                    </div><!-- end col -->

                    <div class="col-md-4 col-sm-12 col-xs-12">
                        <div>
                            <div class="small-title">
                                <h3>Istanbul Office</h3>
                                <hr>
                            </div><!-- end big-title -->

                            <div class="email-widget">
                                <p>PO Box 16122 Collins Street West Victoria 8007 HustHubs INC. Turkei.</p>
                                <ul class="check-list">
                                    <li><a href="#">istanbul@hosthubs.com</a></li>
                                    <li><a href="#">+90 123 45 67 89</a></li>
                                </ul><!-- end check -->
                            </div><!-- end email widget -->
                        </div><!-- end wbp -->    
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end container -->
        </section><!-- end section -->

        <section class="section lb">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="support-box whitebg">
                            <h3>Postal Support</h3>
                            <p>PO Box 16122 Collins Street West
                            Victoria 8007 HustHubs INC. Australia<br>
                            <a href="#">support@hosthubs.com</a></p>
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
                                <div id="message">
<?php echo validation_errors('<div class="alert alert-danger" role="alert">','</div>');
    $error=$this->session->flashdata('error');
if (!empty($error))
    echo '<div class="alert alert-danger" role="alert">'. $error. '</div>';
$message=$this->session->flashdata('message');
if (!empty($message))
    echo '<div class="alert alert-success alert-dismissable" role="alert">'. $message. '</div>';
?>
                                </div>
                                <form action="<?php echo base_url();?>contactus" method="POST">
                                    <div class="col-md-12">
                                    <input type="text" name="user_name" id="user_name" class="form-control" placeholder="Name"> 
                                    <input type="text" name="user_email" id="user_email" class="form-control" placeholder="Email"> 
                                    <input type="text" name="user_phone" id="user_phone" class="form-control" placeholder="Phone"> 
                                    <input type="text" name="user_subject" id="user_subject" class="form-control" placeholder="Subject"> 
                                    <textarea class="form-control" name="user_message" id="user_message" rows="6" placeholder="Message"></textarea>
                                    <input type="submit" value="Send" class="btn btn-primary">
                                    </div>
                                </form> 
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
        </section><!-- end section -->

        <div class="googlemap">
            <div id="map"></div>
        </div><!-- end googlemap -->
<script src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script src="<?php echo base_url()?>resources/front/js/map.js"></script>