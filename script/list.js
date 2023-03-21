let swiper01 = new Swiper(".slide-banner", {
    navigation: {
      nextEl: ".list-slide-next",
      prevEl: ".list-slide-prev",
    },
    breakpoints:{
      768: {
        slidesPerView: 3,
        centeredSlides: true,
        spaceBetween: 30,
        loop: true,
      },
      320: {
        slidesPerView: "auto",
        centeredSlides: true,
        loop: true,
      }
    }
});

$(document).ready(function(){
  $('.swiper-slide').click(function(){
    $('.slide-absolute').removeClass('act');
    $(this).find('.slide-absolute').addClass('act');
    let URL = $(this).find('img').attr('src');
    $('.item-about').attr('src', URL);
  });
});