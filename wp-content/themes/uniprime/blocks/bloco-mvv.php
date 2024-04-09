<div class="bloco-mvv z-13">
  <div class="container">
    <div class="container-mvv container-grid-three-col d-grid">
      <?php 
        if( have_rows('bloco-mvv') ) {
          while ( have_rows('bloco-mvv') ) : the_row();
            if( get_row_layout() == 'cards' ) {
              $classe = get_sub_field('classe');
              $titulo = get_sub_field('titulo');
              $descricao = get_sub_field('descricao');?>
              <div class="card-azul">
                <div class="">
                  <div class="icon-menu icon-<?php echo esc_html($classe); ?>"></div>
                  <div class="title title-40 switzerlandLight">
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
  <div class="bg-blue position-absolute"></div>
</div>