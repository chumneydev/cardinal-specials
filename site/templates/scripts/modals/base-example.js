
					[
					  'https://the-chumney.github.io/grid/css/compiled/cagrid.css',
					  'https://www.theautohost.com/sandbox/modal/css/iziModal.min.css'
					].forEach(function(href) {
						var link = document.createElement('link');
						link.href = href;
						link.rel = "stylesheet";
						link.type = "text/css";
						document.head.appendChild(link);
					});



					$.when(

					  $.getScript("https://www.theautohost.com/sandbox/modal/js/js.cookie.js", function(){
	  					  console.log( "Chumney & Associates cookie was loaded." );


					  }),
					  $.getScript("https://www.theautohost.com/sandbox/modal/js/iziModal.min.js", function(){
	  					  console.log( "Chumney & Associates modal script was loaded." );


					  }),
					  $.getScript("https://www.theautohost.com/sandbox/modal/js/exit-intent.js", function(){
	  					  console.log( "Chumney & Associates exit intent was loaded." );


					  })

					).then(function() {

						caModalCreateExit();
					});






					function caModalCreateExit() {
					if(!Cookies.get('ca.demo.arg')) {

						$(document).on('click', '#ca-btn-submit', function(){
							$("#ca-btn-submit").text("Submitting the form");
							var data = {
								firstName: $("#form_first_name").val(),
								lastName: $("#form_last_name").val(),
								email: $("#form_email").val(),
                                phone: $("#form_phone").val(),
                                comments: $("#form_comments").val()

							};

                            if ($.trim($("#form_first_name").val()) === "" || $.trim($("#form_last_name").val()) === "" || $.trim($("#form_email").val()) === "" || $.trim($("#form_phone").val()) === "") {
                                console.log('you did not fill out one of the fields');
                            }

                            else {
                                Cookies.set('ca.demo.arg', '9481u3948Jfh', { expires: 1 });
                                console.log("Form Submission in Progress");
                                    $.ajax({
								    type: "POST",
								    url: "https://tools2.chumdev.com/modals/clients/demo/arg/",
								    data: data,
								    success: function(){
                                        
									    $('#ca-arg').iziModal('close');
							        }
                                });
                            }

						});



						$.exitIntent('enable');
						$(document).bind('exitintent',
					    	function() {
                                if(Cookies.get('ca.demo.arg')) {
                                    console.log('The Cookie has been set')
                                }
                                else {

								$("#ca-arg").iziModal({
									title: 'Arg',
									subtitle: '',
									headerColor: '#e82c2a',
									closeButton: true,
									overlay: true,
									overlayClose: true,
						 		 	overlayColor: 'rgba(0,0,0,0.8)',
                                    closeOnEscape: false,
                                    zindex: 99999,
									autoOpen: 1,
									iframeURL: false,
									width: 600,
									transitionIn: "flipInX",
									onClosing: function(modal){
										Cookies.set('ca.demo.arg', '9481u3948Jfh', { expires: 1 });

									},

								    onOpening: function(modal){
								        modal.startLoading();
								        $.get('https://tools2.chumdev.com/modals/clients/demo/arg/', function(data) {
								            $("#ca-arg .iziModal-content").html(data);
								            modal.stopLoading();
								        });
								    }
                                });
                            }













							});


					} else if(1 == "0") {
						Cookies.remove('ca.demo.arg');

						$(document).on('click', '#ca-btn-submit', function(){
							var data = {
								firstName: $("#form_first_name").val(),
								lastName: $("#form_last_name").val(),
								email: $("#form_email").val(),
                                phone: $("#form_phone").val(),
                                comments: $("#form_comments").val()

                            };

                            if ($.trim($("#form_first_name").val()) === "" || $.trim($("#form_last_name").val()) === "" || $.trim($("#form_email").val()) === "" || $.trim($("#form_phone").val()) === "") {
                                console.log('you did not fill out one of the fields');
                            }

                            else {
                                console.log("Form Submission in Progress");
                                $("#ca-btn-submit").text("Submitting the form");
                                    $.ajax({
								    type: "POST",
								    url: "https://tools2.chumdev.com/modals/clients/demo/arg/",
								    data: data,
								    success: function(){
									    $('#ca-arg').iziModal('close');
							        }
                                });
                            }

						});

						$.exitIntent('enable');
						$(document).bind('exitintent',
    					function() {
							$("#ca-arg").iziModal({
								title: 'Arg',
								subtitle: '',
								headerColor: '#e82c2a',
								closeButton: true,
								overlay: true,
								overlayClose: true,
					 		 	overlayColor: 'rgba(0,0,0,0.8)',
                                closeOnEscape: false,
                                zindex: 99999,
								autoOpen: 1,
								iframeURL: false,
								width: 600,
								transitionIn: "flipInX",

							    onOpening: function(modal){
							        modal.startLoading();
							        $.get('https://tools2.chumdev.com/modals/clients/demo/arg/', function(data) {
							            $("#ca-arg .iziModal-content").html(data);
							            modal.stopLoading();
							        });
							    }
							})







						});






					} //end if

					else {
						console.log("ca.demo.arg has already been set. Enjoy viewing the inventory.");
					}

}

					