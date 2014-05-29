@extends('layouts.front')
@section('content')

<div class="main-content">
  <div class="main-content-body">
    <div class="main-content-heading">
      <h1>Contact</h1>
    </div>
    <div class="copy copy-sm">
      <p>Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum. Nam liber tempor cum soluta nobis eleifend option congue</p>
    </div>

    <div id="map-canvas" style="width: 100%; height: 300px;"></div>
    <h4>Contact Form</h4>
    <div class="copy copy-sm">
      <p>Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum. Nam liber tempor cum soluta nobis eleifend option congue</p>
    </div>
    <form role="form" class="form" action="{{ URL::to('/contact-us') }}" method="post">
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <input type="text" name="first_name" class="form-control validate[required]" id="" placeholder="First Name">
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <input type="text" name="last_name" class="form-control validate[required]" id="" placeholder="Last Name">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <input type="email" name="email" class="form-control validate[required,email]" id="" placeholder="Email">
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <input type="text" name="phone" class="form-control validate[required]" id="" placeholder="Phone Number">
          </div>
        </div>
      </div>
      <div class="form-group">
        <textarea name="comment" id="" cols="30" rows="10" class="form-control validate[required]" placeholder="Comment"></textarea>
      </div>
      <div class="pull-right">
        <button type="submit" class="btn btn-sm btn-yellow-strip">Submit</button>
      </div>
    </form>
  </div>
  <div class="main-content-sidebar">
    <!-- {{ Site::getWidget(array(
            'widget'  => 'Sidebar',
            'widgetWrap' => 'div',
            'widgetWrapClass' => 'widget widget-l2',
            'showTitle' => true,
            'titleWrap' => 'h3',
            'titleWrapClass' => 'widget-title'
          )) }} -->

    <div class="widget widget-l2">
      <h3 class="widget-title">General Info</h3>
      <div class="widget-body">
        <div class="post-testimonial">
          <div class="row">
            <div class="col-xs-4">
              <div class="avatar avatar-secondary">
                <img src="http://ace.local/media/uploads/2014/15/thumbnail/ace.jpg" alt="">                  
              </div>
            </div>
            <div class="col-xs-8 widget-bl copy">
              <div class="contact-info">
                Local: (817) 907-5300 <br>
                Free:  (855) 907-5300 <br>
                <span class="live-chat">
                  Live Chat 24 hours
                </span>
                <a href="mailto:info@acecompany.com">info@acecompany.com</a>
              </div>
            </div>
          </div>
        </div>
        <div class="post-testimonial">
          <div class="row">
            <div class="col-xs-4">
            </div>
            <div class="col-xs-8 widget-bl">
              <div class="contact-info">
                Ace Contractors <br>
                Group Pty. Ltd. <br> <br>
                
                Post Office Box # 16622 <br>
                Fort Worth, Texas 76126 
              </div>
            </div>
          </div>
        </div>
        <div class="post-testimonial">
          <div class="block-spread">
            <div class="img-shadow">
              <img src="http://ace.local/media/uploads/2014/15/thumbnail/sidebar-img.jpg" alt="">         
            </div>
            <h3 class="block-title">Lorem Ipsum</h3>
            <div class="block-content">
              <p>Lorem ipsum dolor sit amet, vix suscipit deserunt in, platonem prodesset at cum. Saperet mentitum tractatos ei ius, id dolore accumsan placerat est. Erant nostrud ut mei, </p>
            </div>
          </div>
        </div>
      </div>
    </div>
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
    var melbourne = new google.maps.LatLng(-38.007423,145.3838693);

    function initialize() {
      var mapOptions = {
        zoom: 10,
        center: melbourne
      };
      map = new google.maps.Map(document.getElementById('map-canvas'),
                                        mapOptions);

      // Insert this overlay map type as the first overlay map type at
      // position 0. Note that all overlay map types appear on top of
      // their parent base map.
      map.overlayMapTypes.insertAt(
          0, new CoordMapType(new google.maps.Size(256, 256)));
    }

    google.maps.event.addDomListener(window, 'load', initialize);
</script>


@stop