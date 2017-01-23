<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @yield('title', '<title>咸鱼馆</title>')
    <!-- js文件 -->
    <!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
    {!! Html::script('js/jquery-1.11.3.min.js') !!}
    <!-- Bootstrap 核心 JavaScript 文件 -->
    {!! Html::script('js/bootstrap.min.js') !!}
    <!-- my config -->
    {!! Html::script('js/config.js') !!}
    <!-- css文件 -->
    <!-- Bootstrap 核心 CSS 文件 -->
    <!-- <link rel="stylesheet" href="//cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css"> -->
    {!! Html::style('css/bootstrap.min.css') !!}
    {!! Html::style('css/bootstrap-datetimepicker.min.css') !!}
    {!! Html::style('css/home.css') !!}
    @yield('needcss')
    @yield('needjs')
</head>
<body>
<div id="wrap">
<div id="main">
  <nav class="navbar navbar-fixed-top" role="navigation">
    <div class="container-fluid col-md-8 col-md-offset-2">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#target-navbar-collapse">
          <span class="sr-only">展开菜单</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <div class="navbar-brand">
        {!! HTML::link('home', '咸鱼馆', ['class'=>'logo']) !!}
        </div>
      </div>
      <div class="collapse navbar-collapse" id="target-navbar-collapse">
        <ul class="nav navbar-nav navbar-main pull-left">
          @yield('article', '<li>')
            {!! HTML::link('article', '文章列表', ['class'=>'glyphicon glyphicon-list-alt']) !!}
          </li>
          @yield('game', '<li>')
            {!! HTML::link('', '小游戏展', ['class'=>'glyphicon glyphicon-file']) !!}
          </li>
          @yield('tab', '<li>')
            {!! HTML::link('', '空即是色', ['class'=>'glyphicon glyphicon-file']) !!}
          </li>
          @yield('tab', '<li>')
            {!! HTML::link('', '色即是空', ['class'=>'glyphicon glyphicon-file']) !!}
          </li>
        </ul>
        <ul class="nav navbar-nav navbar-right pull-right">
        @if(Auth::user() == null)
          <li>{!! HTML::link('auth/login', '登陆') !!}</li>
          <li>{!! HTML::link('auth/register', '注册') !!}</li>
        @elseif(Auth::user() != null)
          <li class="dropdown">
              <a href="#" class="dropdown-toggle user" data-toggle="dropdown">
                {!! Html::image(url('img/user/', Auth::user()->icon ?:'default.jpg'), null, ['class'=>'hidden-xs user-circle img-circle img-responsive img-thumbnail'], null) !!}
                {!!str_limit(Auth::user()->name, 10)!!}
                <b class="caret"></b>
              </a>
              <ul class="dropdown-menu">
                <li>
                  {!! Html::link('user/profile', '个人资料', ['class'=>'glyphicon glyphicon-user']) !!}
                </li>
                <li>
                  {!! Html::link('auth/logout', '注销用户', ['class'=>'glyphicon glyphicon-log-out']) !!}
                </li>
              </ul>
          </li>
        @endif
        </ul>
      </div>
    </div>
  </nav>
              

  

  @yield('content')
</div>
</div>
@extends('footer')
</body>
</html>