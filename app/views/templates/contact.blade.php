@extends('layouts.front')
@section('content')

<div class="main-content">
  <div class="main-content-body">
    <div class="main-content-heading">
      <h1>Contact</h1>
    </div>

    <div id="map-canvas" style="width: 100%; height: 300px;"></div>
    <h4>Contact Form</h4>
    <div class="copy copy-sm">
      <p>To allow us to respond to your enquiry promptly, please provide all required information.</p>
    </div>
    <form role="form" class="form" action="{{ URL::to('/contact-us') }}" method="post">
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <input type="text" name="first_name" value="<?php echo Input::old('first_name'); ?>" class="helo form-control validate[required]" id="" placeholder="First Name">
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <input type="text" name="last_name" value="<?php echo Input::old('last_name'); ?>" class="form-control validate[required]" id="" placeholder="Last Name">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <input type="email" name="email" value="<?php echo Input::old('email'); ?>" class="form-control validate[required,email]" id="" placeholder="Email">
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <input type="text" name="phone" value="<?php echo Input::old('phone'); ?>" class="form-control validate[required]" id="" placeholder="Phone Number">
          </div>
        </div>
      </div>
      <div class="form-group">
        <textarea name="comment" id="" cols="30" rows="10" class="form-control validate[required]" placeholder="Comment"><?php echo Input::old('comment'); ?></textarea>
      </div>
      <div class="pull-right">
        <button type="submit" class="btn btn-sm btn-yellow-strip">Submit</button>
      </div>
    </form>
  </div>
  <div class="main-content-sidebar">
   {{ Site::getWidget(array(
            'widget'  => 'contact-sidebar',
            'widgetWrap' => 'div',
            'widgetWrapClass' => 'widget widget-l2',
            'showTitle' => true,
            'titleWrap' => 'h3',
            'titleWrapClass' => 'widget-title'
          )) }}
  </div>
</div>
<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDY0kkJiTPVd2U7aTOAwhc9ySH6oHxOIYM&sensor=false"></script>
<script>// if HTML DOM Element that contains the map is found...
    /** @constructor */
    function CoordMapType(tileSize) {
      this.tileSize = tileSize;
    }

    CoordMapType.prototype.getTile = function(coord, zoom, ownerDocument) {
      var div = ownerDocument.createElement('div');
      div.innerHTML = coord;
      div.style.width = this.tileSize.width + 'px';
      div.style.height = this.tileSize.height + 'px';
      div.style.fontSize = '10';
      return div;
    };

    var map;
    var melbourne = new google.maps.LatLng(-37.717434, 145.139789);

    function initialize() {
      var mapOptions = {
        zoom: 15,
        center: melbourne
      };
      map = new google.maps.Map(document.getElementById('map-canvas'),
                                        mapOptions);

      // Insert this overlay map type as the first overlay map type at
      // position 0. Note that all overlay map types appear on top of
      // their parent base map.
      map.overlayMapTypes.insertAt(
          0, new CoordMapType(new google.maps.Size(256, 256)));
	
	var infowindow = new google.maps.InfoWindow({
      content: '18 Brisbane Street, Eltham Vic 3095'
  });



      var marker = new google.maps.Marker({
        position: melbourne,
        map: map,
        title: '18 Brisbane Street, Eltham Vic 3095'
      });
      
       google.maps.event.addListener(marker, 'click', function() {
		    infowindow.open(map,marker);
		  });
    }

    google.maps.event.addDomListener(window, 'load', initialize);
</script>


@stop