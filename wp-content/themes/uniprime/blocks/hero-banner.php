<?php
$tipo_homepage = get_field('tipo-homepage');
?>
<header class="header-menu-banner position-relative mw-100 <?php echo $tipo_homepage;?>">
  <div class="main-menu  <?php echo $tipo_homepage;?>" id="main-menu">
    <div class="container d-flex justify-content-between">
      <div class="logo">
        <img src="<?php echo get_template_directory_uri();?>/assets/images/UniPrime-logo.png" class="logo-black d-none" id="logo-black" alt="Logo Uniprime">
        <img src="<?php echo get_template_directory_uri();?>/assets/images/UniPrime-logo-branco.png" class="logo-white" id="logo-white" alt="Logo Uniprime">
      </div>
      <div class="flex-grow-1 d-none d-lg-block">
        <nav class="menu-inicial d-flex justify-content-start">
          <div class="menu-item menu-inicial-item">
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
          <div class="menu-item menu-inicial-item">
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
          <div class="menu-item menu-inicial-item">
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
      <div class="menu-mobile d-flex d-lg-none">
        <div class="elementor-widget-container">
          <a href="#" id="button-mobile">
            <div class="bars">
              <div class="bar"></div>
              <div class="bar"></div>
            </div>
          </a>
          <div class="container-menu-mobile " id="container-menu-mobile">
            <div class="d-flex flex-column">
              <div class="header-menu-mobile d-flex">
                <div class="logo-menu-mobile col">
                  <img src="<?php echo get_template_directory_uri();?>/assets/images/UniPrime-logo.png" class="logo-black" alt="Logo Uniprime">
                </div>
                <div class="col-right-menu-mobile col d-flex justify-content-end">
                  <a href="#" class="search">
                    <img src="http://uniprime.local/wp-content/themes/uniprime/assets/images/icons/icon-search.png" alt="Digite sua busca">
                  </a>
                  <a href="#" class="close">
                    <div class="bars">
                      <div class="bar bar1"></div>
                      <div class="bar bar2"></div>
                    </div>
                  </a>
                </div>
              </div>
              <div class="content-menu-mobile">
                <nav class="menu-inicial-mobile">
                  <div class="menu-item menu-inicial-item-mobile">
                    <a href="#" class="menu-dropdown bt-menu-inicial-item-mobile"><?php echo esc_html('A Uniprime');?><i class="arrow right"></i></a>
                    <div class="dropdown-content a-uniprime">
                      <div class="header-menu-mobile d-flex">
                        <div class="logo-menu-mobile col">
                          <img src="<?php echo get_template_directory_uri();?>/assets/images/UniPrime-logo.png" class="logo-black" alt="Logo Uniprime">
                        </div>
                        <div class="col-right-menu-mobile col d-flex justify-content-end">
                          <a href="#" class="search">
                            <img src="http://uniprime.local/wp-content/themes/uniprime/assets/images/icons/icon-search.png" alt="Digite sua busca">
                          </a>
                          <a href="#" class="close">
                            <div class="bars">
                              <div class="bar bar1"></div>
                              <div class="bar bar2"></div>
                            </div>
                          </a>
                        </div>
                      </div>
                      <div class="content-dropdown-mobile a-uniprime">
                        <div class="header-content-mobile d-flex flex-column">
                          <button class="slick-next slick-arrow voltar" aria-label="Next" type="button" style="" aria-disabled="false"></button>
                          <div class="title-menu-mobile">A Uniprime</div>
                        </div>
                        <?php 
                          $menu_lists = setMenuThreeLevels('menu-a-uniprime-mobile');
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
                    </div>
                  </div>
                  <div class="menu-item menu-inicial-item-mobile">
                    <a href="#" class="menu-dropdown bt-menu-inicial-item-mobile"><?php echo esc_html('Soluções');?><i class="arrow right"></i></a>
                    <div class="dropdown-content solucoes">
                      <div class="header-menu-mobile d-flex">
                        <div class="logo-menu-mobile">
                          <img src="<?php echo get_template_directory_uri();?>/assets/images/UniPrime-logo.png" class="logo-black" alt="Logo Uniprime">
                        </div>
                        <div class="col-right-menu-mobile col d-flex justify-content-end">
                          <a href="#" class="search">
                            <img src="http://uniprime.local/wp-content/themes/uniprime/assets/images/icons/icon-search.png" alt="Digite sua busca">
                          </a>
                          <a href="#" class="close">
                            <div class="bars">
                              <div class="bar bar1"></div>
                              <div class="bar bar2"></div>
                            </div>
                          </a>
                        </div>
                      </div>
                      <div class="content-dropdown-mobile">
                        <div class="header-content-mobile d-flex flex-column">
                          <button class="slick-next slick-arrow voltar" aria-label="Next" type="button" style="" aria-disabled="false"></button>
                          <div class="title-menu-mobile">Soluções</div>
                        </div>
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
                            $menu_solucoes .= '<div class="menu-subitem '.$class.'">'."\n";
                            $menu_solucoes .= '<a href="#" class="icon-menu icon-'.$class.'-gold">'. esc_html($item['title']) ."\n";
                            $menu_solucoes .= '<i class="arrow right"></i></a>'."\n";
                            $menu_solucoes .= '</div>'."\n";
                          }
                          echo $menu_solucoes;
                        ?>
                      </div>
                    </div>
                  </div>
                  <div class="menu-item menu-inicial-item-mobile">
                    <a href="#" class="menu-dropdown bt-menu-inicial-item-mobile"><?php echo esc_html('Atendimento');?><i class="arrow right"></i></a>
                    <div class="dropdown-content atendimento">
                      <div class="header-menu-mobile d-flex">
                        <div class="logo-menu-mobile">
                          <img src="<?php echo get_template_directory_uri();?>/assets/images/UniPrime-logo.png" class="logo-black" alt="Logo Uniprime">
                        </div>
                        <div class="col-right-menu-mobile col d-flex justify-content-end">
                          <a href="#" class="search">
                            <img src="http://uniprime.local/wp-content/themes/uniprime/assets/images/icons/icon-search.png" alt="Digite sua busca">
                          </a>
                          <a href="#" class="close">
                            <div class="bars">
                              <div class="bar bar1"></div>
                              <div class="bar bar2"></div>
                            </div>
                          </a>
                        </div>
                      </div>
                      <div class="content-dropdown-mobile">
                        <div class="header-content-mobile d-flex flex-column">
                          <button class="slick-next slick-arrow voltar" aria-label="Next" type="button" style="" aria-disabled="false"></button>
                          <div class="title-menu-mobile">Atendimento</div>
                        </div>
                        <?php 
                          $menu_lists_atendimento = setMenuThreeLevels('menu-atendimento');
                          $menu_atendimento = "";
                          foreach ($menu_lists_atendimento as $item) { 
                            $class = '';
                            if(isset( $item[ 'class' ])) {
                              $class = esc_attr( implode( ' ', $item['class']));
                            }
                            $menu_atendimento .= '<div class="menu-subitem '.$class.'">'."\n";
                            $menu_atendimento .= '<a href="#" class="icon-menu icon-'.$class.'-gold">'. esc_html($item['title']) ."\n";
                            $menu_atendimento .= '<i class="arrow right"></i></a>'."\n";
                            $menu_atendimento .= '</div>'."\n";
                          }
                          echo $menu_atendimento;
                        ?>
                      </div>
                    </div>
                  </div>
                </nav>
              </div>
              <div class="footer-menu-mobile">
                <div class="content-footer">
                  <img src="<?php echo get_template_directory_uri();?>/assets/images/icons/icon-localization.png" alt="Qual unidade você deseja navegar?">
                  Você está em: <br />
                  <div class="unidades">
                    <a href="#" blank="_SELF"><strong>Uniprime Central Nacional</strong><i class="arrow down"></i></a>
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
            </div>
          </div>
        </div>
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