@extends('home')
@section('content')

<div class="col-md-4 col-md-offset-4">
	{!! Form::open(['url'=>'password/email']) !!}
		<div class="form-group">
			{!! Form::label('email', 'E-mail') !!}
			{!! Form::email('email', old('email'), ['class'=>'form-control']) !!}
		</div>
		<div class="form-group">
			{!! Form::label('password', 'Password') !!}
			{!! Form::password('password', ['class'=>'form-control']) !!}
		</div>
		<div class="form-group">
			{!! Form::label('password_confirmation', 'Password Confirm') !!}
			{!! Form::password('password_confirmation', ['class'=>'form-control']) !!}
		</div>
		<div class="form-group">
			{!! Form::submit('重置密码', ['class'=>'btn btn-primary form-control']) !!}
		</div>
	{!! Form::close() !!}
	@include('errors.formerror')
</div>
@stop
