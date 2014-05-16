<div class="navbar navbar-skin-pretty " role="navigation">
  <div class="navbar-header">
    <a class="navbar-brand" href="/">ACE Contractor</a>

    <button type="button" class="navbar-toggle" data-toggle="offcanvas" data-recalc="false" data-target=".navbar-offcanvas" data-canvas=".canvas">
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>

  </div>
  <div class="navbar-utility">
    {{ Site::getWidget(array(
      'widget'  => 'Top Right Widget',
    )) }}
  </div>
  <div class="navbar-collapse " role="navigation">

    {{ Site::site_nav_menu(array(
              'level' => 0,
              'menu'  => 'Nav Menu',
              'menu_class' => 'nav navbar-nav navbar-bottom navbar-left navbar-offcanvas offcanvas navbar-main navmenu-fixed-left'
            )) }}    
  </div><!--/.nav-collapse -->
</div>



<?php // Gy::gy_nav_menu(array( 'level' => 0, 'menu'  => 'Nav Menu', 'menu_class' => 'nav navbar-nav' )) ?>