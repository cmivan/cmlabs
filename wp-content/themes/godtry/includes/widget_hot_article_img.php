<?php

class left_hot_article_img extends WP_Widget {
	function left_hot_article_img() {
		//Constructor
		$widget_ops = array ('classname' => 'left_hot_article_img_widget', //Widget分类名
'description' => '近期最受关注，评论最多的文章(带图片)...' );//Widget描述

		$this->WP_Widget ( 'HotArticleImg', '热门图文章', $widget_ops ); //初始化Widget。WP_Widget(Widget名称, Widget后台名称)
	//$widget_ops，用来保存类名和描述，以便在控制面板正确显示工具信息
	//$control_ops 是可选参数，用来定义小工具在控制面板显示的宽度和高度（可选）    
	}
	
	function widget($args, $instance) {
		// prints the widget
		ob_start ();
		extract ( $args );
		
		$title = apply_filters ( 'widget_title', empty ( $instance ['title'] ) ? __ ( 'Recent Posts' ) : $instance ['title'], $instance, $this->id_base );
		if (! $number = absint ( $instance ['number'] ))
			$number = 10;
			
		$isshowimg = isset ( $instance ['showimg'] ) ? esc_attr ( $instance ['showimg'] ) : '';
		
		
		$r = new WP_Query ( 'orderby=meta_value_num&meta_key=post_views_count&caller_get_posts=1&posts_per_page=' . $number );
		if ($r->have_posts ()) :
			?>
		<?php
			echo $before_widget;
			?>
		<?php
			if ($title)
				echo $before_title . $title . $after_title;
			?>
<ul>
		<?php
			while ( $r->have_posts () ) :
				$r->the_post ();
				?>
				<?php
                $fmimg = get_post_meta($post->ID, "fmimg_value", true);
                $cti = catch_that_image();
                if($fmimg) {
                    $showimg = $fmimg;
                } else {
                    $showimg = $cti;
                };
                ?>
                
<?php if( $isshowimg == 'yes' ){?>

                <div class="clearfix view-box">
                    <div class="pull-left img-box">
                        <p>
                            <a href="<?php the_permalink(); ?>" target="_blank">
                                <img src="<?php echo catch_that_left_article_img($showimg); ?>" />
                            </a>
                        </p>
                    </div>
                    <div class="view-box-ctt">
                        <h4>
                            <a href="<?php the_permalink(); ?>" target="_blank">
                                <?php the_title(); ?>
                            </a>
                        </h4>
                        <div class="box-other">
                            <span class="source-quote">
                                <a href="<?php echo get_author_posts_url(get_the_author_meta( 'ID' )); ?>" target="_blank">
                                    <?php the_author_meta('display_name'); ?>
                                </a>
                            </span>
                            <p>
                                <time>
                                    <?php the_time('Y-m-d H:i'); ?>
                                </time>
                                <span class="comment-box">
                                    <i class="icon-comment">
                                    </i>
                                    <a href="<?php the_permalink(); ?>#comment" target="_blank">
                                        <?php comments_number('0', '1', '%' );?>
                                    </a>
                                </span>
                            </p>
                        </div>
                    </div>
                </div>

<?php } else {?>
		<li><a href="<?php the_permalink ()?>" title="<?php echo esc_attr ( get_the_title () ? get_the_title () : get_the_ID () );?>"><?php
				if (get_the_title ())
					the_title ();
				else
					the_ID ();
				?></a></li>
<?php }?>     

		<?php
			endwhile
			;
			?>
		</ul>
<?php
			echo $after_widget;
			?>
<?php

			// Reset the global $the_post as this query will have stomped on it
			wp_reset_postdata ();
		
		

		endif;
	}
	
	function update($new_instance, $old_instance) {
		//save the widget
		$instance = $old_instance;
		$instance ['title'] = strip_tags ( $new_instance ['title'] );
		$instance ['number'] = ( int ) $new_instance ['number'];
		$instance ['showimg'] = ( string ) $new_instance ['showimg'];
		return $instance;
	}
	
	function form($instance) {
		$title = isset ( $instance ['title'] ) ? esc_attr ( $instance ['title'] ) : '';
		$number = isset ( $instance ['number'] ) ? absint ( $instance ['number'] ) : 5;
		$showimg = isset ( $instance ['showimg'] ) ? esc_attr ( $instance ['showimg'] ) : '';
		?>
<p>
<label for="<?php echo $this->get_field_id ( 'title' );?>"><?php _e ( 'Title:' );?></label>
<input class="widefat"
	id="<?php echo $this->get_field_id ( 'title' );?>"
	name="<?php echo $this->get_field_name ( 'title' );?>"
	value="<?php echo $title;?>" type="text" /></p>

<p>
<label for="<?php echo $this->get_field_id ( 'number' );?>"><?php _e ( 'Number of posts to show:' );?></label>
<input id="<?php echo $this->get_field_id ( 'number' );?>"
	name="<?php echo $this->get_field_name ( 'number' );?>"
	type="text" value="<?php echo $number;?>" size="3" /></p>
    
<p>
<label for="<?php echo $this->get_field_id ( 'showimg' );?>"><?php _e ( '是否显示图片:' );?></label>
<input id="<?php echo $this->get_field_id ( 'showimg' );?>"
	name="<?php echo $this->get_field_name ( 'showimg' );?>"
    value="yes"
    <?php if($showimg=='yes'){ echo 'checked="checked"'; }?>
    type="checkbox" class="checkbox" /></p>
<?php
	}
}
?>
<?php

register_widget ( 'left_hot_article_img' );
?>