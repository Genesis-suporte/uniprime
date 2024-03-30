<?php 
  $label_ultimas = get_field('label_ultimas', $block['id']);
  $titulo_ultimas = get_field('titulo_ultimas', $block['id']);
  $descricao_ultimas_assembleias = get_field('descricao_ultimas_assembleias', $block['id']);

  
  $label_proximas = get_field('label_proximas', $block['id']);
  $titulo_proximas = get_field('titulo_proximas', $block['id']);
  $descricao_proximas = get_field('descricao_proximas', $block['id']);
  $descricao_pos_proximas = get_field('descricao_pos_proximas', $block['id']);
  

?>
<section class="assembleias mw-100 z-13">
  <div class="container">
    <div class="row d-flex justify-content-between">
      <div class="search-by-units">          
        <div class="title-block">
          <?php echo __('Editais de Convocação'); ?>
        </div>       
        <div class="search-block d-flex justify-content-center">
          <select class="form-control" name="search_by_units" id="search_by_units">
            <option value="0">Selecione uma cooperativa</option>
            <option value="1">Central</option>
          </select>
        </div>
      </div>
    </div>
    <div class="row d-flex justify-content-between results">
      <div class="col">
        <div class="label-block">
          <?php echo esc_html($label_ultimas); ?>
        </div>
        <div class="title-block">
          <?php echo esc_html($titulo_ultimas); ?>
        </div>
        <div class="d-flex">
          <div class="description-block flex-grow-1">
            <?php echo esc_html($descricao_ultimas_assembleias); ?>
          </div>
          <div class="arrows-assembleias-desktop d-none d-md-flex"></div>
        </div>
        <div class="artigos">
          <div class="slide-assembleias row">
            <?php 
            $assembleias = get_posts( array(
              'post_type'      => 'assembleia',
              'posts_per_page' => -1,
              'meta_key'       => 'data_assembleia',
              'orderby'        => 'meta_value',
              'order'          => 'DESC'
            ) );
            $prox_assembleias = "";
            date_default_timezone_set('America/Sao_Paulo');
            if ( $assembleias ) {
              // Loop pelos posts
              foreach ( $assembleias as $assembleia ) {
                // Obtém os campos personalizados específicos da assembleia
                $titulo = get_field( 'titulo', $assembleia->ID );
                $descricao = get_field( 'descricao', $assembleia->ID );
                $data_assembleia = (get_field( 'data_assembleia', $assembleia->ID ));
                $data_inicio_timestamp = DateTime::createFromFormat( 'd/m/Y', $data_assembleia )->format('Y-m-d');
                $data_inicio_ano = DateTime::createFromFormat( 'd/m/Y', $data_assembleia )->format('Y');
                $data_atual = date('Y-m-d');
                $data_da_publicacao = get_field( 'data_da_publicacao', $assembleia->ID );
                $unidade = get_field( 'unidade', $assembleia->ID );
                $link_download = get_field( 'link_download', $assembleia->ID );
                
                if ( $data_inicio_timestamp < $data_atual ) { ?>
                  <div class="card-assembleias">
                    <div class="content-card d-flex flex-column justify-content-start">
                      <div class="ano icon-menu icon-logo">
                        <?php echo esc_html($data_inicio_ano); ?>
                      </div>
                      <div class="title flex-grow-1">
                        <h2><?php echo esc_html($titulo); ?></h2>
                      </div>
                      <div class="d-flex justify-content-between align-items-start align-items-lg-end flex-column flex-lg-row">
                        <div class="description flex-grow-1">
                          <div class="unidade"><?php echo esc_html($unidade); ?></div>
                          <?php 
                            echo esc_html($link_download['title']). "<br>";
                            echo esc_html('Data da assembleia: '.$data_assembleia). "<br>";
                            echo esc_html('Data da publicação: '.$data_da_publicacao). "<br>";
                          ?>
                        </div>
                        <div class="linkpdf">
                          <a href="<?php echo esc_html($link_download['url']); ?>" class="btn btn-download">Baixar edital<i class="icon-download right"></i></a>
                        </div>
                      </div>
                    </div>
                  </div>
                <?php
                } else {
                  $prox_assembleias .= '<div class="card-assembleias">';
                  $prox_assembleias .= '<div class="content-card d-flex flex-column justify-content-start">';
                  $prox_assembleias .= '<div class="ano icon-menu icon-logo">PRÓXIMA ASSEMBLEIA</div>';
                  $prox_assembleias .= '<div class="title flex-grow-1"><h2>'. esc_html($data_assembleia) .'</h2></div>';
                  $prox_assembleias .= '<div class="d-flex justify-content-between align-items-start align-items-lg-end flex-column flex-lg-row">';
                  $prox_assembleias .= '<div class="description flex-grow-1">';
                  $prox_assembleias .= '<div class="unidade"><strong>'. esc_html($unidade) .'</strong></div>';
                  $prox_assembleias .= ''. esc_html($link_download['title']). '<br>';
                  $prox_assembleias .= '</div>';
                  $prox_assembleias .= '<div class="linkpdf">';
                  $prox_assembleias .= '<a href="'. esc_html($link_download['url']). '" class="btn btn-download">Baixar edital <i class="icon-download right"></i></a>';
                  $prox_assembleias .= '</div>';
                  $prox_assembleias .= '</div>';
                  $prox_assembleias .= '</div>';
                  $prox_assembleias .= '</div>';
                }
              }
            } else {
                //echo 'Nenhuma assembleia encontrada.';
            } 
            
            //wp_reset_postdata();
            //}
            ?>
          </div>
        </div>
        <div class="arrows-assembleias-mobile d-flex d-md-none justify-content-center"></div>
      </div>
    </div>
    <div class="row d-flex justify-content-between proximas-assembleias">
      <div class="col">
        <div class="label-block">
          <?php echo esc_html($label_proximas); ?>
        </div>
        <div class="title-block">
          <?php echo esc_html($titulo_proximas); ?>
        </div>
        <div class="d-flex">
          <div class="description-block flex-grow-1">
            <?php echo esc_html($descricao_proximas); ?>
          </div>
          <div class="arrows-proximas-assembleias-desktop d-none d-md-flex"></div>
        </div>
        <div class="artigos">
          <div class="slide-proximas-assembleias row">
            <?php 
            echo $prox_assembleias
            ?>
          </div>
        </div>
        <div class="arrows-proximas-assembleias-mobile d-flex d-md-none justify-content-center"></div>
        
        <div class="d-flex">
          <div class="description-block flex-grow-1">
            <?php echo esc_html($descricao_pos_proximas); ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


