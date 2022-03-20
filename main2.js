$(function(){
	// 設定
	var $width;
	var $height;
	$(window).on("load resize",function() {
			$width = $(window).width();
			$height = $(window).height();
	});
	var $interval = 3000; // 切り替わりの間隔（ミリ秒）
	var $fade_speed = 1000; // フェード処理の早さ（ミリ秒）
	$("#slide ul li").css({"position":"relative","overflow":"hidden","width":$width,"height":$height});
	$("#slide ul li").hide().css({"position":"absolute","top":0,"left":0});
	$("#slide ul li:first").addClass("active").show();
	setInterval(function(){
	var $active = $("#slide ul li.active");
	var $next = $active.next("li").length?$active.next("li"):$("#slide ul li:first");
	$active.fadeOut($fade_speed).removeClass("active");
	$next.fadeIn($fade_speed).addClass("active");
	},$interval);
		//main_img
		var main_img_w = 1366; //フルスクリーンで表示させたい画像の幅
		var main_img_h = 600; //フルスクリーンで表示させたい画像の高さ
		$(window).on("load resize",function() {
				if ($width/main_img_w >= $height/main_img_h) {
						$(".main_img h1 img").css({
								"width": $width + "px",
								"height": "auto",
								"top": $height/2 + "px",
								"left": $width/2 + "px",
								"margin-top": -($width/main_img_w*main_img_h)/2 + "px",
								"margin-left": -$width/2 + "px"
						});
				} else {
						$(".main_img h1 img").css({
								"width": "auto",
								"height": $height + "px",
								"top": $height/2 + "px",
								"left": $width/2 + "px",
								"margin-top": -$height/2 + "px",
								"margin-left": -($height/main_img_h*main_img_w)/2 + "px"
						});
				}
		});
	});


