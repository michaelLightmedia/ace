@extends('settings::_sidebar')

@section('sub-content')
{{ Form::open(array('url' => 'admin/settings/referral', 'files' => true)) }}	
	<div class="panel">
		<div class="panel__heading">
			<h1 class="h4">Referral Settings</h1>
		</div>
		<div class="panel__sub_content">
			<div class="row">
				<div class="col-lg-12">
					<br />
					<div class="section section--offset">
						<table cellpadding="0" cellspacing="0" border="0" class="table table-pretty table-striped table-hover border-top" id="table">
							<thead class="table-pretty-head">
								<tr>
									<th>Member Level</th>
									<th>Successfull Referral</th>
									<!--<th>No. of Products</th>-->
									<th>% of Products</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								@foreach($referral_settings as $referral)
									@if( Input::get('action') == 'edit' && Input::get('refid') == $referral->level_id)
										<tr>
											<td>{{ $referral->name }}{{ Form::hidden('referral_id', $referral->level_id) }} </td>	
											<td>{{ Form::text('sr', $referral->successfull_referral, array('class' => 'form-control  validate[required, custom[number]]')) }}</td>
											<!--<td>{{ Form::text('nop', $referral->no_of_products, array('class' => 'form-control  validate[required, custom[integer]]')) }}</td>-->
											<td>{{ Form::text('pop', $referral->percentage_of_products, array('class' => 'form-control validate[required, custom[number]]')) }}</td>
											<td>
												{{ Form::button('<i class="fa fa-plus"></i>Update',array('name' => 'submit', 'value' => 'update','type' => 'submit', 'class' => 'btn btn-blue btn-pretty')) }}
												<a href="{{ URL::to('admin/settings/referral') }}">Cancel</a>
											</td>
										</tr>
									@else
										<tr>
											<td>{{ $referral->name }}</td>	
											<td>{{ $referral->successfull_referral }}</td>
											<!--<td>{{ $referral->no_of_products }}</td>-->
											<td>{{ $referral->percentage_of_products }}</td>
											<td>
												<a href="{{ URL::to('admin/settings/referral?action=edit&refid='.$referral->level_id) }}" title="Edit"><i class="fa fa-edit"></i></a>
												<a class="confirm-delete" href="{{ URL::to('admin/settings/referral/'. $referral->level_id.'/delete?_token='.csrf_token()) }}" title="Delete"><i class="fa fa-trash-o"></i></a></td>
										</tr>
									@endif
								@endforeach
							</tbody>
							<tfoot>
								<tr>
									<th>
										<div class="selectpicker-full">
										{{ Form::select('level_id',$levels, false, array('class' => 'selectpicker')) }}
										</div>
									</th>	
									<th>{{ Form::text('successfull_referral', 0, array('class' => 'form-control  validate[required, custom[number]]')) }}</th>
									<!--<th>{{ Form::text('no_of_products', 0, array('class' => 'form-control  validate[required, custom[integer]]')) }}</th>-->
									<th>{{ Form::text('percentage_of_products', 0, array('class' => 'form-control  validate[required, custom[number]]')) }}</th>
									<th>
										{{ Form::button('<i class="fa fa-plus mr-5px"></i>Add',array('name' => 'submit', 'value' => 'save', 'type' => 'submit', 'class' => 'btn btn-info btn-pretty')) }}

									</th>
								</tr>
							</tfoot>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
{{ Form::close() }}
@stop