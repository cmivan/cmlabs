<?php
if (is_admin ()) {
	//require_once(TEMPLATEPATH . '/includes/iphoto-update.php');
}
add_action ( 'admin_init', 'iphoto_init' );
function iphoto_init() {
	if (isset ( $_GET ['page'] ) && $_GET ['page'] == 'iphoto_init.php') {
		$dir = get_bloginfo ( 'template_directory' );
		wp_enqueue_script ( 'adminjquery', $dir . '/style/iphoto/iphoto.js', false, '1.0.0', false );
		wp_enqueue_style ( 'admincss', $dir . '/style/iphoto/iphoto.css', false, '1.0.0', 'screen' );
	}
}

add_action ( 'admin_menu', 'iphoto_page' );
function iphoto_page() {
	if (count ( $_POST ) > 0 && isset ( $_POST ['iphoto_settings'] )) {
		$options = array ('keywords', 'description', 'analytics', 'lib', 'noajax', 'views', 'easing', 'animate', 'phzoom', 'ajax', 'copyright' );
		foreach ( $options as $opt ) {
			delete_option ( 'iphoto_' . $opt, $_POST [$opt] );
			add_option ( 'iphoto_' . $opt, $_POST [$opt] );
		}
	}
	
	add_theme_page ( 'iPhoto ' . __ ( 'Theme Options', THEME_NAME ), __ ( '图格设置', THEME_NAME ), 'edit_themes', basename ( __FILE__ ), 'iphoto_settings' );
}
function iphoto_settings() {
	?>
<div class="wrap">
<div>
<h2><?php
	_e ( '图格设置<span>Version: ', THEME_NAME );
	?><?php

	$theme_data = get_theme_data ( TEMPLATEPATH . '/style.css' );
	echo $theme_data ['Version'];
	?></span></h2>
</div>
<div class="clear"></div>
<form method="post" action="">
<div id="theme-Option">
<div id="theme-menu"><span class="m1"><?php
	_e ( 'jQuery', THEME_NAME );
	?></span>
<span class="m4"><?php
	_e ( '统计代码', THEME_NAME );
	?></span> <span class="m5"><?php
	_e ( '页面版权', THEME_NAME );
	?></span>
<div class="clear"></div>
</div>
<div id="theme-content">
<ul>
	<li>
	<tr>
		<td><em><?php
	_e ( '图格默认是使用 jquery 1.4.4 的, 但你也可以直接使用 Google 的.', THEME_NAME );
	?></em><br />
		<label><input name="lib" type="checkbox" id="lib" value="1"
			<?php
	if (get_option ( 'iphoto_lib' ) != '')
		echo 'checked="checked"';
	?> /><?php
	_e ( '从Google加载 jQuery', THEME_NAME );
	?></label><br />
		<br />
		</td>
	</tr>
	<tr>
		<td><em><?php
	_e ( '图格页面是否使用无限加载？.', THEME_NAME );
	?></em><br />
		<label><input name="noajax" type="checkbox" id="noajax" value="1"
			<?php
	if (get_option ( 'iphoto_noajax' ) != '')
		echo 'checked="checked"';
	?> /><?php
	_e ( '关闭无限加载', THEME_NAME );
	?></label><br />
		<br />
		</td>
	</tr>
	<tr>
		<td><em><?php
	_e ( '<strong>图格布局的动画效果</strong>', THEME_NAME );
	?></em><br />
		<input name="animate" type="checkbox" id="animate" value="1"
			<?php
	if (get_option ( 'iphoto_animate' ) != '')
		echo 'checked="checked"';
	?> /><?php
	_e ( '激活动画效果!, 选择相应的效果', THEME_NAME );
	?>
					<?php
	$iphoto_easing = get_option ( 'iphoto_easing' );
	if ($iphoto_easing == '')
		$iphoto_easing = 'swing';
	?>
					<select name="easing">
			<option value="swing"
				<?php
	echo ($iphoto_easing == 'swing') ? 'selected="selected"' : '';
	?>>swing</option>
			<option value="linear"
				<?php
	echo ($iphoto_easing == 'linear') ? 'selected="selected"' : '';
	?>>linear</option>
			<option value="easeInQuad"
				<?php
	echo ($iphoto_easing == 'easeInQuad') ? 'selected="selected"' : '';
	?>>easeInQuad</option>
			<option value="easeOutQuad"
				<?php
	echo ($iphoto_easing == 'easeOutQuad') ? 'selected="selected"' : '';
	?>>easeOutQuad</option>
			<option value="easeInOutQuad"
				<?php
	echo ($iphoto_easing == 'easeInOutQuad') ? 'selected="selected"' : '';
	?>>easeInOutQuad</option>
			<option value="easeInCubic"
				<?php
	echo ($iphoto_easing == 'easeInCubic') ? 'selected="selected"' : '';
	?>>easeInCubic</option>
			<option value="easeOutCubic"
				<?php
	echo ($iphoto_easing == 'easeOutCubic') ? 'selected="selected"' : '';
	?>>easeOutCubic</option>
			<option value="easeInOutCubic"
				<?php
	echo ($iphoto_easing == 'easeInOutCubic') ? 'selected="selected"' : '';
	?>>easeInOutCubic</option>
			<option value="easeInQuart"
				<?php
	echo ($iphoto_easing == 'easeInQuart') ? 'selected="selected"' : '';
	?>>easeInQuart</option>
			<option value="easeOutQuart"
				<?php
	echo ($iphoto_easing == 'easeOutQuart') ? 'selected="selected"' : '';
	?>>easeOutQuart</option>
			<option value="easeInOutQuart"
				<?php
	echo ($iphoto_easing == 'easeInOutQuart') ? 'selected="selected"' : '';
	?>>easeInOutQuart</option>
			<option value="easeInSine"
				<?php
	echo ($iphoto_easing == 'easeInSine') ? 'selected="selected"' : '';
	?>>easeInSine</option>
			<option value="easeOutSine"
				<?php
	echo ($iphoto_easing == 'easeOutSine') ? 'selected="selected"' : '';
	?>>easeOutSine</option>
			<option value="easeInOutSine"
				<?php
	echo ($iphoto_easing == 'easeInOutSine') ? 'selected="selected"' : '';
	?>>easeInOutSine</option>
			<option value="easeInExpo"
				<?php
	echo ($iphoto_easing == 'easeInExpo') ? 'selected="selected"' : '';
	?>>easeInExpo</option>
			<option value="easeOutExpo"
				<?php
	echo ($iphoto_easing == 'easeOutExpo') ? 'selected="selected"' : '';
	?>>easeOutExpo</option>
			<option value="easeInOutExpo"
				<?php
	echo ($iphoto_easing == 'easeInOutExpo') ? 'selected="selected"' : '';
	?>>easeInOutExpo</option>
			<option value="easeInCirc"
				<?php
	echo ($iphoto_easing == 'easeInCirc') ? 'selected="selected"' : '';
	?>>easeInCirc</option>
			<option value="easeOutCirc"
				<?php
	echo ($iphoto_easing == 'easeOutCirc') ? 'selected="selected"' : '';
	?>>easeOutCirc</option>
			<option value="easeInOutCirc"
				<?php
	echo ($iphoto_easing == 'easeInOutCirc') ? 'selected="selected"' : '';
	?>>easeInOutCirc</option>
			<option value="easeInElastic"
				<?php
	echo ($iphoto_easing == 'easeInElastic') ? 'selected="selected"' : '';
	?>>easeInElastic</option>
			<option value="easeOutElastic"
				<?php
	echo ($iphoto_easing == 'easeOutElastic') ? 'selected="selected"' : '';
	?>>easeOutElastic</option>
			<option value="easeInOutElastic"
				<?php
	echo ($iphoto_easing == 'easeInOutElastic') ? 'selected="selected"' : '';
	?>>easeInOutElastic</option>
			<option value="easeInBack"
				<?php
	echo ($iphoto_easing == 'easeInBack') ? 'selected="selected"' : '';
	?>>easeInBack</option>
			<option value="easeOutBack"
				<?php
	echo ($iphoto_easing == 'easeOutBack') ? 'selected="selected"' : '';
	?>>easeOutBack</option>
			<option value="easeInOutBack"
				<?php
	echo ($iphoto_easing == 'easeInOutBack') ? 'selected="selected"' : '';
	?>>easeInOutBack</option>
			<option value="easeOutBounce"
				<?php
	echo ($iphoto_easing == 'easeOutBounce') ? 'selected="selected"' : '';
	?>>easeOutBounce</option>
		</select></td>
	</tr>
	</li>
	<li>
	<tr>
		<td>
				<?php
	_e ( '你可以把你的Google统计代码放在这里呵 <a target="_blank" href="https://www.google.com/analytics/settings/check_status_profile_handler">就是这里</a>.', THEME_NAME );
	?></label><br>
		<textarea name="analytics" id="analytics" rows="5" cols="70"
			style="font-size: 11px; width: 100%;"><?php
	echo stripslashes ( get_option ( 'iphoto_analytics' ) );
	?></textarea>
		</td>
	</tr>
	</li>
	<li>
	<tr>
		<td><textarea name="copyright" id="copyright" rows="5" cols="70"
			style="font-size: 11px; width: 100%;"><?php
	if (stripslashes ( get_option ( 'iphoto_copyright' ) ) != '') {
		echo stripslashes ( get_option ( 'iphoto_copyright' ) );
	} else {
		echo 'Copyright &copy; ' . date ( 'Y' ) . ' ' . '<a href="' . home_url ( '/' ) . '" title="' . esc_attr ( get_bloginfo ( 'name' ) ) . '">' . esc_attr ( get_bloginfo ( 'name' ) ) . '</a> All rights reserved';
	}
	;
	?></textarea>
		<br />
		<em><?php
	_e ( '<b>效果</b>', THEME_NAME );
	?><span> : </span><span><?php
	if (stripslashes ( get_option ( 'iphoto_copyright' ) ) != '') {
		echo stripslashes ( get_option ( 'iphoto_copyright' ) );
	} else {
		echo 'Copyright &copy; ' . date ( 'Y' ) . ' ' . '<a href="' . home_url ( '/' ) . '" title="' . esc_attr ( get_bloginfo ( 'name' ) ) . '">' . esc_attr ( get_bloginfo ( 'name' ) ) . '</a> All rights reserved';
	}
	;
	?></span></em>
		</td>
	</tr>
	</li>
</ul>
</div>
</div>
<p class="submit"><input type="submit" name="Submit"
	class="button-primary" value="<?php
	_e ( 'Save Options', THEME_NAME );
	?>" />
<input type="hidden" name="iphoto_settings" value="save"
	style="display: none;" /></p>
</form>
</div>
<?php
}
?>