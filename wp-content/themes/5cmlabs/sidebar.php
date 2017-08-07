<?php
global $options;
foreach ($options as $value) {
	if (get_settings( $value['id'] ) === FALSE) {
		$$value['id'] = $value['std'];
	} else {
		$$value['id'] = get_settings( $value['id'] );
	}
}
?>

<div id="sidebar">

<?php /*?>
<ul class="sidebar-content">
  <li class="">
    <div class="sidebar-ads">
        <h2>给力支持</h2>
        <div class="sidebar-ads-wrap"><?php echo stripslashes($yam_ads125x125); ?></div>
    </div>
  </li>
</ul>
<?php */?>

<ul class="sidebar-content">
<?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar(1) ) : else : ?>
  <li><h2><?php _e('Categories'); ?></h2>
  <ul><?php wp_list_cats('sort_column=name&hierarchical=0'); ?></ul>
  </li>
  
  <li><h2><?php _e('Archives'); ?></h2>
  <ul><?php wp_get_archives('type=monthly'); ?></ul>
  </li>
  
  <li><h2><?php _e('Links'); ?></h2>
  <ul><?php get_links(2, '<li>', '</li>', '', TRUE, 'url', FALSE); ?></ul>
  </li>
<?php endif; ?>
</ul>

</div>
