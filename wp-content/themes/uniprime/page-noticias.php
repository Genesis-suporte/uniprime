<?php

/**
 * Template Name: Página de notícias
 */
get_header(); 

$upload_dir = wp_upload_dir();
$upload_url = $upload_dir['baseurl']; 
/*
$get_campanhas_id = array(
  'fields'      => 'ids',
  'numberposts' => 5,
  'post_type'   => 'campanha'
);
*/
$title_banner = get_field('title_banner');
$description_banner = get_field('description_banner');
$image_banner = get_field('image_banner');

$array_fique_por_dentro = array(
  'post_type'   => array( 'noticia', 'campanha', 'sala-imprensa' ),
  'posts_per_page' => -1,/*,
  'meta_key'       => 'data_assembleia',
  'orderby'        => 'meta_value',
  'order'          => 'DESC'*/
);

$get_fique_por_dentro = get_posts( $array_fique_por_dentro );

?>
<div class="banner-internas position-relative">
  <div class="hero-image">
    <div class="image" style="background-image: url(<?php echo esc_url($image_banner['url']); ?>);">
      <!--<img src="<?php echo esc_url($image_banner['url']); ?>" alt="<?php echo esc_html($image_banner['alt']); ?>" >-->
    </div>
    <div class="container">
      <div class="position-absolute copy">
        <?php if($title_banner) { ?>
          <h1 class="title title-48 switzerlandLight">
            <?php echo esc_html($title_banner); ?>
          </h1>
        <?php } ?>
        <?php if($description_banner) { ?>
          <h1 class="description title-24 switzerlandBold">
            <?php echo esc_html($description_banner); ?>
          </h1>
        <?php } ?>
        <div class="botoes-fique-por-dentro">
          <div class="d-flex">
            <div class="button-fique-por-dentro">
              <span class="btn actived" id="btn-noticias">Notícias</span>
            </div>
            <div class="button-fique-por-dentro">
              <a href="/campanhas/" class="btn" id="btn-campanhas">Campanhas</a>
            </div>
            <div class="button-fique-por-dentro">
              <a href="/sala-de-imprensa/" class="btn" id="btn-sala-de-imprensa">Sala de imprensa</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- <div class="noticia-mobile d-flex d-lg-none flex-column">
  <div class="select-noticia" id="select-noticia">
    <?php echo the_title().'<i class="arrow down"></i>'; ?>
  </div>
  <div class="nav-noticia-mobile" id="nav-noticia-mobile">
    <div class="container-menu-noticia-mobile d-flex flex-column">
      <div>
        <div class="header-content-mobile d-flex flex-column">
          <button class="slick-next slick-arrow voltar" aria-label="Next" type="button" style="" aria-disabled="false"></button>
          <div class="title-menu-mobile">Nossas noticias</div>
        </div>
        <div class="content-menu-mobile">
          <div class="option-noticia" id="option-noticia">
            <?php 
              //print_r($get_noticia); guid post_name
              foreach($get_fique_por_dentro as $key=>$get_noticia) {
                //echo get_post_permalink($get_noticia->ID);
                //echo get_permalink();
                ?>
                <div class="nav-item  <?php echo (get_permalink()===get_post_permalink($get_noticia->ID)) ? 'active': '';?>">
                  <a href="<?php echo get_post_permalink($get_noticia->ID);?>"class="nav-link d-flex align-items-center" id="tab-<?php echo $key;?>"><?php echo $get_noticia->post_title; ?><i class="arrow right"></i></a>
                </div>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div> -->
<?php
if (file_exists(get_template_directory() . '/blocks/breadcrumbs.php')) {
  include(get_template_directory() . '/blocks/breadcrumbs.php');
}
?>
<?php 
  $label_destaques = get_field('label_destaques');
  $titulo_destaques = get_field('titulo_destaques');
  $descricao_destaques = get_field('descricao_destaques');

  
  $label_novidades = get_field('label_novidades');
  $titulo_novidades = get_field('titulo_novidades');
  $descricao_novidades = get_field('descricao_novidades');
?>
<section class="bloco-noticias-destaque">
  <div class="container">
    <div class="row d-flex justify-content-between flex-column flex-lg-row">
      <div class="content-bloco-destaque">
        <div class="label-block">
          <?php if($label_destaques) { ?>
            <?php echo esc_html($label_destaques); ?>
          <?php } ?>
        </div>
        <div class="d-flex" <?php echo (!$descricao_novidades) ? 'style="padding-bottom: 48px"' : ''; ?>>
          <div class="title-block title-28 switzerlandBold flex-grow-1">
            <?php if($titulo_destaques) { ?>
              <?php echo esc_html($titulo_destaques); ?>
            <?php } ?>
          </div>
          <?php if(!$descricao_destaques) { ?>
            <div class="arrows-destaques-desktop d-none d-md-flex"></div>
          <?php } ?>
        </div>
        <?php if($descricao_destaques) { ?>
          <div class="d-flex" style="padding-bottom: 48px">
            <div class="description-block flex-grow-1">
              <?php echo esc_html($descricao_destaques); ?>
            </div>
            <div class="arrows-destaques-desktop d-none d-md-flex"></div>
          </div>
        <?php } ?>
        <div class="container-bloco-destaque">
          <div class="slide-destaques row">
            <?php 
            if ( $get_fique_por_dentro ) {
              foreach ( $get_fique_por_dentro as $key=>$post ) {
                if($post->destaque_home == 1) {
                  if($post->post_type == 'noticia') {//
                    $text_label = "Notícias ";
                  } else if($post->post_type == 'campanha') {
                    $text_label = "Campanhas ";
                  }else if($post->post_type == 'sala-de-imprensa') {
                    $text_label = "Sala de imprensa ";
                  }
                  $post_thumbnail_id = get_post_thumbnail_id();

                  // Verifica se há uma imagem em destaque
                  if ( $post_thumbnail_id ) {
                      // Obtém a URL da imagem em tamanho completo ('full')
                    $image_url = wp_get_attachment_image_src( $post_thumbnail_id, 'full' );

                    // Verifica se a URL foi obtida com sucesso
                    if ( $image_url ) {
                      // O caminho da imagem é o primeiro elemento da matriz retornada por wp_get_attachment_image_src()
                      $image_path = $image_url[0];

                      // Exibe o caminho da imagem
                      //echo $image_path;
                    }
                  }
                  ?>
                  <div class="card-post" >
                    <div class="thumbnail-card">
                      <a href="<?php echo esc_url($post->guid); ?>" target="_SELF">
                        <div class="img-post" style="background-image: url(<?php echo $image_path; ?>);">
                        </div>
                      </a>
                    </div>
                    <div class="container-post">
                      <div class="content-post">
                        <div class="category">
                          <a href="<?php echo $post->post_type; ?>" target="_SELF" class="icon-menu icon-logo">
                            <?php echo esc_html($text_label); ?>
                          </a>
                        </div>
                        <div class="title-block title-28 switzerlandBold">
                          <a href="<?php echo esc_url($post->guid); ?>" target="_SELF">
                            <?php echo esc_html($post->post_title); ?>
                          </a>
                        </div>
                        <div class="cta">
                          <a href="<?php echo esc_url($post->guid); ?>" target="_SELF" class="leia_mais">Leia mais <i class="arrow right"></i></a>
                        </div>
                      </div>
                    </div>
                  </div>
                <?php 
                }
              }
            }
            ?>
          </div>
        </div>        
        <div class="arrows-destaques-mobile arrows-mobile d-flex d-md-none justify-content-center"></div>
      </div>
    </div>
  </div>
</section>

<section class="bloco-noticias z-13">
  <div class="container">
    <div class="row d-flex justify-content-between flex-column flex-lg-row">
      <div class="content-bloco-destaque">
        <div class="label-block">
          <?php if($label_novidades) { ?>
            <?php echo esc_html($label_novidades); ?>
          <?php } ?>
        </div>
        <div class="d-flex" <?php echo (!$descricao_novidades) ? 'style="padding-bottom: 48px"' : ''; ?>>
          <div class="title-block title-28 switzerlandBold flex-grow-1">
            <?php if($titulo_novidades) { ?>
              <?php echo esc_html($titulo_novidades); ?>
            <?php } ?>
          </div>
          <?php if(!$descricao_novidades) { ?>
            <div class="arrows-noticias-novidades-desktop d-none d-md-flex"></div>
          <?php } ?>
        </div>
        <?php if($descricao_novidades) { ?>
          <div class="d-flex" style="padding-bottom: 48px">
            <div class="description-block flex-grow-1">
              <?php echo esc_html($descricao_novidades); ?>
            </div>
            <div class="arrows-novidades-desktop d-none d-md-flex"></div>
          </div>
        <?php } ?>
        <div class="container-bloco-destaque">
          <div class="slide-noticias-novidades row">
            <?php 
            if ( $get_fique_por_dentro ) {
              foreach ( $get_fique_por_dentro as $key=>$post ) : 
                if($post->post_type == 'noticia') {//
                  $text_label = "Notícias ";
                } else if($post->post_type == 'campanha') {
                  $text_label = "Campanhas ";
                }else if($post->post_type == 'sala-de-imprensa') {
                  $text_label = "Sala de imprensa ";
                }
                $post_thumbnail_id = get_post_thumbnail_id();

                // Verifica se há uma imagem em destaque
                if ( $post_thumbnail_id ) {
                    // Obtém a URL da imagem em tamanho completo ('full')
                  $image_url = wp_get_attachment_image_src( $post_thumbnail_id, 'full' );

                  // Verifica se a URL foi obtida com sucesso
                  if ( $image_url ) {
                    // O caminho da imagem é o primeiro elemento da matriz retornada por wp_get_attachment_image_src()
                    $image_path = $image_url[0];

                    // Exibe o caminho da imagem
                    //echo $image_path;
                  }
                }
                ?>
                <div class="card-post" >
                  <div class="thumbnail-card">
                    <a href="<?php echo esc_url($post->guid); ?>" target="_SELF">
                      <div class="img-post" style="background-image: url(<?php echo $image_path; ?>);">
                      </div>
                    </a>
                  </div>
                  <div class="container-post">
                    <div class="content-post">
                      <div class="category">
                        <a href="<?php echo $post->post_type; ?>" target="_SELF" class="icon-menu icon-logo">
                          <?php echo esc_html($text_label); ?>
                        </a>
                      </div>
                      <div class="title-block title-28 switzerlandBold">
                        <a href="<?php echo esc_url($post->guid); ?>" target="_SELF">
                          <?php echo esc_html($post->post_title); ?>
                        </a>
                      </div>
                      <div class="cta">
                        <a href="<?php echo esc_url($post->guid); ?>" target="_SELF" class="leia_mais">Leia mais <i class="arrow right"></i></a>
                      </div>
                    </div>
                  </div>
                </div>
              <?php 
              endforeach;
              
            }
            ?>
          </div>
        </div>        
        <div class="arrows-noticias-novidades-mobile arrows-mobile d-flex d-md-none justify-content-center"></div>
      </div>
    </div>
  </div>
</section>
<script type="text/javascript">
  (function($){
  window.addEventListener("load", ()=>{
    if($('.slide-destaques')) {
      $('.slide-destaques').not('.slick-initialized').slick({
        dots: false,
        slidesToShow: 2,
        slidesToScroll: 1,
        infinite: false,
        appendArrows: '.arrows-destaques-desktop',
        variableWidth: false,
        responsive: [
          {
            breakpoint: 1200,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1,
              appendArrows: '.arrows-destaques-mobile',
            }
          }
        ]
      });
      $('.slide-destaques').on('beforeChange', function(event, slick, currentSlide, nextSlide){
        //console.log(slick);
        // Define o tamanho do slide ativo como 2 de 3 colunas
        /*$('.slick-slide[data-slick-index="' + currentSlide + '"]').css('width', '66.66666667%');
          // Define o tamanho do próximo slide como 1 de 3 colunas
        $('.slick-slide[data-slick-index="' + nextSlide + '"]').css('width', '33.33333333%');
        //if(nextSlide === 1) {
            // Define o tamanho do próximo slide como metade do primeiro slide
            $('.slick-slide').css('width', '33.33333333%');
            $('.slick-slide[data-slick-index="' + currentSlide + '"]').css('width', '66.66666667%');
        //} else {
            // Define o tamanho padrão para todos os outros slides
            
        //}*/
      });
      var cardsDestaques = $('.slide-destaques .slick-slide .card-post .title-block');
      var maxHeight = 0;
      for (var i = 0; i < cardsDestaques.length; i++) {
        if (maxHeight < $(cardsDestaques[i]).outerHeight()) {
          maxHeight = $(cardsDestaques[i]).outerHeight();
        }
        //console.log(maxHeight);
      }
      // Set ALL card bodies to this height
      for (var i = 0; i < cardsDestaques.length; i++) {
        $(cardsDestaques[i]).height(maxHeight -30);
      }
    }
    if($('.slide-noticias-novidades')) {
      $('.slide-noticias-novidades').not('.slick-initialized').slick({
        dots: false,
        slidesToScroll: 1,
        infinite: false,
        appendArrows: '.arrows-noticias-novidades-desktop',
        slidesPerRow: 3,
        rows: 4,
        variableWidth: false,
        responsive: [
          {
            breakpoint: 1200,
            settings: {
              slidesPerRow: 1,
              slidesToScroll: 1,
              appendArrows: '.arrows-noticias-novidades-mobile',
            }
          }
        ]
      });
      $('.slide-noticias-novidades').on('beforeChange', function(event, slick, currentSlide, nextSlide){
        //console.log(slick);
        // Define o tamanho do slide ativo como 2 de 3 colunas
        /*$('.slick-slide[data-slick-index="' + currentSlide + '"]').css('width', '66.66666667%');
          // Define o tamanho do próximo slide como 1 de 3 colunas
        $('.slick-slide[data-slick-index="' + nextSlide + '"]').css('width', '33.33333333%');
        //if(nextSlide === 1) {
            // Define o tamanho do próximo slide como metade do primeiro slide
            $('.slick-slide').css('width', '33.33333333%');
            $('.slick-slide[data-slick-index="' + currentSlide + '"]').css('width', '66.66666667%');
        //} else {
            // Define o tamanho padrão para todos os outros slides
            
        //}*/
      });
      var cardsNoticiasDestaques = $('.slide-noticias-novidades .slick-slide .card-post .title-block');
      var maxHeight = 0;
      for (var i = 0; i < cardsNoticiasDestaques.length; i++) {
        if (maxHeight < $(cardsNoticiasDestaques[i]).outerHeight()) {
          maxHeight = $(cardsNoticiasDestaques[i]).outerHeight();
        }
        //console.log(maxHeight);
      }
      // Set ALL card bodies to this height
      for (var i = 0; i < cardsNoticiasDestaques.length; i++) {
        $(cardsNoticiasDestaques[i]).height(maxHeight -30);
      }
    }
    /*const btn_fique_por_dentro = document.querySelectorAll('.button-fique-por-dentro .btn')
    btn_fique_por_dentro.forEach(triggerEl => {
      triggerEl.addEventListener('click', event => {
        console.log(event);
        event.preventDefault()
        for (let j = 0; j < btn_fique_por_dentro.length; j++) {
          btn_fique_por_dentro[j].classList.remove('actived');
        }
        event.currentTarget.classList.toggle('actived');

        
      })
    })*/
  });
})(jQuery); 

</script>

<?php get_footer(); ?>