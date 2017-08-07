<?php
if ( function_exists('register_sidebar') ){
register_sidebar( array(
        'name' => __( '页面底部', '页面底部' ), //定义工具栏名称
        'id' => 'footer_sidebar', //工具栏id。下面的四个变量可以为空。
        'before_widget' => '<div class="footer-item" id="%1$s">', 
        'after_widget' => '</div>' ,
        'before_title' => '<h2>',
        'after_title' => '</h2>',
));
}
?>