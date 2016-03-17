@extends('article.index')

@section('content')
	<h1>写新文章</h1>
	{!! Form::open(['url'=>'article/store', 'role'=>'form']) !!}

	@include('article.articleform')

	<div class="form-group">
		<div class="row">
			<div class="col-sm-4">
				{!! Form::submit('提交文章', ['class'=>'btn btn-primary form-control']) !!}
			</div>
		</div>
	</div>

	{!! Form::close() !!}

	@include('errors.formerror')

@stop