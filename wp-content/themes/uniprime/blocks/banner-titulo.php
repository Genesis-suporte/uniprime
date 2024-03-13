<?php 
  $title_banner = get_field('title_banner', $block['id']);
  $description_banner = get_field('description_banner', $block['id']);
  $image_banner = get_field('image_banner', $block['id']);
?>
<div class="banner-internas">
  <div class="hero-image">
    <div class="container position-relative">
      <div class="copy position-absolute">
        <?php if($title_banner) { ?>
          <div class="title">
            <?php echo esc_html($title_banner); ?>
          </div>
        <?php } ?>
        <?php if($description_banner) { ?>
          <div class="description">
            <?php echo esc_html($description_banner); ?>
          </div>
        <?php } ?>
      </div>
    </div>
    <div class="image">
      <img src="<?php echo esc_url($image_banner['url']); ?>" alt="<?php echo esc_html($image_banner['alt']); ?>" >
    </div>
  </div>
</div>