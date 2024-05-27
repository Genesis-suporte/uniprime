<?php
  // BLOCK WITH TOP BAR
  //$top_bar_localization = get_field('top_bar_localization', $block['id']);
  $top_bar_localization = "Uniprime Central Nacional";
  if(is_front_page() || is_search()) {
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
          Você está em: <strong><a href="#" blank="_SELF" class="" id="openModalSingulares"><?php echo esc_html($top_bar_localization);?><i class="arrow down"></i></a></strong>
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
                  $menu_top_bar .= '<a href="javascript:void(0)" class="menu-dropdown menu-inicial-item icon-search" id="open-search"> </a>';
                }
                
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