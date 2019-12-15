$(document).ready(function(){
  $(window).scroll(function(){
    if (($(window).scrollTop() >= 163)&(!($(".menu").hasClass("menu--fixed")))) {
      $(".menu").addClass("menu--fixed");
    } else if (($(window).scrollTop() < 163)&(($(".menu").hasClass("menu--fixed")))) {
      $(".menu").removeClass("menu--fixed")
    }
  });
});