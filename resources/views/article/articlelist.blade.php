@extends('article.index')

@section('content')

<h1>Articles</h1>
<hr>
@foreach($articles as $article)
<h2><a href="{{url('article', $article->id)}}">{{$article->title}}</a></h2>
<article>
<div class="body">{{$article->content}}</div>
<div class="footer">{{$article->tag}}{{$article->updated_at->diffForHumans()}}</div>
</article>
@endforeach

@stop