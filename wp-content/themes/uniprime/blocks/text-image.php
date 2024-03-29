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
        <div class="position-relative">
          
          <div class="label-block">
            <?php echo esc_html($label); ?>
          </div>
          <div class="description-block">
            <?php if ($posicao_imagem != 'nenhuma') { ?>
              <img src="<?php echo esc_url($img['url']); ?>" alt="<?php echo esc_html($img['alt']); ?>" class="img <?php echo $posicao_imagem;?> d-none d-lg-block">
            <?php } ?>
            <h1 class="title-block"><?php echo esc_html($titulo); ?></h1>
            <?php echo __($descricao); ?>
            
            <?php if ($posicao_imagem != 'nenhuma') { ?>
              <img src="<?php echo esc_url($img['url']); ?>" alt="<?php echo esc_html($img['alt']); ?>" class="img <?php echo $posicao_imagem;?> d-flex d-lg-none">
            <?php } ?>
          </div>
          
          
        </div>
      </div>
      
    </div>
  </div>
</section>