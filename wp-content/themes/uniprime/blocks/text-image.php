<?php 
  $label = get_field('label', $block['id']);
  $titulo = get_field('titulo', $block['id']);
  $descricao = get_field('descricao', $block['id']);
  $posicao_imagem = get_field('posicao_imagem', $block['id']);
  $img = get_field('imagem', $block['id']);

?>

<section class="content-internas z-13 mw-100">
  <div class="container">
    <div class="row">
      <div class="copy">
        <div class="label-block">
          <?php echo esc_html($label); ?>
        </div>
        <div class="title-block">
          <?php echo esc_html($titulo); ?>
        </div>
        <div class="position-relative">
          <div class="description-block <?php echo $posicao_imagem;?>">
            <?php echo __($descricao); ?>
          </div>
          
          <?php //if ($posicao_imagem != 'nenhuma') { ?>
            <div class="img <?php echo $posicao_imagem;?>">
              <img src="<?php echo esc_url($img['url']); ?>" alt="<?php echo esc_html($img['alt']); ?>" >
            </div>
          <?php //} ?>
        </div>
      </div>
      
    </div>
  </div>
</section>