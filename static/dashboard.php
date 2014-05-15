<?php include 'header-login2.php' ?>


<div class="page-heading">
  <div class="container">
    <h1>Dashboard</h1>
  </div>
</div>

<div class="container-fluid container-l2">
  <div class="t-sidebar">
    <div class="layout-l3 l3-2 ">
      <div class="form-group">
        <label for="#" class="label-control">TAX RETURN FORM</label>
        <select name="" id="" class="form-control select2">
          <option value="">2013</option>
          <option value="">2014</option>
        </select>
      </div>
      <div class="layout-circle">
        <span class="title">$500</span>
        <span class="label">Refund Estimate </span>
      </div>
      <span class="label label-success">In Progress</span>
    </div>
  </div>
  <div class="t-content">
    
    
    <div class="section mt-60px">
   
      <div class="form form-l2">
        <ul class="list-inline nav nav-tabs">
          <li class="active"><a href="#personal-details" data-toggle="tab"><i class="fa fa-user"></i> Personal Details</a></li>
          <li><a href="#address" data-toggle="tab"><i class="fa fa-user"></i> Address</a></li>
          <li><a href="#family-status" data-toggle="tab"><i class="fa fa-users"></i> Family Status</a></li>
          <li><a href="#family-status" data-toggle="tab"><i class="fa fa-users"></i> Medicare</a></li>
        </ul>
        
         <div class="form form-l2">
          <div class="tab-content">            
            <div class="tab-pane active" id="personal-details">

              <div class="section section-l8">
                <div class="section-heading">                  
                    <h3>Personal Details</h3>                     
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="#" class="label-control">First Name</label>
                      <input type="text" class="form-control">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="#" class="label-control">Last status</label>
                      <input type="text" class="form-control">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="#" class="label-control">Title</label>
                      <select name="#" id="" class="form-control select2"></select>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="#" class="label-control">TFN</label>
                      <input type="text" class="form-control">
                    </div>
                  </div>
           
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="#" class="label-control">Landline</label>
                      <input type="text" class="form-control">
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="#" class="label-control">Mobile</label>
                      <input type="text" class="form-control">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="#" class="label-control">DOB</label>
                      <input type="text" class="form-control">               
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="#" class="label-control">Are you an Australian?</label>

                      <div class="btn-group checkbox-group">
                        <div type="button" class="btn btn-default checkbox"><label><input type="checkbox"> Yes</label></div>
                        <div type="button" class="btn btn-default checkbox"><label><input type="checkbox"> No</label></div>
                      </div>               
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="#" class="label-control">Sex</label>
                      <div class="btn-group radio-group">
                        <div type="button" class="btn btn-default radio"><label><input type="radio"> Yes</label></div>
                        <div type="button" class="btn btn-default radio"><label><input type="radio"> No</label></div>
                      </div>   
                    </div>
                  </div>
                </div>
              </div>              
            </div>
            
            <div class="tab-pane" id="address">

              <div class="section section-l8">
                <div class="section-heading">                  
                    <h3>Postal Address</h3>
                </div>
                
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="#" class="label-control">Address 1</label>
                      <input type="text" class="form-control">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="#" class="label-control">Address 2</label>
                      <input type="text" class="form-control">
                    </div>
                  </div>
                </div>
                
                <div class="row">
                  <div class="col-md-2">
                    <div class="form-group">
                      <label for="#" class="label-control">Post Code</label>
                      <input type="text" class="form-control">
                    </div>
                  </div>
                  <div class="col-md-7">
                    <div class="form-group">
                      <label for="#" class="label-control">State</label>
                      <input type="text" class="form-control">
                    </div>
                  </div>

                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="#" class="label-control">State</label>
                      <select name="" id="" class="form-control select2"></select>
                    </div>
                  </div>
                </div>
                
              </div> 
              
            </div>
            

            <div class="tab-pane" id="family-status">

              <div class="section section-l8">
                <div class="section-heading">                  
                    <h3>Family Status</h3>
                </div>
                
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="#" class="label-control">If you had dependents, please enter number</label>
                      <input type="text" class="form-control">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="#" class="label-control">Did you have a spouse during the tax year?</label>

                      <div class="btn-group checkbox-group">
                        <div type="button" class="btn btn-default checkbox"><label><input type="checkbox"> Yes</label></div>
                        <div type="button" class="btn btn-default checkbox"><label><input type="checkbox"> No</label></div>
                      </div>               
                    </div>
                  </div>
                </div>
                </div>
                <div class="section section-l8">
                
                  <label for="#" class="label-control h4">If you had dependents, please enter number</label>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="#" class="label-control">From</label>
                        <input type="text" class="form-control">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="#" class="label-control">To</label>
                        <input type="text" class="form-control">            
                      </div>
                    </div>
                  </div>
                
              </div> 
                <div class="section section-l8">
                
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="#" class="label-control">Spouse's Income</label>
                        <input type="text" class="form-control">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="#" class="label-control">Spouse's Date of Birth</label>
                        <input type="text" class="form-control">            
                      </div>
                    </div>
                  </div>
                
              </div> 
                <div class="section section-l8">
                
                  <div class="form-group">
                    <label for="#" class="label-control mt-10px">If your Spouse is completing their form on GYTBO, do you want us to link their account to yours?</label>
                    <div class="btn-group checkbox-group pull-right">
                      <div type="button" class="btn btn-default checkbox"><label><input type="checkbox"> Yes</label></div>
                      <div type="button" class="btn btn-default checkbox"><label><input type="checkbox"> No</label></div>
            
                    </div>
                  </div>
                
              </div> 
              
            </div>
            


            
          </div>
        </div>

        <div class="form-group-actions">
          <button class="btn btn-lg btn-primary">SAVE and Go to Tax Form<span class="fa fa-check"></span></button>
          <button class="btn btn-lg btn-green">Submit and Close <span class=""></span></button>
        </div>
      </div>
    </div>
    
    
  </div>
</div>


<?php include 'footer.php' ?>