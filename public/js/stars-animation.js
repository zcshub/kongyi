(function(a){
    a.fn.stars_animation=function(p){
        var p=p||{};

        var w_w=p&&p.window_width?p.window_width:$(window).get(0).innerWidth;
        var w_h=p&&p.window_height?p.window_height:$(window).get(0).innerHeight;
        var w_b=p&&p.window_background?p.window_background:"#000";
        var s_c=p&&p.star_count?p.star_count:"600";
        var s_color=p&&p.star_color?p.star_color:"#FFF";
        var s_d=p&&p.star_depth?p.star_depth:"250";
        var dom=a(this);
        var fov = parseInt(s_d);
        var SCREEN_WIDTH = parseInt(w_w);
        var SCREEN_HEIGHT = parseInt(w_h);
        var HALF_WIDTH = SCREEN_WIDTH/2;
        var HALF_HEIGHT = SCREEN_HEIGHT/2;
        var c_id = dom.attr("id");
        var numPoints = s_c;
        dom.attr({ width: w_w, height: w_h});
        setup();
        function setup()
        {
            var canvas = document.getElementById(c_id);
            var c = canvas.getContext('2d');

            var points = [];


            function draw3Din2D(point3d)
            {
                x3d = point3d[0];
                y3d = point3d[1];
                z3d = point3d[2];
                var scale = fov/(fov+z3d);
                var x2d = (x3d * scale) + HALF_WIDTH;
                var y2d = (y3d * scale)  + HALF_HEIGHT;

                drawHeart(x2d,y2d,Math.abs(scale));

            }

            function drawHeart(x, y, unit) 
            {
                c.save();
                c.beginPath();
                c.moveTo(x, y);
                c.lineTo(x+unit,y-unit);
                c.lineTo(x+2*unit,y);
                c.lineTo(x+2*unit,y+unit);
                c.lineTo(x+unit,y+2*unit);
                c.lineTo(x,y+3*unit);
                c.lineTo(x-unit,y+2*unit);
                c.lineTo(x-2*unit,y+unit);
                c.lineTo(x-2*unit,y);
                c.lineTo(x-unit,y-unit);
                c.fillStyle = 'red';
                c.fill();
                c.restore();
            }

            function initPoints()
            {
                for (i=0; i<numPoints; i++)
                {
                    point = [(Math.random()*400)-200, (Math.random()*400)-200 , (Math.random()*400)-200 ];
                    points.push(point);
                }

            }

            function render()
            {

                c.fillStyle=w_b;
                c.fillRect(0,0, SCREEN_WIDTH, SCREEN_HEIGHT);

                for (i=0; i<numPoints; i++)
                {
                    point3d = points[i];

                    z3d = point3d[2];
                    z3d-=4;
                    if(z3d<-fov) z3d +=400;
                    point3d[2] = z3d;


                    draw3Din2D(point3d);

                }
            }

            initPoints();

            var loop = setInterval(function(){
                render();
            }, 50);

        }
    };
})(jQuery);