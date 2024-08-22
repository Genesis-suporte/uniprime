<?php

/**
 * Template Name: Página de Fale Conosco
 */

get_header(); 

$title_banner = get_field('title_banner');
$description_banner = get_field('description_banner');
$image_banner = get_field('image_banner');
$image_banner_mobile = get_field('image_banner_mobile');

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
          <h2 class="description title-24 switzerlandBold">
            <?php echo esc_html($description_banner); ?>
          </h2>
        <?php } ?>
      </div>
    </div>
  </div>
</div>
<?php
if (file_exists(get_template_directory() . '/blocks/breadcrumbs.php')) {
  include(get_template_directory() . '/blocks/breadcrumbs.php');
}
$upload_dir = wp_upload_dir();
$upload_url = $upload_dir['baseurl']; 
?>
<div class="wp-block-group alignfull div-logo-uniprime d-none d-md-block is-layout-constrained wp-block-group-is-layout-constrained wp-container-1-noticias is-position-sticky">
<figure class="wp-block-image alignright size-full is-resized logo-uniprime-background"><img fetchpriority="high" decoding="async" width="674" height="739" src="<?php echo $upload_url;?>/2024/03/logo-uniprime-gigante.png" alt="" class="wp-image-530" style="width:674px;height:auto" srcset="<?php echo $upload_url;?>/2024/03/logo-uniprime-gigante.png 674w, <?php echo $upload_url;?>/2024/03/logo-uniprime-gigante-274x300.png 274w" sizes="(max-width: 674px) 100vw, 674px"></figure>
</div>
<?php 
  $label = get_field('label');
  $titulo = get_field('titulo');
  $descricao = get_field('descricao');


  $label_bloco_direita = get_field('label_bloco_direita');
  $descricao_bloco_direita = get_field('descricao_bloco_direita');
  $telefone_1 = get_field('telefone_1');
  $descricao_1 = get_field('descricao_1');
  $link_1 = get_field('link_1');
  $telefone_2 = get_field('telefone_2');
  $descricao_2 = get_field('descricao_2');
  $link_2 = get_field('link_2');
  $telefone_3 = get_field('telefone_3');
  $descricao_3 = get_field('descricao_3');
  $link_3 = get_field('link_3');

  $label_ouvidoria = get_field('label_ouvidoria');
  $descricao_ouvidoria = get_field('descricao_ouvidoria');
  $telefone_4 = get_field('telefone_4');
  $descricao_4 = get_field('descricao_4');
  $link_4 = get_field('link_4');
  $telefone_5 = get_field('telefone_5');
  $descricao_5 = get_field('descricao_5');
  $link_5 = get_field('link_5');
  $descricao_pos_ouvidoria = get_field('descricao_pos_ouvidoria');
  $label_uniprime_central = get_field('label_uniprime_central');
  $descricao_uniprime_central = get_field('descricao_uniprime_central');
  $telefone_6 = get_field('telefone_6');
  $descricao_6 = get_field('descricao_6');
?>

<section class="fale-conosco mw-100 z-13">
  <div class="container">
    <div class="row">
      <div class="d-flex flex-column flex-lg-row">
        <div class="container-fale-conosco col-12 col-lg-6 d-flex flex-column">
          <div class="label-block">
            <?php echo esc_html($label); ?>
          </div>
          <div class="title-block title-28 switzerlandBold">
            <?php echo esc_html($titulo); ?>
          </div>
          <div class="description-block">
            <?php echo esc_html($descricao); ?>
          </div>
          <?php 
            if (function_exists('do_shortcode')) {
              // Exibe o formulário usando do_shortcode()
              echo do_shortcode('[gravityform id="1" title="false" ajax="true" description="false"]');
            } ?>
        </div>
        <div class="cards-fale-conosco col-12 col-lg-6">
          <div class="bloco-contato">
            <div class="label-contato icon-central icon-menu">
              <?php echo esc_html($label_bloco_direita); ?>
            </div>
            <div class="description-contato">
              <?php echo esc_html($descricao_bloco_direita); ?>
            </div>
            <div class="bloco-interno-contato">
              <div class="telefone-contato">
                <?php echo esc_html($telefone_1); ?>
              </div>
              <div class="description-contato">
                <?php echo ($descricao_1); ?>
              </div>
            </div>
            <div class="bloco-interno-contato">
              <div class="telefone-contato">
                <?php echo esc_html($telefone_2); ?>
              </div>
              <div class="description-contato">
                <?php echo ($descricao_2); ?>
              </div>
            </div>
            <div class="bloco-interno-contato">
              <div class="telefone-contato">
                <?php echo esc_html($telefone_3); ?>
              </div>
              <div class="description-contato">
                <?php echo ($descricao_3); ?>
              </div>
            </div>
          </div>
          <div class="bloco-contato">
            <div class="label-contato icon-phone icon-menu">
              <?php echo esc_html($label_ouvidoria); ?>
            </div>
            <div class="description-contato">
              <?php echo esc_html($descricao_ouvidoria); ?>
            </div>
            <div class="bloco-interno-contato">
              <div class="telefone-contato">
                <?php echo esc_html($telefone_4); ?>
              </div>
              <div class="description-contato">
                <?php echo ($descricao_4); ?>
              </div>
            </div>
            <div class="bloco-interno-contato">
              <div class="telefone-contato">
                <?php echo esc_html($telefone_5); ?>
              </div>
              <div class="description-contato">
                <?php echo ($descricao_5); ?>
              </div>
            </div> 
            <div class="description-contato descricao-pos-ouvidoria">
              <?php echo esc_html($descricao_pos_ouvidoria); ?>
            </div>
          </div> 
          <div class="bloco-contato">
            <div class="label-contato icon-phone icon-menu">
              <?php echo esc_html($label_uniprime_central); ?>
            </div>
            <div class="description-contato">
              <?php echo esc_html($descricao_uniprime_central); ?>
            </div>
            <div class="bloco-interno-contato">
              <div class="telefone-contato">
                <?php echo esc_html($telefone_6); ?>
              </div>
              <div class="description-contato">
                <?php echo ($descricao_6); ?>
              </div>
            </div> 
          </div> 

        </div>
      </div>
    </div>
  </div>
  <div class="content">
  <?php 
  while ( have_posts() ) :
    the_post();

    // Display the content of the page.
    the_content();
    
  // End the loop.
  endwhile; ?>
</div>
</section>
<?php 
// @TODO -> Render onde-encontrar block
// Verifique se a função existe e renderize o bloco
if ( function_exists('acf_render_block') ) {
  acf_render_block(array(
    'name' => 'onde-encontrar',
  ));
}
?>

<?php get_footer(); ?>