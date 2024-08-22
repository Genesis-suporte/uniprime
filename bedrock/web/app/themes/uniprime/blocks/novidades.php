<?php 
  $label = get_field('label', $block['id']);
  $titulo = get_field('titulo', $block['id']);
  $descricao = get_field('descricao', $block['id']);
?>
<section class="novidades mw-100">
  <div class="container">
    <div class="row d-flex justify-content-between">
      <div class="col">
        <div class="label-block">
          <?php echo esc_html($label); ?>
        </div>
        <div class="title-block title-28 switzerlandBold">
          <?php echo esc_html($titulo); ?>
        </div>
        <div class="description-block">
          <div class="d-flex">
            <div class="description-block flex-grow-1">
              <?php echo esc_html($descricao); ?>
            </div>
            <div class="arrows-novidades-desktop d-none d-md-flex"></div>
          </div>
        </div>
        <div class="artigos">
          <div class="slide-novidades d-flex justify-content-between">
            <?php 
            $array_fique_por_dentro = array(
              'post_type'   => array( 'noticia', 'campanha', 'sala-de-imprensa' ),
              'posts_per_page' => -1,/*,
              'meta_key'       => 'data_assembleia',
              'orderby'        => 'meta_value',
              'order'          => 'DESC'*/
            );

            $get_fique_por_dentro = get_posts( $array_fique_por_dentro );
            if ( $get_fique_por_dentro ) {
              foreach ( $get_fique_por_dentro as $key=>$post ) {
                if( $post->destaque_home == 1 ) {
                  if( $post->post_type == 'campanha') {
                    $text_label = "Campanhas ";                    
                    $post_thumbnail_id = get_post_thumbnail_id();
                    // Verifica se há uma imagem em destaque
                    if ( $post_thumbnail_id ) {
                        // Obtém a URL da imagem em tamanho completo ('full')
                      $image_url = wp_get_attachment_image_src( $post_thumbnail_id, 'full' );
    
                      // Verifica se a URL foi obtida com sucesso
                      if ( $image_url ) {
                        // O caminho da imagem é o primeiro elemento da matriz retornada por wp_get_attachment_image_src()
                        $image_path = $image_url[0];
                        
                      }
                    } else {
                      $image_url = get_field('image_banner',$post->ID);
                      $image_path = $image_url['url'];
                    }
                  }

                  if($post->post_type == 'noticia' || $post->post_type == 'sala-de-imprensa') {
                    if($post->post_type == 'noticia') {
                      $text_label = "Notícias ";
                    } else if($post->post_type == 'sala-de-imprensa') {
                      $text_label = "Sala de imprensa ";
                    }
                    // Verifica se há uma imagem em destaque, se não imprime a imagem dentro do conteúdo
                    $post_thumbnail_id = get_post_thumbnail_id();
                    if ( $post_thumbnail_id ) {
                        // Obtém a URL da imagem em tamanho completo ('full')
                      $image_url = wp_get_attachment_image_src( $post_thumbnail_id, 'full' );
                      // Verifica se a URL foi obtida com sucesso
                      if ( $image_url ) {
                        // O caminho da imagem é o primeiro elemento da matriz retornada por wp_get_attachment_image_src()
                        $image_path = $image_url[0];
                      }
                    } else {
                      $image_url = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
                      // Verifica se há imagens encontradas
                      if(isset($matches[1]) && !empty($matches[1])) {
                        // Verifica se a URL foi obtida com sucesso
                        if ( $image_url ) {
                          // O caminho da imagem é o primeiro elemento da matriz retornada por wp_get_attachment_image_src()
                          $image_path = $matches[1][0];
                        }
                      }
                    }                    
                  }
                  ?>
                    <div class="card-post">
                      <div class="img-post">
                        <a href="<?php echo esc_url($post->guid); ?>" target="_SELF">
                          <div class="img-post" style="background-image: url(<?php echo $image_path; ?>);">
                          </div>
                        </a>
                      </div>
                      <div class="container-post">
                        <div class="content-post">
                          <div class="category">
                            <a href="<?php echo $post->post_type; ?>" target="_SELF" class="icon-menu icon-logo">
                              <?php echo esc_html($text_label); ?>
                            </a>
                          </div>
                          <div class="title-block title-16 switzerlandBold">
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
                  <?php 
                  }
                }
              }
            ?>
          </div>
        </div>
        <div class="arrows-novidades-mobile arrows-mobile d-flex d-md-none justify-content-center"></div>
      </div>
    </div>
  </div>
</section>