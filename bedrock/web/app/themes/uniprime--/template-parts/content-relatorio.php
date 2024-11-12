<?php
// Certifique-se de que estamos dentro de um loop
if (have_posts()) :
    while (have_posts()) : the_post();
?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <header class="entry-header">
                <h1 class="entry-title"><?php the_title(); ?></h1>
            </header><!-- .entry-header -->

            <div class="entry-content">
                <?php the_content(); ?>
            </div><!-- .entry-content -->
        </article><!-- #post-<?php the_ID(); ?> -->
<?php
    endwhile;
endif;
?>