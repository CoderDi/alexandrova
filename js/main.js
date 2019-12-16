$(document).ready(function(){
  $(window).scroll(function(){
    if (($(window).scrollTop() >= 163)&(!($(".menu").hasClass("menu--fixed")))) {
      $(".menu").addClass("menu--fixed");
    } else if (($(window).scrollTop() < 163)&(($(".menu").hasClass("menu--fixed")))) {
      $(".menu").removeClass("menu--fixed")
    }
  });

  $('.slider').slick({
    dots: true,
    infinite: true,
    speed: 300,
    slidesToShow: 1,
    centerMode: true,
    variableWidth: true,
    autoplay: true,
    autoplaySpeed: 6000,
    focusOnSelect: true,
    infinite: true,
    arrows: false
  });

  $('.partners').slick({
    dots: false,
    infinite: true,
    speed: 300,
    autoplay: true,
    autoplaySpeed: 6000,
    arrows: true,
    slidesToShow: 5
  });
});