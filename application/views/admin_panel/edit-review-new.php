<?php foreach($review as $key => $list){ ?>
<div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2><?php echo $title; ?></h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="<?php echo base_url()?>admins/dashboard">Home</a>
                        </li>
                        <li>
                            <a>Reviews</a>
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
                                            <label>Name</label>
                                            <?php echo form_input(array('name'=>'uname','id'=>'uname','value'=>set_value('uname', isset($list['review_uname']) ? $list['review_uname'] : ''),'class'=>'form-control')) ?>
                                        </div>
                                        <div class="form-group">
                                            <label>Email</label>
                                            <?php echo form_input(array('name'=>'uemail','id'=>'uemail','value'=>set_value('uemail', isset($list['review_uemail']) ? $list['review_uemail'] : ''),'class'=>'form-control')) ?>
                                        </div>
                                        <div class="form-group">
                                            <label>Comment</label>
                                            <?php echo form_textarea(array('name'=>'ucomment','id'=>'ucomment','value'=>set_value('ucomment', isset($list['review_ucomment']) ? $list['review_ucomment'] : ''),'class'=>'form-control','rows'=>2)) ?>
                                        </div>
                                        <div class="form-group">
                                            <label>Status</label>
                                            <?php echo form_dropdown('status',array('inactive'=>'Inactive','active'=>'Active'),set_value('status', isset($list['review_status']) ? $list['review_status'] : ''),'class="form-control"') ?>
                                        </div>
                                        <?php echo form_submit('submit','Update','class="btn btn-primary"'); ?>
                                    <?php echo form_close(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
        <div class="footer">
    <div>
        <strong>Copyright</strong> Brutecorp &copy; <?php echo date('Y');?>
    </div>
</div>