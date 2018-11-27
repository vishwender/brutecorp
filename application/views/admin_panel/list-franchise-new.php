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
                        <th>Franchise Name</th>
                        <th>Fee</th>
                        <th>Commission</th>
                        <th>Email</th>
                        <th>Username</th>
                        <th>Mobile</th>
                        <th>Address</th>
                        <th>User Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($franchise as $key => $list){ ?>
                                    
                    <tr class="odd gradeX">
                        <td><?php echo $list['user_fullname'] ?></td>
                        <td><i class="fa fa-inr"></i> <?php echo $list['user_franchise_fee'] ?></td>
                        <td><?php echo $list['user_franchise_commission'] ?>%</td>
                        <td><?php echo $list['user_email'] ?></td>
                        <td><?php echo $list['user_username'] ?></td>
                        <td><?php echo $list['user_mobile'] ?></td>
                        <td><?php echo $list['user_address'] . ' '. $list['user_city'] . ' ' . $list['user_state'] ?></td>
                        <td><?php echo $list['user_status'] ?></td>
                        <td><?php echo anchor('admins/dashboard/edit/'. $list['user_id'],'Edit') . ' '. anchor('admins/dashboard/delete/'. $list['user_id'],'Delete','class="delete" title="'. $list['user_fullname'] .'"'); ?></td>
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
<script src="<?php echo base_url(). 'resources/back/' ?>js/plugins/dataTables/jquery.dataTables.js"></script>
<script src="<?php echo base_url(). 'resources/back/' ?>js/plugins/dataTables/dataTables.bootstrap.js"></script>
<script src="<?php echo base_url(). 'resources/back/' ?>js/plugins/dataTables/dataTables.responsive.js"></script>
<script src="<?php echo base_url(). 'resources/back/' ?>js/plugins/dataTables/dataTables.tableTools.min.js"></script>        
<script>
    $(document).ready(function(){
        $('.dataTables-example').dataTable({
                responsive: true,
                "dom": 'T<"clear">lfrtip',
                "tableTools": {
                    "sSwfPath": "js/plugins/dataTables/swf/copy_csv_xls_pdf.swf"
                }
            });
    });
</script>
<style>
    body.DTTT_Print {
        background: #fff;

    }
    .DTTT_Print #page-wrapper {
        margin: 0;
        background:#fff;
    }

    button.DTTT_button, div.DTTT_button, a.DTTT_button {
        border: 1px solid #e7eaec;
        background: #fff;
        color: #676a6c;
        box-shadow: none;
        padding: 6px 8px;
    }
    button.DTTT_button:hover, div.DTTT_button:hover, a.DTTT_button:hover {
        border: 1px solid #d2d2d2;
        background: #fff;
        color: #676a6c;
        box-shadow: none;
        padding: 6px 8px;
    }

    .dataTables_filter label {
        margin-right: 5px;

    }
</style>