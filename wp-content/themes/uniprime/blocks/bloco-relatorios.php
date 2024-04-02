<?php 
$label = get_field('label', $block['id']);
$titulo = get_field('titulo', $block['id']);
$descricao = get_field('descricao', $block['id']);

$label_segundo_grupo = get_field('label_segundo_grupo', $block['id']);
$titulo_segundo_grupo = get_field('titulo_segundo_grupo', $block['id']);
$descricao_segundo_grupo = get_field('descricao_segundo_grupo', $block['id']);

$label_terceiro_grupo = get_field('label_terceiro_grupo', $block['id']);
$titulo_terceiro_grupo = get_field('titulo_terceiro_grupo', $block['id']);
$descricao_terceiro_grupo = get_field('descricao_terceiro_grupo', $block['id']);

$label_quarto_grupo = get_field('label_quarto_grupo', $block['id']);
$titulo_quarto_grupo = get_field('titulo_quarto_grupo', $block['id']);
$descricao_quarto_grupo = get_field('descricao_quarto_grupo', $block['id']);
?>          
<section class="bloco-relatorios mw-100 z-13">
  <div class="container">
    <div class="container-relatorios">
      <div class="row d-flex flex-column">
        <div class="col-12">
          <div class="label-block">
            <?php echo esc_html($label); ?>
          </div>
          <div class="title-block title-28 switzerlandBold">
            <?php echo esc_html($titulo); ?>
          </div>
          <div class="description-block">
            <?php echo esc_html($descricao); ?>
          </div>
        </div>
      </div>
      <div class="cards-relatorios d-grid">
        <?php 
          if( have_rows('resultados') ) {
            while ( have_rows('resultados') ) : the_row();
              if( get_row_layout() == 'resultado' ) {
                $titulo = get_sub_field('titulo');
                $valor = get_sub_field('valor');?>
                  <div class="relatorio-card d-flex flex-column flex-lg-row relatorio title-19 switzerlandBold">
                    <div class="nome flex-grow col-lg-7">
                      <?php echo esc_html($titulo); ?>
                    </div>
                    <div class="valor col-lg-5">
                      <?php echo esc_html($valor); ?>
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
  <div class="container">
    <div class="container-segundo-grupo-relatorios row d-flex justify-content-between">
      <div class="col">
        <div class="label-block">
          <?php echo esc_html($label_segundo_grupo); ?>
        </div>
        <div class="title-block title-40 switzerlandLight">
          <h2><?php echo esc_html($titulo_segundo_grupo); ?></h2>
        </div>
        <div class="d-flex">
          <div class="description-block flex-grow-1">
            <?php echo esc_html($descricao_segundo_grupo); ?>
          </div>
          <div class="arrows-relatorios-transparencia-desktop d-none d-md-flex"></div>
        </div>
        <div class="cards-segundo-grupo-relatorios">
          <div class="artigos">
            <div class="slide-relatorios-transparencia row">
              <?php
                $array_relatorios = array(
                  'post_type' => 'relatorio',
                  'numberposts' => -1,
                );
              
                $get_relatorios = get_posts($array_relatorios);
                
                // Verifica se há posts
                if ($get_relatorios) {
                  foreach ($get_relatorios as $get_relatorio) {
                    // Obtém os termos da taxonomia 'tipo-relatorio' para o post atual
                    $terms = get_the_terms($get_relatorio->ID, 'tipo-relatorio');
            
                    // Verifica se há termos e se não há erro
                    if ($terms && !is_wp_error($terms)) {
                      foreach ($terms as $term) {
                        // Verifica se o termo é 'relatorios-transparencia'
                        if ($term->slug == 'relatorios-transparencia') {
                          // Renderiza o conteúdo do post
                          //var_dump($get_relatorio);
                          $label_transparencia = get_field('label', $get_relatorio->ID);
                          $ano_transparencia = get_field('ano', $get_relatorio->ID);
                          $link_download_transparencia = get_field('link_download', $get_relatorio->ID);
                          ?>
                          <div class="card-transparencia card-relatorio">
                            <div class="content-card d-flex flex-column justify-content-start">
                              <div class="label icon-menu icon-logo">
                                <?php echo esc_html($label_transparencia); ?>
                              </div>
                              <div class="d-flex justify-content-between align-items-end">
                                <div class="ano flex-grow-1 align-self-end title-60 switzerlandLight">
                                  <?php echo esc_html($ano_transparencia); ?>
                                </div>
                                <div class="linkpdf">
                                  <a href="<?php echo esc_html($link_download_transparencia['url']); ?>" class="btn btn-download">Baixar relatório<i class="icon-download-white right"></i></a>
                                </div>
                              </div>
                            </div>
                          </div>
                          <?php
                        }
                      }
                    }
                  }
                } else {
                  // Se não houver posts encontrados
                  echo 'Nenhum relatório encontrado.';
                } ?>
            </div>
          </div>
        </div>
        <div class="arrows-relatorios-transparencia-mobile arrows-mobile d-flex d-lg-none justify-content-center"></div>
      </div>
    </div>
  </div>
  
  <div class="container-terceiro-grupo-relatorios">
    <div class="container">    
    <div class="col">
        <div class="label-block">
          <?php echo esc_html($label_terceiro_grupo); ?>
        </div>
        <div class="title-block title-40 switzerlandLight">
          <h2><?php echo esc_html($titulo_terceiro_grupo); ?></h2>
        </div>
        <div class="d-flex">
          <div class="description-block flex-grow-1">
            <?php echo esc_html($descricao_terceiro_grupo); ?>
          </div>
          <div class="arrows-relatorios-balanco-desktop d-none d-md-flex"></div>
        </div>
        <div class="cards-terceiro-grupo-relatorios">
          <div class="artigos">
            <div class="slide-relatorios-balanco row">
              <?php                
                // Verifica se há posts
                if ($get_relatorios) {
                  foreach ($get_relatorios as $get_relatorio) {
                    // Obtém os termos da taxonomia 'tipo-relatorio' para o post atual
                    $terms = get_the_terms($get_relatorio->ID, 'tipo-relatorio');
            
                    // Verifica se há termos e se não há erro
                    if ($terms && !is_wp_error($terms)) {
                      foreach ($terms as $term) {
                        if ($term->slug == 'balanco-uniprime') {
                          // Renderiza o conteúdo do post
                          //var_dump($get_relatorio);
                          $label_balanco = get_field('label', $get_relatorio->ID);
                          $ano_balanco = get_field('ano', $get_relatorio->ID);
                          $link_download_balanco = get_field('link_download', $get_relatorio->ID);
                          ?>
                          <div class="card-balanco card-relatorio">
                            <div class="content-card d-flex flex-column justify-content-start">
                              <div class="label icon-menu icon-logo">
                                <?php echo esc_html($label_balanco); ?>
                              </div>
                              <div class="d-flex justify-content-between align-items-end">
                                <div class="ano flex-grow-1 align-self-end title-36 switzerlandLight">
                                  <?php echo esc_html($ano_balanco); ?>
                                </div>
                                <div class="linkpdf">
                                  <a href="<?php echo esc_html($link_download_balanco['url']); ?>" class="btn btn-download">Baixar <i class="icon-download-white right"></i></a>
                                </div>
                              </div>
                            </div>
                          </div>
                          <?php
                        }
                      }
                    }
                  }
                } else {
                  // Se não houver posts encontrados
                  echo 'Nenhum relatório encontrado.';
                } ?>
            </div>
          </div>
        </div>
        <div class="arrows-relatorios-balanco-mobile arrows-mobile d-flex d-md-none justify-content-center"></div>
      </div>
    </div>
  </div>

  <div class="container">
    <div class="container-quarto-grupo-relatorios row d-flex justify-content-between">
      <div class="col">
        <div class="label-block">
          <?php echo esc_html($label_quarto_grupo); ?>
        </div>
        <div class="title-block title-40 switzerlandLight">
          <h2><?php echo esc_html($titulo_quarto_grupo); ?></h2>
        </div>
        <div class="d-flex">
          <div class="description-block flex-grow-1">
            <?php echo esc_html($descricao_quarto_grupo); ?>
          </div>
        </div>
        <div class="cards-quarto-grupo-relatorios">
          <div class="artigos">
            <div class="">
              <?php
                $taxonomy = 'tipo-relatorio';
                $parent_categories = get_terms(array(
                  'taxonomy' => $taxonomy,
                  'parent' => 0, // Isso retornará apenas as categorias de nível superior
                ));

                if (!empty($parent_categories)) {
                  foreach ($parent_categories as $parent_category) {
                    if ($parent_category->slug == 'gerenciamento-risco') {
                      $subcategories = get_terms(array(
                          'taxonomy' => $taxonomy,
                          'parent' => $parent_category->term_id,
                      ));
                      if (!empty($subcategories)) {
                          foreach ($subcategories as $subcategory) {
                            echo '<div class="title-subcategory title-28 switzerlandBold">' . $subcategory->name . '</div>';
                            echo '<div class="d-grid relatorios-riscos">';
                            // Define os argumentos da consulta para recuperar os posts associados à subcategoria atual
                            $args = array(
                              'post_type' => 'relatorio',
                              'posts_per_page' => -1,
                              'tax_query' => array(
                                array(
                                  'taxonomy' => $taxonomy,
                                  'field' => 'term_id',
                                  'terms' => $subcategory->term_id, // ID da subcategoria atual
                                ),
                              ),
                            );

                            // Realiza a consulta
                            $query = new WP_Query($args);

                            // Verifica se há posts
                            if ($query->have_posts()) {
                              while ($query->have_posts()) {
                                $query->the_post();
                                
                                //$label_balanco = get_field('label', get_the_id());
                                //$ano_balanco = get_field('ano', get_the_id());
                                $link_download_riscos = get_field('link_download', get_the_id());
                                //print_r($link_download_riscos);
                                ?>
                                  <div class="linkpdf_riscos">
                                    <a href="<?php echo esc_html($link_download_riscos['url']); ?>" class="btn btn-download"><i class="icon-download"></i><?php echo esc_html($link_download_riscos['title']); ?></a>
                                  </div>
                                <?php
                              }
                              // Restaura os dados do post globalmente
                              echo '</div>';
                              wp_reset_postdata();
                          } else {
                              echo '<p>Não há posts associados a esta subcategoria.</p>';
                          }
                        }
                      } 
                    }
                  }
                } else {
                    echo '<p>Não há categorias pai encontradas.</p>';
                }
              ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>