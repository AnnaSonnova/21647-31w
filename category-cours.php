<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package underscore
 */
?>
<!-- h1 class="trace">front-page.php</h1 -->
<?php get_header(); ?>

    <main class="site__main">
    <section class="liste">
    <?php
		if ( have_posts() ) :
            while ( have_posts() ) :
				the_post(); ?>
                <article class="liste__cours">
                <h1><a href="<?php the_permalink(); ?>">
                <?php the_title(); ?></a></h1>
                <ul class="category__champ">
                    <li>Durée du cours: <?php the_field('duree'); ?></li>
                    <li>Professeur: <?php the_field('professeur'); ?></li>
                    <li>Préalable: <?php the_field('prealable'); ?></li>
                </ul>
                <?php the_content($more_link_text, true); 
                
                wp_trim_words($more_link_text,3,"...");
                 
                //wp_trim_words()
                ?>
                <article>
            <?php endwhile; ?>
        <?php endif; ?>
        </section>
    </main>    
<?php get_footer(); ?>
</html>