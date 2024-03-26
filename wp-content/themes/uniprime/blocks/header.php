<?php
  // BLOCK WITH TOP BAR
  $top_bar_localization = get_field('top_bar_localization', $block['id']);
  if(is_front_page()) {
    $currentSlug = 'para-voce';
  } else {
    global $post;
    $currentSlug = $post->post_name;
  }
 //if($currentSlug == $term->slug || (is_front_page() && $term->slug == 'para-voce')) { 
  // Verificar se há conteúdo antes de renderizar
  //if ($top_bar_localization && $a_uniprime_menu && $atendimento_menu) {?>
  <div class="top-bar mw-100 <?php echo $currentSlug;?>">
    <div class="container" id="top-bar-container">
      <div class="d-flex justify-content-center justify-content-lg-between">
        <div class="first-col d-none d-lg-block">
          <img src="<?php echo get_template_directory_uri();?>/assets/images/icons/icon-localization.png" alt="Qual unidade você deseja navegar?">
          Você está em: <strong><a href="#" blank="_SELF" class=""><?php echo esc_html($top_bar_localization);?><i class="arrow down"></i></a></strong>
        </div>
        <div class="second-col d-flex justify-content-center justify-content-lg-end">
          <nav class="w-100">
            <div class="menu-top-bar d-flex justify-content-center justify-content-md-between">
            <?php 
              $menu_lists = setMenuThreeLevels('top-bar');
              $menu_top_bar = "";
              $index = 0;
              foreach ($menu_lists as $item) { 
                $class = '';
                $class_search = false;
                if(isset( $item[ 'class' ])) {
                  $class = esc_attr( implode( ' ', $item['class']));
                }
                if (in_array("search", $item['class'])) {
                  $class_search = true;
                }
                if(isset( $item[ 'active' ])) {
                  $class .= ' '.$item[ 'active' ];
                }
                
                /*if ($index==2) {
                  $class = $class. ' flex-fill';
                } else {
                  $class = $class. ' flex-shrink-1';
                }*/
                if($index != 0 && $index != (count($menu_lists) - 1) ) { 
                  $menu_top_bar .= '<div class="separador-top-menu"></div>'."\n";
                }
                $menu_top_bar .= '<div class="menu-item '.$class.'">'."\n";
                if(!$class_search) { 
                  $menu_top_bar .= '<a href="'. esc_html($item['link']) .'" class="menu-dropdown">'. esc_html($item['title']) .'</a>'."\n";
                } else { 
                  $menu_top_bar .= '<a href="'. esc_html($item['link']) .'" class="menu-dropdown search">'."\n";
                  $menu_top_bar .= '<img src="'.get_template_directory_uri().'/assets/images/icons/icon-search.png" alt="Digite sua busca">'."\n";
                  $menu_top_bar .= '</a>'."\n";
                }
                //print_r($item['class']).'<br />';
                //echo $class_search.'<br />';
                
                //print_r(@$item['childs']).'<br />';
                /*if(isset( $item[ 'childs' ])) {
                  
                  //echo $item['id'].' - '.count($item['childs']).'<br />';
                  $menu_top_bar .= '<div class="dropdown-content">' ."\n";
                  
                  foreach ($item[ 'childs' ] as $submenu) { 
                    $class_child = '';
                    if(isset( $submenu[ 'class' ])) {
                      $class_child = esc_attr( implode( ' ', $submenu['class']));
                      //print_r($class_child);
                    }
                    //print_r($submenu).'<br />';
                    
                    $menu_top_bar .= '<a href="'.esc_url($submenu['link']).'" class="'.$class_child.'">'.esc_html($submenu['title']).'</a>' ."\n";
                    
                  }
                  $menu_top_bar .= '</div>' ."\n";
                }*/
                $menu_top_bar .= '</div>'."\n";
                
                $index++;
              }
              echo $menu_top_bar;
            ?>
            </div>
          </nav>
        </div>
      </div>
    </div>
  </div>