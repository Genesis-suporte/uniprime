<?php
/**
 * Template Name: Página de Canal de denúncia
 */

get_header(); 

$title_banner = get_field('title_banner');
$description_banner = get_field('description_banner');
$image_banner = get_field('image_banner');

$label = get_field('label');
$titulo = get_field('titulo');
$descricao = get_field('descricao');

$titulo_consultar_protocolo = get_field('titulo_consultar_protocolo');
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
  </div>
</section>

<script type="text/javascript">
  (function ($) {
    $(document).ready(function() {
      console.log("jQuery is working!");
      
      var section_dados_do_incidente = $('.section-dados-do-incidente').html()
      var tipo_relato = $('.tipo-relato').html()
      $('.dados-do-incidente').html(section_dados_do_incidente + '<div class="container-portabilidade">' + tipo_relato + '</div>')
      $('.section-dados-do-incidente').html('')
      $('.tipo-relato').html('')

      var section_onde_ocorreu = $('.section-onde-ocorreu').html()
      var tipo_ocorreu = $('.onde-ocorreu').html()
      var select_estado = $('.select-estado').html() 
      var select_cidade = $('.select-cidade').html()
      var nome_agencia = $('.nome-agencia').html()
      $('.onde-ocorreu').html(section_onde_ocorreu + '<div class="container-portabilidade">' + tipo_ocorreu + '' + select_estado + '' + select_cidade + '' + nome_agencia +'</div>');
      $('.section-onde-ocorreu').html('')
      $('.onde-ocorreu').html('')
      $('.select-estado').html('')
      $('.select-cidade').html('')
      $('.nome-agencia').html('')

      var section_responsavel = $('.section-responsavel').html()
      var block_responsavel = $('.block-responsavel').html()
      var nome_responsavel = $('.nome-responsavel').html() 
      var select_departamento = $('.select-departamento').html()
      var funcao_responsavel = $('.funcao-responsavel').html() 
      var empresa_responsavel = $('.empresa-responsavel').html() 
      var outros_detalhes_responsavel = $('.outros-detalhes-responsavel').html() 
      $('.block-responsavel').append(section_responsavel + '<div class="container-portabilidade">' + block_responsavel + '' + nome_responsavel + '' + select_departamento + '' + funcao_responsavel + '' + empresa_responsavel + '' + outros_detalhes_responsavel +'</div>');
      $('.section-responsavel').html('')
      $('.nome-responsavel').html('')
      $('.select-departamento').html('')
      $('.funcao-responsavel').html('')
      $('.empresa-responsavel').html('')
      $('.outros-detalhes-responsavel').html('')

      var section_detalhamento = $('.section-detalhamento').html()
      var block_detalhamento = $('.block-detalhamento').html()
      var detalhamento = $('.detalhamento').html()
      $('.block-detalhamento').append(section_detalhamento + '<div class="container-portabilidade">' + block_detalhamento + '' + detalhamento + '</div>')
      $('.section-detalhamento').html('')
      $('.block-detalhamento').html('')
      $('.detalhamento').html('')

      var section_testemunhas = $('.section-testemunhas').html()
      var block_testemunhas = $('.block-testemunhas').html()
      var testemunhas = $('.testemunhas').html()
      $('.block-testemunhas').append(section_testemunhas + '<div class="container-portabilidade">' + block_testemunhas + '' + testemunhas + '</div>')
      $('.section-testemunhas').html('')
      $('.block-testemunhas').html('')
      $('.testemunhas').html('')


      // AJAX PROTOCOLOS
    //.select-agencias
      /*$('.user-organization').hide();
        // do a POST ajax call
      $(".select-cooperativa").change(function(){
        var care_setting = $(".select-cooperativa option:selected").val();
        var zip = $('#input_3_6').val();
        if(zip != '')
          getOrgName(zip,care_setting);
      });
      $("#input_3_6").focusout(function(){
        var zip = $('#input_3_6').val();
        var care_setting = $("#input_3_7 option:selected").val();
        if(care_setting != '')
          getOrgName(zip,care_setting);
      });*/
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