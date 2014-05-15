<?php include 'header-login.php' ?>

    <div class="banner banner-process">
        <span class="itp-rocket"></span>
        <span class="itp-satellite"></span>

    </div>

    <div class="container-fluid container-l2">
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
                        <label>Type</label>
                        <span class="detail-value">Car Expense (Registration)</span>
                    </div>
                    <div class="detail-group">
                        <label>Travel Expense</label>
                        <span class="detail-value">$34.56</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="t-content">
    <div class="process-illustration process-4-active">
        <div class="process process-2">
            <div class="process-indicator">
                <span class="itp-spaceman"></span>
                <div class="process-indicator-msg">
                    <p>Great!, your are 25% Done. :)</p>
                </div>
            </div>
            <a href="income.php">
                <span class="process-mark"><b class="icon icon-rocket"></b></span>
                Income
                <span class="fa fa-check"></span>
                <span class="itp-space-path itp-space-path-1"></span>
            </a>
        </div>
        <div class="process process-3">
            <div class="process-indicator">
                <span class="itp-spaceman"></span>
                <div class="process-indicator-msg">
                    <p>Great!, your are 55% Done. :)</p>
                </div>
            </div>

            <a href="deductions.php">
                <span class="process-mark"><b class="icon icon-rocket"></b></span>
                Deductions
                <span class="fa fa-check"></span>
                <span class="itp-space-path itp-space-path-1"></span>
            </a>
        </div>
        <div class="process process-4">

            <div class="process-indicator">
                <span class="itp-spaceman"></span>
                <div class="process-indicator-msg">
                    <p>Great!, almost Done. :)</p>
                </div>
            </div>
            <a href="tax-offsets.php">
                <span class="process-mark"><b class="icon icon-rocket"></b></span>
                Tax Offsets
                <span class="fa fa-check"></span>
                <span class="itp-space-path itp-space-path-1"></span>
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
    <header class="heading heading-l2 l2-2">
        <h1>Tax of Offsets and Other Items</h1>
    </header>

    <div class="form form-l2">
        <ul class="list-inline nav nav-tabs">
            <li class="active"><a href="#private-health-insurance" data-toggle="tab">Private Health Insurance</a></li>
            <li><a href="#help" data-toggle="tab">HECS/Help Debt</a></li>
            <li><a href="#zone-offsets" data-toggle="tab">Zone Offsets</a></li>
        </ul>

        <div class="form form-l2">
            <div class="tab-content">
                <div class="tab-pane active" id="private-health-insurance">
                    <div class="section section-l8">
                        <div class="section-heading">
                            <h3>Private Health Insurance</h3>
                            <!-- <span class="fa fa-question-circle tooltip2" data-toggle="tooltip" data-placement="top" title="Lorem ipsum dolor sit amet, consectetur adipisicing elit."></span>                   -->
                            <a href="#" class="btn btn-bordered btn-sm btn-rounded"><span class="fa fa-plus"></span> Add New</a>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="#" class="label-control">Health Fund Name</label>
                                    <select name="#" id="" class="form-control select2"></select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="#" class="label-control">Membership No.
                                        <span class="fa fa-question-circle tooltip2" data-toggle="tooltip" data-placement="top" title="Lorem ipsum dolor sit amet, consectetur adipisicing elit."></span>
                                    </label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="#" class="label-control">Benefits Code</label>
                                    <select name="#" id="" class="form-control select2"></select>
                                </div>
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="#" class="label-control">TYpe of Coverage</label>
                                    <select name="#" id="" class="form-control select2"></select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="#" class="label-control">Tax Claim Code</label>
                                    <select name="#" id="" class="form-control select2"></select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="#" class="label-control">Your Share of Australian Government Rebate</label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="#" class="label-control">Your Share of Premiums Paid</label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-pane" id="zone-offsets">

                    <div class="section section-l8">
                        <div class="section-heading">
                            <h3>HECS/Help Debt</h3>
                            <span class="fa fa-question-circle tooltip2" data-toggle="tooltip" data-placement="top" title="Lorem ipsum dolor sit amet, consectetur adipisicing elit."></span>
                            <a href="#" class="btn btn-bordered btn-sm btn-rounded"><span class="fa fa-plus"></span> Add New</a>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <label for="#" class="col-md-3 label-control mt-10px">&nbsp;</label>
                                <label for="#" class="col-md-4 label-control mt-10px">No. of Days</label>
                                <label for="#" class="col-md-4 label-control mt-10px">Amount</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <label for="#" class="col-md-3 label-control mt-10px">Zone</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control">
                                </div>
                                <div class="col-md-4">
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <label for="#" class="col-md-3 label-control mt-10px">Zone A</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control">
                                </div>
                                <div class="col-md-4">
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <label for="#" class="col-md-3 label-control mt-10px">Zone B</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control">
                                </div>
                                <div class="col-md-4">
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <label for="#" class="col-md-3 label-control mt-10px">Special Zone A (X)</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control">
                                </div>
                                <div class="col-md-4">
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <label for="#" class="col-md-3 label-control mt-10px">Special Zone B (Y)</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control">
                                </div>
                                <div class="col-md-4">
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <label for="#" class="col-md-3 label-control mt-10px">Overseas Defence Forces (Z)</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control">
                                </div>
                                <div class="col-md-4">
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                        </div>

                    </div>

                </div>


                <div class="tab-pane" id="help">

                    <div class="section section-l8">
                        <div class="section-heading">
                            <h3>HECS/Help Debt</h3>
                            <span class="fa fa-question-circle tooltip2" data-toggle="tooltip" data-placement="top" title="Lorem ipsum dolor sit amet, consectetur adipisicing elit."></span>
                            <a href="#" class="btn btn-bordered btn-sm btn-rounded"><span class="fa fa-plus"></span> Add New</a>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <label for="#" class="col-md-4 label-control mt-10px">Do you have HECS/Help Debt?</label>
                                <div class="col-md-3">
                                    <select name="#" id="" class="form-control select2"></select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <label for="#" class="col-md-4 label-control mt-10px">If you know the amount, please enter here: </label>
                                <div class="col-md-3">
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                        </div>

                    </div>

                </div>




            </div>
        </div>

        <div class="form-group-actions">
            <button class="btn btn-lg btn-primary">SAVE <span class="fa fa-check"></span></button>
            <button class="btn btn-lg btn-green">Cancel <span class=""></span></button>
        </div>
    </div>
    </div>


    </div>
    </div>


<?php include 'footer.php' ?>