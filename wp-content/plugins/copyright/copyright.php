<?php
/*
Plugin Name: Copyright Declaration
Version:     0.1
Plugin URI:  http://www.bagualu.net/wordpress/?p=523
Description: adding link/copyright for each single post 
Author:      Jianghang
Author URI:  http://www.bagualu.net
*/
function Bagualu_Copyright($outer){
	if(!is_singular()){ return $outer; }
	global $post;
	$outer .= "<p>本文地址: <a href='" . get_permalink($post->ID) . "'>" . get_permalink($post->ID) . "</a> 转载请注明</p>" ;
	$outer .= '<br /><a href="http://weibo.com/u/2862175032?s=6uyXnP" target="_blank">';
	$outer .= '<img border="0" src="http://service.t.sina.com.cn/widget/qmd/2862175032/9b41403c/1.png"/>';
	$outer .= '</a>';
	return $outer;
}
add_filter('the_content', 'Bagualu_Copyright');
?>