<?php 
  $label_ultimas = get_field('label_ultimas', $block['id']);
  $titulo_ultimas = get_field('titulo_ultimas', $block['id']);
  $descricao_ultimas_assembleias = get_field('descricao_ultimas_assembleias', $block['id']);

  
  $label_proximas = get_field('label_proximas', $block['id']);
  $titulo_proximas = get_field('titulo_proximas', $block['id']);
  $descricao_proximas = get_field('descricao_proximas', $block['id']);
  $descricao_pos_proximas = get_field('descricao_pos_proximas', $block['id']);
  
/*titulo
descricao

data_da_publicacao
unidade
link_download*/
?>
<section class="assembleias mw-100">
  <div class="container">
    <div class="row d-flex justify-content-between">
      <div class="col">
        <div class="label-block">
          <?php echo esc_html($label_ultimas); ?>
        </div>
        <div class="title-block">
          <?php echo esc_html($titulo_ultimas); ?>
        </div>
        <div class="description-block">
          <div class="d-flex">
            <div class="description-block flex-grow-1">
              <?php echo esc_html($descricao_ultimas_assembleias); ?>
            </div>
            <div class="arrows-assembleias-desktop d-none d-md-flex"></div>
          </div>
        </div>
        <div class="artigos">
          <div class="slide-assembleias d-flex justify-content-between">
            <?php 
            $get_assembleias_id = array(
              'post_type'   => 'assembleia'
            );
            $get_assembleias = get_posts( $get_assembleias_id );           
            
            //var_dump($get_assembleias);
            if ( $get_assembleias ) {
              foreach ( $get_assembleias as $post ) : 
                echo get_sub_field('data_assembleia');
              /*?>
                <div class="card-post">
                  <div class="img-post">
                    <a href="<?php echo esc_url($post->guid); ?>" target="_SELF">
                      <?php echo get_the_post_thumbnail( $post->ID);?>
                    </a>
                  </div>
                  <div class="container-post">
                    <div class="content-post">
                      <div class="category">
                        <a href="<?php echo esc_url($link_cat); ?>" target="_SELF" class="icon-menu icon-logo">
                          <?php echo esc_html($text_label); ?>
                        </a>
                      </div>
                      <div class="title-block">
                        <a href="<?php echo esc_url($post->guid); ?>" target="_SELF">
                          <?php echo esc_html($post->post_title); ?>
                        </a>
                      </div>
                      <div class="cta">
                        <a href="<?php echo esc_url($post->guid); ?>" target="_SELF" class="leia_mais">Leia mais <i class="arrow right"></i></a>
                      </div>
                    </div>
                  </div>
                </div>
              <?php */
              endforeach;
              wp_reset_postdata();
            }
            ?>
          </div>
        </div>
        <div class="arrows-novidades-mobile d-flex d-md-none justify-content-center"></div>
      </div>
    </div>
  </div>
</section>


