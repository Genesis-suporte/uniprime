<?php 
  $label = get_field('label', $block['id']);
  $titulo = get_field('titulo', $block['id']);
  ?>
<section class="nossa-historia mw-100">
  <div class="">
    <div class="row d-flex flex-column flex-lg-row">
      <div class="col-left col-12 col-lg-5 col-xl-4">
        <div class="label-block">
          <?php echo esc_html($label); ?>
        </div>
        <div class="title-block">
          <?php echo esc_html($titulo); ?>
        </div>
        <div class="arrows-nossa-historia-desktop d-none d-lg-flex">
        </div>
      </div>
      <div class="col-12 col-lg-7 col-xl-8">
        <div class="d-flex justify-content-between slide-nossa-historia">
          <?php 
          if( have_rows('cards') ):
            while ( have_rows('cards') ) : the_row();
              // Case: Paragraph layout.
              if( get_row_layout() == 'card' ) {
                $titulo = get_sub_field('titulo');
                $cta_banner = get_sub_field('cta_banner');
                $destaque = get_sub_field('destaque');
                $descricao = get_sub_field('descricao');
                //->filename url alt
                //print_r( $destaque);?>
                <div class="card-nossa-historia">
                  <div class="content-card">
                    <div class="title icon-menu icon-logo">
                      <?php echo esc_html($titulo); ?>
                    </div>
                    <div class="destaque">
                      <?php echo esc_html($destaque); ?>
                    </div>
                    <div class="description">
                      <?php echo esc_html($descricao); ?>
                    </div>
                  </div>
                </div>
                <?php
              }
              
            // End loop.
            endwhile;
          // No value.
          else :
            // Do something...
          endif;
          ?>
        </div>
      </div>
      <div class="arrows-nossa-historia-mobile d-flex d-lg-none justify-content-center">
    </div>
  </div>
</section>