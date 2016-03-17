@extends('article.index')

@section('content')
	<h1>重新编辑文章</h1>
	{!! Form::model($article, ['url'=>'article/'.$article->id, 'role'=>'form']) !!}
	
	@include('article.articleform')

	<div class="form-group">
		<div class="row">
			<div class="col-sm-4">
				{!! Form::submit('确认修改', ['class'=>'btn btn-primary form-control']) !!}
			</div>
		</div>
	</div>

	{!! Form::close() !!}

	@include('errors.formerror')

@stop