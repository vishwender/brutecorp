<?php echo doctype('xhtml1-trans')."\n"; ?>
<html>
<head>
<title><?php echo isset($title)? $title: "Brute Corp"; ?></title>
<?php $layout_path = "user_panel/";?>
<?php $this->load->view($layout_path.'meta-data');?>
<link rel="shortcut icon" href="<?php echo base_url() ?>resources/front/images/favicon.ico" type="image/x-icon">
<link href="<?php echo base_url() ?>resources/front/images/favicon.ico" rel="icon" type="image/x-icon" />
<?php $this->load->view($layout_path.'css-loader'); ?>
<?php $this->load->view($layout_path.'js-loader'); ?>
<meta name="viewport" content="width=device-width, initial-scale=1">
<!--End of Tawk.to Script-->
</head>
<body>
<div id="loader">
<div class="loader-container">
	<?php echo img(array('src'=>aw_config_item('front'). 'images/load.gif','class'=>'loader-site spinner')) ?>
</div>
</div>
<div id="wrapper">
<?php $this->load->view($layout_path.'header-new'); ?>
<?php $this->load->view($layout_path.'contant'); ?>
<?php $this->load->view($layout_path.'footer'); ?>
<div class="dmtop">Scroll to Top</div>
</div>
</body>
</html>