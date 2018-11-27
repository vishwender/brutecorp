<div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2><?php echo $title; ?></h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="<?php echo base_url()?>admins/dashboard">Home</a>
                        </li>
                        <li>
                           <a href="<?php echo base_url()?>admins/plan">Plans</a>
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
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Subpage Name</th>
                                            <th>Plan details</th>
                                            <th colspan="2">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach($subcategorys as $key => $list){ 
                                    
                                    $count=$this->db->where('plan_spage_id',$list['category_id'])->get('bc_plans')->num_rows();
                                    if ($count>0){
                                        ?>
                                        <tr class="odd gradeX">
                                            <td><?php echo $list['category_name'] ?></td>
                                            <td>
                                                    <table class="table table-striped table-bordered datatables" id="example">
                                                    <?php $plan_details=$this->back_model->select_row_where_db('bc_plans',array('plan_spage_id ='.$list['category_id']),'*','plan_id','asc'); $scount=0;
                                                    foreach($plan_details as $key2 => $list2){ $scount+=1; if ($scount==5){break;}?>
                                                        <tr>
                                                        <th><?php echo $list2['plan_feature_name'] ?></th>
                                                        <td><?php echo $list2['plan_plan1'] ?></td>
                                                        <td><?php echo $list2['plan_plan2'] ?></td>
                                                        <td><?php echo $list2['plan_plan3'] ?></td>
                                                        <td><?php echo $list2['plan_plan4'] ?></td>
                                                        </tr>
                                                        
                                                    <?php }
                                                    ?>
                                                    </table>
                                                    <td><?php 
                                                    $sub_page=$this->back_model->select_row_where_db('bc_sv_category',array('category_parent_id <>0'),'*','category_name','asc');
                                                    foreach($sub_page as $key => $list3){
                                                    $data[$list3['category_id']]=$list3['category_name'];
                                                    }
                                                    echo form_open();
                                                    echo form_hidden('copy_from',$list['category_id']);
                                                    echo form_dropdown('copy_to',$data,set_value('copy_to'),'class="form-control"');
                                                    echo '<div style="margin-top:10px">';
                                                    echo form_submit('submit','Copy','class="btn btn-info"');
                                                    echo '</div>';
                                                    echo form_close();
                                                     ?></td>
                                            </td>
                                            <td><?php echo anchor('admins/plan/edit/'. $list['category_id'],'Edit'); ?></td>
                                        </tr>
                                     <?php }} ?>
                                    </tbody>
                                </table>
                            </div>
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