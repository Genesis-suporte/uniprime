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
  $class_slide = ' row slide-cards-'.$block['id'];
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
        <?php } ?>
        <?php if($descricao || $slide) { ?>
          <div class="d-flex">
            <div class="description-block flex-grow-1">
              <?php if($descricao) { ?>
                <?php echo esc_html($descricao); ?>
              <?php } ?>
            </div>
            <?php if($slide) { ?>
              <div class="arrows-cards-desktop d-none d-md-flex arrows-cards-desktop-<?php echo $block['id'];?>"></div>
            <?php } ?>
          </div>  
        <?php } ?>
        <div class="container-cards">
          <div class="cards <?php echo $class_grid_cols; echo ($slide) ? $class_slide : '';?>">
            <?php 
              if( have_rows('bloco_cards') ) {
                $count = 0;
                while ( have_rows('bloco_cards') ) : the_row();
                  if( get_row_layout() == 'cards' ) {
                    $titulo_card = get_sub_field('titulo');
                    $descricao_card = get_sub_field('descricao');
                    $icone_cards = get_sub_field('icone_cards');
                    $thumbnail_card = get_sub_field('thumbnail');

                    if($icone_cards['value'] == 'use-numbers') {
                      $count++;
                      $formatted_count = sprintf('%02d', $count); // Adiciona um zero à frente se for menor que 10
                    }
                    $has_thumbnail = false;
                    if ($thumbnail_card) {
                      $has_thumbnail = true;
                    }

                    $estilo_do_botao = get_sub_field('estilo_do_botao'); 
                    $habilitar_modal = get_sub_field('habilitar_modal');
                    $link = get_sub_field('link');
                    
                    $classBtn = '';
                    if($estilo_do_botao == 'imagem') {
                      $classBtn = 'btn-actived';
                      $imagem_cta = get_sub_field('imagem_cta');
                    } else if($estilo_do_botao == 'azul') {
                      $classBtn = 'button btn-primary btn';
                    } else if($estilo_do_botao == 'amarelo') {
                      $classBtn = 'button btn-actived btn';
                    } else if($estilo_do_botao == 'branco') {
                      $classBtn = 'button btn-primary-color btn';
                    } else if($estilo_do_botao == 'link') {
                      $classBtn = 'link';
                    }
                    //
                    ?>
                    <div class="card-default <?php echo $class_layout; echo ($has_thumbnail) ? ' thumbnail' : ''; echo ($num_colunas == 1) ? ' d-flex flex-column flex-lg-row img-left' : '';?>" <?php echo $style_layout;?> >
                      <?php if ($has_thumbnail) {?>
                        <div class="thumbnail-card" style="background-image: url(<?php echo esc_url($thumbnail_card['url']); ?>);">
                          <img class="d-flex d-lg-none" src="<?php echo esc_url($thumbnail_card['url']); ?>" alt="<?php echo esc_html($thumbnail_card['alt']); ?>" >
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
                        <?php 
                        /*if($estilo_do_botao != 'nenhum') {
                            if($habilitar_modal) { ?>
                            <div class="d-block">
                              <a class="button <?php echo $classBtn;?>"  
                                href="javascript:void(0)" 
                                data-title_card="<?php echo esc_html( $titulo_card ); ?>"
                                data-label_interesse="<?php echo esc_html( get_field('label_modal_interesse', $block['id']) ); ?>"
                                data-title_interesse="<?php echo esc_html( get_field('titulo_modal_interesse', $block['id']) ); ?>"
                                data-description_interesse="<?php echo esc_html( get_field('descricao_modal_interesse', $block['id']) ); ?>"
                                data-habilitar="<?php echo esc_html( json_encode(get_field('habilitar_botoes', $block['id'])) ); ?>"
                                data-texto_telefone="<?php echo esc_html( get_field('texto_telefone', $block['id']) ); ?>"
                                data-texto_whatsapp="<?php echo esc_html( get_field('texto_whatsapp', $block['id']) ); ?>"
                                data-numero_whatsapp="<?php echo esc_html( get_field('numero_whatsapp', $block['id']) ); ?>"
                                data-id_form="<?php echo esc_html( get_field('id_form', $block['id']) ); ?>"
                                onclick="abreModalInteresse(this)"
                              >
                                <?php if($estilo_do_botao == 'imagem') { ?>
                                  <img src="<?php echo esc_url($imagem_cta['url']); ?>" alt="<?php echo esc_html($imagem_cta['alt']); ?>" />
                                <?php } else { ?> 
                                  <?php echo esc_html( $link['title'] ); ?>
                                  <?php if($estilo_do_botao == 'branco') {
                                    echo '<i class="icon-cta-blue right"></i>';
                                  } ?>
                                  <?php if($estilo_do_botao == 'link') {
                                    echo '<i class="arrow right"></i>';
                                  } ?>
                                <?php } ?>
                              </a>
                            </div>
                            <?php } else { ?>
                            <div class="d-block">
                              <a 
                                href="<?php echo esc_url( $link['url'] ); ?>" 
                                class=" <?php echo $classBtn;?>" 
                                <?php if($estilo_do_botao == 'imagem') { ?>
                                  target="<?php echo esc_html( $link['target'] ); ?>"
                                <?php } ?>
                              >
                                <?php if($estilo_do_botao == 'imagem') { ?>
                                  <img src="<?php echo esc_url($imagem_cta['url']); ?>" alt="<?php echo esc_html($imagem_cta['alt']); ?>" />
                                <?php } else { ?> 
                                  <?php echo esc_html( $link['title'] ); ?>
                                  <?php if($estilo_do_botao == 'branco') {
                                    echo '<i class="icon-cta-blue right"></i>';
                                  } ?>
                                  <?php if($estilo_do_botao == 'link') {
                                    echo '<i class="arrow right"></i>';
                                  } ?>
                                <?php } ?>
                              </a>
                            </div>
                          <?php } 
                          }*/
                        ?>
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
      <div class="arrows-cards-mobile arrows-mobile d-flex d-lg-none justify-content-center arrows-cards-mobile-<?php echo $block['id'];?>"></div>
    <?php } ?>
    <?php 
    $estilo_do_botao = get_field('estilo_do_botao', $block['id']); 
    $habilitar_modal = get_field('habilitar_modal', $block['id']);
    $link = get_field('link', $block['id']);
    
    $classBtn = '';
    if($estilo_do_botao == 'imagem') {
      $classBtn = 'btn-actived';
      $imagem_cta = get_field('imagem_cta', $block['id']);
    } else if($estilo_do_botao == 'azul') {
      $classBtn = 'button btn-primary btn';
    } else if($estilo_do_botao == 'amarelo') {
      $classBtn = 'button btn-actived btn';
    } else if($estilo_do_botao == 'branco') {
      $classBtn = 'button btn-primary-color btn';
    } else if($estilo_do_botao == 'link') {
      $classBtn = 'link';
    }
    if($estilo_do_botao != 'nenhum') {
      if($habilitar_modal) { ?>
      <div class="d-flex w-100 justify-content-center bt-interest-end enabled">
        <a class="button <?php echo $classBtn;?>"  
          href="javascript:void(0)" 
          data-title_card="<?php echo esc_html( $titulo ); ?>"
          data-label_interesse="<?php echo esc_html( get_field('label_modal_interesse', $block['id']) ); ?>"
          data-title_interesse="<?php echo esc_html( get_field('titulo_modal_interesse', $block['id']) ); ?>"
          data-description_interesse="<?php echo esc_html( get_field('descricao_modal_interesse', $block['id']) ); ?>"
          data-habilitar="<?php echo esc_html( json_encode(get_field('habilitar_botoes', $block['id'])) ); ?>"
          data-texto_telefone="<?php echo esc_html( get_field('texto_telefone', $block['id']) ); ?>"
          data-texto_whatsapp="<?php echo esc_html( get_field('texto_whatsapp', $block['id']) ); ?>"
          data-numero_whatsapp="<?php echo esc_html( get_field('numero_whatsapp', $block['id']) ); ?>"
          data-id_form="<?php echo esc_html( get_field('id_form', $block['id']) ); ?>"
          onclick="abreModalInteresse(this)"
        >
          <?php if($estilo_do_botao == 'imagem') { ?>
            <img src="<?php echo esc_url($imagem_cta['url']); ?>" alt="<?php echo esc_html($imagem_cta['alt']); ?>" />
          <?php } else { ?> 
            <?php echo esc_html( $link['title'] ); ?>
            <?php if($estilo_do_botao == 'branco') {
              echo '<i class="icon-cta-blue right"></i>';
            } ?>
            <?php if($estilo_do_botao == 'link') {
              echo '<i class="arrow right"></i>';
            } ?>
          <?php } ?>
        </a>
      </div>
      <?php } else { ?>
      <div class="d-flex w-100 justify-content-center bt-interest-end disabled">
        <a 
          href="<?php echo esc_url( $link['url'] ); ?>" 
          class=" <?php echo $classBtn;?>" 
          <?php if($estilo_do_botao == 'imagem') { ?>
            target="<?php echo esc_html( $link['target'] ); ?>"
          <?php } ?>
        >
          <?php if($estilo_do_botao == 'imagem') { ?>
            <img src="<?php echo esc_url($imagem_cta['url']); ?>" alt="<?php echo esc_html($imagem_cta['alt']); ?>" />
          <?php } else { ?> 
            <?php echo esc_html( $link['title'] ); ?>
            <?php if($estilo_do_botao == 'branco') {
              echo '<i class="icon-cta-blue right"></i>';
            } ?>
            <?php if($estilo_do_botao == 'link') {
              echo '<i class="arrow right"></i>';
            } ?>
          <?php } ?>
        </a>
      </div>
      <?php } 
      }
    ?>
  </div>
  <?php if($slide) { ?>
  <script type="text/javascript">
    (function($){
      window.addEventListener("load", ()=>{
        var class_block = '.slide-cards-<?php echo $block['id'];?>';
        var quantidade_linhas = <?php echo $quantidade_linhas;?>;
        if($(class_block)) {
          $(class_block).not('.slick-initialized').slick({
            dots: false,
            slidesToScroll: 1,
            infinite: false,
            appendArrows: '.arrows-cards-desktop-<?php echo $block['id'];?>',
            slidesPerRow: <?php echo $num_colunas;?>,
            rows: <?php echo $quantidade_linhas;?>,
            responsive: [
              {
                breakpoint: 992,
                settings: {
                  slidesPerRow: 1,
                  rows: 1,
                  appendArrows: '.arrows-cards-mobile-<?php echo $block['id'];?>',
                }
              }
            ]
          });
          if(quantidade_linhas > 1) {
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
        }   
      });
    })(jQuery); 
    </script>
  <?php } ?>
</section>
