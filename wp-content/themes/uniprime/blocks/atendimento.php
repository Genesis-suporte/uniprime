<?php 
  $label = get_field('label', $block['id']);
  $titulo = get_field('titulo', $block['id']);
  $descricao = get_field('descricao', $block['id']);
  $img = get_field('imagem_do_bloco', $block['id']);
  ?>
<div class="atendimento mw-100">
  <div class="container">
    <div class="row">
      <div class="col">
        <img src="<?php echo esc_url($img['url']); ?>" alt="<?php echo esc_html($img['alt']); ?>" >
      </div>
      <div class="col">
        <div class="label-block">
          <?php echo esc_html($label); ?>
        </div>
        <div class="title-block">
          <?php echo esc_html($titulo); ?>
        </div>
        <div class="description">
          <?php echo esc_html($descricao); ?>
        </div>
        <div class="d-flex justify-content-between">
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
                
                <div class="card-nossa-historia">
                  <div class="title">
                    <a class="button" href="<?php echo esc_url( $link ); ?>" target="_blank">
                      <img src="<?php echo esc_url($imagem_cta['url']); ?>" alt="<?php echo esc_attr($imagem_cta['alt']); ?>" />
                    </a>
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
    </div>
    <div class="block-content">
    </div>
  </div>
</div>