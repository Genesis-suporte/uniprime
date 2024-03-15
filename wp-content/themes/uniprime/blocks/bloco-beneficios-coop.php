<?php 
  $label = get_field('label', $block['id']);
  $descricao = get_field('descricao', $block['id']);
?>
<div class="bloco-beneficios-coop z-13">
  <div class="container">
    <div class="row d-flex justify-content-between flex-column flex-lg-row">
      <div class="label-block">
        <?php echo esc_html($label); ?>
      </div>
      <div class="description">
        <?php echo esc_html($descricao); ?>
      </div>
      <div class="d-flex flex-wrap">
        <?php 
          if( have_rows('bloco-beneficios-coop') ) {
            while ( have_rows('bloco-beneficios-coop') ) : the_row();
              if( get_row_layout() == 'cards' ) {
                $classe = get_sub_field('classe');
                $titulo = get_sub_field('titulo');
                $descricao = get_sub_field('descricao');?>
                <div class="card-bbc col col-4">
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
</div>