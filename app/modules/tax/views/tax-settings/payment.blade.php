@extends('tax::tax-settings._sidebar')

@section('sub-content')
{{ Form::open(array('url' => 'admin/tax-form/settings/payment', 'files' => true,'autocomplete'=> 'off','method'=>'post')) }}
	<div class="panel">
		<div class="panel__heading">
			<h1 class="h4">Payment Settings</h1>
		</div>
		<div class="panel__sub_content">
			<div class="row">
				<div class="col-lg-7">
					<div class="mt-15px mb-15px form-horizontal" role="form">
						<div class="form-group">
							<label for="admin_email" class="col-lg-4 col-sm-4 control-label">
				            	Payment Gateway
				            	<i class="fa fa-question-circle fa-tooltip tooltip2" data-toggle="tooltip" data-placement="top" title="This address is used for admin purposes, like new user notification." data-original-title="Choose a city in the same timezone as you."></i>
				          	</label>
							<div class="col-lg-8 col-md-7 col-sm-7">
								<div class="selectpicker-full">
                                    <select id="select-gateway" name="option[payment_gateway]" class="form-control">
                                        <?php foreach(Order::$gateways_available as $gateway_key => $gateway_attr): ?>
                                            <option <?php is_selected(Settings::get('payment_gateway'),$gateway_key); ?> value="<?php echo $gateway_key?>"><?php echo  $gateway_attr['label']?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
							</div>
						</div>

                        <?php
                        // Include Gateway markup
                        foreach(Order::$gateways_available as $gateway_key => $gateway_attr){
                            $gateway_class = $gateway_attr['class'];

                            $gateway_class::settingsMarkup();
                        }
                        ?>

                        <hr />

                        <div class="form-group">
                            <label for="admin_email" class="col-lg-4 col-sm-4 control-label">
                                Payment Mode
                                <i class="fa fa-question-circle fa-tooltip tooltip2" data-toggle="tooltip" data-placement="top" title="This address is used for admin purposes, like new user notification." data-original-title="Choose a city in the same timezone as you."></i>
                            </label>
                            <div class="col-lg-8 col-md-7 col-sm-7">
                                <div class="selectpicker-full">
                                    <select id="select-gateway" name="option[payment_mode]" class="form-control">
                                        <option <?php is_selected(Settings::get('payment_mode'),"live"); ?> value="live">
                                            Live
                                        </option>
                                        <option <?php is_selected(Settings::get('payment_mode'),"testing"); ?> value="testing">
                                            Testing/Sandbox
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="option[admin_email]" class="col-lg-4 col-sm-4 control-label">
                                Currency (optional)
                                <i class="fa fa-question-circle fa-tooltip tooltip2" data-toggle="tooltip" data-placement="top" title="Paypal api username" data-original-title="Paypal api username"></i>
                            </label>
                            <div class="col-lg-8 col-md-7 col-sm-7">
                                <select name="option[payment_currency]" id="" class="form-control">
                                    @foreach(Currency::all() as $currency)
                                    <option {{ is_selected(Settings::get('payment_currency'),$currency->code) }} value="{{ $currency->code }}">{{ $currency->code }} - {{ $currency->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
							<label for="option[admin_email]" class="col-lg-4 col-sm-4 control-label">
				            	Tax State (optional)
				            	<i class="fa fa-question-circle fa-tooltip tooltip2" data-toggle="tooltip" data-placement="top" title="Paypal api username" data-original-title="Paypal api username"></i>
				          	</label>
							<div class="col-lg-8 col-md-7 col-sm-7">
								{{ Form::text('option[payment_tax_state]', Settings::get('payment_tax_state'), array('class' => 'form-control', 'autofocus' => 'autofocus')) }}
							</div>
						</div>

						<div class="form-group">
							<label for="option[admin_email]" class="col-lg-4 col-sm-4 control-label">
				            	Tax Rate (optional)
				            	<i class="fa fa-question-circle fa-tooltip tooltip2" data-toggle="tooltip" data-placement="top" title="Paypal api username" data-original-title="Paypal api username"></i>
				          	</label>
							<div class="col-lg-8 col-md-7 col-sm-7">
								{{ Form::text('option[payment_tax_rate]', Settings::get('payment_tax_rate'), array('class' => 'form-control', 'autofocus' => 'autofocus')) }}
							</div>
						</div>

						<div class="form-group">
							<label for="option[admin_email]" class="col-lg-4 col-sm-4 control-label">
                                Payment Amount
				            	<i class="fa fa-question-circle fa-tooltip tooltip2" data-toggle="tooltip" data-placement="top" title="Paypal api username" data-original-title="Paypal api username"></i>
				          	</label>
							<div class="col-lg-8 col-md-7 col-sm-7">
								{{ Form::text('option[cost_amount]', Settings::get('cost_amount'), array('class' => 'form-control', 'autofocus' => 'autofocus')) }}
							</div>
						</div>
						<div class="form-group">
							<div class="pull-right col-lg-8 col-md-7 col-sm-7">
								{{ Form::button('<i class="fa fa-edit mr-5px"></i>&nbsp;<span>Save</span>',array('name' => 'action', 'type' => 'submit', 'value' => 'save', 'class' => 'btn btn-info')) }}
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
{{ Form::close() }}
@stop