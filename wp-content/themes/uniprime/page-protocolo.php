<?php
/**
 * Template Name: Página de protocolo
 */

get_header(); 
$title_banner = get_field('title_banner', '60');
$description_banner = get_field('description_banner', '60');
$image_banner = get_field('image_banner', '60');
// Captura o número do protocolo da URL
//$protocolo = isset($_GET['protocolo']) ? sanitize_text_field($_GET['protocolo']) : '';
if (isset($wp_query->query_vars['protocolo'])) {
  $protocolo = $wp_query->query_vars['protocolo'];
  $post = get_page_by_path($protocolo, OBJECT, 'protocolo');}
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
// Obtém a data bruta do campo personalizado
$data_resposta_raw = get_post_meta(get_the_ID(), 'data_resposta', true);
$data_denuncia_raw = get_post_meta(get_the_ID(), 'data_denuncia', true);

// Verifica se a data não está vazia
if (!empty($data_resposta_raw)) {
  $data_resposta_timestamp = strtotime($data_resposta_raw);
  $data_resposta_formatada = date('d/m/Y - H:i:s', $data_resposta_timestamp);
} 
if (!empty($data_denuncia_raw)) {
  $data_denuncia_timestamp = strtotime($data_denuncia_raw);
  $data_denuncia_formatada = date('d/m/Y - H:i:s', $data_denuncia_timestamp);
} 

// Caminho para o arquivo JSON
$json_path = get_template_directory() . '/api/agencias.json';

// Verifica se o arquivo existe
if (file_exists($json_path)) {
    // Obtém o conteúdo do arquivo JSON
    $json_content = file_get_contents($json_path);
    // Decodifica o JSON para um array PHP
    $agencias_data = json_decode($json_content, true);
}
$cooperativa_id = get_post_meta(get_the_ID(), 'cooperativa', true);
$agencia_id = get_post_meta(get_the_ID(), 'agencia', true);

// Variáveis para armazenar os dados encontrados
$cooperativa_nome = '';
$agencia_nome = '';

// Verifica se o JSON foi carregado corretamente
if (!empty($agencias_data) && isset($agencias_data['singulares'])) {
  foreach ($agencias_data['singulares'] as $singular) {
    // Verifica se a cooperativa corresponde ao ID
    if ($singular['id'] == $cooperativa_id) {
      $cooperativa_nome = $singular['singular'];
      // Verifica se há agências e se a agência corresponde ao ID
      foreach ($singular['agencies'] as $agencia) {
        //var_dump();
        if (isset($singular['agencies']) && $agencia['agency_id'] == $agencia_id) {
            $agencia_nome = $agencia['agency_title'];
        }
      }
      break; // Encerra o loop se a cooperativa foi encontrada

    }
  }
}

?>
<section class="denuncias mw-100">
  <div class="container">
    <div class="content">
      <div class="">
        <div class="container-denuncias">
          <div class="main-protocolo row">
            <div class="content-protocolo">
              <div class="label-block">Verifique os dados da sua denúncia</div>
              <div class="d-flex flex-column flex-md-row justify-content-between">
                <div class="col-left">
                  <?php if ($post) { 
                    $numero_protocolo_completo = get_post_meta(get_the_ID(), 'numero_protocolo', true);
                    $numero_protocolo = str_replace('protocolo-', '', $numero_protocolo_completo);
                    ?>
                    <div class="num-protocolo title-28 switzerlandBold"><?php echo __('Protocolo: #').$numero_protocolo; ?></div>
                    <div>
                      <p>Status da denúncia: <?php echo get_post_meta(get_the_ID(), 'status', true); ?></p>
                      <p>Data da denúncia: <?php echo $data_denuncia_formatada; ?></p>
                      <p>Data da resposta: <?php echo $data_resposta_formatada; ?></p>
                      <?php if(get_post_meta(get_the_ID(), 'status', true) != 'aguardando resposta') {
                        echo '<p>Resposta: ' . get_post_meta(get_the_ID(), 'resposta', true).'</p>';
                      } ?>
                    </div>
                  <?php }  else { ?>
                    <div class="num-protocolo title-28 switzerlandBold"><?php echo __('Protocolo: #'). $protocolo; ?></div>
                    <div>
                      <p>Não encontramos nenhum protocolo com esse número.<br/>
                      Verifique o número digitado ou digite outro.</p>
                    </div>
                  <?php } ?>
                </div>
                <div class="col-right">
                  <div class="bloco-consulta-protocolo card-canais-digitais">
                    <div class="title-block title-20 switzerlandBold color-actived">
                      <?php echo __('Consultar protocolo'); ?>
                    </div>
                    <div class="div-input-protocolo">
                      <form id="search-protocolo-form">
                        <input type="text" name="input-protocolo" id="input-protocolo" value="" aria-invalid="false" placeholder="Número do protocolo">
                        <button class="btn-consultar" id="btn-consultar"><i class="icon-menu icon-search-white"></i>Consultar</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <?php if ($post) { ?>
          <div class="div-dados-protocolo">
            <div class="row gap-4">
              <div class="col bg-gray">
                <div class="content-protocolo">
                  <div class="title-block title-28 switzerlandBold">Seus dados</div>
                  <div class="dados-protocolo">
                    <p><b>Nome:</b> <?php echo get_post_meta(get_the_ID(), 'nome', true); ?></p>
                    <p><b>E-mail:</b> <?php echo get_post_meta(get_the_ID(), 'email', true); ?></p>
                    <p><b>Telefone:</b> <?php echo get_post_meta(get_the_ID(), 'telefone', true); ?></p>
                    <p><b>CPF:</b> <?php echo get_post_meta(get_the_ID(), 'cpf', true); ?></p>
                    <p><b>Cooperado:</b> <?php echo get_post_meta(get_the_ID(), 'cooperado', true); ?></p>
                    <p><b>Cooperativa:</b> <?php echo esc_html($cooperativa_nome).' - '.esc_html($agencia_nome); ?></p>
                  </div>
                </div>
              </div>
              <div class="col bg-gray">
                <div class="content-protocolo">
                  <div class="title-block title-28 switzerlandBold">Dados do relato</div>
                  <div class="dados-protocolo">
                    <p><b>Tipo de relato:</b> <?php echo get_post_meta(get_the_ID(), 'tipo_de_relato', true); ?></p>
                    <p><b>Estado:</b> <?php echo get_post_meta(get_the_ID(), 'estado', true); ?></p>
                    <p><b>Cidade:</b> <?php echo get_post_meta(get_the_ID(), 'cidade', true); ?></p>
                    <p><b>Nome da agência:</b> <?php echo get_post_meta(get_the_ID(), 'nome_da_agencia', true); ?></p>
                    <p><b>Nome do responsável:</b> <?php echo get_post_meta(get_the_ID(), 'nome_do_responsavel', true); ?></p>
                    <p><b>Departamento do responsável:</b> <?php echo get_post_meta(get_the_ID(), 'departamento', true); ?></p>
                    <p><b>Função do responsável:</b> <?php echo get_post_meta(get_the_ID(), 'funcao', true); ?></p>
                    <p><b>Empresa do responsável:</b> <?php echo get_post_meta(get_the_ID(), 'empresa', true); ?></p>
                    <p><b>Outros detalhes do responsável:</b> <?php echo get_post_meta(get_the_ID(), 'outros_detalhes', true); ?></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="div-dados-protocolo bg-gray row">
            <div class="content-protocolo">
              <div class="title-block title-28 switzerlandBold">Detalhamento da denúncia</div>
              <div class="dados-protocolo"><p><?php echo get_post_meta(get_the_ID(), 'detalhamento_denuncia', true); ?></p></div>
              <div class="title-block title-28 switzerlandBold">Testemunhas</div>
              <div class="dados-protocolo"><p><?php echo get_post_meta(get_the_ID(), 'testemunhas', true); ?></p></div>
              <div class="title-block title-28 switzerlandBold">Provas</div>
              <div class="dados-protocolo"><p><?php echo get_post_meta(get_the_ID(), 'detalhamento_denuncia', true); ?></p></div>
            </div>
          </div>
          <?php } else { ?>
            <div class="div-dados-protocolo div-nao-encontrado bg-gray">
              <div class="row gap-4 content-protocolo">
                <div class="col ">
                  <div class="title-block title-28 switzerlandBold">Não encontrou seu protocolo?</div>
                  <div class="content-nao-encontrado bg-blue">
                    <div class="title-block title-20 switzerlandBold color-actived">Envie uma mensagem</div>
                    <div class="text-white"><a href="#" class="text-white">Informe o seu protocolo e iremos lhe ajudar</a></div>
                  </div>
                </div>
                <div class="col">
                  <div class="title-block title-28 switzerlandBold">Ou entre em contato por telefone</div>
                  <div class="content-nao-encontrado bg-blue">
                    <div class="title-block title-20 switzerlandBold color-actived">(43) 3305-2900</div>
                    <div class="text-white">Av. Higienópolis, 1044 Centro - Londrina/PR - 86020-080</div>
                  </div>
                </div>
              </div>
            </div>
          <?php } ?>
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
    </div>
  </div>
</section>

<script type="text/javascript">
  (function ($) {
    $(document ).ready(function() {
      $('#search-protocolo-form').on('submit', function(e) {
      //$('#btn-consultar').on('click', function(e) {
        
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