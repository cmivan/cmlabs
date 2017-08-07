		<!-- Sidebar -->
		<div id="sidebar">
		
			<div class="sidebar-box">
				<h3>Pages</h3>
				<ul>
					<?php wp_list_pages('title_li='); ?>
				</ul>
			</div>
			
			<div class="sidebar-box">
				<h3>Categories</h3>
				<ul>
					<?php wp_list_categories('title_li='); ?>
				</ul>
			</div>
			
			<div class="sidebar-box">
				<h3>Archives</h3>
				<ul>
					<?php wp_get_archives('type=monthly'); ?>
				</ul>
			</div>
			
			<div class="sidebar-box">
				<h3>Blog Roll</h3>
				<ul>
					<?php wp_list_bookmarks('categorize=0&title_li='); ?>
				</ul>
			</div>
			
			<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar(1) ) : ?>
			
			<?php endif; ?>

			<div class="sidebar-box">
				<h3>Meta</h3>
				<ul>
					<li><a href="<?php bloginfo('rss2_url'); ?>" title="<?php _e('Syndicate this site using RSS'); ?>"><?php _e('<abbr title="Really Simple Syndication">RSS</abbr>'); ?></a></li>
					<li><a href="<?php bloginfo('comments_rss2_url'); ?>" title="<?php _e('The latest comments to all posts in RSS'); ?>"><?php _e('Comments <abbr title="Really Simple Syndication">RSS</abbr>'); ?></a></li>
					<li><a href="http://www.nattywp.com/" title="Wordpress Themes">Wordpress Templates</a></li>
					<?php wp_meta(); ?>
				</ul>
			</div>
		
		</div>
		<!-- Sidebar -->