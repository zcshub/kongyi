<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @yield('title', '<title>咸鱼馆</title>')
    <!-- css文件 -->
    <!-- Bootstrap 核心 CSS 文件 -->
    <!-- <link rel="stylesheet" href="//cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css"> -->
    {!! Html::style('css/bootstrap.min.css') !!}
    {!! Html::style('css/bootstrap-datetimepicker.min.css') !!}
    {!! Html::style('css/home.css') !!}
    <!-- js文件 -->
    <!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
    {!! Html::script('js/jquery-1.11.3.min.js') !!}
    <!-- Bootstrap 核心 JavaScript 文件 -->
    {!! Html::script('js/bootstrap.min.js') !!}
    @yield('needjs')
</head>
<body>

<nav class="navbar navbar-fixed-top" role="navigation">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#target-navbar-collapse">
        <span class="sr-only">展开菜单</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      {!! HTML::link('home', '咸鱼馆', ['class'=>'navbar-brand logo']) !!}
    </div>
    <div class="collapse navbar-collapse" id="target-navbar-collapse">
      <ul class="nav navbar-nav navbar-main">
        @yield('article', '<li>')
          {!! HTML::link('article', '文章列表', ['class'=>'glyphicon glyphicon-list-alt']) !!}
        </li>
        @yield('game', '<li>')
          {!! HTML::link('game', '小游戏展', ['class'=>'glyphicon glyphicon-file']) !!}
        </li>
        @yield('tab', '<li>')
          {!! HTML::link('', '空即是色', ['class'=>'glyphicon glyphicon-file']) !!}
        </li>
        @yield('tab', '<li>')
          {!! HTML::link('', '色即是空', ['class'=>'glyphicon glyphicon-file']) !!}
        </li>
      </ul>
      @if(Auth::user() == null)
      <ul class="nav navbar-nav navbar-right">
        <li>{!! HTML::link('auth/login', '登陆') !!}</li>
        <li>{!! HTML::link('auth/register', '注册') !!}</li>
      </ul>
      @endif
    </div>
  </div>
</nav>

@if(Auth::user() != null)
<div class="user">
  <div class="user-circle">
    {!! Html::image('img/default.jpg', null, ['class'=>'img-circle img-responsive img-thumbnail'], null) !!}
  </div>
  <div class="user-info">
    <div class="dropdown">
      <a href="#" id="user-name" data-toggle="dropdown">{{Auth::user()->name}}</a>
      <b class="caret"></b>
      <ul class="dropdown-menu">
        <li>
          <a href="user/profile">
            <span class="glyphicon glyphicon-user">个人资料</span>
          </a>
        </li>
        <li>
          <a href="auth/logout">
            <span class="glyphicon glyphicon-log-out">注销用户</span>
          </a>
        </li>
      </ul>
    </div>
  </div>
</div>
@endif

@yield('content')

</body>
</html>