$('.feature-list').slick({
  variableWidth: true,
  infinite: true,
  slidesToScroll: 2,
  prevArrow:"<button type='button' class='slick-prev pull-left'><i class='fa fa-angle-left' aria-hidden='true'></i></button>",
  nextArrow:"<button type='button' class='slick-next pull-right'><i class='fa fa-angle-right' aria-hidden='true'></i></button>",
  responsive: [
    {
      breakpoint: 1256,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 2,
        infinite: false,
      }
    },
    {
      breakpoint: 992,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1,
      }
    },
    {
      breakpoint: 768,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
      }
    },
  ]
});

const btnOpenMenu = document.querySelector('.button-menu')
const btnCloseMenu = document.querySelector('.button-close')
const menu = document.querySelector('.nav-bar__mobile')
btnOpenMenu.onclick = () => {
  menu.classList.add('active')
}
btnCloseMenu.onclick = () => {
  menu.classList.remove('active')
}