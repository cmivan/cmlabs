<?php get_header(); ?>

<?php /*?><?php include (TEMPLATEPATH . '/featured-posts.php'); ?><?php */?>

<div class="clearfix"></div>
<div id="content">
		<div id="posts">
			<?php if (have_posts()):?>
            
    <!-- Navigation begin -->
    <div class="posts-navigation">
    	<?php if(
			function_exists('wp_pagenavi')) { wp_pagenavi();
		}else { ?>
            <div class="pageleft"><?php previous_post_link('<strong>上一篇: </strong> %link') ?></div>
       		<div class="pageright"><?php next_post_link('<strong>下一篇: </strong> %link') ?></div>
        <?php } ?>
    </div>
    <!-- Navigation end -->
    
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
                
    <!-- Navigation begin -->
    <div class="posts-navigation">
    	<?php if(
			function_exists('wp_pagenavi')) { wp_pagenavi();
		}else { ?>
            <div class="pageleft"><?php previous_post_link('<strong>上一篇: </strong> %link') ?></div>
       		<div class="pageright"><?php next_post_link('<strong>下一篇: </strong> %link') ?></div>
        <?php } ?>
    </div>
    <!-- Navigation end -->
    
			<?php endif; ?>

		</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
