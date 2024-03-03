<?php
$tipo_homepage = get_field('tipo-homepage');
?>
<div class="header-menu-banner position-relative mw-100">
  <div class="main-menu  <?php echo $tipo_homepage;?>" id="main-menu">
    <div class="container d-flex justify-content-between">
      <div class="logo">
        <img src="<?php echo get_template_directory_uri();?>/assets/images/UniPrime-logo.png" class="logo-black d-none" alt="Logo Uniprime">
        <img src="<?php echo get_template_directory_uri();?>/assets/images/UniPrime-logo-branco.png" class="logo-white" alt="Logo Uniprime">
      </div>
      <div class="flex-grow-1">
        <nav class="menu-inicial d-flex justify-content-start">
          <div class="menu-item">
            <a href="#" class="menu-dropdown"><?php echo esc_html('A Uniprime');?><i class="arrow down"></i></a>
            <div class="dropdown-content">
              <?php 
                $menu_lists = setMenuThreeLevels('menu-a-uniprime');
                $menu_a_uniprime = "";
                foreach ($menu_lists as $item) { 
                  $class = '';
                  if(isset( $item[ 'class' ])) {
                    $class = esc_attr( implode( ' ', $item['class']));
                  }
                  // if (in_array("search", $item['class'])) {
                  //   $class_search = true;
                  // }
                  //print_r($item['class']).'<br />';
                  //echo $class_search.'<br />';
                  $menu_a_uniprime .= '<div class="menu-item '.$class.'">'."\n";
                  $menu_a_uniprime .= '<a href="#" class="menu-dropdown">'. esc_html($item['title']) .'</a>'."\n";              
                  $menu_a_uniprime .= '</div>'."\n";
                }
                echo $menu_a_uniprime;
              ?>
            </div>
          </div>
          <div class="menu-item">
            <a href="#" class="menu-dropdown"><?php echo esc_html('Soluções');?><i class="arrow down"></i></a>
            <div class="dropdown-content">
              <?php 
              //solucoes-para-voce
              //solucoes-para-empresa
              //solucoes-para-cooperativa
                $menu_lists = setMenuThreeLevels('solucoes-'.$tipo_homepage);
                $menu_solucoes = "";
                foreach ($menu_lists as $item) { 
                  $class = '';
                  if(isset( $item[ 'class' ])) {
                    $class = esc_attr( implode( ' ', $item['class']));
                  }
                  $menu_solucoes .= '<div class="menu-item '.$class.'">'."\n";
                  $menu_solucoes .= '<a href="#" class="menu-dropdown">'. esc_html($item['title']) .'</a>'."\n";              
                  $menu_solucoes .= '</div>'."\n";
                }
                echo $menu_solucoes;
              ?>
            </div>
          </div>
          <div class="menu-item">
            <a href="#" class="menu-dropdown"><?php echo esc_html('Atendimento');?><i class="arrow down"></i></a>
            <div class="dropdown-content">
              <?php 
                $menu_lists = setMenuThreeLevels('menu-atendimento');
                $menu_atendimento = "";
                //var_dump($menu_lists);
                foreach ($menu_lists as $item) { 
                  $class = '';
                  if(isset( $item[ 'class' ])) {
                    $class = esc_attr( implode( ' ', $item['class']));
                  }
                  $menu_atendimento .= '<div class="menu-item '.$class.'">'."\n";
                  $menu_atendimento .= '<a href="'. esc_url($item['link']) .'" class="menu-dropdown">'. esc_html($item['title']) .'</a>'."\n";              
                  $menu_atendimento .= '</div>'."\n";
                }
                echo $menu_atendimento;
              ?>
            </div>
          </div>
        </nav>
      </div>
      <div class="d-flex justify-content-between bts-externos">
        <?php 
          $menu_links_externo_hero = setMenuThreeLevels('links-externos-hero');
          $menu_one_level = "";
          foreach ($menu_links_externo_hero as $item) { 
            $class = '';
            $class_cooperado = false;
            if(isset( $item[ 'class' ])) {
              $class = esc_attr( implode( ' ', $item['class']));
            }
            if (in_array("seja-um-cooperado", $item['class'])) {
              $class_cooperado = true;
            }
            
            if($class_cooperado) { 
              $menu_one_level .= '<a href="'. esc_url($item['link']) .'" class="'.$class.'"><img src="'.get_template_directory_uri().'/assets/images/icons/icon-users.png" alt="Seja o cooperado" id="icon-users"><img src="'.get_template_directory_uri().'/assets/images/icons/icon-users-white.png" alt="Seja o cooperado" class="d-none" id="icon-users-white">'. esc_html($item['title']) .'</a>'."\n";
            } else {
              $menu_one_level .= '<a href="'. esc_url($item['link']) .'" class="'.$class.'">'. esc_html($item['title']) .'</a>'."\n";

            }
          }
          echo $menu_one_level;
        ?>
      </div>
    </div>
  </div>
  <div class="hero-banner">
    <?php 
    if( have_rows('banner_container') ):
      while ( have_rows('banner_container') ) : the_row();
        // Case: Paragraph layout.
        if( get_row_layout() == 'banner' ) {
          $title_banner = get_sub_field('title_banner');
          $description_banner = get_sub_field('description_banner');
          $cta_banner = get_sub_field('cta_banner');
          $image_banner = get_sub_field('image_banner');
          //->filename url alt
          //print_r( $image_banner);?>
          <div class="hero-image">
            <div class="container position-relative">
              <div class="copy position-absolute">
                <div class="title">
                  <?php echo esc_html($title_banner); ?>
                </div>
                <div class="description">
                  <?php echo esc_html($description_banner); ?>
                </div>
                <div class="cta">
                  <?php echo '<a href="'. esc_url($cta_banner['url']) .'" class="btn btn-actived">'. esc_html($cta_banner['title']) .'<i class="icon icon-cta"></i></a>'; ?>
                </div>
              </div>
            </div>
            <div class="image" style="background-image: url(<?php echo esc_url($image_banner['url']); ?>);"></div>
          </div>
          <?php
        }
        
      // End loop.
      endwhile;
    // No value.
    else :
      // Do something...
    endif;
    ?>
  </div>
    <div class="dots-hero"></div>
</div>