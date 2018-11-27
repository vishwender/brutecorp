<div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2><?php echo $title;?></h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="<?php echo base_url()?>user/dashboard">Home</a>
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
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5><?php echo $title; ?></h5>
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

                    <table class="table table-striped table-bordered table-hover dataTables-example" >
                    <thead>
                    <tr>
                        <th>Title/Name</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>View Invoice</th>
                    </tr>
                    </thead>
                    <tbody>
                      <?php foreach($order_list as $key => $list){ ?>
                        <tr class="odd gradeX">
                          <td><?php echo $list['order_title'] ?></td>
                          <td><?php echo $this->front_model->select_field_where_db('bc_sv_category',array('category_id = '. $list['order_category_id']),'category_name'); ?></td>
                          <td><?php echo $list['order_price'] ?></td>
                          <td><?php echo anchor('user/invoice/'.$list['order_invoice_no'],'view') ?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                    </table>

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
