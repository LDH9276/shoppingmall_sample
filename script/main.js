let swiper00 = new Swiper(".lineup-list", {
  navigation: {
    nextEl: ".line_up-banner-next",
    prevEl: ".line_up-banner-prev",
  },
  breakpoints:{
    1025: {
      slidesPerView: 5,
      spaceBetween: 30,
      centeredSlides: false,
    },
    768: {
      slidesPerView: 3,
      spaceBetween: 16,
      centeredSlides: false,
      pagination: {
        el: ".lineup-pagination",
      },
    },
    320: {
      slidesPerView: 1,
      spaceBetween: 16,
      centeredSlides: true,
      loop: true,
      pagination: {
        el: ".lineup-pagination",
      },
    }
  }
});
let swiper01 = new Swiper(".slide-banner", {
  navigation: {
    nextEl: ".slide-banner-next",
    prevEl: ".slide-banner-prev",
  },
  loop: true,
  breakpoints:{
    1025: {
      pagination: {
        el: ".slide-pagination",
      },
    },
    320: {
      pagination: {
        el: ".slide-pagination",
      },
    }
  }
});

if(window.innerWidth < 1025) {
  const searchIcon = document.querySelector('.search');
  const slidePrevBtn = document.querySelector('.slide-banner-prev');
  const slideNextBtn = document.querySelector('.slide-banner-next');
  
  searchIcon.setAttribute('src', 'img/user.svg');  
  slidePrevBtn.setAttribute('src', 'img/w-btn-left.svg');
  slideNextBtn.setAttribute('src', 'img/w-btn-right.svg');
}

if(window.innerWidth < 728){
  const slidePrevBtn = document.querySelector('.slide-banner-prev');
  const slideNextBtn = document.querySelector('.slide-banner-next');

  slidePrevBtn.setAttribute('src', 'img/btn-left.svg');
  slideNextBtn.setAttribute('src', 'img/btn-right.svg');
}

window.onresize = function() {
if(window.innerWidth < 1025) {
  const searchIcon = document.querySelector('.search');
  const slidePrevBtn = document.querySelector('.slide-banner-prev');
  const slideNextBtn = document.querySelector('.slide-banner-next');
  
  searchIcon.setAttribute('src', 'img/user.svg');  
  slidePrevBtn.setAttribute('src', 'img/w-btn-left.svg');
  slideNextBtn.setAttribute('src', 'img/w-btn-right.svg');
}
if(window.innerWidth < 728){
  const slidePrevBtn = document.querySelector('.slide-banner-prev');
  const slideNextBtn = document.querySelector('.slide-banner-next');

  slidePrevBtn.setAttribute('src', 'img/btn-left.svg');
  slideNextBtn.setAttribute('src', 'img/btn-right.svg');
} else {
  const searchIcon = document.querySelector('.search');
  $('.f-menu ul').slideDown();
  searchIcon.setAttribute('src', 'img/search.svg');  
}
}


