<?php
global $options;
foreach ($options as $value) {
	if (get_settings( $value['id'] ) === FALSE) {
		$$value['id'] = $value['std'];
	}
	else {
		$$value['id'] = get_settings( $value['id'] );
	}
}
?>

	</div> <!-- content -->

	<div id="footer">
       <div class="footer-inside">
       <?php  if ( function_exists('dynamic_sidebar') && dynamic_sidebar('footer_sidebar') ){}?>
	   </div><!-- footer-inside -->
    </div>
        
        <!-- footer -->
		<div id="footer-credits">
			<div class="footer-credits-inside">
				<div class="footer-credits-left">
					&#169; Copyright <?php echo date('Y'); ?> - <?php bloginfo('name'); ?>
				</div>
				<div class="footer-credits-right">
					Theme by <a href="<?php echo get_option('home'); ?>" target="_blank"><?php bloginfo('name'); ?></a>
                    &nbsp;|&nbsp;
                    <script src="http://s6.cnzz.com/stat.php?id=4351403&web_id=4351403" language="JavaScript"></script>
				</div>
			</div>
		</div> 
        <!-- footer-credits -->

	<?php wp_footer(); ?>
    
    
<script type="text/javascript">
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-33379869-1']);
  _gaq.push(['_setDomainName', '5cmlabs.com']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
</script>

<script type='text/javascript'>
(function() {
    var c = document.createElement('script'); 
    c.type = 'text/javascript';
    c.async = true;
    c.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'www.clicki.cn/boot/46959';
    var h = document.getElementsByTagName('script')[0];
    h.parentNode.insertBefore(c, h);
})();
</script>

<span style="display:none">
<a href=http://www.hsdczx.com/>CM实验室</a>
<a target=_blank title=天空交换链-中国最大的友情链接交换平台-站长必上的网站 skycn.org.cn href="http://www.skycn.org.cn/come.asp?id=82026" style=color:red;>CM实验室</a>
<a href=http://www.winispeed.net/>★自助友情链接</a>
</span>

</body>
</html>
