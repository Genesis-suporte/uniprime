<?php
/**
 * Template Name: Página de Canal de denúncia
 */

get_header(); 

$title_banner = get_field('title_banner');
$description_banner = get_field('description_banner');
$image_banner = get_field('image_banner');
$image_banner_mobile = get_field('image_banner_mobile', $block['id']);

$label = get_field('label');
$titulo = get_field('titulo');
$descricao = get_field('descricao');

$titulo_consultar_protocolo = get_field('titulo_consultar_protocolo');
?>
<div class="banner-internas position-relative canal-denuncia">
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
        <div class="container-canal-denuncia col-12 col-lg-6 d-flex flex-column">
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
                  echo do_shortcode('[gravityform id="7" title="false" ajax="true" description="false"]');
              } else {
                  // Se do_shortcode() não estiver disponível, exibe uma mensagem de erro
                  echo 'A função do_shortcode() não está disponível.';
              }
            ?>
        </div>
        <div class="cards-canal-denuncia col-12 col-lg-6 fale-conosco">
          <div class="bloco-consulta-protocolo card-canais-digitais">
            <div class="title-block title-20 switzerlandBold color-actived">
              <?php echo $titulo_consultar_protocolo; ?>
            </div>
            <div class="div-input-protocolo">
              <form id="search-protocolo-form">
                <input type="text" name="input-protocolo" id="input-protocolo" value="" aria-invalid="false" placeholder="Número do protocolo" required >
                <button class="btn-consultar"><i class="icon-menu icon-search-white"></i>Consultar</button>
              </form>
            </div>
          </div>
          <div class="cards-right-block  ">
            <?php 
            if( have_rows('cards_direita') ):
              while ( have_rows('cards_direita') ) : the_row();
                // Case: Paragraph layout.
                if( get_row_layout() == 'card_direita' ) {
                  //print_r(get_sub_field('imagem_cta'));
                  $titulo_card = get_sub_field('titulo_card');
                  $tamanho_titulo = get_sub_field('tamanho_titulo');
                  $cor_titulo = get_sub_field('cor_titulo');
                  $descricao_card = get_sub_field('descricao_card');
                  $link = get_sub_field('link');
                  ?>
                  
                  <div class="bloco-contato">
                    <div class="bloco-interno-contato">
                      <?php if($titulo_card) { 
                        $class_tam_title = ($tamanho_titulo == 'p') ? 'title-20 switzerlandBold' : 'title-36 switzerlandLight';
                        $class_color_title = ($cor_titulo == 'azul') ? 'color-blue' : 'color-actived';
                        echo '<div class="titulo '.$class_tam_title. ' '.$class_color_title.'">'.$titulo_card.'</div>';
                      } 
                      if($link) {
                        echo '<a class="button " href="'. esc_url( $link['url'] ).'" target="'. esc_html( $link['target'] ) .'">'.$link['title'].'<i class="arrow right"></i></a>';
                      }
                      if($descricao_card) { ?>
                        <div class="description-contato">
                          <?php echo $descricao_card;?>
                        </div>
                      <?php } ?>
                    </div>
                  </div>
                  <?php
                }
              // End loop.
              endwhile;
            // No value.
            else :
              // Do something...
            endif;
            ?>
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
    $(document).ready(function() {
      
      $('#search-protocolo-form').on('submit', function(e) {
        e.preventDefault();
        var protocolo = $('#input-protocolo').val();
        if (protocolo) {
          var url = '<?php echo home_url('/protocolo/'); ?>protocolo-' + protocolo;
          window.location.href = url;
        }
      });
      
    });
  })(jQuery);
</script>

<?php get_footer(); ?>