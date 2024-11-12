<div class="canais-digitais canais-digitais-duplo mw-100">
  <div class="no-gutters d-flex flex-column flex-lg-row">
<?php
if( have_rows('colunas') ) {
  while ( have_rows('colunas') ) : the_row();
    $row_index = get_row_index();
    if( get_row_layout() == 'coluna' ) {
      $label = get_sub_field('label');
      $titulo = get_sub_field('titulo');
      $descricao = get_sub_field('descricao');
      $img = get_sub_field('imagem_do_bloco');
      $img_mobile = get_sub_field('imagem_do_bloco_mobile');
      $layout = get_sub_field('layout');
      $imagem_de_fundo = get_sub_field('imagem_de_fundo');
      $posicao_imagem = get_sub_field('posicao_imagem');

      if($imagem_de_fundo) {
        $bg_image = 'style="background: url('.esc_html($imagem_de_fundo).') no-repeat;"';
      } else {
        $bg_image = "";
      }
      $css_left = '';
      $css_right = '';
      $css_top = '';
      $css_bottom = '';
      $style_absolute = '';
      
      $left = get_sub_field('left');
      $right = get_sub_field('right');
      $top = get_sub_field('top');
      $bottom = get_sub_field('bottom');

      foreach ($posicao_imagem as $value) {
        if ($value == 'left') { 
          $style_absolute .= 'left:'.$left.'px; ';
        } 
        if ($value == 'right') { 
          $style_absolute .= 'right:'.$right.'px ';
        } 
        if ($value == 'center') { 
          $style_absolute .= 'left:0; right:0; margin-left:auto; margin-right:auto; ';
        } 
        if ($value == 'top') { 
          $style_absolute .= 'top:'.$top.'px; ';
        } 
        if ($value == 'bottom') { 
          $style_absolute .= 'bottom:'.$bottom.'px; ';
        }
      }
      $pos = '';
      if ($posicao_imagem == 'left') { 
        $pos = 'align-items-start';
      } 
      if ($posicao_imagem == 'right') { 
        $pos = 'align-items-end';
      } 
      if ($posicao_imagem == 'center') { 
        $pos = 'align-items-center';
      } 
      if ($posicao_imagem == 'top') { 
        $pos = 'align-items-center';
      } 
      if ($posicao_imagem == 'bottom') { 
        $pos = 'align-items-center';
      }
      
      if($row_index==1) {
        $fixPadding = 'fix-padding-left';
        echo '<div class="col-12 col-lg-6 d-flex no-gutters canais-digitais-col z-13 layout2" '.$bg_image.'>';
      }
      if($row_index==2) {
        $fixPadding = 'fix-padding-right';
        echo '<div class="col-12 col-lg-6 d-flex no-gutters canais-digitais-col z-13 layout2" '.$bg_image.'>';
      }
      ?>
      <div class="col-12 content-duplo coluna-<?php echo $row_index.' '.$fixPadding;?>" >
        <div class="d-flex flex-column flex-lg-column align-items-start h-100">
          <div class="label-block">
            <?php echo esc_html($label); ?>
          </div>
          <div class="title-block title-28 switzerlandBold">
            <?php echo esc_html($titulo); ?>
          </div>
          <?php if ($posicao_imagem != 'right') { ?>
            <div class="description-block">
              <?php echo esc_html($descricao); ?>
            </div>
          <?php } ?>
          <div class="d-flex flex-grow-1 justify-content-between w-100">
            <div class="col-8 col-lg-6">
              <?php if ($posicao_imagem == 'right') { ?>
                <div class="description-block">
                  <?php echo esc_html($descricao); ?>
                </div>
              <?php } ?>
              <div class="d-flex justify-content-center justify-content-md-between gap-2 flex-column <?php if ($posicao_imagem == 'right') { echo 'content-bts'; }?>">
                <?php 
                  if( have_rows('botoes') ) {
                    while ( have_rows('botoes') ) : the_row();
                      if( get_row_layout() == 'botao' ) {
                        $estilo_do_botao = get_sub_field('estilo_do_botao'); 
                        $habilitar_modal = get_sub_field('habilitar_modal');
                        $link = get_sub_field('link');
                        $classBtn = '';
                        if($estilo_do_botao == 'imagem') {
                          $imagem_cta = get_sub_field('imagem_cta');
                          $imagem_cta_hover = get_sub_field('imagem_cta_hover');
                          if($imagem_cta_hover) {
                            $classBtn = 'img-has-hover position-relative';
                          } else {
                            $classBtn = 'img-has-no-hover';
                          }
                        } else if($estilo_do_botao == 'azul') {
                          $classBtn = 'btn-primary';
                        } else if($estilo_do_botao == 'amarelo') {
                          $classBtn = 'btn-actived';
                        } else if($estilo_do_botao == 'branco') {
                          $classBtn = 'btn-secondary';
                        }
                        ?>
                        <div class="card-canais-digitais">
                          <?php if($estilo_do_botao == 'imagem' && isset($link) ) { ?>
                            <a 
                              class="button <?php echo $classBtn;?>" 
                              href="<?php echo esc_url( $link['url'] ); ?>" 
                              target="<?php echo esc_html( $link['target'] ); ?>"
                            >
                              <img src="<?php echo esc_url($imagem_cta['url']); ?>" alt="<?php echo esc_html($imagem_cta['alt']); ?>" class="<?php echo ($imagem_cta_hover) ? 'has-hover' : '';?>"/>
                              <?php if($imagem_cta_hover) { ?>
                                <img src="<?php echo esc_url($imagem_cta_hover['url']); ?>" alt="<?php echo esc_html($imagem_cta_hover['alt']); ?>" class="is-hover" />
                              <?php } ?>
                            </a>
                          <?php } else { 
                            if($habilitar_modal) { ?>
                              <a class="button <?php echo $classBtn;?> btn openModalInteresse" href="#" >
                                <?php echo esc_html( $link['title'] ); ?>
                              </a>
                            <?php } else { 
                              if( isset($link) ) {?>
                              <a 
                                href="<?php echo esc_url( $link['url'] ); ?>" 
                                target="<?php echo esc_html( $link['target'] ); ?>"
                                class="button btn <?php echo $classBtn;?>" 
                              >
                                <?php echo esc_html( $link['title'] ); ?>
                              </a>
                            <?php } 
                              }
                            } ?>
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
            
            <div class="col-4 col-lg-6 canais-digitais-image position-relative <?php echo __( $pos ); ?>">
              <img class="<?php echo ($img_mobile) ? 'd-none d-lg-block' : 'd-block'; ?> position-absolute" src="<?php echo esc_url($img['url']); ?>" alt="<?php echo esc_html($img['alt']); ?>" style="<?php echo $style_absolute; ?>">
              <?php 
              if($img_mobile) {
                echo '<img class="d-block d-lg-none" src="'.$img_mobile['url'].'" alt="'.$img_mobile['alt'].'" >';
              }
              ?>
            </div>
            
          </div>
        </div>
      </div>
    <?php
      if($row_index==1) {
        echo '</div>';
      }
      if($row_index==2) {
        echo '</div>';
      }
    }
    endwhile;
    // No value.
    } else {
      // Do something...
    }
    ?>
  </div>
</div>
