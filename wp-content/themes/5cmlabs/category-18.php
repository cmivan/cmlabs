<?php
get_header ();
?>

<div id="cate" title="<?php
echo get_option ( 'iphoto_easing' );
?>"
	alt="<?php
	echo get_option ( 'iphoto_animate' );
	?>"
	noajax="<?php
	echo get_option ( 'iphoto_noajax' );
	?>"><?php
	$category = get_the_category ( $post->ID );
	$name = $category [0]->slug;
	echo $name;
	?></div>
<!--end cate-->

<script type="text/javascript"
	src="<?php
	bloginfo ( 'template_url' );
	?>/javascript/jquery.waterfall.min.js"></script>
<script type="text/javascript"
	src="<?php
	bloginfo ( 'template_url' );
	?>/javascript/waterfall.js"></script>
<?php
if (is_singular ()) {
	?>
<!--[if lte IE 8]><script type="text/javascript" src="<?php
	bloginfo ( 'template_url' );
	?>/includes/jQuery.autoIMG.js"></script><![endif]-->
<?php
}
?>

<div id="phone_waterfall">
<div id="phone_waterfall_phone_left">
    <?php
				if (have_posts ()) :
					while ( have_posts () ) :
						the_post ();
						?>
        <?php
						get_template_part ( 'includes/iphoto-content', get_post_format () );
						?>
    <?php
					endwhile
					;
				
				 endif;
				?>
</div>
<div class="clear"></div>
</div>

<div class="clear"></div>
<!--end container-->
<div id="pagenavi"><?php
pagenavi ();
?></div>
<!--end pagenavi-->
<div class="clear"></div>

<div id="footer-phone"><br />
<br />
<br />
<br />
<br />
<br />
<br />
</div>


<?php /*?>
<div class="span-24">
		<div id="footer">
		<?php dynamic_sidebar('Footer Widgets'); ?>
		<p>
		<!-- It is completely optional, but if you like the Theme I would appreciate it if you keep the credit link at the bottom. -->
		<a href="<?php echo home_url(); ?>"><b><?php bloginfo('name');?></b></a>.<br/>
		Theme design by <a href="http://www.themesanyar.com/">Simple Free Themes</a>. Powered by <a href="http://wordpress.org/">WordPress</a>. Copyright &copy; <?php echo date('Y');?> All Rights Reserved.
		</p>
		</div>
	</div>
<?php */?>

</div>
<?php
wp_footer ();
?>
</body>
</html>