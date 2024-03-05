<?php
$tipo_homepage = get_field('tipo-homepage');
?>
<header class="header-menu-banner position-relative mw-100">
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
              <div class="container">
                <div class="row a-uniprime">
                  <div class="col-4 menu-subitem-uniprime">
                    <?php 
                      $menu_lists = setMenuThreeLevels('menu-a-uniprime');
                      $menu_a_uniprime = "";
                      foreach ($menu_lists as $item) { 
                        $class = '';
                        if(isset( $item[ 'class' ])) {
                          $class = esc_attr( implode( ' ', $item['class']));
                        }
                        $menu_a_uniprime .= '<div class="menu-subitem '.$class.'">'."\n";
                        $menu_a_uniprime .= '<a href="#" class="icon-menu icon-'.$class.'">'. esc_html($item['title']) ."\n";
                        $menu_a_uniprime .= '<i class="arrow right"></i></a>'."\n";
                        $menu_a_uniprime .= '</div>'."\n";
                      }
                      echo $menu_a_uniprime;
                    ?>
                  </div>
                  <div class="col-4 menu-subitem-uniprime-governanca">
                    <div class="label-header-menu">
                      <?php echo esc_html('Governança'); ?>
                    </div>
                    <ul>
                      <?php 
                        $menu_lists_governanca = setMenuThreeLevels('menu-governanca');
                        $menu_governanca = "";
                        foreach ($menu_lists_governanca as $item) { 
                          $class = '';
                          if(isset( $item[ 'class' ])) {
                            $class = esc_attr( implode( ' ', $item['class']));
                          }
                          $menu_governanca .= '<li class="menu-item '.$class.'">'."\n";
                          $menu_governanca .= '<a href="#">'. esc_html($item['title']) .'</a>'."\n";              
                          $menu_governanca .= '</li>'."\n";
                        }
                        echo $menu_governanca;
                      ?>
                    </ul>
                  </div>
                  <div class="col-4 menu-subitem-fique-por-dentro">
                    <div class="label-header-menu">
                      <?php echo esc_html('Fique por dentro'); ?>
                    </div>
                    <ul>
                      <?php 
                        $menu_lists_fique_por_dentro = setMenuThreeLevels('menu-fique-por-dentro');
                        $menu_fique_por_dentro = "";
                        foreach ($menu_lists_fique_por_dentro as $item) { 
                          $class = '';
                          if(isset( $item[ 'class' ])) {
                            $class = esc_attr( implode( ' ', $item['class']));
                          }
                          $menu_fique_por_dentro .= '<li class="menu-item '.$class.'">'."\n";
                          $menu_fique_por_dentro .= '<a href="#">'. esc_html($item['title']) .'</a>'."\n";              
                          $menu_fique_por_dentro .= '</li>'."\n";
                        }
                        echo $menu_fique_por_dentro;
                      ?>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="menu-item">
            <a href="#" class="menu-dropdown"><?php echo esc_html('Soluções');?><i class="arrow down"></i></a>
            <div class="dropdown-content">
              <div class="container">
                <div class="row">
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
                      $menu_solucoes .= '<div class="col-4 menu-subitem '.$class.'">'."\n";
                      $menu_solucoes .= '<a href="#" class="icon-menu icon-'.$class.'">'. esc_html($item['title']) ."\n";
                      $menu_solucoes .= '<i class="arrow right"></i></a>'."\n";
                      $menu_solucoes .= '</div>'."\n";
                    }
                    echo $menu_solucoes;
                  ?>
                </div>
              </div>
            </div>
          </div>
          <div class="menu-item">
            <a href="#" class="menu-dropdown"><?php echo esc_html('Atendimento');?><i class="arrow down"></i></a>
            <div class="dropdown-content dropdown-content-atendimento">
              <div class="container">
                <div class="row">
                  <ul>
                    <?php 
                      $menu_lists_atendimento = setMenuThreeLevels('menu-atendimento');
                      $menu_atendimento = "";
                      foreach ($menu_lists_atendimento as $item) { 
                        $class = '';
                        if(isset( $item[ 'class' ])) {
                          $class = esc_attr( implode( ' ', $item['class']));
                        }
                        $menu_atendimento .= '<div class="col-6 menu-subitem '.$class.'">'."\n";
                        $menu_atendimento .= '<li class="menu-item '.$class.'">'."\n";
                        $menu_atendimento .= '<a href="#">'. esc_html($item['title']) .'</a>'."\n";              
                        $menu_atendimento .= '</li>'."\n";
                        $menu_atendimento .= '</div>'."\n";
                      }
                      echo $menu_atendimento;
                    ?>
                  </ul>
                </div>
              </div>
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
</header>