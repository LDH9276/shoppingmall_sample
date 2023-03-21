const swiper01 = new Swiper(".slide-banner", {
  navigation: {
    nextEl: ".list-slide-next",
    prevEl: ".list-slide-prev",
  },
  breakpoints:{
    768: {
      slidesPerView: 3,
      spaceBetween: 30,
    },
    320: {
      slidesPerView: "auto",
      loop: true,
    }
  },
  on: {
    slideChange: function () {
      if(swiper01.isBeginning) {
        prevBtn.classList.add('disabled');
      } else {
        prevBtn.classList.remove('disabled');
      }
      if(swiper01.isEnd) {
        nextBtn.classList.add('disabled');
      } else {
        nextBtn.classList.remove('disabled');
      }
    }
  }
});

const nextBtn = document.querySelector('.list-slide-next');
const prevBtn = document.querySelector('.list-slide-prev');


$(document).ready(function(){
  $('.swiper-slide').click(function(){
    $('.slide-absolute').removeClass('act');
    $(this).find('.slide-absolute').addClass('act');
    let URL = $(this).find('img').attr('src');
    $('.item-about').attr('src', URL);
  });
});