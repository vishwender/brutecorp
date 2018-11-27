<?php foreach($category as $key => $list){ ?>
<!-- <script src="//cdn.ckeditor.com/4.10.1/standard/ckeditor.js"></script> -->
<div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2><?php echo $title;?></h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="<?php echo base_url()?>admins/dashboard">Home</a>
                        </li>
                        <li>
                            <a>Services</a>
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
                           <?php echo form_open_multipart('admins/services/edit_category/'. $list['category_id'],'role="form"') ?>
                                        <div class="form-group">
                                            <label>Category Name</label>
                                            <?php echo form_input(array('name'=>'name','id'=>'name','value'=>set_value('name', isset($list['category_name']) ? $list['category_name'] : ''),'class'=>'form-control')) ?>
                                        </div>
                                        <div class="form-group">
                                            <label>Meta Title</label>
                                            <?php echo form_input(array('name'=>'title','id'=>'title','value'=>set_value('title', isset($list['category_title']) ? $list['category_title'] : ''),'class'=>'form-control')) ?>
                                        </div>
                                        <div class="form-group">
                                            <label>Meta Keywords</label>
                                            <?php echo form_input(array('name'=>'keyword','id'=>'keywords','value'=>set_value('keyword', isset($list['category_keyword']) ? $list['category_keyword'] : ''),'class'=>'form-control')) ?>
                                        </div>
                                        <div class="form-group">
                                            <label>Image</label>
                                            <?php echo form_upload(array('name'=>'image','id'=>'image','class'=>''));
                                            echo img(array('src'=>aw_config_item('back'). 'services/'. $list['category_image'],'width'=>'100'));
                                            ?>
                                        </div>
                                        <?php if ($has_parent==true){ ?>
                                        <div class="form-group">
                                            <label>Parent Category</label>
                                            <?php 
                                            $data=array();
                                            foreach($categorys as $key =>$list2){
                                                $data[$list2['category_id']]=$list2['category_name'];
                                            }
                                            echo form_dropdown('parent_category',$data,set_value('parent_category', isset($list['category_parent_id']) ? $list['category_parent_id'] : ''),'class="form-control"') ?>
                                        </div>
                                        <?php } ?>
                                        <div class="form-group">
                                            <label>Description</label>
                                            <?php echo form_textarea(array('name'=>'description','id'=>'','value'=>set_value('description', isset($list['category_description']) ? $list['category_description'] : ''),'class'=>'form-control ckeditor')) ?>
                                        </div>
                                        <?php if ($has_parent==false){ ?>
                                        <div class="form-group">
                                            <label>On Home</label>
                                            <?php echo form_dropdown('onhome',array('false'=>'False','true'=>'True'), set_value('onhome', isset($list['category_onhome']) ? $list['category_onhome'] : ''),'class="form-control"') ?>
                                        </div>
                                        <?php } ?>
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