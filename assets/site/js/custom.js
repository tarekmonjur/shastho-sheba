(function ($) {

  "use strict";



jQuery(document).ready(function($){



  $('.btn-custom-hide-1').click(function(){

    $('.btn-custom-hide-1').addClass('tgl-active');

  });




  //right side menu start
  $('#right-side-menu-close,#cart-menu-arroe-close,#cart-menu-open-right').click(function(){
      $('.right-side-cart-menu').toggleClass('right-menu-body-close');
  });

  $('#have-sp-form-key,#have-sp-close').click(function(){
    $('.have-sp-form').toggleClass('have-sp-form-toogle-cls');
    $('.special-code-area-right-cart').toggleClass('toggle-frm')
    $('.fa-angle-up').toggleClass('rotted-angle');

  });

  // common header start





    $('#open-c').click(function(){

      $('.chatting-box').toggleClass('chatting-box-show');

      $('.chat-open-hide').toggleClass('c-d-open');

      $('.chat-close-hide').toggleClass('c-d-close');

    });



    

   



$(window).scroll(function(){

        

            if ( $(this).scrollTop() > 100 ) {

                $('#search_result').hide();
                $('#search_result2').hide();

                $('#sticky .header-top-section').css({

                  "position": "fixed",

                  "z-index":"9",

                  "width":"100%",

                  "left":"0",

                  "top":"0",

                  "transition": "0.3s",

                  "box-shadow":"0 1px 8px rgba(0, 0, 0, 0.3)",

   

                });

                



                $('.top-header-block-content').css({

                  "display":"block",



                });



                $('.menu-section').css({

                  "position": "fixed",

                  "z-index":"99",

                  "width":"100%",

                  "display":"none",

                });



                 $('#open-menu').click(function(){



                     $('.menu-section').css({

                      "display":"block",

                      "top":"43px",

                       "transition": "0.3s",

                     });



                     $('#open-close').css({

                      "display":"block"

                     });

                     $(this).css({

                      "display":"none"

                     });



                  })

                 $('#open-close').click(function(){



                     $('.menu-section').css({

                      "display":"none",

                      "top":"83px",

                      "transition": "0.3s",

                     });



                     $(this).css({

                      "display":"none"

                     });

                     $('#open-menu').css({

                      "display":"block"

                     });



                  })

            }else{


                 $('#sticky .header-top-section').css({

                  "position": "static",

                  "width":"100%",

                  "left":"0",



                  "top":"0",

                  "transition": "0.3s",

                  "box-shadow":"0 1px 8px rgba(0, 0, 0, 0)",

  

                });

                  $('.top-header-block-content').css({

                  "display":"none",

                });



                    if ($(window).outerWidth() > 767) {
                      $('.menu-section').css({
                            "position": "static",
                             "width":"100%",
                            "display":"block",
                          });

                    } else {
                           $('.menu-section').css({
                                "position": "static",
                                 "width":"100%",
                                "display":"none",
                              });
                        }

            }

        }); 















      $('#nav').slicknav({

             prependTo:".mobile-nav"

        });



  // common header end



		$(".home-slider-active").owlCarousel({

         items:1,

         nav:true,

         loop:true,

         autoplay:true,

         autoplayTimeout:8000,

         mouseDrag:false,

         lazyLoad:true,

         smartSpeed:1000,

         navText:['<i class="fa fa-angle-left">','</i> <i class="fa fa-angle-right"></i>'],	

		responsive:{

            0:{

                items:1

            },

            600:{

                items:1

            },

            1000:{

                items:1

            }

        }



        });



		$(".features-slider-active").owlCarousel({

		         items:4,

		         nav:true,

		         loop:true,

		         autoplay:true,

		         autoplayTimeout:5000,

		         lazyLoad:true,

		         smartSpeed:1000,

		         margin:25,

		         navText:['<i class="fa fa-angle-left">','</i> <i class="fa fa-angle-right"></i>'],	

				responsive:{

		            0:{

		                items:1

		            },

		            600:{

		                items:2

		            },

		            1000:{

		                items:4

		            }

		        }



		        });



		$(".customer-comment-slider-active").owlCarousel({

				         items:1,

				         nav:false,

				         loop:true,

				         autoplay:true,

				         autoplayTimeout:5000,

				         lazyLoad:true,

				         smartSpeed:1000,

				         margin:25,

				       	 responsive:{

				            0:{

				                items:1

				            },

				            600:{

				                items:1

				            },

				            1000:{

				                items:1

				            }

				        }



				        });



		$("a.bla-2").YouTubePopUp( { autoplay: 0 } );

 			





      });



   



}(jQuery)); 