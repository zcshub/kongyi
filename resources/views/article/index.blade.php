@extends('home')

@section('needjs')
    {!! Html::script('js/bootstrap-datetimepicker.min.js') !!}
    {!! Html::script('js/bootstrap-datetimepicker.zh-CN.js') !!}
    {!! Html::script('js/showdown.min.js') !!}
    {!! Html::script('js/mycode.js') !!}
@stop

@section('article')
<li class="active">
@stop
