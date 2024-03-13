(function($){
  window.addEventListener("load", ()=>{
    /*$(".menu-item a").click(function(e) {
      e.preventDefault();
      console.log("clicou");
    })*/
    // DETECT IF IS MOBILE SCREEN
    if(/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)){
      // true for mobile device
      //console.log("mobile device");
    }else{
      // false for not mobile device
      //console.log("not mobile device");
    }
    
    mainMenu = document.querySelector('#main-menu');
    window.addEventListener('resize', checkResize);

    function checkResize () {      
      
      var height_dots = $('.slick-dots').height();
      var height_hero = $('.hero-banner').height();

      if (window.innerWidth < 992) {
        //mainMenu.target.classList.add('actived');
        if(mainMenu) {
          if (!mainMenu.classList.contains('isMobile')) {
            mainMenu.classList.toggle('isMobile');
            if (mainMenu.classList.contains('para-voce')) {
              $(".logo-black").removeClass('d-none') 
              $(".logo-white").addClass('d-none') 
              $("#icon-users").addClass('d-none') 
              $("#icon-users-white").removeClass('d-none')
              /*$("#modal-menu").addClass('d-block')*/
            }
          }
          $('.dots-hero').css('top','auto').css('height','auto');
        }
      } else {
        if(mainMenu) {
          if (mainMenu.classList.contains('isMobile')) {
            console.log('isMobile');
            mainMenu.classList.toggle('isMobile');
          }
          $('.dots-hero').css('top',((height_hero/2)-(height_dots/2))).height(height_dots);
        }
      }
    }
    
    var initializeBlock = function( $block ) {
      checkResize ()
      /*if($('.hero-banner')) {
        $('.hero-banner').slick({
          dots: true,
          infinite: false,
          appendDots: '.dots-hero'
        });
      }
      if($('.slide-nossos-produtos')) {
        $('.slide-nossos-produtos').slick({
          dots: false,
          slidesToShow: 3,
          slidesToScroll: 3,
          infinite: false,
          appendArrows: '.arrows-nossos-produtos-desktop',
          rows: 3,
          responsive: [
            {
              breakpoint: 1200,
              settings: {
                slidesToShow: 2,
                slidesToScroll: 2,
                rows: 4,
                appendArrows: '.arrows-nossos-produtos-desktop',
              }
            },
            {
              breakpoint: 992,
              settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                rows: 4,
                appendArrows: '.arrows-nossos-produtos-mobile',
              }
            }
          ]
        });
      }*/
      
      /*if($('.slide-nossa-historia')) {
        $('.slide-nossa-historia').slick({
          dots: false,
          slidesToShow: 2,
          slidesToScroll: 1,
          infinite: false,
          appendArrows: '.arrows-nossa-historia-desktop',
          responsive: [
            {
              breakpoint: 1200,
              settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                appendArrows: '.arrows-nossa-historia-desktop',
              }
            },
            {
              breakpoint: 992,
              settings: {
                slidesToShow: 2,
                slidesToScroll: 1,
                appendArrows: '.arrows-nossa-historia-mobile',
              }
            },
            {
              breakpoint: 768,
              settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                appendArrows: '.arrows-nossa-historia-mobile',
              }
            }
          ]
        });
      }*/
      /* SLICK Benefícios Institucional */
      /*if($('.slide-beneficios')) {
        $('.slide-beneficios').slick({
          dots: false,
          slidesToShow: 3,
          slidesToScroll: 3,
          infinite: false,
          appendArrows: '.arrows-beneficios-desktop',
          rows: 3,
          responsive: [
            {
              breakpoint: 992,
              settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                rows: 4,
                appendArrows: '.arrows-beneficios-mobile',
              }
            }
          ]
        });
      }
      */
     }
     initializeBlock();
      
      // Initialize dynamic block preview (editor).
      if( window.acf ) {
          window.acf.addAction( 'render_block_preview', initializeBlock );
      }

    
    
    // CLICK OR MOUSEOVER EVENT FOR MENU DROP DOWN
    /*
    // - THIS IS FOR DEMO, TO CHECK IF mainMenu WAS HOVERED -
    mainMenu.addEventListener('mouseenter', (e) => {
      e.target.classList.add('actived');
    });
    mainMenu.addEventListener('mouseout', (e) => {
      e.target.classList.remove('actived');
    });*/
    logoblack = document.getElementById('logo-black'); 
    logowhite = document.getElementById('logo-white');
    const menuInicialItem = document.getElementsByClassName("menu-inicial-item");
    if(menuInicialItem) {
      for (let i = 0; i < menuInicialItem.length; i++) {
        
        menuInicialItem[i].addEventListener('click', (e) => {
          for (let j = 0; j < menuInicialItem.length; j++) {
            menuInicialItem[j].classList.remove('actived');
            menuInicialItem[j].childNodes[1].childNodes[1].classList.add('down');
            menuInicialItem[j].childNodes[1].childNodes[1].classList.remove('up');
            //console.log(menuInicialItem[j].childNodes[1]);
          }
          mainMenu = (e.target.parentNode.parentNode.parentNode.parentNode.parentNode)
          if (!mainMenu.classList.contains('actived')) {
            mainMenu.classList.toggle('actived');
          }
          /*if (!e.currentTarget.classList.contains('actived')) {
            e.currentTarget.classList.toggle('actived');
          }*/
          e.currentTarget.classList.toggle('actived');
          if (e.target.childNodes[1].classList.contains('down')) {
            e.target.childNodes[1].classList.remove('down');
            e.target.childNodes[1].classList.add('up');
          }
          
          modalMenu.classList.remove('d-none');
          modalMenu.classList.add('d-block');
          logoblack.classList.remove('d-none');  
          logoblack.classList.add('d-block');
          logowhite.classList.add('d-none');
          logowhite.classList.add('d-block');
          //console.log('abrindo menu principal')
        });
      }
    }
    
    modalMenu = document.getElementById('modal-menu');
    if(modalMenu) {
      modalMenu.addEventListener('click', (e) => {
        e.currentTarget.classList.remove('d-block');
        e.currentTarget.classList.add('d-none');
        mainMenu.classList.remove('actived');
        for (let j = 0; j < menuInicialItem.length; j++) {
          menuInicialItem[j].classList.remove('actived');
          menuInicialItem[j].childNodes[1].childNodes[1].classList.add('down');
          menuInicialItem[j].childNodes[1].childNodes[1].classList.remove('up');
          //console.log(menuInicialItem[j].childNodes[1]);
        }
        //console.log('fechando menu principal')
        //mainMenu
      })
    }
    /*const click_onde_encontrar = document.getElementById("click-onde-encontrar");

    click_onde_encontrar.addEventListener("click", (event) => {
      Qual a sua cidade?
    });
    */
    if($('.slide-novidades')) {
      $('.slide-novidades').slick({
        dots: false,
        slidesToShow: 3,
        slidesToScroll: 1,
        infinite: false,
        appendArrows: '.arrows-novidades-desktop',
        responsive: [
          {
            breakpoint: 1200,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1,
              appendArrows: '.arrows-novidades-mobile',
            }
          }
        ]
      });
    }
    
    btn_mobile = document.getElementById('button-mobile');
    if(btn_mobile) {
      containerMenuMobile = document.getElementById('container-menu-mobile');
      btn_mobile.addEventListener('click', (e) => {
        /*containerMenuMobile.style.display = (containerMenuMobile.style.display === 'none') ? 'block' : 'none';   */
        containerMenuMobile.classList.add('actived'); 
        //console.log('abrindo primeiro nível menu mobile')
      }); 
    }
    const menuInicialItemMobile = document.getElementsByClassName("bt-menu-inicial-item-mobile");
    if(menuInicialItemMobile) {
      for (let m = 0; m < menuInicialItemMobile.length; m++) {
        
        menuInicialItemMobile[m].addEventListener('click', (e) => {
          e.currentTarget.parentNode.classList.toggle('actived');
          //console.log('abrindo segundo nível menu mobile')
        })
      }
    }
    
    const close = document.getElementsByClassName("close");
    if(close) {
      const miim = document.getElementsByClassName("menu-inicial-item-mobile");
      for (let c = 0; c < close.length; c++) {
        close[c].addEventListener('click', (e) => {
          containerMenuMobile.classList.remove('actived'); 
          for (let j = 0; j < miim.length; j++) {
            miim[j].classList.remove('actived');
          }
          //console.log('fechando primeiro nível menu mobile')
        }); 
      }
    }

    const voltar = document.getElementsByClassName("voltar");
    if(voltar) {
      for (let v = 0; v < voltar.length; v++) {
        voltar[v].addEventListener('click', (e) => {
          menuIicialItem = e.currentTarget.parentNode.parentNode.parentNode.parentNode;
          menuIicialItem.classList.remove('actived')
          //e.currentTarget.classList.remove('actived'); 
          //console.log('voltando para o primeiro nível menu mobile')
        }); 
      }
    }

    
  });
})(jQuery); 
