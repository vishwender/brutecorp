<?php 
/*tcpdf();
$obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$obj_pdf->SetCreator(PDF_CREATOR);
$title = "PDF Report";
$obj_pdf->SetTitle($title);
$obj_pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, $title, PDF_HEADER_STRING);
$obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
$obj_pdf->SetDefaultMonospacedFont('helvetica');
$obj_pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
$obj_pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$obj_pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
$obj_pdf->SetFont('helvetica', '', 9);
$obj_pdf->SetPrintHeader(false);
$obj_pdf->setFontSubsetting(false);
$obj_pdf->AddPage('kjhhkjhjkhkjhjkh');
ob_start();
    // we can have any view part here like HTML, PHP etc
$content = $this->load->view('user_panel/invoice_bill',$data,true);
ob_end_clean();
$obj_pdf->writeHTML($content, true, false, true, false, '');
$obj_pdf->Output('output.pdf', 'I');*/
?>
<style>
address span {
font-weight: bold;
margin: 0px 10px 0px -50px;
}
</style>
<?php foreach($invoice as $key => $list){ ?>
<div class="content">
        <div class="main-content">
            <div class="row padding-top">
    <div class="col-md-10 col-md-offset-1">
        <div class="row">
            <div class="col-md-6">
                <span style="font-size: 28px;"><?php echo img(array('src'=>aw_config_item('front'). 'images/brutecorp.png','width'=>100)) ?> Brute Corp</span>
                
                <address>
                <span>From : </span>
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
                    <span>To : </span>
                        <?php echo $list2['user_address'] ?><br>
                        <?php echo $list2['user_mobile'] ?>
                    </address>
                </div>
            </div>
            <?php } ?>
            <div class="row">
                <div class="col-md-8">
                    <h2>Invoice</h2>
                </div>
            </div>
            <h3>Services</h3>
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-bordered table-striped">
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
                        Thank You for your Trust & Confidence. Look forward to working with you again soon!
                    </div>
                </div>
            </div>
        </div>

            
        </div>
            <?php $this->load->view('user_panel/user-footer'); ?>
    </div>


    <script src="lib/bootstrap/js/bootstrap.js"></script>
    <script type="text/javascript">
        $("[rel=tooltip]").tooltip();
        $(function() {
            $('.demo-cancel-click').click(function(){return false;});
        });
    </script>
    
  

</div>
<?php } ?>