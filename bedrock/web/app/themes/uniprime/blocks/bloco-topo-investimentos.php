<?php 
  $title = get_field('titulo', $block['id']);
  $description = get_field('descricao', $block['id']);
?>
<div class="banner-investimentos-internas position-relative">
  <div class="container">
    <div class="position-absolute copy">
      <?php if($title) { ?>
        <h1 class="title title-48 switzerlandLight">
          <?php echo esc_html($title); ?>
        </h1>
      <?php } ?>
      <?php if($description) { ?>
        <div class="description title-24 switzerlandBold">
          <?php echo esc_html($description); ?>
        </div>
      <?php } ?>
    </div>
  </div>
</div>