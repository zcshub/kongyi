<div class="container">
	<div class="form-group">
		<div class="row">
			<div class='col-sm-1'>
				{!! Form::label('title', 'Title') !!}
			</div>
			<div class='col-sm-6'>
				{!! Form::text('title', null, ['class'=>'form-control', 'placeholder'=>'文章标题']) !!}
			</div>
			<div class="col-sm-1">
				{!! Form::label('publish_time', 'Publish Time') !!}
			</div>
			<div class="col-sm-4">
				<input name="publish_at" size="16" type="text" readonly class="form_datetime" value="2015-10-21 17:22">
				<script type="text/javascript">
					$(".form_datetime").datetimepicker({
						language: "zh-CN",
	                	format: "yyyy-mm-dd hh:ii"
					});
				</script>
			</div>
		</div>
	</div>
	<div class="form-group">
		<div class="row">
			<div class="col-sm-6">
				{!! Form::textarea('content', null, ['class'=>'form-control', 'id'=>'content', 'placeholder'=>'文章内容', 'onkeyup'=>'compile()']) !!}
			</div>
			<div class="col-sm-6">
				<div id="preview"></div>
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