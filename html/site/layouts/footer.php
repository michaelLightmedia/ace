	<footer class="footer">
		<div class="container">

		<div class="pull-left">			
			<ul class="list-inline list-inline-separator">
				<li>&copy; ClearSK™</li>
				<li>Hotline: (65) 6100 6868</li>
				<li>
					<a href="">Email Us</a>
				</li>		
				<li>
					<a href="">Privacy Policy</a>
				</li>		
				<li>
					<a href="">Disclaimer</a>
				</li>					
			</ul>					
		</div>

		<div class="pull-right">
			<a class="navbar-brand navbar-brand" href="#">ClearSK</a>
		</div>
		</div>
	</footer>

	
	<?php include 'layouts/login-lightbox.php'; ?>


	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.js"></script>
	<script>window.jQuery || document.write('<script src="../assets/global/js/libs/jquery-1.10.1.js"><\/script>')</script>

	<!-- local modernizr file
	<script src="../assets/global/js/ext/modernizr-2.6.2-respond-1.1.0.min.js"></script>
	-->
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>

	<script src="../../assets/global/js/libs/niceScroll/jquery.scrollTo.min.js"></script>
	<script src="../../assets/global/js/libs/niceScroll/jquery.nicescroll.js"></script>
	<script src="../../assets/global/js/libs/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
	<script src="../../assets/global/js/libs/select2/select2.js"></script>
	<script src="../../assets/global/js/libs/ckeditor/ckeditor.js"></script>
	<script src="../../assets/global/js/libs/tagsinput/bootstrap-tagsinput.min.js"></script>
	<script src="../../assets/site/js/ext/jquery.countdown.js"></script>
	<!--<script src="../../assets/site/js/ext/jquery.jpanelmenu.js"></script>-->
	<script src="../../assets/site/js/ext/slidepushmenus/classie.js"></script>
	<script src="../../assets/site/js/main.js"></script>
	
	<script>
        var menuRight = document.getElementById( 'cbp-spmenu-s2' ),
            showRight = document.getElementById( 'showRight' ),
            closeRight = document.getElementById( 'closeRight' ),
            body = document.body;

      
        showRight.onclick = function() {
            classie.toggle( this, 'active' );
			classie.toggle( menuRight, 'cbp-spmenu-open' );
			disableOther( 'showRight' );
        };

        closeRight.onclick = function() {
            classie.remove( menuRight, 'cbp-spmenu-open' )
        };

        function disableOther( button ) {
            if( button !== 'showRight' ) {
				classie.toggle( showRight, 'disabled' );
			}
        }
    </script>

	<script type="text/javascript">
		$(window).load(function(){
			gy.Global.init();
			gy.DatePicker.init();
			gy.DealsPage.init();
		})

	</script>

	<script>
		$(function(){
			$('recommendation_typeahead input').tagsinput();
		});
	</script>
	</body>
</html>
