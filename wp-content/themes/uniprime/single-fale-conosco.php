<?php

/**
 * Template Name: Página de Fale Conosco
 */

get_header(); 

$title_banner = get_field('title_banner');
$description_banner = get_field('description_banner');
$image_banner = get_field('image_banner');

?>


<div class="banner-internas position-relative">
  <div class="hero-image">
    <div class="image" style="background-image: url(<?php echo esc_url($image_banner['url']); ?>);">
      <!--<img src="<?php echo esc_url($image_banner['url']); ?>" alt="<?php echo esc_html($image_banner['alt']); ?>" >-->
    </div>
    <div class="container">
      <div class="position-absolute copy">
        <?php if($title_banner) { ?>
          <h1 class="title title-48 switzerlandLight">
            <?php echo esc_html($title_banner); ?>
          </h1>
        <?php } ?>
        <?php if($description_banner) { ?>
          <h1 class="description title-24 switzerlandBold">
            <?php echo esc_html($description_banner); ?>
          </h1>
        <?php } ?>
      </div>
    </div>
  </div>
</div>
<?php
if (file_exists(get_template_directory() . '/blocks/breadcrumbs.php')) {
  include(get_template_directory() . '/blocks/breadcrumbs.php');
}
?>
<?php 
  $label = get_field('label', $block['id']);
  $titulo = get_field('titulo', $block['id']);
  $descricao = get_field('descricao', $block['id']);


  $label_bloco_direita = get_field('label_bloco_direita', $block['id']);
  $descricao_bloco_direita = get_field('descricao_bloco_direita', $block['id']);
  $telefone_1 = get_field('telefone_1', $block['id']);
  $descricao_1 = get_field('descricao_1', $block['id']);
  $link_1 = get_field('link_1', $block['id']);
  $telefone_2 = get_field('telefone_2', $block['id']);
  $descricao_2 = get_field('descricao_2', $block['id']);
  $link_2 = get_field('link_2', $block['id']);
  $telefone_3 = get_field('telefone_3', $block['id']);
  $descricao_3 = get_field('descricao_3', $block['id']);
  $link_3 = get_field('link_3', $block['id']);

  $label_ouvidoria = get_field('label_ouvidoria', $block['id']);
  $descricao_ouvidoria = get_field('descricao_ouvidoria', $block['id']);
  $telefone_4 = get_field('telefone_4', $block['id']);
  $descricao_4 = get_field('descricao_4', $block['id']);
  $link_4 = get_field('link_4', $block['id']);
  $telefone_5 = get_field('telefone_5', $block['id']);
  $descricao_5 = get_field('descricao_5', $block['id']);
  $link_5 = get_field('link_5', $block['id']);
  $descricao_pos_ouvidoria = get_field('descricao_pos_ouvidoria', $block['id']);
  $label_uniprime_central = get_field('label_uniprime_central', $block['id']);
  $descricao_uniprime_central = get_field('descricao_uniprime_central', $block['id']);
  $telefone_6 = get_field('telefone_6', $block['id']);
  $descricao_6 = get_field('descricao_6', $block['id']);
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
      <div class="main-protocolo row content-lgpd">
        <div class="content-protocolo">
          <div class="num-protocolo title-28 switzerlandBold">Proteção de dados (LGPD)</div>
          <div class="d-flex flex-column flex-md-row justify-content-between">
            <div class="col-left">
              <p>Para exercer seus direitos enquanto titular de dados pessoais, dirija-se à sua agência ou entre em contrato pelo e-mail <a href="mailto:privacidade@uniprimecentral.com.br" target="_blank" class="color-actived">privacidade@uniprimecentral.com.br</a></p>
            </div>
            <div class="col-right">
              <p>*Para saber como tratamos seus dados pessoais, consulte nossa <a href="#" class="color-actived">Política de Privacidade</a></p>
            </div>
          </div>
        </div>
      </div>
    </div>
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