<div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2><?php echo $title; ?></h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="<?php echo base_url()?>admins/dashboard">Home</a>
                        </li>
                        <li>
                            <a>Orders</a>
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
                        <th>Invoice No.</th>
                        <th>Title/Name</th>
                        <th>Category</th>
                        <th>Franchise</th>
                        <th>Register Date</th>
                        <th>Expire Date</th>
                        <th>Price</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($orders as $key => $list){ ?>
                                    
                    <tr class="odd gradeX">
                        <td><?php if ($list['order_invoice_no']==0){ echo '-'; } else{echo $list['order_invoice_no'];} ?></td>
                                            <td><?php echo $list['order_title'] ?></td>
                                            <td><?php echo $this->back_model->select_field_where_db('bc_sv_category',array('category_id = '. $list['order_category_id']),'category_name'); ?></td>
                                            <td><?php echo $this->back_model->select_field_where_db('bc_users',array('user_id = '. $list['order_franchise_id']),'user_fullname'); ?></td>
                                            <td><?php if ($list['order_register_date']!='0000-00-00'){echo $list['order_register_date'];}else{echo '-';} ?></td>
                                            <td><?php if ($list['order_expired_date']!='0000-00-00'){echo $list['order_expired_date'];}else{echo '-';} ?></td>
                                            <td><?php echo $list['order_price'] ?></td>
                                            <td><?php echo $list['order_status'] ?></td>
                                            <td><?php echo anchor('admins/franchise/create_invoice/'. $list['order_id'],'Make Invoice') . ' | '. anchor('admins/franchise/edit_order/'. $list['order_id'],'Edit') . ' | '. anchor('admins/franchise/delete_order/'. $list['order_id'],'Delete','class="delete" title="'. $list['order_title'] .'"'); ?></td>
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
<!--style>
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
</style-->
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
                },
                "rowCallback": function(row, data, index){
                    var fullDate = new Date();
                    var twoDigitMonth = ((fullDate.getMonth().length+1) === 1)? (fullDate.getMonth()+1) : '' + (fullDate.getMonth()+1);
                    //var currentDate = fullDate.getDate() + "-" + twoDigitMonth + "-" + fullDate.getFullYear();
                    var currentDate = fullDate.getFullYear()+"-"+twoDigitMonth+"-"+fullDate.getDate();
                    var day = fullDate.getDate()+1;
                    var month = fullDate.getMonth() + 1;
                    var year = fullDate.getFullYear();
                    var expiryDate = data[5];
                    console.log(currentDate);
                    console.log('on table--->'+data[5]);
                    console.log('expiry date--->'+expiryDate);
                    if(data[5] == currentDate){
                        //$(row).css('background-color', '#FFA8A8');
                        $(row).css('color', 'red');
                    }
                    if(data[5] < currentDate){
                        //$(row).css('background-color', '#FFA8A8');
                        $(row).css('color', 'red');
                    }
                    /*if(data[5] == nextDate){
                        $(row).css('background-color', '#FFFF99');
                        $(row).css('color', '#000');
                    }*/
                }
            });
    });
</script>
