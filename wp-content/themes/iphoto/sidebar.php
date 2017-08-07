<div id="sidebar">
		<div class="title">
			<ul>
				<li><?php _e( 'Title','iphoto');?>&#58;&nbsp;<?php the_title(); ?></li>
				<li><?php _e( 'Date','iphoto');?>&#58;&nbsp;<span class="date"><?php the_time('Y.m.d'); ?></span><?php if(function_exists('the_views')) {echo '<span class="views">&nbsp;&#44;&nbsp;';echo the_views();echo '</span>';} ?></span></li>
				<li><?php _e( 'Cate','iphoto');?>&#58;&nbsp;<?php the_category(', '); ?></li>
				<li><?php _e( 'Tags','iphoto');?>&#58;&nbsp;<?php the_tags('', ', ', ''); ?></li>
			</ul>
		</div>
		<div class="clear"></div>
		<div class="widget">
			<div class="Related_Posts">
				<ul>
					<?php
						global $post;
						$exclude_id = $post->ID;
						$cats = ''; 
						foreach ( get_the_category() as $cat ) $cats .= $cat->cat_ID . ',';
						$args = array(
							'category__in' => explode(',', $cats),
							'post__not_in' => explode(',', $exclude_id),
							'orderby' => 'rand',
							'showposts' => 6
						);
						query_posts($args);
						while (have_posts()) : the_post();
						$output = preg_match_all('/\<img.+?src="(.+?)".*?\/>/is ',$post->post_content,$matches ,PREG_SET_ORDER);
						$post_img_src = $matches [0][1];
						$cnt = count( $matches );
					?>
					<li>
					<?php if ( $cnt > 0 ) {  ?>
					<a class="same_cat_posts_img" href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><img alt="<?php the_title(); ?>" src="<?php bloginfo('template_url'); ?>/timthumb.php?src=<?php echo $matches [0][1];?>&amp;w=90&amp;h=75&amp;zc=1" /></a>
					<?php } else {  ?>
					<a class="same_cat_posts_img" href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><img alt="<?php the_title(); ?>" src="<?php bloginfo('template_url'); ?>/timthumb.php?src=<?php bloginfo('template_url'); ?>/images/default.jpg&amp;w=90&amp;h=75&amp;zc=1" /></a>
					<?php } ?>
					</li>
					<?php endwhile; wp_reset_query(); ?>
				</ul>
			</div>
			<div class="clear"></div>
		</div>
		<?php if ( !function_exists('dynamic_sidebar')|| !dynamic_sidebar('sidebar') ) : ?>
		<?php endif; ?>
		<div class="clear"></div>
</div>