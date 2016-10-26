
<?php if(Login::is_login()){?>
	<!-- topbar starts -->
	<div class="navbar">
		<div class="navbar-inner">
			<div class="container-fluid">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".top-nav.nav-collapse,.sidebar-nav.nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
				<a class="brand" href="<?php echo helper_build_url('dashboard') ?>"> <img alt="Me leva" src="<?php echo PATH_IMG?>Logo.png" /> <span>Me Leva</span></a>
				
				<!-- user dropdown starts -->
				<div class="btn-group pull-right" >
					<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
						<i class="icon-user"></i><span class="hidden-phone"> admin</span>
						<span class="caret"></span>
					</a>
					<ul class="dropdown-menu">
						<!--<li><a href="#">Profile</a></li>
						<li class="divider"></li>-->
						<li><a href="<?php echo helper_build_url('logout') ?>">Logout</a></li>
					</ul>
				</div>
				<!-- user dropdown ends -->
			</div>
		</div>
	</div>
	<!-- topbar ends -->
		<div class="container-fluid">
		<div class="row-fluid">
				
			<!-- left menu starts -->
			<div class="span2 main-menu-span">
				<div class="well nav-collapse sidebar-nav">
					<ul class="nav nav-tabs nav-stacked main-menu">
						<li class="nav-header hidden-tablet">Main</li>
						<li><a class="ajax-link" href="<?php echo helper_build_url('dashboard') ?>"><i class="icon-home"></i><span class="hidden-tablet"> Home</span></a></li>
						<li><a class="ajax-link" href="<?php echo helper_build_url('fotos') ?>"><i class="icon-eye-open"></i><span class="hidden-tablet">Fotos</span></a></li>
						<li><a class="ajax-link" href="<?php echo helper_build_url('videos') ?>"><i class="icon-edit"></i><span class="hidden-tablet"> Videos</span></a></li>
						<!--<li><a class="ajax-link" href="<?php echo helper_build_url('news') ?>"><i class="icon-list-alt"></i><span class="hidden-tablet">Noticias</span></a></li>-->
					</ul>
					<!--<label id="for-is-ajax" class="hidden-tablet" for="is-ajax"><input id="is-ajax" type="checkbox"> Ajax on menu</label>-->
				</div><!--/.well -->
			</div><!--/span-->
			<!-- left menu ends -->
				
<?php } ?>
