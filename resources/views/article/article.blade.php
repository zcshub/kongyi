@extends('article.index')

@section('content')

<script>
	$(document).ready(function() {
	    //为超链接加上target='_blank'属性
		$('a[href^="http"]').each(function() {
			$(this).attr('target', '_blank');
		});
	});
</script>

<div class="col-md-8 col-md-offset-2">
	<div class="page-header">
		<h1>{{ $article->title }}</h1>
		<span class="label label-success">{{$article->publish_at}}</span>
		@foreach ($tags as $tag)
		<span class="label label-success">{{$tag}}</span>
		@endforeach
	</div>
	{!! $article->html_content !!}
</div>


@stop