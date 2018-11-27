<?php //echo '<pre>'; print_r($orders);?>        

        <section class="section paralbackground page-banner" style="background-image:url('<?php echo base_url()?>resources/front/upload/page_banner_04.jpg');" data-img-width="2000" data-img-height="400" data-diff="100">
        </section><!-- end section -->

        <div class="section page-title">
            <div class="container clearfix">
                <div class="title-area pull-left">
                    <h2>Cart & Checkout <small></small></h2>
                </div><!-- /.pull-right -->
                <div class="pull-right hidden-xs">
                    <div class="bread">
                        <ol class="breadcrumb">
                            <li><a href="<?php echo base_url()?>">Home</a></li>
                            <!-- <li class="active">Shop</li> -->
                        </ol>
                    </div><!-- end bread -->
                </div><!-- /.pull-right -->
            </div>
        </div><!-- end page-title -->

        <section class="section lb">
            <div class="container">

                <div class="cart-body">
                    <form class="form-horizontal row" method="post">
                        <div class="col-lg-10 col-md-offset-1 col-md-12">
                            <!--REVIEW ORDER-->
                            <div class="panel panel-info">
                                <div class="panel-heading">
                                    Review Order
                                </div>
                                <div class="panel-body">
                                    <?php 
                                        $grand_total = 0;
                                    foreach($orders as $order){
                                        $grand_total+=$order['order_price'];
                                    ?>
                                    <div class="form-group">
                                        <div class="col-sm-3 col-xs-3">
                                            <a href="#"><img class="img-responsive" src="<?php echo base_url()?>resources/front/upload/shop_01.jpg" alt=""></a>
                                        </div>
                                        <div class="col-sm-4 col-xs-6">
                                            <div class="col-xs-12">
                                                <h4><?php echo $order['order_title'];?></h4></div>
                                            <div class="col-xs-12"><small>Period:<span>3 Month</span></small></div>
                                        </div>
                                        <div class="col-sm-3 col-xs-3 text-right">
                                            <h6><span>$</span><?php echo $order['order_price'];?></h6>
                                        </div>
                                        <div class="col-sm-2 col-xs-2 text-right">
                                            <a href="<?php echo base_url()?>cart/remove/<?php echo $order['order_id'];?>" onclick="return confirm('Are you sure?')"><i class="fa fa-close"></i></a>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <hr />
                                    </div>
                                    <?php }?>
                                    <div class="form-group">
                                        <hr />
                                    </div>
                                    <div class="form-group">
                                        <div class="col-xs-12">
                                            <label>Order Total</label>
                                            <h6><span>$</span> <span><?php echo $grand_total;?></span></h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--REVIEW ORDER END-->

                            <!--SHIPPING METHOD-->
                            <div class="panel panel-info contact_form">
                                <div class="panel-heading">Shipping Address</div>
                                <div class="panel-body">
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label>Country:</label>
                                        </div>
                                        <div class="col-md-12">
                                            <input type="text" class="form-control" name="country" value="" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-6 col-xs-12">
                                            <label>First Name:</label>
                                            <input type="text" name="first_name" class="form-control" value="" />
                                        </div>
                                        <div class="span1"></div>
                                        <div class="col-md-6 col-xs-12">
                                            <label>Last Name:</label>
                                            <input type="text" name="last_name" class="form-control" value="" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label>Address:</label>
                                        </div>
                                        <div class="col-md-12">
                                            <input type="text" name="address" class="form-control" value="" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label>City:</label>
                                        </div>
                                        <div class="col-md-12">
                                            <input type="text" name="city" class="form-control" value="" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label>State:</label>
                                        </div>
                                        <div class="col-md-12">
                                            <input type="text" name="state" class="form-control" value="" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label>Zip / Postal Code:</label>
                                        </div>
                                        <div class="col-md-12">
                                            <input type="text" name="zip_code" class="form-control" value="" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label>Phone Number:</label>
                                        </div>
                                        <div class="col-md-12">
                                            <input type="text" name="phone_number" class="form-control" value="" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label>Email Address:</label>
                                        </div>
                                        <div class="col-md-12">
                                            <input type="text" name="email_address" class="form-control" value="" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--SHIPPING METHOD END-->

                            <!--CREDIT CART PAYMENT-->
                            <div class="panel panel-info contact_form">
                                <div class="panel-heading"><span><i class="glyphicon glyphicon-lock"></i></span> Secure Payment</div>
                                <div class="panel-body">
                                    <div class="form-group">
                                        <div class="col-md-6">
                                            <label>Card Type:</label>
                                        </div>
                                        <div class="col-md-6">
                                            <select name="orderby" class="form-control">
                                                <option value="5">Visa</option>
                                                <option value="6">MasterCard</option>
                                                <option value="7">American Express</option>
                                                <option value="8">Discover</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-6">
                                            <label>Credit Card Number:</label>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name="car_number" value="" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-6">
                                            <label>Credit Holder Name:</label>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name="car_number" value="" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-6">
                                            <label>Select Month:</label>
                                        </div>
                                        <div class="col-md-6">
                                            <select name="orderby" class="form-control">
                                                <option>Month</option>
                                                <option>01</option>
                                                <option>02</option>
                                                <option>03</option>
                                                <option>04</option>
                                                <option>05</option>
                                                <option>06</option>
                                                <option>07</option>
                                                <option>08</option>
                                                <option>09</option>
                                                <option>10</option>
                                                <option>11</option>
                                                <option>12</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-6">
                                            <label>Select Year:</label>
                                        </div>
                                        <div class="col-md-6">
                                            <select name="orderby" class="form-control">
                                                <option>Year</option>
                                                <option>2016</option>
                                                <option>2017</option>
                                                <option>2018</option>
                                                <option>2019</option>
                                                <option>2020</option>
                                                <option>2021</option>
                                                <option>2022</option>
                                                <option>2023</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-6">
                                            <p>Pay secure using your credit card.</p>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="payment-methods">
                                                <ul class="list-inline text-left">
                                                    <li>
                                                        <a href="#"><img src="<?php echo base_url()?>resources/front/upload/payment_01.png" alt=""></a>
                                                    </li>
                                                    <li>
                                                        <a href="#"><img src="<?php echo base_url()?>resources/front/upload/payment_02.png" alt=""></a>
                                                    </li>
                                                    <li>
                                                        <a href="#"><img src="<?php echo base_url()?>resources/front/upload/payment_03.png" alt=""></a>
                                                    </li>
                                                    <li>
                                                        <a href="#"><img src="<?php echo base_url()?>resources/front/upload/payment_04.png" alt=""></a>
                                                    </li>
                                                    <li>
                                                        <a href="#"><img src="<?php echo base_url()?>resources/front/upload/payment_05.png" alt=""></a>
                                                    </li>
                                                    <li>
                                                        <a href="#"><img src="<?php echo base_url()?>resources/front/upload/payment_06.png" alt=""></a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <button type="submit" class="btn btn-primary">Place Order</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--CREDIT CART PAYMENT END-->
                        </div>
                    </form>
                </div>

            </div>
            <!-- end container -->
        </section>
        <!-- end section -->