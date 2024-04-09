<?php 
  $label = get_field('label', $block['id']);
  $titulo = get_field('titulo', $block['id']);
  $tamanho_titulo = get_field('tamanho_titulo', $block['id']);
  
  $descricao = get_field('descricao', $block['id']);
  $thumbnail = get_field('thumbnail', $block['id']);
  $layout = get_field('layout', $block['id']);
  $linha_dourada = get_field('linha_dourada', $block['id']);
  $slide = get_field('slide', $block['id']);
  $quantidade_colunas = get_field('quantidade_colunas', $block['id']);
  if($quantidade_colunas == 'one') {
    $num_colunas = 1;
  } else if($quantidade_colunas == 'two') {
    $num_colunas = 2;
  } else if($quantidade_colunas == 'three') {
    $num_colunas = 3;
  } else if($quantidade_colunas == 'four') {
    $num_colunas = 4;
  }
  
  $class_grid_cols = '';
  if(!$slide) {
    $class_grid_cols = ' d-grid container-grid-'.$quantidade_colunas.'-col';
  } else {
    $class_grid_cols = ' d-flex container-grid-'.$quantidade_colunas.'-col';
  }
  //if($slide) {
  $quantidade_linhas = get_field('quantidade_linhas', $block['id']);
  //}
  $cor_de_fundo = get_field('cor_de_fundo', $block['id']);

  if ($layout == 'layout1') {
    $class_layout = 'card-cinza';
    $style_layout = '';
  } else if ($layout == 'layout2') {
    $class_layout = 'card-azul';
    $style_layout = '';
  } else {
    $class_layout = 'card-azul';
    $style_layout = ' style="background-color: '.$cor_de_fundo.'"';
  }
?>
<section class="bloco-cards z-13">
  <div class="container">
    <div class="row d-flex justify-content-between flex-column flex-lg-row">
      <div class="content-bloco-cards">
        <?php if($label) { ?>
        <div class="label-block">
          <?php echo esc_html($label); ?>
        </div>
        <?php }
        if($titulo) { ?>
        <div class="title-block <?php echo $tamanho_titulo;?> switzerlandLight">
          <?php echo esc_html($titulo); ?>
        </div>
        <?php } 
        if($descricao) { ?>
        <div class="d-flex">
          <div class="description-block flex-grow-1">
            <?php echo esc_html($descricao); ?>
          </div>
          <?php if($slide) { ?>
            <div class="arrows-cards-desktop d-none d-md-flex"></div>
          <?php } ?>
        </div>   
        <?php } ?>
        <div class="container-cards">
          <div class="cards <?php echo $class_grid_cols; echo ($slide) ? ' slide-cards row' : '';?>">
            <?php 
              if( have_rows('bloco_cards') ) {
                $count = 0;
                while ( have_rows('bloco_cards') ) : the_row();
                  if( get_row_layout() == 'cards' ) {
                    $titulo_card = get_sub_field('titulo');
                    $descricao_card = get_sub_field('descricao');
                    $icone_cards = get_sub_field('icone_cards');
                    $thumbnail_card = get_sub_field('thumbnail');
                    $link_card = get_sub_field('link');                    
                    $tipo_link_card = get_sub_field('tipo_link'); 
                    if($icone_cards['value'] == 'use-numbers') {
                      $count++;
                      $formatted_count = sprintf('%02d', $count); // Adiciona um zero à frente se for menor que 10
                    }
                    $has_thumbnail = false;
                    if ($thumbnail_card) {
                      $has_thumbnail = true;
                    } 
                    //
                    ?>
                    <div class="card-default <?php echo $class_layout;?><?php echo ($has_thumbnail) ? ' thumbnail' : '' ?>" <?php echo $style_layout;?> >
                      <?php if ($has_thumbnail) {?>
                        <div class="thumbnail-card" style="background-image: url(<?php echo esc_url($thumbnail_card['url']); ?>);">
                            <!-- <img src="<?php echo esc_url($thumbnail_card['url']); ?>" alt="<?php echo esc_html($thumbnail_card['alt']); ?>" > -->
                        </div>
                        <div class="has-thumbnail">
                      <?php } ?>

                      <div class="<?php echo ($linha_dourada) ? 'content-card': '';?>">
                        <?php if($icone_cards['value'] == 'use-numbers') { ?>
                          <div class="icon-number title-28 switzerlandBold"><?php echo $formatted_count;?></div>
                        <?php } ?>
                        <div class="title <?php echo ($icone_cards['value'] == 'use-numbers') ? 'title-40 switzerlandLight' : 'icon-menu '.$icone_cards['value']; ?>">
                          <?php echo esc_html($titulo_card); ?>
                        </div>
                        <div class="description ">
                          <?php echo __($descricao_card); ?>
                        </div>
                        <?php if($link_card) { 
                          if ($tipo_link_card == 'link' ) { ?>
                            <div class="link">
                              <a href="<?php echo esc_html($link_card['url']); ?>" class=""><?php echo esc_html($link_card['title']); ?><i class="arrow right"></i></a>
                            </div>
                          <?php } else { ?>
                            <div class="">
                              <a class="button btn-actived btn-secondary btn" href="<?php echo esc_url( $link_card['url'] ); ?>"><?php echo esc_html( $link_card['title'] ); ?></a>
                            </div>
                          <?php } 
                          } ?>
                      </div>
                      <?php if ($has_thumbnail) {?>
                        </div>
                      <?php } ?>
                    </div>
                    <?php
                  }
                  
                endwhile;
              } else {
                // Do something...
              }
            ?>
          </div>
        </div>
      </div>
    </div>
    <?php if($slide) { ?>
      <div class="arrows-cards-mobile arrows-mobile d-flex d-lg-none justify-content-center"></div>
    <?php } ?>
  </div>
  <?php if($slide) { ?>
  <script type="text/javascript">
    (function($){
      window.addEventListener("load", ()=>{
        if($('.slide-cards')) {
          $('.slide-cards').slick({
            dots: false,
            slidesToScroll: 1,
            infinite: false,
            appendArrows: '.arrows-cards-desktop',
            slidesPerRow: <?php echo $num_colunas;?>,
            rows: <?php echo $quantidade_linhas;?>,
            responsive: [
              {
                breakpoint: 992,
                settings: {
                  slidesPerRow: 1,
                  rows: 1,
                  appendArrows: '.arrows-cards-mobile',
                }
              }
            ]
          });
          var cardsBi = $('.slide-cards .slick-slide .card-default > div');
          var maxHeight = 0;
          for (var i = 0; i < cardsBi.length; i++) {
            if (maxHeight < $(cardsBi[i]).outerHeight()) {
              maxHeight = $(cardsBi[i]).outerHeight();
              console.log(maxHeight);
            }
          }
          // Set ALL card bodies to this height
          for (var i = 0; i < cardsBi.length; i++) {
            $(cardsBi[i]).height(maxHeight);
          }
        }   
      });
    })(jQuery); 
    </script>
  <?php } ?>
</section>
