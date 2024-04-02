<?php 
  $label = get_field('label', $block['id']);
  $destaque = get_field('destaque', $block['id']);
  $descricao = get_field('descricao', $block['id']);
  $imagem_de_fundo = get_field('imagem_de_fundo', $block['id']);
?>
<section class="onde-encontrar mw-100" style="background: url(<?php echo esc_html($imagem_de_fundo); ?>) no-repeat;">
  <div class="container">
    <div class="row d-flex justify-content-between flex-column flex-lg-row z-13">
      <div class="col d-flex justify-content-end">
        <div class="block-left">
          <div class="label-block">
            <?php echo esc_html($label); ?>
          </div>
          <div class="destaque-block title-60 switzerlandLight">
            <?php echo esc_html($destaque); ?>
          </div>
          <div class="description">
            <?php echo esc_html($descricao); ?>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="input-onde-encontrar z-13">
          <input type="text" class="input z-13" id="click-onde-encontrar" onfocus="this.value='';" value="Qual a sua cidade?"></input>
          <button class="icon icon-search-white"></button>
        </div>
      </div>
    </div>
  </div>
</section>