﻿$(function() {
	//绑定图片墙
	var y = $("#cate").attr("title") ? $("#cate").attr("title") : '',
	z = $("#cate").attr("alt") ? true: false,
	noajax = $("#cate").attr("noajax") ? true: false;
	$("#phone_waterfall_phone_left").css({"display":"block"});
	$("#phone_waterfall_phone_left").waterfall({
		columnCount:4,                 // 列数,  纯数字, 可留空
		columnWidth:249,               // 列宽度, 纯数字, 可留空
		isResizable:false,             // 自适应浏览器宽度, 默认false
		isAnimated: z,
		Duration: 500,
		Easing: y // 动画效果, 配合 jQuery Easing Plugin 使用
	});
	if(!noajax){
		$("#pagenavi").css({"display":"none"}).before('<div id="ajax-loader"></div>');
		$("#ajax-loader").css({
			width: 220,height: 20,
			margin: "0px auto",display: "none"
		});
		var i = '<div id="ajax-loader-bg">&nbsp;</div>',
		x = $("#ajax-loader").html(i),
		s = 5,
		t,
		w = $(window),
		v = 2,
		p = parseInt($("#post-current").attr('title')),
		k = true;
		w.scroll(function() {
			var d = w.scrollTop(),
			c = $("#footer-phone").offset().top,
			a = w.height(),
			b = c - d - a;
			if (k != false && b >= 100) {
				r()
			}
		});
	}
	function q() { (s < 0) ? (s = 5, x.html(i), q()) : (x[0].innerHTML += "·", s--, t = setTimeout(q, 200)) }
	function r() {
		if (v <= p) {
			var b = $("#cate").text(),
			a = (b == "home") ? ("?action=ajax_post&pag=" + v) : ("?action=ajax_post&cat=" + b + "&pag=" + v);
			$.ajax({
				url: a,
				beforeSend: function() {
					k = false;
					x.fadeIn(200);
					q()
				},
				success: function(d) {
					var c = $(d);
					$("#phone_waterfall_phone_left").append(c).waterfall({
						//itemSelector:'.post-home',     //子元素id/class, 可留空
						columnCount:4,                 // 列数,  纯数字, 可留空
						columnWidth:249,               // 列宽度, 纯数字, 可留空
						isResizable:false,             // 自适应浏览器宽度, 默认false
						isAnimated: z,                 // 元素动画, 默认false
						isAppend: true,
						Duration: 800,
						Easing: y,
						endFn: function() { k = true; x.fadeOut(500); clearTimeout(t); t = null; v++; }
					});
				}
			})
		} else {
			x.css("width", 180).fadeIn(200).html('<span class="label label-info">没发现东西了哦～</span>');
			setTimeout(function() { x.fadeOut(300, function() { k = false }) }, 8000);
			return false;
		}
	}
});