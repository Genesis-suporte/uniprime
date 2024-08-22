<?php 
  $label = get_field('label', $block['id']);
  $titulo = get_field('titulo', $block['id']);
  $descricao = get_field('descricao', $block['id']);  
?>
<section class="bloco-investimentos z-13">
  <div class="container">
    <div class="row d-flex justify-content-between flex-column flex-lg-row">
      <div class="content-investimentos">
        <div class="label-block">
          <?php echo esc_html($label); ?>
        </div>
        <div class="title-block title-28 switzerlandBold">
          <?php echo esc_html($titulo); ?>
        </div>
        <div class="description-block">
          <?php echo esc_html($descricao); ?>
        </div>
        <div class="cards-bbc d-grid container-grid-2-col container">
          <?php 
            if( have_rows('bloco_investimentos') ) {
              while ( have_rows('bloco_investimentos') ) : the_row();
                if( get_row_layout() == 'cards' ) {
                  $classe = get_sub_field('classe');
                  $titulo = get_sub_field('titulo');
                  $descricao = get_sub_field('descricao');
                  $link = get_sub_field('link');?>
                  <div class="card-bbc">
                    <div class="content-card">
                      <div class="title icon-menu icon-logo">
                        <?php echo esc_html($titulo); ?>
                      </div>
                      <div class="description">
                        <?php echo __($descricao); ?>
                      </div>
                      <div class="link">
                        <a href="<?php echo esc_html($link); ?>" class=""><?php echo __('Leia mais'); ?><i class="arrow right"></i></a>
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
</section>