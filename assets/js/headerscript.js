$(document).ready(function(){       
   var scroll_start = 0;
   var logo = $(".lrg-logo");
   var button = $(".nav2");  
   var startchange = $('#tabcalid');
   var offset = startchange.offset();
   $(document).scroll(function() { 
      scroll_start = $(this).scrollTop();
      if(scroll_start > offset.top) {
          $('header').css('background-color', '#fff');
          if(!logo.hasClass("sml-logo")) {
            logo.hide();
            logo.removeClass('lrg-logo').addClass("sml-logo").fadeIn( "slow");
          }
          if(!button.hasClass("nav3")) {
            button.hide();
            button.removeClass('nav2').addClass("nav3").fadeIn( "slow");
          }
          $('.search-box input[type="text"]').css("color", "#ff571f");
          $('.sorange').addClass("scroll");
          
       } else {
          $('header').css('background-color', 'transparent');
          if(!logo.hasClass("lrg-logo")) {
            logo.hide();
            logo.removeClass("sml-logo").addClass('lrg-logo').fadeIn( "slow");
          }
          if(!button.hasClass("nav2")) {
            button.hide();
            button.removeClass("nav3").addClass('nav2').fadeIn( "slow");
          }
          $('.search-box input[type="text"]').css("color", "#fff");
          $('.sorange').removeClass('scroll');
       }
   });
});