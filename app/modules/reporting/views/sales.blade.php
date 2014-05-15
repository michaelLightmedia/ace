@extends('reporting::index')

@section('content')
<!-- Main Content -->
	<div class="section">
		<div class="panel panel-success">
			<div class="panel__heading">
				<h2 class="h4">Sales Report</h2>
			</div>
			<div class="panel__content">
				<div class="row stroke-bottom">
					<div class="col-lg-3 col-md-6 col-sm-6">
						<div class="selectpicker-full form-group">
							<select class="selectpicker">
								<option>Product</option>
								<option>Product 1</option>
								<option>Product 2</option>
								<option>Product 3</option>
								<option>Product 4</option>
							</select>
						</div>
					</div>
					<div class="col-lg-3 col-md-6 col-sm-6">
						<div class="datepicker-wrap form-group">
                            <div class="row">
                            	<div class="datepicker-2-cols">
                            		<div class="col-lg-4 col-sm-4">
	                            		<div class="date datepicker">
	                            			<div class="add-on add-on--from">
		                            			<input type="text" id="date-from" value="from" class="form-ugly">
		                            		</div>
	                            		</div>
	                            	</div>
	                            	<div class="col-lg-3 col-sm-4 flow-center">
	                            		-
	                            	</div>
	                            	<div class="col-lg-5 col-sm-4">
	                            		<div class="date datepicker">
	                            			<div class="add-on add-on--from">
		                            			<input type="text" id="date-from" value="to" class="form-ugly">
		                            		</div>
	                            		</div>
	                            	</div>
                            	</div>
                            </div>
                            <input type="text" class="form-control" placeholder="">
                            <div class="datepicker-calendar">
                                <i class="fa fa-calendar"></i>
                            </div>
                        </div>
					</div>
					<div class="col-lg-3 col-md-6 col-sm-6">
						<div class="selectpicker-full form-group">
							<select class="selectpicker">
								<option>Members</option>
								<option>Jane Doe</option>
								<option>John Doe</option>
							</select>
						</div>
					</div>
					<div class="col-lg-3 col-md-6 col-sm-6">
						<button class="btn btn-default btn-info btn-block">Generate Report</button>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12 col-sm-12">
						<div class="mt-15px mb-15px">
							<div class="sales-reports-total sales-reports-total--grid pull-left">
								<div class="icon-sales-dot">
									<span>3</span>
								</div>
								<h4 class="sales-reports-total-title">Paid in Full</h4>
								<span class="sales-reports-price">$34,343</span>
							</div>
							<div class="sales-reports-total sales-reports-total--grid sales-reports-total--pending pull-left">
								<div class="icon-sales-dot">
									<span>12</span>
								</div>
								<h4 class="sales-reports-total-title">Pending</h4>
								<span class="sales-reports-price">$34,343</span>
							</div>
							<div class="sales-reports-total sales-reports-total--grid sales-reports-total--financed pull-left">
								<div class="icon-sales-dot">
									<span>8</span>
								</div>
								<h4 class="sales-reports-total-title">Financed</h4>
								<span class="sales-reports-price">$34,343</span>
							</div>
							<div class="sales-reports-total sales-reports-total--grid sales-reports-total--cancel pull-left">
								<div class="icon-sales-dot">
									<span>5</span>
								</div>
								<h4 class="sales-reports-total-title">Cancel</h4>
								<span class="sales-reports-price">$34,343</span>
							</div>
							<div class="sales-reports-total sales-reports-total--grid sales-reports-total--volume pull-left">
								<div class="icon-sales-dot">
									<span>5</span>
								</div>
								<h4 class="sales-reports-total-title">Next Volume</h4>
								<span class="sales-reports-price">$34,343</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="sales-reports-print pull-right">
			<a href="#" class="btn btn-default js-print">
				<i class="fa fa-print mr-5px"></i>
				Print
			</a>
		</div>
	</div>
	<div class="section section--offset">
		<table class="table table-pretty table-striped table-hover border-top" id="sample_1">
			<thead class="table-pretty-head">
				<tr>
					<th style="width:8px;"><input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes" /></th>
					<th>Product <a href="#"><i class="fa fa-sort"></i></a></th>
					<th>Date <a href="#"><i class="fa fa-sort"></i></a></th>
					<th>Type <a href="#"><i class="fa fa-sort"></i></a></th>
					<th>Amount <a href="#"><i class="fa fa-sort"></i></a></th>
					<th>Member <a href="#"><i class="fa fa-sort"></i></a></th>
					<th>Status <a href="#"><i class="fa fa-sort"></i></a></th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td><input type="checkbox" class="checkboxes" value="1" /></td>
					<td>Product name here</td>
					<td>12-12-2013</td>
					<td><span class="label label-success">Paid</span></td>
					<td>$234</td>
					<td>Jane Doe</td>
					<td><span class="label label-success">Approved</span></td>
				</tr>
				<tr>
					<td><input type="checkbox" class="checkboxes" value="1" /></td>
					<td>Product name here</td>
					<td>12-12-2013</td>
					<td><span class="label label-success">Paid</span></td>
					<td>$234</td>
					<td>Jane Doe</td>
					<td><span class="label label-success">Approved</span></td>
				</tr>
				<tr>
					<td><input type="checkbox" class="checkboxes" value="1" /></td>
					<td>Product name here</td>
					<td>12-12-2013</td>
					<td><span class="label label-success">Paid</span></td>
					<td>$234</td>
					<td>Jane Doe</td>
					<td><span class="label label-success">Approved</span></td>
				</tr>
				<tr>
					<td><input type="checkbox" class="checkboxes" value="1" /></td>
					<td>Product name here</td>
					<td>12-12-2013</td>
					<td><span class="label label-success">Paid</span></td>
					<td>$234</td>
					<td>Jane Doe</td>
					<td><span class="label label-success">Approved</span></td>
				</tr>
				<tr>
					<td><input type="checkbox" class="checkboxes" value="1" /></td>
					<td>Product name here</td>
					<td>12-12-2013</td>
					<td><span class="label label-success">Paid</span></td>
					<td>$234</td>
					<td>Jane Doe</td>
					<td><span class="label label-danger">Pending</span></td>
				</tr>
				<tr>
					<td><input type="checkbox" class="checkboxes" value="1" /></td>
					<td>Product name here</td>
					<td>12-12-2013</td>
					<td><span class="label label-success">Paid</span></td>
					<td>$234</td>
					<td>Jane Doe</td>
					<td><span class="label label-success">Approved</span></td>
				</tr>
				<tr>
					<td><input type="checkbox" class="checkboxes" value="1" /></td>
					<td>Product name here</td>
					<td>12-12-2013</td>
					<td><span class="label label-success">Paid</span></td>
					<td>$234</td>
					<td>Jane Doe</td>
					<td><span class="label label-success">Approved</span></td>
				</tr>
				<tr>
					<td><input type="checkbox" class="checkboxes" value="1" /></td>
					<td>Product name here</td>
					<td>12-12-2013</td>
					<td><span class="label label-success">Paid</span></td>
					<td>$234</td>
					<td>Jane Doe</td>
					<td><span class="label label-success">Approved</span></td>
				</tr>
				<tr>
					<td><input type="checkbox" class="checkboxes" value="1" /></td>
					<td>Product name here</td>
					<td>12-12-2013</td>
					<td><span class="label label-success">Paid</span></td>
					<td>$234</td>
					<td>Jane Doe</td>
					<td><span class="label label-success">Approved</span></td>
				</tr>
				<tr>
					<td><input type="checkbox" class="checkboxes" value="1" /></td>
					<td>Product name here</td>
					<td>12-12-2013</td>
					<td><span class="label label-success">Paid</span></td>
					<td>$234</td>
					<td>Jane Doe</td>
					<td><span class="label label-success">Approved</span></td>
				</tr>
				<tr>
					<td><input type="checkbox" class="checkboxes" value="1" /></td>
					<td>Product name here</td>
					<td>12-12-2013</td>
					<td><span class="label label-success">Paid</span></td>
					<td>$234</td>
					<td>Jane Doe</td>
					<td><span class="label label-danger">Pending</span></td>
				</tr>
				<tr>
					<td><input type="checkbox" class="checkboxes" value="1" /></td>
					<td>Product name here</td>
					<td>12-12-2013</td>
					<td><span class="label label-success">Paid</span></td>
					<td>$234</td>
					<td>Jane Doe</td>
					<td><span class="label label-success">Approved</span></td>
				</tr>
				<tr>
					<td><input type="checkbox" class="checkboxes" value="1" /></td>
					<td>Product name here</td>
					<td>12-12-2013</td>
					<td><span class="label label-success">Paid</span></td>
					<td>$234</td>
					<td>Jane Doe</td>
					<td><span class="label label-success">Approved</span></td>
				</tr>
			</tbody>
		</table>
		<div class="pull-left">
			<div class="table-results">
				Showing 1 to 10 of 25 entries
			</div>
		</div>
		<div class="pull-right">
			<ul class="pagination">
				<li class="prev disabled"><a href="#"><i class="fa fa-fast-backward"></i></a></li>
				<li class="prev disabled"><a href="#"><i class="fa fa-backward"></i></a></li>
				<li class="active"><a href="#">1</a></li>
				<li><a href="#">2</a></li>
				<li><a href="#"><i class="fa fa-forward"></i></a></li>
				<li><a href="#"><i class="fa fa-fast-forward"></i></a></li>
			</ul>
		</div>
	</div>
@stop