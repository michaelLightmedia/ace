<div class="section">
	<div class="pull-left">
		
		{{ Form::button('<i class="fa fa-edit"></i>&nbsp;<span>Save</span>',array('name' => 'action', 'type' => 'submit', 'value' => 'save', 'class' => 'btn btn-default mr-5px')) }}
		
		@if(isset($user['id']))
			{{ Form::button('<i class="fa fa-trash-o"></i>&nbsp;<span>Delete</span>',array(
			'name' => 'action', 
			'id' 	=> 'delete-single-entry',
			'type' => 'submit', 
			'value' => 'delete', 
			'class' => 'btn btn-default'
			)) }}
		@endif
	</div>
	<div class="pull-right">
		<div class="selectpicker-lg">
			<select class="selectpicker">
				<option value="publish">Published</option>
				<option value="1">Draft</option>
			</select>
		</div>
	</div>
</div>
<script>
	$(function(){
		cskAdmin.BootrstrapAlert.confirmDelete(this);
	});
</script>