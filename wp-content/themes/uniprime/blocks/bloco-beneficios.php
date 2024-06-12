<?php 
  $label = get_field('label', $block['id']);
  $titulo = get_field('titulo', $block['id']);
  $descricao = get_field('descricao', $block['id']);
?>

<section class="beneficios-institucional mw-100 z-13">
  <div class="container">
    <div class="row d-flex justify-content-between">
      <div class="col">
      <?php if($label) { ?>
          <div class="label-block">
            <?php echo esc_html($label); ?>
          </div>
        <?php }
        if($titulo) { ?>
          <div class="title-block title-28 switzerlandBold">
            <?php echo esc_html($titulo); ?>
          </div>
        <?php } 
        if($descricao) { ?>
        <div class="description-block">
          <div class="d-flex">
            <div class="flex-grow-1">
              <?php echo esc_html($descricao); ?>
            </div>
            <div class="arrows-beneficios-desktop d-none d-lg-flex"></div>
          </div>
        </div>
        <?php } ?>
      </div>
      <div class="container-">
        <div class="d-flex justify-content-between slide-beneficios">
          <?php 
          if( have_rows('beneficios') ){
            while ( have_rows('beneficios') ) : the_row();
              // Case: Paragraph layout.
              if( get_row_layout() == 'cards' ) {
                $titulo_card = get_sub_field('titulo_card');
                $descricao_card = get_sub_field('descricao_card');
                $sub_descricao_card = get_sub_field('sub_descricao');
                $imagem_card = get_sub_field('imagem_card');

                $estilo_do_botao = get_sub_field('estilo_do_botao'); 
                $habilitar_modal = get_sub_field('habilitar_modal');
                $link_card = get_sub_field('link');
                
                $classBtn = '';
                if($estilo_do_botao == 'imagem') {
                  $classBtn = 'btn-actived';
                  $imagem_cta = get_sub_field('imagem_cta');
                } else if($estilo_do_botao == 'azul') {
                  $classBtn = 'button btn-primary btn';
                } else if($estilo_do_botao == 'amarelo') {
                  $classBtn = 'button btn-actived btn';
                } else if($estilo_do_botao == 'branco') {
                  $classBtn = 'button btn-primary-color btn';
                } else if($estilo_do_botao == 'link') {
                  $classBtn = 'link';
                } else {
                  $estilo_do_botao = 'nenhum';
                }
                
                ?>
                <div class="card-beneficios position-relative">
                  <div class="image d-flex justify-content-center">
                    <img src="<?php echo esc_url($imagem_card['url']); ?>" alt="<?php echo esc_html($imagem_card['alt']); ?>" >
                    <div class="overlay d-block"></div>
                  </div>
                  <div class="position-absolute copy">
                    <?php if($titulo_card) { ?>
                      <div class="title title-62 switzerlandLight">
                        <?php echo esc_html($titulo_card); ?>
                      </div>
                    <?php }  ?>
                    <?php if($descricao_card) { ?>
                      <div class="description">
                        <?php echo __($descricao_card); ?>
                      </div>
                    <?php } ?>
                    <?php if($sub_descricao_card) { ?>
                      <div class="sub-description">
                        <?php echo __($sub_descricao_card); ?>
                      </div>
                    <?php }  
                    
                    if($estilo_do_botao != 'nenhum') {
      
                      if($habilitar_modal) {  ?>
                        <div class="d-flex w-100 justify-content-start enabled">
                          <a class="button <?php echo $classBtn;?>"  
                            href="javascript:void(0)" 
                            data-title_card="<?php echo esc_html( $titulo ); ?>"
                            data-label_interesse="<?php echo esc_html( get_field('label_modal_interesse', $block['id']) ); ?>"
                            data-title_interesse="<?php echo esc_html( get_field('titulo_modal_interesse', $block['id']) ); ?>"
                            data-description_interesse="<?php echo esc_html( get_field('descricao_modal_interesse', $block['id']) ); ?>"
                            data-habilitar="<?php echo esc_html( json_encode(get_field('habilitar_botoes', $block['id'])) ); ?>"
                            data-texto_telefone="<?php echo esc_html( get_field('texto_telefone', $block['id']) ); ?>"
                            data-texto_whatsapp="<?php echo esc_html( get_field('texto_whatsapp', $block['id']) ); ?>"
                            data-numero_whatsapp="<?php echo esc_html( get_field('numero_whatsapp', $block['id']) ); ?>"
                            data-id_form="<?php echo esc_html( get_field('id_form', $block['id']) ); ?>"
                            onclick="abreModalInteresse(this)"
                          >
                            <?php if($estilo_do_botao == 'imagem') { ?>
                              <img src="<?php echo esc_url($imagem_cta['url']); ?>" alt="<?php echo esc_html($imagem_cta['alt']); ?>" />
                            <?php } else { ?> 
                              <?php echo esc_html( $link_card['title'] ); ?>
                              <?php if($estilo_do_botao == 'branco') {
                                echo '<i class="icon-cta-blue right"></i>';
                              } ?>
                              <?php if($estilo_do_botao == 'link') {
                                echo '<i class="arrow right"></i>';
                              } ?>
                            <?php } ?>
                          </a>
                        </div>
                      <?php } else { ?>
                        <div class="d-flex w-100 justify-content-start disabled">
                          <a 
                            href="<?php echo esc_url( $link_card['url'] ); ?>" 
                            class=" <?php echo $classBtn;?>" 
                            <?php if($estilo_do_botao == 'imagem') { ?>
                              target="<?php echo esc_html( $link_card['target'] ); ?>"
                            <?php } ?>
                          >
                            <?php if($estilo_do_botao == 'imagem') { ?>
                              <img src="<?php echo esc_url($imagem_cta['url']); ?>" alt="<?php echo esc_html($imagem_cta['alt']); ?>" />
                            <?php } else { ?> 
                              <?php echo esc_html( $link_card['title'] ); ?>
                              <?php if($estilo_do_botao == 'branco') {
                                echo '<i class="icon-cta-blue right"></i>';
                              } ?>
                              <?php if($estilo_do_botao == 'link_card') {
                                echo '<i class="arrow right"></i>';
                              } ?>
                            <?php } ?>
                          </a>
                        </div>
                      <?php } 
                      }?>
                  </div>
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
      <div class="arrows-beneficios-mobile arrows-mobile d-flex d-lg-none justify-content-center">
    </div>
  </div>
</section>
<?php 
  if( have_rows('bloco-mvv') ) {
    while ( have_rows('bloco-mvv') ) : the_row();
      if( get_row_layout() == 'cards' ) {
        $classe = get_sub_field('classe');
        $titulo = get_sub_field('titulo');
        $descricao = get_sub_field('descricao');?>
        <div class="card-mvv">
          <div class="content-card">
            <div class="icon-menu icon-<?php echo esc_html($classe); ?>"></div>
            <div class="title">
              <?php echo esc_html($titulo); ?>
            </div>
            <div class="description">
              <?php echo esc_html($descricao); ?>
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