<?php 
  $label = get_field('label', $block['id']);
  $titulo = get_field('titulo', $block['id']);
  $descricao = get_field('descricao', $block['id']);
?>
<div class="novidades mw-100 top-739">
  <div class="container">
    <div class="row d-flex justify-content-between">
      <div class="col">
        <div class="label-block">
          <?php echo esc_html($label); ?>
        </div>
        <div class="title-block">
          <?php echo esc_html($titulo); ?>
        </div>
        <div class="description-block">
          <?php echo esc_html($descricao); ?>
        </div>
        <div class="artigos">
          BLOCO NOTÍCIAS
        </div>
      </div>
    </div>
  </div>
</div>