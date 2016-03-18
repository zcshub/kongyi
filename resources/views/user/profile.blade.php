@extends('index')

@section('content')
<div class="col-md-8 col-md-offset-2 ">
<ul>
<li>用户名：{{$user->name}}</li>
<li>注册邮箱：{{$user->email}}</li>
<li>头像：{!! Html::image(url('img/user', $user->icon?:'default.jpg'), 'icon', ['class'=>'img-circle user-circle user-icon-preview']) !!}
	({!! Html::link('', '就用这个头像好了', ['id'=>'changeIcon']) !!})
</li>
</ul>
<div class="photo-select-ani">
	<ul>
		@foreach(Lang::get('usericon') as $icon)
	  		<li>
				{!! Html::image(url('img/user', $icon), 'icon', []) !!}
	  		</li>
	  	@endforeach
	</ul>
</div>

<script type="text/javascript">
		$('.photo-select-ani li').click(function(e) {
			e.preventDefault();
			if($(this).hasClass('selected')){
				$(this).removeClass('selected');
			}else{
				$(this).parent().children('.selected').removeClass('selected');
				$(this).addClass('selected');
				$('.user-icon-preview').attr('src', $(this).children('img').attr('src') );
			}
		});
		$('#changeIcon').click(function(e){
			e.preventDefault();
			$.ajax({
				type: 'POST',
				url: '/user/profile/icon',
				data: {
					newIcon: $('.user-icon-preview').attr('src')
				},
				success: function(data, status){
					if(data.hasOwnProperty('success')){
						$('.navbar .user').children($('image')).attr('src', $('.user-icon-preview').attr('src'));
					}
					
				}
			});
		});
</script>
</div>

@stop