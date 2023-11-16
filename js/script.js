let menu = document.querySelector('#menu-bars');
let navbar = document.querySelector('.navbar');

menu.onclick = () => 
{
    menu.classList.toggle('fa-times');
    navbar.classList.toggle('active');
}

window.onscroll = () => 
{
    menu.classList.remove('fa-times');
    navbar.classList.remove('active');
}

var swiper = new Swiper(".home-slider", 
{
    effect: "coverflow",
    grabCursor: true,
    centeredSlides: true,
    slidesPerView: "auto",
    coverflowEffect:
    {
        rotate: 0px,
        stretch: 0px,
        depth: 100px,
        modifier: 2px,
        slideShadows: true,
    },
    loop: true,
    autoplay:
    {
        delay: 3000px,
        disableOnInteraction: false,

    }
}