@extends('article.index')

@section('content')

@foreach($articles as $article)

<div class="col-sm-12 col-md-8 col-md-offset-2">
	<div class="panel panel-default">
		<div class="panel-heading">
			<a class="article-title" href="{{url('article', $article->id)}}">{{$article->title}}</a>
		</div>
		<div class="panel-body">
			<div class="article-preview">
				<p>
				{!! str_limit(strip_tags($article->html_content), 380) !!}
				{!! Html::link(url('article', $article->id), Lang::get('article.read_all'), ['class'=>'btn btn-primary btn-xs more-link']) !!}
				</p>
			</div>
		</div>
		<div class="panel-footer">
			<span class="glyphicon glyphicon-tag" style="color: rgb(255, 140, 60); font-size: 14px;"> {{$article->tag}}</span>
			<span class="article-update-at">{{Lang::get('time.last_update')}}{{$article->updated_at->diffForHumans()}}</span>
		</div>
	</div>
</div>
@endforeach

@stop