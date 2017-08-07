<!DOCTYPE html>
<html lang="zh-CN">
<head profile="http://www.5cmlabs.com/">
	<title><?php bloginfo('name'); ?> <?php if ( is_single() ) { ?> &raquo; Blog Archive <?php } ?> <?php wp_title(); ?></title>

	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" />
    <!-- leave this for stats please -->

    <link rel="stylesheet" type="text/css" media="screen" href="<?php bloginfo('template_directory'); ?>/assets/css/bootstrap.css" />
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
	<link rel="stylesheet" href="//fonts.googleapis.com/css?family=Open+Sans:400,600,300,800,700,400italic|PT+Serif:400,400italic" />

	<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
	<link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>" />
	<link rel="alternate" type="application/atom+xml" title="Atom 0.3" href="<?php bloginfo('atom_url'); ?>" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

	<!-- jQuery -->
	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/javascript/jquery-1.7.1.min.js" ></script>
    <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/assets/js/bootstrap-dropdown.js" ></script>


<?php /*?>
<!-- jQuery fade-in, fade-out for images -->
	<script type="text/javascript">
		$(document).ready(function(){
			$(".single-post-image img, .full-post img, .header-advertising img, .sidebar-ads img, .featured-post-image img").fadeTo("slow", 1);
		$(".single-post-image img, .full-post img, .header-advertising img, .sidebar-ads img, .featured-post-image img").hover(
		function(){
			$(this).fadeTo("slow", 1);
		},
		function(){
	   		$(this).fadeTo("slow", 0.6);
		});
		});
	</script>
<?php */?>

	<?php
	global $options;
	foreach ($options as $value) {
		if (get_settings( $value['id'] ) === FALSE) {
			$$value['id'] = $value['std'];
		}
		else {
			$$value['id'] = get_settings( $value['id'] );
		}
	}
	?>

	<?php wp_get_archives('type=monthly&format=link'); ?>
	<?php //comments_popup_script(); // off by default ?>
	<?php if (function_exists('wp_enqueue_script') && function_exists('is_singular')) : ?>
	<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
	<?php endif; ?>

	<!-- Favicon -->
	<link rel="shortcut icon" type="image/x-icon" href="<?php echo $yam_favicon; ?>" />

	<?php wp_head(); ?>

</head>

<body>
	<div id="header">
		
		<div class="header-top">
			<div class="logo" style="background-image: url(<?php echo $yam_logourl; ?>);">
				<h1><a href="<?php echo get_option('home'); ?>/"><?php bloginfo('name'); ?></a></h1>
			</div>
			<div class="header-advertising"><?php echo stripslashes($yam_ads468x60); ?></div>
		</div>
        <div class="header-bottom">
			<div class="main-menu-container">
				<?php wp_nav_menu(array('theme_location' => 'menu-1', 'container' => 'div', 'container_class' => 'main-menu')); ?>
				<div class="social">
                <div class="search-form">
		<form action="<?php bloginfo('url'); ?>/" method="get">
			<input x-webkit-speech="" x-webkit-grammar="builtin:translate" type="text" name="s" id="ls" class="searchfield" placeholder="找找看…" />
		</form>
	</div>
					<?php /*?>Follow us: <a href="<?php echo $yam_facebook; ?>">Facebook</a>, <a href="http://twitter.com/<?php echo $yam_twitter; ?>">Twitter</a>, <a href="<?php bloginfo('rss2_url'); ?>">RSS Feed</a><?php */?>
                </div>
			</div>
		</div>
	</div>