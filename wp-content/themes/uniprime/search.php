<?php
/**
 * Template Name: Página de pesquisa
 */
get_header(); 

?>

<section class="search-page">
  <div class="container">
    <div class="row d-flex justify-content-between flex-column flex-lg-row">
      <div class="content-bloco-destaque">
        <div class="row">
          <div class="title-block switzerlandBold title-28 text-center px-0 pb-4">
            <?php echo esc_html('O que você está procurando?'); ?>
          </div>
          <div class="div-input-search div-search ">
            <form role="search" method="get" id="searchform" class="searchform" action="<?php echo home_url('/'); ?>">
              <input type="text" name="s" id="input-search" value="<?php echo get_search_query(); ?>" aria-invalid="false" placeholder="Digite aqui">
              <button class="btn-consultar" id="btn-search"><i class="icon-menu icon-search-white"></i>Buscar</button>
              <input type="hidden" name="post_type[]" value="noticia"/>
              <input type="hidden" name="post_type[]" value="sala-de-imprensa"/>
              <input type="hidden" name="post_type[]" value="campanha"/>
            </form>
          </div>
          <div class="">
            <div class="title-block switzerlandLight title-48 px-0 pt-4 pb-2">
              <?php echo esc_html('Resultado da busca'); ?>
            </div>
            <div class="px-0 pb-4">
              <?php 
              global $wp_query;
              $total_results = $wp_query->found_posts;
              if($total_results > 0) {
                if($total_results == 1) {
                  echo esc_html('1 resultado encontrado para o termo buscado.'); 
                } else {
                  echo $total_results.' '.esc_html('resultados encontrados para o termo buscado.'); 
                }
              } else {
                echo esc_html('Nenhum resultado encontrado para o termo buscado.'); 
              }?>
            </div>
          </div>
        </div>
        <div class="container">
          <div class="row d-flex justify-content-between flex-column flex-lg-row slide-search">
            <?php 
            if (have_posts()) :
              while (have_posts()) : the_post();?>
                <div class="card-default card-cinza thumbnail d-flex flex-column flex-lg-row img-left">
                  <?php
                    $post_thumbnail_id = get_post_thumbnail_id();
                    if ( $post_thumbnail_id ) {
                        // Obtém a URL da imagem em tamanho completo ('full')
                      $image_url = wp_get_attachment_image_src( $post_thumbnail_id, 'full' );
                      // Verifica se a URL foi obtida com sucesso
                      if ( $image_url ) {
                        // O caminho da imagem é o primeiro elemento da matriz retornada por wp_get_attachment_image_src()
                        $image_path = $image_url[0];
                      }
                    } else {
                      $image_url = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
                      // Verifica se há imagens encontradas
                      if(isset($matches[1]) && !empty($matches[1])) {
                        // Verifica se a URL foi obtida com sucesso
                        if ( $image_url ) {
                          // O caminho da imagem é o primeiro elemento da matriz retornada por wp_get_attachment_image_src()
                          $image_path = $matches[1][0];
                        }
                      }
                    } 
                    ?>
                    <div class="thumbnail-card" style="background-image: url(<?php echo $image_path; ?>);">
                      <!-- <a href="<?php echo esc_url($post->guid); ?>" target="_SELF">
                        <img decoding="async" class="d-flex d-lg-none" src="<?php echo $image_path; ?>" alt="">
                      </a> -->
                    </div>
                    <?php 
                    if($post->post_type == 'noticia') {//
                      $text_label = "Notícias ";
                    } else if($post->post_type == 'campanha') {
                      $text_label = "Campanhas ";
                    }else if($post->post_type == 'sala-de-imprensa') {
                      $text_label = "Sala de imprensa ";
                    }
                  ?>
                  <div class="has-thumbnail d-flex">
                    <div class="content-card d-flex flex-column justify-content-between w-100">
                      <div class="title icon-menu icon-logo">
                        <?php echo $text_label;?>
                      </div>
                      <div class="title-block title-16 switzerlandBold pb-3">
                        <?php echo get_the_title();?>
                      </div>
                      <div class="description ">
                        <?php 
                        $excerpt = get_the_excerpt($post);
                        $excerpt = wp_trim_words($excerpt, 40);
                        echo $excerpt;
                        ?>
                      </div>
                      <div class="link mt-auto"> 
                        <a href="<?php echo get_permalink();?>" class="leia_mais">Leia mais <i class="arrow right"></i></a>
                      </div>
                    </div>
                  </div>
                </div>
              <?php 
              endwhile;          
            endif; 
            ?>
          </div>
          <div class="slider-controls d-flex justify-content-center">
            <button type="button" class="slide-m-prev">prev</button>
            <div class="slide-m-dots"></div>
            <button type="button" class="slide-m-next">next</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<script type="text/javascript">
  (function($){
  window.addEventListener("load", ()=>{
    if($('.slide-search')) {
      $('.slide-search').not('.slick-initialized').slick({
        dots: true,
        slidesToScroll: 1,
        infinite: false,
        slidesPerRow: 1 ,
        appendDots: $(".slide-m-dots"),
        prevArrow: $(".slide-m-prev"),
        nextArrow: $(".slide-m-next"),
        rows: 10,
        responsive: [
          {
            breakpoint: 992,
            settings: {
              slidesPerRow: 1,
              rows: 2,
            }
          }
        ]
      });
      /*var cards = $('.slide-search .slick-slide .content-card');
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
      }*/
    } 
  });
})(jQuery); 

</script>

<?php get_footer(); ?>