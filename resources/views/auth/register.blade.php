@extends('home')
@section('content')

<div class="col-md-4 col-md-offset-4">
	{!! Form::open(['method'=>'POST', 'url'=>'auth/register']) !!}

		<div class="form-group">
			{!! Form::label('name', 'Name') !!}
			{!! Form::text('name', null, ['class'=>'form-control']) !!}
		</div>
		<div class="form-group">
			{!! Form::label('email', 'E-mail') !!}
			{!! Form::email('email', null, ['class'=>'form-control']) !!}
		</div>
		<div class="form-group">
			{!! Form::label('password', 'Password') !!}
			{!! Form::password('password', ['class'=>'form-control']) !!}
		</div>
		<div class="form-group">
			{!! Form::label('password_confirmation', 'Password Confirm') !!}
			{!! Form::password('password_confirmation', ['class'=>'form-control']) !!}
		</div>
		{!! Form::submit('注册', ['class'=>'btn btn-primary form-control']) !!}

	{!! Form::close() !!}
	@include('errors.formerror')
</div>

@stop

