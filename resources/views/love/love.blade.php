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
    {!! Html::style('css/lovecube.css') !!}
    <style>
		#stars_animation {
			margin:0;
			padding:0;
			border:0; 
		}
    </style>
</head>
<body id="body">
	<audio autoplay="autoplay"　loop="loop" hidden>
		<source src="media/loveisyou.mp3" />
	</audio>
	<div class="loveBtnPanel">
		<a id="fullScreenBtn" onClick="starsFullScreen()">全屏观看</a>
	</div>
	<div class="slider">
		<div class="x_rot">
		<div class="y_rot">
			<div class="space3d">
			<div class="_3dbox">
				<div class="_3dface _3dface--front"></div>
				<div class="_3dface _3dface--top"></div>
				<div class="_3dface _3dface--bottom"></div>
				<div class="_3dface _3dface--left"></div>
				<div class="_3dface _3dface--right"></div>
				<div class="_3dface _3dface--back"></div>
			</div>
			</div>
		</div>
		</div>
	</div>
	<canvas id="stars_animation">浏览器太垃圾不支持</canvas>
	<embed　src="media/loveisyou.mp3"　autostart="true"　loop="true"　hidden="true"></embed>
</body>
	<script>
		$(function() {
			$("#stars_animation").stars_animation({
				window_width: $(window).get(0).innerWidth,
				window_height: $(window).get(0).innerHeight,
				window_background: '#00103f',
				star_count: '250',
				star_color: 'red',
				star_depth: '500'
			});
		});

		var images = [];
		@foreach($imgs as $i)
			images.push("{{$i}}");
		@endforeach
		var imgNum = images.length;
		var imgStr = "";

		var lastTime = 0;
		var now = new Date().getTime() / 1000;
		function animation()
		{
			var changed = false;
			var arr = $('.x_rot').css("transform").split(",");
			if(now - lastTime > 7) {
				if(Math.random() > 0.6 && parseFloat(arr[5]) + parseFloat(arr[6]) > 0 && parseFloat(arr[10]) + parseFloat(arr[9]) < 0){
					imgStr = images[Math.floor(imgNum*Math.random())];
					$('._3dface--front').css({'background':'url('+imgStr+')', 'background-size': "auto 100%"});
					changed = true;
				}
				if(Math.random() > 0.6 && parseFloat(arr[5]) + parseFloat(arr[6]) > 0 && parseFloat(arr[10]) + parseFloat(arr[9]) < 0){
					imgStr = images[Math.floor(imgNum*Math.random())];
					$('._3dface--left').css({'background':'url('+imgStr+')', 'background-size': "auto 100%"});
					changed = true;
				}
				if(Math.random() > 0.6 && parseFloat(arr[5]) + parseFloat(arr[6]) < 0 && parseFloat(arr[10]) + parseFloat(arr[9]) > 0){
					imgStr = images[Math.floor(imgNum*Math.random())];
					$('._3dface--right').css({'background':'url('+imgStr+')', 'background-size': "auto 100%"});
					changed = true;
				}
				if(Math.random() > 0.6 && parseFloat(arr[5]) + parseFloat(arr[6]) > 0 && parseFloat(arr[10]) + parseFloat(arr[9]) > 0){
					imgStr = images[Math.floor(imgNum*Math.random())];
					$('._3dface--top').css({'background':'url('+imgStr+')', 'background-size': "auto 100%"});
					changed = true;
				}
				if(Math.random() > 0.6 && parseFloat(arr[5]) + parseFloat(arr[6]) > 0 && parseFloat(arr[10]) + parseFloat(arr[9]) > 0){
					imgStr = images[Math.floor(imgNum*Math.random())];
					$('._3dface--bottom').css({'background':'url('+imgStr+')', 'background-size': "auto 100%"});
					changed = true;
				}
				if(Math.random() > 0.6 && parseFloat(arr[5]) + parseFloat(arr[6]) > 0 && parseFloat(arr[10]) + parseFloat(arr[9]) > 0){
					imgStr = images[Math.floor(imgNum*Math.random())];
					$('._3dface--back').css({'background':'url('+imgStr+')', 'background-size': "auto 100%"});
					changed = true;
				}
				console.log(imgStr);
				if(changed){
					lastTime = now;
				}
			}
			now = new Date().getTime() / 1000;
			//$('._3dface--front').css('background', 'url(img/user\/'+imgStr+')');
			requestAnimationFrame(animation);
		}
		window.onload=animation();
		var starsFullScreen = function() {
			launchFullScreen(document.getElementById('body'));
			$(".loveBtnPanel").css("display", "none");
		}
	</script>
	 
</html>