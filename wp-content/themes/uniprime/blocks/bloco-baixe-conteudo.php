
<?php 
  /*$label = get_field('label', $block['id']);
  $custom_post_type = get_field('custom_post_type', $block['id']);*/
  $titulo = get_field('titulo', $block['id']);  
  $descricao = get_field('descricao', $block['id']);
  $image = get_field('image');
  
?>
<section class="bloco-conteudo-exclusivo z-13">
  <div class="container d-flex flex-column flex-lg-row">
    <div class="content-left">
      <?php if($image) { ?>
        <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_html($image['alt']); ?>" >
      <?php } ?>
    </div>
    <div class="content-right">
      <?php if($titulo) { ?>
        <div class="title-block title-36 switzerlandLight">
          <?php echo esc_html($titulo); ?>
        </div>
      <?php } 
      if($descricao) { ?>
        <div class="description-block flex-grow-1">
          <?php echo esc_html($descricao); ?>
        </div>
      <?php } ?>
      [gravityform id="2" title="false"]
    </div>
  </div>
</section>
