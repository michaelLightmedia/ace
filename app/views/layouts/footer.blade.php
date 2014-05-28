        <footer class="l-footer">
          

         <!--  <div class="widget-list widget-services">
            <h4>Services</h4>
            <ul class="list-inline list-inline-bordered">
              <li><a href="">Ace Civil Services</a></li>
              <li><a href="">Ace Eletrical Infrastracture</a></li>
              <li><a href="">Ace Environmental</a></li>
              <li><a href="">Ace Infrastracture</a></li>
              <li><a href="">Ace Landscape Services</a></li>
              <li><a href="">Ace Water Services</a></li>
            </ul>  
          </div>  -->

         <!--  <div class="widget-list widget-addr">
            <h4>Ace contractors</h4>
            <ul class="list-inline list-inline-bordered">
              <li class="addr">Office Address
                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit</p>
              </li>
              <li class="tel"><a href="tel:1200-367-274">Phone: <span>1200-367-274</span></a></li>
              <li class="email"><a href="mailto:inco@acecon.com.au">Email: <span>inco@acecon.com.au</span></a></li>
            </ul>  
          </div>  -->

             <div class="pull-left">
               <div class="widget-list">
                <!-- <h4>Menu</h4> -->

                {{ Site::site_nav_menu(array(
                  'level' => 0,
                  'menu'  => 'Footer Menu',
                  'menu_class' => 'list-inline list-inline-bordered'
                )) }} 
                
              </div> 
              <p class="copyright pull-left">Copyright 2013 - ACE Contractors - All rights reserved</p>
             </div>

             <div class="pull-right">
               <div class="list-inline pull-left list-brand">
                  <li><img src="{{ URL::asset('assets/site/i/logos/brand1.png') }}" alt=""></li>
                  <li><img src="{{ URL::asset('assets/site/i/logos/brand2.png') }}" alt=""></li>
                </div>
                <ul class="social social-inline social-md">
                  <li class="facebook"><a href="#" target="_BLANK"><span class="fa fa-facebook"></span></a></li>
                  <li class="twitter"><a href="#" target="_BLANK"><span class="fa fa-twitter"></span></a></li>
                  <li class="linkedin"><a href="#" target="_BLANK"><span class="fa fa-linkedin"></span></a></li>
                  <li class="rss"><a href="#" target="_BLANK"><span class="fa fa-rss"></span></a></li>
                </ul>
             </div>
        </footer>

     