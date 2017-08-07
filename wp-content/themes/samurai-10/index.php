<?php get_header(); ?>
		
		<!-- Content -->
		<div id="content">
		
			<?php if (have_posts()) : ?>
			<?php while (have_posts()) : the_post(); ?>
			<!-- Post -->
			<div class="post" id="post-<?php the_ID(); ?>">
				<div class="post-title">
					<div class="post-date">
						<span><?php the_time('d') ?></span>
						<?php the_time('F') ?>
					</div>
					<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
				</div>
				<div class="post-entry">
					<?php the_content('Read more...'); ?>
				</div>
				<div class="post-info">
					Posted by <?php the_author() ?> under <?php the_category(', ') ?> <span class="post-info-comments">| <a href="<?php the_permalink() ?>#respond">Comment now &raquo;</a> |</span>
				</div>
			</div>
			<div class="clear"></div>
			<!-- /Post -->
			<?php endwhile; ?>
			<!-- Navigation -->
			<div class="navigation">
				<div class="navigation-previous"><?php next_posts_link('&laquo; Previous Entries') ?></div>
				<div class="navigation-next"><?php previous_posts_link('Next Entries &raquo;') ?></div>
			</div>
			<!-- /Navigation -->
			<?php else : ?>
			<!-- Post -->
			<div class="post">
				<div class="post-title">
					<h2>Not Found</h2>
				</div>
				<div class="post-entry">
					<p>Sorry, but you are looking for something that isn't here.</p>
				</div>
			</div>
			<!-- /Post -->
			<?php endif; ?>
			
			<div class="clear"></div>
		
		</div>
		<!-- /Content -->
		
<?php get_sidebar(); ?>
<?php get_footer(); ?>