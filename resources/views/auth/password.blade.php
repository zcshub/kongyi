@extends('index')
@section('content')

<div class="col-md-4 col-md-offset-4">
	{!! Form::open(['url'=>'password/email']) !!}
		<div class="form-group">
			{!! Form::label('email', '邮箱') !!}
			{!! Form::email('email', old('email'), ['class'=>'form-control']) !!}
		</div>
		<div class="form-group">
			{!! Form::submit('发送密码重置链接', ['class'=>'btn btn-info form-control']) !!}
		</div>
	{!! Form::close() !!}
	@include('errors.formerror')
</div>
@stop
