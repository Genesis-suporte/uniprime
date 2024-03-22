<?php 
  $title_banner = get_field('title_banner', $block['id']);
  $description_banner = get_field('description_banner', $block['id']);
  $image_banner = get_field('image_banner', $block['id']);
?>
<div class="banner-internas position-relative">
  <div class="hero-image">
    <div class="image" style="background-image: url(<?php echo esc_url($image_banner['url']); ?>);">
      <!--<img src="<?php echo esc_url($image_banner['url']); ?>" alt="<?php echo esc_html($image_banner['alt']); ?>" >-->
    </div>
    <div class="container">
      <div class="position-absolute copy">
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
  </div>
</div>