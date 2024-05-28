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
              /*$("#modal-menu").addClass('d-block')*/
            }
          }
          $('.dots-hero').css('top','auto').css('height','auto');
        }
      } else {
        if(mainMenu) {
          if (mainMenu.classList.contains('isMobile')) {
            //console.log('isMobile');
            mainMenu.classList.toggle('isMobile');
          }
          $('.dots-hero').css('top',((height_hero/2)-(height_dots/2))).height(height_dots);
        }
        var cardInvestimentos = $('.bloco-investimentos .card-bbc .description');
        if(cardInvestimentos) {
          var maxHeight = 0;
          for (var i = 0; i < cardInvestimentos.length; i++) {
            if (maxHeight < $(cardInvestimentos[i]).outerHeight()) {
              maxHeight = $(cardInvestimentos[i]).outerHeight();
            }
          }
          // Set ALL card bodies to this height
          for (var i = 0; i < cardInvestimentos.length; i++) {
            $(cardInvestimentos[i]).height(maxHeight);
          }
        }
      }
      topBarContainer = document.querySelector('#top-bar-container');
      if(topBarContainer) {
        var width_screen = topBarContainer.parentNode.offsetWidth
        var width_topBarContainer = topBarContainer.offsetWidth;
        var calculo = ( width_screen - width_topBarContainer ) / 2;
        var fixPL = document.getElementsByClassName('fix-padding-left');
        for (var i = 0; i < fixPL.length; i++) {
          fixPL[i].style.paddingLeft = calculo +'px';
          //console.log(maxHeight);
          
        }
      } 
      
      if($('.menu-footer-solucoes')) {
        var height_footer_menu = $('.footer-menu').outerHeight();
        $('.dc-footer').height(height_footer_menu);      
      }     
    }
    
    var initializeBlock = function( $block ) {
      checkResize ()
      if($('.hero-banner')) {
        $('.hero-banner').slick({
          dots: true,
          infinite: false,
          appendDots: '.dots-hero'
        });
      }
      if($('.slide-nossos-produtos')) {
        $('.slide-nossos-produtos').not('.slick-initialized').slick({
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
      }
      
      if($('.slide-nossos-produtos-short')) {
        $('.slide-nossos-produtos-short').not('.slick-initialized').slick({
          dots: false,
          slidesToShow: 3,
          slidesToScroll: 3,
          infinite: false,
          appendArrows: '.arrows-nossos-produtos-desktop',
          rows: 1,
          responsive: [
            {
              breakpoint: 1200,
              settings: {
                slidesToShow: 2,
                slidesToScroll: 2,
                appendArrows: '.arrows-nossos-produtos-desktop',
              }
            },
            {
              breakpoint: 992,
              settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                appendArrows: '.arrows-nossos-produtos-mobile',
              }
            }
          ]
        });
      }
       
      
      if($('.slide-nossa-historia')) {
        $('.slide-nossa-historia').not('.slick-initialized').slick({
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
        
        var cards = $('.slide-nossa-historia .slick-slide .content-card');
        var maxHeight = 0;
        for (var i = 0; i < cards.length; i++) {
          if (maxHeight < $(cards[i]).outerHeight()) {
            maxHeight = $(cards[i]).outerHeight();
            //console.log(maxHeight);
          }
        }
        // Set ALL card bodies to this height
        for (var i = 0; i < cards.length; i++) {
          $(cards[i]).height(maxHeight);
        }
      }
      /* SLICK Benefícios Institucional */
      if($('.slide-beneficios')) {
        $('.slide-beneficios').not('.slick-initialized').slick({
          dots: false,
          slidesToShow: 1,
          slidesToScroll: 1,
          infinite: false,
          appendArrows: '.arrows-beneficios-desktop',
          responsive: [
            {
              breakpoint: 992,
              settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                appendArrows: '.arrows-beneficios-mobile',
              }
            }
          ]
        });
      }
      
    }
    initializeBlock();
    
    // Initialize dynamic block preview (editor).
    if( window.acf ) {
        window.acf.addAction( 'render_block_preview', initializeBlock );
    }

    const triggerTabList = document.querySelectorAll('#tabs-politicas button')
    triggerTabList.forEach(triggerEl => {
      const tabTrigger = new bootstrap.Tab(triggerEl)
      triggerEl.addEventListener('click', event => {
        /*console.log(event);*/
        event.preventDefault()
        tabTrigger.show()
      })
    })
    btn_select_politica = document.getElementById('select-politica');
    if(btn_select_politica) {
      navPoliticasMobile  = document.getElementById('nav-politicas-mobile');
      btn_select_politica.addEventListener('click', (e) => {
        /*navPoliticasMobile .style.display = (navPoliticasMobile .style.display === 'none') ? 'block' : 'none';   */
        navPoliticasMobile .classList.add('actived'); 
        //console.log('abrindo primeiro nível menu mobile')
      }); 
    }
    // CLICK OR MOUSEOVER EVENT FOR MENU DROP DOWN
    
    // - THIS IS FOR DEMO, TO CHECK IF mainMenu WAS HOVERED -
    /*mainMenu.addEventListener('mouseover', (e) => {
      console.log('mouseenter');
      mainMenu.classList.add('actived');
    });
    mainMenu.addEventListener('mouseleave', (e) => {
      console.log('mouseout');
      mainMenu.classList.remove('actived');
    });*/
    logoblack = document.getElementById('logo-black'); 
    logowhite = document.getElementById('logo-white');
    const menuInicialItem = document.getElementsByClassName("menu-inicial-item");
    const openSearchButton = document.getElementById("open-search");
    const menuSearch = document.getElementById("menu-search");
    let searchMenuOpened = false;

    if(openSearchButton) {
      openSearchButton.addEventListener('click', (e) => {
        menuSearch.classList.toggle('actived');
        if(!searchMenuOpened) {
          openSearchButton.classList.remove('icon-search');
          openSearchButton.classList.add('icon-close-gold');
          searchMenuOpened = true;
          mainMenu.classList.add('actived');
          if(logowhite) {
            logowhite.classList.add('d-none');
            logowhite.classList.remove('d-block');
            logoblack.classList.remove('d-none');  
            logoblack.classList.add('d-block');
          }
          modalMenu.classList.remove('d-none');
          modalMenu.classList.add('d-block');
        } else {          
          openSearchButton.classList.remove('icon-close-gold');
          openSearchButton.classList.add('icon-search');
          searchMenuOpened = false;
          mainMenu.classList.remove('actived');
          if(logowhite) {
            logowhite.classList.add('d-block');
            logowhite.classList.remove('d-none');
            logoblack.classList.remove('d-block');  
            logoblack.classList.add('d-none');
          }
          modalMenu.classList.remove('d-block');
          modalMenu.classList.add('d-none');
        }
      });
    }
    // função pra mudar comportamento dos elementos do menu quando um item estiver ativo
    if(menuInicialItem) {
      for (let i = 0; i < menuInicialItem.length; i++) {        
        menuInicialItem[i].addEventListener('mouseover', (e) => {
          ativaMenu (e.currentTarget)
        });
        menuInicialItem[i].addEventListener('mouseleave', (e) => {
          desativaMenu (e.currentTarget)
        });
      }
        //menuInicialItem[i].addEventListener('click', (e) => {
        
        //});
    }
    function ativaMenu (menuItem) {
      if(!searchMenuOpened) {
        mainMenu.classList.add('actived');
        for (let j = 0; j < menuInicialItem.length; j++) {
          //remove class actived dos elementos do menu, pra lá embaixo ativar o selecionado
          menuInicialItem[j].classList.remove('actived');
          // muda direção das arrows quando desselecionado
          menuInicialItem[j].childNodes[1].childNodes[1].classList.add('down');
          menuInicialItem[j].childNodes[1].childNodes[1].classList.remove('up');
        }
        //if pra tratar quando o botão de search é clicado
        
        //mainMenu = document.getElementById("main-menu");
        //console.log('mainMenu', mainMenu);
        /*if (!mainMenu.classList.contains('actived')) {
          mainMenu.classList.toggle('actived');
        }
        */
        menuItem.classList.toggle('actived');
        if (menuItem.childNodes[1].childNodes[1].classList.contains('down')) {
          menuItem.childNodes[1].childNodes[1].classList.remove('down');
          menuItem.childNodes[1].childNodes[1].classList.add('up');
        }
      
        //ajusta comportamento da div de modal (com fundo escuro e transparente)
        modalMenu.classList.remove('d-none');
        modalMenu.classList.add('d-block');
        // troca as logos 
        
        //console.log(logowhite.classList);
        if(logowhite) {
          logowhite.classList.add('d-none');
          logowhite.classList.remove('d-block');
          logoblack.classList.remove('d-none');  
          logoblack.classList.add('d-block');
        }
      }
      //console.log('abrindo menu principal')
    }
    function desativaMenu (menuItem) {
      if(!searchMenuOpened) {
        mainMenu.classList.remove('actived');
        menuItem.classList.remove('actived');
        if(logowhite) {
          logowhite.classList.add('d-block');
          logowhite.classList.remove('d-none');
          logoblack.classList.remove('d-block');  
          logoblack.classList.add('d-none');
        }
        modalMenu.classList.remove('d-block');
        modalMenu.classList.add('d-none');
      }
      /*console.log(menuItem);
      if (!mainMenu.classList.contains('actived')) {
        mainMenu.classList.toggle('actived');
      }*/
    }
    modalMenu = document.getElementById('modal-menu');
    if(modalMenu) {
      modalMenu.addEventListener('click', (e) => {
        e.currentTarget.classList.remove('d-block');
        e.currentTarget.classList.add('d-none');
        mainMenu.classList.remove('actived');
        for (let j = 0; j < menuInicialItem.length; j++) {
          //console.log(menuInicialItem[j]);
          //if pra excluir o botão de search quando clicado
          if (menuInicialItem[j] != openSearchButton) {
            menuInicialItem[j].classList.remove('actived');
            menuInicialItem[j].childNodes[1].childNodes[1].classList.add('down');
            menuInicialItem[j].childNodes[1].childNodes[1].classList.remove('up');
          }
        }
        if(searchMenuOpened) {
          openSearchButton.classList.remove('icon-close-gold');
          openSearchButton.classList.add('icon-search');
          searchMenuOpened = false;
          mainMenu.classList.remove('actived');
          if(logowhite) {
            logowhite.classList.add('d-block');
            logowhite.classList.remove('d-none');
            logoblack.classList.remove('d-block');  
            logoblack.classList.add('d-none');
          }
        }
        
        //console.log('fechando menu principal')
        //mainMenu
      })
    }
    
    if($('.slide-novidades')) {
      $('.slide-novidades').not('.slick-initialized').slick({
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
      var cardsNovidades = $('.slide-novidades .slick-slide .card-post .title-block');
      var maxHeight = 0;
      for (var i = 0; i < cardsNovidades.length; i++) {
        if (maxHeight < $(cardsNovidades[i]).outerHeight()) {
          maxHeight = $(cardsNovidades[i]).outerHeight();
        }
        //console.log(maxHeight);
      }
      // Set ALL card bodies to this height
      for (var i = 0; i < cardsNovidades.length; i++) {
        $(cardsNovidades[i]).height(maxHeight -30);
      }
    }
    
    btn_mobile = document.getElementById('button-mobile');
    if(btn_mobile) {
      containerMenuMobile = document.getElementById('container-menu-mobile');
      btn_mobile.addEventListener('click', (e) => {
        containerMenuMobile.classList.add('actived'); 
        document.body.style.overflowY = "hidden";
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
    const clickSearchMobile = document.getElementsByClassName("click-search-mobile");
    const menuInicialItemMobileSearch = document.getElementsByClassName("menu-inicial-item-mobile-search");
    if(clickSearchMobile) {
      for (let csm = 0; csm < clickSearchMobile.length; csm++) {
        
        clickSearchMobile[csm].addEventListener('click', (e) => {
          e.currentTarget.parentNode.parentNode.parentNode.parentNode.classList.toggle('actived');
          for (let miims = 0; miims < menuInicialItemMobileSearch.length; miims++) {
            menuInicialItemMobileSearch[miims].classList.toggle('actived');
          }
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
            document.body.style.overflowY = "auto";
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
          console.log(e.currentTarget.parentNode.parentNode.parentNode)
          menuIicialItem.classList.remove('actived')
          //e.currentTarget.classList.remove('actived'); 
          //console.log('voltando para o primeiro nível menu mobile')
        }); 
      }
    }  

    if($('.slide-assembleias')) {
      $('.slide-assembleias').not('.slick-initialized').slick({
        dots: false,
        slidesToScroll: 1,
        infinite: false,
        appendArrows: '.arrows-assembleias-desktop',
        slidesPerRow:2 ,
        rows: 3,
        responsive: [
          {
            breakpoint: 992,
            settings: {
              slidesPerRow: 1,
              rows: 1,
              appendArrows: '.arrows-assembleias-mobile',
            }
          }
        ]
      });
      var cards = $('.slide-assembleias .slick-slide .content-card');
      var maxHeight = 0;
      for (var i = 0; i < cards.length; i++) {
        if (maxHeight < $(cards[i]).outerHeight()) {
          maxHeight = $(cards[i]).outerHeight();
          console.log(maxHeight);
        }
      }
      // Set ALL card bodies to this height
      for (var i = 0; i < cards.length; i++) {
        $(cards[i]).height(maxHeight);
      }
    } 

    if($('.slide-proximas-assembleias')) {
      $('.slide-proximas-assembleias').not('.slick-initialized').slick({
        dots: false,
        slidesToShow: 2,
        slidesToScroll: 2,
        infinite: false,
        appendArrows: '.arrows-proximas-assembleias-desktop',
        responsive: [
          {
            breakpoint: 1200,
            settings: {
              slidesToShow: 2,
              slidesToScroll: 2,
              appendArrows: '.arrows-proximas-assembleias-desktop',
            }
          },
          {
            breakpoint: 992,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1,
              appendArrows: '.arrows-proximas-assembleias-mobile',
            }
          }
        ]
      });
      var cards = $('.slide-proximas-assembleias .slick-slide .content-card');
      var maxHeight = 0;
      for (var i = 0; i < cards.length; i++) {
        if (maxHeight < $(cards[i]).outerHeight()) {
          maxHeight = $(cards[i]).outerHeight();
        }
      }
      // Set ALL card bodies to this height
      for (var i = 0; i < cards.length; i++) {
        $(cards[i]).height(maxHeight);
      }
    } 
    
    if($('.slide-relatorios-transparencia')) {
      $('.slide-relatorios-transparencia').not('.slick-initialized').slick({
        dots: false,
        slidesToShow: 3,
        slidesToScroll: 3,
        infinite: false,
        appendArrows: '.arrows-relatorios-transparencia-desktop',
        rows: 1,
        responsive: [
          {
            breakpoint: 1400,
            settings: {
              slidesToShow: 2,
              slidesToScroll: 2,
              rows: 1,
              appendArrows: '.arrows-relatorios-transparencia-desktop',
            }
          },
          {
            breakpoint: 992,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1,
              rows: 3,
              appendArrows: '.arrows-relatorios-transparencia-mobile',
            }
          }
        ]
        
      });
    }

    if($('.slide-relatorios-balanco')) {
      $('.slide-relatorios-balanco').not('.slick-initialized').slick({
        dots: false,
        slidesPerRow: 4,
        slidesToScroll: 4,
        infinite: false,
        rows: 3,
        appendArrows: '.arrows-relatorios-balanco-desktop',
        responsive: [
          {
            breakpoint: 1400,
            settings: {
              slidesPerRow: 2,
              slidesToScroll: 2,
              rows: 3,
              appendArrows: '.arrows-relatorios-balanco-desktop',
            }
          },
          {
            breakpoint: 992,
            settings: {
              slidesPerRow: 1,
              slidesToScroll: 1,
              rows: 4,
              appendArrows: '.arrows-relatorios-balanco-mobile',
            }
          }
        ]
      });
    }  
    
  });
  
  
})(jQuery); 
