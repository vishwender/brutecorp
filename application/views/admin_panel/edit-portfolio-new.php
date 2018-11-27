<?php foreach($portfolio as $key => $list2){ ?>
<div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2><?php echo $title;?></h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="<?php echo base_url()?>admins/dashboard">Home</a>
                        </li>
                        <li>
                            <a>Portfolio</a>
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
                            <?php echo form_open_multipart('admins/portfolio/edit/'. $list2['portfolio_id'],'role="form"') ?>
                                        <div class="form-group">
                                            <label>Portfolio Title</label>
                                            <?php echo form_input(array('name'=>'title','id'=>'title','value'=>set_value('title', isset($list2['portfolio_title']) ? $list2['portfolio_title'] : ''),'class'=>'form-control')) ?>
                                        </div>
                                        <div class="form-group">
                                            <label>Category</label>
                                            <?php 
                                            foreach($categorys as $key =>$list){
                                                $data[$list['category_id']]=$list['category_name'];
                                            }
                                            echo form_dropdown('category',$data,set_value('category', isset($list2['portfolio_category_id']) ? $list2['portfolio_category_id'] : ''),'class="form-control"') ?>
                                        </div>
                                        <div class="form-group">
                                            <label>Website Link</label>
                                            <?php echo form_input(array('name'=>'link','id'=>'link','value'=>set_value('link', isset($list2['portfolio_live_link']) ? $list2['portfolio_live_link'] : ''),'class'=>'form-control')) ?>
                                        </div>
                                        <div class="form-group">
                                            <label>Image</label>
                                            <?php echo form_upload(array('name'=>'image','id'=>'image','class'=>''));
                                            echo img(array('src'=>aw_config_item('back'). 'portfolio/'. $list2['portfolio_image'], 'width'=>'100'))
                                            ?>
                                        </div>
                                        <div class="form-group">
                                            <label>Portfolio Tags</label>
                                            <?php echo form_input(array('name'=>'tags','id'=>'tags','value'=>set_value('tags', isset($list2['portfolio_tags']) ? $list2['portfolio_tags'] : ''),'class'=>'form-control')) ?>
                                        </div>
                                        <div class="form-group">
                                            <label>Description</label>
                                            <?php echo form_textarea(array('name'=>'description','id'=>'description','value'=>set_value('description', isset($list2['portfolio_description']) ? $list2['portfolio_description'] : ''),'class'=>'form-control')) ?>
                                        </div>
                                        <?php echo form_submit('submit','Update','class="btn btn-primary"'); ?>
                                    <?php echo form_close(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>