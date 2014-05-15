<div class="row">
	<div class="section">
     <div class="pull-left">
        <a onclick="cskAdmin.BootrstrapAlert.xdelete('admin/taxonomy/{{ $taxonomy }}/delete', 'Category');return false;" class="delete-terms btn btn-default">
          <i class="fa fa-trash-o"></i>
          <span>Delete</span>
        </a>
      </div>
      <div class="pull-right">
        <div class="selectpicker-sm">
          {{ $lists->records_per_page() }}
        </div>
      </div>
    </div>
    <div class="section section--offset">
        {{ $lists->prepare_items() }}
        {{ $lists->display() }}
      
      <div class="pull-left">
        <div class="table-results">
          {{ $lists->pagination_info() }}
        </div>
      </div>
      <div class="pull-right">    
        {{ $lists->pagination() }}
      </div>
    </div>
</div>
<script>
	$(function(){
		tableHelper.init("{{ URL::to('admin/taxonomy/'.$taxonomy) }}");
	});
</script>