<?php 
  $title_banner = get_field('title_banner', $block['id']);
  $description_banner = get_field('description_banner', $block['id']);
  $image_banner = get_field('image_banner', $block['id']);
  $image_banner_mobile = get_field('image_banner_mobile', $block['id']);
?>
<div class="banner-internas position-relative">
  <div class="hero-image">
    <div class="image <?php echo $image_banner_mobile ? 'd-none d-sm-block' : ''; ?>" style="background-image: url(<?php echo esc_url($image_banner['url']); ?>);"></div>
    <?php if($image_banner_mobile) { ?>
      <div class="image d-block d-sm-none" style="background-image: url(<?php echo esc_url($image_banner_mobile['url']); ?>);"></div>
    <?php } ?>
    <div class="container">
      <div class="position-absolute copy">
        <?php if($title_banner) { ?>
          <h1 class="title title-48 switzerlandLight">
            <?php echo esc_html($title_banner); ?>
          </h1>
        <?php } ?>
        <?php if($description_banner) { ?>
          <div class="description title-24 switzerlandBold">
            <?php echo esc_html($description_banner); ?>
          </div>
        <?php } ?>
      </div>
    </div>
  </div>
</div>