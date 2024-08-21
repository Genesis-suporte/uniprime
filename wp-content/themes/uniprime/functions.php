<?php
/**
 * @package WordPress
 * @subpackage Uniprime
 */
//require_once('library/acf_blocks.php');



if ( ! function_exists( 'Uniprime' ) ) :
	/**
	 * Sets up theme defaults and registers the various WordPress features that
	 * this theme supports.
	 */
	function Uniprime() {
		if( function_exists('acf_register_block_type') ) {
			acf_register_block_type(array(
				'name'      			=> 'header-para-voce',
				'title' 					=> __('Header Top bar'),
				'description' 		=> __('Menu inicial de Uniprime'),
				"render_template"	=> "blocks/header.php",
				'category' 				=> 'layout',
				'icon'            => 'uniprime' ,
				'keywords' => 		array( 'nav', 'menu' )
			));
			
			acf_register_block_type(array(
				'name'      			=> 'main-menu',
				'title' 					=> __('Main menu'),
				'description' 		=> __('Menu principal'),
				"render_template"	=> "blocks/main-menu.php",
				'category' 				=> 'navigation',
				'icon' 						=> 'uniprime',
				'keywords' => 		array( 'navigation', 'menu' )
			));
			acf_register_block_type(array(
				'name'      			=> 'Hero banner',
				'title' 					=> __('hero-banner'),
				'description' 		=> __('Hero banner da Homepage'),
				"render_template"	=> "blocks/hero-banner.php",
				'category' 				=> 'layout',
				'icon' 						=> 'uniprime',
				'keywords' => 		array( 'hero', 'banner' )
			));
			acf_register_block_type(array(
				'name'      			=> 'Bloco nossos produtos',
				'title' 					=> __('nossos-produtos'),
				'description' 		=> __('Terceiro bloco da Homepage, onde mostra a lista das soluções'),
				"render_template"	=> "blocks/nossos-produtos.php",
				'category' 				=> 'layout',
				'icon' 						=> 'uniprime',
				'keywords' => 		array( 'list', 'categories' )
			));
			acf_register_block_type(array(
				'name'      			=> 'Bloco nossos produtos curto',
				'title' 					=> __('Nossos produtos short'),
				'description' 		=> __('Um bloco onde lista 3 produtos/serviços pras páginas internas'),
				"render_template"	=> "blocks/nossos-produtos-short.php",
				'category' 				=> 'layout',
				'icon' 						=> 'uniprime',
				'keywords' => 		array( 'list', 'categories' )
			));
			acf_register_block_type(array(
				'name'      			=> 'Bloco nossa história',
				'title' 					=> __('nossa-historia'),
				'description' 		=> __('Quarto bloco da Homepage, onde mostra os cards'),
				"render_template"	=> "blocks/nossa-historia.php",
				'category' 				=> 'layout',
				'icon' 						=> 'uniprime',
				'keywords' => 		array( 'slick', 'slides' )
			));
			acf_register_block_type(array(
				'name'      			=> 'Bloco canais digitais',
				'title' 					=> __('canais-digitais'),
				'description' 		=> __('Quinto bloco da Homepage, onde mostra o texto e imagem dos canais digitais'),
				"render_template"	=> "blocks/canais-digitais.php",
				'category' 				=> 'layout',
				'icon' 						=> 'uniprime'
			));
			acf_register_block_type(array(
				'name'      			=> 'Bloco canais digitais duplo',
				'title' 					=> __('canais-digitais-duplo'),
				'description' 		=> __('Bloco onde mostra texto e imagem dos canais digitais, duplo'),
				"render_template"	=> "blocks/canais-digitais-duplo.php",
				'category' 				=> 'layout',
				'icon' 						=> 'uniprime'
			));
			acf_register_block_type(array(
				'name'      			=> 'Bloco onde encontrar',
				'title' 					=> __('onde-encontrar'),
				'description' 		=> __('Sexto bloco da Homepage, onde tem o combobox de escolha das unidades'),
				"render_template"	=> "blocks/onde-encontrar.php",
				'category' 				=> 'layout',
				'icon' 						=> 'uniprime'
			));
			acf_register_block_type(array(
				'name'      			=> 'Bloco novidades',
				'title' 					=> __('novidades'),
				'description' 		=> __('Sétimo bloco da Homepage, onde lista as notícias em destaque'),
				"render_template"	=> "blocks/novidades.php",
				'category' 				=> 'layout',
				'icon' 						=> 'uniprime'
			));
			acf_register_block_type(array(
				'name'      			=> 'Bloco atendimento',
				'title' 					=> __('atendimento'),
				'description' 		=> __('Oitavo bloco da Homepage, onde se encontram os links das redes sociais'),
				"render_template"	=> "blocks/atendimento.php",
				'category' 				=> 'layout',
				'icon' 						=> 'uniprime'
			));
			acf_register_block_type(array(
				'name'      			=> 'Footer',
				'title' 					=> __('footer'),
				'description' 		=> __('Bloco footer'),
				"render_template"	=> "blocks/footer.php",
				'category' 				=> 'layout',
				'icon' 						=> 'uniprime',
				'keywords' => 		array( 'footer' )
			));
			acf_register_block_type(array(
				'name'      			=> 'Breadcrumbs nav',
				'title' 					=> __('Breadcrumbs nav'),
				'description' 		=> __('Bloco de Breadcrumbs'),
				"render_template"	=> "blocks/breadcrumbs.php",
				'category' 				=> 'layout',
				'icon' 						=> 'uniprime',
				'keywords' => 		array( 'breadcrumbs' )
			));
			acf_register_block_type(array(
				'name'      			=> 'banner-topo-titulo',
				'title' 					=> __('Banner topo + Título'),
				'description' 		=> __('Bloco de Banner topo + Título das páginas internas '),
				"render_template"	=> "blocks/banner-titulo.php",
				'category' 				=> 'layout',
				'icon' 						=> 'uniprime',
				'keywords' => 		array( 'banner' )
			));
			acf_register_block_type(array(
				'name'      			=> 'texto-imagem',
				'title' 					=> __('Texto + Imagem'),
				'description' 		=> __('Bloco de Texto + Imagem das páginas internas'),
				"render_template"	=> "blocks/text-image.php",
				'category' 				=> 'layout',
				'icon' 						=> 'uniprime',
				'keywords' => 		array( 'texto','imagem' )
			));
			acf_register_block_type(array(
				'name'      			=> 'bloco-mvv',
				'title' 					=> __('Bloco Missão, Visão, Valores'),
				'description' 		=> __('Bloco Missão, Visão, Valores da página institucional'),
				"render_template"	=> "blocks/bloco-mvv.php",
				'category' 				=> 'layout',
				'icon' 						=> 'uniprime',
				'keywords' => 		array( 'texto','imagem' )
			));
			acf_register_block_type(array(
				'name'      			=> 'bloco-beneficios',
				'title' 					=> __('Bloco benefícios'),
				'description' 		=> __('Bloco benefícios da página institucional'),
				"render_template"	=> "blocks/bloco-beneficios.php",
				'category' 				=> 'layout',
				'icon' 						=> 'uniprime',
				'keywords' => 		array( 'institucional' )
			));
			acf_register_block_type(array(
				'name'      			=> 'bloco-diretoria-e-conselhos',
				'title' 					=> __('Bloco Diretoria e Conselhos'),
				'description' 		=> __('Bloco Diretoria e Conselhos da página institucional'),
				"render_template"	=> "blocks/bloco-diretoria-e-conselhos.php",
				'category' 				=> 'layout',
				'icon' 						=> 'uniprime',
				'keywords' => 		array( 'institucional' )
			));
			acf_register_block_type(array(
				'name'      			=> 'bloco-cards',
				'title' 					=> __('Bloco de cards'),
				'description' 		=> __('Bloco para montar cards'),
				"render_template"	=> "blocks/bloco-cards.php",
				'category' 				=> 'layout',
				'icon' 						=> 'uniprime',
				'keywords' => 		array( 'institucional' )
			));	
			acf_register_block_type(array(
				'name'      			=> 'bloco-assembleias',
				'title' 					=> __('Bloco Assembleias'),
				'description' 		=> __('Bloco que lista as Assembleias passadas e futuras'),
				"render_template"	=> "blocks/bloco-assembleias.php",
				'category' 				=> 'layout',
				'icon' 						=> 'uniprime',
				'keywords' => 		array( 'institucional' )
			));	
			acf_register_block_type(array(
				'name'      			=> 'bloco-relatorios',
				'title' 					=> __('Bloco Relatórios'),
				'description' 		=> __('Bloco que lista os Relatórios'),
				"render_template"	=> "blocks/bloco-relatorios.php",
				'category' 				=> 'layout',
				'icon' 						=> 'uniprime',
				'keywords' => 		array( 'institucional' )
			));					
			acf_register_block_type(array(
				'name'      			=> 'bloco-investimentos',
				'title' 					=> __('Bloco Investimentos'),
				'description' 		=> __('Bloco com o conteúdo de investimentos e links pras páginas'),
				"render_template"	=> "blocks/bloco-investimentos.php",
				'category' 				=> 'layout',
				'icon' 						=> 'uniprime',
				'keywords' => 		array( 'institucional' )
			));		
			acf_register_block_type(array(
				'name'      			=> 'bloco-topo-investimentos',
				'title' 					=> __('Bloco topo de investimentos'),
				'description' 		=> __('Bloco que substitui a hero image das páginas de investimentos'),
				"render_template"	=> "blocks/bloco-topo-investimentos.php",
				'category' 				=> 'layout',
				'icon' 						=> 'uniprime',
				'keywords' => 		array( 'institucional' )
			));	
			acf_register_block_type(array(
				'name'      			=> 'bloco-duvidas',
				'title' 					=> __('Bloco Saiba mais (dúvidas)'),
				'description' 		=> __('Bloco Saiba mais (dúvidas)'),
				"render_template"	=> "blocks/bloco-duvidas.php",
				'category' 				=> 'layout',
				'icon' 						=> 'uniprime',
				'keywords' => 		array( 'institucional' )
			));	
			acf_register_block_type(array(
				'name'      			=> 'bloco-cartoes',
				'title' 					=> __('Bloco de cartões'),
				'description' 		=> __('Bloco de cartões'),
				"render_template"	=> "blocks/bloco-cartoes.php",
				'category' 				=> 'layout',
				'icon' 						=> 'uniprime',
				'keywords' => 		array( 'institucional' )
			));	
			acf_register_block_type(array(
				'name'      			=> 'bloco-baixe-conteudo',
				'title' 					=> __('Bloco Baixe agora seu conteúdo exclusivo'),
				'description' 		=> __('Bloco Baixe agora seu conteúdo exclusivo'),
				"render_template"	=> "blocks/bloco-baixe-conteudo.php",
				'category' 				=> 'layout',
				'icon' 						=> 'uniprime',
				'keywords' => 		array( 'institucional' , 'content-noticias')
			));	
			acf_register_block_type(array(
				'name'      			=> 'acesse-noticias',
				'title' 					=> __('Bloco Acesse de Notícias'),
				'description' 		=> __('Bloco que pode ser colocado ao final da página de notícia'),
				"render_template"	=> "blocks/acesse-noticias.php",
				'category' 				=> 'layout',
				'icon' 						=> 'uniprime'
			));
			acf_register_block_type(array(
				'name'      			=> 'bloco-saiba-mais-noticias',
				'title' 					=> __('Bloco Saiba Mais Notícias'),
				'description' 		=> __('Bloco que pode ser colocado ao final da página de notícia'),
				"render_template"	=> "blocks/bloco-saiba-mais-noticias.php",
				'category' 				=> 'layout',
				'icon' 						=> 'uniprime'
			));
			acf_register_block_type(array(
				'name'      			=> 'bloco-lgpd',
				'title' 					=> __('Bloco LGPD'),
				'description' 		=> __('Bloco do texto de LGPD'),
				"render_template"	=> "blocks/bloco-lgpd.php",
				'category' 				=> 'layout',
				'icon' 						=> 'uniprime'
			));
			acf_add_options_page(array(
        'page_title'    => 'Footer Settings',
        'menu_title'    => 'Footer Settings',
        'menu_slug'     => 'footer-settings',
        'capability'    => 'edit_posts',
        'redirect'      => false
    	));
			acf_register_block_type(array(
        'name'              => 'bootstrap-container',
        'title'             => __('Bootstrap Container'),
        'description'       => __('A custom Bootstrap container block.'),
        'render_template'   => 'blocks/bootstrap-container.php',
        'category'          => 'layout',
        'icon'              => 'admin-comments',
        'keywords'          => array('container', 'bootstrap'),
        'supports'          => array(
            'align' => false,
            'mode' => false,
            'jsx' => true,
        ),
    	));
		}
		
		add_theme_support( 'wp-block-styles' );
		add_theme_support( 'align-wide' );
		add_theme_support( 'editor-styles' );
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );
	}
endif; // end function_exists blank_setup.
//add_action( 'after_setup_theme', 'Uniprime' );

if ( function_exists( 'acf_register_block_type' ) ) {
	add_action('acf/init', 'Uniprime');
}
function my_block_plugin_editor_scripts() {
	wp_enqueue_style('styles', get_template_directory_uri() . '/assets/css/styles.css', array(), null, 'all');
	wp_enqueue_style('bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), null, 'all' );
	wp_enqueue_style('slick', get_template_directory_uri() . '/assets/css/slick.css', array(), null, 'all');
	wp_enqueue_style( 'fonts' ,  get_template_directory_uri() . '/assets/css/fonts.css' );

	$dependencies = array('jquery','wp-blocks', 'wp-element' );
	wp_enqueue_script('bootstrap', get_template_directory_uri().'/assets/js/bootstrap.bundle.min.js', $dependencies, null, true );
	wp_enqueue_script('slick', get_template_directory_uri().'/assets/js/slick.js', $dependencies, null, true );
	wp_enqueue_script('scripts', get_template_directory_uri().'/assets/js/scripts.js', array_merge($dependencies, array('bootstrap', 'slick')), null, true);
	// Passe o caminho de admin-ajax.php para o script JavaScript
	wp_localize_script('scripts', 'ajax_object', array('ajax_url' => admin_url('admin-ajax.php')));
	// Carregar e passar o JSON para o JavaScript
	$agencias_json = file_get_contents(get_template_directory() . '/api/agencias.json');
	wp_localize_script('scripts', 'agenciasData', json_decode($agencias_json, true));
}
add_action( 'wp_enqueue_scripts', 'my_block_plugin_editor_scripts' );
add_action( 'enqueue_block_editor_assets', 'my_block_plugin_editor_scripts' );
add_action( 'admin_enqueue_scripts', 'my_block_plugin_editor_scripts' );
function mytheme_setup() {
	// Suporte para estilos de edição do editor de blocos.
	add_theme_support( 'editor-styles' );

	// Adicione o estilo do editor
	add_editor_style( get_template_directory_uri( '/assets/css/editor-style.css') );
}

add_action( 'after_setup_theme', 'mytheme_setup' );
/* ADICIONANDO COLUNA TAXONOMIA NAS POST-LIST DOS CUSTOM POST TYPE */
function custom_taxonomy_column($columns) {
	$new_columns = array();
	// Move a coluna do título para o início do array
	$title = $columns['title'];
	unset($columns['title']);
	// Adiciona a coluna do título no início do array
	$new_columns['title'] = $title;
	// Adiciona a nova coluna 'Taxonomia' após a coluna do título
	$new_columns['taxonomy'] = 'Taxonomia';
	// Adiciona as demais colunas após a coluna 'Taxonomia'
	foreach ($columns as $key => $value) {
		$new_columns[$key] = $value;
	}

	return $new_columns;
}
add_filter('manage_solucoes_posts_columns', 'custom_taxonomy_column');
add_filter('manage_relatorio_posts_columns', 'custom_taxonomy_column');

// Mostra o conteúdo da nova coluna
function custom_taxonomy_column_content($column, $post_id) {

	if ($column === 'taxonomy') {
		// Obtém todas as taxonomias associadas ao tipo de post
		$taxonomies = get_object_taxonomies(get_post_type($post_id), 'objects');
		
		// Verifica se há taxonomias
		if ($taxonomies) {
			foreach ($taxonomies as $taxonomy) {
				// Verifica se o post tem termos associados à taxonomia atual
				$terms = get_the_terms($post_id, $taxonomy->name);
				
				if ($terms && !is_wp_error($terms)) {
					$taxonomy_names = array();
					foreach ($terms as $term) {
							$taxonomy_names[] = $term->name;
					}
					echo implode(', ', $taxonomy_names);
					return; // Termina a função após encontrar a primeira taxonomia com termos associados
				}
			}
		}
		
		// Se não houver taxonomias ou termos associados
        echo 'N/A';
    }
}
add_action('manage_relatorio_posts_custom_column', 'custom_taxonomy_column_content', 10, 3);
add_action('manage_solucoes_posts_custom_column', 'custom_taxonomy_column_content', 10, 3); 

// Torna a coluna "Taxonomia" filtrável
function custom_taxonomy_column_sortable($columns) {
	$columns['taxonomy'] = 'taxonomy'; // Define o nome do campo usado para ordenação
	return $columns;
}
add_filter('manage_edit-relatorio_sortable_columns', 'custom_taxonomy_column_sortable');
add_filter('manage_edit-solucoes_sortable_columns', 'custom_taxonomy_column_sortable');

function custom_destaque_column($columns) {
	$new_columns = array();
	// Move a coluna do título para o início do array
	$title = $columns['title'];
	unset($columns['title']);
	// Adiciona a coluna do título no início do array
	$new_columns['title'] = $title;
	// Adiciona a nova coluna 'Taxonomia' após a coluna do título
	$new_columns['destaque'] = 'Destaque home';
	// Adiciona as demais colunas após a coluna 'Taxonomia'
	foreach ($columns as $key => $value) {
		$new_columns[$key] = $value;
	}
	return $new_columns;
}
add_filter('manage_noticia_posts_columns', 'custom_destaque_column');
add_filter('manage_sala-de-imprensa_posts_columns', 'custom_destaque_column');
add_filter('manage_campanha_posts_columns', 'custom_destaque_column');

function custom_destaque_column_content($column, $post_id) {
	if ($column == 'destaque') {
		// Obtenha o valor do campo 'destaque' usando o plugin ACF
		$destaque = get_field('destaque_home', $post_id);
		echo ($destaque) ? 'Sim' : 'Não';
	}
}
add_action('manage_noticia_posts_custom_column', 'custom_destaque_column_content', 10, 3);
add_action('manage_sala-de-imprensa_posts_custom_column', 'custom_destaque_column_content', 10, 3);
add_action('manage_campanha_posts_custom_column', 'custom_destaque_column_content', 10, 3);

function custom_destaque_column_sortable($columns) {
	$columns['destaque'] = 'Destaque home'; // Define o nome do campo usado para ordenação
	return $columns;
}
add_filter('manage_edit-noticia_sortable_columns', 'custom_destaque_column_sortable');
add_filter('manage_edit-sala-de-imprensa_columns', 'custom_destaque_column_sortable');
add_filter('manage_edit-campanha_sortable_columns', 'custom_destaque_column_sortable');

// Adicionando ícones no select dos blocos de cards 
function my_acf_load_icon_choices( $field ) {
	// Verifica se o campo é o campo de seleção de ícones
	if ( $field['name'] == 'icone_cards' ) {
		$field['choices'] = array(
			'no-icons' => 'Sem ícones',
			'use-numbers' => 'Usar números'
		);
		// Define o caminho para a pasta de ícones
		$icon_directory = get_template_directory() . '/assets/images/icons/defaults/';

		// Verifica se a pasta de ícones existe
		if ( is_dir( $icon_directory ) ) {
			// Inicializa um array para armazenar as opções de ícones
			$icon_choices = array();
			$field['choices'] = array(
            'no-icons' => 'Sem ícones',
            'use-numbers' => 'Usar números'
        );
			// Abre o diretório de ícones
			if ( $handle = opendir( $icon_directory ) ) {
				// Percorre os arquivos no diretório
				while ( false !== ( $entry = readdir( $handle ) ) ) {
					// Verifica se é um arquivo regular
					if ( is_file( $icon_directory . $entry ) ) {
						// Adiciona o ícone como uma opção no campo de seleção
						// O valor do ícone é o nome do arquivo (Sem extensão)
						// O rótulo do ícone pode ser personalizado conforme necessário

						//$icon_choices[ pathinfo( $entry, PATHINFO_FILENAME ) ] = '<img src="' . get_template_directory_uri() . '/assets/images/icones/' . $entry . '" alt="' . $entry . '"> ' . $entry;
						$icon_class = pathinfo( $entry, PATHINFO_FILENAME );
						$class_suffix = '';
						$icon_name = str_replace('icon-', '', pathinfo($entry, PATHINFO_FILENAME));
						// Verifica se o nome do arquivo termina com '-white.png' ou '-white.svg'
						if ( preg_match( '/-white\.(png|svg)$/', $entry ) || $icon_class == 'icon-missao' || $icon_class == 'icon-visao' || $icon_class == 'icon-valores') {
							$class_suffix = ' white';
						}
						if($icon_name != 'arrow-down-gold') {
							if($icon_name == 'Sem ícone') {
								$field['choices'][ $icon_name ] = '<div class="title icon-menu icon-select-field no-icon">Sem ícone</div>';
							} else if($icon_name == 'Números') {
								$field['choices'][ $icon_name ] = '<div class="title icon-menu icon-select-field numbers">Números</div>';
							} else {
								$field['choices'][ $icon_class ] = '<div class="title icon-menu icon-select-field ' . $icon_class . ' '.$class_suffix.'">' . $icon_name . '</div>';
							}
						}
					}
				}
				// Fecha o manipulador do diretório
				closedir( $handle );
			}

			// Define as opções do campo de seleção com os ícones carregados dinamicamente
			$field;
		}
	}

	// Retorna o campo modificado
	return $field;
}
add_filter('acf/load_field', 'my_acf_load_icon_choices');
// Adicione uma nova coluna na listagem de posts do admin
function custom_post_type_columns($columns) {
	$columns['destaque'] = 'Destaque'; // Adicione a nova coluna após o título
	return $columns;
}
add_filter('manage_noticias_posts_columns', 'custom_post_type_columns');

// Exiba os dados na coluna personalizada
function custom_post_type_column_content($column, $post_id) {
	if ($column == 'destaque') {
			// Obtenha o valor do campo 'destaque' usando o plugin ACF
			$destaque = get_field('destaque', $post_id);
			// Exiba o valor na coluna
			echo ($destaque) ? 'Sim' : 'Não';
	}
}
add_action('manage_noticias_posts_custom_column', 'custom_post_type_column_content', 10, 2);


function setMenuThreeLevels($menu) {
	$menu_lists = array();
	
	$sub_parent = 0;
	$menu_items = wp_get_nav_menu_items( $menu );

	// Get the current post type and taxonomy term
	global $post;
	$current_term = '';
	
	if (is_singular('solucoes')) {
		$terms = wp_get_post_terms($post->ID, 'tipo-solucao');
		//var_dump($terms[0]->slug);
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
	
	foreach ( $menu_items as $menu_item ) {
		//if ( in_array( $menu_item->object, array( 'page', 'custom' ) ) ) {
		$id = $menu_item->ID;
		$title = $menu_item->title;
		$link = $menu_item->url;
		$class = $menu_item->classes;
		$menu_item_parent = $menu_item->menu_item_parent;
		$menu_lists[ $id ]['active'] = '';
		if($menu==='solucoes-para-voce') {
			//print_r( $link);

		}
				// if menu item has no parent, means this is the top-menu.
		if ( ! $menu_item_parent ) {
			$menu_lists[ $id ]['child'] = false;
			$menu_lists[ $id ]['id'] = $id;
			$menu_lists[ $id ]['title'] = $title;
			$menu_lists[ $id ]['link'] = $link;
			$menu_lists[ $id ]['class'] = $class;

			// add active field if current link and open url is same.
			if ( get_permalink() === $link ) {
				// print_r(get_permalink());
				// print_r( $link);
				// echo '<br />';
				$menu_lists[ $id ]['active'] = 'current-menu-item';
			}
			// Add active class based on current term
			
			if (in_array($current_term, $class)) {
				$menu_lists[$id]['active'] = 'current-menu-item';
			}
		} else {
			// if parent menu is set, means this is 2nd level menu
			if ( isset( $menu_lists[ $menu_item_parent ] ) ) {
				$menu_lists[ $menu_item_parent ][ 'child' ] = true;
				$menu_lists[ $menu_item_parent ][ 'childs' ][ $id ]['child'] = false;
				$menu_lists[ $menu_item_parent ][ 'childs' ][ $id ]['id'] = $id;
				$menu_lists[ $menu_item_parent ][ 'childs' ][ $id ]['title'] = $title;
				$menu_lists[ $menu_item_parent ][ 'childs' ][ $id ]['link'] = $link;
				$menu_lists[ $menu_item_parent ][ 'childs' ][ $id ]['class'] = $class;

				// add active field to current menu item and its parent menu item if current link and open url is same.
				if ( get_permalink() === $link ) {
					$menu_lists[ $menu_item_parent ]['active'] = 'current-menu-item';
					$menu_lists[ $menu_item_parent ][ 'childs' ][ $id ]['active'] = 'current-menu-item';
				}

				$sub_parent = $menu_item_parent;
			} elseif ( isset( $menu_lists[ $sub_parent ][ 'childs' ][ $menu_item_parent ] ) ) {
				// if parent menu is set and their parent menu is also set, means this is 3rd level menu
				$menu_lists[ $sub_parent ][ $menu_item_parent ]['child'] = true;
				$menu_lists[ $sub_parent ][ 'childs' ][ $menu_item_parent ][ 'childs' ][ $id ]['id'] = $id;
				$menu_lists[ $sub_parent ][ 'childs' ][ $menu_item_parent ][ 'childs' ][ $id ]['title'] = $title;
				$menu_lists[ $sub_parent ][ 'childs' ][ $menu_item_parent ][ 'childs' ][ $id ]['link'] = $link;
				$menu_lists[ $sub_parent ][ 'childs' ][ $menu_item_parent ][ 'childs' ][ $id ]['class'] = $class;

				// add active field to current menu item and its parent menu item if current link and open url is same.
				if ( get_permalink() === $link ) {
					$menu_lists[ $sub_parent ]['active'] = 'current-menu-item';
					$menu_lists[ $sub_parent ][ 'childs' ][ $menu_item_parent ]['active'] = 'current-menu-item';
					$menu_lists[ $sub_parent ][ 'childs' ][ $menu_item_parent ][ 'childs' ][ $id ]['active'] = 'current-menu-item';
				}
			}
		}
	}
	//print_r($menu_lists);
	return $menu_lists;
}

function custom_login_logo() {
	echo '<style type="text/css">
			.login h1 a {
					background-image: url(' . get_template_directory_uri() . '/assets/images/UniPrime-logo.png);
					width: 300px; /* Largura do seu logo */
					height: 100px; /* Altura do seu logo */
					background-size: 300px auto; /* Ajuste conforme necessário */
					background-repeat: no-repeat;
					padding-bottom: 30px; /* Espaçamento abaixo do logo */
			}
	</style>';
}
add_action('login_head', 'custom_login_logo');

// FUNÇÕES PRA POPULAR CAMPOS DE COOP E AGÊNCIAS -> AJAX
add_action('wp_ajax_my_custom_action', 'my_custom_action_callback');
add_action('wp_ajax_nopriv_my_custom_action', 'my_custom_action_callback');

function my_custom_action_callback() {
    // Faça a requisição HTTP GET para o arquivo JSON
    $response = wp_remote_get(get_template_directory_uri().'/api/agencias.json');

    if (!is_wp_error($response) && $response['response']['code'] == 200) {
        // Retorna os dados JSON
        wp_send_json_success(wp_remote_retrieve_body($response));
    } else {
        // Retorna uma mensagem de erro
        wp_send_json_error('Erro ao carregar os dados do JSON.');
    }

    wp_die(); // Encerra a execução
}

add_filter( 'gform_field_value_select-cooperativa-data', 'populate_select_cooperativa' );
function populate_select_cooperativa( $value ) {?>
	<script type='text/javascript'>
		(function($){
			$(document).on('gform_post_render', function(event, form_id, current_page){
				carregarSelects();
			})
			// Chame a função de carregar selects após mover os campos
			$(document).ready(function() {
        carregarSelects();
    	});
			// Verifica se é o formulário correto pelo ID
			function carregarSelects() {
				
				const selectCooperativa = document.querySelectorAll(".select-cooperativa select");
				const selectAgencia = document.querySelectorAll(".select-agencia select");

				if(selectCooperativa && selectAgencia) {
						$.ajax({
							url: ajax_object.ajax_url + '?action=my_custom_action',
							type: 'GET',
							dataType: 'json',
							success: function(response) {
								// Manipule os dados JSON aqui
								var json = $.parseJSON(response.data); // create an object with the key of the array
								var singulares = json.singulares;
								//console.log(selectCooperativa);
								var selectArrayCooperativa = Array.from(selectCooperativa);
								// Iterando sobre a array para limpar as options
								selectArrayCooperativa.forEach(function(select) {
									$(select).empty();
									$(select).append($('<option>').text('Selecione uma cooperativa').val(0));

									singulares.forEach(function(item) {
											$(select).append($('<option>').text(item.singular).val(item.id));
									});
								});
								
								
								$(selectArrayCooperativa).on('change', function() {
									var selectedCooperativaId = $(this).val();
									var selectArrayAgencia = Array.from(selectAgencia);
									// Limpa o select de agencia
									selectArrayAgencia.forEach(function(select) {
										$(select).empty();
										$(select).append($('<option>').text('Selecione uma agência').val(0));
									});

									// Filtra as agencias baseado no valor selecionado do select cooperativa
									var selectedSingular = singulares.find(function(item) {
										return item.id == selectedCooperativaId;
									});

									if (selectedSingular.agencies.length>0) {
										selectedSingular.agencies.forEach(function(agency) {
											selectArrayAgencia.forEach(function(select) {
												$(select).append($('<option>').text(agency.agency_title).val(agency.agency_id));
											});
										});
									} 
							});
									
							},
							error: function(xhr, status, error) {
									// Manipule os erros aqui
									console.error(error);
							}
						});
					}
			}
		
		})(jQuery); 
	</script>
	<?php
}

add_action('gform_after_submission', 'criar_protocolo_cpt', 10, 2);
function criar_protocolo_cpt($entry, $form) {
	// Verifique o ID do formulário
	if ($form['id'] != 7) { // Substitua pelo ID do seu formulário
			return;
	}
	$protocolo = rgar($entry, '39');

	// Campos do formulário
	$nome = rgar($entry, '12');
	$email = rgar($entry, '10');
	$cpf = rgar($entry, '37');
	$telefone = rgar($entry, '38');
	$cooperativa = rgar($entry, '7');
	$agencia = rgar($entry, '8');
	$cooperado = rgar($entry, '13');
	$tipo_relato = rgar($entry, '19');
	$estado = rgar($entry, '23');
	$cidade = rgar($entry, '24');
	$nome_agencia = rgar($entry, '25');
	$nome_responsavel = rgar($entry, '27');
	$departamento = rgar($entry, '28');
	$funcao = rgar($entry, '29');
	$empresa = rgar($entry, '30');
	$outros_detalhes = rgar($entry, '31');
	$detalhamento_denuncia = rgar($entry, '33');
	$testemunhas = rgar($entry, '35');
	// Data da denúncia
	$data_denuncia = current_time('mysql');
	// Atualize o campo oculto com o número de protocolo
	
	//GFAPI::update_entry_field(rgar($entry, 'id'), '39', $protocolo);
	// Criar o novo post do tipo "protocolo"
	$post_data = array(
		'post_title' => 'Protocolo '. $protocolo,
		'post_content' => '',
		'post_status' => 'publish',
		'post_type' => 'protocolo',
		'meta_input' => array(
			'numero_protocolo' => $protocolo,
			'nome' => $nome,
			'email' => $email,
			'cpf' => $cpf,
			'telefone' => $telefone,
			'cooperativa' => $cooperativa,
			'agencia' => $agencia,
			'cooperado' => $cooperado,
			'tipo_relato' => $tipo_relato,
			'estado' => $estado,
			'cidade' => $cidade,
			'nome_agencia' => $nome_agencia,
			'nome_responsavel' => $nome_responsavel,
			'departamento' => $departamento,
			'funcao' => $funcao,
			'empresa' => $empresa,
			'outros_detalhes' => $outros_detalhes,
			'detalhamento_denuncia' => $detalhamento_denuncia,
			'testemunhas' => $testemunhas,
			'status' => 'aguardando resposta', // Stcatus inicial
			'data_denuncia' => $data_denuncia,
			'resposta' => '',
			'data_resposta' => '',
		),
	);
	$post_id = wp_insert_post($post_data);
}

add_filter('gform_entry_id_pre_save_lead', 'gerar_numero_protocolo', 10, 2);
function gerar_numero_protocolo($entry_id, $form) {
    // Verifique o ID do formulário
    if ($form['id'] != 7) { // Substitua pelo ID do seu formulário
        return $entry_id;
    }
    // Gere o número do protocolo
    $protocolo = date('YmdHis') . $entry_id;
    // Armazene o número do protocolo no campo oculto (ID 39)
    $_POST['input_39'] = $protocolo;

    return $entry_id;
}

// Adicionar colunas personalizadas à lista de Protocolos
add_filter('manage_protocolo_posts_columns', 'set_custom_edit_protocolo_columns');
function set_custom_edit_protocolo_columns($columns) {
    $columns['numero_protocolo'] = __('Número de Protocolo');
    $columns['agencia'] = __('Agência');
    $columns['data_denuncia'] = __('Data da Denúncia');
    $columns['status'] = __('Status');
    return $columns;
}

// Preencher as colunas personalizadas com os valores apropriados
add_action('manage_protocolo_posts_custom_column', 'custom_protocolo_column', 10, 2);
function custom_protocolo_column($column, $post_id) {
	switch ($column) {
		case 'numero_protocolo':
			echo get_post_meta($post_id, 'numero_protocolo', true);
			break;
		case 'agencia':
			echo get_post_meta($post_id, 'agencia', true);
			break;
		case 'data_denuncia':
			echo get_post_meta($post_id, 'data_denuncia', true);
			break;
		case 'status':
			echo get_post_meta($post_id, 'status', true);
			break;
	}
}

// Tornar as colunas classificáveis
add_filter('manage_edit-protocolo_sortable_columns', 'set_custom_protocolo_sortable_columns');
function set_custom_protocolo_sortable_columns($columns) {
    $columns['numero_protocolo'] = 'numero_protocolo';
    $columns['agencia'] = 'agencia';
    $columns['data_denuncia'] = 'data_denuncia';
    $columns['status'] = 'status';
    return $columns;
}
// Adicionar metabox para status e resposta
function add_protocolo_meta_box() {
	add_meta_box(
			'protocolo_meta_box',
			__('Detalhes do Protocolo'),
			'protocolo_meta_box_callback',
			'protocolo',
			'normal',
			'high'
	);
}
add_action('add_meta_boxes', 'add_protocolo_meta_box');

function protocolo_meta_box_callback($post) {
	// Recuperar os dados do post
	$numero_protocolo = get_post_meta($post->ID, 'numero_protocolo', true);
	$nome = get_post_meta($post->ID, 'nome', true);
	$email = get_post_meta($post->ID, 'email', true);
	$cpf = get_post_meta($post->ID, 'cpf', true);
	$telefone = get_post_meta($post->ID, 'telefone', true);
	$cooperativa = get_post_meta($post->ID, 'cooperativa', true);
	$agencia = get_post_meta($post->ID, 'agencia', true);
	$cooperado = get_post_meta($post->ID, 'cooperado', true);
	$tipo_relato = get_post_meta($post->ID, 'tipo_relato', true);
	$estado = get_post_meta($post->ID, 'estado', true);
	$cidade = get_post_meta($post->ID, 'cidade', true);
	$nome_agencia = get_post_meta($post->ID, 'nome_agencia', true);
	$nome_responsavel = get_post_meta($post->ID, 'nome_responsavel', true);
	$departamento = get_post_meta($post->ID, 'departamento', true);
	$funcao = get_post_meta($post->ID, 'funcao', true);
	$empresa = get_post_meta($post->ID, 'empresa', true);
	$outros_detalhes = get_post_meta($post->ID, 'outros_detalhes', true);
	$detalhamento_denuncia = get_post_meta($post->ID, 'detalhamento_denuncia', true);
	$testemunhas = get_post_meta($post->ID, 'testemunhas', true);
	$status = get_post_meta($post->ID, 'status', true);
	$data_denuncia = get_post_meta($post->ID, 'data_denuncia', true);
	$resposta = get_post_meta($post->ID, 'resposta', true);
	$data_resposta = get_post_meta($post->ID, 'data_resposta', true);

	// Caminho para o arquivo JSON
	$json_path = get_template_directory() . '/api/agencias.json';

	// Verifica se o arquivo existe
	if (file_exists($json_path)) {
			// Obtém o conteúdo do arquivo JSON
			$json_content = file_get_contents($json_path);
			// Decodifica o JSON para um array PHP
			$agencias_data = json_decode($json_content, true);
	}
	$cooperativa_id = get_post_meta(get_the_ID(), 'cooperativa', true);
	$agencia_id = get_post_meta(get_the_ID(), 'agencia', true);

	// Variáveis para armazenar os dados encontrados
	$cooperativa_nome = '';
	$agencia_nome = '';

	// Verifica se o JSON foi carregado corretamente
	if (!empty($agencias_data) && isset($agencias_data['singulares'])) {
		foreach ($agencias_data['singulares'] as $singular) {
			// Verifica se a cooperativa corresponde ao ID
			if ($singular['id'] == $cooperativa_id) {
				$cooperativa_nome = $singular['singular'];
				// Verifica se há agências e se a agência corresponde ao ID
				foreach ($singular['agencies'] as $agencia) {
					//var_dump();
					if (isset($singular['agencies']) && $agencia['agency_id'] == $agencia_id) {
							$agencia_nome = $agencia['agency_title'];
					}
				}
				break; // Encerra o loop se a cooperativa foi encontrada

			}
		}
	}
	// Exibir os campos no metabox
	?>
	<div class="block-protocolo">
		<p>
			<label for="protocolo_status"><b><?php _e('Status:'); ?></b></label>
			<select name="protocolo_status" id="protocolo_status">
					<option value="aguardando resposta" <?php selected($status, 'aguardando resposta'); ?>>Aguardando Resposta</option>
					<option value="respondido" <?php selected($status, 'respondido'); ?>>Respondido</option>
			</select>
		</p>
		<p><b>Número do Protocolo:</b> <?php echo esc_html($numero_protocolo); ?></p>
		<p><b>Data da Denúncia:</b> <?php echo esc_html($data_denuncia); ?></p>
		<tr><b>Data da Resposta:</b> <?php echo esc_html($data_resposta); ?></p>
	</div>
	<div class="block-protocolo">
		<div class="title-block"><?php _e('Dados'); ?></div>
		<p><b>Nome:</b> <?php echo esc_html($nome); ?></p>
		<p><b>E-mail:</b> <?php echo esc_html($email); ?></p>
		<p><b>Telefone:</b> <?php echo esc_html($telefone); ?></p>
		<p><b>CPF:</b> <?php echo esc_html($cpf); ?></p>
		<p><b>Cooperado:</b> <?php echo esc_html($cooperado); ?></p>
		<p><b>Singular:</b> <?php echo esc_html($cooperativa_nome) .' - '.esc_html($agencia_nome); ?></p>
	</div>
	<div class="block-protocolo">
		<div class="title-block"><?php _e('Dados do relato'); ?></div>
		<p><b>Tipo de Relato:</b> <?php echo esc_html($tipo_relato); ?></p>
		<p><b>Estado:</b> <?php echo esc_html($estado); ?></p>
		<p><b>Cidade:</b> <?php echo esc_html($cidade); ?></p>
		<p><b>Nome da Agência:</b> <?php echo esc_html($nome_agencia); ?></p>
		<p><b>Nome do Responsável:</b> <?php echo esc_html($nome_responsavel); ?></p>
		<p><b>Departamento do responsável:</b> <?php echo esc_html($departamento); ?></p>
		<p><b>Função do responsável:</b> <?php echo esc_html($funcao); ?></p>
		<p><b>Empresa:</b> <?php echo esc_html($empresa); ?></p>
		<p><b>Outros Detalhes:</b> <?php echo esc_html($outros_detalhes); ?></p>
		<p><b>Detalhamento:</b></p>
		<p><?php echo esc_html($detalhamento_denuncia); ?></p>
		<p><b>Testemunhas:</b></p>
		<p><?php echo esc_html($testemunhas); ?></p>
		<!-- <p><b>Provas:</b></p>
		<p><?php //echo esc_html($provas); ?></p> -->

		<p>
			<label for="protocolo_resposta"><div class="title-block"><?php _e('Resposta:'); ?></div></label>
			<textarea name="protocolo_resposta" id="protocolo_resposta" rows="5" style="width:100%;"><?php echo esc_textarea($resposta); ?></textarea>
		</p>
	<?php
}

// Salvar os dados dos metaboxes
function save_protocolo_meta_box_data($post_id) {
	if (array_key_exists('protocolo_status', $_POST)) {
		update_post_meta($post_id, 'status', $_POST['protocolo_status']);
	}
	if (array_key_exists('protocolo_resposta', $_POST)) {
		if (isset($_POST['protocolo_status']) && $_POST['protocolo_status'] != 'respondido') {
			update_post_meta($post_id, 'status', 'respondido');
		}
		update_post_meta($post_id, 'resposta', $_POST['protocolo_resposta']);
		update_post_meta($post_id, 'data_resposta', current_time('mysql'));
	}
}
add_action('save_post', 'save_protocolo_meta_box_data');


function add_query_vars($vars) {
	$vars[] = 'protocolo';
	return $vars;
}
add_filter('query_vars', 'add_query_vars');

function protocolo_template_redirect() {
	global $wp_query;
	if (isset($wp_query->query_vars['protocolo'])) {
		$protocolo = $wp_query->query_vars['protocolo'];
		$post = get_page_by_path($protocolo, OBJECT, 'protocolo');
		if ($post) {
			$wp_query->queried_object = $post;
			$wp_query->post = $post;
			$wp_query->found_posts = 1;
			$wp_query->post_count = 1;
			$wp_query->max_num_pages = 1;
			$wp_query->is_single = true;
			$wp_query->is_404 = false;
			$wp_query->is_protocolo = true;
		} else {
			$wp_query->is_single = false;
			$wp_query->is_protocolo = true;
			$wp_query->is_404 = true;
		}
		include(get_template_directory() . '/page-protocolo.php');
		exit;
	}
}
add_action('template_redirect', 'protocolo_template_redirect');

add_action('init', function() { flush_rewrite_rules(); });
/* BUSCA */
function custom_search_filter($query) {
	if ($query->is_search && !is_admin()) {
			$post_types = ['noticia', 'sala-de-imprensa', 'campanha'];
			$query->set('post_type', $post_types);
	}
	return $query;
}
add_filter('pre_get_posts', 'custom_search_filter');

/*function load_gravity_form_interest() {
	if (!isset($_POST['form_id'])) {
			wp_send_json_error('Form ID missing.');
			wp_die();
	}

	$form_id = intval($_POST['form_id']);
	$mensagem = sanitize_text_field($_POST['mensagem']);

	// Enfileirar os scripts necessários do Gravity Forms
	//GFFormDisplay::enqueue_form_scripts($form_id, true);
	// Enfileirar os scripts necessários do Gravity Forms
	gravity_form_enqueue_scripts($form_id, true);

	// Capturar o HTML do formulário
	ob_start();
	gravity_form($form_id, false, false, false, null, true);
	$form_html = ob_get_clean();

	// Retornar o HTML do formulário
	wp_send_json_success(array(
		'form_html' => $form_html,
		'mensagem' => $mensagem
	));
	wp_die();
}
add_action('wp_ajax_load_gravity_form', 'load_gravity_form_interest');
add_action('wp_ajax_nopriv_load_gravity_form', 'load_gravity_form_interest');*/

//add_filter( 'gform_field_value_select-assunto-data', 'populate_select_assunto' );
function load_assunto_interest( ) {
	$form_id = intval($_POST['form_id']);
	$mensagem = ($_POST['mensagem']);
	wp_send_json_success(array(
		'form_html' => $form_id,
		'mensagem' => $mensagem
	));
	wp_die();
	?>
	<script type='text/javascript'>
		(function($){
			$(document).on('gform_post_render', function(event, form_id, current_page){
				carregarSelectsAssunto();
			})
		})
	</script>
	<?php
}

add_action('wp_ajax_load_assunto', 'load_assunto_interest');
add_action('wp_ajax_nopriv_load_assunto', 'load_assunto_interest');

function filter_post_type_link($post_link, $post) {
	if ($post->post_type == 'solucoes') {
		$taxonomies = get_object_taxonomies(get_post_type($post->ID), 'objects');
		
		
		// Verifica se há taxonomias
		if ($taxonomies) {
			foreach ($taxonomies as $taxonomy) {
				// Verifica se o post tem termos associados à taxonomia atual
				$terms = get_the_terms($post->ID, $taxonomy->name);
				//var_dump($terms);
				//$post_link = str_replace('%tipo-solucoes%', array_pop($terms)->slug, $post_link);
				/*if ($terms && !is_wp_error($terms)) {
					$taxonomy_names = array();
					foreach ($terms as $term) {
							$taxonomy_names[] = $term->name;
					}
					echo implode(', ', $taxonomy_names);
					return; // Termina a função após encontrar a primeira taxonomia com termos associados
				}*/
			}
		}
		
		if ($terms = get_the_terms($post->ID, 'tipo-solucao')) {
			$post_link = str_replace('%tipo-solucao%', array_pop($terms)->slug, $post_link);
		}
	}
	return $post_link;
}
add_filter('post_type_link', 'filter_post_type_link', 10, 2);

function my_rewrite_flush() {
	flush_rewrite_rules();
}
add_action('after_switch_theme', 'my_rewrite_flush');

function filtrar_assembleias() {
	$unidade = sanitize_text_field($_POST['unidade']);
	$args = array(
		'post_type'      => 'assembleia',
		'posts_per_page' => -1,
		'meta_key'       => 'data_assembleia',
		'orderby'        => 'meta_value',
		'order'          => 'DESC'
	);

	if ($unidade) {
		$args['meta_query'] = array(
			array(
				'key'   => 'unidade',
				'value' => $unidade
			)
		);
	}

	$assembleias = get_posts($args);

	ob_start();
	foreach ($assembleias as $assembleia) :
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
					<div class="title title-block flex-grow-1 title-36 switzerlandLight">
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
							<a href="<?php echo esc_html($link_download['url']); ?>" class="btn btn-download"><?php echo __('Baixar edital');?><i class="icon-download-white right"></i></a>
						</div>
					</div>
				</div>
			</div>
		<?php
		} else {
			$prox_assembleias .= '<div class="card-assembleias">';
			$prox_assembleias .= '<div class="content-card d-flex flex-column justify-content-start">';
			$prox_assembleias .= '<div class="ano icon-menu icon-logo">PRÓXIMA ASSEMBLEIA</div>';
			$prox_assembleias .= '<div class="title title-block flex-grow-1 title-36 switzerlandLight"><h2>'. esc_html($data_assembleia) .'</h2></div>';
			$prox_assembleias .= '<div class="d-flex justify-content-between align-items-start align-items-lg-end flex-column flex-lg-row">';
			$prox_assembleias .= '<div class="description flex-grow-1">';
			$prox_assembleias .= '<div class="unidade"><strong>'. esc_html($unidade) .'</strong></div>';
			$prox_assembleias .= ''. esc_html($link_download['title']). '<br>';
			$prox_assembleias .= '</div>';
			$prox_assembleias .= '<div class="linkpdf">';
			$prox_assembleias .= '<a href="'. esc_html($link_download['url']). '" class="btn btn-download">'.__('Baixar edital').' <i class="icon-download-white right"></i></a>';
			$prox_assembleias .= '</div>';
			$prox_assembleias .= '</div>';
			$prox_assembleias .= '</div>';
			$prox_assembleias .= '</div>';
		}
	endforeach;

	$content = ob_get_clean();
	wp_send_json_success($content);
}
add_action('wp_ajax_filtrar_assembleias', 'filtrar_assembleias');
add_action('wp_ajax_nopriv_filtrar_assembleias', 'filtrar_assembleias');

function getCurrentPath() {
	return parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
}

function getBasePath() {
	$currentUrl = $_SERVER['REQUEST_URI'];
	$pathSegments = explode('/', trim($currentUrl, '/'));
	return isset($pathSegments[0]) ? '/' . $pathSegments[0] : '/';
}

function remove_menu_items() {
	// Remove menu de Posts
	remove_menu_page('edit.php');

	// Remove menu de Comentários
	remove_menu_page('edit-comments.php');
	
}
add_action('admin_menu', 'remove_menu_items');
function remove_menu_items_for_non_admins() {
	// Verifica se o usuário não é administrador
	if (!current_user_can('manage_options')) {
			// Remove menu de Aparência
			remove_menu_page('themes.php');

			// Remove menu de Plugins
			remove_menu_page('plugins.php');

			// Remove menu de Ferramentas
			remove_menu_page('tools.php');

			// Remove menu de Configurações
			remove_menu_page('options-general.php');

			// Remove menu de ACF
			remove_menu_page('edit.php?post_type=acf-field-group');
	}
}
add_action('admin_menu', 'remove_menu_items_for_non_admins');

function remove_network_admin_menus_from_my_sites($admin_bar) {
	if (is_user_logged_in() && is_multisite()) {
		// Remove as opções específicas do menu "Meus Sites > Painel de Rede"
		//$admin_bar->remove_menu('network-admin'); // Remove "Painel - pai"
		$admin_bar->remove_menu('network-admin-o'); // Remove "Painel de Rede"
		//$admin_bar->remove_menu('network-admin-d'); // Remove "Painel de Rede"
		//$admin_bar->remove_menu('network-admin-u'); // Remove "Usuários"
		$admin_bar->remove_menu('network-admin-t'); // Remove "Temas"
		$admin_bar->remove_menu('network-admin-p'); // Remove "Plugins"
		//$admin_bar->remove_menu('network-admin-s'); // Remove "Configurações"*/
		$admin_bar->remove_menu('updates'); // Remove "Updates"
		
		$user_blogs = get_blogs_of_user(get_current_user_id());

		foreach ($user_blogs as $blog) {
			$blog_id = 'blog-' . $blog->userblog_id;

			// Remover "Novo post"
			$admin_bar->remove_menu($blog_id . '-n');

			// Remover "Gerenciar comentários"
			$admin_bar->remove_menu($blog_id . '-c');
		}
	}
	//var_dump($admin_bar);
}
add_action('admin_bar_menu', 'remove_network_admin_menus_from_my_sites', 100);

function remove_network_admin_menu_items() {
	if (is_user_logged_in() && is_multisite()) {
		remove_menu_page('index.php'); // Remove "Painel"
		remove_menu_page('users.php');        // Remove "Usuários"
		remove_menu_page('themes.php');       // Remove "Temas"
		remove_menu_page('plugins.php');      // Remove "Plugins"
		remove_menu_page('settings.php');     // Remove "Configurações"
	}
}
add_action('network_admin_menu', 'remove_network_admin_menu_items', 100);


function redirect_from_main_blog()
{
    $blog_id = get_current_blog_id();
		//var_dump($blog_id);
    /*if (is_home() || is_404()):
        if ($blog_id == 1 && !is_admin() && !defined('WP_CLI')) {
            $url = get_home_url(2); //redirect to EN site from base url
            echo $url;
            wp_safe_redirect($url, 301);
            exit;
        }
    endif;*/
}
add_action('wp', 'redirect_from_main_blog');


add_action('template_redirect', 'custom_redirect_singular_tyara');

function custom_redirect_singular_tyara() {
	// Verifica se a URL contém '/tyara/'
	$currentUrl = $_SERVER['REQUEST_URI'];
	$pathSegments = explode('/', trim($currentUrl, '/'));
	//return isset($pathSegments[0]) ? '/' . $pathSegments[0] : '/';
	if (strpos($pathSegments[0], 'singular') !== false) {
		//var_dump($pathSegments[1]);
			// Monta o URL para redirecionamento
			$redirect_url = 'http://uniprime.local/'.$pathSegments[1];

			// Redireciona para o URL especificado
			wp_redirect($redirect_url);
			exit;
	}
}
