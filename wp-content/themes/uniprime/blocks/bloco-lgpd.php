<?php 
$titulo = get_field('titulo');
$texto_esquerda = get_field('texto_esquerda');
$texto_direita = get_field('texto_direita');
?>
<div class="main-protocolo content-lgpd">
  <div class="content-protocolo">
    <div class="num-protocolo title-28 switzerlandBold"><?php echo esc_html($titulo);?></div>
    <div class="d-flex flex-column flex-md-row justify-content-between">
      <div class="col-left">
        <?php echo __($texto_esquerda);?>
      </div>
      <div class="col-right">
        <?php echo __($texto_direita);?>
      </div>
    </div>
  </div>
</div>