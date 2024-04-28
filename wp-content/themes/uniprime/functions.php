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
			'description' 		=> __('Menu principal da'),
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
			'name'      			=> 'bloco-fale-conosco',
			'title' 					=> __('Bloco Fale conosco'),
			'description' 		=> __('Bloco com o formulário Fale conosco'),
			"render_template"	=> "blocks/bloco-fale-conosco.php",
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
			'title' 					=> __('Bloco de Baixe agora seu conteúdo exclusivo'),
			'description' 		=> __('Bloco de Baixe agora seu conteúdo exclusivo'),
			"render_template"	=> "blocks/bloco-baixe-conteudo.php",
			'category' 				=> 'layout',
			'icon' 						=> 'uniprime',
			'keywords' => 		array( 'institucional' , 'content-noticias')
		));	
		/* FUNÇÃO PRO GRAVITY FORMS RETORNAR CAMPO ASSUNTO */
		/*add_filter( 'gform_field_value_assuntos', 'pre_select_assuntos' );
		function pre_select_assuntos( $value ) {
			return 'assunto_2';
		}*/
		
		add_theme_support( 'wp-block-styles' );
		add_theme_support( 'align-wide' );
		add_theme_support( 'editor-styles' );
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );
	}
endif; // end function_exists blank_setup.
add_action( 'after_setup_theme', 'Uniprime' );

if ( function_exists( 'acf_register_block_type' ) ) {
	add_action('acf/init', 'Uniprime');
}
function my_block_plugin_editor_scripts() {
	wp_enqueue_style('styles', get_template_directory_uri() . '/assets/css/styles.css', array(), null, 'all');
	wp_enqueue_style('bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), null, 'all' );
	wp_enqueue_style('slick', get_template_directory_uri() . '/assets/css/slick.css', array(), null, 'all');
	wp_enqueue_style( 'fonts' ,  get_template_directory_uri() . '/assets/css/fonts.css' );

	$dependencies = array('jquery','wp-blocks', 'wp-element' );
	$dependencies2 = array('jquery','wp-blocks', 'wp-element','slick' );
	wp_enqueue_script('bootstrap', get_template_directory_uri().'/assets/js/bootstrap.bundle.min.js', $dependencies );
	wp_enqueue_script('slick', get_template_directory_uri().'/assets/js/slick.js', $dependencies );
	wp_enqueue_script('scripts', get_template_directory_uri().'/assets/js/scripts.js', $dependencies2 );

}
add_action( 'wp_enqueue_scripts', 'my_block_plugin_editor_scripts' );
add_action( 'enqueue_block_editor_assets', 'my_block_plugin_editor_scripts' );
add_action( 'admin_enqueue_scripts', 'my_block_plugin_editor_scripts' );

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


/*
function my_acf_editor( $mceInit ) {
	$mceInit['setup'] = 'editShortcut_tiny_mce_init';
	// What goes into the 'formatselect' list
	$mceInit['block_formats'] = 'Marcadores Uniprime=bullist;Título 1=h1;Título 2=h2;Título 3=h3;Título 4=h4;Título 5=h5;Título 6=h6;Paragraph=p;Code=code';
	$mceInit['paste_word_valid_elements'] = '-strong/b,-em/i,-p,-ol,-ul,-li,-h3,-h4,-h5,-h6,-p,-table[width],-tr,-td[colspan|rowspan|width],-th,-thead,-tfoot,-tbody,-a[href|name],br,del';
		
	$mceInit['paste_strip_class_attributes'] = 'all';
	$mceInit['toolbar1'] = 'bold,italic,formatselect,bullist,numlist,blockquote,link,unlink,undo,redo';

	return $mceInit;
}
add_filter('tiny_mce_before_init', 'my_acf_editor');*/
/*
FUNTION DO ADD STICKY ON CPT
function addbox($post, $metabox) {  
	$entered = get_post_meta($post->ID, 'pseudosticky', true);
	?>
    <label><input name="pseudosticky" type="checkbox"<?if($entered=="on")echo' checked="checked"';?>> Is sticky</label>
    <?
}
add_meta_box('pseudosticky', 'Is sticky', 'addbox', 'campanha', 'normal', 'high');
*/
function setMenuThreeLevels($menu) {
	$menu_lists = array();
	
	$sub_parent = 0;
	$menu_items = wp_get_nav_menu_items( $menu );
	
	foreach ( $menu_items as $menu_item ) {
		//if ( in_array( $menu_item->object, array( 'page', 'custom' ) ) ) {
			$id = $menu_item->ID;
			$title = $menu_item->title;
			$link = $menu_item->url;
			$class = $menu_item->classes;
			$menu_item_parent = $menu_item->menu_item_parent;
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
					$menu_lists[ $id ]['active'] = 'current-menu-item';
				}
			} else {
				// if parent menu is set, means this is 2nd level menu
				if ( isset( $menu_lists[ $menu_item_parent ] ) ) {
					$menu_lists[ $menu_item_parent ]['child'] = true;
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
		//}
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
