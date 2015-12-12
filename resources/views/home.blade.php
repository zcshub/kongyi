@extends('index')

@section('needjs')
{!! Html::script('js/timeDigit.js') !!}
{!! Html::script('js/TimeExplode.js') !!}
{!! Html::script('js/index.js') !!}
@stop

@section('content')
<div class="col-md-8 col-md-offset-2">
	<canvas id="time_explode_canvas">
		什么破浏览器，早点卸了吧亲。
	</canvas>
</div>
@stop