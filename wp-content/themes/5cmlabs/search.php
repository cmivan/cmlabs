<?php get_header(); ?>

	<div id="content">

		<div id="posts">

			<?php if (have_posts()) : ?>

				<div class="search-results"><h2>搜索 "<?php echo $_GET['s']; ?>" 找到了这些:</h2></div>

            <?php while (have_posts()) : the_post(); ?>
				<div class="single-post" id="post-<?php the_ID(); ?>"> 
					
					<div class="single-post-text">

						<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h2>
						
                        <?php
						   $imagesrc = imagesrc();
						   if($imagesrc!=''){
						?>
                        <div class="single-post-image">
                        <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php get_first_image(); ?></a></div>
                        <?php }?>
                        
                        <div class="single-post-content"><?php limits2(200, ""); ?></div>
                        
					</div><!-- single-post-text -->
                    
                    <div class="clearfix"></div>
                    <p class="postmeta">
                    <span class="date"><?php the_time('分享 y年m月d日'); ?></span>
                    <span class="cats"><?php the_category(', ') ?></span>
                    <span class="tags"><?php the_tags( '', ', ', ''); ?></span>
                    <span class="comments"><?php comments_popup_link('需加热', '1热度', '%热度'); ?></span>
                    <?php edit_post_link('编辑'); ?>
                    </p>
                    <div class="clearfix"></div>

				</div>
                <!-- single-post -->
			<?php endwhile; ?>

				<div class="posts-navigation">
					<div class="posts-navigation-next"><?php next_posts_link('Older Posts &raquo;') ?></div>
					<div class="posts-navigation-prev"><?php previous_posts_link('&laquo; Newer Posts') ?></div>
					<div class="clearfix"></div>
				</div>

			<?php else: ?>

				<div class="search-results"><h2>没有找到和 <strong>"<?php echo $_GET['s']; ?>"</strong> 有关系的东西哦!</h2></div>

			<?php endif; ?>

		</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
