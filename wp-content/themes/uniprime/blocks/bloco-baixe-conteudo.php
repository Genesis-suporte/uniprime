
<?php 
  /*$label = get_field('label', $block['id']);
  $titulo = get_field('titulo', $block['id']);  
  $descricao = get_field('descricao', $block['id']);
  $custom_post_type = get_field('custom_post_type', $block['id']);*/
  /*
  CRIAR FORM 
  */
?>
<section class="bloco-cartoes z-13">
  <div class="container">
    <div class="row d-flex justify-content-between flex-column flex-lg-row">
      <div class="content-bloco-cards">
        <?php if($label) { ?>
          <div class="label-block">
            <?php echo esc_html($label); ?>
          </div>
        <?php }
        if($titulo) { ?>
          <div class="title-block <?php echo $tamanho_titulo;?> switzerlandLight">
            <?php echo esc_html($titulo); ?>
          </div>
        <?php } 
        if($descricao) { ?>
          <div class="description-block flex-grow-1">
            <?php echo esc_html($descricao); ?>
          </div>
        <?php } ?>
        <div class="container-cards">
          <div class="cards d-grid container-grid-two-col">
           
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
