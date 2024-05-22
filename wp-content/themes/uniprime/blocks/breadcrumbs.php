<?php
//function display_breadcrumbs() {
  global $post, $wp_query;
  $separator = ' <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg" class="icon-separator"><path d="M9.1665 7.5L11.6665 10L9.1665 12.5" stroke="#6C6C6C" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round"/></svg> ';
  $home_title = 'Home';
  $home_url = get_home_url();
  $breadcrumb_content = '';
  
  if (!is_front_page()) {
      $breadcrumb_content .= '<nav class=\'nav-breadcrumb\' style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns=\'http://www.w3.org/2000/svg\' width=\'8\' height=\'8\'%3E%3Cpath d=\'M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z\' fill=\'%236c757d\'\/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">';
      $breadcrumb_content .= "<div class='container'>\n";
      $breadcrumb_content .= "<div class='content-breadcrumbs'>\n<ol class='breadcrumb'>\n";
  
      // Home link
      $breadcrumb_content .= "<li class='breadcrumb-item'><a href='$home_url'>$home_title</a></li>\n";
  
      // Check if the post has parents
      if ($post->post_parent) {
        // Get the ancestors
        $ancestors = array_reverse(get_post_ancestors($post->ID));

        foreach ($ancestors as $ancestor) {
          $anc_permalink = get_permalink($ancestor);
          $anc_title = get_the_title($ancestor);
          $breadcrumb_content .= "<li class='breadcrumb-item'><a href='$anc_permalink'>$anc_title</a></li>\n";
        }
      }
  
      // If the post belongs to 'solucoes' post type
      //var_dump($post);
      if ($post->post_name == 'relatorio-do-sistema' || $post->post_name == 'assembleias-ago-e-age'  || $post->post_name == 'cooperativismo-financeiro' || $post->post_name == 'sobre-a-uniprime' || $post->post_type == 'politica' || $post->post_type == 'noticia' || $post->post_name == 'noticias' || $post->post_type == 'campanha' || $post->post_name == 'campanha' || $post->post_type == 'sala-de-imprensa' || $post->post_name == 'sala-de-imprensa' || $post->post_name == 'canal-de-denuncia' || $post->post_type == 'protocolo' || $post->post_name == 'onde-estamos' || $post->post_name == 'portabilidade-de-conta-salario'  || $post->post_name == 'ouvidoria'  ) {
        $breadcrumb_content .= "<li class='breadcrumb-item'>" . __("A Uniprime") . "</li>\n";
      }
      if ($post->post_name == 'canais-digitais' || $post->post_name == 'fale-conosco') {
        $breadcrumb_content .= "<li class='breadcrumb-item'>" . __("Atendimento") . "</li>\n";
      }

      if ($post->post_type == 'noticia' ) {
        $breadcrumb_content .= "<li class='breadcrumb-item'><a href='/noticias/'>". __("Notícias") . "</a></li>\n";
      } 

      if ($post->post_type == 'campanha' ) {
        $breadcrumb_content .= "<li class='breadcrumb-item'><a href='/campanhas/'>". __("Campanhas") . "</a></li>\n";
      } 

      if ($post->post_type == 'sala-de-imprensa' ) {
        $breadcrumb_content .= "<li class='breadcrumb-item'><a href='/sala-de-imprensa/'>". __("Sala de imprensa") . "</a></li>\n";
      } 
      
      if ($post->post_type == 'protocolo' ) {
        $breadcrumb_content .= "<li class='breadcrumb-item'><a href='/canal-de-denuncia/'>" . __("Canal de denúncias") . "</a></li>\n";
      }
      
      if ($post->post_type == 'solucoes') {
        // Add link to 'Soluções'
        //$solucoes_url = site_url('/solucoes/'); // Adjust this to the correct URL for your 'Soluções' page
        //$breadcrumb_content .= "<li class='breadcrumb-item'>Soluções</li>\n";
        $taxonomy = 'tipo-solucao';
        
        $terms = wp_get_post_terms($post->ID, $taxonomy);
        
        if ($terms) {
          foreach ($terms as $term) {
            // Get the term ancestors
            $term_ancestors = get_ancestors($term->term_id, $taxonomy, 'taxonomy');
            $term_ancestors = array_reverse($term_ancestors);
            //var_dump ($terms);
            foreach ($term_ancestors as $term_ancestor) {
              $term_ancestor_obj = get_term($term_ancestor, $taxonomy);
              //var_dump($term_ancestor_obj);
              $breadcrumb_content .= "<li class='breadcrumb-item'>" . $term_ancestor_obj->name . "</li>\n";
            }

            // Current term
            
            if($term->slug == 'investimentos' ) {
              $link_url = site_url('/investimentos/');
            } else {
              $link_url = "#";
            }
            
            $breadcrumb_content .= "<li class='breadcrumb-item'><a href='" . $link_url . "'>" . $term->name . "</a></li>\n";
          }
        }
      }
  
      // Display the current post
      if ($post->post_type != 'politica' && $post->post_type != 'protocolo') {
        $breadcrumb_content .= "<li class='breadcrumb-item'><b>" . get_the_title() . "</b></li>\n";
      } else if($post->post_type == 'politica') {
        $breadcrumb_content .= "<li class='breadcrumb-item'><b>Políticas</b></li>\n";
      }
      $breadcrumb_content .= "</ol>\n</div>\n</div>\n</nav>\n";

      echo $breadcrumb_content;
  }
  //}