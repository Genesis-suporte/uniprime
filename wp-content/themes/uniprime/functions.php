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
			'name'      			=> 'Header',
			'title' 					=> __('header-para-voce'),
			'description' 		=> __('Menu inicial de Uniprime'),
			"render_template"	=> "blocks/header.php",
			'category' 				=> 'layout',
			'icon' 						=> 'dashicons-admin-home',
			'keywords' => 		array( 'nav', 'menu' )
		));
		acf_register_block_type(array(
			'name'      			=> 'Hero banner',
			'title' 					=> __('hero-banner'),
			'description' 		=> __('Hero banner da Homepage'),
			"render_template"	=> "blocks/hero-banner.php",
			'category' 				=> 'layout',
			'icon' 						=> 'dashicons-admin-home',
			'keywords' => 		array( 'hero', 'banner' )
		));
		acf_register_block_type(array(
			'name'      			=> 'Bloco nossos produtos',
			'title' 					=> __('nossos-produtos'),
			'description' 		=> __('Terceiro bloco da Homepage, onde mostra a lista das soluções'),
			"render_template"	=> "blocks/nossos-produtos.php",
			'category' 				=> 'layout',
			'icon' 						=> 'dashicons-admin-home',
			'keywords' => 		array( 'list', 'categories' )
		));
		acf_register_block_type(array(
			'name'      			=> 'Bloco nossa história',
			'title' 					=> __('nossa-historia'),
			'description' 		=> __('Quarto bloco da Homepage, onde mostra os cards'),
			"render_template"	=> "blocks/nossa-historia.php",
			'category' 				=> 'layout',
			'icon' 						=> 'dashicons-admin-home',
			'keywords' => 		array( 'slick', 'slides' )
		));
		acf_register_block_type(array(
			'name'      			=> 'Bloco canais digitais',
			'title' 					=> __('canais-digitais'),
			'description' 		=> __('Quinto bloco da Homepage, onde mostra o texto e imagem dos canais digitais'),
			"render_template"	=> "blocks/canais-digitais.php",
			'category' 				=> 'layout',
			'icon' 						=> 'dashicons-admin-home'
		));
		acf_register_block_type(array(
			'name'      			=> 'Bloco onde encontrar',
			'title' 					=> __('onde-encontrar'),
			'description' 		=> __('Sexto bloco da Homepage, onde tem o combobox de escolha das unidades'),
			"render_template"	=> "blocks/onde-encontrar.php",
			'category' 				=> 'layout',
			'icon' 						=> 'dashicons-admin-home'
		));
		acf_register_block_type(array(
			'name'      			=> 'Bloco novidades',
			'title' 					=> __('novidades'),
			'description' 		=> __('Sétimo bloco da Homepage, onde lista as notícias em destaque'),
			"render_template"	=> "blocks/novidades.php",
			'category' 				=> 'layout',
			'icon' 						=> 'dashicons-admin-home'
		));
		acf_register_block_type(array(
			'name'      			=> 'Bloco atendimento',
			'title' 					=> __('atendimento'),
			'description' 		=> __('Oitavo bloco da Homepage, onde se encontram os links das redes sociais'),
			"render_template"	=> "blocks/atendimento.php",
			'category' 				=> 'layout',
			'icon' 						=> 'dashicons-admin-home'
		));
		acf_register_block_type(array(
			'name'      			=> 'Footer',
			'title' 					=> __('footer'),
			'description' 		=> __('Bloco footer'),
			"render_template"	=> "blocks/footer.php",
			'category' 				=> 'layout',
			'icon' 						=> 'dashicons-admin-home',
			'keywords' => 		array( 'footer' )
		));
		
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
function stylestarter_enqueue_styles() {
	wp_enqueue_style('styles', get_template_directory_uri() . '/assets/css/styles.css', array(), null, 'all');
	wp_enqueue_style('bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), null, 'all' );
	wp_enqueue_style('slick', get_template_directory_uri() . '/assets/css/slick.css', array(), null, 'all');
	wp_enqueue_style( 'fonts' ,  get_template_directory_uri() . '/assets/css/fonts.css' );
}
add_action( 'wp_enqueue_scripts', 'stylestarter_enqueue_styles' );
add_action( 'enqueue_block_editor_assets', 'stylestarter_enqueue_styles' );
function bootstrapstarter_enqueue_scripts() {
	$dependencies = array('jquery');
	wp_enqueue_script('bootstrap', get_template_directory_uri().'/assets/js/bootstrap.bundle.min.js', $dependencies );
	wp_enqueue_script('slick', get_template_directory_uri().'/assets/js/slick.min.js' );
	wp_enqueue_script('scripts', get_template_directory_uri().'/assets/js/scripts.js' );
}	

add_action( 'wp_enqueue_scripts', 'bootstrapstarter_enqueue_scripts' );
add_action( 'enqueue_block_editor_assets', 'bootstrapstarter_enqueue_scripts' );

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