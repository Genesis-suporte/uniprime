<?php 
  $label = get_field('label', $block['id']);
  $titulo = get_field('titulo', $block['id']);  
  $descricao = get_field('descricao', $block['id']);
  $texto_final = get_field('texto_final', $block['id']);
?>
<section class="bloco-cartoes z-13">
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
          <div class="description-block flex-grow-1">
            <?php echo esc_html($descricao); ?>
          </div>
        <?php } ?>
        <div class="container-cards">
          <div class="cards d-grid container-grid-two-col">
            <?php 
              if( have_rows('bloco_cartoes') ) {
                $count = 0;
                while ( have_rows('bloco_cartoes') ) : the_row();
                  if( get_row_layout() == 'cards' ) {
                    $imagem_cartoes = get_sub_field('imagem');
                    $label_cartoes = get_sub_field('label');
                    $titulo_cartoes = get_sub_field('titulo');
                    $descricao_cartoes = get_sub_field('descricao');
                    $link_cartoes = get_sub_field('link'); 
                    ?>
                    <div class="card-default">
                      <div class="thumbnail-card">
                        <img src="<?php echo esc_url($imagem_cartoes['url']); ?>" alt="<?php echo esc_html($imagem_cartoes['alt']); ?>" >
                      </div>
                      <div class="content-cards">
                        <div class="label-block">
                          <?php echo esc_html($label_cartoes); ?>
                        </div>
                        <div class="title title-40 switzerlandLight">
                          <?php echo esc_html($titulo_cartoes); ?>
                        </div>
                        <?php if($descricao_cartoes) { ?>
                          <div class="description ">
                            <?php echo __($descricao_cartoes); ?>
                          </div>
                        <?php } 
                        if( have_rows('frases') ) {
                          $count = 0;
                          while ( have_rows('frases') ) : the_row();
                            if( get_row_layout() == 'frase' ) {
                              $icone_cards = get_sub_field('icone_cards');
                              $texto = get_sub_field('texto');
                              if($icone_cards['value'] == 'use-numbers') {
                                $count++;
                                $formatted_count = sprintf('%02d', $count); // Adiciona um zero à frente se for menor que 10
                              }      
                              ?>
                              <div class="frases">
                                <?php if($icone_cards['value'] == 'use-numbers') { ?>
                                  <div class="icon-number title-28 switzerlandBold"><?php echo $formatted_count;?></div>
                                <?php } ?>
                                <div class="frase <?php echo ($icone_cards['value'] == 'use-numbers') ? 'title-40 switzerlandLight' : 'icon-menu '.$icone_cards['value']; ?>">
                                  <?php echo __($texto); ?>
                                </div>
                              </div>
                              <?php 
                            }
                          endwhile;
                        } else {
                          // Do something...
                        }
                        ?>
                        <div class="d-block">
                          <a class="button btn-primary-color btn" href="<?php echo esc_url( $link_cartoes['url'] ); ?>"><?php echo esc_html( $link_cartoes['title'] ); ?><i class="icon-cta-blue right"></i></a>
                        </div>
                      </div>
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
        <div class="final-content">
          <div class="final-labels d-flex flex-lg-row flex-column justify-content-center">
            <ul>
            <?php 
              if( have_rows('sub-labels') ) {
                $count = 0;
                while ( have_rows('sub-labels') ) : the_row();
                  if( get_row_layout() == 'label' ) {
                    $titulo_labels = get_sub_field('titulo');
                    ?>
                    <li class="sub-label"><?php echo esc_html($titulo_labels); ?></li>
                    <?php
                  }
                endwhile;
              } else {
                // Do something...
              }
            ?>
          </div>
          <?php 
          if($texto_final) { ?>
            <div class="texto-final title-36 switzerlandLight">
              <?php echo esc_html($texto_final); ?>
            </div>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
</section>
