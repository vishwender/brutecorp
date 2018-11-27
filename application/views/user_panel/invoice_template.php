<?php foreach($invoice as $key => $list){ ?>
<div class="content">
        <div class="main-content">
            <div class="row padding-top">
    <div class="col-md-10 col-md-offset-1">
        <div class="row">
            <div class="col-md-6">
                <span style="font-size: 28px;"><?php echo img(array('src'=>aw_config_item('front'). 'images/brutecorp.png','width'=>100)) ?> Brute Corp</span>
                
                <address>
                <span><b>From : </b></span>
                    2, First Floor, <br>
                    Near Punjab & Sind Bank,<br>
                    Lohgarh Chowk, Amritsar-143001,<br>
                    Punjab, India <br />
                    +91-9646423299,+91-9780044159
                </address>
            </div>
            <div class="pull-right well">
                <table>
                    <tbody>
                        <tr>
                            <td class="pull-right padding-right"><strong>Customer #</strong></td>
                            <?php foreach($user_info as $key => $list2){ ?>
                            <td><?php echo $list2['user_id'] ?></td>
                            <?php } ?>
                            </tr>
                            <tr>
                            <td class="pull-right padding-right"><strong>Invoice #</strong></td>
                            <td><?php echo $list['order_invoice_no'] ?></td>
                            </tr>
                            <tr>
                            <td class="pull-right padding-right"><strong>Date</strong></td>
                            <td><?php echo aw_convert_date($list['order_invoice_date']); ?></td>
                            </tr>
                            <tr>
                            <td class="pull-right padding-right"><strong>Period</strong></td>
                            <td><?php echo aw_convt_date($list['order_register_date']) ?> &mdash; <?php echo aw_convt_date($list['order_expired_date']) ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
                    <?php if ($list['order_invoice_status']=='Paid'){ echo img(array('src'=>aw_config_item('front'). 'images/paid.png','width'=>'100'));}
                    elseif($list['order_invoice_status']=='Unpaid'){ echo img(array('src'=>aw_config_item('front'). 'images/unpaid.png','width'=>'100'));}
                    
                    ?>
            </div>
                <?php foreach($user_info as $key => $list2){ ?>
            <div class="row">
                <div class="col-md-12">
                    <h3><?php echo $list['order_invoice_name'] ?></h3>
                    <address>
                    <span><b>To :</b> </span>
                        <?php echo $list2['user_address'] ?><br>
                        <?php echo $list2['user_mobile'] ?>
                    </address>
                </div>
            </div>
            <?php } ?>
            <div class="row">
                <div class="col-md-8">
                    <h2><b>Invoice</b></h2>
                </div>
            </div>
            <h3>Services</h3>
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Description</th>
                                <th>Date</th>
                                <th>Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><?php echo $list['order_title'] ?><br><p class="text-sm"><?php echo $list['order_description'] ?></p></td>
                                <td><?php echo aw_convert_date($list['order_invoice_date']) ?></td>
                                <td><?php echo $list['order_price'] ?></td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td><strong>Total</strong></td>
                                <td><strong><?php echo $list['order_price'] ?></strong></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            
            
            <div class="row padding-top">
                <div class="col-md-12">
                    <div class="well">
                        <p style="text-align: center">Thank You for your Trust & Confidence. Look forward to working with you again soon!</p>
                    </div>
                </div>
            </div>
        </div>    
        </div>
        <hr>
            <p style="text-align: center">Brutecorp &copy; <?php echo date('Y');?></p>
    </div>
</div>
<?php } ?>