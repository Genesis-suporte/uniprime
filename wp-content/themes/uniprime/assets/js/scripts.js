(function($){
  $(document).ready(function($) {
    /*$(".menu-item a").click(function(e) {
      e.preventDefault();
      console.log("clicou");
    })*/
    $('.hero-banner').slick({
      dots: true,
      infinite: false,
      appendDots: '.dots-hero'
    });
    var height_dots = $('.slick-dots').height();
    var height_hero = $('.hero-banner').height();
    $('.dots-hero').css('top',((height_hero/2)-(height_dots/2))).height(height_dots);

    $('.slide-nossos-produtos').slick({
      dots: false,
      slidesToShow: 3,
      slidesToScroll: 3,
      infinite: false,
      appendArrows: '.arrows-nossos-produtos',
      rows: 3
    });

    $('.slide-nossa-historia').slick({
      dots: false,
      slidesToShow: 2,
      slidesToScroll: 1,
      infinite: false,
      appendArrows: '.arrows-nossa-historia',
    });
    
    // CLICK OR MOUSEOVER EVENT FOR MENU DROP DOWN
    /*var element = document.getElementById('main-menu');
    // - THIS IS FOR DEMO, TO CHECK IF ELEMENT WAS HOVERED -
    element.addEventListener('mouseenter', (e) => {
      e.target.classList.add('actived');
    });
    element.addEventListener('mouseout', (e) => {
      e.target.classList.remove('actived');
    });*/
    $('#main-menu').hover(
      function(){ 
        $(this).addClass('actived') 
        $(".logo-black").removeClass('d-none') 
        $(".logo-white").addClass('d-none') 
        $("#icon-users").addClass('d-none') 
        $("#icon-users-white").removeClass('d-none') 
      },
      function(){ 
        $(this).removeClass('actived') 
        $(".logo-black").addClass('d-none') 
        $(".logo-white").removeClass('d-none') 
        $("#icon-users").removeClass('d-none') 
        $("#icon-users-white").addClass('d-none') 
      }
    )
    $('.header-menu-banner .menu-dropdown').hover(
      function(){ 
        $(this).children(".arrow").removeClass('down').addClass('up');
      },
      function(){ 
        $(this).children(".arrow").removeClass('up').addClass('down') 
      }
    )
    /*const click_onde_encontrar = document.getElementById("click-onde-encontrar");

    click_onde_encontrar.addEventListener("click", (event) => {
      Qual a sua cidade?
    });
    */
    $('.slide-novidades').slick({
      dots: false,
      slidesToShow: 3,
      slidesToScroll: 1,
      infinite: false,
      appendArrows: '.arrows-novidades',
      rows: 0
    })
    
  });
})(jQuery); 