<div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2><?php echo $title; ?></h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="<?php echo base_url()?>admins/dashboard">Home</a>
                        </li>
                        <li>
                            <a>Franchise</a>
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
                            <?php echo form_open_multipart('','role="form"') ?>
                                        <div class="form-group">
                                            <label>Franchise Name(Person)</label>
                                            <?php echo form_input(array('name'=>'name','id'=>'name','value'=>set_value('name'),'class'=>'form-control','placeholder'=>'Franchise name')) ?>
                                        </div>
                                        <div class="form-group">
                                            <label>Franchise Fee</label>
                                            <?php echo form_input(array('name'=>'fee','id'=>'fee','value'=>set_value('fee'),'class'=>'form-control','placeholder'=>'in Rs.')) ?>
                                        </div>
                                        <div class="form-group">
                                            <label>Commission</label>
                                            <?php echo form_input(array('name'=>'commission','id'=>'commission','value'=>set_value('commission'),'class'=>'form-control','placeholder'=>'in %age')) ?>
                                        </div>
                                        <div class="form-group">
                                            <label>Email</label>
                                            <?php echo form_input(array('name'=>'email','id'=>'email','value'=>set_value('email'),'class'=>'form-control','placeholder'=>'email')) ?>
                                        </div>
                                        <div class="form-group">
                                            <label>Mobile No.</label>
                                            <?php echo form_input(array('name'=>'mobile','id'=>'mobile','value'=>set_value('mobile'),'class'=>'form-control','placeholder'=>'Mobile number')) ?>
                                        </div>
                                        <div class="form-group">
                                            <label>State</label>
                                            <?php echo form_input(array('name'=>'state','id'=>'state','value'=>set_value('state'),'class'=>'form-control','placeholder'=>'State')) ?>
                                        </div>
                                        <div class="form-group">
                                            <label>City</label>
                                            <?php echo form_input(array('name'=>'city','id'=>'city','value'=>set_value('city'),'class'=>'form-control','placeholder'=>'City')) ?>
                                        </div>
                                        <div class="form-group">
                                            <label>Address</label>
                                            <?php echo form_textarea(array('name'=>'address','id'=>'address','value'=>set_value('address'),'class'=>'form-control','rows'=>2,'placeholder'=>'Address')) ?>
                                        </div>
                                        <div class="form-group">
                                            <label>Username</label>
                                            <?php echo form_input(array('name'=>'username','id'=>'username','value'=>set_value('username'),'class'=>'form-control','rows'=>2,'placeholder'=>'Username')) ?>
                                        </div>
                                        <div class="form-group">
                                            <label>Password</label>
                                            <?php echo form_password(array('name'=>'password','id'=>'password','value'=>set_value('password'),'class'=>'form-control','rows'=>2,'placeholder'=>'Password')) ?>
                                        </div>
                                        <?php echo form_submit('submit','Submit','class="btn btn-primary"'); ?>
                                    <?php echo form_close(); ?>
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
