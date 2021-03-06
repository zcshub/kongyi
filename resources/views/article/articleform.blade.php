<script>
	window.onload = function() {
		onCompile();
	}
</script>

<div class="container">
	<div class="form-group">
		<div class="row">
			<div class='col-sm-1'>
				{!! Form::label('title', 'Title') !!}
			</div>
			<div class='col-sm-6'>
				{!! Form::text('title', null, ['class'=>'form-control', 'id'=>'title', 'placeholder'=>'文章标题']) !!}
			</div>
			<div class="col-sm-1">
				{!! Form::label('publish_time', 'Publish Time') !!}
			</div>
			<div class="col-sm-4">
				<input name="publish_at" size="20" type="text" readonly class="form_datetime" value= "{!! \Carbon\Carbon::now()->toDateTimeString()!!}"/>
				<script type="text/javascript">
					$(".form_datetime").datetimepicker({
						language: "zh-CN",
	                	format: "yyyy-mm-dd hh:ii:ss"
					});
				</script>
			</div>
		</div>
	</div>
	<div class="form-group">
		<div class="row">
			<div class="col-sm-6">
				{!! Form::textarea('content', null, ['class'=>'form-control', 'id'=>'content', 'placeholder'=>'文章内容', 'onkeyup'=>'onCompile()']) !!}
			</div>
			<div class="col-sm-6">
				<input name="html_content" id="html_content" hidden/>
				<div id="view_content"></div>
			</div>
		</div>
	</div>
	<div class="form-group">
		<div class="row">
			<div class="col-sm-1">
				{!! Form::label('tag', 'Tags') !!}
			</div>
			<div class="col-sm-6">
				{!! Form::text('tag', null, ['class'=>'form-control', 'placeholder'=>'文章标签']) !!}
			</div>
		</div>
	</div>
</div>