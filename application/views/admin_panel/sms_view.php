<div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2><?php echo $title; ?></h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="<?php echo base_url()?>admins/dashboard">Home</a>
                        </li>
                        <li>
                            <a>Send Bulk Messages</a>
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
                                            <label>Choose Days to expiry</label>
                                            <?php echo form_dropdown('days',array('select'=>'--select--','1'=>'1 day','2'=>'2 days','3'=>'3 days','3'=>'3 days','4'=>'4 days','5'=>'5 days','6'=>'6 days','7'=>'7 days','8'=>'8 days','9'=>'9 days','10'=>'10 days','15'=>'15 days','30'=>'30 days','45'=>'45 days'), set_value('days'),'class="form-control days"') ?>
                                        </div>
                        
                                        <div class="form-group">
                                            <label>Message to SMS</label>
                                            <?php echo form_textarea(array('name'=>'message','id'=>'','value'=>set_value('message'),'class'=>'form-control')) ?>
                                        </div>
                                        <?php echo form_submit('submit','Send Sms','class="btn btn-primary"'); ?>
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