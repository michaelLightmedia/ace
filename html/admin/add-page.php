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
                    <li class="sub-menu sub-menu--extended active">
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
                    <li>
                        <a href="#">
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
                        <i class="fa fa-bullhorn mr-5px"></i>
                        <span>Edit Page</span>
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
                            <a href="#" class="btn btn-default mr-5px">
                                <i class="fa fa-edit"></i>
                                <span>Save</span>
                            </a>
                            <a href="#" class="btn btn-default">
                                <i class="fa fa-trash-o"></i>
                                <span>Delete</span>
                            </a>
                        </div>
                        <div class="pull-right">
                            <div class="pull-left selectpicker-md">
                                <select class="selectpicker">
                                    <option>Published</option>
                                    <option>Unpublished</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="section section--offset">
                        <div class="row">
                            <div class="col-lg-9 col-md-8">
                                <div class="mb-15px">
                                    <input type="text" class="form-control form-control--2nd" placeholder="Page Title">
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
                                        <span class="panel__sub">FEATURED IMAGE</span>
                                        <div class="panel__image">
                                            <img src="../../assets/global/placeholders/uploaded-featured.jpg" alt="">
                                        </div>
                                        <a href="#" class="panel__image-remove">
                                            <small>Remove Image</small>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6 col-md-12">
                                <div class="panel">
                                    <div class="panel__heading">
                                        <h3 class="h4">Search Engine</h3>
                                    </div>
                                    <div class="panel__content">
                                        <div class="row stroke-bottom block--spread">
                                            <div class="col-lg-12">
                                                <label for="">Page Title</label>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-pretty">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row stroke-bottom block--spread">
                                            <div class="col-lg-12">
                                                <label for="">URL & Handle</label>
                                                <div class="form-group">
                                                    <div class="form-offset">
                                                        <div class="form-url">
                                                            http://www.gy.com/group-buy/
                                                        </div>
                                                        <div class="form-title">
                                                            <input type="text" class="form-control form-pretty" value="group buy">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row block--spread m-0px">
                                            <div class="col-lg-12">
                                                <label for="">Meta Description</label>
                                                <div class="form-group m-0px">
                                                    <textarea name="" id="" cols="30" rows="3" class="form-control form-pretty" placeholder="Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab, inventore, aliquam, numquam consequatur earum dolores enim at cumque impedit necessitatibus voluptate rem cupiditate. Commodi, reiciendis, similique exercitationem maxime quae libero!"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="panel">
                                    <header class="panel__heading">
                                        <h3 class="h4">Excerpt</h3>
                                    </header>
                                    <div class="panel__content">
                                        <textarea name="" id="" cols="30" rows="3" class="form-control form-pretty"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Main Footer -->
            
            <script src="../../assets/admin/js/plugins/select2.js"></script>
            <script src="../../assets/admin/js/admin.js"></script>
            <script src="../../assets/admin/js/plugins/jquery.scrollTo.min.js"></script>
            <script src="../../assets/admin/js/plugins/jquery.nicescroll.js"></script>
            <script src="../../assets/admin/js/plugins/wysihtml5-0.3.0.js"></script>
            <script src="../../assets/admin/js/plugins/bootstrap3-wysihtml5.js"></script>

            <script>
                $(window).load(function(){
                    gy.Global.init();
                    gy.Front.init();
                    gy.sideBarDrop.init();
                })
            </script>


        </div>
    </body>
</html>
