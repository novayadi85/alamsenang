<!doctype html>
<html <?php language_attributes(); ?> ng-app>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<header>
		<div class="top-links container">
			<div class="row">
				<div class="col-md-4">
					<div class="logo">
						<a title="<?php echo( get_bloginfo( 'title' ) ); ?>" href="<?php echo get_home_url();?>">
							<img src="<?php bloginfo('template_directory'); ?>/images/logo.png">
						</a>
					</div>
				</div>
				<div class="col-md-4">
					
				</div>
				<div class="col-md-4 text-right">
					Languange...
				</div>
			</div>
		</div>
		<!-- menu-->
		<div class="top-menu container">
			<div class="row">
				<div class="col-md-12">
					<nav class="navbar navbar-expand-md bg-default">
					  <a class="navbar-brand" href="#">Navbar</a>
					  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					  </button>

					  <?php /* Primary navigation */
							/* wp_nav_menu( array(
							  'menu' => '2',
							  'depth' => 2,
							  'container' => false,
							  'menu_class' => 'nav-dropdown collapse pull-xs-right nav navbar-nav navbar-toggleable-sm',
							  'walker' => new wp_bootstrap_navwalker())
							); */
							?>
					  
					  <div class="collapse navbar-collapse" id="navbarsExampleDefault">
						<ul class="navbar-nav mr-auto">
						  <li class="nav-item active">
							<a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
						  </li>
						  <li class="nav-item">
							<a class="nav-link" href="#">Link</a>
						  </li>
						  <li class="nav-item">
							<a class="nav-link disabled" href="#">Disabled</a>
						  </li>
						  <li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
							<div class="dropdown-menu" aria-labelledby="dropdown01">
							  <a class="dropdown-item" href="#">Action</a>
							  <a class="dropdown-item" href="#">Another action</a>
							  <a class="dropdown-item" href="#">Something else here</a>
							</div>
						  </li>
						</ul>
						<form class="form-inline my-2 my-lg-0">
						  <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
						  <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
						</form>
					  </div>
					</nav>
				</div>
			</div>
		</div>
		<!-- menu-->
	</header>
	<div class="container">