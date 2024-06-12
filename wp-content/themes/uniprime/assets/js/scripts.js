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
    body = document.querySelector('body');
    window.addEventListener('resize', checkResize);

    const topBar = document.querySelector('.top-bar');
    let lastScrollY = window.scrollY;

    window.addEventListener('scroll', () => {
      //console.log(window.scrollY);
      if (window.scrollY < 55) {
        mainMenu.classList.remove('fixed');
        $('#main-menu').css('top', 'unset');
        $('#main-menu').css('opacity', '1');
      }
      
      if (window.scrollY < 1) {
        topBar.classList.remove('fixed');
        //$('body').css('paddingTop', 0);
        $('.top-bar').css('top', 'unset');
        $('.top-bar').css('opacity', '1');
      } else {
        // Scrolling up
        if (window.scrollY < lastScrollY) {          
          if(body.classList.contains('admin-bar')) {
            if(window.scrollY > 48) {
              $('.top-bar').css('top', 32);
              $('.top-bar').css('opacity', '1');
              topBar.classList.add('fixed');
            }
            if(window.scrollY > 258) {
              mainMenu.classList.add('fixed');
              $('#main-menu').css('top', 80);
              $('#main-menu').css('opacity', '1');
            }
          } else {
            if(window.scrollY > 48) {
              $('.top-bar').css('top', 0);
              $('.top-bar').css('opacity', '1');
              topBar.classList.add('fixed');
            }
            if(window.scrollY > 178) {
              mainMenu.classList.add('fixed');
              $('#main-menu').css('top', 48);
              $('#main-menu').css('opacity', '1');
            }
          }
          //$('body').css('paddingTop', 48);
        } else {
          // Scrolling down
          if(body.classList.contains('admin-bar')) {
            if(window.scrollY > 48) {
              $('.top-bar').css('top', 32);
              $('.top-bar').css('opacity', '0');
              topBar.classList.remove('fixed');
            }
            
            if(window.scrollY > 258) {
              $('#main-menu').css('top', 80);
              $('#main-menu').css('opacity', '0');
              mainMenu.classList.remove('fixed');
            }
          } else {
            if(window.scrollY > 48) {
              $('.top-bar').css('top', 0);
              $('.top-bar').css('opacity', '0');
              topBar.classList.remove('fixed');
            }
            
            if(window.scrollY > 178) {
              $('#main-menu').css('top', 48);
              $('#main-menu').css('opacity', '0');
              mainMenu.classList.remove('fixed');
            }
          }
          //$('body').css('paddingTop', 0);
        }
        lastScrollY = window.scrollY;
      }
    });
    function checkResize () {      
      
      var height_dots = $('.slick-dots').height();
      var height_hero = $('.hero-banner').height();

      if (window.innerWidth < 992) {
        //mainMenu.target.classList.add('actived');
        if(mainMenu) {
          if (!mainMenu.classList.contains('isMobile')) {
            mainMenu.classList.toggle('isMobile');
            if (mainMenu.classList.contains('para-voce')) {
              //$(".logo-black").removeClass('d-none') 
              //$(".logo-white").addClass('d-none') 
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
        var fixPLMenu = document.getElementsByClassName('fix-padding-left-menu');
        var fixPR = document.getElementsByClassName('fix-padding-right');

        for (var i = 0; i < fixPL.length; i++) {
          if(fixPL) {
            fixPL[i].style.paddingLeft = calculo +'px';
          }       
        }
        for (var i = 0; i < fixPLMenu.length; i++) {
          if(fixPLMenu) {
            fixPLMenu[i].style.paddingLeft = (calculo+30) +'px';
            fixPLMenu[i].style.backgroundPosition = (calculo) +'px';
          }
        }
        for (var i = 0; i < fixPR.length; i++) {
          if(fixPR) {
            fixPR[i].style.paddingRight = calculo +'px';
          }
        }
        $('.page-id-55 section.canais-digitais.layout-4 .canais-digitais-image img').css('right', -(calculo-40));
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
          appendDots: '.dots-hero',
          autoplay: true,
          autoplaySpeed: 6000,
          fade: true,
          cssEase: 'linear'
          
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
    
    //const path = window.location.pathname;

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
          if(logowhite && mainMenu.classList.contains('para-voce') ) {
            /*logowhite.classList.add('d-none');
            logowhite.classList.remove('d-block');
            logoblack.classList.remove('d-none');  
            logoblack.classList.add('d-block');*/
          }
          modalMenu.classList.remove('d-none');
          modalMenu.classList.add('d-block');
        } else {          
          openSearchButton.classList.remove('icon-close-gold');
          openSearchButton.classList.add('icon-search');
          searchMenuOpened = false;
          mainMenu.classList.remove('actived');
          if(logowhite && mainMenu.classList.contains('para-voce') ) {
            /*logowhite.classList.add('d-block');
            logowhite.classList.remove('d-none');
            logoblack.classList.remove('d-block');  
            logoblack.classList.add('d-none');*/
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
        menuItem.classList.toggle('actived');
        if (menuItem.childNodes[1].childNodes[1].classList.contains('down')) {
          menuItem.childNodes[1].childNodes[1].classList.remove('down');
          menuItem.childNodes[1].childNodes[1].classList.add('up');
        }
      
        //ajusta comportamento da div de modal (com fundo escuro e transparente)
        modalMenu.classList.remove('d-none');
        modalMenu.classList.add('d-block');
        // troca as logos 
        //para-cooperativa
        //para-empresa

      //console.log('ativando menu',mainMenu.classList.contains('isMobile'));
        //console.log(logowhite.classList);
        if( logowhite && mainMenu.classList.contains('para-voce') ) {
          /*logowhite.classList.add('d-none');
          logowhite.classList.remove('d-block');
          logoblack.classList.remove('d-none');  
          logoblack.classList.add('d-block');*/
        }
      }
      //console.log('abrindo menu principal')
    }
    function desativaMenu (menuItem) {
      if(!searchMenuOpened) {
        for (let j = 0; j < menuInicialItem.length; j++) {
          //remove class actived dos elementos do menu, pra lá embaixo ativar o selecionado
          menuInicialItem[j].classList.remove('actived');
          // muda direção das arrows quando desselecionado
          menuInicialItem[j].childNodes[1].childNodes[1].classList.add('down');
          menuInicialItem[j].childNodes[1].childNodes[1].classList.remove('up');
        }
        console.log('mainMenu', mainMenu.classList.contains('hero-banner-menu'));
        if(!mainMenu.classList.contains('para-cooperativa') && !mainMenu.classList.contains('para-empresa') || mainMenu.classList.contains('hero-banner-menu')) {
          mainMenu.classList.remove('actived');
        }
        menuItem.classList.remove('actived');
        if(logowhite && mainMenu.classList.contains('para-voce') ) {
          /*logowhite.classList.add('d-block');
          logowhite.classList.remove('d-none');
          logoblack.classList.remove('d-block');  
          logoblack.classList.add('d-none');*/
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

    //modal tenho interesse
    var modalTenhoInteresse = document.getElementById("modalTenhoInteresse");
    var closemodalTenhoInteresse = document.getElementById("closemodalTenhoInteresse");

    if(closemodalTenhoInteresse){
      closemodalTenhoInteresse.onclick = function() {
        modalTenhoInteresse.style.display = "none";
        $('.content-interesse').hide();
        $('#content-interesse-1').show();
      }
    }
    window.onclick = function(event) {
      if (event.target == modalTenhoInteresse) {
        modalTenhoInteresse.style.display = "none";
      }
    } 
  });  
})(jQuery); 

jQuery(document).ready(function($) {
  // Abra o modal ao carregar a página
  // MODAL SINGULARES
  var singularesModal = document.getElementById("singularesModal");
  var btnOpenModalSingulares = document.getElementById("openModalSingulares");
  var btnOpenModalSingularesMobile = document.getElementById("openModalSingularesMobile");
  
  var closeSingularesModal = document.getElementById("closeSingularesModal");
  const singularesList = $('#singularesList');
  const conveniadasList = $('#conveniadasList');
  // Obtém a URL atual
  var currentUrl = window.location.pathname;
      
  function setCookie(cname, cvalue, exdays) {
    //console.log(cname, cvalue, exdays);
    var d = new Date();
    d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
    var expires = "expires=" + d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
  }

  function getCookie(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for (var i = 0; i < ca.length; i++) {
      var c = ca[i];
      while (c.charAt(0) == ' ') {
        c = c.substring(1);
      }
      if (c.indexOf(name) == 0) {
        return c.substring(name.length, c.length);
      }
    }
    return "";
  }

  function checkCookie() {
    var user = getCookie("selectedSingular");
    if (user != "") {
      //console.log("Singular já escolhida: " + user);
    } else {
      //console.log("Nenhuma singular escolhida.");
      openModalSingulares();
    }
  }
  checkCookie();

  function getSingularName() {    
    let isCentral = true;
    var basePath = currentUrl.split('/')[1] ? '/' + currentUrl.split('/')[1] : '/';
    
    const singularesList = $('#singularesList');
    const conveniadasList = $('#conveniadasList');
    singularesList.innerHTML = ''; // Limpar a lista antes de adicionar itens
    
    agenciasData.singulares.find(function(data) {      
      let actived = '';
      let textActived = '';
      let target = '';
      let classSing = '';
      //console.log('isCentral: ', data.url,data.type,basePath);
      if(basePath == data.url) {
        actived = 'actived';
        textActived = '<span style="font-size: 14px; font-weight: normal">Continuar na</span><br/>';
        $('#singular-name').html(data.singular);
        $('#singular-name-mobile').html(data.singular); 
        isCentral = false;
      } 
      
      if(data.type === 'principal' || data.type === 'singular' || data.type === 'prestadora') {
        target = '_SELF';
        classSing = 'singular-link';
      } else {
        target = '_blank';

      }
      const agencyHtml = `
      <div class="card-singulares ${actived}">
        <a href="${data.url}" target="${target}" role="button" class="${classSing}" data-singular="${data.id}" tabindex="0">${textActived} ${data.singular}<i class="arrow right"></i>
        </a>
      </div>`;
      if(data.type === 'principal' || data.type === 'singular' || data.type === 'prestadora') {
        singularesList.append(agencyHtml);
      } else {
        conveniadasList.append(agencyHtml);
      }
    });
    
    if(isCentral) {
      $('#singular-name').html('Uniprime Central Nacional');
      $('#singular-name-mobile').html('Uniprime Central Nacional'); 
    }
  }
  
  getSingularName()
  document.querySelectorAll('.singular-link').forEach(link => {
    link.addEventListener('click', function() {
      //console.log(this.dataset.singular);
      setCookie("selectedSingular", this.dataset.singular, 365);
    });
  });
  function openModalSingulares() {
    singularesModal.style.display = "block";
  }
  if(btnOpenModalSingulares) {
    btnOpenModalSingulares.onclick = function() {
      openModalSingulares();
    }
  }
  if(btnOpenModalSingularesMobile) {
    btnOpenModalSingularesMobile.onclick = function() {
      openModalSingulares();
    }
  }
  if(closeSingularesModal) {    
    closeSingularesModal.onclick = function() {
      singularesModal.style.display = "none";
    }
  }

  window.onclick = function(event) {
    if (event.target == singularesModal) {
      singularesModal.style.display = "none";
    }
  }

  window.abreContentModalContato = function(id) {
    $('.content-interesse').hide();
    $('#content-interesse-'+id).show();
  }

  // Sua função abreModalInteresse
  window.abreModalInteresse = function(button) {
    // Obtenha os valores dos atributos data-* do botão clicado
    const title_card = $(button).data('title_card');
    const label_interesse = $(button).data('label_interesse');
    const title_interesse = $(button).data('title_interesse');
    const description_interesse = $(button).data('description_interesse');
    const habilitar = $(button).data('habilitar');
    const texto_telefone = $(button).data('texto_telefone');
    const texto_whatsapp = $(button).data('texto_whatsapp');
    const numero_whatsapp = $(button).data('numero_whatsapp');
    const id_form = $(button).data('id_form');
    let whats = '';
    // Trate as diferentes opções do array 'habilitar'
    habilitar.forEach(opcao => {
      switch (opcao) {
        case 'Telefone':
          $("#btn-telefone").show()
          break;
        case 'Whatsapp':
          $("#btn-whatsapp").show()
          break;
        case 'E-mail':
          $("#btn-email").show()
          break;
      }
    });
    // remove parentheses on "num_whatsapp = (45)32525030"
    let num_whatsapp = numero_whatsapp.replace(/\s/g, '').replace(/-/g, '').replace(/[()]/g, '');
    let mensagem = encodeURIComponent("Olá, tenho interesse em mais informações sobre "+title_card); // Mensagem predefinida
    if(/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)){
      // true for mobile device
      whats = '<a class="button btn-primary btn icon-menu icon-whatsapp-white" onclick="window.open(\'whatsapp://send?phone=55'+num_whatsapp+ '?text=' + mensagem + '\')">Whatsapp</a>';
    }else{
      // false for not mobile device
      whats = '<a class="button btn-primary btn icon-menu icon-whatsapp-white" onclick="window.open(\'https://wa.me/55'+num_whatsapp+ '?text=' + mensagem + '\')">Whatsapp</a>';
    }
    
    $("#label-block-interesse").html(label_interesse);
    $("#title-block-interesse").html(title_interesse);
    $("#description-block-interesse").html(description_interesse);
    $("#content-telefone").html(texto_telefone);
    $("#content-whatsapp").html(texto_whatsapp);
    $("#btn-whatsapp").html(whats);
    
    $("#description-block-interesse").html(description_interesse);

    modalTenhoInteresse.style.display = "block";

    // Faz a chamada AJAX para carregar o formulário
    /*$.ajax({
      url: ajax_object.ajax_url,
      type: 'POST',
      data: {
        action: 'load_assunto',
        form_id: id_form,
        mensagem: mensagem
      },
      success: function(response) {
        // Insere o formulário carregado no modal
        //$('#content-form-interesse').html(response.data.form_html);
        //let mensagemDecodificada = decodeURIComponent(response.data.mensagem);
        console.log(response.data);
        //$('#select-assunto').val(mensagemDecodificada);
        // Certifica-se de que os scripts do Gravity Forms são executados
        
      },
      error: function(error) {
        console.log('Erro ao carregar o formulário:', error);
      }
    });*/
  }
  fixedFooterButton = document.getElementById('fixed-footer-button');
  fixedFooterContent = document.getElementById('fixed-footer-content');
  $('#fixed-footer-button').on('click', function() {
    $('#fixed-footer-form').toggle();
    $('#fixed-footer-content').toggle();
  });
  $('#closeFooterForm').on('click', function() {
    $('#fixed-footer-form').toggle();
    $('#fixed-footer-content').toggle();
  });
  
  fixedFooterContent.addEventListener('mouseover', (e) => {
    $('#fixed-footer-text').addClass('actived');
  });
  fixedFooterContent.addEventListener('mouseleave', (e) => {
    $('#fixed-footer-text').removeClass('actived');
  });    
});