@extends('index')

<div class="col-md-8 col-md-offset-2 ">
<ul>
<li>用户名：{{$user->name}}</li>
<li>注册邮箱：{{$user->email}}</li>
<li>头像：{!! Html::image(url('img/user', $user->icon?:'default.jpg'), 'icon', ['class'=>'img-circle']) !!}</li>
</ul>
</div>