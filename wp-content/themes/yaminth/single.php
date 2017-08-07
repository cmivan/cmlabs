<?php get_header(); ?>
<script type="text/javascript">
 //等比缩放大图
 $(function(){
	 $(".full-post-content img").each(function(){
		 var old_width = $(this).width();
		 var old_height = $(this).height();
		 if(old_width > 650){
			var new_width = 650;
			var new_height = old_height * (new_width / old_width);
			$(this).width(new_width);
			$(this).height(new_height);
		 }
	 });
 });
</script>
	<div class="hr-full-post">
		<hr />
	</div>

	<div id="content">

		<div id="posts">

			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

				<div class="full-post" id="post-<?php the_ID(); ?>"> 

					<h2 class="full-post-title"><?php the_title(); ?></h2>
					<div class="meta-full-post">
						[<?php the_category(', ') ?>]  由 <span><?php the_author() ?></span> 发布于: <span><?php the_time('M d Y'); ?></span>
					</div><!--meta-->
 
					<div class="full-post-content"><?php the_content(); ?></div>

                  <div class="postpaging wp-pagenavi">
                      <?php wp_link_pages(array('before' => '<p><span class="postpaging-note">页面：</span> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
                  </div>
                  
					<?php /*?><div class="full-post-pages"><?php wp_link_pages(); ?></div><?php */?>

					<div class="meta-full-post">
						<?php the_tags( '标签云集: ', ', ', ''); ?><br />
						<?php edit_post_link('Edit', ' &#124; ', ''); ?>
					</div>

					<div class="clearfix"></div>

					<?php comments_template(); ?>

				</div><!-- full-post -->

				<?php endwhile; ?>

			<?php endif; ?>

		</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
