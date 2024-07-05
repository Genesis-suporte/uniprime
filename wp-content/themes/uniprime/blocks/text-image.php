<?php 
  $label = get_field('label', $block['id']);
  $titulo = get_field('titulo', $block['id']);
  $descricao = get_field('descricao', $block['id']);
  $posicao_imagem = get_field('posicao_imagem', $block['id']);
  $img = get_field('imagem', $block['id']);
  $image_mobile = get_field('image_mobile', $block['id']);

?>

<section class="content-internas z-13 mw-100">
  <div class="container">
    <div class="row">
      <div class="copy <?php echo ($posicao_imagem == 'nenhuma') ? 'no-image' : '';?>">
        <div class="position-relative">
          
          <div class="label-block">
            <?php echo esc_html($label); ?>
          </div>
          <div class="description-block">
            <?php if ($posicao_imagem != 'nenhuma') { ?>
              <img src="<?php echo esc_url($img['url']); ?>" alt="<?php echo esc_html($img['alt']); ?>" class="img <?php echo $posicao_imagem;?> d-none d-lg-block">
            <?php } ?>
            <h1 class="title-block title-28 switzerlandBold"><?php echo esc_html($titulo); ?></h1>
            <?php echo __($descricao); ?>
            
            <?php if ($image_mobile) { ?>
              <img src="<?php echo esc_url($image_mobile['url']); ?>" alt="<?php echo esc_html($image_mobile['alt']); ?>" class="img <?php echo $posicao_imagem;?> d-flex d-lg-none pb-4">
            <?php } else if (!$image_mobile && $posicao_imagem != 'nenhuma'){ ?>
              <img src="<?php echo esc_url($img['url']); ?>" alt="<?php echo esc_html($img['alt']); ?>" class="img <?php echo $posicao_imagem;?> d-flex d-lg-none pb-4">
            <?php } ?>
            
            <?php 
              $estilo_do_botao = get_field('estilo_do_botao', $block['id']);
              $habilitar_modal = get_field('habilitar_modal', $block['id']);
              $link = get_field('link', $block['id']);
              
              $classBtn = '';
              if($estilo_do_botao == 'imagem') {
                $classBtn = 'btn-actived';
                $imagem_cta = get_field('imagem_cta', $block['id']);
              } else if($estilo_do_botao == 'azul') {
                $classBtn = 'button btn-primary btn';
              } else if($estilo_do_botao == 'amarelo') {
                $classBtn = 'button btn-actived btn';
              } else if($estilo_do_botao == 'branco') {
                $classBtn = 'button btn-primary-color btn';
              } else if($estilo_do_botao == 'link') {
                $classBtn = 'link';
              }
              
              if($estilo_do_botao != 'nenhum') {
                if($habilitar_modal) { ?>
                <div class="d-block pt-4  text-center text-sm-left">
                  <a class="button <?php echo $classBtn;?>"  
                    href="javascript:void(0)" 
                    data-title_card="<?php echo esc_html( $titulo_card ); ?>"
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
                      <?php echo esc_html( $link['title'] ); ?>
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
                <div class="d-block pt-4">
                  <a 
                    href="<?php echo esc_url( $link['url'] ); ?>" 
                    class=" <?php echo $classBtn;?>" 
                    <?php if($estilo_do_botao == 'imagem') { ?>
                      target="<?php echo esc_html( $link['target'] ); ?>"
                    <?php } ?>
                  >
                    <?php if($estilo_do_botao == 'imagem') { ?>
                      <img src="<?php echo esc_url($imagem_cta['url']); ?>" alt="<?php echo esc_html($imagem_cta['alt']); ?>" />
                    <?php } else { ?> 
                      <?php echo esc_html( $link['title'] ); ?>
                      <?php if($estilo_do_botao == 'branco') {
                        echo '<i class="icon-cta-blue right"></i>';
                      } ?>
                      <?php if($estilo_do_botao == 'link') {
                        echo '<i class="arrow right"></i>';
                      } ?>
                    <?php } ?>
                  </a>
                </div>
              <?php } 
              } ?>
          </div>
          
          
        </div>
      </div>
      
    </div>
  </div>
</section>