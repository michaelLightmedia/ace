<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="{{ URL::asset('assets/global/css/bootstrap.css') }}">
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ URL::asset('assets/admin/css/icons.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/admin/css/main.css') }}">

    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Oswald:700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="{{ URL::asset('assets/global/js/libs/TableHelper/TableHelper.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/global/js/libs/JvalidationEngine/css/validationEngine.jquery.css') }}">

    <!-- media page -->
    <!-- Generic page styles -->
    <link rel="stylesheet" href="{{ URL::to('assets/admin/js/plugins/jQuery-File-Upload-9.2.1/css/style.css') }}">
    <!-- blueimp Gallery styles -->
    <link rel="stylesheet" href="{{ URL::to('assets/admin/js/plugins/jQuery-File-Upload-9.2.1/css/blueimp-gallery.min.css') }}">
    <link rel="stylesheet" href="{{ URL::to('assets/admin/js/plugins/jQuery-File-Upload-9.2.1/css/jquery.fileupload.css') }}">
    <link rel="stylesheet" href="{{ URL::to('assets/admin/js/plugins/jQuery-File-Upload-9.2.1/css/jquery.fileupload-ui.css') }}">
    <!-- end media page -->
    <!-- tags input -->
    <link rel="stylesheet" href="{{ URL::asset('assets/global/js/libs/tagsinput/bootstrap-tagsinput.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/global/js/libs/tagsinput/app.css') }}">

    <!--[if IE]>
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/global/css/ie.css') }}" />
    <![endif]-->

    <noscript>
        <link rel="stylesheet" href="{{ URL::asset('assets/admin/css/nojs-custom.css') }}">
    </noscript>
    <!-- end tags input -->

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="/assets/global/js/vendor/jquery.1.9.min.js"><\/script>')</script>

    <script type="text/javascript" src="{{ URL::asset('assets/global/js/ext/modernizr-2.6.2-respond-1.1.0.min.js') }}"></script>
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
<body id="no-js"><script>document.body.id="js"</script>
        <div id="container">

            <!--[if lt IE 7]>
                <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
            <![endif]-->

            <noscript class="no-js-notification">
                <i class="fa fa-times"></i>
                <div class="no-js-message">
                    <div class="no-js-content">
                        Hi {{ Auth::user()->firstname }}, It is required to enable <strong>javascript</strong> to improve your experience. Some features might not work especially the table listing and pagination, ask a questions section, navigation, forms validation and the dashboard looks nicer.
                        <small>Click anywhere to view the dashboard.</small>
                    </div>
                    <a class="navbar-brand" href="#">Gytbo</a>

                </div>
            </noscript>

            <!-- Main Sidebar -->
            <aside class="t-sidebar">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">ACE</a>
                    <a href="{{ URL::to('/') }}" class="navbar-views">
                        <i class="fa fa-th"></i>
                    </a>
                </div>

                <nav class="navbar" role="navigation">
                    <ul class="nav">
                        <li>
                            <span class="separator">General</span>
                        </li>
                   
                        <li class="" data-mysegment="admin/dashboard">
                            <a href="{{ URL::to('admin/dashboard') }}" >
                                <i class="fa fa-eye"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                      

                         <!-- Check if current user has capability to manage manage_pages -->
     
                        <li class="sub-menu sub-menu--extended collapse " data-mysegment="admin/pages">
                            <a href="{{ URL::to('admin/pages') }}">
                                <i class="fa fa-copy"></i>
                                <span>Pages</span>
                            </a>
                            <ul class="sub">
                                <li data-mysegment="admin/pages">
                                    <a href="{{ URL::to('admin/pages') }}"><i class="fa fa-star"></i><span>All</span></a>
                                </li>
                                <li data-mysegment="admin/page">
                                    <a href="{{ URL::to('admin/page/create') }}">
                                        <i class="fa fa-plus"></i>
                                        <span>Add New</span>
                                    </a>
                                </li>
                                <li data-mysegment="admin/taxonomy/page-category">
                                    <a href="{{ URL::to('admin/taxonomy/page-category') }}"><i class="fa fa-tag"></i><span>Category</span></a>
                                </li>
                            </ul>
                        </li>
                    

                        <!-- Check if current user has capability to manage manage_blogs -->
                      
                        <li class="sub-menu sub-menu--extended collapse " data-mysegment="admin/blogs">
                            <a href="{{ URL::to('admin/blogs') }}">
                                <i class="fa fa-bullhorn"></i>
                                <span>Posts</span>
                            </a>
                            <ul class="sub" >
                                <li data-mysegment="admin/blogs">
                                    <a href="{{ URL::to('admin/blogs') }}"><i class="fa fa-star"></i><span>All</span></a>
                                </li>
                                <li data-mysegment="admin/blog">
                                    <a href="{{ URL::to('admin/blog/create') }}">
                                        <i class="fa fa-plus"></i>
                                        <span>Add New</span>
                                    </a>
                                </li>
                                <li data-mysegment="admin/taxonomy/blog-category">
                                    <a href="{{ URL::to('admin/taxonomy/blog-category') }}"><i class="fa fa-tag"></i><span>Category</span></a>
                                </li>
                            </ul>
                        </li>

                        <li class="sub-menu sub-menu--extended collapse " data-mysegment="admin/policies">
                            <a href="{{ URL::to('admin/policies') }}">
                                <i class="fa fa-bullhorn"></i>
                                <span>Policies</span>
                            </a>
                            <ul class="sub" >
                                <li data-mysegment="admin/policies">
                                    <a href="{{ URL::to('admin/policies') }}"><i class="fa fa-star"></i><span>All</span></a>
                                </li>
                                <li data-mysegment="admin/policy">
                                    <a href="{{ URL::to('admin/policy/create') }}">
                                        <i class="fa fa-plus"></i>
                                        <span>Add New</span>
                                    </a>
                                </li>
                                <li data-mysegment="admin/taxonomy/policy-category">
                                    <a href="{{ URL::to('admin/taxonomy/policy-category') }}"><i class="fa fa-tag"></i><span>Category</span></a>
                                </li>
                            </ul>
                        </li>
                       

                        <!-- Check if current user has capability to manage manage_blogs -->
                       
                        <li class="sub-menu sub-menu--extended collapse " data-mysegment="admin/projects">
                            <a href="{{ URL::to('admin/projects') }}">
                                <i class="fa fa-building"></i>
                                <span>Projects</span>
                            </a>
                            <ul class="sub" >
                                <li data-mysegment="admin/projects">
                                    <a href="{{ URL::to('admin/projects') }}"><i class="fa fa-star"></i><span>All</span></a>
                                </li>
                                <li data-mysegment="admin/project">
                                    <a href="{{ URL::to('admin/project/create') }}">
                                        <i class="fa fa-plus"></i>
                                        <span>Add New</span>
                                    </a>
                                </li>
                                <li data-mysegment="admin/taxonomy/project-category">
                                    <a href="{{ URL::to('admin/taxonomy/project-category') }}"><i class="fa fa-tag"></i><span>Category</span></a>
                                </li>
                            </ul>
                        </li>
                    


                         <!-- Check if current user has capability to manage manage_blogs -->
                       
                        <li class="sub-menu sub-menu--extended collapse " data-mysegment="admin/people">
                            <a href="{{ URL::to('admin/people') }}">
                                <i class="fa fa-users"></i>
                                <span>People</span>
                            </a>
                            <ul class="sub" >
                                <li data-mysegment="admin/people">
                                    <a href="{{ URL::to('admin/people') }}"><i class="fa fa-star"></i><span>All</span></a>
                                </li>
                                <li data-mysegment="admin/people">
                                    <a href="{{ URL::to('admin/people/create') }}">
                                        <i class="fa fa-plus"></i>
                                        <span>Add New</span>
                                    </a>
                                </li>
                                <li data-mysegment="admin/taxonomy/people-category">
                                    <a href="{{ URL::to('admin/taxonomy/people-category') }}"><i class="fa fa-tag"></i><span>Category</span></a>
                                </li>
                            </ul>
                        </li>


                        <!-- Check if current user has capability to manage manage_blogs -->
                       
                        <li class="sub-menu sub-menu--extended collapse " data-mysegment="admin/testimonial">
                            <a href="{{ URL::to('admin/testimonials') }}">
                                <i class="fa fa-bullhorn"></i>
                                <span>Testimonials</span>
                            </a>
                            <ul class="sub" >
                                <li data-mysegment="admin/testimonials">
                                    <a href="{{ URL::to('admin/testimonials') }}"><i class="fa fa-star"></i><span>All</span></a>
                                </li>
                                <li data-mysegment="admin/testimonial">
                                    <a href="{{ URL::to('admin/testimonial/create') }}">
                                        <i class="fa fa-plus"></i>
                                        <span>Add New</span>
                                    </a>
                                </li>
                                <li data-mysegment="admin/taxonomy/testimonial-category">
                                    <a href="{{ URL::to('admin/taxonomy/testimonial-category') }}"><i class="fa fa-tag"></i><span>Category</span></a>
                                </li>
                            </ul>
                        </li>
                      

                     
                        
                        <!-- Check if current user has capability to manage manage_blogs -->
                        
                        <li class="sub-menu sub-menu--extended collapse" data-mysegment="admin/banners">
                            <a href="{{ URL::to('admin/banners') }}">
                                <i class="fa fa-bullhorn"></i>
                                <span>Banners</span>
                            </a>
                            <ul class="sub">
                                <li data-mysegment="admin/banners">
                                    <a href="{{ URL::to('admin/banners') }}"><i class="fa fa-star"></i><span>All</span></a>
                                </li>
                                <li data-mysegment="admin/banner/create">
                                    <a href="{{ URL::to('admin/banner/create') }}">
                                        <i class="fa fa-plus"></i>
                                        <span>Add New</span>
                                    </a>
                                </li>
                                <li data-mysegment="admin/taxonomy/banner-category">
                                    <a href="{{ URL::to('admin/taxonomy/banner-category') }}"><i class="fa fa-tag"></i><span>Category</span></a>
                                </li>
                            </ul>
                        </li>
                      
                        
                        <li>
                            <span class="separator">Manage the Website</span>
                        </li>
                        
                        <!-- Check if current user has capability to manage manage_users -->
                       
                        <li class="sub-menu sub-menu--extended collapse" data-mysegment="admin/members">
                            <a href="{{ URL::to('admin/members') }}">
                                <i class="fa fa-user"></i>
                                <span>Users</span>
                            </a>
                            <ul class="sub">
                                <li data-mysegment="admin/members">
                                    <a href="{{ URL::to('admin/members') }}"><i class="fa fa-star"></i>All</a>
                                </li>
                                <li data-mysegment="admin/members/groups">
                                    <a href="{{ URL::to('admin/members/groups') }}"><i class="fa fa-tag"></i>Add User</a>
                                </li>
                            </ul>
                        </li>

                        <li class="sub-menu sub-menu--extended collapse" data-mysegment="admin/members">
                           <a href="{{ URL::to('admin/members/groups') }}">
                                <i class="fa fa-group"></i>
                                <span>Groups</span>
                            </a>
                            <ul class="sub">
                                <li data-mysegment="admin/members/groups">
                                    <a href="{{ URL::to('admin/members/groups') }}"><i class="fa fa-star"></i>All</a>
                                </li>
                                <li data-mysegment="admin/members/group/create">
                                    <a href="{{ URL::to('admin/members/group/create') }}"><i class="fa fa-tag"></i>Add User</a>
                                </li>
                            </ul>
                        </li>

                        
                      


                        <!-- Check if current user has capability to manage manage_blogs -->
                        <!--  @if( Auth::User()->group->hasRole('manage_blogs') )
                        <li class="@if(Request::segment(2) == 'comments'){{ 'active' }}@endif">
                            <a href="{{ URL::to('admin/comments') }}">
                                <i class="fa fa-comment-o"></i>
                                <span>Comments</span>
                            </a>
                        </li>
                        @endif -->

                        <!-- Check if current user has capability to manage manage_navigation -->
                       
                        <li class="sub-menu sub-menu--extended collapse" data-mysegment="admin/menu">
                            <a href="{{ URL::to('admin/menu') }}">
                                <i class="fa fa-link"></i>
                                <span>Navigation</span>
                            </a>
                            <ul class="sub">
                                <li data-mysegment="admin/menu/create">
                                    <a href="{{ URL::to('admin/menu/create') }}">
                                        <i class="fa fa-plus"></i>
                                        <span>Add New</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                       
                        <!-- Check if current user has capability to manage manage_navigation -->
                        
                        <li data-mysegment="admin/widget">
                            <a href="{{ URL::to('admin/widget') }}">
                                <i class="fa fa-cubes"></i>
                                <span>Widgets</span>
                            </a>
                        </li>
                        
                        <!-- Check if current user has capability to manage manage_media -->
                        
                        <li class="sub-menu sub-menu--extended collapse" data-mysegment="admin/media">
                            <a href="{{ URL::to('admin/media') }}">
                                <i class="fa fa-picture-o"></i>
                                <span>Media</span>
                            </a>

                            <ul class="sub">
                                <li  data-mysegment="admin/media">
                                    <a href="{{ URL::to('admin/media') }}"><i class="fa fa-star"></i><span>All</span></a>
                                </li>
                                <li data-mysegment="admin/media/create">
                                    <a href="{{ URL::to('admin/media/create') }}">
                                        <i class="fa fa-plus"></i>
                                        <span>Add New</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        
                        <!-- Check if current user has capability to manage manage_settings -->
                        

                        <li class="@if(Request::segment(2) == 'settings'){{ 'active' }}@endif">
                            <a href="{{ URL::to('admin/settings/general') }}">
                                <i class="fa fa-cog"></i>
                                <span>Settings</span>
                            </a>
                        </li>
                        
                    </ul>
                </nav>
            </aside>

        <div class="t-content">

            <header class="t-header">

                <div class="navbar navbar-default navbar-fixed-top">

                    @yield('section-top')
                    
                    <div class="navbar-collapse collapse">
                        <ul class="nav navbar-nav navbar-right">
                            <li class="dropdown active">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <span class="navbar-avatar-img">{{ HTML::image( UserHelper::avatar(false, '40x40') ) }}</span>
                                    Hi <span id="admin-user">{{ Auth::user()->firstname }}</span> <b class="caret"></b></a>
                                <ul class="dropdown-menu">

                                    @if( Auth::User()->group->hasRole('buy_product'))
                                      <li><a href="{{ URL::to('customer/profile') }}">Account</a></li>
                                    @else
                                        <li><a href="{{ URL::to('admin/profile') }}">{{ Lang::get('messages.profile') }}</a></li>
                                    @endif

                                    <li><a href="{{ get_logout_url() }}">{{ Lang::get('messages.logout') }}</a></li>
                                </ul>
                            </li>
                            <li class="nav-icons">
                                <a href="{{ URL::to('admin/settings/general') }}">
                                    <i class="fa fa-cog"></i>
                                </a>
                            </li>
                            <!--<li class="nav-icons dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-bell"></i>
                                </a>
                                <ul class="dropdown-menu extended notification">
                                    <div class="notify-arrow notify-arrow-blue"></div>
                                    <li>
                                        <p class="blue">You have 1 new notification</p>
                                    </li>
                                    <li>
                                        <a href="#">
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet, ab!
                                        </a>
                                    </li>
                                </ul>
                            </li>-->
                            <li>
                                <button type="button" class="navbar-toggle">
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                            </li>

                        </ul>
                    </div><!--/.nav-collapse -->
                </div>
            </header>

            @yield('content')
        </div>


    <div class="modal fade" id="defaultModal"  tabindex="-1" role="dialog" aria-labelledby="media" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title"></h4>
          </div>
          <div class="modal-body">
          </div>
          <div class="modal-footer">
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    @section('footer')
    <script type="text/javascript" src="{{ URL::asset('assets/global/js/ext/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('assets/global/js/TBList.j-query.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('assets/global/js/libs/TableHelper/TableHelper.js') }}"></script>

    <script type="text/javascript" src="{{ URL::asset('assets/global/js/libs/JvalidationEngine/js/languages/jquery.validationEngine-en.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('assets/global/js/libs/JvalidationEngine/js/jquery.validationEngine.js') }}"></script>

    <script type="text/javascript" src="{{ URL::asset('assets/global/js/libs/bootstrap-datetimepicker/js/moment.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('assets/global/js/libs/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('assets/global/js/libs/bootstrap-datetimepicker/js/bootstrap-datetimepicker.ru.js') }}"></script>

    <script type="text/javascript" src="{{ URL::asset('assets/global/js/libs/ckeditor/ckeditor.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('assets/global/js/libs/tagsinput/bootstrap-tagsinput.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('assets/global/js/libs/typeahead/typeahead.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('assets/global/js/libs/bootbox.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::to('assets/admin/js/plugins/select2.js') }}"></script>
    <script type="text/javascript" src="{{ URL::to('assets/admin/js/plugins/jquery.scrollTo.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::to('assets/admin/js/plugins/jquery.nicescroll.js') }}"></script>
    <!-- The jQuery UI widget factory, can be omitted if jQuery UI is already included -->
    <script src="{{ URL::to('assets/admin/js/plugins/jQuery-File-Upload-9.2.1/js/vendor/jquery.ui.widget.js') }}"></script>
    <!-- The Templates plugin is included to render the upload/download listings -->
    <script src="{{ URL::to('assets/admin/js/plugins/jQuery-File-Upload-9.2.1/js/tmpl.min.js') }}"></script>
    <!-- The Load Image plugin is included for the preview images and image resizing functionality -->

    <script src="{{ URL::to('assets/admin/js/plugins/jQuery-File-Upload-9.2.1/js/load-image.min.js') }}"></script>
    <!-- The Canvas to Blob plugin is included for image resizing functionality -->
    <script src="{{ URL::to('assets/admin/js/plugins/jQuery-File-Upload-9.2.1/js/canvas-to-blob.min.js') }}"></script>
    <!-- blueimp Gallery script -->
    <script src="{{ URL::to('assets/admin/js/plugins/jQuery-File-Upload-9.2.1/js/jquery.blueimp-gallery.min.js') }}"></script>
    <!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
    <script src="{{ URL::to('assets/admin/js/plugins/jQuery-File-Upload-9.2.1/js/jquery.iframe-transport.js') }}"></script>

    <!-- The basic File Upload plugin -->
    <script src="{{ URL::to('assets/admin/js/plugins/jQuery-File-Upload-9.2.1/js/jquery.fileupload.js') }}"></script>
    <!-- The File Upload processing plugin -->
    <script src="{{ URL::to('assets/admin/js/plugins/jQuery-File-Upload-9.2.1/js/jquery.fileupload-process.js') }}"></script>
    <!-- The File Upload image preview & resize plugin -->
    <script src="{{ URL::to('assets/admin/js/plugins/jQuery-File-Upload-9.2.1/js/jquery.fileupload-image.js') }}"></script>
    <!-- The File Upload audio preview plugin -->
    <script src="{{ URL::to('assets/admin/js/plugins/jQuery-File-Upload-9.2.1/js/jquery.fileupload-audio.js') }}"></script>
    <!-- The File Upload video preview plugin -->
    <script src="{{ URL::to('assets/admin/js/plugins/jQuery-File-Upload-9.2.1/js/jquery.fileupload-video.js') }}"></script>
    <!-- The File Upload validation plugin -->
    <script src="{{ URL::to('assets/admin/js/plugins/jQuery-File-Upload-9.2.1/js/jquery.fileupload-validate.js') }}"></script>
    <!-- The File Upload user interface plugin -->
    <script src="{{ URL::to('assets/admin/js/plugins/jQuery-File-Upload-9.2.1/js/jquery.fileupload-ui.js') }}"></script>
    <!-- The main application script -->
    <script type="text/javascript" src="{{ URL::asset('assets/global/js/csk_main.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('assets/admin/js/csk_admin.js') }}"></script>
    <script>
        $(window).load(function(){
            cskAdmin.init();
            cskMain.Global.init();
        });
        /*$(function(){

            var segments = <?php echo json_encode(the_segments()) ?>;
            var theSegment = "";
            for(var x in segments) {
                theSegment = segments[(segments.length - 1) - x];

                var $theSegment = $("[data-mysegment=\""+theSegment+"\"]");
                if ($theSegment.length) {
                    $theSegment.addClass('active');

                    $theSegment.closest('.sub-menu').addClass('active');

                    return false;
                }
            }
        });*/

    </script>
    @show

  </body>
</html>