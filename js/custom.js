function initParallax(){jQuery("#home").parallax("50%",.3)}jQuery(window).load(function(){jQuery(".preloader").fadeOut(1e3)}),initParallax(),jQuery(window).scroll(function(){jQuery(this).scrollTop()>200?jQuery(".go-top").fadeIn(200):jQuery(".go-top").fadeOut(200)}),jQuery(".go-top").click(function(e){e.preventDefault(),jQuery("html, body").animate({scrollTop:0},300)}),jQuery(document).ready(function(){function e(){jQuery(window).scrollTop()-10>=r?(jQuery("#header").addClass("navbar-fixed-top"),jQuery(".content").addClass("menu-padding")):(console.log("quitar"),jQuery("#header").removeClass("navbar-fixed-top"),jQuery(".content").removeClass("menu-padding"))}var o=jQuery("#header"),r=o.offset().top;document.onscroll=e}),jQuery(window).scroll(function(){jQuery(this).scrollTop()>1?jQuery("#header").addClass("sticky"):jQuery("header").removeClass("sticky")});