@extends('article.index')

@section('content')

@foreach($articles as $article)
<div class="col-sm-12 col-md-8 col-md-offset-2">
	<div class="panel panel-default">
		<div class="panel-heading">
			<a class="article-title" href="{{url('article', $article->id)}}">{{$article->title}}</a></h4>
		</div>
		<div class="panel-body">
			<div class="article-preview">{{$article->content}}</div>
		</div>
		<div class="panel-footer">
			<span class="glyphicon glyphicon-tag" style="color: rgb(255, 140, 60); font-size: 14px;">{{$article->tag}}</span>
			<span class="article-update-at">{{$article->updated_at->diffForHumans()}}</span>
		</div>
	</div>
</div>
@endforeach

@stop