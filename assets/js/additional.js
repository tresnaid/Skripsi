/*JS Tambahan*/

/*kampanye saya*/
var heightPopular = $("#popularcol").height();
var setHigh = heightPopular - 20;
$(".addCampaign").css("height", setHigh);

/*accrdion di donasi - variable*/
var acc = document.getElementsByClassName("paymentchoice");
var panel = document.getElementsByClassName('paymentPanel');
var payAmount = document.getElementsByClassName('paymentAmount');
var heightPush = $(".paymentcontain").height();
var heightPushInt = heightPush + 150;

/*NEXT PREV DI FORM DONASI*/
$('.btnNext').click(function(){
$('.nav-tabs > .active').next('li').find('a').trigger('click');
document.body.scrollTop = 150;
document.documentElement.scrollTop = 150;
});

$('.btnPrevious').click(function(){
$('.nav-tabs > .active').prev('li').find('a').trigger('click');
document.body.scrollTop = 150;
document.documentElement.scrollTop = 150;
});

  /*NEXT BUTTON DI PROJECT*/
$(".btnNextProject").click(function() {
  $(this).addClass('btnActive').siblings().removeClass('btnActive');
});

$(".bankWrapper").click(function() {
  $('.bankWrapper .paymentChoosen.choosen').removeClass('choosen');
  $(this).find('.paymentChoosen').addClass('choosen');
});

for (var i = 0; i < acc.length; i++) {
    acc[i].onclick = function() {
      var setClasses = !this.classList.contains('donasiActive');
        setClass(acc, 'donasiActive', 'remove');
        setClass(panel, 'paymentShow', 'remove');
        setClass(payAmount, 'payAmountShow', 'remove');
        
        $(".paymentcontain").css("margin-bottom", "0px");

        if (setClasses) {
            this.classList.toggle("donasiActive");
            this.nextElementSibling.classList.toggle("paymentShow");
            this.classList.toggle("payAmountShow");
            $(".paymentcontain").css("margin-bottom", heightPushInt);
        }
    }
}

function setClass(els, className, fnName) {
    for (var i = 0; i < els.length; i++) {
        els[i].classList[fnName](className);
    }
}

$(document).ready(function(){
    $('.campaignboxlove').tooltip({title: "Add to Wishlist", placement: "auto top"}); 
});

/*SLIDER*/
$(function () {
    /* BOOTSTRAP SLIDER */
    $('.slider').slider();

    /* ION SLIDER */
    $("#range_1").ionRangeSlider({
      min: 0,
      max: 5000,
      from: 1000,
      to: 4000,
      type: 'double',
      step: 1,
      prefix: "$",
      prettify: false,
      hasGrid: true
    });
    $("#range_2").ionRangeSlider();

    $("#range_5").ionRangeSlider({
      min: 0,
      max: 10,
      type: 'single',
      step: 0.1,
      postfix: " mm",
      prettify: false,
      hasGrid: true
    });
    $("#range_6").ionRangeSlider({
      min: -50,
      max: 50,
      from: 0,
      type: 'single',
      step: 1,
      postfix: "°",
      prettify: false,
      hasGrid: true
    });

    $("#range_4").ionRangeSlider({
      type: "single",
      step: 100,
      postfix: " light years",
      from: 55000,
      hideMinMax: true,
      hideFromTo: false
    });
    $("#range_3").ionRangeSlider({
      type: "double",
      postfix: " miles",
      step: 10000,
      from: 25000000,
      to: 35000000,
      onChange: function (obj) {
        var t = "";
        for (var prop in obj) {
          t += prop + ": " + obj[prop] + "\r\n";
        }
        $("#result").html(t);
      },
      onLoad: function (obj) {
        //
      }
    });
  });

/*INCLUDE HTML*/
var w3 = {};
w3.includeHTML = function(cb) {
  var z, i, elmnt, file, xhttp;
  z = document.getElementsByTagName("*");
  for (i = 0; i < z.length; i++) {
    elmnt = z[i];
    file = elmnt.getAttribute("w3-include-html");
    if (file) {
      xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          elmnt.innerHTML = this.responseText;
          elmnt.removeAttribute("w3-include-html");
          w3.includeHTML(cb);
        }
      }      
      xhttp.open("GET", file, true);
      xhttp.send();
      return;
    }
  }
  if (cb) cb();
};


/*CLICK LOVE*/
$('.campaignboxlove').click(function(){
    $(this).find('i.fa').toggleClass('fa-heart-o fa-heart')
    if ($(this).attr('data-original-title') === 'Add to Wishlist' || $(this).attr('data-original-title') === '') {
    	$(this).attr('data-original-title', "Wishlist added");
    }else{
    	$(this).attr('data-original-title', "Add to Wishlist");
    }
});

/*HOME*/
/*JS untuk panah ke bawah*/
$("#btnScroll").click(function() {
	$("body,html,document").animate({
	    scrollTop: $("#tabcalid").offset().top + 20
	}, 500);
});

/*JS untuk blogslider*/
var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
showSlides(slideIndex += n);
}

function currentSlide(n) {
showSlides(slideIndex = n);
}

function showSlides(n) {
var i;
var slides = document.getElementsByClassName("blogcontent");
var dots = document.getElementsByClassName("dot");
if (n > slides.length) {slideIndex = 1}    
if (n < 1) {slideIndex = slides.length}
for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
}
for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
}
slides[slideIndex-1].style.display = "block";  
dots[slideIndex-1].className += " active";
}

/*SATU DIV CAMPAIGN CARD CLICKABLE - DIV POPULARCOL*/
$(".popular-item, .project-cnt").click(function() {
	window.location = $(this).find("a").attr("href"); 
	return false;
 });


