<!-- Includes all libs -->
<?php include 'layouts/header.php'; ?>

        <!-- Main Sidebar -->
        <aside class="t-sidebar">       
            <nav class="navbar" role="navigation">
                <ul class="nav">
                    <li>
                        <span class="separator">General</span>
                    </li>
                    <li>
                        <a href="index.php">
                            <i class="fa fa-eye"></i> 
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="orders.php">
                            <i class="fa fa-shopping-cart"></i> 
                            <span>Orders</span>
                        </a>
                    </li>
                    <li class="sub-menu sub-menu--extended">
                        <a href="javascript:;">
                            <i class="fa fa-clock-o"></i>
                            <span>Group Buy</span>
                            <span class="ml-5px arrow fa fa-angle-down"></span>
                        </a>
                        <ul class="sub">
                            <li><a href="groupbuy.php">All</a></li>
                            <li><a href="#">Category</a></li>
                        </ul>
                    </li>
                    <li class="sub-menu sub-menu--extended">
                        <a href="javascript:;">
                            <i class="fa fa-gift"></i>
                            <span>Promotions</span>
                            <span class="ml-5px arrow fa fa-angle-down"></span>
                        </a>
                        <ul class="sub">
                            <li><a href="promotions.php">All</a></li>
                            <li><a href="#">Category</a></li>
                        </ul>
                    </li>
                    <li class="sub-menu sub-menu--extended">
                        <a href="javascript:;">
                            <i class="fa fa-user-md"></i> 
                            <span>Service & Treatments</span>
                            <span class="ml-5px arrow fa fa-angle-down"></span>
                        </a>
                        <ul class="sub">
                            <li><a href="services-treatments.php">All</a></li>
                            <li><a href="#">Category</a></li>
                        </ul>
                    </li>
                    <li class="sub-menu sub-menu--extended">
                        <a href="javascript:;">
                            <i class="fa fa-calendar-o"></i> 
                            <span>Events</span>
                            <span class="ml-5px arrow fa fa-angle-down"></span>
                        </a>
                        <ul class="sub">
                            <li><a href="events.php">All</a></li>
                            <li><a href="#">Category</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa fa-bar-chart-o"></i> 
                            <span>Reporting</span>
                        </a>
                    </li>
                    <li>
                        <span class="separator">Members & Interactions</span>
                    </li>
                    <li>
                        <a href="members.php">
                            <i class="fa fa-group"></i> 
                            <span>Members</span>
                        </a>
                    </li>
                    <li>
                        <a href="expert-corner.php">
                            <i class="fa fa-question-circle"></i> 
                            <span>Ask a Questions</span>
                        </a>
                    </li>
                    <li>
                        <span class="separator">Manage the Website</span>
                    </li>
                    <li class="sub-menu sub-menu--extended">
                        <a href="javascript:;">
                            <i class="fa fa-copy"></i> 
                            <span>Pages</span>
                            <span class="ml-5px arrow fa fa-angle-down"></span>
                        </a>
                        <ul class="sub">
                            <li><a href="page.php">All</a></li>
                            <li><a href="#">Category</a></li>
                        </ul>
                    </li>
                    <li class="sub-menu sub-menu--extended">
                        <a href="javascript:;">
                            <i class="fa fa-bullhorn"></i> 
                            <span>Blog Posts</span>
                            <span class="ml-5px arrow fa fa-angle-down"></span>
                        </a>
                        <ul class="sub">
                            <li><a href="blog.php">All</a></li>
                            <li><a href="#">Category</a></li>
                        </ul>
                    </li>
                    <li class="sub-menu sub-menu--extended">
                        <a href="javascript:;">
                            <i class="fa fa-link"></i>
                            <span>Navigation</span>
                            <span class="ml-5px arrow fa fa-angle-down"></span>
                        </a>
                        <ul class="sub">
                            <li><a href="navigation.php">Library</a></li>
                            <li><a href="#">Add New</a></li>
                        </ul>
                    </li>
                    <li class="active">
                        <a href="media.php">
                            <i class="fa fa-picture-o"></i>
                            <span>Media</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </aside>
        <!-- // Main Sidebar -->

        <!-- Main Content -->

        <div class="section section--top">
                <div class="pull-left">
                    <h1 class="h3 section__title">
                        <i class="fa fa-clock-o mr-5px"></i>
                        <span>Edit Media</span>
                    </h1>
                </div>
            </div>

            <div class="t-content">
                <form action="">
                    <div class="section section--offset-bottom">
                        <div class="alert alert-omega alert-small alert-success fade in">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <i class="fa fa-check mr-5px"></i>
                            Successfully saved!
                        </div>
                    </div>
                    <div class="section">
                        <div class="pull-left">
                            <a href="#" class="btn btn-default">
                                <i class="fa fa-edit"></i>
                                <span>Update</span>
                            </a>
                        </div>
                    </div>
                    <div class="section section--offset">
                        <div class="row">
                            <div class="col-lg-9 col-md-8">
                                <div class="mb-15px">
                                    <input type="text" class="form-control form-control--2nd" placeholder="1-120111024081832">
                                </div>
                                <div class="panel">
                                    <textarea class="wysiwyg-textarea form-control" placeholder="Enter text ..." style="width: 100%; height: 300px"></textarea>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-4">
                                <div class="panel">
                                    <header class="panel__heading">
                                        <h3 class="h4">Media</h3>
                                    </header>
                                    <div class="panel__content">
                                        <div class="panel__image">
                                            <img src="../../assets/global/placeholders/uploaded-featured.jpg" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            
                            <!-- / Loyalty Points -->
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="panel">
                                            <div class="panel__heading">
                                                <h3 class="h4">Description</h3>
                                            </div>
                                            <div class="panel__content">
                                                <div class="row stroke-bottom block--spread">
                                                    <div class="col-lg-12">
                                                        <label for="">Caption</label>
                                                        <div class="form-group">
                                                            <input type="text" class="form-control form-pretty">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row stroke-bottom block--spread">
                                                    <div class="col-lg-12">
                                                        <label for="">Alternative Text</label>
                                                        <div class="form-group">
                                                            <input type="text" class="form-control form-pretty">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>


            <!-- Modal -->
            <div class="modal modal--full fade" id="ImageRemovedModal" tabindex="-1" role="dialog" aria-labelledby="media" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="row">
                            <div class="col-lg-2 media-nav">
                                <ul id="mediaMenu" class="nav nav-tabs nav-tabs--block">
                                    <li class="active"><a href="#upload-media" data-toggle="tab">Upload Media</a></li>
                                    <li class=""><a href="#insert-url" data-toggle="tab">Insert from Url</a></li>
                                </ul>
                            </div>
                            <div id="mediaAttachmentTab" class="col-lg-10 media-tab tab-content">
                                <div class="tab-pane tab-pane--stroke fade active in" id="upload-media">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        <h4 class="modal-title" id="media">Insert Media</h4>
                                    </div>
                                    <div class="modal-body modal-body--2nd">
                                        <div class="row">
                                            <div class="col-lg-8 col-md-8 col-sm-12 media-listings">
                                                <div class="block--white">
                                                    <div class="pull-right search">
                                                        <div class="form-inline form-rounded" role="form">
                                                            <div class="form-group">
                                                                <i class="fa fa-search"></i>
                                                                <input type="text" aria-controls="" class="form-control" id="exampleInputEmail2" placeholder="Search">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <ul class="media-attachments">
                                                    <li class="media__attachment is-active">
                                                        <div class="media__preview">
                                                            <div class="media__thumbnail">
                                                                <img src="../../assets/global/placeholders/asasd.jpg" alt="" >
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="media__attachment">
                                                        <div class="media__preview">
                                                            <div class="media__thumbnail">
                                                                <img src="../../assets/global/placeholders/uploaded-featured.jpg" alt="" >
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="media__attachment">
                                                        <div class="media__preview">
                                                            <div class="media__thumbnail">
                                                                <img src="../../assets/global/placeholders/uploaded-featured.jpg" alt="" >
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="media__attachment">
                                                        <div class="media__preview">
                                                            <div class="media__thumbnail">
                                                                <img src="../../assets/global/placeholders/uploaded-featured.jpg" alt="" >
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="media__attachment">
                                                        <div class="media__preview">
                                                            <div class="media__thumbnail">
                                                                <img src="../../assets/global/placeholders/uploaded-featured.jpg" alt="" >
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="media__attachment">
                                                        <div class="media__preview">
                                                            <div class="media__thumbnail">
                                                                <img src="../../assets/global/placeholders/uploaded-featured.jpg" alt="" >
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="media__attachment">
                                                        <div class="media__preview">
                                                            <div class="media__thumbnail">
                                                                <img src="../../assets/global/placeholders/uploaded-featured.jpg" alt="" >
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="media__attachment">
                                                        <div class="media__preview">
                                                            <div class="media__thumbnail">
                                                                <img src="../../assets/global/placeholders/uploaded-featured.jpg" alt="" >
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="media__attachment">
                                                        <div class="media__preview">
                                                            <div class="media__thumbnail">
                                                                <img src="../../assets/global/placeholders/uploaded-featured.jpg" alt="" >
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="media__attachment">
                                                        <div class="media__preview">
                                                            <div class="media__thumbnail">
                                                                <img src="../../assets/global/placeholders/uploaded-featured.jpg" alt="" >
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="media__attachment">
                                                        <div class="media__preview">
                                                            <div class="media__thumbnail">
                                                                <img src="../../assets/global/placeholders/uploaded-featured.jpg" alt="" >
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="media__attachment">
                                                        <div class="media__preview">
                                                            <div class="media__thumbnail">
                                                                <img src="../../assets/global/placeholders/uploaded-featured.jpg" alt="" >
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="media__attachment">
                                                        <div class="media__preview">
                                                            <div class="media__thumbnail">
                                                                <img src="../../assets/global/placeholders/uploaded-featured.jpg" alt="" >
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="media__attachment">
                                                        <div class="media__preview">
                                                            <div class="media__thumbnail">
                                                                <img src="../../assets/global/placeholders/uploaded-featured.jpg" alt="" >
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="media__attachment">
                                                        <div class="media__preview">
                                                            <div class="media__thumbnail">
                                                                <img src="../../assets/global/placeholders/uploaded-featured.jpg" alt="" >
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="media__attachment">
                                                        <div class="media__preview">
                                                            <div class="media__thumbnail">
                                                                <img src="../../assets/global/placeholders/uploaded-featured.jpg" alt="" >
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="media__attachment">
                                                        <div class="media__preview">
                                                            <div class="media__thumbnail">
                                                                <img src="../../assets/global/placeholders/uploaded-featured.jpg" alt="" >
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="media__attachment">
                                                        <div class="media__preview">
                                                            <div class="media__thumbnail">
                                                                <img src="../../assets/global/placeholders/uploaded-featured.jpg" alt="" >
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="media__attachment">
                                                        <div class="media__preview">
                                                            <div class="media__thumbnail">
                                                                <img src="../../assets/global/placeholders/uploaded-featured.jpg" alt="" >
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="media__attachment">
                                                        <div class="media__preview">
                                                            <div class="media__thumbnail">
                                                                <img src="../../assets/global/placeholders/uploaded-featured.jpg" alt="" >
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="media__attachment">
                                                        <div class="media__preview">
                                                            <div class="media__thumbnail">
                                                                <img src="../../assets/global/placeholders/uploaded-featured.jpg" alt="" >
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="media__attachment">
                                                        <div class="media__preview">
                                                            <div class="media__thumbnail">
                                                                <img src="../../assets/global/placeholders/uploaded-featured.jpg" alt="" >
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="media__attachment">
                                                        <div class="media__preview">
                                                            <div class="media__thumbnail">
                                                                <img src="../../assets/global/placeholders/uploaded-featured.jpg" alt="" >
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="media__attachment">
                                                        <div class="media__preview">
                                                            <div class="media__thumbnail">
                                                                <img src="../../assets/global/placeholders/uploaded-featured.jpg" alt="" >
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="media__attachment">
                                                        <div class="media__preview">
                                                            <div class="media__thumbnail">
                                                                <img src="../../assets/global/placeholders/uploaded-featured.jpg" alt="" >
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="media__attachment">
                                                        <div class="media__preview">
                                                            <div class="media__thumbnail">
                                                                <img src="../../assets/global/placeholders/uploaded-featured.jpg" alt="" >
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="media__attachment">
                                                        <div class="media__preview">
                                                            <div class="media__thumbnail">
                                                                <img src="../../assets/global/placeholders/uploaded-featured.jpg" alt="" >
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="media__attachment">
                                                        <div class="media__preview">
                                                            <div class="media__thumbnail">
                                                                <img src="../../assets/global/placeholders/uploaded-featured.jpg" alt="" >
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="media__attachment">
                                                        <div class="media__preview">
                                                            <div class="media__thumbnail">
                                                                <img src="../../assets/global/placeholders/uploaded-featured.jpg" alt="" >
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="media__attachment">
                                                        <div class="media__preview">
                                                            <div class="media__thumbnail">
                                                                <img src="../../assets/global/placeholders/uploaded-featured.jpg" alt="" >
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="media__attachment">
                                                        <div class="media__preview">
                                                            <div class="media__thumbnail">
                                                                <img src="../../assets/global/placeholders/uploaded-featured.jpg" alt="" >
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="media__attachment">
                                                        <div class="media__preview">
                                                            <div class="media__thumbnail">
                                                                <img src="../../assets/global/placeholders/uploaded-featured.jpg" alt="" >
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="media__attachment">
                                                        <div class="media__preview">
                                                            <div class="media__thumbnail">
                                                                <img src="../../assets/global/placeholders/uploaded-featured.jpg" alt="" >
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="media__attachment">
                                                        <div class="media__preview">
                                                            <div class="media__thumbnail">
                                                                <img src="../../assets/global/placeholders/uploaded-featured.jpg" alt="" >
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="media__attachment">
                                                        <div class="media__preview">
                                                            <div class="media__thumbnail">
                                                                <img src="../../assets/global/placeholders/uploaded-featured.jpg" alt="" >
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="media__attachment">
                                                        <div class="media__preview">
                                                            <div class="media__thumbnail">
                                                                <img src="../../assets/global/placeholders/uploaded-featured.jpg" alt="" >
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="media__attachment">
                                                        <div class="media__preview">
                                                            <div class="media__thumbnail">
                                                                <img src="../../assets/global/placeholders/uploaded-featured.jpg" alt="" >
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="media__attachment">
                                                        <div class="media__preview">
                                                            <div class="media__thumbnail">
                                                                <img src="../../assets/global/placeholders/uploaded-featured.jpg" alt="" >
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="media__attachment">
                                                        <div class="media__preview">
                                                            <div class="media__thumbnail">
                                                                <img src="../../assets/global/placeholders/uploaded-featured.jpg" alt="" >
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="media__attachment">
                                                        <div class="media__preview">
                                                            <div class="media__thumbnail">
                                                                <img src="../../assets/global/placeholders/uploaded-featured.jpg" alt="" >
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="media__attachment">
                                                        <div class="media__preview">
                                                            <div class="media__thumbnail">
                                                                <img src="../../assets/global/placeholders/uploaded-featured.jpg" alt="" >
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="media__attachment">
                                                        <div class="media__preview">
                                                            <div class="media__thumbnail">
                                                                <img src="../../assets/global/placeholders/uploaded-featured.jpg" alt="" >
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="media__attachment">
                                                        <div class="media__preview">
                                                            <div class="media__thumbnail">
                                                                <img src="../../assets/global/placeholders/uploaded-featured.jpg" alt="" >
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="media__attachment">
                                                        <div class="media__preview">
                                                            <div class="media__thumbnail">
                                                                <img src="../../assets/global/placeholders/uploaded-featured.jpg" alt="" >
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="media__attachment">
                                                        <div class="media__preview">
                                                            <div class="media__thumbnail">
                                                                <img src="../../assets/global/placeholders/uploaded-featured.jpg" alt="" >
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="media__attachment">
                                                        <div class="media__preview">
                                                            <div class="media__thumbnail">
                                                                <img src="../../assets/global/placeholders/uploaded-featured.jpg" alt="" >
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="media__attachment">
                                                        <div class="media__preview">
                                                            <div class="media__thumbnail">
                                                                <img src="../../assets/global/placeholders/uploaded-featured.jpg" alt="" >
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="media__attachment">
                                                        <div class="media__preview">
                                                            <div class="media__thumbnail">
                                                                <img src="../../assets/global/placeholders/uploaded-featured.jpg" alt="" >
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="media__attachment">
                                                        <div class="media__preview">
                                                            <div class="media__thumbnail">
                                                                <img src="../../assets/global/placeholders/uploaded-featured.jpg" alt="" >
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="media__attachment">
                                                        <div class="media__preview">
                                                            <div class="media__thumbnail">
                                                                <img src="../../assets/global/placeholders/uploaded-featured.jpg" alt="" >
                                                            </div>
                                                        </div>
                                                    </li>

                                                </ul>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-12 media-attachment-details">
                                                <div class="pull-left">
                                                    <div class="media-attachment__info">
                                                        <img src="../../assets/global/placeholders/uploaded-featured.jpg" alt="" class="media__thumbnail">
                                                    </div>
                                                </div>
                                                <div class="pull-left">
                                                    <div class="formatted formatted--xlite">
                                                        <h3 class="h4 media-attachment__title">Image Title Here</h3>
                                                        <span class="media-attachment__size mb-20px">333 x 304</span>
                                                        <div class="media-attachment__action mb-30px">
                                                            <a href="#" class="btn btn-default">
                                                                <i class="fa fa-trash-o mr-5px"></i>
                                                                <span>Delete</span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mt-30px mb-15px form-horizontal form-horizontal--2nd" role="form">
                                                    <div class="form-group">
                                                        <div class="col-lg-4 col-md-5 col-sm-5"></div>
                                                        <div class="col-lg-8 col-md-7 col-sm-7">
                                                            <small>Details</small>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="" class="col-lg-4 col-md-5 col-sm-5 control-label fs-13px">Title</label>
                                                        <div class="col-lg-8 col-md-7 col-sm-7">
                                                            <input type="text" class="form-control" id="" placeholder="">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="" class="col-lg-4 col-md-5 col-sm-5 control-label fs-13px">Alt Text</label>
                                                        <div class="col-lg-8 col-md-7 col-sm-7">
                                                            <input type="text" class="form-control" id="" placeholder="">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-lg-4 col-md-5 col-sm-5"></div>
                                                        <div class="col-lg-8 col-md-7 col-sm-7">
                                                            <span>DISPLAY SETTINGS</span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="" class="col-lg-4 col-md-5 col-sm-5 control-label fs-13px">Alignment</label>
                                                        <div class="col-lg-8 col-md-7 col-sm-7">
                                                            <div class="selectpicker-md">
                                                                <select name="" id="" class="selectpicker">
                                                                    <option value="">None</option>
                                                                    <option value="">Left</option>
                                                                    <option value="">Right</option>
                                                                    <option value="">Center</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="" class="col-lg-4 col-md-5 col-sm-5 control-label fs-13px">Width</label>
                                                        <div class="col-lg-8 col-md-7 col-sm-7">
                                                            <input type="text" class="form-control" id="" placeholder="">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="" class="col-lg-4 col-md-5 col-sm-5 control-label fs-13px">Height</label>
                                                        <div class="col-lg-8 col-md-7 col-sm-7">
                                                            <input type="text" class="form-control" id="" placeholder="">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-lg-4 col-md-5 col-sm-5"></div>
                                                        <div class="col-lg-8 col-md-7 col-sm-7 btn-lg">
                                                            <button type="button" class="btn btn-primary btn-teal">Attach Media</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- / Tab -->
                                <div id="insert-url" class="tab-pane tab-pane--stroke fade">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        <h4 class="modal-title" id="media">Insert from Url</h4>
                                        <input type="text" class="form-control embed-url" value="http://">
                                    </div>
                                    <div class="modal-body embed-settings">
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Title</label>
                                                    <input type="email" class="form-control" id="" placeholder="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- /.End Insert Url -->
                            </div> <!-- / End Tab -->
                        </div><!-- / Row -->
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->

            <!-- Main Footer -->
            
            <script src="../../assets/admin/js/plugins/select2.js"></script>
            <script src="../../assets/admin/js/plugins/jquery.nicescroll.js"></script>
            <script src="../../assets/admin/js/plugins/wysihtml5-0.3.0.js"></script>
            <script src="../../assets/admin/js/plugins/bootstrap3-wysihtml5.js"></script>
            <script src="../../assets/global/js/libs/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
            <script src="../../assets/admin/js/admin.js"></script>

            <script>
                $(window).load(function(){
                    gy.Global.init();
                    gy.Front.init();
                    gy.DatePicker.init();
                    gy.sideBarDrop.init();
                    gy.customDropdownCheckbox.init();
                })
            </script>


        </div>
    </body>
</html>
