<?php foreach($order as $key => $list){  ?>
<div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2><?php echo $title;?></h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="<?php echo base_url()?>admins/dashboard">Home</a>
                        </li>
                        <li>
                            <a>Orders</a>
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
                            <?php echo form_open_multipart('admins/franchise/edit_order/'. $list['order_id'],'role="form"') ?>
                                        <div class="form-group">
                                            <label for="title">Order Title</label>
                                            <?php echo form_input(array('name'=>'title','id'=>'title','value'=>set_value('title', isset($list['order_title']) ? $list['order_title'] : ''),'class'=>'form-control')) ?>
                                        </div>
                                        <div class="form-group">
                                            <label for="order_category">Order Category</label>
                                            <?php 
                                            $data=array();
                                            foreach($category as $key => $list2){
                                                $data[$list2['category_id']]=$list2['category_name'];
                                            }
                                            echo form_dropdown('category',$data,set_value('category', isset($list['order_category_id']) ? $list['order_category_id'] : ''),'class="form-control" id="order_category"') ?>
                                        </div>
                                        <div class="form-group">
                                            <label for="description">Order Description</label>
                                            <?php echo form_textarea(array('name'=>'description','id'=>'description','value'=>set_value('description', isset($list['order_description']) ? $list['order_description'] : ''),'class'=>'form-control')) ?>
                                        </div>
                                        <div class="form-group">
                                            <label for="order_franchise">Order Franchise</label>
                                            <?php 
                                            $data=array('1'=>'administrator');
                                            foreach($franchise as $key => $list2){
                                                $data[$list2['user_id']]=$list2['user_username'];
                                            }
                                            echo form_dropdown('franchise',$data,set_value('category', isset($list['order_franchise_id']) ? $list['order_franchise_id'] : ''),'class="form-control" id="order_franchise"') ?>
                                        </div>
                                        <div class="form-group">
                                            <label for="order_user">Order User</label>
                                            <?php 
                                            $data=array();
                                            foreach($user as $key => $list2){
                                                $data[$list2['user_id']]=$list2['user_username'];
                                            }
                                            echo form_dropdown('user',$data,set_value('user', isset($list['order_user_id']) ? $list['order_user_id'] : ''),'class="form-control" id="order_user"') ?>
                                        </div>
                                        <div class="form-group">
                                            <label for="datepicker">Registered Date</label>
                                            <?php echo form_input(array('name'=>'register','id'=>'datepicker','value'=>set_value('register', isset($list['order_register_date']) ? $list['order_register_date'] : ''),'class'=>'form-control')) ?>
                                        </div>
                                        <div class="form-group">
                                            <label for="datepicker2">Expired Date</label>
                                            <?php echo form_input(array('name'=>'expired','id'=>'datepicker2','value'=>set_value('expired', isset($list['order_expired_date']) ? $list['order_expired_date'] : ''),'class'=>'form-control')) ?>
                                        </div>
                                        <div class="form-group">
                                            <label for="price">Price</label>
                                            <?php echo form_input(array('name'=>'price','id'=>'price','value'=>set_value('price', isset($list['order_price']) ? $list['order_price'] : ''),'class'=>'form-control','id'=>'price')) ?>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="status">Status</label>
                                            <?php 
                                            echo form_dropdown('status',array('inactive'=>'Inactive','active'=>'Active'),set_value('status', isset($list['order_status']) ? $list['order_status'] : ''),'class="form-control" id="status"') ?>
                                        </div>
                                        <div class="form-group">
                                            <label for="paid_unpaid">Paid/Unpaid</label>
                                            <?php 
                                            echo form_dropdown('paid_unpaid',array('Unpaid'=>'Unpaid','Paid'=>'Paid'),set_value('paid_unpaid', isset($list['order_invoice_status']) ? $list['order_invoice_status'] : ''),'class="form-control" id="paid_unpaid"') ?>
                                        </div>
                                        <?php echo form_submit('submit','Update','class="btn btn-primary"'); ?>
                                    <?php echo form_close(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
<!--         <div class="footer">
            <div class="pull-right">
                10GB of <strong>250GB</strong> Free.
            </div>
            <div>
                <strong>Copyright</strong> Example Company &copy; 2014-2015
            </div>
        </div>

        </div>
        </div> -->



    <!-- iCheck -->
<script src="<?php echo base_url()?>resources/back/js/plugins/iCheck/icheck.min.js"></script>
<script>
            $(document).ready(function () {
                $('.i-checks').iCheck({
                    checkboxClass: 'icheckbox_square-green',
                    radioClass: 'iradio_square-green',
                });
            });
</script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/ui/1.11.1/jquery-ui.js"></script>
<script>
$(function() {
$( "#datepicker" ).datepicker({yearRange: '2005:2050',changeMonth: true,changeYear: true,showButtonPanel: true,dateFormat: 'yy-mm-dd'}); 
$( "#datepicker2" ).datepicker({yearRange: '2005:2050',changeMonth: true,changeYear: true,showButtonPanel: true,dateFormat: 'yy-mm-dd'});
});
</script>
<!--script>
    $(document).ready(function(){

        $('input').change(function(){

        });
    });
</script--->
