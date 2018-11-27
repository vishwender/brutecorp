<?php echo doctype('xhtml1-trans')."\n"; ?>
<head>
<?php $layout_path = "admin_panel/";?>
<!-- metadata starts -->
<?php $this->load->view($layout_path.'meta-data');?>
<!-- metadata ends -->
<title><?php echo isset($title)? $title: "Wallet Value"; ?></title>
<link rel="shortcut icon" href="<?php echo base_url();?>/resources/front/images/favicon.ico" type="image/x-icon">
<link href="<?php echo base_url();?>/resources/front/images/favicon.ico" rel="icon" type="image/x-icon" />
<!-- css starts -->
<?php $this->load->view($layout_path.'css-loader'); ?>
<!-- css ends -->
<script src="<?php echo base_url(). 'resources/back/' ?>js/jquery-2.1.1.js"></script>
<script src="<?php echo base_url(). 'resources/back/' ?>js/bootstrap.js"></script>
<script src="<?php echo base_url(). 'resources/back/' ?>js/request.js"></script>
<script src="//cdn.ckeditor.com/4.10.1/standard/ckeditor.js"></script>
</head>
<body>

<div id="wrapper">

<!-- Navigation -->
<nav class="navbar-default navbar-static-side" role="navigation">
<?php //$this->load->view($layout_path.'header'); ?>
<?php $this->load->view($layout_path.'column-left-new'); ?>
</nav>
    <div id="page-wrapper" class="gray-bg dashbard-1">
    <?php $this->load->view($layout_path.'search-template');?>
    <?php $this->load->view($layout_path.'contant'); ?>
    <?php //$this->load->view($layout_path.'footer'); ?>
    </div>
    
</div>

<!-- <script src="<?php echo base_url(). 'resources/back/' ?>js/plugins/metisMenu/metisMenu.min.js"></script> -->
<!-- <script src="<?php echo base_url(). 'resources/back/' ?>js/sb-admin-2.js"></script> -->
<!-- <script src="js/jquery-2.1.1.js"></script> -->
<script src="<?php echo base_url(). 'resources/back/' ?>js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="<?php echo base_url(). 'resources/back/' ?>js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<!-- Flot -->
<script src="<?php echo base_url(). 'resources/back/' ?>js/plugins/flot/jquery.flot.js"></script>
<script src="<?php echo base_url(). 'resources/back/' ?>js/plugins/flot/jquery.flot.tooltip.min.js"></script>
<script src="<?php echo base_url(). 'resources/back/' ?>js/plugins/flot/jquery.flot.spline.js"></script>
<script src="<?php echo base_url(). 'resources/back/' ?>js/plugins/flot/jquery.flot.resize.js"></script>
<script src="<?php echo base_url(). 'resources/back/' ?>js/plugins/flot/jquery.flot.pie.js"></script>

<!-- Peity graphs and charts-->
<script src="<?php echo base_url(). 'resources/back/' ?>js/plugins/peity/jquery.peity.min.js"></script>
<script src="<?php echo base_url(). 'resources/back/' ?>js/demo/peity-demo.js"></script>

<!-- Custom and plugin javascript -->
<script src="<?php echo base_url(). 'resources/back/' ?>js/inspinia.js"></script>
<script src="<?php echo base_url(). 'resources/back/' ?>js/plugins/pace/pace.min.js"></script>

<!-- jQuery UI -->
<script src="<?php echo base_url(). 'resources/back/' ?>js/plugins/jquery-ui/jquery-ui.min.js"></script>

<!-- GITTER messaging-->
<script src="<?php echo base_url(). 'resources/back/' ?>js/plugins/gritter/jquery.gritter.min.js"></script>

<!-- Sparkline -->
<script src="<?php echo base_url(). 'resources/back/' ?>js/plugins/sparkline/jquery.sparkline.min.js"></script>

<!-- Sparkline demo data for small bar graphs -->
<script src="<?php echo base_url(). 'resources/back/' ?>js/demo/sparkline-demo.js"></script>

<!-- ChartJS for chats and graphs-->
<script src="<?php echo base_url(). 'resources/back/' ?>js/plugins/chartJs/Chart.min.js"></script>

<!-- Toastr for notifications-->
<!-- <script src="<?php echo base_url(). 'resources/back/' ?>js/plugins/toastr/toastr.min.js"></script> -->

</body>
</html>
