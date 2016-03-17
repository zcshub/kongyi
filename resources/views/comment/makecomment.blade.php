<div class="make-comment">
	{!! Form::open(['url'=>'comment/make', 'role'=>'form', 'id'=>'makeComment']) !!}
		<div class="form-group">
			{!! Form::textarea('content', null, ['class'=>'form-control make-comment-textarea', 'rows'=>3]) !!}
		</div>
		{!! Form::hidden('parent_id', 0) !!}
		{!! Form::hidden('article_id', $article->id) !!}
		<div class="form-group">
			{!! Form::submit('提交评论', ['class'=>'btn btn-primary btn-sm']) !!}
			{!! Form::button('取消', ['class'=>'btn btn-danger btn-sm pull-right', 'id'=>'make-comment-exit']) !!}
		</div>
	{!! Form::close() !!}
	<!-- <a href="#" id="get">Get</a> -->
	<ul id="error-info" class="list-group">
	</ul>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		initCommentAbout();
		$('#makeComment').submit(function(e){
			e.preventDefault();
			$("#error-info").empty();
			$.ajax({
				type: 'POST',
				url: '/comment/make',
				data: {
					content:$('.make-comment-textarea').val(),
					article_id:$('input[name=article_id]').val(),
					parent_id:$('input[name=parent_id]').val()
				},
				success: function(data, status){
					if(data.error){
						$.each(data.error, function(index, value)
            			{
			                if (value.length != 0)
			                {
			                    $("#error-info").append(
			                    	'<li class="list-group-item list-group-item-danger">'+ value +'</li>'
			                    	);
			                }
			            });
					}else{
						$commentStrB = '<div class="article-comment"><div class="inner-article-comment"><p>';
						$commentStrA = '</p></div></div>';
						$('.article-comments').prepend(
							$commentStrB+data.content+$commentStrA
							);
						makeCommentSuccess();
					}
				},
				error: function(XMLHttpRequest, textStatus, errorThrown){

				}
			});
		});
		$('#make-comment-button').click(function(e){
			e.preventDefault();
			$('.make-comment').insertAfter($(this).parent());
			$('.make-comment').show();
		});
		$('#make-comment-exit').click(function(e){
			e.preventDefault();
			$('.make-comment').hide();
		});
		$('.article-comment a').click(function(e){
			e.preventDefault();
			$('.make-comment input[name=parent_id]').val($(this).attr('bb-id'));
			$('.make-comment').insertAfter($(this).parent().parent());
			$('.make-comment').show();
		});
		$('.inner-article-comment').mouseover(function(e){
			e.preventDefault();
			$(this).children('.pcom').show();
		});
		$('.inner-article-comment').mouseout(function(e){
			e.preventDefault();
			$(this).children('.pcom').hide();
		});
		function initCommentAbout(){
			$('.make-comment').hide();
			$('.inner-article-comment .pcom').hide();
		}
		function makeCommentSuccess(){
			$('.make-comment').hide();
		}
	});
</script>