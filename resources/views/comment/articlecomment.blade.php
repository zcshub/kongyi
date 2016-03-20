<div class="col-md-8 col-md-offset-2">
	@include('comment.makecomment')
	<div class="comment-line">
		<span class="glyphicon glyphicon-comment comment-area-logo" style="color: rgb(255, 140, 60);">评论区</span>
		<button class="btn btn-sm btn-info pull-right" id="make-comment-button">发表评论</button>
	</div>
	<div class="article-comments">
		@foreach($comments as $c)
			<div class="article-comment">
				@if(array_has($hideComments, $c->comment->id))
					<div class="comment-gray">
					<span>重复引用已隐藏</sapn>
					</div>
				@else
					@foreach($c->pids as $ccid)
						<div class="true-inner inner-article-comment">
							<article class="media">
							<a href={{url('user', $comments[$ccid]->comment->user_id)}} class="pull-left">
							{!! Html::image(url('img/user', $comments[$ccid]->comment->icon?:'default.jpg'), '', ['class'=>"img-circle user-circle"]); !!}
							</a>
							<div class="media-heading">
							{!! Html::link(url('user', $comments[$ccid]->comment->user_id), $comments[$ccid]->comment->name, ['class'=>'user']) !!}
							</div>
							<div class="media-body">
								<p class="inner-article-comment-content">{{$comments[$ccid]->comment->content}}</p>
							</div>
							</article>
							<span class="yinyong pcom">{!! Html::link('', '引用', ['bb-id'=>$c->comment->id]) !!}</span>
						</div>
					@endforeach
				@endif
				<div class="inner-article-comment">
					<article class="media">
					<a href={{url('user', $c->comment->user_id)}} class="pull-left">
					{!! Html::image(url('img/user', $c->comment->icon?:'default.jpg'), '', ['class'=>"img-circle user-circle"]); !!}
					</a>
					<div class="media-heading">
					{!! Html::link(url('user', $c->comment->user_id), $c->comment->name, ['class'=>'user']) !!}
					</div>
					<div class="media-body">
						<p class="inner-article-comment-content">{{ $c->comment->content }}</p>
					</div>
					</article>
					<span class="yinyong">{!! Html::link('', '引用', ['bb-id'=>$c->comment->id]) !!}</span>
				</div>
			</div>
		@endforeach
	</div>
</div>