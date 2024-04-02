<?php 
  $label = get_field('label', $block['id']);
  $titulo = get_field('titulo', $block['id']);
  $descricao = get_field('descricao', $block['id']);
?>
<section class="bloco-bi z-13">
  <div class="container">
    <div class="label-block">
      <?php echo esc_html($label); ?>
    </div>
    <div class="title-block title-48 switzerlandLight">
      <h2><?php echo esc_html($titulo); ?></h2>
    </div>
    <div class="d-flex">
      <div class="description-block flex-grow-1">
        <?php echo esc_html($descricao); ?>
      </div>
      <div class="arrows-bi-desktop d-none d-md-flex"></div>
    </div>
    <div class="artigos">
      <div class="cards slide-bi row">
        <?php 
          if( have_rows('bloco-bi') ) {
            $count = 0;
            while ( have_rows('bloco-bi') ) : the_row();
              $count++;
              $formatted_count = sprintf('%02d', $count); // Adiciona um zero à frente se for menor que 10
              
              if( get_row_layout() == 'cards' ) {
                $titulo = get_sub_field('titulo');
                $descricao = get_sub_field('descricao');?>
                <div class="card-bi card col">
                  <div class="d-flex flex-column">
                    <div class="icon-number title-28 switzerlandBold"><?php echo $formatted_count;?></div>
                    <div class="title title-40 switzerlandLight">
                      <?php echo esc_html($titulo); ?>
                    </div>
                    <?php if($descricao) { ?>
                      <div class="description">
                        <?php echo __($descricao); ?>
                      </div>
                    <?php } ?>
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
    <div class="arrows-bi-mobile arrows-mobile d-flex d-md-none justify-content-center"></div>
  </div>
</section>