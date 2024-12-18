<?php

/**
 * Template Name: Página de campanhas
 */
get_header(); 

$title_banner = get_field('title_banner') ?: '';
$description_banner = get_field('description_banner') ?: '';
$image_banner = get_field('image_banner') ?: '';
$image_banner_mobile = get_field('image_banner_mobile') ?: '';

$array_fique_por_dentro = array(
  'post_type'   => array( 'campanha' ),
  'posts_per_page' => -1,/*,
  'meta_key'       => 'data_assembleia',
  'orderby'        => 'meta_value',
  'order'          => 'DESC'*/
);

$get_fique_por_dentro = get_posts( $array_fique_por_dentro );

$tipo_conteudo = get_field('tipo_conteudo');
$array_fique_por_dentro = array(
  'post_type'   => array( 'noticia', 'campanha', 'sala-de-imprensa' ),
  'posts_per_page' => -1,
  'orderby'        => 'date',
  'order'          => 'DESC'
);

$get_fique_por_dentro = get_posts( $array_fique_por_dentro );
$label = get_field('label') ?: '';
$titulo = get_field('titulo') ?: '';
$descricao = get_field('descricao') ?: '';

  $label_canais_digitais = get_field('label_canais_digitais') ?: '';
  $titulo_canais_digitais = get_field('titulo_canais_digitais') ?: ''; 
  $tamanho_titulo = get_field('tamanho_titulo') ?: '';
  $fonte_titulo = get_field('fonte_titulo') ?: '';
  if($fonte_titulo == 'Normal') {
    $fonte_style = '';
  } else {
    $fonte_style = $fonte_titulo;
  }
  $descricao_canais_digitais = get_field('descricao_canais_digitais') ?: '';
  $img = get_field('imagem_do_bloco') ?: '';
  $imagem_de_fundo = get_field('imagem_de_fundo') ?: '';
  if($imagem_de_fundo) {
    $bg_image = 'style="background: url('.esc_html($imagem_de_fundo).') no-repeat; z-index:13"';
  } else {
    $bg_image = "";
  }
  $botoes_canais_digitais = '';
  
  if( have_rows('botoes') ):
    while ( have_rows('botoes') ) : the_row();
      // Case: Paragraph layout.
      if( get_row_layout() == 'botao' ) {
        $estilo_do_botao = get_sub_field('estilo_do_botao') ?: ''; 
        $habilitar_modal = get_sub_field('habilitar_modal') ?: '';
        $link = get_sub_field('link') ?: '';
        
        if($estilo_do_botao == 'imagem') {
          $imagem_cta = get_sub_field('imagem_cta') ?: '';
          $imagem_cta_hover = get_sub_field('imagem_cta_hover') ?: '';
          if($imagem_cta_hover) {
            $classBtn = 'img-has-hover position-relative';
          } else {
            $classBtn = 'img-has-no-hover';
          }
        } else if($estilo_do_botao == 'azul') {
          $classBtn = 'btn-primary btn';
        } else if($estilo_do_botao == 'amarelo') {
          $classBtn = 'btn-actived btn';
        } else if($estilo_do_botao == 'branco') {
          $classBtn = 'btn-primary-color btn';
        }
        
        $botoes_canais_digitais .= `<div class="card-canais-digitais">`;
        
        if($habilitar_modal) { 
          $botoes_canais_digitais .= '<a class="button '.$classBtn.'"
            href="javascript:void(0)" 
            data-title_card="'.esc_html( get_field('titulo_modal_interesse') ).'"
            data-label_interesse="'.esc_html( get_field('label_modal_interesse') ).'"
            data-title_interesse="'.esc_html( get_field('titulo_modal_interesse') ).'"
            data-description_interesse="'.esc_html( get_field('descricao_modal_interesse') ).'"
            data-habilitar="'.esc_html( json_encode(get_field('habilitar_botoes')) ).'"
            data-texto_telefone="'.esc_html( get_field('texto_telefone') ).'"
            data-texto_whatsapp="'.esc_html( get_field('texto_whatsapp') ).'"
            data-numero_whatsapp="'.esc_html( get_field('numero_whatsapp') ).'"
            data-id_form="'.esc_html( get_field('id_form') ).'"
            onclick="abreModalInteresse(this)"';
            if($estilo_do_botao == 'imagem') { 
              $botoes_canais_digitais .= 'target="'.esc_html( $link['target'] ).'"';
            } 
          $botoes_canais_digitais .= '>';
          if($estilo_do_botao == 'imagem') { 
            $botoes_canais_digitais .= '<img src="'.esc_url($imagem_cta['url']).'" alt="'.esc_html($imagem_cta['alt']).'" 
            class="'.($imagem_cta_hover) ? 'has-hover' : ''.'"/>';
            if($imagem_cta_hover) {
              $botoes_canais_digitais .= '<img src="'.esc_url($imagem_cta_hover['url']).'" alt="'.esc_html($imagem_cta_hover['alt']).'" class="is-hover" />';
            }
          } else {
            $botoes_canais_digitais .= esc_html( $link['title'] );
            if($estilo_do_botao == 'branco') {
                $botoes_canais_digitais .= '<i class="icon-cta-blue right"></i>';
            }
          }
        $botoes_canais_digitais .= '</a>';
        } else {
          $botoes_canais_digitais .= '<a 
            href="'.esc_url( $link['url'] ).'" 
            class="button '.$classBtn.'"';
            if($estilo_do_botao == 'imagem') {
              $botoes_canais_digitais .= 'target="'.esc_html( $link['target'] ).'"';
            } 
            $botoes_canais_digitais .= '>';
              if($estilo_do_botao == 'imagem') {
                $botoes_canais_digitais .= '<img src="'.esc_url($imagem_cta['url']).'" alt="'.esc_html($imagem_cta['alt']).'" class="'. ($imagem_cta_hover) ? 'has-hover' : ''.'/>';
                if($imagem_cta_hover) {
                  $botoes_canais_digitais .= '<img src="'.esc_url($imagem_cta_hover['url']).'" alt="'.esc_html($imagem_cta_hover['alt']).'" class="is-hover" />';
                }
              } else { 
                $botoes_canais_digitais .= esc_html( $link['title'] );
              }
          $botoes_canais_digitais .= '</a>';
        }

      $botoes_canais_digitais .= '</div>';
    }
      
    // End loop.
    endwhile;
  // No value.
  else :
    // Do something...
  endif;
?>
<div class="banner-internas position-relative">
  <div class="hero-image">
    <div class="image <?php echo $image_banner_mobile ? 'd-none d-sm-block' : ''; ?>" style="background-image: url(<?php echo esc_url($image_banner['url']); ?>);"></div>
    <?php if($image_banner_mobile) { ?>
      <div class="image d-block d-sm-none" style="background-image: url(<?php echo esc_url($image_banner_mobile['url']); ?>);"></div>
    <?php } ?>
    <div class="container">
      <div class="position-absolute copy">
        <?php if($title_banner) { ?>
          <h1 class="title title-48 switzerlandLight">
            <?php echo esc_html($title_banner); ?>
          </h1>
        <?php } ?>
        <?php if($description_banner) { ?>
          <h2 class="description title-24 switzerlandBold">
            <?php echo esc_html($description_banner); ?>
          </h2>
        <?php } ?>
        <div class="botoes-fique-por-dentro">
          <div class="d-flex flex-wrap">
            <div class="button-fique-por-dentro">
              <a href="/noticias/" class="btn" id="btn-noticias">Notícias</a>
            </div>
            <div class="button-fique-por-dentro">
              <span class="btn actived" class="btn" id="btn-campanhas">Campanhas</span>
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
<?php
if (file_exists(get_template_directory() . '/blocks/breadcrumbs.php')) {
  include(get_template_directory() . '/blocks/breadcrumbs.php');
}
$upload_dir = wp_upload_dir();
$upload_url = $upload_dir['baseurl']; 

?>
<div class="wp-block-group alignfull div-logo-uniprime d-none d-md-block is-layout-constrained wp-block-group-is-layout-constrained wp-container-1-noticias is-position-sticky">
<figure class="wp-block-image alignright size-full is-resized logo-uniprime-background"><img fetchpriority="high" decoding="async" width="674" height="739" src="<?php echo $upload_url;?>/2024/03/logo-uniprime-gigante.png" alt="" class="wp-image-530" style="width:674px;height:auto" srcset="<?php echo $upload_url;?>/2024/03/logo-uniprime-gigante.png 674w, <?php echo $upload_url;?>/2024/03/logo-uniprime-gigante-274x300.png 274w" sizes="(max-width: 674px) 100vw, 674px"></figure>
</div>
<?php   
  $label_novidades = get_field('label_novidades');
  $titulo_novidades = get_field('titulo_novidades');
  $descricao_novidades = get_field('descricao_novidades');
?>

<section class="bloco-noticias z-13 page-campanhas">
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
                $post_thumbnail_id = get_post_thumbnail_id();

                // Verifica se há uma imagem em destaque
                if ( $post_thumbnail_id ) {
                    // Obtém a URL da imagem em tamanho completo ('full')
                  $image_url = wp_get_attachment_image_src( $post_thumbnail_id, 'full' );

                  // Verifica se a URL foi obtida com sucesso
                  if ( $image_url ) {
                    // O caminho da imagem é o primeiro elemento da matriz retornada por wp_get_attachment_image_src()
                    $image_path = $image_url[0];
                    
                  }
                } else {
                  $image_url = get_field('image_banner',$post->ID);
                  if( isset($image_url)) 
                    $image_path = $image_url['url'];
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
                          <?php echo esc_html("Campanhas"); ?>
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
<div class="content">
  <?php 
  while ( have_posts() ) :
    the_post();

    // Display the content of the page.
    the_content();
    
  // End the loop.
  endwhile; ?>
</div>
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
            breakpoint: 992,
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
            breakpoint: 992,
            settings: {
              slidesPerRow: 1,
              rows: 4,
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
  });
})(jQuery); 

</script>

<?php get_footer(); ?>