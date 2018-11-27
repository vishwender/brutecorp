<?php //echo '<pre>'; print_r($users); ?>
<div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2><?php echo $title;?></h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="<?php echo base_url()?>franchise/dashboard">Home</a>
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
                            <?php echo form_open();?>
                            <div class="form-group">
                                    <label>Order Title</label>
                                    <?php echo form_input(array('name'=>'title','id'=>'title','value'=>set_value('title'),'class'=>'form-control')) ?>
                            </div>
                            <div class="form-group">
                                    <label>Order Category</label>
                                    <?php 
                                    $data=array();
                                    foreach($category as $key => $list){
                                        $data[$list['category_id']]=$list['category_name'];
                                    }
                                    echo form_dropdown('category',$data,set_value('category'),'class="form-control"') ?>
                            </div>
                            <div class="form-group">
                                    <label>Order Username</label>
                                    <?php 
                                    $data=array();
                                    foreach($users as $key => $list){
                                        $data[$list['user_id']]=$list['user_username'];
                                    }
                                    echo form_dropdown('user',$data,set_value('user'),'class="form-control"') ?>
                            </div>
                            <div class="form-group">
                                    <label>Order Description</label>
                                    <?php echo form_textarea(array('name'=>'description','id'=>'description','value'=>set_value('description'),'class'=>'form-control ckeditor')) ?>
                            </div>
                            <?php echo form_submit('submit','Save','class="btn btn-primary"') ?>
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