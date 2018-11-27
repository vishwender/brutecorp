
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
                                <li><a href="#">Generate Pdf</a></li>
                                <li><a href="#">Config option 2</a></li>
                            </ul>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">

                       <?php $this->load->view('user_panel/invoice_template');?>     

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
