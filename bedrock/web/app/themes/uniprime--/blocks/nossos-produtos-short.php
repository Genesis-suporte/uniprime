<?php 
  $label = get_field('label', $block['id']);
  $titulo = get_field('titulo', $block['id']);
  $descricao = get_field('descricao', $block['id']);
?>
<section class="nossos-produtos nossos-produtos-shorts mw-100 z-12 bg-white">
  <div class="container">
    <div class="label-block">
      <?php echo esc_html($label); ?>
    </div>
    <div class="title-block title-28 switzerlandBold">
      <h2><?php echo esc_html($titulo); ?></h2>
    </div>
    <div class="description-block">
      <div class="d-flex">
        <div class="col col-left">
          <?php echo esc_html($descricao); ?>
        </div>
        <div class="arrows-nossos-produtos-desktop d-none d-lg-flex"></div>
      </div>
    </div>
    <div class="block-content">
      <div class="slide-nossos-produtos-short row">
        <?php
          if( have_rows('lista_de_produtos') ) {
            while ( have_rows('lista_de_produtos') ) : the_row();
              if( get_row_layout() == 'produto' ) { 
                
                $titulo = get_sub_field('titulo');
                $classe = get_sub_field('classe');
                $link = get_sub_field('link');?>
                <div class="col col-4 card-nossos-produtos">
                  <a href="<?php echo $link;?>" target="_SELF" role="button" class="icon-menu icon-<?php echo $classe;?>-gold">
                    <?php echo $titulo; ?>
                    <i class="arrow right"></i>
                  </a>
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
    
    <div class="arrows-nossos-produtos-mobile arrows-mobile d-flex d-lg-none justify-content-center"></div>
  </div>
</section>