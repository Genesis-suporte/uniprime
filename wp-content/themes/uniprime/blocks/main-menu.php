<?php 
$current_term = "para-voce";
if (is_singular('solucoes')) {
  global $post;
  $terms = wp_get_post_terms($post->ID, 'tipo-solucao');
  if (!empty($terms)) {
    if($terms[0]->slug=="para-voce") {
      $current_term = "para-voce";
    } else if ($terms[0]->slug=="para-seu-negocio") {
      $current_term = "para-empresa";
    } else if ($terms[0]->slug== "para-sua-cooperativa") {
      $current_term = "para-cooperativa";
    }
  }
}
?>
<header class="header-top-bar block-main-menu-header position-relative  mw-100">
  <div class="top-bar  mw-100 <?php echo is_singular('solucoes') ? ' solucoes-' . $current_term : '';?>">
    <div class="bg-white">
      <div class="container" id="top-bar-container">
        <div class="d-flex justify-content-center justify-content-lg-between">
          <div class="first-col d-none d-lg-block">
            <img src="<?php echo get_template_directory_uri();?>/assets/images/icons/icon-localization.png" alt="Qual unidade você deseja navegar?">
            Você está em: <strong style="float: right;"><a href="#" blank="_SELF" class="d-flex flex-row" id="openModalSingulares"><div id="singular-name"></div><i class="arrow down" style="margin-top: 7px;"></i></a></strong>
          </div>
          <div class="second-col d-flex justify-content-center justify-content-lg-end">
            <nav class="w-100">
              <div class="menu-top-bar d-flex justify-content-center justify-content-md-between">
              <?php 
              /*$currentPath = getCurrentPath();
              $basePath = getBasePath();
              var_dump();*/
              //var_dump($basePath);

                $menu_lists = setMenuThreeLevels('top-bar');
                $menu_top_bar = "";
                $index = 0;
                foreach ($menu_lists as $item) { 
                  if ($item['title'] === "Para Sua Cooperativa" && !is_main_site()) {
                    continue; // Pule este item
                  }
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
                  if($index != 0 && $index != (count($menu_lists) - 1) ) { 
                    $menu_top_bar .= '<div class="separador-top-menu"></div>'."\n";
                  }
                  $menu_top_bar .= '<div class="menu-item '.$class.'">'."\n";
                  if(!$class_search) { 
                    $menu_top_bar .= '<a href="'. esc_html($item['link']) .'" class="menu-dropdown">'. esc_html($item['title']) .'</a>'."\n";
                  } else { 
                    $menu_top_bar .= '<a href="javascript:void(0)" class="menu-dropdown icon-search" id="open-search"> </a>';
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
    <div class="header-menu-banner position-relative mw-100" id="header-menu-banner">
      <div class="main-menu interna <?php echo is_singular('solucoes') ? ' actived ' . $current_term : '';?>" id="main-menu">
        <div class="container d-flex justify-content-between">
          <div class="logo">
            <a href="/" class="link-logo">
              <?php if ($current_term == "para-voce") { ?>
                <img src="<?php echo get_template_directory_uri();?>/assets/images/UniPrime-logo.png" class="logo-black" alt="Logo Uniprime">
              <?php } else { ?>
                <img src="<?php echo get_template_directory_uri();?>/assets/images/UniPrime-logo-branco.png" class="logo-white" id="logo-white" alt="Logo Uniprime">
              <?php } ?>
            </a>
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
                            if(isset( $item[ 'active' ])) {
                              $class .= ' '.$item[ 'active' ];
                            }
                            $menu_a_uniprime .= '<div class="menu-subitem '.$class.'">'."\n";
                            $menu_a_uniprime .= '<a href="'. esc_html($item['link']) .'" class="icon-menu icon-'.$class.'">'. esc_html($item['title']) ."\n";
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
                              if( $item[ 'link' ] === get_permalink()) {
                                $class .= ' current-menu-item';
                              }
                              $menu_governanca .= '<li class="menu-item '.$class.'">'."\n";
                              $menu_governanca .= '<a href="'. esc_html($item['link']) .'">'. esc_html($item['title']) .'</a>'."\n";              
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
                              if( $item[ 'link' ] === get_permalink()) {
                                $class .= ' current-menu-item';
                              }
                              $menu_fique_por_dentro .= '<li class="menu-item '.$class.'">'."\n";
                              $menu_fique_por_dentro .= '<a href="'. esc_html($item['link']) .'">'. esc_html($item['title']) .'</a>'."\n";              
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
                      //solucoes-para-cooperativa .$tipo_homepage
                        $menu_lists = setMenuThreeLevels('solucoes-'.$current_term);
                        $menu_solucoes = "";
                        foreach ($menu_lists as $item) { 
                          $class = '';
                          if(isset( $item[ 'class' ])) {
                            $class = esc_attr( implode( ' ', $item['class']));
                          }
                          if(isset( $item[ 'active' ])) {
                            $class .= ' '.$item[ 'active' ];
                          }
                          $menu_solucoes .= '<div class="col-4 menu-subitem aqui '.$class.'">'."\n";
                          $menu_solucoes .= '<a href="'. esc_html($item['link']) .'" class="icon-menu icon-'.$class.'">'. esc_html($item['title']) ."\n";
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
                            if( $item[ 'link' ] === get_permalink()) {
                              $class .= ' current-menu-item';
                            }
                            $menu_atendimento .= '<div class="col-6 menu-subitem '.$class.'">'."\n";
                            $menu_atendimento .= '<li class="menu-item '.$class.'">'."\n";
                            $menu_atendimento .= '<a href="'. esc_html($item['link']) .'">'. esc_html($item['title']) .'</a>'."\n";              
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
                  $menu_one_level .= '<a href="'. esc_url($item['link']) .'" class="'.$class.'">'."\n";
                  $menu_one_level .= '<svg width="18" height="15" viewBox="0 0 18 15" fill="none" xmlns="http://www.w3.org/2000/svg" class="icon-users">
                  <path d="M16.5 13.6667C16.5 12.2153 15.1087 10.9806 13.1667 10.523M11.5 13.6667C11.5 11.8258 9.26142 10.3334 6.5 10.3334C3.73858 10.3334 1.5 11.8258 1.5 13.6667M11.5 7.83341C13.3409 7.83341 14.8333 6.34103 14.8333 4.50008C14.8333 2.65913 13.3409 1.16675 11.5 1.16675M6.5 7.83341C4.65905 7.83341 3.16667 6.34103 3.16667 4.50008C3.16667 2.65913 4.65905 1.16675 6.5 1.16675C8.34095 1.16675 9.83333 2.65913 9.83333 4.50008C9.83333 6.34103 8.34095 7.83341 6.5 7.83341Z" stroke="#004F71" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                  </svg>'."\n";
                  $menu_one_level .= esc_html($item['title']) .'</a>'."\n";
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
                      <a href="/" class="link-logo">
                        <img src="<?php echo get_template_directory_uri();?>/assets/images/UniPrime-logo.png" class="logo-black" alt="Logo Uniprime">
                      </a>
                    </div>
                    <div class="col-right-menu-mobile col d-flex justify-content-end">
                      <a href="#" class="search">
                        <img src="https://unip.genesiscreative.com.br/wp-content/themes/uniprime/assets/images/icons/icon-search.png" alt="Digite sua busca">
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
                              <a href="/" class="link-logo">
                                <img src="<?php echo get_template_directory_uri();?>/assets/images/UniPrime-logo.png" class="logo-black" alt="Logo Uniprime">
                              </a>
                            </div>
                            <div class="col-right-menu-mobile col d-flex justify-content-end">
                              <a href="#" class="search">
                                <img src="https://unip.genesiscreative.com.br/wp-content/themes/uniprime/assets/images/icons/icon-search.png" alt="Digite sua busca">
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
                                if(isset( $item[ 'active' ])) {
                                  $class .= ' '.$item[ 'active' ];
                                }
                                $menu_a_uniprime .= '<div class="menu-subitem '.$class.'">'."\n";
                                $menu_a_uniprime .= '<a href="'. esc_html($item['link']) .'" class="icon-menu icon-'.$class.'">'. esc_html($item['title']) ."\n";
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
                              <a href="/" class="link-logo">
                                <img src="<?php echo get_template_directory_uri();?>/assets/images/UniPrime-logo.png" class="logo-black" alt="Logo Uniprime">
                              </a>
                            </div>
                            <div class="col-right-menu-mobile col d-flex justify-content-end">
                              <a href="#" class="search">
                                <img src="https://unip.genesiscreative.com.br/wp-content/themes/uniprime/assets/images/icons/icon-search.png" alt="Digite sua busca">
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
                              $menu_lists = setMenuThreeLevels('solucoes-'.$current_term);
                              $menu_solucoes = "";
                              foreach ($menu_lists as $item) { 
                                $class = '';
                                if(isset( $item[ 'class' ])) {
                                  $class = esc_attr( implode( ' ', $item['class']));
                                }
                                if(isset( $item[ 'active' ])) {
                                  $class .= ' '.$item[ 'active' ];
                                }
                                $menu_solucoes .= '<div class="menu-subitem '.$class.'">'."\n";
                                $menu_solucoes .= '<a href="'. esc_html($item['link']) .'" class="icon-menu icon-'.$class.'-gold">'. esc_html($item['title']) ."\n";
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
                              <a href="/" class="link-logo">
                                <img src="<?php echo get_template_directory_uri();?>/assets/images/UniPrime-logo.png" class="logo-black" alt="Logo Uniprime">
                              </a>
                            </div>
                            <div class="col-right-menu-mobile col d-flex justify-content-end">
                              <a href="#" class="search">
                                <img src="https://unip.genesiscreative.com.br/wp-content/themes/uniprime/assets/images/icons/icon-search.png" alt="Digite sua busca">
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
                                if( $item[ 'link' ] === get_permalink()) {
                                  $class .= ' current-menu-item';
                                }
                                $menu_atendimento .= '<div class="menu-subitem '.$class.'">'."\n";
                                $menu_atendimento .= '<a href="'. esc_html($item['link']) .'" class="icon-menu icon-'.$class.'-gold">'. esc_html($item['title']) ."\n";
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
                      Você está em: aqui<br />
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
                              $menu_one_level .= '<a href="'. esc_url($item['link']) .'" class="'.$class.'"><img src="'.get_template_directory_uri().'/assets/images/icons/icon-users-white.png" alt="Seja o cooperado" class="" id="icon-users-white"><img src="'.get_template_directory_uri().'/assets/images/icons/icon-users.png" alt="Seja o cooperado" id="icon-users" style="display: none;">'. esc_html($item['title']) .'</a>'."\n";
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
    </div>
  </div>
</header>