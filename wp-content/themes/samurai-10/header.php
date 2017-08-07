<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head profile="http://gmpg.org/xfn/11">
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	
	<title><?php bloginfo('name'); ?> <?php if ( is_single() ) { ?> &raquo; Blog Archive <?php } ?> <?php wp_title(); ?></title>
	
	<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" /> <!-- leave this for stats -->
	
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/style.css" />
	
<?php wp_head(); ?>
</head>

<body>

<!-- Wrapper -->
<div id="wrapper">

<!-- Page -->
<div id="page"><div id="page-top"><div id="page-bottom">

	<!-- Header -->
	<div id="header">
	
		<!-- Title -->
		<div id="header-info">
			<h1><a href="<?php echo get_option('home'); ?>/"><?php bloginfo('name'); ?></a></h1>
		</div>
		<!-- /Title -->
		
		<!-- Menu -->
		<div id="header-menu">
			<ul>
				<?php if (is_home()) { ?>
				<li class="current_page_item"><a href="<?php echo get_option('home'); ?>/">Home</a></li>
				<?php } else { ?>
				<li><a href="<?php echo get_option('home'); ?>/">Home</a></li>
				<?php } ?>
				<?php wp_list_pages('title_li=&depth=-1'); ?>
			</ul>
		</div>
		<!-- /Menu -->
		
		<!-- Search -->
		<div id="header-search">
			<form method="get" id="searchform" action="<?php bloginfo('url'); ?>/">
				<input type="text" value="<?php the_search_query(); ?>" name="s" id="s" />
				<input type="submit" id="searchsubmit" value="" />
			</form>
		</div>
		<!-- /Search -->
	
	</div>
	<!-- /Header -->
	
	<!-- Main -->
	<div id="main">
	