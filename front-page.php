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
    <?php
    wp_nav_menu(array(
        "menu"=>"evenement",
        "container"=>"nav",
        "container_class"=>"menu__evenement"
        
    ));?>
<section class="liste__accueil">

    <?php if ( have_posts() ) :
        while ( have_posts() ) :
            the_post(); ?>
            <article class="liste__accueil__cours">

                <h1><a href="<?php the_permalink(); ?>">
                <?php $titre = the_title('','',false);  echo substr($titre,8,-6)?></a></h1>
               
                <?php 
                if ( has_post_thumbnail() ) {
                    the_post_thumbnail("thumbnail");
                }
                    ?>
                <?= wp_trim_words(get_the_excerpt(),10, "...");?>
                
            </article>
        <?php endwhile; ?>
    <?php endif; ?>
</section>
  
    </main>    
<?php get_footer(); ?>
</html>
