<?php get_header(); ?>

<?php /*?>
<div class="hr-full-post"><hr /></div>
<?php */?>

	<div id="content">

		<div id="posts">

			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

				<div class="full-post" id="post-<?php the_ID(); ?>"> 

					<h2 class="full-post-title"><?php the_title(); ?></h2>
					<div class="meta-full-post">
						<span><?php the_author() ?></span> 发布于: <span><?php the_time('M d Y'); ?></span>
					</div><!--meta-->
 
<div class="clearfix"></div>                    
<div>
<script type="text/javascript"><!--
google_ad_client = "ca-pub-4055214057629371";
/* google-ad-1 */
google_ad_slot = "2001157650";
google_ad_width = 728;
google_ad_height = 90;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>
</div>
<div class="clearfix"></div>
 
					<div class="full-post-content"><?php the_content(); ?></div>

					<div class="full-post-pages"><?php wp_link_pages(); ?></div>

					<div class="meta-full-post"></div>

<div class="clearfix"></div>

<div class="page_google_ad">
	<script type="text/javascript"><!--
    google_ad_client = "ca-pub-4055214057629371";
    /* google-ad-3 */
    google_ad_slot = "7255792101";
    google_ad_width = 300;
    google_ad_height = 250;
    //-->
    </script>
    <script type="text/javascript"
    src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
    </script>
</div>

<div class="page_google_ad">
	<script type="text/javascript"><!--
    google_ad_client = "ca-pub-4055214057629371";
    /* google-ad-4 */
    google_ad_slot = "4135161586";
    google_ad_width = 300;
    google_ad_height = 250;
    //-->
    </script>
    <script type="text/javascript"
    src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
    </script>
</div>
<div class="clearfix"></div>
<br />
<div class="clearfix"></div>


					<?php comments_template(); ?>

				</div><!-- full-post -->

				<?php endwhile; ?>

			<?php endif; ?>

		</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
