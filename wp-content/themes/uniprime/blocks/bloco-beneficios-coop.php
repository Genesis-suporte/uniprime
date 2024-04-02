<?php 
  $label = get_field('label', $block['id']);
  $titulo = get_field('titulo', $block['id']);
  $descricao = get_field('descricao', $block['id']);
?>
<section class="bloco-beneficios-coop z-13">
  <div class="container">
    <div class="row d-flex justify-content-between flex-column flex-lg-row">
      <div class="content-beneficios-coop">
        <div class="label-block">
          <?php echo esc_html($label); ?>
        </div>
        <div class="title-block title-62 switzerlandLight">
          <?php echo esc_html($titulo); ?>
        </div>
        <div class="container">
          <div class="cards container-grid-3-col d-grid">
            <?php 
              if( have_rows('bloco-beneficios-coop') ) {
                while ( have_rows('bloco-beneficios-coop') ) : the_row();
                  if( get_row_layout() == 'cards' ) {
                    $classe = get_sub_field('classe');
                    $titulo = get_sub_field('titulo');
                    $descricao = get_sub_field('descricao');?>
                    <div class="card-bbc">
                      <div class="content-card">
                        <div class="title icon-menu icon-logo">
                          <?php echo esc_html($titulo); ?>
                        </div>
                        <div class="description">
                          <?php echo __($descricao); ?>
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
      </div>
    </div>
  </div>
</section>