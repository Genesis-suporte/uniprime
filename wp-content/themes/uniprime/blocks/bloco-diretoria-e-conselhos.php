<?php 
  $label = get_field('label', $block['id']);
  $titulo = get_field('titulo', $block['id']);
  $descricao = get_field('descricao', $block['id']);
  $label_diretoria = get_field('label_diretoria', $block['id']);
  $titulo_diretoria = get_field('titulo_diretoria', $block['id']);
  $descricao_diretoria = get_field('descricao_diretoria', $block['id']);

  $label_conselho_fiscal = get_field('label_conselho_fiscal', $block['id']);
  $titulo_conselho_fiscal = get_field('titulo_conselho_fiscal', $block['id']);
  $label_conselho_admin = get_field('label_conselho_admin', $block['id']);
  $titulo_conselho_admin = get_field('titulo_conselho_admin', $block['id']);
?>

<section class="diretoria-e-conselhos mw-100 z-13">
  <div class="container">
    <div class="row d-flex flex-column">
      <div class="col-12">
        <div class="label-block">
          <?php echo esc_html($label); ?>
        </div>
        <div class="title-block">
          <?php echo esc_html($titulo); ?>
        </div>
        <div class="description-block">
          <?php echo esc_html($descricao); ?>
        </div>
      </div>
    </div>
    <div class="container-diretoria">
      <div class="content-diretoria">
        <div class="label-block">
          <?php echo esc_html($label_diretoria); ?>
        </div>
        <div class="title-block">
          <?php echo esc_html($titulo_diretoria); ?>
        </div>
        <div class="description-block">
          <?php echo esc_html($descricao_diretoria); ?>
        </div>
        <div class="diretorias-card">
          <?php 
            if( have_rows('diretoria') ) {
              while ( have_rows('diretoria') ) : the_row();
                if( get_row_layout() == 'diretoria_cards' ) {
                  $nome = get_sub_field('nome');
                  $cargo = get_sub_field('cargo');?>
                    <div class="diretoria-card d-flex flex-row diretoria">
                      <div class="nome col">
                        <?php echo esc_html($nome); ?>
                      </div>
                      <div class="cargo col">
                        <?php echo esc_html($cargo); ?>
                      </div>
                    </div>
                  <?php
                }
              endwhile;
            } else {
              // Do something...
            }
          ?>
        </div>
      </div>
        <div class="d-flex flex-column flex-lg-row justify-content-between conselhos">
          <div class="container-diretoria col-12 col-md-6">
            <div class="content-diretoria">
              <div class="label-block">
                <?php echo esc_html($label_conselho_fiscal); ?>
              </div>
              <div class="title-block">
                <?php echo esc_html($titulo_conselho_fiscal); ?>
              </div>
              <div class="diretorias-card">
                <?php 
                  if( have_rows('conselho_fiscal') ) {
                    while ( have_rows('conselho_fiscal') ) : the_row();
                      if( get_row_layout() == 'conselho' ) {
                        $nome = get_sub_field('nome'); ?>
                          <div class="diretoria-card col-12">
                            <div class="nome">
                              <?php echo esc_html($nome); ?>
                            </div>
                          </div>
                        <?php
                      }
                    endwhile;
                  } else {
                    // Do something...
                  }
                ?>
              </div>
            </div>
          </div>
          <div class="container-diretoria col-12 col-md-6">
            <div class="content-diretoria">
              <div class="label-block">
                <?php echo esc_html($label_conselho_admin); ?>
              </div>
              <div class="title-block">
                <?php echo esc_html($titulo_conselho_admin); ?>
              </div>
              <div class="diretorias-card">
                <?php 
                  if( have_rows('conselho_de_administracao') ) {
                    while ( have_rows('conselho_de_administracao') ) : the_row();
                      if( get_row_layout() == 'conselho_admin' ) {
                        $nome = get_sub_field('nome'); ?>
                          <div class="diretoria-card col-12">
                            <div class="nome">
                              <?php echo esc_html($nome); ?>
                            </div>
                          </div>
                        <?php
                      }
                    endwhile;
                  } else {
                    // Do something...
                  }
                ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>