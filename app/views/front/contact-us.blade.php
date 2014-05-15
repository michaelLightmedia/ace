<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if IE 9]>         <html class="no-js ie-9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js jPanelMenu"> <!--<![endif]-->

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title> {{ Site::title(); }} </title>
  <meta name="description" content="{{ Site::metaDescription(); }}">

  <link rel="stylesheet" href="{{ URL::asset('assets/global/css/bootstrap.css') }}">
  <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet">

  <link rel="stylesheet" href="{{ URL::asset('assets/global/js/libs/JvalidationEngine/css/validationEngine.jquery.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('assets/global/js/libs/tagsinput/bootstrap-tagsinput.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('assets/global/js/libs/tagsinput/app.css') }}">

  <link rel="stylesheet" href="{{ URL::asset('assets/site/css/icons.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('assets/site/css/main.css') }}">
  
  <!--[if IE]>
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/global/css/ie.css') }}" />
  <![endif]-->
  
  <script type="text/javascript" src="{{ URL::asset('assets/global/js/ext/modernizr-2.6.2-respond-1.1.0.min.js') }}"></script>
  <script type="text/javascript" src="{{ URL::asset('assets/global/js/libs/jquery-1.10.1.js') }}"></script>
  <script>
    //<![CDATA[
    var baseURL = '{{ URL::to("/"); }}/';
    //]]>
    jQuery(function(){
      var visitortime = new Date();
      var visitortimezone = -visitortime.getTimezoneOffset()/60;
      @if(!Session::has('timezoneOffset'))
      //check if timezone has set
        jQuery.post(baseURL+'offsetTimeZone',{offset:visitortimezone},function(data){
          //location.reload(true);
        });
      @endif
    });
    </script>

</head>
  	<body>

  	@include('layouts.top-nav')

  	<div class="banner banner-page">
  		<div class="container">
  			<h1 class="banner-title">Contact Us</h1>
  		</div>
  	</div>

	<div class="container main-content">
		<div class="row">

			<div class="col-sm-8 t-content">
                <form action="#" method="POST" >
                    <input type="hidden" name="success_url" value="{{ URL::to("/contact-us-thank-you") }}">
                    <input type="hidden" name="error_url" value="{{ URL::to("/contact-us") }}">

                    <?php list($error_msg, $error_class) = validator_res($errors,'name') ?>
                    <div class="form-group {{ $error_class }}">
                        <label for="#input_name" class="control-label">Name</label>
                        <input type="text" id="input_name" name="name" value="{{ Input::old('name') }}" class="form-control">
                        {{ $error_msg }}
                    </div>

                    <?php list($error_msg, $error_class) = validator_res($errors,'email') ?>
                    <div class="form-group {{ $error_class }}">
                        <label for="#input_email" class="control-label">Email</label>
                        <input type="text"  id="input_email" name="email" value="{{ Input::old('email') }}" class="form-control">
                        {{ $error_msg }}
                    </div>

                    <?php list($error_msg, $error_class) = validator_res($errors,'message') ?>
                    <div class="form-group {{ $error_class }}">
                        <label for="#" class="control-label">Message</label>
                        <textarea id="message" name="message" id="" cols="30" rows="8" class="form-control">{{ Input::old('message') }}</textarea>
                        {{ $error_msg }}
                    </div>

                    <button type="submit" class="btn btn-yellow btn-lg">Submit</button>
                </form>
			</div>

			<div class="col-sm-4 t-sidebar">
				<div class="embbed-iframe embbed-iframe-map">
                    {{ get_settings('google_map') }}
				</div>
			</div>			
		</div>

	</div>

	 <div class="section-l6">
	  <div class="container">
	    <div class="tax-info">
	      <span class="tax-info-label">Time to Complete</span>
	      <span class="tax-info-desc">10 mins</span>
	    </div>
	    <div class="tax-info">
	      <span class="tax-info-label">Return Banked in</span>
	      <span class="tax-info-desc">14 days</span>
	    </div>

	  </div>
	</div>

  <div class="l-footer">
    <div class="container">
      <ul class="list-inline">
        <li class="active"><a href="#">home</a></li>
        <li><a href="#about">about us</a></li>
        <li><a href="#contact">benefits</a></li>
        <li><a href="#contact">pricing</a></li>
        <li><a href="#contact">calculator</a></li>
        <li><a href="#contact">blog</a></li>
        <li><a href="#">testimonials</a></li>
      </ul>
      <p class="copyright">&copy; 2014 GTYBO. All Rights Reserved.</p>
      
      <div class="l-footer-sub">
        <h1 class="brand3"></h1>
        <p>Trust Signals: SSL (online security). Tax Agent Number other industry, other recognized seals/afiliations/memberships</p>
      </div>

    </div>
  </div>

  <script src="{{ URL::asset('assets/global/js/ext/bootstrap.min.js') }}"></script> 
  <script src="{{ URL::asset('assets/site/js/main.js') }}"></script>


  <script type="text/javascript">var addthis_config = {"data_track_addressbar":false};</script>
  <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-4f06957f6dbea277"></script>
  </body>
</html>