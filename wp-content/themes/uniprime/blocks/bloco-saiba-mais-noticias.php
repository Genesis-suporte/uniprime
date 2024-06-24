<?php 
$tipo_conteudo = get_field('tipo_conteudo');
$array_fique_por_dentro = array(
  'post_type'   => array( 'noticia', 'campanha', 'sala-de-imprensa' ),
  'posts_per_page' => -1,
  'orderby'        => 'date',
  'order'          => 'DESC'
);
//
/*destaques_todos : Todos os destaques de Notícias, Sala de imprensa e Campanhas
destaques_noticias : Destaques Notícias
destaques_sala : Destaques Sala de imprensa
destaques_campanhas : Destaques Campanhas
ultimas_todos : Todas últimas Notícias, Sala de imprensa e Campanhas
ultimas_noticias : Últimas Notícias
ultimas_sala : Últimas Sala de imprensa
ultimas_campanhas : Últimas Campanhas*/


$get_fique_por_dentro = get_posts( $array_fique_por_dentro );
$label = get_field('label');
$titulo = get_field('titulo');
$descricao = get_field('descricao');

?>
<section class="bloco-noticias bloco-saiba-mais-noticias z-13">
  <div class="container">
    <div class="row d-flex justify-content-between flex-column flex-lg-row">
      <div class="content-bloco-destaque">
        <div class="label-block">
          <?php if($label) { ?>
            <?php echo esc_html($label); ?>
          <?php } ?>
        </div>
        <div class="d-flex" <?php echo (!$descricao) ? 'style="padding-bottom: 48px"' : ''; ?>>
          <div class="title-block title-28 switzerlandBold flex-grow-1">
            <?php if($titulo) { ?>
              <?php echo esc_html($titulo); ?>
            <?php } ?>
          </div>
          <?php if(!$descricao) { ?>
            <div class="arrows-saiba-mais-noticias-desktop d-none d-md-flex"></div>
          <?php } ?>
        </div>
        <?php if($descricao) { ?>
          <div class="d-flex" style="padding-bottom: 48px">
            <div class="description-block flex-grow-1">
              <?php echo esc_html($descricao); ?>
            </div>
            <div class="arrows-saiba-mais-noticias-desktop d-none d-md-flex"></div>
          </div>
        <?php } ?>
        <div class="container-bloco-destaque">
          <div class="slide-saiba-mais-noticias row">
            <?php 
            if ( $get_fique_por_dentro ) {
              foreach ( $get_fique_por_dentro as $key=>$post ) { 
                switch ($tipo_conteudo) {
                  case 'destaques_todos':
                    if ( $post->destaque_home == 1 ) {
                      $filtered_posts[] = $post;
                    }
                    break;
                  case 'destaques_noticias':
                    if ( $post->destaque_home == 1 && $post->post_type == 'noticia' ) {
                      $filtered_posts[] = $post;
                    }
                    break;
                  case 'destaques_sala':
                    if ( $post->destaque_home == 1 && $post->post_type == 'sala-de-imprensa' ) {
                      $filtered_posts[] = $post;
                    }
                    break;
                  case 'destaques_campanhas':
                    if ( $post->destaque_home == 1 && $post->post_type == 'campanha' ) {
                      $filtered_posts[] = $post;
                    }
                    break;
                  case 'ultimas_todos':
                    $filtered_posts[] = $post;
                    break;
                  case 'ultimas_noticias':
                    if ( $post->post_type == 'noticia' ) {
                      $filtered_posts[] = $post;
                    }
                    break;
                  case 'ultimas_sala':
                    if ( $post->post_type == 'sala-de-imprensa' ) {
                      $filtered_posts[] = $post;
                    }
                    break;
                  case 'ultimas_campanhas':
                    if ( $post->post_type == 'campanha' ) {
                      $filtered_posts[] = $post;
                    }
                    break;
                }
              }
              foreach ( $filtered_posts as $post ) {
                setup_postdata( $post );
                if($post->post_type == 'noticia') {//
                  $text_label = "Notícias ";
                } else if($post->post_type == 'campanha') {
                  $text_label = "Campanhas ";
                }else if($post->post_type == 'sala-de-imprensa') {
                  $text_label = "Sala de imprensa ";
                }
                $post_thumbnail_id = get_post_thumbnail_id($post->ID);
                //var_dump($post_thumbnail_id);

                // Verifica se há uma imagem em destaque
                if ( $post_thumbnail_id ) {
                    // Obtém a URL da imagem em tamanho completo ('full')
                  $image_url = wp_get_attachment_image_src( $post_thumbnail_id, 'full' );

                  // Verifica se a URL foi obtida com sucesso
                  if ( $image_url ) {
                    // O caminho da imagem é o primeiro elemento da matriz retornada por wp_get_attachment_image_src()
                    $image_path = $image_url[0];
                  }
                }
                
                
                ?>
                <div class="card-post" >
                  <div class="thumbnail-card tumtum">
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
            ?>
          </div>
        </div>        
        <div class="arrows-saiba-mais-noticias-mobile arrows-mobile d-flex d-md-none justify-content-center"></div>
      </div>
    </div>
  </div>
</section>

<script type="text/javascript">
  (function($){
    window.addEventListener("load", ()=>{
      if($('.slide-saiba-mais-noticias')) {
        $('.slide-saiba-mais-noticias').not('.slick-initialized').slick({
          dots: false,
          slidesToScroll: 1,
          infinite: false,
          appendArrows: '.arrows-saiba-mais-noticias-desktop',
          slidesPerRow: 3,
          rows: 1,
          variableWidth: false,
          responsive: [
            {
              breakpoint: 992,
              settings: {
                slidesPerRow: 1,
                rows: 3,
                slidesToScroll: 1,
                appendArrows: '.arrows-saiba-mais-noticias-mobile',
              }
            }
          ]
        });
        var cardsNoticiaSaibaMaisNoticias = $('.slide-saiba-mais-noticias .slick-slide .card-post .title-block');
        var maxHeight = 0;
        for (var i = 0; i < cardsNoticiaSaibaMaisNoticias.length; i++) {
          if (maxHeight < $(cardsNoticiaSaibaMaisNoticias[i]).outerHeight()) {
            maxHeight = $(cardsNoticiaSaibaMaisNoticias[i]).outerHeight();
          }
          //console.log(maxHeight);
        }
        // Set ALL card bodies to this height
        for (var i = 0; i < cardsNoticiaSaibaMaisNoticias.length; i++) {
          $(cardsNoticiaSaibaMaisNoticias[i]).height(maxHeight -30);
        }
      }
    });
})(jQuery); 
</script>