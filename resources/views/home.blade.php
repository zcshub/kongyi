@extends('index')


@section('content')

@if(Auth::user() && preg_match('/'.Lang::get("love.mylover").'/', Auth::user()->name))
<div class="col-md-8 col-md-offset-2">
	<div class="container bg">
	<div class="hometown">
		<div class="heart"></div>
		<div id="heart_top">My Love</div>
		<div class="city">{!! Html::link('love', 'Click', ['target'=>'view_window blank_']) !!}</div>
		<div id="heart_bottom">darlingyf</div>
	</div>
	</div>
</div>
@section('needcss')
{!! Html::style('css/heartbeat.css') !!}
@stop
@section('needjs')
{!! Html::script('js/jquery-lettering.js') !!}
{!! Html::script('js/heartbeat.js') !!}
@stop
@else
<div class="col-md-8 col-md-offset-2">
	<canvas id="time_explode_canvas">
		什么破浏览器，早点卸了吧亲。
	</canvas>
</div>
@section('needjs')
{!! Html::script('js/timeDigit.js') !!}
{!! Html::script('js/TimeExplode.js') !!}
{!! Html::script('js/index.js') !!}
@stop
@endif

@stop