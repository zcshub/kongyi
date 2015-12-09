@extends('home')
@section('content')

<div class="col-md-4 col-md-offset-4">
	{!! Form::open(['url'=>'auth/login']) !!}

		<div class="form-group">
			{!! Form::label('email', 'E-mail') !!}
			{!! Form::email('email', old('email'), ['class'=>'form-control']) !!}
		</div>
		<div class="form-group">
			{!! Form::label('password', 'Password') !!}
			{!! Form::password('password', ['class'=>'form-control']) !!}
		</div>
		<div class="form-group">
			{!! Form::checkbox('remember') !!}
			{!! Form::label('remember', 'Remember me') !!}
		</div>
		<div class="form-group">
			{!! Form::submit('登陆', ['class'=>'btn btn-primary form-control']) !!}
		</div>
	{!! Form::close() !!}
	@include('errors.formerror')
	<div>
		{!! Html::link('password/email', '忘记密码了？') !!}
	</div>
</div>

@stop