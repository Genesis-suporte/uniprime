<?php 
  $label = get_field('label', $block['id']);
  $titulo = get_field('titulo', $block['id']);
  $descricao = get_field('descricao', $block['id']);
  $img = get_field('imagem_do_bloco', $block['id']);
  ?>
<section class="canais-digitais mw-100">
  <div class="container">
    <div class="row d-flex justify-content-between flex-column flex-lg-row">
      <div class="col canais-digitais-image">
        <img src="<?php echo esc_url($img['url']); ?>" alt="<?php echo esc_html($img['alt']); ?>" >
      </div>
      <div class="col col-right">
        <div class="label-block">
          <?php echo esc_html($label); ?>
        </div>
        <div class="title-block">
          <?php echo esc_html($titulo); ?>
        </div>
        <div class="description-block">
          <?php echo esc_html($descricao); ?>
        </div>
        <div class="d-flex justify-content-center justify-content-md-between gap-2 flex-wrap flex-md-nowrap">
          <?php 
          if( have_rows('botoes') ):
            while ( have_rows('botoes') ) : the_row();
              // Case: Paragraph layout.
              if( get_row_layout() == 'botao' ) {
                //print_r(get_sub_field('imagem_cta'));
                $imagem_cta = get_sub_field('imagem_cta');
                $link = get_sub_field('link');
                /*if($link) {
                  $link_url = $link['url'];
                  //$link_title = $link['title'];
                  //$link_target = $link['target'] ? $link['target'] : '_self';
                }*/
                ?>
                
                <div class="card-canais-digitais">
                    <a class="button" href="<?php echo esc_url( $link ); ?>" target="_blank">
                      <img src="<?php echo esc_url($imagem_cta['url']); ?>" alt="<?php echo esc_attr($imagem_cta['alt']); ?>" />
                    </a>
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
    </div>
  </div>
</section>