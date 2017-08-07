<?php
class avatar_comments extends WP_Widget {
	function avatar_comments() {
		$widget_ops = array ('classname' => 'avatar_comments', 'description' => "带有用户头像的最新评论列表" );
		parent::__construct ( false, '带头像最新评论', $widget_ops );
	}
	
	function widget($args, $instance) {
		global $wpdb;
		extract ( $args );
		$count = empty ( $instance ['count'] ) ? 10 : $instance ['count'];
		echo $before_widget;
		if (! empty ( $instance ['title'] )) {
			echo $before_title . $instance ['title'] . $after_title;
		}
		//code begin
		?>

<ul>
<?php
		$WHERE_admin = NULL;
		$WHERE_email = NULL;
		if ($instance ['admin'] == 0)
			$WHERE_admin = "AND comment_author_email != '" . get_bloginfo ( 'admin_email' ) . "'";
		if (! empty ( $instance ['email'] )) {
			$email_arr = explode ( ';', $instance ['email'] );
			foreach ( $email_arr as $email_id => $email_value ) {
				$WHERE_email .= "AND comment_author_email != '" . $email_value . "' ";
			}
		}
		$sql = "SELECT ID, post_title, comment_ID, comment_author, comment_author_email, comment_content
FROM $wpdb->comments LEFT OUTER JOIN $wpdb->posts
ON ($wpdb->comments.comment_post_ID = $wpdb->posts.ID)
WHERE comment_approved = '1'
AND comment_type = ''
AND post_password = ''
$WHERE_admin
$WHERE_email
GROUP BY comment_post_ID
ORDER BY comment_date_gmt
DESC LIMIT $count";

		$rc_comms = $wpdb->get_results ( $sql );
		$rc_comments = '';
		foreach ( $rc_comms as $rc_comm ) {
			$rc_comm_email = $rc_comm->comment_author_email;
			$rc_comments .= "<div>";
			$rc_comments .= "<div>".$rc_comm->post_title."</div><br/>";
			$rc_comments .= "<li><span class='feed-icons'>&nbsp;</span>".get_avatar($rc_comm_email,25,NULL,($rc_comm->comment_author).":") . "<span>" . $rc_comm->comment_author . "</span>" . "<br/><a href=\"". get_permalink($rc_comm->ID) . "#comment-" . $rc_comm->comment_ID . "\" title=\"".$rc_comm->comment_author." 在 ".$rc_comm->post_title."\">".convert_smilies(mb_strimwidth(strip_tags($rc_comm->comment_content), 0, 100,"..."))."</a></li>";
			$rc_comments .= "<div class='clearfix'></div>";
			$rc_comments .= "</div><br /><br />";
			$rc_comments .= "<div class='clearfix'></div>";
			//$rc_comments .= "\t\t\t\t<li>" . get_avatar ( $rc_comm_email, 25, NULL, ($rc_comm->comment_author) . ":" ) . "</li>\n";
		}
		echo $rc_comments;
		?>
<div class="clearfix"></div>
</ul>

<?php
		//code end
		echo $after_widget;
	}
	
	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$new_instance = wp_parse_args ( ( array ) $new_instance, array ('title' => '', 'count' => NULL, 'admin' => NULL, 'email' => '' ) );
		$instance ['title'] = strip_tags ( $new_instance ['title'] );
		$instance ['count'] = $new_instance ['count'];
		$instance ['admin'] = $new_instance ['admin'];
		$instance ['email'] = $new_instance ['email'];
		return $instance;
	}
	
	function form($instance) {
		$title = strip_tags ( $instance ['title'] );
		$count = strip_tags ( $instance ['count'] );
		$admin = strip_tags ( $instance ['admin'] );
		$email = strip_tags ( $instance ['email'] );
		?>
<p><label for="<?php
		echo $this->get_field_id ( 'title' );
		?>"><?php
		_e ( 'Title:' );
		?></label>
<input class="widefat" id="<?php
		echo $this->get_field_id ( 'title' );
		?>"
	name="<?php
		echo $this->get_field_name ( 'title' );
		?>" type="text"
	value="<?php
		echo esc_attr ( $title );
		?>" /> <label
	for="<?php
		echo $this->get_field_id ( 'count' );
		?>"><?php
		echo '显示数量:';
		?></label>
<input class="widefat" id="<?php
		echo $this->get_field_id ( 'count' );
		?>"
	name="<?php
		echo $this->get_field_name ( 'count' );
		?>" type="text"
	value="<?php
		echo esc_attr ( $count );
		?>" /> <label
	for="<?php
		echo $this->get_field_id ( 'admin' );
		?>"><?php
		echo '显示管理员评论:';
		?></label>
<select name="<?php
		echo $this->get_field_name ( 'admin' );
		?>">
	<option <?php
		if (esc_attr ( $admin == 1 ))
			echo 'selected="selected"';
		?>
		value="1">允许</option>
	<option <?php
		if (esc_attr ( $admin == 0 ))
			echo 'selected="selected"';
		?>
		value="0">禁止</option>
</select><br />
<label for="<?php
		echo $this->get_field_id ( 'email' );
		?>"><?php
		echo '禁止的其他email(用 ; 隔开):';
		?></label>
<input class="widefat" id="<?php
		echo $this->get_field_id ( 'email' );
		?>"
	name="<?php
		echo $this->get_field_name ( 'email' );
		?>" type="text"
	value="<?php
		echo esc_attr ( $email );
		?>" /></p>
<?php
	}
}

//注册小工具
register_widget ( 'avatar_comments');
?>