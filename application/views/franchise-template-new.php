<?php echo doctype('xhtml1-trans')."\n"; ?>
<html>
<head>
<link rel="shortcut icon" href="<?php echo base_url() ?>resources/front/images/favicon.ico" type="image/x-icon">
<?php $layout_path = "user_panel/";?>
<?php $this->load->view($layout_path.'meta-data');?>
<!-- metadata ends -->
<title><?php echo isset($title)? $title: "Brute Corp"; ?></title>
<!-- css starts -->
<?php $this->load->view($layout_path.'user-css-loader-new'); ?>
<!-- css ends -->

</head>
<body>
	<?php 
		if ($this->auth->logged_in('advertiser'))
			$this->load->view($layout_path.'franchise-header-new'); 
		elseif ($this->auth->logged_in('user'))
			$this->load->view($layout_path.'user-header-new');?>
		
		<div id="page-wrapper" class="gray-bg">
		<?php
			if($this->auth->logged_in('advertiser')){
				$this->load->view($layout_path.'franchise-search-template');
			}
			elseif ($this->auth->logged_in('user')) {
				$this->load->view($layout_path.'user-search-template');
			}
		?>	
		<?php $this->load->view($layout_path.'contant'); ?>
        </div>
        
		<?php $this->load->view($layout_path.'user-js-loader-new'); ?>
</body>
</html>