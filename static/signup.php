<?php include 'header.php' ?>

<div class="banner">
  <div class="container">
      <div class="banner-heading">
        <h1 class="banner-title">Create Account</h1>
        <p class="banner-desc">Please fill up the form below and tell us a little more about you</p>
        <a href="#" class="btn btn-yellow" style="display: none;">Get Started!</a>
      </div>
      <div class="banner-form"> 
        <div class="form-icon"></div>
        <div class="form-group-vertical">
          <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="#" class="label-control">Email</label>
                  <input type="text" class="form-control">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="#" class="label-control">Password</label>
                  <input type="password" class="form-control">
                </div>
              </div>    
              <div class="col-md-6">
                <div class="form-group">
                  <label for="#" class="label-control">Confirm Password</label>
                  <input type="password" class="form-control">
                </div>       
              </div> 
              <div class="col-md-12">
                <div class="form-group">
                  <label for="#" class="label-control">Security Question</label>
                  <select type="text" class="form-control select2">
                    <option value="">What was the name of the street you first lived in?</option>  
                    <option value="">What is your pet's name?</option>
                  </select>
                </div>       
              </div>   
              <div class="col-md-12">
                <div class="form-group">
                  <label for="#" class="label-control">Answer</label>
                  <input type="text" class="form-control">
                </div>
              </div>       
        </div>           
          
          <div class="form-group form-group-action">
              <div class="clearfix">
                <div class="form-group-vertical">
                    <div class="checkbox pull-left">
                        <label><input type="checkbox"> Accept <a href="">Terms and Conditions</a></label>
                    </div>
                  </div>
              </div>
              <button class="btn btn-primary btn-lg btn-block">I want to start my Tax Return  </button>
          </div>

      </div>
      <div class="banner-box banner-box-media" style="display:none">
        <div class="banner-inner">
            <img src="placeholders/banner-video.jpg" alt="">
            <button class="banner-bgblack" data-toggle="modal" data-target="#videoModal">
                <span class="banner-play-btn"><span>play</span></span>
            </button>
        </div>
      </div>
  </div>
</div>
<div class="banner-pattern"></div>
</div>

<?php include 'footer.php' ?>