<?php 
  $label = get_field('label', $block['id']);
  $titulo = get_field('titulo', $block['id']);
  $sub_titulo = get_field('sub_titulo', $block['id']);  
  $descricao = get_field('descricao', $block['id']);
  $img = get_field('imagem_do_bloco', $block['id']);
  $imagem_de_fundo = get_field('imagem_de_fundo', $block['id']);
  ?>
<section class="atendimento mw-100" style="background: url(<?php echo esc_html($imagem_de_fundo); ?>) no-repeat;">
  <div class="container">
    <div class="row">
      <div class="col col-left col-lg-5 d-none d-lg-flex" >
        <div class="img">
          <img src="<?php echo esc_url($img['url']); ?>" alt="<?php echo esc_html($img['alt']); ?>" >
        </div>
      </div>
      <div class="col col-right col-lg-7">
        <div class="label-block col-7">
          <?php echo esc_html($label); ?>
        </div>
        <div class="title-block title-62 switzerlandLight">
          <?php echo esc_html($titulo); ?>
        </div>
        <div class="subtitle-block title-28 switzerlandBold">
          <?php echo esc_html($sub_titulo); ?>
        </div>
        <div class="description">
          <?php echo esc_html($descricao); ?>
        </div>        
        <div class="d-flex justify-content-between flex-column flex-lg-row">
          <div class="col col-12 col-lg-4 col-xxl-3 col-bts-left">
            <a class="btn-primary btn" href="/contato/" target="_blank">Entre em contato</a>
          </div>
          <div class="col col-12 col-lg-8 col-xxl-9 d-flex justify-content-between col-redes">
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
                    <a class="button" href="<?php echo esc_url( $link ); ?>" target="_blank">
                      <img src="<?php echo esc_url($imagem_cta['url']); ?>" alt="<?php echo esc_attr($imagem_cta['alt']); ?>" />
                    </a>
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
  </div>
</section>