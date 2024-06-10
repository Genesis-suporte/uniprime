<?php

/**
 * Template Name: Página de Portabilidade de Conta de Salário
 */

get_header(); 

$title_banner = get_field('title_banner');
$description_banner = get_field('description_banner');
$image_banner = get_field('image_banner');

$label = get_field('label');
$titulo = get_field('titulo');
$descricao = get_field('descricao');

$titulo_bloco_observacoes = get_field('titulo_bloco_observacoes');
$descricao_bloco_observacoes = get_field('descricao_bloco_observacoes');


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
?>
<section class="portabilidade mw-100">
  <div class="container">
    <div class="content">
      <div class="tab-content" id="tab-content">
        <div class="">
          <?php if($label) { ?>
            <div class="label-block">
              <?php echo esc_html($label); ?>
            </div>
          <?php } ?>
          <?php if($titulo) { ?>
            <div class="title-block title-28 switzerlandBold">
              <?php echo esc_html($titulo); ?>
            </div>
          <?php } ?>
          <?php 
          if($descricao) { ?>
            <div class="description-block text-left">
              <?php echo esc_html($descricao); ?>
            </div>
          <?php } ?>    
          <div class="content">
            <div class="form-portabilidade">
            <?php
              // Verifica se a função do_shortcode() está disponível
              if (function_exists('do_shortcode')) {
                  // Exibe o formulário usando do_shortcode()
                  echo do_shortcode('[gravityform id="3" title="false" ajax="true" description="false"]');
              } else {
                  // Se do_shortcode() não estiver disponível, exibe uma mensagem de erro
                  echo 'A função do_shortcode() não está disponível.';
              }
            ?>
            </div>
            <div class="bloco-observacoes">
              <div class="title-block title-36 switzerlandLight">
                <?php echo $titulo_bloco_observacoes; ?>
              </div>
              <div class="description-block text-left">
                <?php echo $descricao_bloco_observacoes; ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
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
      var coop_destino = $('.gfield--type-select.select-cooperativa').html()
      var agencia_destino = $('.gfield--type-select.select-agencia').html()
      var conta_destino = $('.conta-destino').html()
      $('.right-container').html(destino_div + '<div class="container-portabilidade"><div class="select-cooperativa"' + coop_destino + '</div><div class="select-agencia">' + agencia_destino + '</div>' + conta_destino+ '</div>')
      $('.destino-div').html('')
      $('.gfield--type-select.select-cooperativa').hide('')
      $('.gfield--type-select.select-agencia').hide('')
      $('.conta-destino').html('')
      //carregarSelects();
    });
  })(jQuery);


  </script>


<?php get_footer(); ?>