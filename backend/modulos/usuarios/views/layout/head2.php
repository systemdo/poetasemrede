<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es">
	<head>
		<link rel="icon" href="<?php echo PATH_IMG?>favicon.ico" type="image/x-icon">
		
		<script type="text/javascript">
			var user = <?php echo json_encode(Login::getUser());?>;
			var APP_URL = <?php echo json_encode(APP_URL);?>;
			var lang = <?php echo json_encode($this->lang);?>;
		</script>
		<style type="text/css">
		  body {
			padding-bottom: 40px;
		  }
		  .sidebar-nav {
			padding: 9px 0;
		  }
		</style>
		<!--<link rel="stylesheet" href="http://code.jquery.com/ui/1.9.1/themes/base/jquery-ui.css" />
		<script src="http://code.jquery.com/jquery-1.8.2.js"></script>
		<script src="http://code.jquery.com/ui/1.9.1/jquery-ui.js?=<?php echo rand();?>"></script>
		<script src="<?php echo M_PATH_JS?>jquery.js?=<?php echo rand();?>"></script>-->
		
			<link href="<?php echo M_PATH_CSS?>bootstrap-responsive.css" rel="stylesheet">
			<link href="<?php echo M_PATH_CSS?>charisma-app.css" rel="stylesheet">
			<link href="<?php echo M_PATH_CSS?>jquery-ui-1.8.21.custom.css" rel="stylesheet">
			<link href='<?php echo M_PATH_CSS?>noty_theme_default.css' rel='stylesheet'>
			<link href='<?php echo M_PATH_CSS?>jquery.iphone.toggle.css' rel='stylesheet'>
			<link href='<?php echo M_PATH_CSS?>opa-icons.css' rel='stylesheet'>
			<link href='<?php echo M_PATH_CSS?>uploadify.css' rel='stylesheet'>
			<link id="bs-css" href="<?php echo M_PATH_CSS?>bootstrap-cerulean.css" rel="stylesheet">-->
			<link href='<?php echo M_PATH_CSS?>jquery.cleditor.css' rel='stylesheet'>	
			
			

		<title>Me Leva Que Eu Vou- Backoffice</title>
	</head> 
	<body>
	
						
<?php include_once 'menu.php';?>		
