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

<div id="featured-posts">
	<ul id="featured-posts-list">
      
		<?php $my_query = new WP_Query('showposts=4&category_name='.$yam_featuredcat); while ($my_query->have_posts()) : $my_query->the_post(); ?> 
        	<li>
            		<div class="featured-post-image">
				<?php if (imagesrc()) { ?>
					<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><img src="<?php bloginfo('template_directory'); ?>/timthumb.php?src=<?php echo imagesrc(); ?>&amp;w=220&amp;h=160" alt="<?php the_title(); ?>" /></a>
				<?php } ?>
			</div>
			<div class="featured-post-text">
				<h2 class="featured-post-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>                 
			</div>
		</li>
		<?php endwhile; ?>

	</ul> 
</div><!-- featured-posts -->
