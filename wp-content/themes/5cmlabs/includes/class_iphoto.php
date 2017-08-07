<?php

/*iphoto加载所用的 GO*/
function isGif($file_name) {
	// 允许文件类型的后缀组成的数组
	$file = array ('gif' );
	// 截取上传文件的文件名的后缀
	$kzm = substr ( strrchr ( $file_name, "." ), 1 );
	// 判断此后缀是否在数组中
	$is_img = in_array ( strtolower ( $kzm ), $file );
	if ($is_img) {
		return true;
	} else {
		return false;
	}
}

function post_thumbnail($a) {
	global $post;
	$post_img = '';
	ob_start ();
	ob_end_clean ();
	$output = preg_match_all ( '/\<img.+?src="(.+?)".*?\/>/is ', $post->post_content, $matches, PREG_SET_ORDER );
	$post_img_src = $matches [0] [1];
	$cnt = count ( $matches );
	if ($cnt > 0) {
		if (isGif ( $post_img_src )) {
			$post_img = '<img src="' . $post_img_src . '" />';
		} else {
			$post_img = '<img src="' . get_bloginfo ( 'template_url' ) . '/timthumb.php?src=' . $post_img_src . '&amp;w=210&amp;zc=1" />';
		}
	} else {
		$cnt = 0;
	}
	if ($a == 1) {
		return $post_img;
	} else {
		return $cnt;
	}
}
function ajax_post() {
	if (isset ( $_GET ['action'] ) && $_GET ['action'] == 'ajax_post') {
		if (isset ( $_GET ['cat'] )) {
			query_posts ( "category_name=" . $_GET ['cat'] . "&paged=" . $_GET ['pag'] );
		} else if (isset ( $_GET ['pag'] )) {
			query_posts ( "paged=" . $_GET ['pag'] );
		}
		
		if (have_posts ()) {
			while ( have_posts () ) :
				the_post ();
				?>
		    <?php
				get_template_part ( 'includes/iphoto-content', get_post_format () );
				?>
			<?php
			endwhile
			;
		}
		die ();
	} else {
		return;
	}
}
add_action ( 'init', 'ajax_post' );

if (! function_exists ( 'pagenavi' )) {
	function pagenavi($p = 3) { // 取当前页前后各 2 页
		if (is_singular ())
			return; // 文章与插页不用
		global $wp_query, $paged;
		$max_page = $wp_query->max_num_pages;
		if ($max_page == 1) {
			echo '<span id="post-current">1</span> / <span id="post-count">1</span>';
			return;
		}
		if (empty ( $paged ))
			$paged = 1;
		if ($paged > 1)
			p_link ( $paged - 1, '上一页', '«' ); /* 如果当前页大于1就显示上一页链接 */
		if ($paged > $p + 1)
			p_link ( 1, '最前页' );
		if ($paged > $p + 2)
			echo '... ';
		for($i = $paged - $p; $i <= $paged + $p; $i ++) { // 中间页
			if ($i > 0 && $i <= $max_page)
				$i == $paged ? print "<span class='page-numbers' id='post-current' title='{$max_page}'>{$i}</span> " : p_link ( $i );
		}
		if ($paged < $max_page - $p - 1)
			echo '... ';
		if ($paged < $max_page - $p)
			p_link ( $max_page, '最后页' );
		if ($paged < $max_page)
			p_link ( $paged + 1, '下一页', '»' ); /* 如果当前页不是最后一页显示下一页链接 */
	}
	function p_link($i, $title = '', $linktype = '') {
		if ($title == '')
			$title = "第 {$i} 页";
		if ($linktype == '') {
			$linktext = $i;
		} else {
			$linktext = $linktype;
		}
		echo "<a class='page-numbers' href='", esc_html ( get_pagenum_link ( $i ) ), "' title='{$title}'>{$linktext}</a> ";
	}
}

/*iphoto加载所用的 END*/

?>