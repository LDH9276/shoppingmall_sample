const mainBtn = document.querySelector('.h-toggle__menu');
const mainBtn02 = document.querySelector('.h-toggle_menu');
const menuBar = document.querySelectorAll('.h-toggle__menu span');
const menuBar01 = document.querySelectorAll('.h-toggle_menu span');
const subMenu = document.querySelector('.h-toggle__sub');

if(window.innerWidth < 1025) {
  const searchIcon = document.querySelector('.search');
  searchIcon.setAttribute('src', 'img/user.svg');  
} 

  $('.f-top-toggle').click(()=>{
    $('.f-top-toggle').toggleClass('act').next().toggleClass('act');
  });

mainBtn.addEventListener('click', () => {
  mainBtn.classList.toggle('act');
  mainBtn02.classList.toggle('act');
  subMenu.classList.toggle('act');
  menuBar.forEach(bar => {
    bar.classList.toggle('act');
  });
  menuBar01.forEach(bar => {
    bar.classList.toggle('act');
  });
});
mainBtn02.addEventListener('click', () => {
  mainBtn.classList.toggle('act');
  mainBtn02.classList.toggle('act');
  subMenu.classList.toggle('act');
  menuBar.forEach(bar => {
    bar.classList.toggle('act');
  });
  menuBar01.forEach(bar => {
    bar.classList.toggle('act');
  });
});

$(document).ready(function(){
  $('.h-mobile-gnb ul').slideUp();
  $('.h-my_bao-list').slideUp();
  $('.h-mybuy-list').slideUp();
  $('.h-cartlist-list').slideUp();

  $('.h-lnb-mobile-gnb').click(()=>{
    $('.h-lnb-mobile-gnb .h-lnb-title').toggleClass('act').parentsUntil('.h-sub-menu-wrap').siblings().find('.h-lnb-title').removeClass('act');
    $('.h-mobile-gnb ul').stop().slideToggle().parentsUntil('.h-sub-menu-wrap').siblings().find('ul').slideUp();
  });
  $('.h-lnb-my_bao .h-lnb-title').click(()=>{
    $('.h-lnb-my_bao .h-lnb-title').toggleClass('act').parentsUntil('.h-sub-menu-wrap').siblings().find('.h-lnb-title').removeClass('act');
    $('.h-my_bao-list').stop().slideToggle().parentsUntil('.h-sub-menu-wrap').siblings().find('ul').slideUp();
  });
  $('.h-lnb-mybuy .h-lnb-title').click(()=>{
    $('.h-lnb-mybuy .h-lnb-title').toggleClass('act').parentsUntil('.h-sub-menu-wrap').siblings().find('.h-lnb-title').removeClass('act');
    $('.h-mybuy-list').stop().slideToggle().parentsUntil('.h-sub-menu-wrap').siblings().find('ul').slideUp();
  });
  $('.h-lnb-cartlist .h-lnb-title').click(()=>{
    $('.h-lnb-cartlist .h-lnb-title').toggleClass('act').parentsUntil('.h-sub-menu-wrap').siblings().find('.h-lnb-title').removeClass('act');
    $('.h-cartlist-list').stop().slideToggle().parentsUntil('.h-sub-menu-wrap').siblings().find('ul').slideUp();
  });
});

if (window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches) {
  // Apply dark mode styles
  document.querySelectorAll('path').forEach(function(path) {
    path.style.fill = 'white';
  });
} else {
  // Apply light mode styles
  document.querySelectorAll('path').forEach(function(path) {
    path.style.fill = '#272727';
  });
}