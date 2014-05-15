var globalJs = {
	Global:{
		init: function()
		{
			//API: https://github.com/eternicode/bootstrap-datepicker
			this.dateTimePicker();

			this.addAttachments();
            this.logoutInactive();
            this.priceFormat();

            this.ajaxComplete();
            this.closeLoginPopupModalClose();

            this.maskInput();

            this.pluginNormalization();

		},
        pluginNormalization: function() {
            // Fixed plugins bugs
            $( document ).on(
                'DOMMouseScroll mousewheel scroll',
                '.modal,body',
                function(){
                    if (typeof ___t != "undefined"){
                        window.clearTimeout( ___t );
                    }
                    ___t = window.setTimeout( function(){
                        $('.datePicker, .dateTimePicker,.datepicker,datetimepicker').datetimepicker('place')
                    }, 600 );
                }
            );
        },

        maskInput: function() {
            // Nothing is defined yet.
        },

        ajaxComplete: function() {
            var _self = this;

            $( document ).ajaxComplete(function( event, request, settings ) {
                if (request.status == 200) {
                    if (typeof request.responseJSON != "undefined"){
                        var response = request.responseJSON;

                        if (typeof response.status != 'undefined') {

                            // Handle Not Logged in ajax.
                            if (response.status == 'not_logged_in') {

                                _self._showLoginDialog();
                            }

                        }
                    }
                }
            });
        },

        _showLoginDialog: function(){
            var _self = this,
                $quickLoginModal = $("#login_popup_modal");


            $quickLoginModal.modal('show');
        },
        closeLoginPopupModalClose: function(){
            $('#login_popup_modal_close').bind('click',function(){
                $("#login_popup_modal").modal('hide');
            });
        },

        priceFormat: function($parent) {
            if (typeof $parent == 'undefined') {
                $parent = "";
            }

            var $the_target;
            if (typeof $parent == "object") {
                $the_target = $parent.find('.form-group-currency input');
            } else {
                $the_target = $($parent + ' .form-group-currency input');
            }

            $the_target.autoNumeric('init',{aSign: '$ ',mDec: 0,vMax: 99999999});
        },

		dateTimePicker: function(){
			$('.datetimepicker').datetimepicker({
				icons: {
                    time: "fa fa-clock-o",
                    date: "fa fa-calendar",
                    up: "fa fa-arrow-up",
                    down: "fa fa-arrow-down"
                },
                language:'au',
                showToday: true,
                pickTime: false
			});

            $('.datetimepicker').on('dp.change',function(e){
                $(this).blur();
            });

            $(".datetimepicker-from").on("dp.change",function (e) {
               $('.datetimepicker-to').data("DateTimePicker").setMinDate(e.date);
            });
            $(".datetimepicker-to").on("dp.change",function (e) {
               $('.datetimepicker-from').data("DateTimePicker").setMaxDate(e.date);
            });
		},

		addAttachments: function() {
			$('body').on('click', '.add-more-attachment', function(){
		      var ln = $('input.attachment').length - 1;
		      
		      $('input.attachment:eq(0)').clone().insertAfter('input.attachment:eq('+ln+')');
		      
		    });
		},

        logoutInactive: function() {
            // Add the following into your HEAD section
            var timer = 0;
            function set_interval() {
                // the interval 'timer' is set as soon as the page loads
                timer = setInterval("auto_logout()", 10000);
                // the figure '10000' above indicates how many milliseconds the timer be set to.
                // Eg: to set it to 5 mins, calculate 5min = 5x60 = 300 sec = 300,000 millisec.
                // So set it to 300000
            }

            function reset_interval() {
                //resets the timer. The timer is reset on each of the below events:
                // 1. mousemove   2. mouseclick   3. key press 4. scroliing
                //first step: clear the existing timer

                if (timer != 0) {
                    clearInterval(timer);
                    timer = 0;
                    // second step: implement the timer again
                    timer = setInterval("auto_logout()", 10000);
                    // completed the reset of the timer
                }
            }

            function auto_logout() {
                // this function will redirect the user to the logout script
                window.location = CONST.BASEURL + '/logout/?_token=' + CONST._TOKEN + '&is_expired=1';
            }

            // Add the following attributes into your BODY tag
            onload="set_interval()"
            onmousemove="reset_interval()"
            onclick="reset_interval()"
            onkeypress="reset_interval()"
            onscroll="reset_interval()"
        }


    },

	Overlay: {

		layOpen: function( el ){
	      var table = $( el );
	      var position = table.position();

	      var top = position.top;
	      var left = position.left;
	      var height = table.height();
	      var width = table.width();

	      var Overlay = $('<div class="table-overlay"><span class="table-loader"></span></div>');

	      table.css({'position':'relative'});

	      table.append(Overlay);
	      
	      Overlay.css({
	        'position':'absolute',
	        'background':'rgba(255, 255, 255, 0.74)',
	        'top':'0',
	        'right':'0',
	        'width': width+'px',
	        'height': height+'px',
	        'z-index': '999'
	      });


	      $('.table-loader').css({
	        'margin-top':(height/3)+'px',
	        'margin-left' : 'auto',
	        'margin-right': 'auto'
	      });
	    },
	    layClose: function()
	    {
	    	$('.table-overlay').remove();
	    }
	},

	Comment: {
		init:function(){
			var _post_id = $('#post_id');
			this.comment();
			this.getPostComment(_post_id.val());
		},
		getPostComment: function( post_id ){
			globalJs.Overlay.layOpen('.timeline-messages-listing');
			
			$.get(baseURL+'post/comment/'+post_id).done(function( data ){
				$('.timeline-messages').html(data);
				globalJs.Overlay.layClose();
			});
		},
		comment: function(){
			$('body').on('click', '#send-comment', function(){


				

				var _comment = $('#comment');
				var _post_id = $('#post_id');

				if(_comment.val() == '' )
						return;

				$.post(baseURL+'post/comment', {
					comment:_comment.val(),
					post_id:_post_id.val()
				}, function(data){
					
					globalJs.Comment.getPostComment(_post_id.val());
					_comment.val('');
					
				});

			});
			
		}
	}


}

	