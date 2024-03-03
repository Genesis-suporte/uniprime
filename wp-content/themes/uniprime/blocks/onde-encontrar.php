<?php 
  $label = get_field('label', $block['id']);
  $destaque = get_field('destaque', $block['id']);
  $descricao = get_field('descricao', $block['id']);
?>
<section class="onde-encontrar mw-100 top-739">
  <div class="container">
    <div class="row d-flex justify-content-between">
      <div class="col">
        <div class="block-left">
          <div class="label-block">
            <?php echo esc_html($label); ?>
          </div>
          <div class="destaque-block">
            <?php echo esc_html($destaque); ?>
          </div>
          <div class="description">
            <?php echo esc_html($descricao); ?>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="input-onde-encontrar">
          <input type="text" class="input" id="click-onde-encontrar" onfocus="this.value='';" value="Qual a sua cidade?"></input>
          <button class="icon icon-search-white"></button>
        </div>
      </div>
    </div>
  </div>
</section>