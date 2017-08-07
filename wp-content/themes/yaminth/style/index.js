jQuery.extend(jQuery.easing, {
	easeInQuad: function(e, f, a, h, g) {
		return h * (f /= g) * f + a
	},
	easeOutQuad: function(e, f, a, h, g) {
		return - h * (f /= g) * (f - 2) + a
	},
	easeInOutQuad: function(e, f, a, h, g) {
		if ((f /= g / 2) < 1) {
			return h / 2 * f * f + a
		}
		return - h / 2 * ((--f) * (f - 2) - 1) + a
	},
	easeInCubic: function(e, f, a, h, g) {
		return h * (f /= g) * f * f + a
	},
	easeOutCubic: function(e, f, a, h, g) {
		return h * ((f = f / g - 1) * f * f + 1) + a
	},
	easeInOutCubic: function(e, f, a, h, g) {
		if ((f /= g / 2) < 1) {
			return h / 2 * f * f * f + a
		}
		return h / 2 * ((f -= 2) * f * f + 2) + a
	},
	easeInQuart: function(e, f, a, h, g) {
		return h * (f /= g) * f * f * f + a
	},
	easeOutQuart: function(e, f, a, h, g) {
		return - h * ((f = f / g - 1) * f * f * f - 1) + a
	},
	easeInOutQuart: function(e, f, a, h, g) {
		if ((f /= g / 2) < 1) {
			return h / 2 * f * f * f * f + a
		}
		return - h / 2 * ((f -= 2) * f * f * f - 2) + a
	},
	easeInQuint: function(e, f, a, h, g) {
		return h * (f /= g) * f * f * f * f + a
	},
	easeOutQuint: function(e, f, a, h, g) {
		return h * ((f = f / g - 1) * f * f * f * f + 1) + a
	},
	easeInOutQuint: function(e, f, a, h, g) {
		if ((f /= g / 2) < 1) {
			return h / 2 * f * f * f * f * f + a
		}
		return h / 2 * ((f -= 2) * f * f * f * f + 2) + a
	},
	easeInSine: function(e, f, a, h, g) {
		return - h * Math.cos(f / g * (Math.PI / 2)) + h + a
	},
	easeOutSine: function(e, f, a, h, g) {
		return h * Math.sin(f / g * (Math.PI / 2)) + a
	},
	easeInOutSine: function(e, f, a, h, g) {
		return - h / 2 * (Math.cos(Math.PI * f / g) - 1) + a
	},
	easeInExpo: function(e, f, a, h, g) {
		return (f == 0) ? a: h * Math.pow(2, 10 * (f / g - 1)) + a
	},
	easeOutExpo: function(e, f, a, h, g) {
		return (f == g) ? a + h: h * ( - Math.pow(2, -10 * f / g) + 1) + a
	},
	easeInOutExpo: function(e, f, a, h, g) {
		if (f == 0) {
			return a
		}
		if (f == g) {
			return a + h
		}
		if ((f /= g / 2) < 1) {
			return h / 2 * Math.pow(2, 10 * (f - 1)) + a
		}
		return h / 2 * ( - Math.pow(2, -10 * --f) + 2) + a
	},
	easeInCirc: function(e, f, a, h, g) {
		return - h * (Math.sqrt(1 - (f /= g) * f) - 1) + a
	},
	easeOutCirc: function(e, f, a, h, g) {
		return h * Math.sqrt(1 - (f = f / g - 1) * f) + a
	},
	easeInOutCirc: function(e, f, a, h, g) {
		if ((f /= g / 2) < 1) {
			return - h / 2 * (Math.sqrt(1 - f * f) - 1) + a
		}
		return h / 2 * (Math.sqrt(1 - (f -= 2) * f) + 1) + a
	},
	easeInElastic: function(f, h, e, l, k) {
		var i = 1.70158;
		var j = 0;
		var g = l;
		if (h == 0) {
			return e
		}
		if ((h /= k) == 1) {
			return e + l
		}
		if (!j) {
			j = k * 0.3
		}
		if (g < Math.abs(l)) {
			g = l;
			var i = j / 4
		} else {
			var i = j / (2 * Math.PI) * Math.asin(l / g)
		}
		return - (g * Math.pow(2, 10 * (h -= 1)) * Math.sin((h * k - i) * (2 * Math.PI) / j)) + e
	},
	easeOutElastic: function(f, h, e, l, k) {
		var i = 1.70158;
		var j = 0;
		var g = l;
		if (h == 0) {
			return e
		}
		if ((h /= k) == 1) {
			return e + l
		}
		if (!j) {
			j = k * 0.3
		}
		if (g < Math.abs(l)) {
			g = l;
			var i = j / 4
		} else {
			var i = j / (2 * Math.PI) * Math.asin(l / g)
		}
		return g * Math.pow(2, -10 * h) * Math.sin((h * k - i) * (2 * Math.PI) / j) + l + e
	},
	easeInOutElastic: function(f, h, e, l, k) {
		var i = 1.70158;
		var j = 0;
		var g = l;
		if (h == 0) {
			return e
		}
		if ((h /= k / 2) == 2) {
			return e + l
		}
		if (!j) {
			j = k * (0.3 * 1.5)
		}
		if (g < Math.abs(l)) {
			g = l;
			var i = j / 4
		} else {
			var i = j / (2 * Math.PI) * Math.asin(l / g)
		}
		if (h < 1) {
			return - 0.5 * (g * Math.pow(2, 10 * (h -= 1)) * Math.sin((h * k - i) * (2 * Math.PI) / j)) + e
		}
		return g * Math.pow(2, -10 * (h -= 1)) * Math.sin((h * k - i) * (2 * Math.PI) / j) * 0.5 + l + e
	},
	easeInBack: function(e, f, a, i, h, g) {
		if (g == undefined) {
			g = 1.70158
		}
		return i * (f /= h) * f * ((g + 1) * f - g) + a
	},
	easeOutBack: function(e, f, a, i, h, g) {
		if (g == undefined) {
			g = 1.70158
		}
		return i * ((f = f / h - 1) * f * ((g + 1) * f + g) + 1) + a
	},
	easeInOutBack: function(e, f, a, i, h, g) {
		if (g == undefined) {
			g = 1.70158
		}
		if ((f /= h / 2) < 1) {
			return i / 2 * (f * f * (((g *= (1.525)) + 1) * f - g)) + a
		}
		return i / 2 * ((f -= 2) * f * (((g *= (1.525)) + 1) * f + g) + 2) + a
	},
	easeOutBounce: function(e, f, a, h, g) {
		if ((f /= g) < (1 / 2.75)) {
			return h * (7.5625 * f * f) + a
		} else {
			if (f < (2 / 2.75)) {
				return h * (7.5625 * (f -= (1.5 / 2.75)) * f + 0.75) + a
			} else {
				if (f < (2.5 / 2.75)) {
					return h * (7.5625 * (f -= (2.25 / 2.75)) * f + 0.9375) + a
				} else {
					return h * (7.5625 * (f -= (2.625 / 2.75)) * f + 0.984375) + a
				}
			}
		}
	}
});
jQuery(document).ready(function(u) {
	var y = u("#cate").attr("title") ? '' : u("#cate").attr("title"),
	z = u("#cate").attr("alt") ? true: false,
	noajax = u("#cate").attr("noajax") ? true: false;
	u("#phone_waterfall_phone_left").waterfall({
	    //itemSelector:'.post-home',     //子元素id/class, 可留空
		columnCount:4,                 // 列数,  纯数字, 可留空
		columnWidth:249,               // 列宽度, 纯数字, 可留空
		isResizable:false,             // 自适应浏览器宽度, 默认false
		isAnimated:true,              // 元素动画, 默认false
		//isAnimated: z,
		Duration: 500,
		Easing: y
	});
	if(!noajax){
		u("#pagenavi").css({"display":"none"}).before('<div id="ajax-loader"></div>');
		u("#ajax-loader").css({
			width: 120,
			height: 20,
			margin: "0px auto",
			display: "none"
		});
		var i = "Loading",
		x = u("#ajax-loader").html(i),
		s = 5,
		t,
		w = u(window),
		v = 2,
		p = parseInt(u("#post-current").attr('title')),
		k = true;
		w.scroll(function() {
			var d = w.scrollTop(),
			c = u("#footer").offset().top,
			a = w.height(),
			b = c - d - a;
			if (k != false && b >= 100) {
				r()
			}
		});
	}
	function q() { (s < 0) ? (s = 5, x.html(i), q()) : (x[0].innerHTML += "·", s--, t = setTimeout(q, 200))
	}
	function r() {
		if (v <= p) {
			var b = u("#cate").text(),
			a = (b == "home") ? ("?action=ajax_post&pag=" + v) : ("?action=ajax_post&cat=" + b + "&pag=" + v);
			u.ajax({
				url: a,
				beforeSend: function() {
					k = false;
					x.fadeIn(200);
					q()
				},
				success: function(d) {
					var c = u(d);
					u("#phone_waterfall_phone_left").append(c).waterfall({
						//itemSelector:'.post-home',     //子元素id/class, 可留空
						columnCount:4,                 // 列数,  纯数字, 可留空
						columnWidth:249,               // 列宽度, 纯数字, 可留空
						isResizable:false,             // 自适应浏览器宽度, 默认false
						isAnimated:true,              // 元素动画, 默认false
						isAppend: true,
						Duration: 800,
						Easing: y,
						endFn: function() {
							k = true;
							x.fadeOut(500);
							clearTimeout(t);
							t = null;
							v++
						}
					})
				}
			})
		} else {
			x.css("width", 180).fadeIn(200).html("No More Photos To Load");
			setTimeout(function() { x.fadeOut(500, function() { k = false }) },
			5000);
			return false
		}
	}
});