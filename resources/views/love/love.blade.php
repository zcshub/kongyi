<!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {!! Html::script('js/jquery-1.11.3.min.js') !!}
    <!-- Bootstrap 核心 JavaScript 文件 -->
    {!! Html::script('js/bootstrap.min.js') !!}
    <!-- my config -->
    {!! Html::script('js/config.js') !!}
    {!! Html::script('js/jquery-1.11.3.min.js') !!}
    {!! Html::script('js/common.js') !!}
	{!! Html::script('js/stars-animation.js') !!}


    <!-- css文件 -->
    <!-- Bootstrap 核心 CSS 文件 -->
    <!-- <link rel="stylesheet" href="//cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css"> -->
    {!! Html::style('css/bootstrap.min.css') !!}
    {!! Html::style('css/heartbeat.css') !!}
    <style>
		#stars_animation {
			margin:0;
			padding:0;
			border:0; 
		}
    </style>
	<script>
		$(function() {
			$("#stars_animation").stars_animation({
				window_width: $(window).get(0).innerWidth,
				window_height: $(window).get(0).innerHeight,
				window_background: '#00114f',
				star_count: '250',
				star_color: 'red',
				star_depth: '500'
			});
		});
		var starsFullScreen = function() {
			launchFullScreen(document.getElementById('stars_animation'));
		}
	</script>
</head>
<body>
	<div class="loveBtnPanel">
		<a id="fullScreenBtn" onClick="starsFullScreen()">全屏观看</a>
	</div>
	<canvas id="stars_animation">浏览器太垃圾不支持</canvas>
</body>
	 
</html>