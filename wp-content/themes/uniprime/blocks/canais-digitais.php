<?php 
  $label = get_field('label', $block['id']);
  $titulo = get_field('titulo', $block['id']);
  $descricao = get_field('descricao', $block['id']);
  $img = get_field('imagem_do_bloco', $block['id']);
  $layout = get_field('layout', $block['id']);
  $imagem_de_fundo = get_field('imagem_de_fundo', $block['id']);
  if($imagem_de_fundo) {
    $bg_image = 'style="background: url('.esc_html($imagem_de_fundo).') no-repeat;"';
  } else {
    $bg_image = "";
  }
  if ($layout == 'layout1') { ?>
    <section class="canais-digitais mw-100" <?php echo $bg_image;?>>
      <div class="container">
        <div class="row d-flex justify-content-between flex-column flex-lg-row">
          <div class="col canais-digitais-image z-13">
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
                    ?>
                    
                    <div class="card-canais-digitais">
                      <?php if($imagem_cta) { ?>
                        <a class="button" href="<?php echo esc_url( $link['url'] ); ?>" target="<?php echo esc_html( $link['target'] ); ?>">
                          <img src="<?php echo esc_url($imagem_cta['url']); ?>" alt="<?php echo esc_html($imagem_cta['alt']); ?>" />
                      <?php } else { ?>
                        <a class="button btn-actived btn-secondary btn" href="<?php echo esc_url( $link['url'] ); ?>" target="<?php echo esc_html( $link['target'] ); ?>">
                          <?php echo esc_html( $link['title'] ); ?>
                      <?php } ?>
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
  <?php }
  if ($layout == 'layout2') { ?>
    <div class="canais-digitais-col col-6 z-13" <?php echo $bg_image;?>>
      <div class="container">
        <div class="row d-flex flex-column flex-lg-column align-items-start">
          <div class="label-block">
            <?php echo esc_html($label); ?>
          </div>
          <div class="title-block">
            <?php echo esc_html($titulo); ?>
          </div>
          <div class="description-block">
            <?php echo esc_html($descricao); ?>
          </div>
          <div class="d-flex content-bts">
            <div class="col-6">
              <div class="d-flex justify-content-center justify-content-md-between gap-2 flex-column">
                <?php 
                if( have_rows('botoes') ) {
                  while ( have_rows('botoes') ) : the_row();
                    if( get_row_layout() == 'botao' ) {
                      $imagem_cta = get_sub_field('imagem_cta');
                      $link = get_sub_field('link'); ?>
                      
                      <div class="card-canais-digitais">
                        <?php if($imagem_cta) { ?>
                          <a class="button" href="<?php echo esc_url( $link['url'] ); ?>" target="<?php echo esc_html( $link['target'] ); ?>">
                            <img src="<?php echo esc_url($imagem_cta['url']); ?>" alt="<?php echo esc_html($imagem_cta['alt']); ?>" />
                        <?php } else { ?>
                          <a class="button btn-actived btn-secondary btn" href="<?php echo esc_url( $link['url'] ); ?>" target="<?php echo esc_html( $link['target'] ); ?>">
                            <?php echo esc_html( $link['title'] ); ?>
                        <?php } ?>
                        </a>
                      </div>
                    <?php
                    }
                    
                  // End loop.
                  endwhile;
                // No value.
                } else {
                  // Do something...
                }
                ?>
              </div>
            </div>
            <div class="col-6 canais-digitais-image d-flex align-items-end">
              <img src="<?php echo esc_url($img['url']); ?>" alt="<?php echo esc_html($img['alt']); ?>" >
            </div>
          </div>
        </div>
      </div>
    </div>
  <?php } 
  if ($layout == 'layout3') { ?>
    <section class="canais-digitais layout-3 mw-100" <?php echo $bg_image;?>>
      <div class="container">
        <div class="row d-flex justify-content-between flex-column flex-lg-row">
          <div class="col canais-digitais-image z-13">
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
                    ?>
                    
                    <div class="card-canais-digitais">
                      <?php if($imagem_cta) { ?>
                        <a class="button" href="<?php echo esc_url( $link['url'] ); ?>" target="<?php echo esc_html( $link['target'] ); ?>">
                          <img src="<?php echo esc_url($imagem_cta['url']); ?>" alt="<?php echo esc_html($imagem_cta['alt']); ?>" />
                      <?php } else { ?>
                        <a class="button btn-actived btn-secondary btn" href="<?php echo esc_url( $link['url'] ); ?>" target="<?php echo esc_html( $link['target'] ); ?>">
                          <?php echo esc_html( $link['title'] ); ?>
                      <?php } ?>
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
  <?php } 
  if ($layout == 'layout4') { ?>
    <section class="canais-digitais layout-4 mw-100" <?php echo $bg_image;?>>
      <div class="container">
        <div class="row d-flex justify-content-between flex-column flex-lg-row">
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
                    ?>
                    
                    <div class="card-canais-digitais">
                      <?php if($imagem_cta) { ?>
                        <a class="button" href="<?php echo esc_url( $link['url'] ); ?>" target="<?php echo esc_html( $link['target'] ); ?>">
                          <img src="<?php echo esc_url($imagem_cta['url']); ?>" alt="<?php echo esc_html($imagem_cta['alt']); ?>" />
                      <?php } else { ?>
                        <a class="button btn-actived btn-secondary btn" href="<?php echo esc_url( $link['url'] ); ?>" target="<?php echo esc_html( $link['target'] ); ?>">
                          <?php echo esc_html( $link['title'] ); ?>
                      <?php } ?>
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
          <div class="col canais-digitais-image z-13">
            <img src="<?php echo esc_url($img['url']); ?>" alt="<?php echo esc_html($img['alt']); ?>" >
          </div>
        </div>
      </div>
    </section>
  <?php } ?>