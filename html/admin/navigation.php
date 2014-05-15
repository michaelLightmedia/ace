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
                                <li><a href="groupbuy.php"><i class="fa fa-star"></i><span>All</span></a></li>
								<li><a href="#"><i class="fa fa-tag"></i><span>Category</span></a></li>
                            </ul>
                        </li>
                        <li class="sub-menu sub-menu--extended">
                            <a href="javascript:;">
                                <i class="fa fa-gift"></i>
                                <span>Promotions</span>
                                <span class="ml-5px arrow fa fa-angle-down"></span>
                            </a>
                            <ul class="sub">
                                <li><a href="promotions.php"><i class="fa fa-star"></i><span>All</span></a></li>
								<li><a href="#"><i class="fa fa-tag"></i><span>Category</span></a></li>
                            </ul>
                        </li>
                        <li class="sub-menu sub-menu--extended">
                            <a href="javascript:;">
                                <i class="fa fa-user-md"></i> 
                                <span>Service & Treatments</span>
                                <span class="ml-5px arrow fa fa-angle-down"></span>
                            </a>
                            <ul class="sub">
                                <li><a href="services-treatments.php"><i class="fa fa-star"></i><span>All</span></a></li>
                                <li><a href="#"><i class="fa fa-tag"></i><span>Category</span></a></li>
                            </ul>
                        </li>
                        <li class="sub-menu sub-menu--extended">
                            <a href="javascript:;">
                                <i class="fa fa-calendar-o"></i> 
                                <span>Events</span>
                                <span class="ml-5px arrow fa fa-angle-down"></span>
                            </a>
                            <ul class="sub">
                                <li><a href="events.php"><i class="fa fa-star"></i><span>All</span></a></li>
                                <li><a href="#"><i class="fa fa-tag"></i><span>Category</span></a></li>
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
                                <li><a href="page.php"><i class="fa fa-star"></i><span>All</span></a></li>
                                <li><a href="#"><i class="fa fa-tag"></i><span>Category</span></a></li>
                            </ul>
                        </li>
                        <li class="sub-menu sub-menu--extended">
                            <a href="javascript:;">
                                <i class="fa fa-bullhorn"></i> 
                                <span>Blog Posts</span>
                                <span class="ml-5px arrow fa fa-angle-down"></span>
                            </a>
                            <ul class="sub">
                                <li><a href="blog.php"><i class="fa fa-star"></i><span>All</span></a></li>
                                <li><a href="#"><i class="fa fa-tag"></i><span>Category</span></a></li>
                            </ul>
                        </li>
                        <li class="sub-menu sub-menu--extended active open">
                            <a href="javascript:;">
                                <i class="fa fa-link"></i>
                                <span>Navigation</span>
                                <span class="ml-5px arrow fa fa-angle-down open"></span>
                            </a>
                            <ul class="sub" style="display: block;">
                                <li><a href="navigation.php"><i class="fa fa-star"></i><span>All</span></a></li>
                                <li><a href="#"><i class="fa fa-clipboard"></i><span>Add New</span></a></li>
                            </ul>
                        </li>
                        <li>
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
                <div class="pull-left mr-15px">
                    <h1 class="h3 section__title">
                        <i class="fa fa-link mr-5px"></i>
                        <span>Navigations</span>
                    </h1>
                </div>
            </div>

            <div class="t-content">
                <div class="section">
                    <div class="row">
                        <form method="GET" action="" accept-charset="UTF-8">
                            <div class="panel__heading panel__heading--asd">
                                <div class="col-lg-5 col-sm-6">
                                    <div class="col-lg-5 col-sm-6">
                                        <div class="selectpicker-full p-7px">
                                            <div class="select2-container selectpicker" id="s2id_autogen1"><a href="javascript:void(0)" onclick="return false;" class="select2-choice" tabindex="-1">   <span class="select2-chosen">Main Menu</span><abbr class="select2-search-choice-close"></abbr>   <span class="select2-arrow"><i class="fa fa-sort-down"></i></span></a><input class="select2-focusser select2-offscreen" type="text" id="s2id_autogen2"><div class="select2-drop select2-display-none">   <div class="select2-search select2-search-hidden select2-offscreen">       <input type="text" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" class="select2-input">   </div>   <ul class="select2-results">   </ul></div></div><select class="selectpicker select2-offscreen" name="menu" tabindex="-1"><option value="23" selected="selected">Main Menu</option></select>                        </div>
                                    </div>
                                    <div class="col-lg-7 col-md-6">
                                        <div class="pull-right">
                                            <ul class="list-inline list-pretty--2nd">
                                                <li>
                                                    <button type="submit" class="btn btn-default"><i class="fa fa-edit mr-5px"></i><span>Select</span></button>                                </li>
                                                <li>
                                                    <a href="http://gy.local/admin/menu?menu=0">
                                                        <i class="fa fa-plus-circle mr-5px"></i>
                                                        <span>Create new menu</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>        
                    </div>
                </div>
            </div>

            <!-- Main Footer -->
            
            <script src="../../assets/admin/js/plugins/select2.js"></script>            
            <script src="../../assets/admin/js/admin.js"></script>
            <script src="../../assets/admin/js/plugins/jquery.scrollTo.min.js"></script>
            <script src="../../assets/admin/js/plugins/jquery.nicescroll.js"></script>
            <script src="../../assets/admin/js/plugins/bootstrap3-wysihtml5.js"></script>
            <script src="../../assets/admin/js/plugins/jquery.nestable.js"></script>

            <script>

$(document).ready(function()
{

    var updateOutput = function(e)
    {
        var list   = e.length ? e : $(e.target),
            output = list.data('output');
        if (window.JSON) {
            output.val(window.JSON.stringify(list.nestable('serialize')));//, null, 2));
        } else {
            output.val('JSON browser support required for this demo.');
        }
    };

    // activate Nestable for list 1
    $('#nestable').nestable({
        group: 1
    })
    .on('change', updateOutput);
    
    // activate Nestable for list 2
    $('#nestable2').nestable({
        group: 1
    })
    .on('change', updateOutput);

    // output initial serialised data
    updateOutput($('#nestable').data('output', $('#nestable-output')));
    updateOutput($('#nestable2').data('output', $('#nestable2-output')));

    $('#nestable-menu').on('click', function(e)
    {
        var target = $(e.target),
            action = target.data('action');
        if (action === 'expand-all') {
            $('.dd').nestable('expandAll');
        }
        if (action === 'collapse-all') {
            $('.dd').nestable('collapseAll');
        }
    });

    $('#nestable3').nestable();

});
</script>

            <script>
                $(window).load(function(){
                    gy.Global.init();
                    gy.Front.init();
                    gy.sideBarDrop.init();
                    gy.jsMenuItem.init();
                })
            </script>

        </div>
    </body>
</html>
