<?php

class left_hot_article extends WP_Widget {
	function left_hot_article() {
		//Constructor
		$widget_ops = array ('classname' => 'left_hot_article_widget', //Widget分类名
'description' => '文章' );//Widget描述

		$this->WP_Widget ( 'Banner', '热门文章', $widget_ops ); //初始化Widget。WP_Widget(Widget名称, Widget后台名称)
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
		
		$r = new WP_Query ( 'orderby=comment_count&posts_per_page=' . $number );
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
		<li><a href="<?php
				the_permalink ()?>"
		title="<?php
				echo esc_attr ( get_the_title () ? get_the_title () : get_the_ID () );
				?>"><?php
				if (get_the_title ())
					the_title ();
				else
					the_ID ();
				?></a></li>
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
		return $instance;
	}
	
	function form($instance) {
		$title = isset ( $instance ['title'] ) ? esc_attr ( $instance ['title'] ) : '';
		$number = isset ( $instance ['number'] ) ? absint ( $instance ['number'] ) : 5;
		?>
<p><label for="<?php
		echo $this->get_field_id ( 'title' );
		?>"><?php
		_e ( 'Title:' );
		?></label> <input class="widefat"
	id="<?php
		echo $this->get_field_id ( 'title' );
		?>"
	name="<?php
		echo $this->get_field_name ( 'title' );
		?>"
	type="text" value="<?php
		echo $title;
		?>" /></p>

<p><label for="<?php
		echo $this->get_field_id ( 'number' );
		?>"><?php
		_e ( 'Number of posts to show:' );
		?></label> <input
	id="<?php
		echo $this->get_field_id ( 'number' );
		?>"
	name="<?php
		echo $this->get_field_name ( 'number' );
		?>"
	type="text" value="<?php
		echo $number;
		?>" size="3" /></p>
<?php
	}
}
?>
<?php

register_widget ( 'left_hot_article' );
?>