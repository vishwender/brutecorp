<div class="content">
        <?php $this->load->view('user_panel/user-topbar'); ?>
        <div class="main-content">
<?php 
echo validation_errors('<div class="alert alert-danger" role="alert">','</div>');
$error=$this->session->flashdata('error');
if (!empty($error))
echo '<div class="alert alert-danger" role="alert">'. $error. '</div>';
$message=$this->session->flashdata('message');
if (!empty($message))
echo '<div class="alert alert-success alert-dismissable" role="alert">'. $message. '</div>';	
echo $this->auth->create_token(); ?>
<ul class="nav nav-tabs">
  <li class="active"><a href="#home" data-toggle="tab">Add Order</a></li>
</ul>

<div class="row">
  <div class="col-md-4">
    <br>
    <?php echo form_open('','id="tab"')?>
    <div id="myTabContent" class="tab-content">
      <div class="tab-pane active in" id="home">
      
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
                                            <?php echo form_textarea(array('name'=>'description','id'=>'description','value'=>set_value('description'),'class'=>'form-control')) ?>
                                        </div>
                                        
      </div>

      
    </div>

    <div class="btn-toolbar list-toolbar">
    <?php echo '<i class="fa fa-save"></i>'. form_submit('submit','Save','class="btn btn-primary"') ?>
    </div>
    <?php echo form_close() ?>
  </div>
</div>


            <?php $this->load->view('user_panel/user-footer'); ?>
        </div>
    </div>