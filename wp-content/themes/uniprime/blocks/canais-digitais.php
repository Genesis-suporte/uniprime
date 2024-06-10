<?php 
  $label = get_field('label', $block['id']);
  $titulo = get_field('titulo', $block['id']); 
  $tamanho_titulo = get_field('tamanho_titulo', $block['id']);
  $fonte_titulo = get_field('fonte_titulo', $block['id']);
  if($fonte_titulo == 'Normal') {
    $fonte_style = '';
  } else {
    $fonte_style = $fonte_titulo;
  }
  
  $descricao = get_field('descricao', $block['id']);
  $img = get_field('imagem_do_bloco', $block['id']);
  $layout = get_field('layout', $block['id']);
  $imagem_de_fundo = get_field('imagem_de_fundo', $block['id']);
  $posicao_imagem = get_field('posicao_imagem', $block['id']);
  if($imagem_de_fundo) {
    $bg_image = 'style="background: url('.esc_html($imagem_de_fundo).') no-repeat;"';
  } else {
    $bg_image = "";
  }
  if ($layout == 'layout1') { ?>
    <section class="canais-digitais mw-100 layout-1" <?php echo $bg_image;?>>
      <div class="container">
        <div class="d-flex justify-content-lg-between flex-column flex-lg-row">
          <div class="col-12 col-lg-6 canais-digitais-image z-13 d-lg-flex justify-content-lg-end">
            <img src="<?php echo esc_url($img['url']); ?>" alt="<?php echo esc_html($img['alt']); ?>" >
          </div>
          <div class="col-12 col-lg-6 col-right">
            <?php if($label) { ?>
              <div class="label-block">
                <?php echo esc_html($label); ?>
              </div>
            <?php }
            if($titulo) { ?>
              <div class="title-block <?php echo $tamanho_titulo;?> switzerland<?php echo $fonte_style;?>">
                <?php echo esc_html($titulo); ?>
              </div>
            <?php } ?>
            <div class="description-block">
              <?php echo esc_html($descricao); ?>
            </div>
            <div class="d-flex justify-content-center justify-content-md-between gap-2 flex-wrap flex-md-nowrap">
              <?php 
              if( have_rows('botoes') ):
                while ( have_rows('botoes') ) : the_row();
                  // Case: Paragraph layout.
                  if( get_row_layout() == 'botao' ) {
                    $estilo_do_botao = get_sub_field('estilo_do_botao'); 
                    $habilitar_modal = get_sub_field('habilitar_modal');
                    $link = get_sub_field('link');
                    
                    if($estilo_do_botao == 'imagem') {
                      $classBtn = 'btn-actived';
                      $imagem_cta = get_sub_field('imagem_cta');
                      $classBtn = '';
                    } else if($estilo_do_botao == 'azul') {
                      $classBtn = 'btn-primary btn';
                    } else if($estilo_do_botao == 'amarelo') {
                      $classBtn = 'btn-actived btn';
                    } else if($estilo_do_botao == 'branco') {
                      $classBtn = 'btn-primary-color btn';
                    }
                    ?>
                    
                    <div class="card-canais-digitais">
                      <?php 
                      if($habilitar_modal) { ?>
                        <a class="button <?php echo $classBtn;?>"  
                          href="javascript:void(0)" 
                          data-title_card="<?php echo esc_html( get_field('titulo_modal_interesse', $block['id']) ); ?>"
                          data-label_interesse="<?php echo esc_html( get_field('label_modal_interesse', $block['id']) ); ?>"
                          data-title_interesse="<?php echo esc_html( get_field('titulo_modal_interesse', $block['id']) ); ?>"
                          data-description_interesse="<?php echo esc_html( get_field('descricao_modal_interesse', $block['id']) ); ?>"
                          data-habilitar="<?php echo esc_html( json_encode(get_field('habilitar_botoes', $block['id'])) ); ?>"
                          data-texto_telefone="<?php echo esc_html( get_field('texto_telefone', $block['id']) ); ?>"
                          data-texto_whatsapp="<?php echo esc_html( get_field('texto_whatsapp', $block['id']) ); ?>"
                          data-numero_whatsapp="<?php echo esc_html( get_field('numero_whatsapp', $block['id']) ); ?>"
                          data-id_form="<?php echo esc_html( get_field('id_form', $block['id']) ); ?>"
                          onclick="abreModalInteresse(this)">
                          <?php if($estilo_do_botao == 'imagem') { ?>
                            <img src="<?php echo esc_url($imagem_cta['url']); ?>" alt="<?php echo esc_html($imagem_cta['alt']); ?>" />
                          <?php } else { ?> 
                            <?php echo esc_html( $link['title'] ); ?>
                          <?php } ?>
                        </a>
                      <?php } else { ?>
                        <a 
                          href="<?php echo esc_url( $link['url'] ); ?>" 
                          class="button <?php echo $classBtn;?>" 
                          <?php if($estilo_do_botao == 'imagem') { ?>
                            target="<?php echo esc_html( $link['target'] ); ?>"
                          <?php } ?>>
                            <?php if($estilo_do_botao == 'imagem') { ?>
                              <img src="<?php echo esc_url($imagem_cta['url']); ?>" alt="<?php echo esc_html($imagem_cta['alt']); ?>" />
                            <?php } else { ?> 
                              <?php echo esc_html( $link['title'] ); ?>
                            <?php } ?>
                        </a>
                      <?php } ?>

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
    <section class="canais-digitais mw-100 layout-2" <?php echo $bg_image;?>>
      <div class="container">
        <div class="row">
          <div class="d-flex justify-content-lg-between flex-column flex-lg-row position-relative">
            <div class="col-12 col-lg-6 canais-digitais-image z-13">
              <img src="<?php echo esc_url($img['url']); ?>" alt="<?php echo esc_html($img['alt']); ?>" >
            </div>
            <div class="col-12 col-lg-6 col-right">
              <?php if($label) { ?>
                <div class="label-block">
                  <?php echo esc_html($label); ?>
                </div>
              <?php }
              if($titulo) { ?>
                <div class="title-block <?php echo $tamanho_titulo;?> switzerland<?php echo $fonte_style;?>">
                  <?php echo esc_html($titulo); ?>
                </div>
              <?php } ?>
              <div class="description-block">
                <?php echo esc_html($descricao); ?>
              </div>
              <div class="d-flex justify-content-start justify-content-lg-center justify-content-md-between gap-2 flex-wrap flex-md-nowrap">
                <?php 
                if( have_rows('botoes') ):
                  while ( have_rows('botoes') ) : the_row();
                    // Case: Paragraph layout.
                    if( get_row_layout() == 'botao' ) {
                      $estilo_do_botao = get_sub_field('estilo_do_botao'); 
                      $habilitar_modal = get_sub_field('habilitar_modal');
                      $link = get_sub_field('link');
                      
                      if($estilo_do_botao == 'imagem') {
                        $classBtn = 'btn-actived';
                        $imagem_cta = get_sub_field('imagem_cta');
                        $classBtn = '';
                      } else if($estilo_do_botao == 'azul') {
                        $classBtn = 'btn-primary btn';
                      } else if($estilo_do_botao == 'amarelo') {
                        $classBtn = 'btn-actived btn';
                      } else if($estilo_do_botao == 'branco') {
                        $classBtn = 'btn-primary-color btn';
                      }
                      ?>
                      
                      <div class="card-canais-digitais">
                        <?php 
                        if($habilitar_modal) { ?>
                          <a class="button <?php echo $classBtn;?>"  
                            href="javascript:void(0)" 
                            data-title_card="<?php echo esc_html( get_field('titulo_modal_interesse', $block['id']) ); ?>"
                            data-label_interesse="<?php echo esc_html( get_field('label_modal_interesse', $block['id']) ); ?>"
                            data-title_interesse="<?php echo esc_html( get_field('titulo_modal_interesse', $block['id']) ); ?>"
                            data-description_interesse="<?php echo esc_html( get_field('descricao_modal_interesse', $block['id']) ); ?>"
                            data-habilitar="<?php echo esc_html( json_encode(get_field('habilitar_botoes', $block['id'])) ); ?>"
                            data-texto_telefone="<?php echo esc_html( get_field('texto_telefone', $block['id']) ); ?>"
                            data-texto_whatsapp="<?php echo esc_html( get_field('texto_whatsapp', $block['id']) ); ?>"
                            data-numero_whatsapp="<?php echo esc_html( get_field('numero_whatsapp', $block['id']) ); ?>"
                            data-id_form="<?php echo esc_html( get_field('id_form', $block['id']) ); ?>"
                            onclick="abreModalInteresse(this)"
                            <?php if($estilo_do_botao == 'imagem') { ?>
                              target="<?php echo esc_html( $link['target'] ); ?>"
                            <?php } ?> >
                            <?php if($estilo_do_botao == 'imagem') { ?>
                              <img src="<?php echo esc_url($imagem_cta['url']); ?>" alt="<?php echo esc_html($imagem_cta['alt']); ?>" />
                            <?php } else { ?> 
                              <?php echo esc_html( $link['title'] ); ?>
                              <?php if($estilo_do_botao == 'branco') {
                                echo '<i class="icon-cta-blue right"></i>';
                              } ?>
                            <?php } ?>
                          </a>
                        <?php } else { ?>
                          <a 
                            href="<?php echo esc_url( $link['url'] ); ?>" 
                            class="button <?php echo $classBtn;?>" 
                            <?php if($estilo_do_botao == 'imagem') { ?>
                              target="<?php echo esc_html( $link['target'] ); ?>"
                            <?php } ?>>
                              <?php if($estilo_do_botao == 'imagem') { ?>
                                <img src="<?php echo esc_url($imagem_cta['url']); ?>" alt="<?php echo esc_html($imagem_cta['alt']); ?>" />
                              <?php } else { ?> 
                                <?php echo esc_html( $link['title'] ); ?>
                                <?php if($estilo_do_botao == 'branco') {
                                echo '<i class="icon-cta-blue right"></i>';
                                } ?>
                              <?php } ?>
                          </a>
                        <?php } ?>

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
            <div class="row position-absolute fundo-cinza w-100"></div>

          </div>
        </div>
      </div>
    </section>
  <?php }
  if ($layout == 'layout3') { ?>
    <section class="canais-digitais layout-3 mw-100" <?php echo $bg_image;?>>
      <div class="container">
        <div class="d-flex justify-content-lg-between flex-column flex-lg-row">
          <div class="col canais-digitais-image z-13 d-none d-lg-flex justify-content-lg-end">
            <img src="<?php echo esc_url($img['url']); ?>" alt="<?php echo esc_html($img['alt']); ?>" >
          </div>
          <div class="col col-right">
            <?php if($label) { ?>
              <div class="label-block">
                <?php echo esc_html($label); ?>
              </div>
            <?php }
            if($titulo) { ?>
              <div class="title-block <?php echo $tamanho_titulo;?> switzerland<?php echo $fonte_style;?>">
                <?php echo esc_html($titulo); ?>
              </div>
            <?php }
            if($descricao) { ?>
              <div class="description-block">
                <?php echo esc_html($descricao); ?>
              </div>
            <?php } ?>
            <div class="d-flex justify-content-center justify-content-md-between gap-2 flex-wrap flex-md-nowrap">
              <?php 
              if( have_rows('botoes') ):
                while ( have_rows('botoes') ) : the_row();
                  // Case: Paragraph layout.
                  if( get_row_layout() == 'botao' ) {
                    $estilo_do_botao = get_sub_field('estilo_do_botao'); 
                    $habilitar_modal = get_sub_field('habilitar_modal');
                    $link = get_sub_field('link');
                    
                    if($estilo_do_botao == 'imagem') {
                      $classBtn = 'btn-actived';
                      $imagem_cta = get_sub_field('imagem_cta');
                      $classBtn = '';
                    } else if($estilo_do_botao == 'azul') {
                      $classBtn = 'btn-primary btn';
                    } else if($estilo_do_botao == 'amarelo') {
                      $classBtn = 'btn-actived btn';
                    } else if($estilo_do_botao == 'branco') {
                      $classBtn = 'btn-primary-color btn';
                    }
                    ?>
                    
                    <div class="card-canais-digitais">
                      <?php 
                      if($habilitar_modal) { ?>
                        <a class="button <?php echo $classBtn;?>"  
                          href="javascript:void(0)" 
                          data-title_card="<?php echo esc_html( get_field('titulo_modal_interesse', $block['id']) ); ?>"
                          data-label_interesse="<?php echo esc_html( get_field('label_modal_interesse', $block['id']) ); ?>"
                          data-title_interesse="<?php echo esc_html( get_field('titulo_modal_interesse', $block['id']) ); ?>"
                          data-description_interesse="<?php echo esc_html( get_field('descricao_modal_interesse', $block['id']) ); ?>"
                          data-habilitar="<?php echo esc_html( json_encode(get_field('habilitar_botoes', $block['id'])) ); ?>"
                          data-texto_telefone="<?php echo esc_html( get_field('texto_telefone', $block['id']) ); ?>"
                          data-texto_whatsapp="<?php echo esc_html( get_field('texto_whatsapp', $block['id']) ); ?>"
                          data-numero_whatsapp="<?php echo esc_html( get_field('numero_whatsapp', $block['id']) ); ?>"
                          data-id_form="<?php echo esc_html( get_field('id_form', $block['id']) ); ?>"
                          onclick="abreModalInteresse(this)"
                          <?php if($estilo_do_botao == 'imagem') { ?>
                            target="<?php echo esc_html( $link['target'] ); ?>"
                          <?php } ?> >
                          <?php if($estilo_do_botao == 'imagem') { ?>
                            <img src="<?php echo esc_url($imagem_cta['url']); ?>" alt="<?php echo esc_html($imagem_cta['alt']); ?>" />
                          <?php } else { ?> 
                            <?php echo esc_html( $link['title'] ); ?>
                            <?php if($estilo_do_botao == 'branco') {
                               echo '<i class="icon-cta-blue right"></i>';
                            } ?>
                          <?php } ?>
                        </a>
                      <?php } else { ?>
                        <a 
                          href="<?php echo esc_url( $link['url'] ); ?>" 
                          class="button <?php echo $classBtn;?>" 
                          <?php if($estilo_do_botao == 'imagem') { ?>
                            target="<?php echo esc_html( $link['target'] ); ?>"
                          <?php } ?>>
                            <?php if($estilo_do_botao == 'imagem') { ?>
                              <img src="<?php echo esc_url($imagem_cta['url']); ?>" alt="<?php echo esc_html($imagem_cta['alt']); ?>" />
                            <?php } else { ?> 
                              <?php echo esc_html( $link['title'] ); ?>
                            <?php } ?>
                        </a>
                      <?php } ?>

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
      <div class="d-flex justify-content-lg-between flex-column-reverse flex-lg-row">
        <div class="col-12 col-lg-5 col-right fix-padding-left">
          <?php if($label) { ?>
            <div class="label-block">
              <?php echo esc_html($label); ?>
            </div>
          <?php }
          if($titulo) { ?>
            <div class="title-block <?php echo $tamanho_titulo;?> switzerland<?php echo $fonte_style;?>">
              <?php echo esc_html($titulo); ?>
            </div>
          <?php }
          if($descricao) { ?>
            <div class="description-block">
              <?php echo esc_html($descricao); ?>
            </div>
          <?php } ?>
          <div class="d-flex justify-content-start justify-content-md-start gap-2 flex-wrap flex-md-nowrap">
            <?php 
            if( have_rows('botoes') ):
              while ( have_rows('botoes') ) : the_row();
                // Case: Paragraph layout.
                if( get_row_layout() == 'botao' ) {
                  $estilo_do_botao = get_sub_field('estilo_do_botao'); 
                  $habilitar_modal = get_sub_field('habilitar_modal');
                  $link = get_sub_field('link');
                  
                  if($estilo_do_botao == 'imagem') {
                    $classBtn = 'btn-actived';
                    $imagem_cta = get_sub_field('imagem_cta');
                    $classBtn = '';
                  } else if($estilo_do_botao == 'azul') {
                    $classBtn = 'btn-primary btn';
                  } else if($estilo_do_botao == 'amarelo') {
                    $classBtn = 'btn-actived btn';
                  } else if($estilo_do_botao == 'branco') {
                    $classBtn = 'btn-primary-color btn';
                  }
                  ?>
                  
                  <div class="card-canais-digitais">
                    <?php 
                    if($habilitar_modal) { ?>
                      <a class="button <?php echo $classBtn;?>"  
                        href="javascript:void(0)" 
                        data-title_card="<?php echo esc_html( get_field('titulo_modal_interesse', $block['id']) ); ?>"
                        data-label_interesse="<?php echo esc_html( get_field('label_modal_interesse', $block['id']) ); ?>"
                        data-title_interesse="<?php echo esc_html( get_field('titulo_modal_interesse', $block['id']) ); ?>"
                        data-description_interesse="<?php echo esc_html( get_field('descricao_modal_interesse', $block['id']) ); ?>"
                        data-habilitar="<?php echo esc_html( json_encode(get_field('habilitar_botoes', $block['id'])) ); ?>"
                        data-texto_telefone="<?php echo esc_html( get_field('texto_telefone', $block['id']) ); ?>"
                        data-texto_whatsapp="<?php echo esc_html( get_field('texto_whatsapp', $block['id']) ); ?>"
                        data-numero_whatsapp="<?php echo esc_html( get_field('numero_whatsapp', $block['id']) ); ?>"
                        data-id_form="<?php echo esc_html( get_field('id_form', $block['id']) ); ?>"
                        onclick="abreModalInteresse(this)"
                        <?php if($estilo_do_botao == 'imagem') { ?>
                          target="<?php echo esc_html( $link['target'] ); ?>"
                        <?php } ?> >
                        <?php if($estilo_do_botao == 'imagem') { ?>
                          <img src="<?php echo esc_url($imagem_cta['url']); ?>" alt="<?php echo esc_html($imagem_cta['alt']); ?>" />
                        <?php } else { ?> 
                          <?php echo esc_html( $link['title'] ); ?>
                          <?php if($estilo_do_botao == 'branco') {
                              echo '<i class="icon-cta-blue right"></i>';
                          } ?>
                        <?php } ?>
                      </a>
                    <?php } else { ?>
                      <a 
                        href="<?php echo esc_url( $link['url'] ); ?>" 
                        class="button <?php echo $classBtn;?>" 
                        <?php if($estilo_do_botao == 'imagem') { ?>
                          target="<?php echo esc_html( $link['target'] ); ?>"
                        <?php } ?>>
                          <?php if($estilo_do_botao == 'imagem') { ?>
                            <img src="<?php echo esc_url($imagem_cta['url']); ?>" alt="<?php echo esc_html($imagem_cta['alt']); ?>" />
                          <?php } else { ?> 
                            <?php echo esc_html( $link['title'] ); ?>
                          <?php } ?>
                      </a>
                    <?php } ?>

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
        <div class="col-12 col-lg-7 canais-digitais-image z-13">
          <img src="<?php echo esc_url($img['url']); ?>" alt="<?php echo esc_html($img['alt']); ?>" >
        </div>
      </div>
    </section>
  <?php } ?>