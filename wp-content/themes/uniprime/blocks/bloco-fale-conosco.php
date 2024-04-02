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
          [gravityform id="1" title="true"]
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
</section>