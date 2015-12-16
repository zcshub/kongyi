;//传入一个canvas的id，在此画布上创建TimeExplode动画
var TimeExplode = {
//所有数据对象共享数据
//var data;
//创建并返回对象
createNew: function (){ 
	//获取参数
	var canvasId = arguments[0] ? arguments[0] : 'time_explode_canvas';
	var W = arguments[1] ? parseInt(arguments[1]) : 800;
	var H = arguments[2] ? parseInt(arguments[2]) : 400;
	//创建对象，模拟构造
	var obj = {};
	//obj.data为public变量
	//var data为private变量
	const X = parseInt(W/10);
	const Y = parseInt(H/10);
	const DN = 7;//点阵长单位数
	const DM = 10;//点阵高单位数
	const DW = parseInt((W-2*X)/8);//12:34:56时钟共有8个字符,DW为一个数字点阵宽度
	const R = Math.round((DW/DN-2)/2);//,小圆边界留1单位空白,R为小圆半径
	const G = 0.16;
	const colors = ["#33B5E5","#0099CC","#AA66CC","#9933CC","#99CC00","#669900","#FFBB33","#FF8800","#FF4444","#CC0000"];
	const MAX = 1000;

	var canvas = document.getElementById(canvasId);
	canvas.width = W;
	canvas.height = H;
	var context = canvas.getContext('2d');

	var showTime = {
		'hour':new Date().getHours(),
		'minute':new Date().getMinutes(),
		'second':new Date().getSeconds()
	}
	var balls = [];
	var ball = function(){};
	ball.prototype.x = 0;
	ball.prototype.y = 0;
	ball.prototype.vx = 0;
	ball.prototype.vy = 0;
	ball.prototype.color = '';
	ball.prototype.frict = 0.7;
	ball.prototype.pt = 15;
	
	function update()
	{
		var nextShowTime = {
			'hour':new Date().getHours(),
			'minute':new Date().getMinutes(),
			'second':new Date().getSeconds()
		}
		//更新小圆
		var nh = nextShowTime.hour;
		var nm = nextShowTime.minute;
		var ns = nextShowTime.second;
		var ch = showTime.hour;
		var cm = showTime.minute;
		var cs = showTime.second;

		if(ns != cs){
			console.log(balls.length);
			if(parseInt(nh/10) != parseInt(ch/10)){
				addBalls(parseInt(nh/10), X, Y);
			}
			if(nh%10 != ch%10){
				addBalls(nh%10, X+DW, Y);
			}
			if(parseInt(nm/10) != parseInt(cm/10)){
				addBalls(parseInt(nm/10), X+3*DW, Y);
			}
			if(nm%10 != cm%10){
				addBalls(nm%10, X+4*DW, Y);
			}
			if(parseInt(ns/10) != parseInt(cs/10)){
				addBalls(parseInt(ns/10), X+6*DW, Y);
			}
			if(ns%10 != cs%10){
				addBalls(ns%10, X+7*DW, Y);
			}
			showTime = nextShowTime;
		}
		updateBalls();
	}

	function addBalls(sym, x, y)
	{
		if(balls.length >= MAX){
			return;
		}
		Object.keys(timeDigit[sym]).forEach(function(line){
			Object.keys(timeDigit[sym][line]).forEach(function(key){
				if(timeDigit[sym][line][key] == 1){
					var b = new ball();
					b.x = x+parseInt(key)*(2*R+2)+R+1;
					b.y = y+parseInt(line)*(2*R+2)+R+1;
					b.vx = Math.random()>0.8?0.5:-0.5;
					b.vy = 0;
					b.color = colors[Math.round(Math.random()*colors.length)];
					balls.push(b);
				}
			});
		});
	}

	function updateBalls()
	{
		for (var key in balls)
		{
			balls[key].x += balls[key].vx;
			if(balls[key].pt){
				balls[key].y += balls[key].vy;
				balls[key].vy += G;
			}else{
				balls[key].y = H - R;
			}
			if(balls[key].y + R > H){
				balls[key].y = H - R;
				balls[key].vy = -balls[key].vy*balls[key].frict;
				balls[key].pt --;
			}
			
		}
		var cnt = 0;
		for (var key in balls)
		{
			if(balls[key].x+R>0 && balls[key].x-R<W){
				balls[cnt++] = balls[key];
			}
		}
		while(balls.length > cnt){
			balls.pop();
		}
	}

	function render()
	{
		var hour = showTime.hour;
		var minute = showTime.minute;
		var second = showTime.second;
		context.clearRect(0,0,W,H);
		renderOneDigit(context, parseInt(hour/10), X, Y);//hour1
		renderOneDigit(context, hour%10, X+DW, Y);//hour0
		renderOneDigit(context, 10, X+2*DW, Y);//:
		renderOneDigit(context, parseInt(minute/10), X+3*DW, Y);//minute1
		renderOneDigit(context, minute%10, X+4*DW, Y);//minute0
		renderOneDigit(context, 10, X+5*DW, Y);//:
		renderOneDigit(context, parseInt(second/10), X+6*DW, Y);//second1
		renderOneDigit(context, second%10, X+7*DW, Y);//second0
		renderBalls(context);
	}

	function renderOneDigit(cxt, sym, x, y)
	{
		cxt.fillStyle = 'rgba(88,88,88,0.9)';
		Object.keys(timeDigit[sym]).forEach(function(line){
			Object.keys(timeDigit[sym][line]).forEach(function(key){
				if(timeDigit[sym][line][key] == 1){
					//context.arc(x,y,r,sAngle,eAngle,counterclockwise);
					cxt.beginPath();
					cxt.arc(x+parseInt(key)*(2*R+2)+R+1, y+parseInt(line)*(2*R+2)+R+1, R, 0, 2*Math.PI);
					cxt.closePath();
					cxt.fill();
				}
			});
		});
	}

	function renderBalls(cxt)
	{
		for (var key in balls)
		{
			cxt.fillStyle = balls[key].color;
			cxt.beginPath();
			cxt.arc(balls[key].x, balls[key].y, R, 0, 2*Math.PI, true);
			cxt.closePath();
			cxt.fill();
		}
	}

	function animation()
	{
		update();
		render();
		requestAnimationFrame(animation);
	}
	
	animation();

	return obj;
}
};