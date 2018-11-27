<?php //echo '<pre>'; print_r($order_details); echo '</pre>';?>
<?php foreach($order_details as $key => $list){ ?>
<div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2><?php echo $title;?></h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="<?php echo base_url()?>user/dashboard">Home</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url();?>user/order_list">Order List</a>
                        </li>
                        <li class="active">
                            <strong><?php echo $title;?></strong>
                        </li>
                    </ol>
                </div>
                <div class="col-lg-2">

                </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
<?php echo validation_errors('<div class="alert alert-danger" role="alert">','</div>');
      $error=$this->session->flashdata('error');
if (!empty($error))
      echo '<div class="alert alert-danger" role="alert">'. $error. '</div>';
$message=$this->session->flashdata('message');
if (!empty($message))
        echo '<div class="alert alert-success alert-dismissable" role="alert">'. $message. '</div>';
?>
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5><?php echo $title;?></h5>
                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                    <i class="fa fa-wrench"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-user">
                                    <li><a href="#">Config option 1</a>
                                    </li>
                                    <li><a href="#">Config option 2</a>
                                    </li>
                                </ul>
                                <a class="close-link">
                                    <i class="fa fa-times"></i>
                                </a>
                            </div>
                        </div>
                        <div class="ibox-content">
                            <?php //echo form_open_multipart();?>
                                <div class="form-group">
                                            <label>Order Title</label>
                                            <?php echo form_input(array('name'=>'order_title','id'=>'order_title','value'=>set_value('order_title', isset($list['order_title']) ? $list['order_title'] : ''),'class'=>'form-control','disabled'=>'disabled')) ?>
                                <div class="form-group">
                                            <label>Order register date</label>
                                            <?php echo form_input(array('name'=>'order_register_date','id'=>'order_register_date','value'=>set_value('order_register_date', isset($list['order_register_date']) ? $list['order_register_date'] : ''),'class'=>'form-control','disabled'=>'disabled')) ?>
                                        </div>
                                        
                                        </div>
                                        <div class="form-group">
                                            <label>Order expired date</label>
                                            <?php echo form_input(array('name'=>'order_expired_date','id'=>'order_expired_date','value'=>set_value('order_expired_date', isset($list['order_expired_date']) ? $list['order_expired_date'] : ''),'class'=>'form-control','disabled'=>'disabled')) ?>
                                        </div>
                                        <div class="form-group">
                                            <label>Order Description</label>
                                            <?php echo form_textarea(array('name'=>'order_description','id'=>'order_description','value'=>set_value('order_description', isset($list['order_description']) ? $list['order_description'] : ''),'class'=>'form-control','rows'=>2,'disabled'=>'disabled')) ?>
                                        </div>
                                        <div class="form-group">
                                            <label>Order Price</label>
                                            <?php echo form_input(array('name'=>'order_price','id'=>'order_price','value'=>set_value('order_price', isset($list['order_price']) ? $list['order_price'] : ''),'class'=>'form-control','disabled'=>'disabled')) ?>
                                        </div>
                                        <div class="form-group">
                                            <label>Order status</label>
                                            <?php echo form_input(array('name'=>'order_status','id'=>'order_status','value'=>set_value('order_status', isset($list['order_status']) ? $list['order_status'] : ''),'class'=>'form-control','disabled'=>'disabled')) ?>
                                        </div>
                                        <div class="form-group">
                                            <label>Order invoice no</label>
                                            <?php echo form_input(array('name'=>'order_invoice_no','id'=>'order_invoice_no','value'=>set_value('order_invoice_no', isset($list['order_invoice_no']) ? $list['order_invoice_no'] : ''),'class'=>'form-control','disabled'=>'disabled')) ?>
                                        </div>
                                        <div class="form-group">
                                            <label>Order invoice name</label>
                                            <?php echo form_input(array('name'=>'order_invoice_name','id'=>'order_invoice_name','value'=>set_value('order_invoice_name', isset($list['order_invoice_name']) ? $list['order_invoice_name'] : ''),'class'=>'form-control','disabled'=>'disabled')) ?>
                                        </div>
                            <?php 

                            $date = date('Y-m-d'); 
                            if($date == $list['order_expired_date'])
                            { ?>
                                <div class="form-group">
                                    <p><strong>Your Plan will expire Tomorrow.Please click on link to<strong> <a href="<?php echo base_url();?>user/renew_plan/<?php echo $list['order_id']?>">Renew</a></p>
                                 </div>
                            <?php
                            }
                            if($date > $list['order_expired_date'])
                            { ?>
                                <div class="form-group">
                                    <p><strong>Your Plan has expired.Please click on link to<strong> <a href="<?php echo base_url();?>user/renew_plan/<?php echo $list['order_id']?>">Renew</a></p>
                                 </div>
                            <?php
                            }
                            ?>            
                            <?php //echo form_close(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer">
    <div>
        <strong>Copyright</strong> Brutecorp &copy; <?php echo date('Y');?>
    </div>
</div>
<?php } ?>