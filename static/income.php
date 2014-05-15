<?php include 'header-login.php' ?>

<div class="banner banner-process">
  <span class="itp-rocket"></span>
  <span class="itp-satellite"></span>
  
</div>

<div class="container-fluid container-l2">
  
  <div class="t-content">
    <div class="process-illustration process-2-active">
      <div class="process process-2">
        <div class="process-indicator">
          <span class="itp-spaceman"></span>
          <div class="process-indicator-msg">
            <p>Let's get Started :)</p>
          </div>
        </div>
        <a href="income.php">
          <span class="process-mark"><b class="icon icon-rocket"></b></span>
          Income
          <span class="fa fa-check"></span>
        </a>
      </div>   
      <div class="process process-3">
        <a href="deductions.php">
          <span class="process-mark"><b class="icon icon-rocket"></b></span>
          Deductions
          <span class="fa fa-check"></span>
        </a>
      </div>  
      <div class="process process-4">
        <a href="tax-offsets.php">
          <span class="process-mark"><b class="icon icon-rocket"></b></span>
          Tax Offsets
          <span class="fa fa-check"></span>
        </a>
      </div> 
      <div class="process process-5">
        <div class="process-indicator-finished">
          <span class="itp-moon"></span>
        </div>
        <a href="summary.php">
          <span class="process-mark"><b class="icon icon-rocket"></b></span>
          Summary
          <span class="fa fa-check"></span>
        </a>
      </div>  
    </div>
    <div class="section section-l7">

    <header class="heading heading-l2">
      <h1>Income</h1>
      <div class="alert alert-info">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        Please provide the following information as it appears in your PAYG income statement - Individual Non-Business
      </div>
    </header>

    <div class="form form-l2">
      <div class="section section-l8">
        <div class="section-heading">
          <h3>Salary</h3>
          <span class="fa fa-question-circle tooltip2" data-toggle="tooltip" data-placement="top" title="Lorem ipsum dolor sit amet, consectetur adipisicing elit."></span>
          <a href="#" class="btn btn-bordered btn-sm btn-rounded"><span class="fa fa-plus"></span> Add New</a>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="#" class="label-control">Payer's ABN</label>
              <input type="text" class="form-control">
            </div>
          </div>
          <div class="col-md-6">
           <div class="form-group">
              <label for="#" class="label-control">Payer's Name</label>
              <input type="text" class="form-control">
            </div>
          </div>
        </div>
       
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="#" class="label-control">Gross Salary  <span class="fa fa-question-circle tooltip2" data-toggle="tooltip" data-placement="top" title="Lorem ipsum dolor sit amet, consectetur adipisicing elit."></span></label>
              <input type="text" class="form-control">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="#" class="label-control">Tax Withheld</label>
              <input type="text" class="form-control">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="#" class="label-control">Reportable Fringe Benefits</label>
              <input type="text" class="form-control">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="#" class="label-control">Allowance Fringe Benefits</label>
              <input type="text" class="form-control">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="#" class="label-control">Allowance Amount</label>
              <input type="text" class="form-control">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="#" class="label-control">Lump Sum Ammount</label>
              <input type="text" class="form-control">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="#" class="label-control">Type</label>
              <select name="" id="" class="form-control select2"></select>
            </div>
          </div>
        </div>

      </div>
      
      <div class="section section-l8">
        <div class="section-heading">
          <h3>Bank Interest</h3>
          <span class="fa fa-question-circle tooltip2" data-toggle="tooltip" data-placement="top" title="Lorem ipsum dolor sit amet, consectetur adipisicing elit."></span>
          <a href="#" class="btn btn-bordered btn-sm btn-rounded"><span class="fa fa-plus"></span> Add New</a>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="#" class="label-control">Bank / Account No. <span class="fa fa-question-circle tooltip2" data-toggle="tooltip" data-placement="top" title="Lorem ipsum dolor sit amet, consectetur adipisicing elit."></span></label>
              <input type="text" class="form-control">
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
              <label for="#" class="label-control">Interest Amount</label>
              <input type="text" class="form-control">
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
              <label for="#" class="label-control">Tax Withheld</label>
              <input type="text" class="form-control">
            </div>
          </div>
        </div>
      </div>
      <div class="section section-l8">
        <div class="section-heading">
          <h3>Dividends</h3>
          <span class="fa fa-question-circle tooltip2" data-toggle="tooltip" data-placement="top" title="Lorem ipsum dolor sit amet, consectetur adipisicing elit."></span>
          <a href="#" class="btn btn-bordered btn-sm btn-rounded"><span class="fa fa-plus"></span> Add New</a>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <label for="#" class="label-control">Company</label>
              <input type="text" class="form-control">
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
              <label for="#" class="label-control">Amount</label>
              <input type="text" class="form-control">
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
              <label for="#" class="label-control">Amount</label>
              <input type="text" class="form-control">
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
              <label for="#" class="label-control">Amount</label>
              <input type="text" class="form-control">
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
              <label for="#" class="label-control">Amount</label>
              <input type="text" class="form-control">
            </div>
          </div>
        </div>
      </div>

      <div class="section section-l8">
        <div class="section-heading">
          <h3>Other Income</h3>
          <span class="fa fa-question-circle tooltip2" data-toggle="tooltip" data-placement="top" title="Lorem ipsum dolor sit amet, consectetur adipisicing elit."></span>
          <a href="#" class="btn btn-bordered btn-sm btn-rounded"><span class="fa fa-plus"></span> Add New</a>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="#" class="label-control">Type</label>
              <select name="" id="" class="form-control select2"></select>
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
              <label for="#" class="label-control">Amount</label>
              <input type="text" class="form-control">
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
              <label for="#" class="label-control">Tax</label>
              <input type="text" class="form-control">
            </div>
          </div>
        </div>
        <div class="row">

          <div class="col-md-12">
            <div class="form-group">
              <label for="#" class="label-control">Description</label>
              <input type="text" class="form-control">
            </div>
          </div>
        </div>
      </div>

    
        
        
        <div class="form-group-actions">
          <button class="btn btn-lg btn-primary">SAVE and New <span class="fa fa-arrow-right"></span></button>
          <button class="btn btn-lg btn-green">SAVE and Continue Income <span class="fa fa-arrow-right"></span></button>
        </div>
      </div>
    </div>

  </div>

  <div class="t-sidebar">
    <div class="layout-l3">
      <h1 class="layout-title">Tax Return Form 2013</h1>
      <div class="layout-circle">
        <span class="title">$500</span>
        <span class="label">Refund Estimate </span>
      </div>
      <span class="label label-progress">In Progress</span>
    </div>
    <div class="layout-l4">
    
        <header class="layout-heading">
        <h1 class="layout-title">Summary</h1>
        <a href="#" class="btn btn-bordered btn-sm btn-rounded"><span class="fa fa-plus"></span> Add New</a>
      </header>
      <div class="box-detail-listing">
        <div class="box-detail-item">        
          <div class="utility-actions">
            <li>
              <a href="#"><span class="fa fa-pencil"></span></a>
            </li>
            <li>
              <a href="#"><span class="fa fa-trash-o"></span></a>
            </li>          
          </div>
          <div class="detail-group">
            <label>Description</label>
            <span class="detail-value">Coles Myer</span>
          </div>
          <div class="detail-group">
            <label>Taxable Income</label>
            <span class="detail-value">$34.56</span>
          </div>
          <div class="detail-group">
            <label>Tax Witheld</label>
            <span class="detail-value">$28.25</span>
          </div>          
        </div>
        
        <div class="box-detail-item">        
          <div class="utility-actions">
            <li>
              <a href="#"><span class="fa fa-pencil"></span></a>
            </li>
            <li>
              <a href="#"><span class="fa fa-trash-o"></span></a>
            </li>          
          </div>
          <div class="detail-group">
            <label>Description</label>
            <span class="detail-value">Coles Myer</span>
          </div>
          <div class="detail-group">
            <label>Taxable Income</label>
            <span class="detail-value">$34.56</span>
          </div>
          <div class="detail-group">
            <label>Tax Witheld</label>
            <span class="detail-value">$28.25</span>
          </div>          
        </div>
        <div class="box-detail-item">        
          <div class="utility-actions">
            <li>
              <a href="#"><span class="fa fa-pencil"></span></a>
            </li>
            <li>
              <a href="#"><span class="fa fa-trash-o"></span></a>
            </li>          
          </div>
          <div class="detail-group">
            <label>Description</label>
            <span class="detail-value">Coles Myer</span>
          </div>
          <div class="detail-group">
            <label>Description</label>
            <span class="detail-value">Coles Myer</span>
          </div>
          <div class="detail-group">
            <label>Description</label>
            <span class="detail-value">Coles Myer</span>
          </div>          
        </div>
      </div>
    </div>
  </div>
</div>


<?php include 'footer.php' ?>