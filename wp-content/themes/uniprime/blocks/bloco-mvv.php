<div class="bloco-mvv z-13">
  <div class="container">
    <div class="row d-flex justify-content-between flex-column flex-lg-row">
      <?php 
        if( have_rows('bloco-mvv') ) {
          while ( have_rows('bloco-mvv') ) : the_row();
            if( get_row_layout() == 'cards' ) {
              $classe = get_sub_field('classe');
              $titulo = get_sub_field('titulo');
              $descricao = get_sub_field('descricao');?>
              <div class="card-mvv col">
                <div class="content-card">
                  <div class="icon-menu icon-<?php echo esc_html($classe); ?>"></div>
                  <div class="title">
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