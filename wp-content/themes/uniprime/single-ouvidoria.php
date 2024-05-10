<?php

/**
 * Template Name: Página de Ouvidoria
 */

get_header(); 

$title_banner = get_field('title_banner');
$description_banner = get_field('description_banner');
$image_banner = get_field('image_banner');

$label = get_field('label');
$titulo = get_field('titulo');
$descricao = get_field('descricao');

$titulo_bloco_direita = get_field('titulo_bloco_direita');
$telefone_bloco_direita = get_field('telefone_bloco_direita');
$texto1_bloco_direita = get_field('texto1_bloco_direita');
$texto2_bloco_direita = get_field('texto2_bloco_direita');
?>


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
<section class="ouvidoria mw-100">
  <div class="container">
    <div class="content">
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
          [gravityform id="4" title="false"]
          <div class="msg-sucess d-none">
            <div class="container d-flex flex-column justify-content-center text-center">
              <div class="icone d-flex justify-content-center">
                <i class="icon icon-sucesso"></i>
              </div>
              <div class="titulo">A sua mensagem foi enviada com sucesso!</div>
              <div class="msg">Enviamos uma cópia da sua mensagem para o email informado: <a href="#">alessandro@clinicamedica.com.br</a></div>
              <a href="#" class="btn btn-secondary">Enviar nova mensagem</a>
            </div>
          </div>
        </div>
        <div class="cards-ouvidoria col-12 col-lg-6">
          <div class="bloco-contato">
            <div class="titulo-contato title-36 switzerlandLight">
              <?php echo esc_html($titulo_bloco_direita); ?>
            </div>
            <div class="bloco-interno-contato">
              <div class="telefone-contato">
                <?php echo esc_html($telefone_bloco_direita); ?>
              </div>
              <div class="description-contato">
                <?php echo ($texto1_bloco_direita); ?>
              </div>
            </div>
            <div class="bloco-interno-contato">
              <div class="description-contato">
                <?php echo ($texto2_bloco_direita); ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


<?php get_footer(); ?>