<div class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-right sidebar-nav"  id="cbp-spmenu-s2" />  
  <header class="sidebar-nav-heading clearfix">
    <a class="navbar-brand pull-left" href="{{ URL::to('/') }}">Sitetbo</a>
    <button id="closeRight" class="menu-trigger pull-right">&times;</button>
  </header>

  <ul class="sidebar-navbar">
    <li>
      {{ Form::open(array('url' => '/', 'method' => 'GET')) }}
      <div class="search search--mobile">
        <span class="fa fa-search"></span>
        <span class="fa fa-spinner fa-spin hide"></span>
        <input type="text" name="s" class="form-control js-search" placeholder="Search">
      </div>
      {{ Form::close() }}
    </li>
  </ul>

  {{ Site::gy_nav_menu(array(
    'level' => 0,
    'menu'  => 'Sidebar Navigation',
    'menu_class' => 'sidebar-navbar'
  )) }} 
  
  <ul class="sidebar-navbar">
    <li>
      <a href="#" class="visible-xs btn btn-orange">Login</a>
    </li>
    <li>
      <a href="#" class="visible-xs btn btn-orange">Signup</a>
    </li>
  </ul>

</div>