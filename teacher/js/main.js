$(document).ready(function(){
  $(window).scroll(function(){
    if (($(window).scrollTop() >= 163)&(!($(".menu").hasClass("menu--fixed")))) {
      $(".menu").addClass("menu--fixed");
    } else if (($(window).scrollTop() < 163)&(($(".menu").hasClass("menu--fixed")))) {
      $(".menu").removeClass("menu--fixed")
    }
  });

  $('.js-slider').slick({
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
    slidesToShow: 5,
    responsive: [
      {
        breakpoint: 1200,
        settings: {
          slidesToShow: 4
        }
      },
      {
        breakpoint: 980,
        settings: {
          slidesToShow: 3
        }
      },
      {
        breakpoint: 780,
        settings: {
          slidesToShow: 2
        }
      },
      {
        breakpoint: 600,
        settings: {
          slidesToShow: 1
        }
      }
    ]
  });


  $('form input[type="checkbox"]').change(function () {
    if ($(this).is(":checked")) {
        $(this).parents("form").find("input[type='submit']").attr("disabled", false);
    } else {
        $(this).parents("form").find("input[type='submit']").attr("disabled", true);
    }
  });

  $(".menu__item .menu-drop").parents(".menu__item").addClass("menu__item--withdrop");

  $(".butter").click(function(){
    $(".menu").toggleClass("menu--open");
  });



  $('.main__content a').each(function() {
  	if (!($(this).hasClass('mtli_attachment')) && ($(this).attr('href').indexOf('alexandrova') < 0)) {
      $(this).addClass('mtli_attachment eversite');
      $(this).css('background-image', 'url(http://www.google.com/s2/favicons?domain=' + $(this).attr('href').match(/(http|https):\/\/[\w-\.]+[\w-\.]+\//g) + ')');
      $(this).css('background-size', 'auto 24px');
    }
    $(this).attr('target','_blank');
    if (($(this).hasClass('mtli_attachment')) && !($(this).hasClass('eversite')) && ($(this).attr('href').indexOf('docs.google') < 0) && ($(this).attr('href').indexOf('.rar') < 0)) {
      $(this).wrap("<div class='new-wrap flex'></div>");
      $(this).parent(".new-wrap").append("<a class='new-wrap--link' href='" + $(this).attr('href') + "'>Скачать</a>");
      $(this).attr('href', 'https://docs.google.com/viewer?url=' + $(this).attr('href'));
      
    }
  });

});