<?php /* Template Name: Para sua Cooperativa */ ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<?php 
//edit_post_link(); 
get_post_type()
?>
<?php the_post(); ?>
<?php the_content(); ?>
		<?php get_footer(); ?>
</body>
</html>