<?php

/**
 * Template Name: Página de Ouvidoria
 */

get_header(); 

$title_banner = get_field('title_banner');
$description_banner = get_field('description_banner');
$image_banner = get_field('image_banner');
$image_banner_mobile = get_field('image_banner_mobile');

$label = get_field('label');
$titulo = get_field('titulo');
$descricao = get_field('descricao');

$titulo_bloco_direita = get_field('titulo_bloco_direita');
$telefone_bloco_direita = get_field('telefone_bloco_direita');
$texto1_bloco_direita = get_field('texto1_bloco_direita');
$texto2_bloco_direita = get_field('texto2_bloco_direita');
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
<section class="ouvidoria mw-100 z-13">
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
          <?php
              // Verifica se a função do_shortcode() está disponível
              if (function_exists('do_shortcode')) {
                  // Exibe o formulário usando do_shortcode()
                  echo do_shortcode('[gravityform id="4" title="false" ajax="true" description="false"]');
              } else {
                  // Se do_shortcode() não estiver disponível, exibe uma mensagem de erro
                  echo 'A função do_shortcode() não está disponível.';
              }
            ?>
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
      
  <div class="content">
    <?php the_content(); ?>
  </div>
</section>
<script type="text/javascript">
  (function ($) {
    $(document ).ready(function() {
      var origem_div = $('.origem-div').html()
      var banco_origem = $('.banco-origem').html()
      var agencia_origem = $('.agencia-origem').html()
      var conta_origem = $('.conta-origem').html()
      $('.left-container').append(origem_div + '<div class="container-portabilidade">' + banco_origem + '' + agencia_origem + '' + conta_origem + '</div>')
      $('.origem-div').html('')
      $('.banco-origem').html('')
      $('.agencia-origem').html('')
      $('.conta-origem').html('')

      var destino_div = $('.destino-div').html()
      var coop_destino = $('.coop-destino').html()
      var agencia_destino = $('.agencia-destino').html()
      var conta_destino = $('.conta-destino').html()
      $('.right-container').html(destino_div + '<div class="container-portabilidade">' + coop_destino + '' + agencia_destino + '' + conta_destino+ '</div>')
      $('.destino-div').html('')
      $('.coop-destino').html('')
      $('.agencia-destino').html('')
      $('.conta-destino').html('')
    });
  })(jQuery);


  </script>

<?php get_footer(); ?>