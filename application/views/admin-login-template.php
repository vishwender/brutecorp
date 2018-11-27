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
</head>
<body class="gray-bg">


<?php $this->load->view($layout_path.'contant'); ?>

    <script src="<?php echo base_url() . 'resources/back/'; ?>js/jquery-1.11.0.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url() . 'resources/back/'; ?>js/bootstrap.min.js"></script>
    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo base_url() . 'resources/back/'; ?>js/plugins/metisMenu/metisMenu.min.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="<?php echo base_url() . 'resources/back/'; ?>js/sb-admin-2.js"></script>
</body>
</html>
