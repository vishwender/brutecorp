<?php echo doctype('xhtml1-trans')."\n"; ?>
<html>
<head>
<?php $layout_path = "user_panel/";?>
<!-- metadata starts -->
<?php $this->load->view($layout_path.'meta-data');?>
<!-- metadata ends -->
<title><?php echo isset($title)? $title: "Brute Corp"; ?></title>
<!-- css starts -->
<?php $this->load->view($layout_path.'user-css-loader'); ?>
<!-- css ends -->
<?php $this->load->view($layout_path.'user-js-loader'); ?>

<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>resources/front/stylesheets/theme.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>resources/front/stylesheets/premium.css">
</head>
<body class=" theme-blue">
<script type="text/javascript">
        $(function() {
            var match = document.cookie.match(new RegExp('color=([^;]+)'));
            if(match) var color = match[1];
            if(color) {
                $('body').removeClass(function (index, css) {
                    return (css.match (/\btheme-\S+/g) || []).join(' ')
                })
                $('body').addClass('theme-' + color);
            }

            $('[data-popover="true"]').popover({html: true});
            
        });
</script>
    <style type="text/css">
        #line-chart {
            height:300px;
            width:800px;
            margin: 0px auto;
            margin-top: 1em;
        }
        .navbar-default .navbar-brand, .navbar-default .navbar-brand:hover { 
            color: #fff;
        }
    </style>

    <script type="text/javascript">
        $(function() {
            var uls = $('.sidebar-nav > ul > *').clone();
            uls.addClass('visible-xs');
            $('#main-menu').append(uls.clone());
        });
    </script>

<?php $this->load->view($layout_path.'user-header'); ?>

<?php 
if ($this->auth->logged_in('advertiser'))
$this->load->view($layout_path.'column-left'); 
elseif ($this->auth->logged_in('user'))
$this->load->view($layout_path.'user-column-left'); 
?>

<?php $this->load->view($layout_path.'contant'); ?>

<script src="<?php echo base_url() ?>resources/front/lib/bootstrap/js/bootstrap.js"></script>
<script type="text/javascript">
	$("[rel=tooltip]").tooltip();
	$(function() {
		$('.demo-cancel-click').click(function(){return false;});
	});
</script>

</body>
</html>
