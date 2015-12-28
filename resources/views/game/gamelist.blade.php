@extends('game.index')

@section('content')

@foreach($games as $game)
<div class="panel panel-default">
   <div class="panel-body">
      这是一个基本的面板
   </div>
</div>
@endforeach

@stop
